<?php

Route::controller('auth', 'Auth\AuthController', [
  'getLogin' => 'auth.login'
]);

Route::get('backend/dashboard', ['as' => 'backend.dashboard', 'uses' => 'Backend\DashboardController@index']);

Route::get('/', function () {
    return view('welcome');
});
