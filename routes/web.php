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

Route::group(['prefix' => '/'], function() {
    Route::get('/','TaskController@index')->name('task.index');
     Route::get('create/','TaskController@create')->name('task.create');
     Route::post('post/','TaskController@store')->name('task.store');
//    Route::get('task/show/{id}','TaskController@show')->name('task.show');
    Route::get('task/edit/{id}','TaskController@edit')->name('task.edit');
    Route::put('task/show/{id}','TaskController@update')->name('task.update');
//    Route::delete('task/{id}','TaskController@destroy')->name('task.destroy');

});
Route::group(['prefix' => '/user'], function() {
    Route::get('/','UserController@index')->name('user.index');
     Route::get('create/','UserController@create')->name('user.create');
     Route::post('post/','UserController@store')->name('user.store');
    Route::get('/edit/{id}','UserController@edit')->name('user.edit');
    Route::put('/show/{id}','UserController@update')->name('user.update');

});
