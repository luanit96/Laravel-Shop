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

// Route::get('/', function () {
// 	return view('welcome');
// });

Route::get('admin',[
	'as'=>'admin',
	'uses'=>'UsersController@getLoginAdmin'
]);
Route::post('admin',[
	'as'=>'adminlogin',
	'uses'=>'UsersController@postLoginAdmin'
]);
Route::get('home/dangxuat',[
	'as'=>'dangxuat',
	'uses'=>'UsersController@getDangXuat'
]);

Route::get('admin/dangxuat',[
	'as'=>'dangxuatadmin',
	'uses'=>'UsersController@getDangXuatAdmin'
]);

Route::resource('admin/categories','CategoriesController');

Route::resource('admin/products','ProductsController');

Route::resource('admin/customers','CustomersController');

Route::resource('admin/orders','OrdersController');

Route::resource('admin/orderitems','OrderItemsController');

Route::resource('admin/slides','SlidesController');

Route::resource('admin/users','UsersController');

Route::resource('admin/bills','BillsController');

Route::resource('admin/billdetails','BillDetailsController');

Route::resource('admin/posts','PostsController');

Route::get('/',[
	'as'=>'home',
	'uses'=>'HomeController@index'
]);

Route::get('loai-san-pham-{catid}',[
	'as'=>'loaisanpham',
	'uses'=>'HomeController@getLoaiSp'
]);

Route::get('chi-tiet-san-pham-{productid}',[
	'as'=>'chitietsanpham',
	'uses'=>'HomeController@getChitiet'
]);

Route::get('gioi-thieu',[
	'as'=>'gioithieu',
	'uses'=>'HomeController@getGioiThieu'
]);

Route::get('tin-tuc',[
	'as'=>'tintuc',
	'uses'=>'HomeController@getTinTuc'
]);

Route::get('lien-he',[
	'as'=>'lienhe',
	'uses'=>'HomeController@getLienHe'
]);

Route::post('lien-he',[
	'as'=>'lienhe',
	'uses'=>'HomeController@postLienHe'
]);

Route::get('add-to-cart/{productid}',[
	'as'=>'themgiohang',
	'uses'=>'HomeController@getAddtoCart'
]);

Route::get('delete-to-cart/{productid}',[
	'as'=>'xoagiohang',
	'uses'=>'HomeController@getDeletetoCart'
]);


Route::get('dat-hang',[
	'as'=>'dathang',
	'uses'=>'HomeController@getCheckout'
]);

Route::post('dat-hang',[
	'as'=>'dathang',
	'uses'=>'HomeController@postCheckout'
]);

Route::get('search',[
	'as'=>'search',
	'uses'=>'HomeController@getSearch'
]);

Auth::routes();