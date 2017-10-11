<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;



class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $suppliers = Supplier::all();
        return view('pages.suppliers.supplierslist' , compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.suppliers.supplierAdd');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
    
        

        $upload_dir = base_path() . '/public/uploads';
        
        if($request->sup_image !== null){

            $request->validate([

            'sup_name' => 'required',

            'sup_email' => 'required',

            'sup_address' => 'required',

            'sup_phone' => 'required',

            'sup_image' => 'image|mimes:jpeg,png|max:2048'

            ]);

            
            $file = $request->file('sup_image');
            $ext = $file->getClientOriginalExtension();
            $filename = $request->get('sup_email').".".$ext;
            $file->move($upload_dir, $filename);
    
        }
        else
        {
            $request->validate([

            'sup_name' => 'required',

            'sup_email' => 'required',

            'sup_address' => 'required',

            'sup_phone' => 'required|integer',

            ]);

            $filename = 'avatar.png';
        }


        if($request->status == null)
        {
            $status = 0;
        }
        else
        {
            $status = 1;
        }


        $supplier = new Supplier;

            $supplier->sup_name = $request['sup_name'];
            $supplier->sup_email = $request['sup_email'];
            $supplier->sup_address = $request['sup_address'];
            $supplier->sup_phone = $request['sup_phone'];
            $supplier->sup_image = $filename;
            $supplier->status = $status; 

            $supplier->save();

            return redirect('suppliers');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $suppliers = Supplier::findOrFail($id);

        $suppliers->delete();

        return redirect('suppliers');
    }
}
