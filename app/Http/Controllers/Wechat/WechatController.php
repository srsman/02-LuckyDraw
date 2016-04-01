<?php

namespace App\Http\Controllers\Wechat;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use EasyWeChat\Foundation\Application;

class WechatController extends Controller
{
    public function getInfo(){
        $config = [
          /**
          * 账号基本信息，请从微信公众平台/开放平台获取
          */
          'app_id'  => 'wx6635492bcb215cbb',         // AppID
          'secret'  => 'ae9b2d74a191e218f0f67d677dc09564',     // AppSecret
          'token'   => 'ln995bAjB4jB6ZbhDhnpbPNNpPAN9BW9',          // Token
          'aes_key' => '',                    // EncodingAESKey
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
        session_start();
        $config = [
          'app_id'  => 'wx6635492bcb215cbb',         // AppID
          'secret'  => 'ae9b2d74a191e218f0f67d677dc09564',     // AppSecret
          'token'   => 'ln995bAjB4jB6ZbhDhnpbPNNpPAN9BW9',          // Token
          'aes_key' => '',                    // EncodingAESKey
          // ...
          'oauth' => [
              'scopes'   => ['snsapi_userinfo'],
              'callback' => '/oauth_callback',
          ],
          // ..
        ];
        $app = new Application($config);
        $oauth = $app->oauth;
        $user = $oauth->user();
        $_SESSION['wechat_user'] = $user->toArray();
        $targetUrl = empty($_SESSION['index_url']) ? '/error' : $_SESSION['index_url'];
        //echo $_SESSION['index_url'];
        header('location:'. $targetUrl);
        /*$config = [
          // ...
        ];

        $app = new Application($config);
        $oauth = $app->oauth;

        // 获取 OAuth 授权结果用户信息
        $user = $oauth->user();

        $_SESSION['wechat_user'] = $user->toArray();

        $targetUrl = empty($_SESSION['target_url']) ? '/' : $_SESSION['target_url'];

        header('location:'. $targetUrl); // 跳转到 user/profile*/
    }

}
