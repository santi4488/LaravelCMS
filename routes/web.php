<?php
Route::group(['prefix' => 'auth'], function(){
  Auth::routes();
});


Route::get('backend/dashboard', ['as' => 'backend.dashboard', 'uses' => 'Backend\DashboardController@index']);

Route::get('/', function () {
    return view('welcome');
});
