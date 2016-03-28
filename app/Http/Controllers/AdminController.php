<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;  //连接数据表users
use App\Http\Requests\AdminRequest;  //登录验证规则
use App\Http\Requests\ChangepwdRequest;
use Request;   //输入类
use Session;

class AdminController extends Controller
{
    public function login(AdminRequest $request){
    	//获取输入的数据，在数据表users查找
    	$name=Request::input('name');
        $password=Request::input('password'); 
        $users = User::where('name', '=', $name)->where('password', '=', $password)->get()->toArray();
         // $pd=$users[0]['id'];
        //判断帐号和密码是否存在
        if(!empty($users[0]['id']))
        // print_r($users);
         {
        	 Session::put('name', $users[0]['name']);
        	 return redirect('admin/setPrize');
         }
        else 
        	// redirect('login');
        	echo "登录错误";


    }
    public function changePasswd(ChangepwdRequest $request){

    		//判断是否与原密码一致，一致则可以修改
    		// $password=Request::input('password');
    		// $user = User::where('password','=',$password)->get();
    		// $pd=$user->toArray();

    		// if(!empty($pd[0]['id']))
    		// {	
    			$user = User::find(1);
				$new_password=Request::input('new_password');    			
    			$user->password =$new_password;
    			$user->save();
                Session::flush();
                return redirect('admin/login');
    		// 	echo "修改成功";
    		// }
    		
    		

    }
    public function logout(){

        Session::flush();
        return redirect('admin/login');
    }

}
