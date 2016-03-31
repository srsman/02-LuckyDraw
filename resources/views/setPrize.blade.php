@extends('layout')

@section('title')设置奖项@stop

@section('body')
  @parent

  <div class="container-fluid">
    <div class="row">
      <div id="set-prize" class="col-lg-10 col-lg-offset-1">

        <div class="page-header">
          <h2 class="h3">
          设置奖项
          <a href="flush" role="button" class="btn btn-normal btn-danger pull-right" onclick="return confirm('确定要清空所有数据,包括中奖者信息？');">一键清空所有数据</a>
          </h2>
        </div>

        <!-- 设置概率 -->
        <div id="set-Probability" class="panel panel-warning">
          <div class="panel-heading">
            <h2 class="panel-title">设置三类奖品的中奖概率</h2>
          </div>

          <div class="panel-body">
            <form class="form-vertical" action="setPrize/category" method="POST" >

              <input type="hidden" name="_token" value="{{ csrf_token() }}">

              <div class="row">
                <div class="col-sm-8 col-sm-offset-2 col-md-12 col-md-offset-0">

                  <div class="form-group">
                    <div class="col-sm-6 col-md-2">
                      <label for="inputProbability" class="control-label">链接类奖品中奖概率</label>
                    </div>
                    <div class="col-sm-6 col-md-2">
                      <input type="text" class="form-control" id="inputProbability" placeholder="中奖概率（单位: %）" value="{{ round($rates[0]['award_rate']/100,2)}}" name="link_rate">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-6 col-md-2">
                      <label for="inputProbability" class="control-label">兑换码类奖品中奖概率</label>
                    </div>
                    <div class="col-sm-6 col-md-2">
                      <input type="text" class="form-control" id="inputProbability" placeholder="中奖概率（单位: %）" value="{{ round($rates[1]['award_rate']/100,2)}}" name="code_rate">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-6 col-md-2">
                      <label for="inputProbability" class="control-label">实物类奖品中奖概率</label>
                    </div>
                    <div class="col-sm-6 col-md-2">
                      <input type="text" class="form-control" id="inputProbability" placeholder="中奖概率（单位: %）" value="{{ round($rates[2]['award_rate']/100,2)}}" name="thing_rate">
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
                   @foreach($links as $key=>$link)
                    <tr>
                      <td>{{ ++$key }}</td>
                      <td>{{ $link['prize'] }}</td>
                      <td>{{ $link['name'] }}</td>
                      <td>{{ $link['prize_url'] }}</td>
                      <td><a href="{{asset('uploads/img').'/'.$link['url'] }}">img</a></td>
                      <td>{{ $link['weight'] }}</td>
                      <td>
                        <a href="setPrize/dellink/{{$link['id']}}" class="btn btn-sm btn-danger">删除</a>
                        <a href="" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#link-prize{{ $link['id'] }}">修改</a>
                      </td>
                    </tr>
                   @endforeach
                  </tbody>
                </table>

              </div>
            </div><!-- 链接类表格结束 -->

          </div>{{-- panel-body --}}

          {{-- panel-footer --}}
          <div class="panel-footer">
            <a href="" class="btn btn-normal btn-primary" data-toggle="modal" data-target="#add-link-prize">+ 新增奖项</a>
          </div>
          {{-- panel-footer --}}
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
                     <!--  <th>Excel 表格</th> -->
                      <th>权重</th>
                      <th>操作</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($codes as $key =>$code)
                    <tr>
                      <td>{{ ++$key }}</td>
                      <td>{{ $code['prize'] }}</td>
                      <td>{{ $code['name'] }}</td>
                      <td>{{ $code['prize_url'] }}</td>
                      <td><a href="{{asset('uploads/img').'/'.$code['url'] }}">img</a></td>
                      <!-- <td><a href="">excel</a></td> -->
                      <td>{{ $code['weight'] }}</td>
                      <td>
                        <a href="setPrize/delcode/{{ $code['id'] }}" class="btn btn-sm btn-danger">删除</a>
                        <a href="" class="btn btn-sm btn-success" data-toggle="modal" data-target="#code-prize{{ $code['id'] }}">修改</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>

              </div>
            </div><!-- 兑换码类表格结束 -->

          </div>{{-- panel-body --}}

          {{-- panel-footer --}}
          <div class="panel-footer">
            <a href="" class="btn btn-normal btn-success" data-toggle="modal" data-target="#add-code-prize">+ 新增奖项</a>
          </div>
          {{-- panel-footer --}}
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
                    @foreach($things as $key =>$thing)
                    <tr>
                      <td>{{ ++$key }}</td>
                      <td>{{ $thing['prize'] }}</td>
                      <td>{{ $thing['name'] }}</td>
                      <td><a href="{{asset('uploads/img').'/'.$thing['url'] }}">img</a></td>
                      <td>{{ $thing['amount'] }}</td>
                      <td>{{ $thing['weight'] }}</td>
                      <td>
                        <a href="setPrize/delthing/{{ $thing['id'] }}" class="btn btn-sm btn-danger">删除</a>
                        <a href="" class="btn btn-sm btn-info" data-toggle="modal" data-target="#real-prize{{ $thing['id'] }}">修改</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>

              </div>
            </div><!-- 实物类表格 -->

          </div>{{-- panel-body --}}

          {{-- panel-footer --}}
          <div class="panel-footer">
            <a href="" class="btn btn-normal btn-info" data-toggle="modal" data-target="#add-real-prize">+ 新增奖项</a>
          </div>
          {{-- panel-footer --}}
        </div>{{-- panel --}}


        <!-- 模态框集合 -->

        <!-- 链接类奖品模态框 -->
        @foreach($links as $link)
        <div id="link-prize{{ $link['id'] }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">修改链接类奖项信息</h4>
              </div>

              {{-- 领奖表单 --}}
              <form class="form-vertical" action="setPrize/editlink/{{ $link['id'] }}" method="post" enctype="multipart/form-data" >
                <div class="modal-body">
                  <fieldset>

                    {{-- 奖项 --}}
                    <div class="form-group">
                      <label for="selectPrizePlaces" class="col-lg-3 control-label">奖项</label>
                      <div class="col-lg-9">
                        <select class="form-control" id="selectPrizePlaces" name="prize" required>
                        @if($link['prize']==='一等奖')
                          <option selected>一等奖</option>
                          <option>二等奖</option>
                          <option>三等奖</option>
                          <option>四等奖</option>
                        @elseif($link['prize']==='二等奖')
                          <option>一等奖</option>
                          <option selected>二等奖</option>
                          <option>三等奖</option>
                          <option>四等奖</option>
                        @elseif($link['prize']==='三等奖')
                          <option>一等奖</option>
                          <option>二等奖</option>
                          <option selected>三等奖</option>
                          <option>四等奖</option>
                        @else
                          <option>一等奖</option>
                          <option>二等奖</option>
                          <option >三等奖</option>
                          <option selected>四等奖</option>
                        @endif
                        </select>
                      </div>
                    </div>
                    {{-- 奖品名称 --}}
                    <div class="form-group">
                      <label for="inputPrizeName" class="col-lg-3 control-label">奖品名称</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control" id="inputPrizeName" placeholder="请输入奖品名称"  name="name" value="{{ $link['name'] }}" required>
                      </div>
                    </div>
                    {{-- 兑奖链接 --}}
                    <div class="form-group">
                      <label for="inputURL" class="col-lg-3 control-label">兑奖链接</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control" id="inputURL" placeholder="请输入兑奖链接"  name="prize_url" value="{{ $link['prize_url'] }}" required>
                      </div>
                    </div>
                    {{-- 奖品图片 --}}
                    <div class="form-group">
                      <label for="inputImg" class="col-lg-3 control-label">上传奖品图片</label>
                      <div class="col-lg-9">
                        <input type="file" class="form-control" id="inputImg" name="inputImg" placeholder="上传图片" >
                      </div>
                    </div>
                    {{-- 权重 --}}
                    <div class="form-group">
                      <label for="inputNumber" class="col-lg-3 control-label">权重</label>
                      <div class="col-lg-9">
                        <input type="number" class="form-control" id="inputNumber" name="weight" placeholder="请输入奖品权重" value="{{ $link['weight']}}" required>
                      </div>
                    </div>

                  </fieldset>
                </div>
                {{-- 操作按钮 --}}
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                  <button type="submit" class="btn btn-primary">保存</button>
                </div>
              </form>
              {{-- 领奖表单结束 --}}
            </div>
          </div>
        </div>
        @endforeach
        <!-- 链接类奖品模态框结束 -->

        <!-- 兑换码类奖品模态框 -->
        @foreach($codes as $key =>$code)
        <div id="code-prize{{ $code['id'] }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">修改兑换码类奖项信息</h4>
              </div>

              {{-- 领奖表单 --}}
              <form class="form-vertical" action="setPrize/editcode/{{ $code['id'] }}" method="post" enctype="multipart/form-data" >
                <div class="modal-body">
                  <fieldset>
                    {{-- 奖项 --}}
                    <div class="form-group">
                      <label for="selectPrizePlaces" class="col-lg-3 control-label">奖项</label>
                      <div class="col-lg-9">
                        <select class="form-control" id="selectPrizePlaces" name="prize" required>
                        @if($code['prize']==='一等奖')
                          <option selected>一等奖</option>
                          <option>二等奖</option>
                          <option>三等奖</option>
                          <option>四等奖</option>
                        @elseif($code['prize']==='二等奖')
                          <option>一等奖</option>
                          <option selected>二等奖</option>
                          <option>三等奖</option>
                          <option>四等奖</option>
                        @elseif($code['prize']==='三等奖')
                          <option>一等奖</option>
                          <option>二等奖</option>
                          <option selected>三等奖</option>
                          <option>四等奖</option>
                        @else
                          <option>一等奖</option>
                          <option>二等奖</option>
                          <option >三等奖</option>
                          <option selected>四等奖</option>
                        @endif
                        </select>
                      </div>
                    </div>
                    {{-- 奖品名称 --}}
                    <div class="form-group">
                      <label for="inputPrizeName" class="col-lg-3 control-label">奖品名称</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control" id="inputPrizeName" placeholder="请输入奖品名称"  value="{{ $code['name'] }}" name="name" required>
                      </div>
                    </div>
                    {{-- 兑奖链接 --}}
                    <div class="form-group">
                      <label for="inputURL" class="col-lg-3 control-label">兑奖链接</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control" id="inputURL" placeholder="请输入兑奖链接" value="{{ $code['prize_url'] }}" name="prize_url" required>
                      </div>
                    </div>
                    {{-- 奖品图片 --}}
                    <div class="form-group">
                      <label for="inputImg" class="col-lg-3 control-label">上传奖品图片</label>
                      <div class="col-lg-9">
                        <input type="file" class="form-control" id="inputImg" name="inputImg" placeholder="上传图片" >
                      </div>
                    </div>
                    {{-- 上传Excel 兑换码 --}}
                    {{-- <div class="form-group">
                      <label for="inputCode" class="col-lg-3 control-label">上传Excel</label>
                      <div class="col-lg-9">
                        <input type="file" class="form-control" id="inputExcel" name="inputExcel" required>
                      </div>
                    </div> --}}
                    {{-- 权重 --}}
                    <div class="form-group">
                      <label for="inputNumber" class="col-lg-3 control-label">权重</label>
                      <div class="col-lg-9">
                        <input type="number" class="form-control" id="inputNumber" name="weight" placeholder="请输入奖品权重" value="{{$code['weight'] }}" required>
                      </div>
                    </div>

                  </fieldset>
                </div>
                {{-- 操作按钮 --}}
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                  <button type="submit" class="btn btn-success">保存</button>
                </div>
              </form>
              {{-- 领奖表单结束 --}}

            </div>
          </div>
        </div>
        @endforeach
        <!-- 兑换码类奖品模态框结束 -->

        <!-- 实物类奖品模态框 -->
        @foreach($things as $key =>$thing)
        <div id="real-prize{{ $thing['id'] }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">修改实物类奖项信息</h4>
              </div>

              {{-- 领奖表单 --}}
              <form class="form-vertical" action="setPrize/editthing/{{ $thing['id'] }}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                  <fieldset>
                    {{-- 奖项 --}}
                    <div class="form-group">
                      <label for="selectPrizePlaces" class="col-lg-3 control-label">奖项</label>
                      <div class="col-lg-9">
                        <select class="form-control" id="selectPrizePlaces" name="prize" required>
                        @if($thing['prize']==='一等奖')
                          <option selected>一等奖</option>
                          <option>二等奖</option>
                          <option>三等奖</option>
                          <option>四等奖</option>
                        @elseif($thing['prize']==='二等奖')
                          <option>一等奖</option>
                          <option selected>二等奖</option>
                          <option>三等奖</option>
                          <option>四等奖</option>
                        @elseif($thing['prize']==='三等奖')
                          <option>一等奖</option>
                          <option>二等奖</option>
                          <option selected>三等奖</option>
                          <option>四等奖</option>
                        @else
                          <option>一等奖</option>
                          <option>二等奖</option>
                          <option >三等奖</option>
                          <option selected>四等奖</option>
                        @endif
                        </select>
                      </div>
                    </div>
                    {{-- 奖品名称 --}}
                    <div class="form-group">
                      <label for="inputPrizeName" class="col-lg-3 control-label">奖品名称</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control" id="inputPrizeName" placeholder="请输入奖品名称" value="{{ $thing['name'] }}" name="name" required>
                      </div>
                    </div>
                    {{-- 奖品图片 --}}
                    <div class="form-group">
                      <label for="inputImg" class="col-lg-3 control-label">上传奖品图片</label>
                      <div class="col-lg-9">
                        <input type="file" class="form-control" id="inputImg" name="inputImg" placeholder="上传图片" >
                      </div>
                    </div>
                    {{-- 奖品数量 --}}
                    <div class="form-group">
                      <label for="inputNumber" class="col-lg-3 control-label">奖品数量</label>
                      <div class="col-lg-9">
                        <input type="number" class="form-control" id="inputNumber" name="amount"  placeholder="请填写奖品数量" value="{{ $thing['amount'] }}" required>
                      </div>
                    </div>
                    {{-- 权重 --}}
                    <div class="form-group">
                      <label for="inputNumber" class="col-lg-3 control-label">权重</label>
                      <div class="col-lg-9">
                        <input type="number" class="form-control" id="inputNumber" name="weight" placeholder="请输入奖品权重" value="{{ $thing['weight'] }}"  required>
                      </div>
                    </div>

                  </fieldset>

                  {{-- 操作按钮 --}}
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <button type="submit" class="btn btn-info">保存</button>
                  </div>
                </div>
              </form>
              {{-- 领奖表单结束 --}}

            </div>
          </div>
        </div>
        @endforeach
        <!-- 实物类奖品模态框结束 -->

        <!-- 模态框集合结束 -->



        {{-- 新增奖项按钮模态框 --}}
        <!-- 链接类奖品模态框 -->
        <div id="add-link-prize" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">新增链接类奖项</h4>
              </div>

              {{-- 领奖表单 --}}
              <form class="form-vertical" action="setPrize/link" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                  <fieldset>

                    {{-- 奖项 --}}
                    <div class="form-group">
                      <label for="selectPrizePlaces" class="col-lg-3 control-label">奖项</label>
                      <div class="col-lg-9">
                        <select class="form-control" id="selectPrizePlaces" name="prize" required>
                          <option selected>一等奖</option>
                          <option>二等奖</option>
                          <option>三等奖</option>
                          <option>四等奖</option>
                        </select>
                      </div>
                    </div>
                    {{-- 奖品名称 --}}
                    <div class="form-group">
                      <label for="inputPrizeName" class="col-lg-3 control-label">奖品名称</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control" id="inputPrizeName" placeholder="请输入奖品名称" name="name" required>
                      </div>
                    </div>
                    {{-- 兑奖链接 --}}
                    <div class="form-group">
                      <label for="inputURL" class="col-lg-3 control-label">兑奖链接</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control" id="inputURL" placeholder="请输入兑奖链接" name="prizeurl" required>
                      </div>
                    </div>
                    {{-- 奖品图片 --}}
                    <div class="form-group">
                      <label for="inputImg" class="col-lg-3 control-label">上传奖品图片</label>
                      <div class="col-lg-9">
                        <input type="file" class="form-control" id="inputImg" placeholder="上传图片" name="inputImg" required>
                      </div>
                    </div>
                    {{-- 权重 --}}
                    <div class="form-group">
                      <label for="inputNumber" class="col-lg-3 control-label">权重</label>
                      <div class="col-lg-9">
                        <input type="number" class="form-control" id="inputNumber"  placeholder="请输入奖品权重" value="" name="weight" required>
                      </div>
                    </div>

                  </fieldset>
                </div>
                {{-- 操作按钮 --}}
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                  <button type="submit" class="btn btn-primary">保存</button>
                </div>
              </form>
              {{-- 领奖表单结束 --}}
            </div>
          </div>
        </div>
        <!-- 链接类奖品模态框结束 -->

        <!-- 兑换码类奖品模态框 -->
        <div id="add-code-prize" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">新增兑换码类奖项</h4>
              </div>

              {{-- 领奖表单 --}}
              <form class="form-vertical" action="setPrize/code" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                  <fieldset>
                    {{-- 奖项 --}}
                    <div class="form-group">
                      <label for="selectPrizePlaces" class="col-lg-3 control-label">奖项</label>
                      <div class="col-lg-9">
                        <select class="form-control" id="selectPrizePlaces" name="prize" required>
                          <option selected>一等奖</option>
                          <option>二等奖</option>
                          <option>三等奖</option>
                          <option>四等奖</option>
                        </select>
                      </div>
                    </div>
                    {{-- 奖品名称 --}}
                    <div class="form-group">
                      <label for="inputPrizeName" class="col-lg-3 control-label">奖品名称</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control" id="inputPrizeName" placeholder="请输入奖品名称" name="name" required>
                      </div>
                    </div>
                    {{-- 兑奖链接 --}}
                    <div class="form-group">
                      <label for="inputURL" class="col-lg-3 control-label">兑奖链接</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control" id="inputURL" placeholder="请输入兑奖链接" name="prize_url" required>
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
                        <input type="number" class="form-control" id="inputNumber" name="weight" placeholder="请输入奖品权重" required>
                      </div>
                    </div>

                  </fieldset>
                </div>
                {{-- 操作按钮 --}}
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                  <button type="submit" class="btn btn-success">保存</button>
                </div>
              </form>
              {{-- 领奖表单结束 --}}

            </div>
          </div>
        </div>
        <!-- 兑换码类奖品模态框结束 -->

        <!-- 实物类奖品模态框 -->
        <div id="add-real-prize" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">新增实物类奖项</h4>
              </div>

              {{-- 领奖表单 --}}
              <form class="form-vertical" action="setPrize/thing" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                  <fieldset>
                    {{-- 奖项 --}}
                    <div class="form-group">
                      <label for="selectPrizePlaces" class="col-lg-3 control-label">奖项</label>
                      <div class="col-lg-9">
                        <select class="form-control" id="selectPrizePlaces" name="prize" required>
                          <option selected>一等奖</option>
                          <option>二等奖</option>
                          <option>三等奖</option>
                          <option>四等奖</option>
                        </select>
                      </div>
                    </div>
                    {{-- 奖品名称 --}}
                    <div class="form-group">
                      <label for="inputPrizeName" class="col-lg-3 control-label">奖品名称</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control" id="inputPrizeName" placeholder="请输入奖品名称" name="name" required>
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
                        <input type="number" class="form-control" id="inputNumber" s value="" placeholder="请填写奖品数量" name="amount" required>
                      </div>
                    </div>
                    {{-- 权重 --}}
                    <div class="form-group">
                      <label for="inputNumber" class="col-lg-3 control-label">权重</label>
                      <div class="col-lg-9">
                        <input type="number" class="form-control" id="inputNumber" name="weight" placeholder="请输入奖品权重"  required>
                      </div>
                    </div>

                  </fieldset>

                  {{-- 操作按钮 --}}
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <button type="submit" class="btn btn-info">保存</button>
                  </div>
                </div>
              </form>
              {{-- 领奖表单结束 --}}

            </div>
          </div>
        </div>
        <!-- 实物类奖品模态框结束 -->
        {{-- 新增奖项按钮模态框结束 --}}

      </div><!-- set-prize -->
    </div><!-- row -->
  </div><!-- container-fluid -->
@stop
