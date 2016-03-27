@extends('layout')

@section('title')设置奖项@stop

@section('body')
  @parent

  <div class="container-fluid">
    <div class="row">
      <div id="set-prize" class="col-lg-10 col-lg-offset-1">

        <div class="page-header">
          <h2 class="h3">设置奖项</h2>
        </div>

        <!-- 设置概率 -->
        <div id="set-Probability" class="panel panel-warning">
          <div class="panel-heading">
            <h2 class="panel-title">设置三类奖品的中奖概率</h2>
          </div>

          <div class="panel-body">
            <form class="form-vertical" action="setPrize/category" method="POST" enctype="multipart/form-data">

              <input type="hidden" name="_token" value="{{ csrf_token() }}">

              <div class="row">
                <div class="col-sm-8 col-sm-offset-2 col-md-12 col-md-offset-0">

                  <div class="form-group">
                    <div class="col-sm-6 col-md-2">
                      <label for="inputProbability" class="control-label">链接类奖品中奖概率</label>
                    </div>
                    <div class="col-sm-6 col-md-2">
                      <input type="number" class="form-control" id="inputProbability" placeholder="中奖概率（单位: %）" value="{{ substr($rates[0]['award_rate'],0,2).'.'.substr($rates[0]['award_rate'],2,2)}}" name="link_rate">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-6 col-md-2">
                      <label for="inputProbability" class="control-label">兑换码类奖品中奖概率</label>
                    </div>
                    <div class="col-sm-6 col-md-2">
                      <input type="number" class="form-control" id="inputProbability" placeholder="中奖概率（单位: %）" value="{{ substr($rates[1]['award_rate'],0,2).'.'.substr($rates[1]['award_rate'],2,2)}}" name="code_rate">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-6 col-md-2">
                      <label for="inputProbability" class="control-label">实物类奖品中奖概率</label>
                    </div>
                    <div class="col-sm-6 col-md-2">
                      <input type="number" class="form-control" id="inputProbability" placeholder="中奖概率（单位: %）" value="{{ substr($rates[2]['award_rate'],0,2).'.'.substr($rates[2]['award_rate'],2,2)}}" name="thing_rate">
                    </div>
                  </div>
                </div>
              </div><!-- row -->

              {{-- 按钮 --}}
              <div class="row">
                <div class="form-group action-btn col-xs-12">
                  <div class="col-sm-4 col-md-1 pull-right" align="center">

                    <button type="submit" class="btn btn-normal btn-warning">保存</button>
                  </div>
                </div>
              </div>

            </form>
          </div>
        </div>


        {{-- 链接类奖品 --}}
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h2 class="panel-title">链接类奖品</h2>
          </div>
          <div class="panel-body">

            <!-- 链接类表格 -->
            <div class="row">
              <div class="col-xs-12">
                <table class="table table-striped table-border table-hover">
                  <thead>
                    <tr>
                      <th>序号</th>
                      <th>奖项</th>
                      <th>奖品名称</th>
                      <th>兑奖链接</th>
                      <th>奖品图片</th>
                      <th>权重</th>
                      <th>操作</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td>
                        <a href="" class="btn btn-sm btn-danger">删除</a>
                        <a href="" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#link-prize">修改</a>
                      </td>
                    </tr>
                  </tbody>
                </table>

              </div>
            </div><!-- 链接类表格结束 -->

          </div>{{-- panel-body --}}
        </div>{{-- panel --}}

        {{-- 兑换码类奖品 --}}
        <div class="panel panel-success">
          <div class="panel-heading">
            <h2 class="panel-title">兑换码类奖品</h2>
          </div>

          <div class="panel-body">

            <!-- 兑换码类表格 -->
            <div class="row">
              <div class="col-xs-12">
                <table class="table table-striped table-border table-hover">
                  <thead>
                    <tr>
                      <th>序号</th>
                      <th>奖项</th>
                      <th>奖品名称</th>
                      <th>兑奖链接</th>
                      <th>奖品图片</th>
                      <th>Excel 表格</th>
                      <th>权重</th>
                      <th>操作</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td>
                        <a href="" class="btn btn-sm btn-danger">删除</a>
                        <a href="" class="btn btn-sm btn-success" data-toggle="modal" data-target="#code-prize">修改</a>
                      </td>
                    </tr>
                  </tbody>
                </table>

              </div>
            </div><!-- 兑换码类表格结束 -->

          </div>{{-- panel-body --}}
        </div>{{-- panel --}}

        {{-- 实物类奖品 --}}
        <div class="panel panel-info">
          <div class="panel-heading">
            <h2 class="panel-title">实物类奖品</h2>
          </div>

          <div class="panel-body">

            <!-- 实物类表格 -->
            <div class="row">
              <div class="col-xs-12">
                <table class="table table-striped table-border table-hover">
                  <thead>
                    <tr>
                      <th>序号</th>
                      <th>奖项</th>
                      <th>奖品名称</th>
                      <th>奖品图片</th>
                      <th>奖品数量</th>
                      <th>权重</th>
                      <th>操作</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td>
                        <a href="" class="btn btn-sm btn-danger">删除</a>
                        <a href="" class="btn btn-sm btn-info" data-toggle="modal" data-target="#real-prize">修改</a>
                      </td>
                    </tr>
                  </tbody>
                </table>

              </div>
            </div><!-- 实物类表格 -->

          </div>{{-- panel-body --}}
        </div>{{-- panel --}}


        <!-- 模态框集合 -->

        <!-- 链接类奖品模态框 -->
        <div id="link-prize" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">填写链接类奖项信息</h4>
              </div>

              {{-- 领奖表单 --}}
              <form class="form-vertical">
                <div class="modal-body">
                  <fieldset>

                    {{-- 奖项 --}}
                    <div class="form-group">
                      <label for="selectPrizePlaces" class="col-lg-3 control-label">奖项</label>
                      <div class="col-lg-9">
                        <select class="form-control" id="selectPrizePlaces" name="selectPrizePlaces" required>
                          <option selected>一等奖</option>
                          <option>二等奖</option>
                          <option>三等奖</option>
                        </select>
                      </div>
                    </div>
                    {{-- 奖品名称 --}}
                    <div class="form-group">
                      <label for="inputPrizeName" class="col-lg-3 control-label">奖品名称</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control" id="inputPrizeName" placeholder="请输入奖品名称" required>
                      </div>
                    </div>
                    {{-- 兑奖链接 --}}
                    <div class="form-group">
                      <label for="inputURL" class="col-lg-3 control-label">兑奖链接</label>
                      <div class="col-lg-9">
                        <input type="url" class="form-control" id="inputURL" placeholder="请输入兑奖链接" required>
                      </div>
                    </div>
                    {{-- 奖品图片 --}}
                    <div class="form-group">
                      <label for="inputImg" class="col-lg-3 control-label">上传奖品图片</label>
                      <div class="col-lg-9">
                        <input type="file" class="form-control" id="inputImg" name="inputImg" placeholder="上传图片" required>
                      </div>
                    </div>
                    {{-- 权重 --}}
                    <div class="form-group">
                      <label for="inputNumber" class="col-lg-3 control-label">权重</label>
                      <div class="col-lg-9">
                        <input type="number" class="form-control" id="inputNumber" name="inputNumber" placeholder="请输入奖品权重" value="" required>
                      </div>
                    </div>

                  </fieldset>
                </div>
                {{-- 操作按钮 --}}
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                  <button type="button" class="btn btn-primary">保存</button>
                </div>
              </form>
              {{-- 领奖表单结束 --}}
            </div>
          </div>
        </div>
        <!-- 链接类奖品模态框结束 -->

        <!-- 兑换码类奖品模态框 -->
        <div id="code-prize" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">填写兑换码类奖项信息</h4>
              </div>

              {{-- 领奖表单 --}}
              <form class="form-vertical">
                <div class="modal-body">
                  <fieldset>
                    {{-- 奖项 --}}
                    <div class="form-group">
                      <label for="selectPrizePlaces" class="col-lg-3 control-label">奖项</label>
                      <div class="col-lg-9">
                        <select class="form-control" id="selectPrizePlaces" name="selectPrizePlaces" required>
                          <option selected>一等奖</option>
                          <option>二等奖</option>
                          <option>三等奖</option>
                        </select>
                      </div>
                    </div>
                    {{-- 奖品名称 --}}
                    <div class="form-group">
                      <label for="inputPrizeName" class="col-lg-3 control-label">奖品名称</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control" id="inputPrizeName" placeholder="请输入奖品名称" required>
                      </div>
                    </div>
                    {{-- 兑奖链接 --}}
                    <div class="form-group">
                      <label for="inputURL" class="col-lg-3 control-label">兑奖链接</label>
                      <div class="col-lg-9">
                        <input type="url" class="form-control" id="inputURL" placeholder="请输入兑奖链接" required>
                      </div>
                    </div>
                    {{-- 奖品图片 --}}
                    <div class="form-group">
                      <label for="inputImg" class="col-lg-3 control-label">上传奖品图片</label>
                      <div class="col-lg-9">
                        <input type="file" class="form-control" id="inputImg" name="inputImg" placeholder="上传图片" required>
                      </div>
                    </div>
                    {{-- 上传Excel 兑换码 --}}
                    <div class="form-group">
                      <label for="inputCode" class="col-lg-3 control-label">上传Excel</label>
                      <div class="col-lg-9">
                        <input type="file" class="form-control" id="inputExcel" name="inputExcel" required>
                      </div>
                    </div>
                    {{-- 权重 --}}
                    <div class="form-group">
                      <label for="inputNumber" class="col-lg-3 control-label">权重</label>
                      <div class="col-lg-9">
                        <input type="number" class="form-control" id="inputNumber" name="inputNumber" placeholder="请输入奖品权重" value="" required>
                      </div>
                    </div>

                  </fieldset>
                </div>
                {{-- 操作按钮 --}}
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                  <button type="button" class="btn btn-success">保存</button>
                </div>
              </form>
              {{-- 领奖表单结束 --}}

            </div>
          </div>
        </div>
        <!-- 兑换码类奖品模态框结束 -->

        <!-- 实物类奖品模态框 -->
        <div id="real-prize" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">填写实物类奖项信息</h4>
              </div>

              {{-- 领奖表单 --}}
              <form class="form-vertical">
                <div class="modal-body">
                  <fieldset>
                    {{-- 奖项 --}}
                    <div class="form-group">
                      <label for="selectPrizePlaces" class="col-lg-3 control-label">奖项</label>
                      <div class="col-lg-9">
                        <select class="form-control" id="selectPrizePlaces" name="selectPrizePlaces" required>
                          <option selected>一等奖</option>
                          <option>二等奖</option>
                          <option>三等奖</option>
                        </select>
                      </div>
                    </div>
                    {{-- 奖品名称 --}}
                    <div class="form-group">
                      <label for="inputPrizeName" class="col-lg-3 control-label">奖品名称</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control" id="inputPrizeName" placeholder="请输入奖品名称" required>
                      </div>
                    </div>
                    {{-- 奖品图片 --}}
                    <div class="form-group">
                      <label for="inputImg" class="col-lg-3 control-label">上传奖品图片</label>
                      <div class="col-lg-9">
                        <input type="file" class="form-control" id="inputImg" name="inputImg" placeholder="上传图片" required>
                      </div>
                    </div>
                    {{-- 奖品数量 --}}
                    <div class="form-group">
                      <label for="inputNumber" class="col-lg-3 control-label">奖品数量</label>
                      <div class="col-lg-9">
                        <input type="number" class="form-control" id="inputNumber" name="inputNumber" value="" placeholder="请填写奖品数量" required>
                      </div>
                    </div>
                    {{-- 权重 --}}
                    <div class="form-group">
                      <label for="inputNumber" class="col-lg-3 control-label">权重</label>
                      <div class="col-lg-9">
                        <input type="number" class="form-control" id="inputNumber" name="inputNumber" placeholder="请输入奖品权重" value="" required>
                      </div>
                    </div>

                  </fieldset>

                  {{-- 操作按钮 --}}
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <button type="button" class="btn btn-info">保存</button>
                  </div>
                </div>
              </form>
              {{-- 领奖表单结束 --}}

            </div>
          </div>
        </div>
        <!-- 实物类奖品模态框结束 -->

        <!-- 模态框集合结束 -->

      </div><!-- set-prize -->
    </div><!-- row -->
  </div><!-- container-fluid -->
@stop
