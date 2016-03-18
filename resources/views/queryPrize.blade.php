@extends('layout')

@section('title')查询中奖情况@stop

@section('body')
  @parent

  <div class="container-fluid">
    <div class="row">
      <div id="query-prize" class="col-md-10 col-md-offset-1">
        <div class="page-header">
          <h2 class="h3">查询中奖情况</h2>
        </div>

        <div class="panel panel-primary">
          <div class="panel-heading">
            <h2 class="panel-title">链接类中奖名单</h2>
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
                    <tr class="success">
                      <td>1</td>
                      <td class="prize-place">一等奖</td>
                      <td>SKII 眼霜</td>
                      <td>小红</td>
                      <td>13800138000</td>
                      <td>广东省惠州市惠城区演达大道 46 号惠州学院</td>
                    </tr>

                    <tr class="success">
                      <td>2</td>
                      <td class="prize-place">一等奖</td>
                      <td>SKII 眼霜</td>
                      <td>小红</td>
                      <td>13800138000</td>
                      <td>广东省惠州市惠城区演达大道 46 号惠州学院</td>
                    </tr>

                    <tr class="warning">
                      <td>3</td>
                      <td class="prize-place">二等奖</td>
                      <td>SKII 眼霜</td>
                      <td>小红</td>
                      <td>13800138000</td>
                      <td>广东省惠州市惠城区演达大道 46 号惠州学院</td>
                    </tr>

                    <tr class="danger">
                      <td>4</td>
                      <td class="prize-place">三等奖</td>
                      <td>SKII 眼霜</td>
                      <td>小红</td>
                      <td>13800138000</td>
                      <td>广东省惠州市惠城区演达大道 46 号惠州学院</td>
                    </tr>
                  </tbody>
                </table>

              </div>
            </div>
          </div>
        </div>

        <div class="panel panel-success">
          <div class="panel-heading">
            <h2 class="panel-title">兑换码中奖名单</h2>
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
                    <tr class="success">
                      <td>1</td>
                      <td class="prize-place">一等奖</td>
                      <td>SKII 眼霜</td>
                      <td>小红</td>
                      <td>13800138000</td>
                      <td>广东省惠州市惠城区演达大道 46 号惠州学院</td>
                    </tr>

                    <tr class="success">
                      <td>2</td>
                      <td class="prize-place">一等奖</td>
                      <td>SKII 眼霜</td>
                      <td>小红</td>
                      <td>13800138000</td>
                      <td>广东省惠州市惠城区演达大道 46 号惠州学院</td>
                    </tr>

                    <tr class="warning">
                      <td>3</td>
                      <td class="prize-place">二等奖</td>
                      <td>SKII 眼霜</td>
                      <td>小红</td>
                      <td>13800138000</td>
                      <td>广东省惠州市惠城区演达大道 46 号惠州学院</td>
                    </tr>

                    <tr class="danger">
                      <td>4</td>
                      <td class="prize-place">三等奖</td>
                      <td>SKII 眼霜</td>
                      <td>小红</td>
                      <td>13800138000</td>
                      <td>广东省惠州市惠城区演达大道 46 号惠州学院</td>
                    </tr>
                  </tbody>
                </table>

              </div>
            </div>
          </div>
        </div>


        <div class="panel panel-info">
          <div class="panel-heading">
            <h2 class="panel-title">实物类中奖名单</h2>
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
                    <tr class="success">
                      <td>1</td>
                      <td class="prize-place">一等奖</td>
                      <td>SKII 眼霜</td>
                      <td>小红</td>
                      <td>13800138000</td>
                      <td>广东省惠州市惠城区演达大道 46 号惠州学院</td>
                    </tr>

                    <tr class="success">
                      <td>2</td>
                      <td class="prize-place">一等奖</td>
                      <td>SKII 眼霜</td>
                      <td>小红</td>
                      <td>13800138000</td>
                      <td>广东省惠州市惠城区演达大道 46 号惠州学院</td>
                    </tr>

                    <tr class="warning">
                      <td>3</td>
                      <td class="prize-place">二等奖</td>
                      <td>SKII 眼霜</td>
                      <td>小红</td>
                      <td>13800138000</td>
                      <td>广东省惠州市惠城区演达大道 46 号惠州学院</td>
                    </tr>

                    <tr class="danger">
                      <td>4</td>
                      <td class="prize-place">三等奖</td>
                      <td>SKII 眼霜</td>
                      <td>小红</td>
                      <td>13800138000</td>
                      <td>广东省惠州市惠城区演达大道 46 号惠州学院</td>
                    </tr>
                  </tbody>
                </table>

              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

@stop
