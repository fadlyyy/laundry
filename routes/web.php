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
    return redirect('beranda');
});

Route::group(['middleware'=>'auth'],function(){

	Route::get('beranda','Beranda_controller@index');

	Route::get('paket-laundry','Paket_controller@index');

	Route::get('paket-laundry/add','Paket_controller@add');
	Route::post('paket-laundry/add','Paket_controller@store');

});

Auth::routes();

Route::get('/home', function(){
	return redirect('beranda');
});

Route::get('keluar',function(){
	\Auth::logout();
	return redirect('login');
});
