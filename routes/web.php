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


Route::get('backend/pages/{page}/confirm', ['as' => 'backend.pages.confirm', 'uses' => 'Backend\PagesController@confirm']);
Route::resource('backend/pages', 'Backend\PagesController', [
  'names' => [
    'index' => 'backend.pages.index',
    'create' => 'backend.pages.create',
    'store' => 'backend.pages.store',
    'destroy' => 'backend.pages.destroy',
    'update' => 'backend.pages.update',
    'edit' => 'backend.pages.edit',
    'show' => 'backend.pages.show',
  ]
]);

Route::get('backend/blog/{blog}/confirm', ['as' => 'backend.blog.confirm', 'uses' => 'Backend\BlogController@confirm']);
Route::resource('backend/blog', 'Backend\BlogController', [
  'names' => [
    'index' => 'backend.blog.index',
    'create' => 'backend.blog.create',
    'store' => 'backend.blog.store',
    'destroy' => 'backend.blog.destroy',
    'update' => 'backend.blog.update',
    'edit' => 'backend.blog.edit',
    'show' => 'backend.blog.show',
  ]
]);


Route::get('backend/dashboard', ['as' => 'backend.dashboard', 'uses' => 'Backend\DashboardController@index']);

Route::get('backend', function() {
  return redirect('backend/dashboard');
});
