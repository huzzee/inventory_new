<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemType;
use App\Models\ItemCategory;
use Illuminate\Http\Request;
use App\Http\Requests\ItemRequest;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::with('item_types','item_categories')->get();
        //dd($items);
        return view('pages.items.itemsList',array(
            'items' => $items
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item_cats = ItemCategory::all();
        $item_types = ItemType::all();

        //dd($item_cats);

        return view('pages.items.createItem',array(
            'item_cats' => $item_cats,
            'item_types' => $item_types
        )); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemRequest $request)
    {
        $upload_dir = base_path() . '/public/uploads';
        
        if($request->item_image !== null){
            
            $file = $request->file('item_image');
            $ext = $file->getClientOriginalExtension();
            $filename = $request->get('item_name').'_'.$request->get('catagory_id').'.'.$ext;
            $file->move($upload_dir, $filename);
            //dd($filename);
        }
        else
        {
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

        if($request->is_saleable == null)
        {
            $is_saleable = 0;
        }
        else
        {
            $is_saleable = 1;
        }

        //dd($request->all());

        $items = new Item;

            $items->item_name = $request['item_name'];
            $items->catagory_id = $request['catagory_id'];
            $items->type_id = $request['type_id'];
            $items->opening_qnt = $request['opening_qnt'];
            $items->current_qnt = $request['current_qnt'];
            $items->min_qnt = $request['min_qnt'];
            $items->item_image = $filename;
            $items->status = $status;
            $items->is_saleable = $is_saleable;
            
            
            if($request->description !== null)
            {
                $items->description = $request['description'];
                
            }
            if($is_saleable == 1)
            {
                $items->item_unit = $request['item_unit'];
                $items->unit_price = $request['unit_price'];
                $items->discount_price = $request['discount_price'];
                $items->discount_percent = $request['discount_percent'];
            }

            $items->save();

            return redirect('items');


        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //dd($id);
        $items = Item::findOrFail($id);

        $items->delete();

        return redirect('items');
    }
}
