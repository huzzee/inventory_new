<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Supplier;
use App\Models\grnMaster;
use App\Models\grnDetail;
use App\Models\PurchaseOrderMaster;

class grnMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grnMaster = grnMaster::with('grnDetails','users','suppliers','purchaseOrderMasters')->latest()->get();
        //dd($grnMaster);
        return view('pages.goodReceive.goodReceiveList' , compact('grnMaster'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suppliers = Supplier::all();
        $items = Item::all();

        return view('pages.goodReceive.makeGoodReceive', compact('suppliers' , 'items'));
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
            'supplier_id' => 'required',
            'purchase_order_code' => 'required',
            'dn_code' => 'required',
        ]);

        $puchaseOrderMaster = PurchaseOrderMaster::where('purchase_code','=',$request['purchase_order_code'])->get();

        $grnMaster = new grnMaster;

        $grnMaster->user_id = $request['user_id'];
        $grnMaster->supplier_id = $request['supplier_id'];
        
        $grnMaster->purchase_order_id = $puchaseOrderMaster[0]->id;
           
        $grnMaster->dn_code = $request['dn_code'];

        $grnMaster->save();


        for($i = 0; $i < sizeof($request->item_id); $i++)
        {         
            $grnDetail = new grnDetail([
                'grn_master_id' => $grnMaster->id,
                'item_id' => $request->item_id[$i],
                'recieved_qnt' => $request->recieved_qnt[$i],
                'per_unit_rate' => $request->per_unit_rate[$i],
                'total_amount' => $request->recieved_qnt[$i] * $request->per_unit_rate[$i]
            ]);
            $grnDetail->save();

            $items = Item::findOrFail($request->item_id[$i]);

            
            $items->current_qnt += $request->order_qnt[$i];
            $items->last_purchase_rate = $items->unit_price;
            $items->unit_price = $request->per_unit_rate[$i];

            $items->save();



            /*$new_qnt = $items->current_qnt + $request->order_qnt[$i];

            Item::where('id' ,$request->item_id[$i])->update([
                'current_qnt' => $new_qnt,
                'last_purchase_rate' => $request->item_rate[$i],
                'last_purchase_qnt' => $request->order_qnt[$i],
            ]);*/
            
        }



        return redirect('grn');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $grnMaster = grnMaster::with('grnDetails','users','suppliers','purchaseOrderMasters')->where('id' , $id)->get();

        //dd($grnMaster);
        return view('pages.goodReceive.showGoodReceive', compact('grnMaster'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }




    /*Ajax requests*/

    public function chk_code()
    {
        $puchase_order = PurchaseOrderMaster::with('purchaseOrderDetails','users','suppliers')->where('purchase_order_masters.purchase_code','=', request()->get('purchase_code'))->where('purchase_order_masters.approved','=',1)->get();

        


        if(!isset($puchase_order[0]->purchase_code))
        {
            $html = '<span style="color:red;">Wrong Code</span>';

            $data = array(
                'message' => $html,
                'sup_data' => '',
                'item_data' => ''
                    
            );

            return response()->json($data);

            
        }
        else
        {
            $grn = grnMaster::where('purchase_order_id','=',$puchase_order[0]->id)->get();

            if(!isset($grn[0]->purchase_order_id)){
                $html = '<span style=" color:green;">Correct Code</span>';
            

                $html2 = '<div class="form-group row">
                                <label for="purchase_order_code" class="col-sm-3">Order Make By</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="'. $puchase_order[0]->users->username .'" disabled="disabled"/>
                                    <input type="hidden" name="user_id" value="'. $puchase_order[0]->users->id.'" />
                                    
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="purchase_order_code" class="col-sm-3">Supplier Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="'. $puchase_order[0]->suppliers->sup_name .'" disabled="disabled"/>
                                    <input type="hidden" name="supplier_id" value="'. $puchase_order[0]->suppliers->id .'" />
                                    
                                </div>
                            </div>';

                
                

                $tb_row = '';
                $i =1;


                foreach($puchase_order[0]['purchaseOrderDetails'] as $res)
                {   
                    $tb_row .= '
                            <tr>
                                <td>'. $i .'</td>
                                <td>'. $res->items->item_name .'<input type="hidden" name="item_id[]" value="'. $res->items->id .'" /></td>
                                <td>'. $res->item_rate .'<input type="hidden" name="per_unit_rate[]" value="'. $res->item_rate .'" /></td>
                                <td>'. $res->order_qnt .'</td>
                                <td><input type="number" class="form-control" id="recvd'. $res->items->id .'" name="recieved_qnt[]" Enter Here/></td>
                                
                                
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
                                            <th width="10%">Item Rate</th>
                                            <th width="10%">Ordered Quantity</th>
                                            <th width="10%">Recieving Quantity</th>
                                            
                                            
                                                                                                    
                                        </tr>
                                    </thead>
                                    <tbody>
                                        '.$tb_row.'
                                    </tbody>
                                </table>
                ';
                $data = array(
                    'message' => $html,
                    'sup_data' => $html2,
                    'item_data' => $table_item
                        
                );
                return response()->json($data);
            }
            else{
                $html = '<span style=" color:red;">Already Made G.R.N for this Purchase Order.Try Diffrent!</span>';
                
                $data = array(
                    'message' => $html,
                    'sup_data' => '',
                    'item_data' => ''
                        
                );
                return response()->json($data);
            }    
        }
        
        
            
        
    }

    /*Ajax requests*/   

}
