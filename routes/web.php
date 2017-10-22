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
Route::middleware(['auth'])->group(function(){

	Route::Resource('menus','MenuController');// for menus
	Route::Resource('users','UserController');// for manage users
	Route::Resource('roles','RoleController');//For Designation
	Route::Resource('items','ItemController');// for manage items
	Route::Resource('item_types','ItemTypeController');//item Types
	Route::Resource('item_categories','ItemCategoryController');//item categories
	Route::Resource('suppliers','SupplierController');//For Suppliers
	Route::Resource('departments','MyDepartmentController');//For Department
	Route::Resource('requisitions','RequisitionController');// For Departments Requests
	Route::get('requisitions_complete','RequisitionController@complete_req')->name('app_req');// For Departments Requests
	Route::post('requisitions_approved','RequisitionController@approved_req');// For Departments Requests
	Route::post('requisitions_rejected','RequisitionController@rejected_req');// For Departments Requests
	Route::Resource('purchase','PurchaseOrderMasterController');// For Purchase Orders
	Route::get('approved_puchase','PurchaseOrderMasterController@approved_order')->name('app_purchase');// For Purchase Orders
	Route::post('purchase_orders_approved','PurchaseOrderMasterController@purchase_approved');// For Purchase Orders
	Route::post('purchase_orders_rejected','PurchaseOrderMasterController@purchase_rejected');// For Purchase Orders
	Route::post('permit_print','PurchaseOrderMasterController@permit_print');// For Purchase Orders
	Route::Resource('grn','grnMasterController');// For Good Receive
	Route::Resource('issuance','IssuanceMasterController');//For Issuance Slip
});
/*----------------------------------------------------
				    Resources Route
------------------------------------------------------*/
//---------------------------------------------------------------
//---------------------------------------------------------------

/*----------------------------------------------------
				    Ajax Routes
------------------------------------------------------*/
//Route::get('pirinted','PurchaseOrderMasterController@printed_order');// For Purchase Orders
Route::get('check_code','grnMasterController@chk_code');// For Good Receive
Route::get('req_check','IssuanceMasterController@chk_req_code');//For Issuance Slip
/*----------------------------------------------------
				    Ajax Routes
------------------------------------------------------*/