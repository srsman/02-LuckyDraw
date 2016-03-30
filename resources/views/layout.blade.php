<!doctype html>
<html lang="zh-cmn-hans">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <title>@section('title')微信抽奖@show</title>
    @section('defaultCSS')
      <link rel="stylesheet" href="{{ asset('dist/css/bootstrap.min.css') }}">
      <link rel="stylesheet" href="{{ asset('dist/css/index.css') }}">
    @show
    @section('customCSS')@show
  </head>
  <body>
    @section('body')
      <header id="admin-header">
        <nav class="navbar navbar-default navbar-fixed-top">
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="">管理后台</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                <li class="active"><a href="setPrize">奖项设置 <span class="sr-only">(current)</span></a></li>
                <li><a href="queryPrize">中奖查询</a></li>
              </ul>

              {{-- 判断用户是否为登录状态。登录状态下，才显示此区块 --}}
              @if(Session::has('name'))
                <ul class="nav navbar-nav navbar-right">
                  <li><a href="changePasswd">修改密码</a></li>
                  <li><a href="logout">退出</a></li>
                </ul>
               @endif

            </div>
          </div>
        </nav>
      </header>
    @show

    @section('defaultJS')
      <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
      <script src="//cdn.bootcss.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    @show

    @section('customJS')@show
  </body>
</html>
