<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

/*----------------------------------------------------
				    Resources Route
------------------------------------------------------*/

Route::Resource('menus','MenuController');// for menus
Route::Resource('users','UserController');// for manage users
Route::Resource('items','ItemController');// for manage items
Route::Resource('item_types','ItemTypeController');//item Types
Route::Resource('item_categories','ItemCategoryController');//item categories
Route::Resource('suppliers','SupplierController');//For Suppliers
Route::Resource('departments','MyDepartmentController');//For Department

/*----------------------------------------------------
				    Resources Route
------------------------------------------------------*/
//---------------------------------------------------------------
//---------------------------------------------------------------
/*----------------------------------------------------
				    Ajax Routes
------------------------------------------------------*/

/*----------------------------------------------------
				    Ajax Routes
------------------------------------------------------*/