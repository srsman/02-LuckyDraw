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

    @show

    @section('defaultJS')
      <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
      <script src="//cdn.bootcss.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    @show

    @section('customJS')@show
  </body>
</html>
