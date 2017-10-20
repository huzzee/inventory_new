<?php

namespace App\Http\Controllers;

use App\Models\IssuanceMaster;
use App\Models\IssuanceDetail;
use Illuminate\Http\Request;
use App\Models\Requisition;
use App\Models\Item;

class IssuanceMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $issuance = IssuanceMaster::with('issuanceDetails','users')->get();
        //dd($issuance);
        return view('pages.issuance.issuanceList',array(
            'issuance' => $issuance
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.issuance.createIssuance');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'requisition_code' => 'required',
            'issued_qnt' => 'required',
        ]);

        $requisition = Requisition::where('req_code','=',$request['requisition_code'])->get();

        

        $issuance = new IssuanceMaster;

        $issuance->user_id = $request['user_id'];
        
        $issuance->requisition_id = $requisition[0]->id;
        
        $issuance->save();


        for($i = 0; $i < sizeof($request->item_id); $i++)
        {         
            $issuanceDetail = new IssuanceDetail([
                'issuance_master_id' => $issuance->id,
                'item_id' => $request->item_id[$i],
                'issued_qnt' => $request->issued_qnt[$i]
                
            ]);
            

            $items = Item::findOrFail($request->item_id[$i]);

            if($items->current_qnt >  $request->issued_qnt[$i])
            {   
                $issuanceDetail->save();

                $items->current_qnt -= $request->issued_qnt[$i];

                $req = Requisition::findOrFail($requisition[0]->id);
                $req->issued = 1;

                $req->save();
            }
            else{

                

                $issuance->delete();

                return redirect()->back()->withErrors(['Sorry! Current Stock is Less then Required quentity']);
            }
            

            $items->save();

            
        }



        return redirect('issuance');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\IssuanceMaster  $issuanceMaster
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $issuance = IssuanceMaster::with('issuanceDetails','users')->where('id','=',$id)->get();
        //dd($issuance);
        return view('pages.issuance.showIssuance',array(
            'issuance' => $issuance
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\IssuanceMaster  $issuanceMaster
     * @return \Illuminate\Http\Response
     */
    public function edit(IssuanceMaster $issuanceMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\IssuanceMaster  $issuanceMaster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IssuanceMaster $issuanceMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IssuanceMaster  $issuanceMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(IssuanceMaster $issuanceMaster)
    {
        //
    }



    /*Ajax Requests*/

    public function chk_req_code()
    {
        $requisition = Requisition::with('requisitionDetails','users','departments')->where('requisitions.req_code','=', request()->get('req_code'))->where('requisitions.approved','=',1)->get();

        


        if(!isset($requisition[0]->req_code))
        {
            $html = '<span style="color:red;">Wrong Code</span>';

            $data = array(
                'message' => $html,
                'user_data' => '',
                'item_data' => ''
                    
            );

            return response()->json($data);

            
        }
        else
        {
            $issuance = IssuanceMaster::where('requisition_id','=',$requisition[0]->id)->get();

            if(!isset($issuance[0]->requisition_id)){
                $html = '<span style=" color:green;">Correct Code</span>';
            

                $html2 = '<div class="form-group row">
                                <label for="purchase_order_code" class="col-sm-3">Request Make By</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="'. $requisition[0]->users->first_name .' '.$requisition[0]->users->last_name .'" disabled="disabled"/>
                                    <input type="hidden" name="user_id" value="'. $requisition[0]->users->id.'" />
                                    
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="purchase_order_code" class="col-sm-3">Username</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="'. $requisition[0]->users->username .'" disabled="disabled"/>
                                    
                                    
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="purchase_order_code" class="col-sm-3">Department</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="'. $requisition[0]->departments->department_name .'" disabled="disabled"/>
                                    
                                    
                                </div>
                            </div>';

                
                

                $tb_row = '';
                $i =1;


                foreach($requisition[0]['requisitionDetails'] as $res)
                {   
                    $tb_row .= '
                            <tr>
                                <td>'. $i .'</td>
                                <td>'. $res->items->item_name .'<input type="hidden" name="item_id[]" value="'. $res->items->id .'" /></td>
                                <td>'. $res->items->current_qnt .'</td>
                                <td>'. $res->required_qnt .'</td>
                                <td><input type="number" class="form-control" name="issued_qnt[]" Enter Here/></td>
                                
                                
                            </tr>
                    ';
                    $i++;
                }


                $table_item = '
                                <table class="table table-striped m-0">

                                    <thead>
                                        <tr>
                                            <th width="3%">Sr.No</th>
                                            <th width="20%">Item Name</th>
                                            <th width="10%">Current Stock</th>
                                            <th width="10%">Required Quantity</th>
                                            <th width="10%">Issuing Quantity</th>
                                            
                                            
                                                                                                    
                                        </tr>
                                    </thead>
                                    <tbody>
                                        '.$tb_row.'
                                    </tbody>
                                </table>
                ';
                $data = array(
                    'message' => $html,
                    'user_data' => $html2,
                    'item_data' => $table_item
                        
                );
                return response()->json($data);
            }
            else{
                $html = '<span style=" color:red;">Already Made Issuance Slip for this Request.Try Diffrent!</span>';
                
                $data = array(
                    'message' => $html,
                    'user_data' => '',
                    'item_data' => ''
                        
                );
                return response()->json($data);
            }    
        }
    }
}
