@extends('layout')

@section('title')查询中奖情况@stop

@section('body')
  @parent

  <div class="container-fluid">
    <div class="row">
      <div id="query-prize" class="col-md-10 col-md-offset-1">
        <div class="page-header">
          <h2 class="h3">查询中奖情况</h2>
          <form id="query-search" class="navbar-form navbar-left" role="search">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="请输入关键词">
            </div>
            <button type="submit" class="btn btn-default">搜索</button>
          </form>
        </div>

        <div class="panel panel-primary">
          <div class="panel-heading">
            <h2 class="panel-title">中奖名单</h2>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-xs-12">

                <table class="table table-striped table-border table-hover ">
                  <thead>
                    <tr>
                      <th>序号</th>
                      <th>中奖奖项</th>
                      <th>奖品名称</th>
                      <th>中奖者姓名</th>
                      <th>电话</th>
                      <th>住址</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($links as $key=>$link)
                    @if ($link['award_prize']==='一等奖')
                    <tr class="success">
                    @elseif ($link['award_prize']==='二等奖')
                    <tr class="warning">
                    @else
                    <tr class="danger">
                    @endif
                      <td>1</td>
                      <td class="prize-place">{{$link['award_prize']}}</td>
                      <td>{{$link['award_content']}}</td>
                      <td>{{$link['award_realname']}}</td>
                      <td>{{$link['award_phone']}}</td>
                      <td>{{$link['award_address']}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>

              </div>
            </div>
          </div>
        </div><!-- panel -->

      </div>
    </div>
  </div>

@stop
