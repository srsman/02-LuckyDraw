<?php

namespace App\Http\Controllers\Wechat;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use EasyWeChat\Foundation\Application;

class WechatController extends Controller
{
    public function test(){
        $config = [
          // ...
          'oauth' => [
              'scopes'   => ['snsapi_userinfo'],
              'callback' => '/oauth_callback',
          ],
          // ..
        ];
        $app = new Application($config);
        $response = $app->oauth->scopes(['snsapi_userinfo'])
                          ->redirect();
        return $response;                  
    }

    public function oauth_callback(){
        return 'hi';
    }
}
