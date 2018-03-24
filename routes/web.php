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

Route::get('/', function (){
   return view('layouts.main');
});
Route::get('/tasks','TasksController@index');
Route::post('/add-task','TasksController@addTask');
Route::post('/select-task/{id}','TasksController@selTask');
Route::post('/change-task/{id}','TasksController@changeTask');