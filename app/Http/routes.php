<?php



 //登录
 Route::get('/admin/login', function () {
    return view('login');
 });
 Route::post('/admin/login','AdminController@login');

 //抽奖首页
 Route::get('/getPrize/CUID={cuid}', 'IndexController@index');
 //中奖填写个人信息
 Route::post('/getPrize/fillInfo/{cuid}','IndexController@fillInfo');

// Route::get('/wechat-test', 'Wechat\WechatController@test');


Route::group(['middleware' => 'login'], function()
{   
    //设置奖项
    Route::get('admin/setPrize', 'SetprizeController@index');    
    Route::post('admin/setPrize/category', 'SetprizeController@setcategory');

    //链接 新增 修改 删除
    Route::post('admin/setPrize/link', 'SetprizeController@addlink');
    Route::post('admin/setPrize/editlink/{id}', 'SetprizeController@editlink');
    Route::get('admin/setPrize/dellink/{id}', 'SetprizeController@dellink');

    //领取码 新增 修改 删除
    Route::post('admin/setPrize/code', 'SetprizeController@addcode');
    Route::post('admin/setPrize/editcode/{id}', 'SetprizeController@editcode');
    Route::get('admin/setPrize/delcode/{id}', 'SetprizeController@delcode');

    //实物 新增 修改 删除    
    Route::post('admin/setPrize/thing', 'SetprizeController@addthing');    
    Route::post('admin/setPrize/editthing/{id}', 'SetprizeController@editthing');    
    Route::get('admin/setPrize/delthing/{id}', 'SetprizeController@delthing');

    //查询中奖信息
    Route::get('admin/queryPrize', 'SetprizeController@queryaward');

    //搜索
    Route::post('admin/search', 'SetprizeController@searchaward');

    //修改密码
    Route::get('/admin/changePasswd', function () {
        return view('changePasswd');
    });
    Route::post('/admin/changePasswd','AdminController@changePasswd');

    //退出
    Route::get('admin/logout', 'AdminController@logout');
    
});

// Route::any('/wechat', 'WechatController@serve');
