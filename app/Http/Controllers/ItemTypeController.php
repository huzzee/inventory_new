<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ItemType;

class ItemTypeController extends Controller
{
    public function index()
    {
    	$item_types = ItemType::all();

    	//dd($item_types);

    	return view('pages.items.item_type',array(
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

    	$items_type = new ItemType([
    		'item_type_name' => $request->item_type_name,
    		'status' => $status
    	]);

    	$items_type->save();

    	return redirect('item_types');
    }

    public function destroy($id)
    {
    	$item_type = ItemType::findOrFail($id);

    	$item_type->delete();

    	return redirect('item_types');
    }
}
