<?php

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix'=>'category','namespace'=>'API'] ,function(){
    Route::get('list','ApiController@categoryList'); //list
    Route::post('create','ApiController@createCategory'); //create
    Route::get('details/{id}','ApiController@categoryDetails'); //details
    // Route::post('details','ApiController@categoryDetails'); //details
    Route::get('delete/{id}','ApiController@categoryDelete'); //delete
    Route::post('update','ApiController@categoryUpdate');//update
 });

