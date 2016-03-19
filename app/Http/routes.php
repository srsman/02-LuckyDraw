<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('login');
});

Route::get('/admin', function () {
    return view('setPrize');
});

Route::get('/admin/setPrize', function () {
    return view('setPrize');
});

Route::get('/admin/queryPrize', function () {
    return view('queryPrize');
});

Route::get('/admin/changePasswd', function () {
    return view('changePasswd');
});

Route::get('/getPrize', function () {
    return view('getPrize');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
