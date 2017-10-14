<?php

namespace App\Http\Controllers;

use App\Models\Requisition;
use Illuminate\Http\Request;
use App\User;
use App\Models\Item;
use App\Models\MyDepartment;
use App\Models\RequisitionDetail;
use Auth;

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

        //dd($requisitions[0]->requisitionDetails->count());
        return view('pages.requisitions.requisitionsList',array(
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
            'item_name' => 'required',
            'required_qnt' => 'required',
            'reason' => 'required|min:15'
        ]);

        $requisition = new Requisition([
            'user_id' => $request->user_id,
            'department_id' => $request->department_id,
            
            'reason' => $request->reason
        ]);

        $requisition->save();

        for($i = 0; $i < sizeof($request->item_name); $i++)
        {

            $requisition_detail = new RequisitionDetail([
                'requisition_id' => $requisition->id,
                'item_name' => $request->item_name[$i],
                'required_qnt' => $request->required_qnt[$i]
            ]);
            $requisition_detail->save();
        }


       

            return redirect('requisitions/create');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Requisition  $requisition
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $requisition = Requisition::findOrFail($id)->with('requisitionDetails','users','departments')->get();
        //dd($requisition);
        return view('pages.requisitions.showRequisitions',array(
            'requisition' => $requisition
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Requisition  $requisition
     * @return \Illuminate\Http\Response
     */
    public function edit(Requisition $requisition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Requisition  $requisition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Requisition $requisition)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Requisition  $requisition
     * @return \Illuminate\Http\Response
     */
    public function destroy(Requisition $requisition)
    {
        //
    }
}
