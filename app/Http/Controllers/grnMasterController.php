<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Supplier;
use App\Models\grnMaster;
use App\Models\grnDetail;

class grnMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $grnMaster = grnMaster::with('grnDetails','users','suppliers')->latest()->get();

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

        $grnMaster = new grnMaster;

        $grnMaster->user_id = $request['user_id'];
        $grnMaster->supplier_id = $request['supplier_id'];
        $grnMaster->purchase_order_id = $request['purchase_order_code'];
        $grnMaster->dn_code = $request['dn_code'];

        $grnMaster->save();


        for($i = 0; $i < sizeof($request->item_id); $i++)
        {         
            $grnDetail = new grnDetail([
                'grn_master_id' => $grnMaster->id,
                'item_id' => $request->item_id[$i],
                'recieved_qnt' => $request->order_qnt[$i],
                'per_unit_rate' => $request->item_rate[$i],
                'total_amount' => $request->total_amount[$i]
            ]);
            $grnDetail->save();

            $items = Item::where('id', $request->item_id[$i])->first();
            $new_qnt = $items->current_qnt + $request->order_qnt[$i];

            Item::where('id' ,$request->item_id[$i])->update([
                'current_qnt' => $new_qnt,
                'last_purchase_rate' => $request->item_rate[$i],
                'last_purchase_qnt' => $request->order_qnt[$i],
            ]);
            
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
        $grnMaster = grnMaster::where('id', $id)->with('grnDetails','users','suppliers')->first();
        
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
}
