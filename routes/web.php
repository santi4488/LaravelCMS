<?php
Route::group(['prefix' => 'auth'], function(){
  Auth::routes();
});

Route::get('backend/users/{user}/confirm', ['as' => 'backend.users.confirm', 'uses' => 'Backend\UsersController@confirm']);
Route::resource('backend/users', 'Backend\UsersController', [
  'names' => [
    'index' => 'backend.users.index',
    'create' => 'backend.users.create',
    'store' => 'backend.users.store',
    'destroy' => 'backend.users.destroy',
    'update' => 'backend.users.update',
    'edit' => 'backend.users.edit',
  ],
  'except' => [
    'show'
  ]
]);


Route::get('backend/dashboard', ['as' => 'backend.dashboard', 'uses' => 'Backend\DashboardController@index']);

Route::get('/', function () {
    return view('welcome');
});
