<?php
Route::view('/', 'welcome');
Auth::routes(['verify' => true]);

Route::get('/login/writer', 'Auth\LoginController@showWriterLoginForm');

Route::get('/register/writer', 'Auth\RegisterController@showWriterRegisterForm');

Route::post('/writer/login/', 'Auth\LoginController@writerLogin');

Route::post('/register/writer', 'Auth\RegisterController@createWriter');

Route::view('/home', 'home')->middleware('auth', 'verified');

Route::view('/writer', 'writer');

require_once "admin_routes.php";

require_once "org_admin_routes.php";