<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|['middleware' => 'login'
*/
//登录
Route::get('/admin/login', function () {
    return view('login');
});

Route::get('/v1/getPrize', function () {
    return view('getPrize');
});

Route::post('/admin/login','AdminController@login');

Route::post('/v1/fillInfo','IndexController@fillInfo');

/*Route::get('/getPrize', 'IndexController@index');*/
Route::get('/getPrize/CUID={id}', 'IndexController@index');

 Route::get('/getPrize/CUID={cuid}', 'IndexController@index');



Route::get('/wechat-test', 'Wechat\WechatController@test');

Route::post('admin/setPrize/thing', 'Admin\AdminController@setThing');

Route::post('admin/setPrize/link', 'Admin\AdminController@setLink');

Route::post('admin/setPrize/code', 'Admin\AdminController@setCode');

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

Route::group(['middleware' => 'login'], function()
{
    Route::get('admin/setPrize', 'Admin\AdminController@index');

    Route::get('admin/queryPrize', 'Admin\AdminController@queryAward');
    //修改密码
    Route::get('/admin/changePasswd', function () {
        return view('changePasswd');
    });
    Route::post('/admin/changePasswd','AdminController@changePasswd');
    //退出

    Route::get('admin/logout', 'AdminController@logout');
    
});

Route::any('/wechat', 'WechatController@serve');
