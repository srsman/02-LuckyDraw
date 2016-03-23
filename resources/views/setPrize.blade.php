@extends('layout')

@section('title')设置奖项@stop

@section('body')
  @parent

  <div class="container-fluid">
    <div class="row">
      <div id="set-prize" class="col-lg-12">
        <div class="page-header">
          <h2 class="h3">设置奖项</h2>
        </div>

        <!-- 设置概率 -->
        <div id="set-Probability" class="panel panel-warning">
          <div class="panel-heading">
            <h2 class="panel-title">设置三类奖品的中奖概率</h2>
          </div>

          <div class="panel-body">
            <form class="form-vertical" action="" method="POST" enctype="multipart/form-data">

              <input type="hidden" name="_token" value="{{ csrf_token() }}">

              <div class="row">
                <div class="col-sm-8 col-sm-offset-2 col-md-12 col-md-offset-0">

                  <div class="form-group">
                    <div class="col-sm-6 col-md-2">
                      <label for="inputProbability" class="control-label">链接类奖品中奖概率：</label>
                    </div>
                    <div class="col-sm-6 col-md-2">
                      <input type="number" class="form-control" id="inputProbability" placeholder="中奖概率">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-6 col-md-2">
                      <label for="inputProbability" class="control-label">链接类奖品中奖概率：</label>
                    </div>
                    <div class="col-sm-6 col-md-2">
                      <input type="number" class="form-control" id="inputProbability" placeholder="中奖概率">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-6 col-md-2">
                      <label for="inputProbability" class="control-label">链接类奖品中奖概率：</label>
                    </div>
                    <div class="col-sm-6 col-md-2">
                      <input type="number" class="form-control" id="inputProbability" placeholder="中奖概率">
                    </div>
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
            <form class="form-vertical" action="./setPrize/link" method="POST" enctype="multipart/form-data">

              <input type="hidden" name="_token" value="{{ csrf_token() }}">

              @foreach ($links as $key=>$link)
              <div class="row">
                <div class="col-xs-12">
                  <input type="hidden" name="data_id{{$key+1}}" value="{{$link['id']}}">
                  {{-- 奖项{{$key+1}} --}}
                  <div class="form-group">
                    {{-- <label for="selectPrizePlaces" class="col-lg-2 control-label">选择奖项</label> --}}
                    <div class="col-lg-2">
                      <select class="form-control" id="selectPrizePlaces{{$key+1}}" name="selectPrizePlaces{{$key+1}}" required>
                        @if (($link['prize']) == '一等奖')
                        <option selected>一等奖</option>
                        <option>二等奖</option>
                        <option>三等奖</option>
                        @elseif (($link['prize']) == '二等奖')
                        <option>一等奖</option>
                        <option selected>二等奖</option>
                        <option>三等奖</option>
                        @elseif (($link['prize']) == '三等奖')
                        <option>一等奖</option>
                        <option>二等奖</option>
                        <option selected>三等奖</option>
                        @else
                        <option>一等奖</option>
                        <option>二等奖</option>
                        <option>三等奖</option>
                        @endif
                      </select>
                    </div>
                  </div>

                  {{-- 奖品名称 --}}
                  <div class="form-group">
                    {{-- <label for="inputPrizeName" class="col-lg-2 control-label">奖品名称</label> --}}
                    <div class="col-lg-2">
                      <input type="text" class="form-control" id="inputPrizeName{{$key+1}}" name="inputPrizeName{{$key+1}}" placeholder="奖品名称" value="{{ $link['name'] }}" required>
                    </div>
                  </div>

                  {{-- 兑奖链接 --}}
                  <div class="form-group">
                    {{-- <label for="inputURL" class="col-lg-2 control-label">兑奖链接</label> --}}
                    <div class="col-lg-2">
                      <input type="url" class="form-control" id="inputURL{{$key+1}}" name="inputURL{{$key+1}}" placeholder="兑奖链接" value="{{ $link['prize_url'] }}" required>
                    </div>
                  </div>

                  {{-- 奖品图片 --}}
                  <div class="form-group">
                    @if (!empty($link['url']))
                    <label class="col-lg-1" for="inputImg" class="col-lg-2 control-label"><a href="{{substr('http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'], 0,-9)}}/uploads/img/{{ $link['url']}}" target="blank">查看已上传的图片</a></label>
                    <div class="col-lg-3">
                      <input type="file" class="form-control" id="inputImg{{$key+1}}" name="inputImg{{$key+1}}" placeholder="重新上传图片">
                    </div>
                    @else
                    <label class="col-lg-1" for="inputImg" class="col-lg-2 control-label">上传奖品图片</label>
                    <div class="col-lg-3">
                      <input type="file" class="form-control" id="inputImg{{$key+1}}" name="inputImg{{$key+1}}" placeholder="上传实物图片">
                    </div>
                    @endif
                  </div>

                  {{-- 权重 --}}
                  <div class="form-group">
                    {{-- <label for="inputNumber" class="col-lg-2 control-label">权重</label> --}}
                    <div class="col-lg-2">
                      <input type="number" class="form-control" id="inputNumber{{$key+1}}" name="inputNumber{{$key+1}}" placeholder="权重" value="{{$link['weight']}}" required>
                    </div>
                  </div>

                </div>
              </div>{{-- row --}}
              @endforeach

              {{-- 按钮 --}}
              <div class="row">
                <div class="form-group action-btn col-xs-12">
                  <div class="col-sm-2">
                    <button class="btn btn-lg btn-primary">+ 增加奖品</button>
                  </div>

                  <div class="col-sm-4 col-md-3 pull-right" align="center">
                    <button type="reset" class="btn btn-lg btn-default">重置</button>
                    <button type="submit" class="btn btn-lg btn-primary">保存</button>
                  </div>
                </div>
              </div>

            </form>

          </div>{{-- panel-body --}}

        </div>{{-- panel --}}


        {{-- 兑换码奖品 --}}
        <div class="panel panel-success">
          <div class="panel-heading">
            <h2 class="panel-title">兑换码类奖品</h2>
          </div>

          <div class="panel-body">

            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <form class="form-vertical" action="./setPrize/code" method="POST" enctype="multipart/form-data">
              @foreach ($codes as $key=>$code)
              <div class="row">
                <div class="col-xs-12">
                  <input type="hidden" name="data_id{{$key+1}}" value="{{$code['id']}}">
                  {{-- 奖项{{$key+1}} --}}
                  <div class="form-group">
                    {{-- <label for="selectPrizePlaces" class="col-lg-2 control-label">选择奖项</label> --}}
                    <div class="col-lg-1">
                      <select class="form-control" id="selectPrizePlaces{{$key+1}}" name="selectPrizePlaces{{$key+1}}" required>
                        @if (($code['prize']) == '一等奖')
                        <option selected>一等奖</option>
                        <option>二等奖</option>
                        <option>三等奖</option>
                        @elseif (($code['prize']) == '二等奖')
                        <option>一等奖</option>
                        <option selected>二等奖</option>
                        <option>三等奖</option>
                        @elseif (($code['prize']) == '三等奖')
                        <option>一等奖</option>
                        <option>二等奖</option>
                        <option selected>三等奖</option>
                        @else
                        <option>一等奖</option>
                        <option>二等奖</option>
                        <option>三等奖</option>
                        @endif
                      </select>
                    </div>
                  </div>

                  {{-- 奖品名称 --}}
                  <div class="form-group">
                    {{-- <label for="inputPrizeName" class="col-lg-2 control-label">奖品名称</label> --}}
                    <div class="col-lg-2">
                      <input type="text" class="form-control" id="inputPrizeName{{$key+1}}" name="inputPrizeName{{$key+1}}" placeholder="奖品名称" value="{{ $code['name'] }}" required>
                    </div>
                  </div>

                  {{-- 兑奖链接 --}}
                  <div class="form-group">
                    {{-- <label for="inputURL" class="col-lg-2 control-label">兑奖链接</label> --}}
                    <div class="col-lg-2">
                      <input type="url" class="form-control" id="inputURL{{$key+1}}" name="inputURL{{$key+1}}" value="{{ $code['prize_url'] }}" placeholder="兑奖链接" required>
                    </div>
                  </div>

                  {{-- 奖品图片 --}}
                  <div class="form-group">
                    @if (!empty($code['url']))
                    <label class="col-lg-1" for="inputImg" class="col-lg-2 control-label"><a href="{{substr('http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'], 0,-9)}}/uploads/img/{{ $code['url']}}" target="blank">查看已上传的图片</a></label>
                    <div class="col-lg-2">
                      <input type="file" class="form-control" id="inputImg{{$key+1}}" name="inputImg{{$key+1}}" placeholder="重新上传图片">
                    </div>
                    @else
                    <label class="col-lg-1" for="inputImg" class="col-lg-2 control-label">上传奖品图片</label>
                    <div class="col-lg-2">
                      <input type="file" class="form-control" id="inputImg{{$key+1}}" name="inputImg{{$key+1}}" placeholder="上传实物图片">
                    </div>
                    @endif
                  </div>

                  {{-- 上传Excel 兑换码 --}}
                  <div class="form-group">
                    <label for="inputCode" class="col-lg-1 control-label">上传Excel</label>
                    <div class="col-lg-2">
                      <input type="file" class="form-control" id="inputExcel{{$key+1}}" name="inputExcel{{$key+1}}">
                    </div>
                  </div>

                  {{-- 权重 --}}
                  <div class="form-group">
                    {{-- <label for="inputNumber" class="col-lg-2 control-label">权重</label> --}}
                    <div class="col-lg-1">
                      <input type="number" class="form-control" id="inputNumber{{$key+1}}" name="inputNumber{{$key+1}}" placeholder="权重" value="{{$code['weight']}}" required>
                    </div>
                  </div>

                </div>
              </div>{{-- row --}}
              @endforeach

              {{-- 按钮 --}}
              <div class="row">
                <div class="form-group action-btn col-xs-12">
                  <div class="col-sm-2">
                    <button class="btn btn-lg btn-success">+ 增加奖品</button>
                  </div>

                  <div class="col-sm-4 col-md-3 pull-right" align="center">
                    <button type="reset" class="btn btn-lg btn-default">重置</button>
                    <button type="submit" class="btn btn-lg btn-success">保存</button>
                  </div>
                </div>
              </div>

            </form>
          </div>{{-- panel-body --}}

        </div>{{-- panel --}}


        {{-- 实物类奖品 --}}
        <div class="panel panel-info">
          <div class="panel-heading">
            <h2 class="panel-title">实物类奖品</h2>
          </div>

          <div class="panel-body">

            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <form class="form-vertical" action="./setPrize/thing" method="POST" enctype="multipart/form-data">
              @foreach ($things as $key=>$thing)
              <div class="row">
                <div class="col-xs-12">

                  <input type="hidden" name="data_id{{$key+1}}" value="{{$thing['id']}}">
                  {{-- 奖项1 --}}
                  <div class="form-group">
                    {{-- <label for="selectPrizePlaces" class="col-lg-2 control-label">选择奖项</label> --}}
                    <div class="col-lg-2">
                      <select class="form-control" id="selectPrizePlaces{{$key+1}}" name="selectPrizePlaces{{$key+1}}" required>
                        @if (($thing['prize']) == '一等奖')
                        <option selected>一等奖</option>
                        <option>二等奖</option>
                        <option>三等奖</option>
                        @elseif (($thing['prize']) == '二等奖')
                        <option>一等奖</option>
                        <option selected>二等奖</option>
                        <option>三等奖</option>
                        @elseif (($thing['prize']) == '三等奖')
                        <option>一等奖</option>
                        <option>二等奖</option>
                        <option selected>三等奖</option>
                        @else
                        <option>一等奖</option>
                        <option>二等奖</option>
                        <option>三等奖</option>
                        @endif
                      </select>
                    </div>
                  </div>

                  {{-- 奖品名称 --}}
                  <div class="form-group">
                    {{-- <label for="inputPrizeName" class="col-lg-2 control-label">奖品名称</label> --}}
                    <div class="col-lg-3">
                      <input type="text" class="form-control" id="inputPrizeName{{$key+1}}" name="inputPrizeName{{$key+1}}" placeholder="奖品名称" value="{{ $link['name'] }}" required>
                    </div>
                  </div>

                  {{-- 奖品图片 --}}
                  <div class="form-group">
                    @if (!empty($thing['url']))
                    <label class="col-lg-1" for="inputImg" class="col-lg-2 control-label"><a href="{{substr('http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'], 0,-9)}}/uploads/img/{{ $thing['url']}}" target="blank">查看已上传的图片</a></label>
                    <div class="col-lg-3">
                      <input type="file" class="form-control" id="inputImg{{$key+1}}" name="inputImg{{$key+1}}" placeholder="重新上传图片">
                    </div>
                    @else
                    <label class="col-lg-1" for="inputImg" class="col-lg-2 control-label">上传奖品图片</label>
                    <div class="col-lg-3">
                      <input type="file" class="form-control" id="inputImg{{$key+1}}" name="inputImg{{$key+1}}" placeholder="上传实物图片">
                    </div>
                    @endif
                  </div>

                  {{-- 奖品数量 --}}
                  <div class="form-group">
                    {{-- <label for="inputNumber" class="col-lg-2 control-label">奖品数量</label> --}}
                    <div class="col-lg-2">
                      <input type="number" class="form-control" id="inputNumber{{$key+1}}" name="inputNumber{{$key+1}}" value="{{$thing['weight']}}" placeholder="奖品数量" required>
                    </div>
                  </div>

                  {{-- 权重 --}}
                  <div class="form-group">
                    {{-- <label for="inputNumber" class="col-lg-2 control-label">权重</label> --}}
                    <div class="col-lg-1">
                      <input type="number" class="form-control" id="inputPowerNumber1" name="inputPowerNumber1" placeholder="权重" required>
                    </div>
                  </div>

                </div>
              </div>{{-- row --}}
              @endforeach

                {{-- 按钮 --}}
              <div class="row">
                <div class="form-group action-btn col-xs-12">
                  <div class="col-sm-2">
                    <button class="btn btn-lg btn-info">+ 增加奖品</button>
                  </div>

                  <div class="col-sm-4 col-md-3 pull-right" align="center">
                    <button type="reset" class="btn btn-lg btn-default">重置</button>
                    <button type="submit" class="btn btn-lg btn-info">保存</button>
                  </div>
                </div>
              </div>
            </form>


          </div>{{-- panel-body --}}
        </div>{{-- panel --}}

      </div>
    </div>
  </div>
@stop
