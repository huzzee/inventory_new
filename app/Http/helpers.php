<?php

use App\Models\Menu;
use App\Models\Permission;

function callMenus(){

	$user_id = Auth::user()->id;

	$menus = Permission::with('menus')->where('permissions.status', 1)->where('user_id',$user_id)
	->whereHas('menus',function($query){
		$query->where('hidden',0);
	})->orderBy('id','desc')->get();

	//dd($menus);
	return $menus;
}

function check_user_privilage(){

	//dd(Request::getRequestUri());
	$p_arr = [];
	$permissions = DB::table('permissions')
					->leftjoin('menus', 'menus.id', '=', 'permissions.menu_id')
					->select('menus.menu_route')
					->where('user_id', '=', Auth::user()->id)
					->where('permissions.status', '=', 1)
					->whereNotNull('menus.menu_route')
					->get();
					foreach ($permissions as $value) {
						
						array_push($p_arr, $value->menu_route);
					}

				
	$data = in_array(Request::route()->getName(), $p_arr);
	//dd($data);
		if(!$data) {
			return abort(404);
		}

}