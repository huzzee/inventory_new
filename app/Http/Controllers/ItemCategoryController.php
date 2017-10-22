<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ItemCategory;
use App\Models\ItemType;

class ItemCategoryController extends Controller
{
    public function __construct()
    {
       $this->middleware('user_privilage',['except' => ['store']]);
    }

    public function index()
    {
    	$item_cats = ItemCategory::where('status','=',1)->get();
    	
    	//dd($item_cats);
    	return view('pages.items.item_cat',array(
    		
    		'item_cats' => $item_cats
    	));

    }

    public function store(Request $request)
    {
    	//dd($request);

    	$request->validate([
    		'item_cat_name' => 'required',
    		
    	]);


    	if($request->status == null)
    	{
    		$status = 0;
    	}
    	else{
    		$status = 1;
    	}

    	$item_cat = new ItemCategory([
    		'item_cat_name' => $request->item_cat_name,
    		'status' => $status
    	]);
    	$item_cat->save();

    	return redirect('item_categories')->with('message','Item Category created Succesfully');
    }

    public function destroy($id)
    {
        $item_cat = ItemCategory::findOrFail($id);

        $item_cat->status = 0;

        $item_cat->save();

        return redirect('item_categories');
    }
}
