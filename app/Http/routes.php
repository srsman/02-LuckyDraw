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

Route::get('admin', 'Admin\AdminController@index');

Route::get('admin/queryPrize', 'Admin\AdminController@queryAward');

/*Route::get('/admin', function () {
    return view('setPrize');
});*/

Route::get('/admin/setPrize', function () {
    return view('setPrize');
});



/*Route::get('/admin/queryPrize', function () {
    return view('queryPrize');
});*/


Route::get('/admin/changePasswd', function () {
    return view('changePasswd');
});

Route::get('/getPrize', function () {
    return view('getPrize');
});

Route::get('/wechat-test', 'Wechat\WechatController@test');

Route::post('/admin/setPrize/thing', 'Admin\AdminController@setThing');

Route::post('/admin/setPrize/link', 'Admin\AdminController@setLink');

Route::post('/admin/setPrize/code', 'Admin\AdminController@setCode');

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

Route::any('/wechat', 'WechatController@serve');
