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

use MongoDB\Client as Mongo;

Route::get('mongo', function(Request $request){
    //$collection = (new Mongo)->mydatabase->users;
    $collection = Mongo::get()->mydatabase->users;

    return $collection->find()->toArray();
});


Route::get('/', function () {
    return view('welcome');
});

Route::get('add','CarController@create');
Route::post('add','CarController@store');
Route::get('car','CarController@index');
Route::get('edit/{id}','CarController@edit');
Route::post('edit/{id}','CarController@update');
Route::delete('{id}','CarController@destroy');