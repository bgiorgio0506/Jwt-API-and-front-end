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
/*Pass trought a controller*/
Route::get('/','WebViewController@viewHompage');
Route::get('login','WebViewController@viewLogin');
Route::get('register','WebViewController@viewRegister');
Route::get('logout', 'WebAuthController@logout');
Route::get('dashboard', 'WebViewController@viewDashboard');
