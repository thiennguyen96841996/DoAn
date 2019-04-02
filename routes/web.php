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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
	Route::get('/', function () {
    	return view('admin.welcome');
	});
    Route::get('/home', 'HomeController@index')->name('admin.home');
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('admin.logout');
    Route::get('register', 'Auth\RegisterController@showRegistrationForm');
    Route::post('register', 'Auth\RegisterController@register')->name('admin.register');
    Route::resource('user', 'User\UserController', ['except' => 'show']);
    Route::resource('department', 'User\DepartmentController', ['except' => 'show', 'destroy']);
    Route::resource('product', 'ProductController');
    Route::resource('category', 'CategoryController', ['except' => 'show', 'destroy']);
    Route::delete('image/{id}', 'ProductController@deleteImage')->name('admin.image');
    Route::resource('customer', 'CustomerController', ['except' => 'show']);
    Route::resource('producer', 'ProducerController', ['except' => 'show']);
    Route::resource('supplierGroup', 'SupplierGroupController', ['except' => 'show', 'create', 'destroy']);
    Route::post('group', 'ProducerController@createGroup')->name('groupncc');
    Route::resource('table', 'TableController');
    Route::resource('tableGroup', 'TableGroupController', ['except' => 'show', 'create', 'destroy']);
    Route::resource('dealProduct', 'DealProductController', ['except' => 'edit', 'update', 'destroy']);
    Route::post('getProduct', 'DealProductController@getProduct')->name('getProduct');
});
