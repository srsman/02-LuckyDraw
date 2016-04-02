@extends('layout-mobile')

@section('title')我的中奖情况 - LANSUR 微信抽奖@stop

@section('body')
  <div class="my-prize container-fluid">
    <div class="row">
      <div class="col-xs-12">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title">我的中奖情况</h3>
          </div>
          <div class="panel-body">
            <div class="user-info">
              <img src="{{ $prizeinfo[0]['wx_avatar'] or $_SESSION['wechat_user']['avatar'] }}" alt="用户头像" title="用户头像" class="user-avatar">
              <h2 class="username h6">{{ $prizeinfo[0]['wx_nickname'] or $_SESSION['wechat_user']['nickname']}}</h2>
            </div>

            <p class="prize-count">你共中奖 {{ count($prizeinfo) }} 次！</p>
            @foreach($prizeinfo as $info)
            <table class="table table-striped table-border table-hover">
              <thead>
                <tr class="success">
                  <th>奖品信息</th>
                  <th>详情</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>奖项</td>
                  <td>{{ $info['award_prize'] }}</td>
                </tr>
                <tr>
                  <td>奖品名称</td>
                  <td>{{ $info['award_content'] }}</td>
                </tr>
                <tr>
                  <td>中奖时间</td>
                  <td>{{ $info['created_at'] }}</td>
                </tr>
              </tbody>
            </table>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
@stop
