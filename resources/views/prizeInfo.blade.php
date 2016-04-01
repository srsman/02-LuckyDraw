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
              <img src="" alt="用户头像" title="用户头像" class="user-avatar">
              <h2 class="username h6">林小斯</h2>
            </div>

            <p class="prize-count">你共中奖 10 次！</p>

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
                  <td>一等奖</td>
                </tr>
                <tr>
                  <td>奖品名称</td>
                  <td>SKII 眼霜</td>
                </tr>
                <tr>
                  <td>中奖时间</td>
                  <td>2016 年 4 月 1 日</td>
                </tr>
              </tbody>
            </table>

            <table class="table table-striped table-border table-hover">
              <thead>
                <tr class="danger">
                  <th>奖品信息</th>
                  <th>详情</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>奖项</td>
                  <td>一等奖</td>
                </tr>
                <tr>
                  <td>奖品名称</td>
                  <td>SKII 眼霜</td>
                </tr>
                <tr>
                  <td>中奖时间</td>
                  <td>2016 年 4 月 1 日</td>
                </tr>
              </tbody>
            </table>

            <table class="table table-striped table-border table-hover">
              <thead>
                <tr class="info">
                  <th>奖品信息</th>
                  <th>详情</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>奖项</td>
                  <td>一等奖</td>
                </tr>
                <tr>
                  <td>奖品名称</td>
                  <td>SKII 眼霜</td>
                </tr>
                <tr>
                  <td>中奖时间</td>
                  <td>2016 年 4 月 1 日</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@stop
