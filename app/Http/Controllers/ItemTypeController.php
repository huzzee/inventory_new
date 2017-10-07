<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item_type;

class ItemTypeController extends Controller
{
    public function index()
    {
    	$item_types = Item_type::where('status','=',1)->get();

    	//dd($item_types);

    	return view('pages.items.itemstype.item_type',array(
    			'item_types' => $item_types
    	));
    }

    public function store(Request $request)
    {
    	//dd(request()->status);
    	$request->validate([
    		'item_type_name' => 'required|string',
    	]);

    	if($request->status == null)
    	{
    		$status = 0;
    	}
    	else{
    		$status = 1;
    	}

    	$items_type = new Item_type([
    		'item_type_name' => $request->item_type_name,
    		'status' => $status
    	]);

    	$items_type->save();

    	return redirect('item_types');
    }
}
