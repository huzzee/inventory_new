<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item_category;
use App\Models\Item_type;

class ItemCategoryController extends Controller
{
    public function index()
    {
    	$item_cats = Item_category::all();
    	$item_types = Item_type::all();

    	return view('pages.items.itemscat.item_cat',array(
    		'item_types' => $item_types,
    		'item_cats' => $item_cats
    	));

    }
}
