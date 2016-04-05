@extends('layout')

@section('title')查询中奖情况@stop

@section('body')
  @parent

  <div class="container-fluid">
    <div class="row">
      <div id="query-prize" class="col-md-10 col-md-offset-1">
        <div class="page-header">
          <h2 class="h3">查询中奖情况</h2>

          <form id="query-search" action="search"  method='post' class="navbar-form navbar-left" role="search">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
              <div class="select-cat col-lg-7">
                <div class="radio">
                  <label>
                    <input type="radio" name="optionsRadios" id="cat-radio1" value="all" checked>全选
                  </label>
                  <label>
                    <input type="radio" name="optionsRadios" id="cat-radio2" value="link">链接类
                  </label>
                  <label>
                    <input type="radio" name="optionsRadios" id="cat-radio3" value="code">兑换码类
                  </label>
                  <label>
                    <input type="radio" name="optionsRadios" id="cat-radio4" value="thing">实物类
                  </label>
                </div>
              </div>
              <div class="col-lg-5">
                <input type="text" class="form-control" placeholder="请输入关键词" name="search" value="{{ isset($search) ? $search : '' }}">
              </div>
            </div>
            <button type="submit" class="btn btn-default">搜索</button>
            <a href="export" role="button" class="btn btn-normal btn-info">导出中奖信息</a>
          </form>
        </div>

        <div class="panel panel-primary">
          <div class="panel-heading">
            <h2 class="panel-title">中奖名单</h2>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-xs-12">

              <div class="table-responsive">
                  <table class="table table-striped table-bordered table-hover ">
                    <thead>
                      <tr>
                        <th>序号</th>
                        <th>微信昵称</th>
                        <th>类型</th>
                        <th>中奖奖项</th>
                        <th>奖品名称</th>
                        <th>中奖者姓名</th>
                        <th>电话</th>
                        <th>住址</th>
                        <th>中奖时间</th>

                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($querys as $key=> $query)
                      @if ($query->award_prize==='一等奖')
                      <tr class="success">
                      @elseif ($query->award_prize==='二等奖')
                      <tr class="warning">
                      @elseif ($query->award_prize==='三等奖')
                      <tr class="info">
                      @else
                      <tr class="danger">
                      @endif
                        <td>{{ ++$key }}</td>
                      <td>{{ $query->wx_nickname }}</td>
                        <td>
                          @if ($query->award_type==='link')
                           链接
                           @elseif($query->award_type==='code')
                           领取码
                           @else 实物
                           @endif
                        </td>
                        <td class="prize-place">{{$query->award_prize}}</td>
                        <td>{{$query->award_content}}</td>
                        <td>{{$query->award_realname}}</td>
                        <td>{{$query->award_phone}}</td>
                        <td>{{$query->award_address}}</td>
                        <td>{{$query->created_at}}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                {!! $querys->render() !!}
              </div>
            </div>
          </div>
        </div><!-- panel -->

      </div>
    </div>
  </div>

@stop
