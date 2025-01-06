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
Route::get('/', function () {
    return view('welcome');
});

Route::get('/item','ItemController@index');
//route CRUD
Route::get('/uom','UomController@index');
Route::get('/uom/tambah','UomController@tambah');
Route::post('/uom/store','UomController@store');
Route::get('/uom/edit/{id}','UomController@edit');
Route::post('/uom/update','UomController@update');
Route::get('/uom/hapus/{id}','UomController@hapus');

//route CRUD
Route::get('/item','ItemController@index');
Route::get('/item/tambah','ItemController@tambah');
Route::post('/item/store','ItemController@store');
Route::get('/item/edit/{id}','ItemController@edit');
Route::post('/item/update','ItemController@update');
Route::get('/item/hapus/{id}','ItemController@hapus');

//route CRUD
Route::get('/item_category','ItemCategoryController@index');
Route::get('/item_category/tambah','ItemCategoryController@tambah');
Route::post('/item_category/store','ItemCategoryController@store');
Route::get('/item_category/edit/{id}','ItemCategoryController@edit');
Route::post('/item_category/update','ItemCategoryController@update');
Route::get('/item_category/hapus/{id}','ItemCategoryController@hapus');

//route CRUD
Route::get('/inventory','InventoryController@index');
Route::get('/inventory/tambah','InventoryController@tambah');
Route::post('/inventory/store','InventoryController@store');
Route::get('/inventory/editinbound/{id}','InventoryController@editinbound');
Route::get('/inventory/editoutbound/{id}','InventoryController@editoutbound');
Route::post('/inventory/update','InventoryController@update');
Route::get('/inventory/postinginbound/{id}/{item_id}/{qty}','InventoryController@postinginbound');
Route::get('/inventory/postingoutbound/{id}/{item_id}/{qty}','InventoryController@postingoutbound');
Route::get('/inventory/hapusinbound/{id}','InventoryController@hapusinbound');
Route::get('/inventory/hapusoutbound/{id}','InventoryController@hapusoutbound');
