<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\homeController;

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

// Route::group(['middleware' => 'admin'],function(){
//
// }

Route::group(['namespace' => 'App\Http\Controllers'], function(){
  Route::get('/','LoginController@getLogin');
  Route::get('login.html','LoginController@getLogin');
  Route::post('login.html','LoginController@postLogin');
  Route::get('logout.html','LoginController@logout');
});


Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin','middleware' => 'isadmin'], function(){
    Route::get('home.html','homeController@getHome');
    Route::get('logout.html','homeController@logout');

    Route::group(['prefix' => 'account'], function(){
      Route::get('list.html', 'accountController@getList');
      Route::get('add.html','accountController@getAdd');
      Route::post('add.html','accountController@postAdd');
      Route::get('edit/{id}.html','accountController@getEdit');
      Route::post('edit/{id}.html','accountController@postEdit');
      Route::get('delete/{id}.html', 'accountController@delete');
    });

    Route::group(['prefix' => 'room'], function(){
      Route::get('list.html', 'roomController@getList');
      Route::get('add.html','roomController@getAdd');
      Route::post('add.html','roomController@postAdd');
      Route::get('edit/{id}.html','roomController@getEdit');
      Route::post('edit/{id}.html','roomController@postEdit');
      Route::get('delete/{id}.html', 'roomController@delete');
    });

    Route::group(['prefix' => 'reason'], function(){
      Route::get('list.html', 'reasonController@getList');
      Route::get('add.html','reasonController@getAdd');
      Route::post('add.html','reasonController@postAdd');
      Route::get('edit/{id}.html','reasonController@getEdit');
      Route::post('edit/{id}.html','reasonController@postEdit');
      Route::get('delete/{id}.html', 'reasonController@delete');
    });

    Route::group(['prefix' => 'staff'], function(){
      Route::get('list.html', 'staffController@getList');
      Route::get('add.html','staffController@getAdd');
      Route::post('add.html','staffController@postAdd');
      Route::get('edit/{id}.html','staffController@getEdit');
      Route::post('edit/{id}.html','staffController@postEdit');
      Route::get('delete/{id}.html', 'staffController@delete');
    });

    Route::group(['prefix' => 'checking'], function(){
      Route::get('list.html', 'checkingController@getList');
      Route::get('add.html','checkingController@getAdd');
      Route::post('add.html','checkingController@postAdd');
      Route::get('edit/{id}.html','checkingController@getEdit');
      Route::post('edit/{id}.html','checkingController@postEdit');
      Route::get('delete/{id}.html', 'checkingController@delete');
    });

    Route::group(['prefix' => 'preoff'], function(){
      Route::get('list.html', 'preoffController@getList');
      Route::get('add.html','preoffController@getAdd');
      Route::post('add.html','preoffController@postAdd');
      Route::get('edit/{id}.html','preoffController@getEdit');
      Route::post('edit/{id}.html','preoffController@postEdit');
      Route::get('delete/{id}.html', 'preoffController@delete');
    });

});

// Route::namespace('Admin')->prefix('admin')->middleware(['admin'])->group(function(){
//
// });

// Route::group(['middleware' => 'admin', 'namespace' => 'Admin'],function(){
//
//
//
// });

Route::get('/dang-nhap.html', function () {
    return view('sign-in');
});

Route::get('/dang-ky.html', function () {
    return view('sign-up');
});
