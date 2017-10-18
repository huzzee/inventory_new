<?php

namespace App\Http\Controllers;

use App\Models\Requisition;
use Illuminate\Http\Request;
use App\User;
use App\Models\Item;
use App\Models\MyDepartment;
use App\Models\RequisitionDetail;
use Auth;
use Carbon\Carbon;

class RequisitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requisitions = Requisition::with('requisitionDetails','users','departments')->orderBy('requisitions.id','desc')->get();

        //dd($requisitions[0]->requisitionDetails[0]->items);
        return view('pages.requisitions.requisitionsList',array(
            'requisitions' => $requisitions
        ));
    }

    /*complete Requisition list*/

    public function complete_req()
    {
        //dd('ok');
        $requisitions = Requisition::with('requisitionDetails','users','departments')->where('requisitions.issued','=',1)->get();
            //dd($requisition);
        return view('pages.requisitions.req_complete',array(
            'requisitions' => $requisitions
        ));
    }   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $items = Item::all();
        $my_departments = MyDepartment::all();

        //dd(Auth::user()->my_departments);

        return view('pages.requisitions.addrequisitions',array(
            'users' => $users,
            'items' => $items,
            'my_departments' => $my_departments
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //dd($request);
        $request->validate([

            'user_id' => 'required',
            'department_id' => 'required',
            'item_id' => 'required',
            'required_qnt' => 'required',
            'reason' => 'required|min:15'
        ]);

        $requisition = new Requisition([
            'user_id' => $request->user_id,
            'department_id' => $request->department_id,
            
            'reason' => $request->reason
        ]);

        $requisition->save();

        for($i = 0; $i < sizeof($request->item_id); $i++)
        {

            $requisition_detail = new RequisitionDetail([
                'requisition_id' => $requisition->id,
                'item_id' => $request->item_id[$i],
                'required_qnt' => $request->required_qnt[$i]
            ]);
            $requisition_detail->save();
        }


       

            return redirect('requisitions');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Requisition  $requisition
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $requisition = Requisition::with('requisitionDetails','users','departments')->where('requisitions.id','=',$id)->get();

        $users = User::findOrFail($requisition[0]->approval_by);
        //dd($user);
        return view('pages.requisitions.showRequisitions',array(
            'requisition' => $requisition,
            'users' => $users
        ));
    }



    public function approved_req(Request $request)
    {
        $requisition = Requisition::findOrFail($request->req_id);

        $requisition->approved = 1;
        $requisition->rejected = 0;
        $requisition->Approval_by = $request->approval_by;
        $requisition->approval_date = Carbon::now();

        $requisition->save();


        return redirect('requisitions');
        //dd($requisition);
    }

    public function rejected_req(Request $request)
    {
        $requisition = Requisition::findOrFail($request->req_id);

        $requisition->approved = 0;
        $requisition->rejected = 1;
        $requisition->Approval_by = $request->approval_by;
        $requisition->approval_date = Carbon::now();

        $requisition->save();

        return redirect('requisitions');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Requisition  $requisition
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $requisition = Requisition::with('requisitionDetails','users','departments')->where('requisitions.id','=',$id)->get();
        //dd($requisition);
        return view('pages.requisitions.editRequisition',array(
            'requisition' => $requisition
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Requisition  $requisition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request);
        $requisition_detail = RequisitionDetail::where('requisition_id','=',$id)->get();
        //dd($requisition_detail->item_name);

        for($i = 0; $i < sizeof($request->required_qnt); $i++)
        {
                //dd($requisition_detail);
                
                $requisition_detail[$i]->required_qnt = $request['required_qnt'][$i];
            
                $requisition_detail[$i]->save();
        }


       

            return redirect('requisitions/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Requisition  $requisition
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /*$requisition = Requisition::findOrFail($id);

        $requisition->delete();

        return redirect('requisitions');*/
    }
}
