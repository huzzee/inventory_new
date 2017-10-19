<?php

namespace App\Http\Controllers;

use App\Models\PurchaseOrderMaster;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Supplier;
use App\Models\PurchaseOrderDetail;
use App\User;
use Carbon\Carbon;

class PurchaseOrderMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchase_order = PurchaseOrderMaster::with('purchaseOrderDetails','users','suppliers')->get();

        //dd($purchase_order[0]->suppliers);

        return view('pages.PurchaseOrder.purchaseOrderList',array(
            
            'purchase_order' => $purchase_order
        ));

    }


    public function approved_order()
    {
        $purchase_order = PurchaseOrderMaster::with('purchaseOrderDetails','users','suppliers')->where('purchase_order_masters.approved','=',1)->latest()->get();
        //dd($purchase_order);
         return view('pages.PurchaseOrder.approvedPurchase',array(
            
            'purchase_order' => $purchase_order
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = Item::all();
        $suppliers = Supplier::all();

        return view('pages.PurchaseOrder.makePurchaseOrder',array(
            'items' => $items,
            'suppliers' => $suppliers
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
            'supplier_id' => 'required',
            'created_date' => 'required',
            'item_id' => 'required',
        ]);


        $purchase_order_master = new PurchaseOrderMaster;
        $purchase_order_master->user_id = $request['user_id'];
        $purchase_order_master->supplier_id = $request['supplier_id'];
        $purchase_order_master->created_date = date('Y-m-d', strtotime($request['created_date']));
        if($purchase_order_master->quatation_nmbr !== null)
        {
            $purchase_order_master->quatation_nmbr = $request['quatation_nmbr'];
        }
        $purchase_order_master->purchase_code = mt_rand(11258,100000000);

        $purchase_order_master->save();

        //dd($purchase_order_master->id);
        for($i = 0; $i < sizeof($request->item_id); $i++)
        {

            $puchase_order_detail = new PurchaseOrderDetail([
                'purchase_order_master_id' => $purchase_order_master->id,
                'item_id' => $request->item_id[$i],
                'order_qnt' => $request->order_qnt[$i],
                'item_rate' => $request->item_rate[$i],
                'total_amount' => $request->total_amount[$i]
            ]);
            $puchase_order_detail->save();
        }

        return redirect('purchase');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PurchaseOrderMaster  $purchaseOrderMaster
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //dd($id);
        $purchase_order = PurchaseOrderMaster::with('purchaseOrderDetails','users','suppliers')->where('purchase_order_masters.id','=',$id)->get();
        //dd($purchase_order[0]->approval_by);
        $users = User::where('users.id','=',$purchase_order[0]->approval_by)->get();
        //dd($purchase_order);
        return view('pages.PurchaseOrder.showPurchase',array(
            'purchase_order' => $purchase_order,
            'users' => $users
        ));
    }


    public function purchase_approved(Request $request)
    {
        
        $purchase_order = PurchaseOrderMaster::findOrFail($request->req_id);
        //dd($purchase_order);
        $purchase_order->approved = 1;
        $purchase_order->rejected = 0;
        $purchase_order->Approval_by = $request->approval_by;
        $purchase_order->approval_date = Carbon::now();

        $purchase_order->save();

        return redirect('purchase');
    }

    public function purchase_rejected(Request $request)
    {
        $purchase_order = PurchaseOrderMaster::findOrFail($request->req_id);

        $purchase_order->approved = 0;
        $purchase_order->rejected = 1;
        $purchase_order->Approval_by = $request->approval_by;
        $purchase_order->approval_date = Carbon::now();

        $purchase_order->save();

        return redirect('purchase');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PurchaseOrderMaster  $purchaseOrderMaster
     * @return \Illuminate\Http\Response
     */
    public function edit(PurchaseOrderMaster $purchaseOrderMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PurchaseOrderMaster  $purchaseOrderMaster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PurchaseOrderMaster $purchaseOrderMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PurchaseOrderMaster  $purchaseOrderMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(PurchaseOrderMaster $purchaseOrderMaster)
    {
        //
    }


    /*Printing*/

    public function permit_print(Request $request)
    {
        $purchase_order = PurchaseOrderMaster::findOrFail($request->req_id);
        $purchase_order->printed = 0;

        $purchase_order->save();

        return redirect()->back();
    }

     /*Printing*/

    /*Ajax Requests*/

    public function printed_order()
    {
        $purchase_order = PurchaseOrderMaster::findOrFail(request()->order_id['purchase_id']);
        $purchase_order->printed = 1;

        $purchase_order->save();


        return response()->json('ok');
    }
}
