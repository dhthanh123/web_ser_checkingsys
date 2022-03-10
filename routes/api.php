<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\checkkingController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


//API route for register new user
Route::post('/register', 'App\Http\Controllers\API\RegisterController@register');
//API route for login user
Route::post('/checking', 'App\Http\Controllers\API\checkingController@checking');
//API route for get staff information
Route::post('/getstaff', 'App\Http\Controllers\API\staffController@getStaffbyid');
//API route for add checking
Route::post('/addtimekeeping', 'App\Http\Controllers\API\timekeepingController@add');
//API route for update checking
Route::post('/updatetimekeeping', 'App\Http\Controllers\API\timekeepingController@update');
//API check available to CheckIn
Route:: post('/checkcheckin','App\Http\Controllers\API\timekeepingController@checkcheckin');

//API get gmp_testbit
Route::get('/gettest', 'App\Http\Controllers\API\staffController@gettest');

// API update note in checking
Route::post('/checking/note_update','App\Http\Controllers\API\timekeepingController@update_note');
// API delete a checking
Route::post('/checking/delete','App\Http\Controllers\API\timekeepingController@delete');
