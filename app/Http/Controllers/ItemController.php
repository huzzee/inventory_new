<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemType;
use App\Models\ItemCategory;
use Illuminate\Http\Request;
use App\Http\Requests\ItemRequest;

class ItemController extends Controller
{
    public function __construct()
    {
       $this->middleware('user_privilage',['except' => ['store','update']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::with('item_types','item_categories')->where('items.status','=',1)->get();
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
        $item_cats = ItemCategory::where('status','=',1)->get();
        $item_types = ItemType::where('status','=',1)->get();

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
            $items->current_qnt = $request['opening_qnt'];
            $items->min_qnt = $request['min_qnt'];
            $items->item_code = $request['item_code'];
            $items->item_image = $filename;
            $items->status = $status;
            $items->is_saleable = $is_saleable;
            $items->item_unit = $request['item_unit'];
            $items->unit_price = $request['unit_price'];
            
            
            if($request->description !== null)
            {
                $items->description = $request['description'];
                
            }
            

            $items->save();

            return redirect('items')->with('message','Items created Succesfully');


        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $items = Item::with('item_types','item_categories')->where('items.id','=',$id)->get();
        //dd($items);

        return view('pages.items.itemShow',array(
            'items' => $items,
            
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //check_user_privilage();
        //$items = $item;
        $item_cats = ItemCategory::pluck('item_cat_name','id');
        $item_types = ItemType::pluck('item_type_name','id');

        //dd($item);

        return view('pages.items.itemEdit',array(
            'item' => $item,
            'item_cats' => $item_cats,
            'item_types' => $item_types
        ));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(ItemRequest $request,$id)
    {
        //dd($id);
        $upload_dir = base_path() . '/public/uploads';
        
        if($request->item_image !== null){
            
            $file = $request->file('item_image');
            $ext = $file->getClientOriginalExtension();
            $filename = $request->get('item_name').'_'.$request->get('catagory_id').'.'.$ext;
            $file->move($upload_dir, $filename);
            //dd($filename);
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

        $items = Item::findOrFail($id);

            $items->item_name = $request['item_name'];
            $items->catagory_id = $request['catagory_id'];
            $items->type_id = $request['type_id'];
            $items->opening_qnt = $request['opening_qnt'];
            $items->min_qnt = $request['min_qnt'];
            $items->item_code = $request['item_code'];
            $items->item_unit = $request['item_unit'];
            $items->unit_price = $request['unit_price'];
            if($request->item_image !== null){
                $items->item_image = $filename;
            }
            $items->status = $status;
            $items->is_saleable = $is_saleable;
            
            
            if($request->description !== null)
            {
                $items->description = $request['description'];
                
            }
            

            $items->save();

            return redirect('items')->with('message','Items Updated Succesfully');
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

        $items->status = 0;

        $items->save();

        return redirect('items');
    }
}
