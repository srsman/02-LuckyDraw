<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;
use App\Category;       //使用分类表
use App\SettingLink;  	//使用链接表
use App\SettingCode;	//使用领取码表
use App\SettingThing;	//使用实物表
use App\Code;           //使用领取码子表
use App\AwardUsers;      		//使用中奖信息填写表

class IndexController extends Controller
{
  //首页，抽奖页面
	public function index(){
  //抽奖算法 
	//抽取奖品的类别
    $award_rate=Category::all()->toArray();
	$v1 = array_fill(0,$award_rate[0]['award_rate'], 'link');
	$v2 = array_fill(0,$award_rate[1]['award_rate'], 'code');
	$v3 = array_fill(0,$award_rate[2]['award_rate'], 'thing');
    $arr = array_merge($v1, $v2, $v3);
   	// echo $arr[mt_rand(0,9999)];  //抽到的类别
   	//到对应的表查询权重
    	//抽到链接
    if($arr[mt_rand(0,9999)]=='link')
    {
    	$award=SettingLink::all()->toArray();
    	// 权重抽取算法
    	$arr=array(0);
    	$all=0;	
	    for($i=0;$i<count($award);$i++)
	    {
	    	$c[$i]=array_fill(0,$award[$i]['weight'] , $award[$i]['id']);
			$arr=array_merge($arr,$c[$i]);
			$all+=$award[$i]['weight'];
	    }
	    //抽取到幸运id
	   	$luck_id=$arr[mt_rand(1,$all)];
	   	//查询该id奖品信息
	   	$luckdraw=SettingLink::find($luck_id);
		
    }
    	//抽到领取码
    else if($arr[mt_rand(0,9999)]=='code')
    {
    	$award=SettingCode::all()->toArray();
    	// 权重抽取算法
    	$arr=array(0);	
    	$all=0;
	    for($i=0;$i<count($award);$i++)
	    {
	    	$c[$i]=array_fill(0,$award[$i]['weight'] , $award[$i]['id']);
			$arr=array_merge($arr,$c[$i]);
			$all+=$award[$i]['weight'];
	    }
	    //抽取到幸运id
	   	$luck_id=$arr[mt_rand(1,$all)];
	   	//查询该id奖品信息
	   	$luckdraw=SettingCode::find($luck_id)->toArray();
	   

    }
    	//抽到实物类
    else
    {
    	$award=SettingThing::all()->toArray();
    	// 权重抽取算法
    	$arr=array(0);	
    	$all=0;
	    for($i=0;$i<count($award);$i++)
	    {
	    	$c[$i]=array_fill(0,$award[$i]['weight'] , $award[$i]['id']);
			$arr=array_merge($arr,$c[$i]);
			$all+=$award[$i]['weight'];
	    }
	    //抽取到幸运id
	    $luck_id=$arr[mt_rand(1,$all)];
	    //查询该id奖品信息
	   	$luckdraw=SettingThing::find($luck_id)->toArray();
	   	
    }
    //返回奖品信息到视图

    return view('getPrize')->with('luckdraw',$luckdraw);

	}

    public function getWechatUserInfo(Request $request){
        //打开网页获取微信用户信息
    }

    public function fillInfo(Request $request){
        //此处仅保存更新存储用户中奖信息（非创建，应在打开页面时就创建用户数据）
        $input = $request->input(); 
        $data = array();
        $data['inputName'] = $input['inputName'];
        $data['inputPhone'] = $input['inputPhone'];
        $data['inputAddress'] = $input['inputAddress'];
        //openid应该使用全局变量
        //$newData = serialize($data);
        print_r($newData);
        //return $input;
        //return view('getPrize')
    }
  	




}
