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
Route::resource('toDoList', 'toDoListController');
Route::resource('client', 'ClientController');
Route::resource('product', 'ProductController');
Route::resource('group_task', 'GrouptaskController');
