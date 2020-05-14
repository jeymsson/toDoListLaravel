<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('client', 'ClientController@index2json');
Route::get('client/{id}', 'ClientController@show2json');

Route::post('client', 'ClientController@store');
Route::delete('client/{id}', 'ClientController@destroy');
Route::put('client/{id}', 'ClientController@update');

Route::get('product', 'ProductController@index2json');
Route::get('product/{id}', 'ProductController@show2json');
Route::post('product', 'ProductController@store');
Route::delete('product/{id}', 'ProductController@destroy');
Route::put('product/{id}', 'ProductController@update');

Route::get('group_task', 'GrouptaskController@index2json');
Route::get('group_task/{id}', 'GrouptaskController@show2json');
Route::post('group_task', 'GrouptaskController@store');
Route::delete('group_task/{id}', 'GrouptaskController@destroy');
Route::put('group_task/{id}', 'GrouptaskController@update');


Route::resource('country', 'CountryController');
