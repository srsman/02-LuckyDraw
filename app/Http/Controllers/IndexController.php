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
use App\AwardUsers;      		//
use App\Cuid;			//使用cuid表

class IndexController extends Controller
{
  //首页，抽奖页面
	public  function index($cuid){
        //保存当前路径并判断是否获取过微信用户信息
        session_start();
        //print_r($_SESSION['wechat_user']);
        $_SESSION['index_url'] = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        //echo $_SESSION['index_url'];
        if(empty($_SESSION['wechat_user'])){
            return redirect('weixin');
        }

        //此处可加一个cuid和openid是否对应的判断todo（避免乱输cuid恶意兑奖）
        $is_openid = AwardUsers::where('wx_openid',$_SESSION['wechat_user']['id'])->get()->toArray();
        $count = AwardUsers::where('wx_openid',$_SESSION['wechat_user']['id'])->count ();
        /*print_r($is_openid);
        exit();*/
        for($i=0;$i<=$count;$i++){
            if(!empty($is_openid) && $is_openid[$i]['cuid']!=$cuid){
                echo '参数错误，非法访问';
                exit();
            }
        }
	
		//判断cuid是否存在数据库，存在则不能再抽奖
		$estimate_cuid=Cuid::where('cuid','=',$cuid)->get()->toArray();
		if(!empty($estimate_cuid))
		{
			// echo "您已抽过奖";
			// print_r($estimate_cuid);
			// $luckdraw
			if($estimate_cuid[0]['category_id']==1)
			{
				$luckdraw=SettingLink::find($estimate_cuid[0]['aid'])->toArray();
			}
			elseif ($estimate_cuid[0]['category_id']==2) {
				$luckdraw=SettingCode::find($estimate_cuid[0]['aid'])->toArray();
				$code=Code::where('cuid','=',$cuid)->get()->toArray();
				$luckdraw['code']=$code[0]['code'];
			}
			else {
				$luckdraw=SettingThing::find($estimate_cuid[0]['aid'])->toArray();
			}

			

		}
		else{
			//进行抽奖
			$luckdraw=$this->getaward($cuid);
			//将cuid,奖品的category_id,id录入数据表cuids
			$new_cuid=new Cuid;
			$new_cuid->cuid=$cuid;
			$new_cuid->category_id=$luckdraw['category_id'];
			$new_cuid->aid=$luckdraw['id'];
			$new_cuid->save();
			//储存中奖者信息进数据表award_user
			$new_award_user=new AwardUsers;
			$new_award_user->cuid=$cuid;
			//获得奖品类型
			$type=Category::find($luckdraw['category_id'])->type;
			$new_award_user->award_type=$type;
			$new_award_user->award_prize=$luckdraw['prize'];
			$new_award_user->award_content=$luckdraw['name'];
            $new_award_user->wx_nickname=$_SESSION['wechat_user']['nickname'];
            $new_award_user->wx_avatar=$_SESSION['wechat_user']['avatar'];
            $new_award_user->wx_openid=$_SESSION['wechat_user']['id'];
			$new_award_user->save();
		}
		//同类奖品随机出现三样
		//判断什么类型
		if($luckdraw['category_id']==1)
		{
			$name_arr=SettingLink::where('name','<>',$luckdraw['name'])->lists('name')->toArray();
			$name_rands=$this->randaward($name_arr);
		}
		else if($luckdraw['category_id']==2)
		{
			$name_arr=SettingCode::where('name','<>',$luckdraw['name'])->lists('name')->toArray();
			$name_rands=$this->randaward($name_arr);
		}
		else
		{
			$name_arr=SettingThing::where('name','<>',$luckdraw['name'])->lists('name')->toArray();
			$name_rands=$this->randaward($name_arr);
		}

		return view('getPrize',['luckdraw'=>$luckdraw,'name_rands'=>$name_rands,'cuid'=>$cuid]); 
		// print_r($name_rand);

	}

	//抽奖算法,获得奖品
	public function getaward($cuid){	   
	//取出概率大于0的奖品类
    $award_rate=Category::where('award_rate','>','0')->get()->toArray();
    //奖品概率算法
    $a=array(0);
    $rate_all=0;
    for($v=0;$v<count($award_rate);$v++)
    {
    	$r[$v]=array_fill(0, $award_rate[$v]['award_rate'], $award_rate[$v]['type']);
    	$a=array_merge($a,$r[$v]);   //整合为一个数组
    	$rate_all+=$award_rate[$v]['award_rate'];  //获得抽奖总长度
    }
   	// $a[mt_rand(1,$rate_all)];  //抽到的类别
   	// 到对应的表查询权重
    // 	抽到链接
    if($a[mt_rand(1,$rate_all)]=='link')
    {
    	$award=SettingLink::where('weight','>','0')->get()->toArray();
    
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
	   	$luckdraw=SettingLink::find($luck_id)->toArray();

		
    }
    	//抽到领取码
    else if($a[mt_rand(1,$rate_all)]=='code')
    {
    	// $award=SettingCode::all()->toArray();
    	//取出所有权重大于零的领取码奖项进行抽奖
    	$award=SettingCode::where('weight','>','0')->get()->toArray();
    	// print_r($award);
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
	   	//取得领取码
	   	$code=Code::where('cid','=',$luck_id)->where('status','=','1')->take(1)->get()->toArray();
	   	//传给奖品信息
	   	$luckdraw['code']=$code[0]['code'];
	 
	   	//把领取码子表status置0
	   	$code_status=Code::find($code[0]['id']);
	   	$code_status->status=0;
	   	$code_status->cuid=$cuid;
	   	$code_status->save();
	   	//检查该领取码奖项领取码是否被领完，如果被领完权重weight置0
	   	$estimate_status=Code::where('cid','=',$luck_id)->where('status','=','1')->get()->toArray();
	   	if(empty($estimate_status))
	   	{
	   		// echo "领取码没了";
	   		$settingcode_weight=SettingCode::find($luck_id);
	   		$settingcode_weight->weight=0;
	   		$settingcode_weight->save();
	   		//检查所有领取码是否被领完：如果所有权重都为0，则领取码类奖项概率award_rate置0
	   		$estimate_weight=SettingCode::where('weight','>','0')->get()->toArray();
	   		if(empty($estimate_weight))
	   		{
	   			$category_code=Category::where('type','=','code')->update(['award_rate' => 0]);
	   		}
	   	}

    }
    	//抽到实物类
    else
    {	
    	//查询所有权重大于0的实物奖项
    	$award=SettingThing::where('weight','>','0')->get()->toArray();
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
	    //查询该id奖品信息,实物数量减1
	   	$luckdraw=SettingThing::find($luck_id);
	   	$luckdraw->amount--;
	   	$luckdraw->save();
	  
	   	//如果实物数量为0那么将该权重置0
	   	if($luckdraw->amount==0)
	   	{
	   		$luckdraw->weight=0;
	   		$luckdraw->save();
	   		//检查实物是否都被领完:如果所有权重都为0，则实物的概率置0
	   		$estimate_weight=SettingThing::where('weight','>','0')->get()->toArray();
	   		if(empty($estimate_weight))
	   		{
	   			$category_thing=Category::where('type','=','thing')->update(['award_rate'=>0]);
	   		}


	   	}
	   	$luckdraw=$luckdraw->toArray();
       }
        return $luckdraw;
    }
    //随机奖品
    public function randaward($name_arr){
    	//判断奖品数量是否大于三，大于三则随机抽取，小于或等于三则返回
    	$p=count($name_arr)-3;
		if($p>0)
		{	
			$rand=array_rand($name_arr,3);
			$name_rand[0]=$name_arr[$rand[0]];
			$name_rand[1]=$name_arr[$rand[1]];
			$name_rand[2]=$name_arr[$rand[2]];

			return $name_rand;
		}
		else
			{
				$name_rand=$name_arr;
				return $name_rand;
			}

    }

    // public function getWechatUserInfo(Request $request){
    //     //打开网页获取微信用户信息
    // }
    //实物填写中奖信息
    public function fillInfo($cuid,Request $request){

    	$input = $request->input();
    	$award_realname = $input['award_realname'];
        $award_phone    = $input['award_phone'];
        $award_address  = $input['award_address'];
        $awarduser=AwardUsers::where('cuid','=',$cuid)->update(['award_realname'=>$award_realname,      'award_phone'=>$award_phone,'award_address'=>$award_address]); 

        return redirect('/getPrize/CUID='.$cuid);
    }

}
