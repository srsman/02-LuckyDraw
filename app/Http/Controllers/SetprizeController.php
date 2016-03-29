<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;

use App\Http\Requests;
use Excel;				//使用excel包
use App\SettingThing;   //使用实物奖项设置表
use App\SettingLink;    //使用链接奖项设置表
use App\SettingCode;   	//使用领取码奖项设置表
use App\Code;   		//使用领取码子表
use App\Category;   	//使用分类奖项设置表
use App\AwardUsers;  	//使用个人信息表
use Request;   			//输入类
use DB;  				//数据连接类
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Config;


class SetprizeController extends Controller
{
    //显示设置信息
    public function index(){

    	$rates  =  Category::all()->toArray();
    	$links  =  SettingLink::all()->toArray();
        $codes  =  SettingCode::all()->toArray();
        $things =  SettingThing::all()->toArray();
        // print_r($rates);
        return view('setPrize',['rates'=>$rates,'links' => $links, 'codes' => $codes, 'things' => $things]);
    }
    //设置三大奖项的概率
    public function setcategory(){

    	//链接
    	$lin_rate=Request::input('link_rate')*100;	
    	Category::where('type','=','link')->update(['award_rate'=>$lin_rate]);
    	//领取码
    	$code_rate=Request::input('code_rate')*100;
    	Category::where('type','=','code')->update(['award_rate'=>$code_rate]);
    	//实物
    	$thing_rate=Request::input('thing_rate')*100;
    	Category::where('type','=','thing')->update(['award_rate'=>$thing_rate]);
    	//重定向设置视图
    	return redirect('/admin/setPrize');
    }

    //增加链接奖项
    public function addlink(){

    	$new_link=new SettingLink;
    	$new_link->category_id=1;
    	$new_link->prize=Request::input('prize');
    	$new_link->name=Request::input('name');
    	$new_link->prize_url=Request::input('prizeurl');
    	$new_link->weight=Request::input('weight');
    	//上传图片并保存链接
    	$destinationPath = public_path().'\uploads\img';
    	$pic=Request::file('inputImg');
    	$fileName = md5(date('ymdhis')).'.'.$pic->getClientOriginalExtension();
        $file = Request::file('inputImg')->move($destinationPath, $fileName);
        $new_link->url=$fileName;
        $new_link->save();
        return redirect('/admin/setPrize');
    }

    //修改链接奖项
    public function editlink($id){

    	$link=SettingLink::find($id);
    	$link->prize=Request::input('prize');
    	$link->name=Request::input('name');
    	$link->prize_url=Request::input('prize_url');
    	$link->weight=Request::input('weight');
    	$pic= Request::file('inputImg');
    	if(!empty($pic)){
    		$fileName = md5(date('ymdhis')).'.'.$pic->getClientOriginalExtension();
	    	$destinationPath = public_path().'\uploads\img';
	        $file = Request::file('inputImg')->move($destinationPath, $fileName);
	        $link->url=$fileName;
    	}
        $link->save();
        return redirect('/admin/setPrize');
    }
    //删除链接奖项
    public function dellink($id){
    	SettingLink::destroy($id);
    	return redirect('/admin/setPrize');
    }
    //增加领取码奖项
    public function addcode(){

    	$new_code=new SettingCode;
    	$new_code->category_id=2;
    	$new_code->prize=Request::input('prize');
    	$new_code->name=Request::input('name');
    	$new_code->prize_url=Request::input('prize_url');
    	$new_code->weight=Request::input('weight');
    	 //上传图片并保存链接
    	$destinationPath = public_path().'\uploads\img';
    	$pic=Request::file('inputImg');
    	$fileName = md5(date('ymdhis')).'.'.$pic->getClientOriginalExtension();
        $file = Request::file('inputImg')->move($destinationPath, $fileName);
        $new_code->url=$fileName;
        $new_code->save();

        //上传领取码
        $excelpath = Request::file('inputExcel');
   		$excel_data = Excel::load($excelpath, function($reader) {
	    $excel_data = $reader->all();
	    $excel_data = $excel_data->toArray();        
	    $pd=$excel_data['0']['0'];
	    if(key($pd)=='领取码')
	    {	
	    	return $excel_data;

	     }
	         else
	         { 
	        		echo  "格式错误";
	         }
	     })->toArray();
   		foreach ($excel_data['0'] as  $value)
	    {

	        	$new_code_data= new Code;
	        	$new_code_data->code=$value['领取码'];
	        	$new_code_data->status=1;
	        	$new_code_data->cid=$new_code->id;
	        	$new_code_data->save();
	    }


        return redirect('/admin/setPrize');
    }
    //更新领取码奖项
    public function editcode($id){

    	$code=SettingCode::find($id);
    	$code->prize=Request::input('prize');
    	$code->name=Request::input('name');
    	$code->prize_url=Request::input('prize_url');
    	$code->weight=Request::input('weight');
    	$pic= Request::file('inputImg');
    	if(!empty($pic)){
    		$fileName = md5(date('ymdhis')).'.'.$pic->getClientOriginalExtension();
	    	$destinationPath = public_path().'\uploads\img';
	        $file = Request::file('inputImg')->move($destinationPath, $fileName);
	        $code->url=$fileName;
    	}
        $code->save();
        return redirect('/admin/setPrize');
    }
    //删除领取码奖项
    public function delcode($id){

    	SettingCode::destroy($id);
    	return redirect('/admin/setPrize');
    }
    //增加实物奖项
   	public function addthing(){

   		$new_thing=new SettingThing;
   		$new_thing->category_id=3;
    	$new_thing->prize=Request::input('prize');
    	$new_thing->name=Request::input('name');
    	// $new_thing->prizeurl=Request::input('prizeurl');
    	$new_thing->weight=Request::input('weight');
    	$new_thing->amount=Request::input('amount');
    	//上传图片并保存链接
    	$destinationPath = public_path().'\uploads\img';
    	$pic=Request::file('inputImg');
    	$fileName = md5(date('ymdhis')).'.'.$pic->getClientOriginalExtension();
        $file = Request::file('inputImg')->move($destinationPath, $fileName);
        $new_thing->url=$fileName;
        $new_thing->save();
        return redirect('/admin/setPrize');
   	}
   	//更新实物奖项
   	public function editthing($id){

   		$thing=SettingThing::find($id);
   		$thing->prize=Request::input('prize');
    	$thing->name=Request::input('name');
    	// $thing->priz_eurl=Request::input('prize_url');
    	$thing->weight=Request::input('weight');
    	$thing->amount=Request::input('amount');
    	$pic= Request::file('inputImg');
    	if(!empty($pic)){
    		$fileName = md5(date('ymdhis')).'.'.$pic->getClientOriginalExtension();
	    	$destinationPath = public_path().'\uploads\img';
	        $file = Request::file('inputImg')->move($destinationPath, $fileName);
	        $thing->url=$fileName;
    	}
    	$thing->save();
    	return redirect('/admin/setPrize');
   	}
   	//删除实物奖项
   	public function delthing($id){

   		SettingThing::destroy($id);
   		return redirect('/admin/setPrize');
   	}
   	//查询中奖信息
   	public function queryaward(){
   		//查询所有信息并分页
   		$querys = DB::table('award_user')->orderBy('created_at','desc')->Paginate(10);
   		return view('queryPrize')->with('querys',$querys);

   	}
   	//搜索中奖信息
   	public function searchaward(){
   		//搜索关键字查询中奖信息
   		$search=Request::input('search');
        $select=Request::input('optionsRadios');
        if($select=='all')
   		$querys = DB::table('award_user')->where('award_content','like','%'.$search.'%')->orderBy('created_at','desc')->Paginate(99999);
        else
            $querys = DB::table('award_user')->where('award_type','=',$select)->where('award_content','like','%'.$search.'%')->orderBy('created_at','desc')->Paginate(99999);
   		 return view('queryPrize')->with('querys',$querys)->with('search',$search);
   	}
}
