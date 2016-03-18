@extends('layout')

@section('title')设置奖项@stop

@section('body')
  @parent

  <div class="container-fluid">
    <div class="row">
      <div id="set-prize" class="col-md-10 col-md-offset-1">
        <div class="page-header">
          <h2 class="h3">设置奖项</h2>
        </div>

        {{-- 链接类奖品 --}}
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h2 class="panel-title">链接类奖品</h2>
          </div>

          <div class="panel-body">

            <div class="row">
              <div class="col-xs-12">
                <form class="form-vertical">

                    {{-- 奖项 --}}
                    <div class="form-group">
                      {{-- <label for="selectPrizePlaces" class="col-lg-2 control-label">选择奖项</label> --}}
                      <div class="col-lg-2">
                        <select class="form-control" id="selectPrizePlaces" required>
                          <option selected>一等奖</option>
                          <option>二等奖</option>
                          <option>三等奖</option>
                        </select>
                      </div>
                    </div>

                    {{-- 奖品名称 --}}
                    <div class="form-group">
                      {{-- <label for="inputPrizeName" class="col-lg-2 control-label">奖品名称</label> --}}
                      <div class="col-lg-4">
                        <input type="text" class="form-control" id="inputPrizeName" placeholder="奖品名称" required>
                      </div>
                    </div>

                    {{-- 兑奖链接 --}}
                    <div class="form-group">
                      {{-- <label for="inputURL" class="col-lg-2 control-label">兑奖链接</label> --}}
                      <div class="col-lg-4">
                        <input type="url" class="form-control" id="inputURL" placeholder="兑奖链接" required>
                      </div>
                    </div>

                    {{-- 权重 --}}
                    <div class="form-group">
                      {{-- <label for="inputNumber" class="col-lg-2 control-label">权重</label> --}}
                      <div class="col-lg-2">
                        <input type="number" class="form-control" id="inputNumber" placeholder="权重" required>
                      </div>
                    </div>

                </form>
              </div>
            </div>{{-- row --}}

            <div class="row">
              <div class="col-xs-12">
                <form class="form-vertical">

                    {{-- 奖项 --}}
                    <div class="form-group">
                      {{-- <label for="selectPrizePlaces" class="col-lg-2 control-label">选择奖项</label> --}}
                      <div class="col-lg-2">
                        <select class="form-control" id="selectPrizePlaces" required>
                          <option>一等奖</option>
                          <option selected>二等奖</option>
                          <option>三等奖</option>
                        </select>
                      </div>
                    </div>

                    {{-- 奖品名称 --}}
                    <div class="form-group">
                      {{-- <label for="inputPrizeName" class="col-lg-2 control-label">奖品名称</label> --}}
                      <div class="col-lg-4">
                        <input type="text" class="form-control" id="inputPrizeName" placeholder="奖品名称" required>
                      </div>
                    </div>

                    {{-- 兑奖链接 --}}
                    <div class="form-group">
                      {{-- <label for="inputURL" class="col-lg-2 control-label">兑奖链接</label> --}}
                      <div class="col-lg-4">
                        <input type="url" class="form-control" id="inputURL" placeholder="兑奖链接" required>
                      </div>
                    </div>

                    {{-- 权重 --}}
                    <div class="form-group">
                      {{-- <label for="inputNumber" class="col-lg-2 control-label">权重</label> --}}
                      <div class="col-lg-2">
                        <input type="number" class="form-control" id="inputNumber" placeholder="权重" required>
                      </div>
                    </div>

                </form>
              </div>
            </div>{{-- row --}}

            <div class="row">
              <div class="col-xs-12">
                <form class="form-vertical">

                    {{-- 奖项 --}}
                    <div class="form-group">
                      {{-- <label for="selectPrizePlaces" class="col-lg-2 control-label">选择奖项</label> --}}
                      <div class="col-lg-2">
                        <select class="form-control" id="selectPrizePlaces" required>
                          <option>一等奖</option>
                          <option>二等奖</option>
                          <option selected>三等奖</option>
                        </select>
                      </div>
                    </div>

                    {{-- 奖品名称 --}}
                    <div class="form-group">
                      {{-- <label for="inputPrizeName" class="col-lg-2 control-label">奖品名称</label> --}}
                      <div class="col-lg-4">
                        <input type="text" class="form-control" id="inputPrizeName" placeholder="奖品名称" required>
                      </div>
                    </div>

                    {{-- 兑奖链接 --}}
                    <div class="form-group">
                      {{-- <label for="inputURL" class="col-lg-2 control-label">兑奖链接</label> --}}
                      <div class="col-lg-4">
                        <input type="url" class="form-control" id="inputURL" placeholder="兑奖链接" required>
                      </div>
                    </div>

                    {{-- 权重 --}}
                    <div class="form-group">
                      {{-- <label for="inputNumber" class="col-lg-2 control-label">权重</label> --}}
                      <div class="col-lg-2">
                        <input type="number" class="form-control" id="inputNumber" placeholder="权重" required>
                      </div>
                    </div>

                </form>
              </div>
            </div>{{-- row --}}


            {{-- 按钮 --}}
            <div class="form-group action-btn">
              <div class="col-sm-2">
                <button class="btn btn-lg btn-primary">+ 增加奖品</button>
              </div>
              <div class="col-sm-4">
                <input type="number" class="form-control" id="inputProbability" placeholder="请输入此类奖品的中奖概率" required>
              </div>
              <div class="col-sm-4 col-md-3 pull-right" align="center">
                <button type="reset" class="btn btn-lg btn-default">重置</button>
                <button type="submit" class="btn btn-lg btn-primary">保存</button>
              </div>
            </div>

          </div>{{-- panel-body --}}

        </div>{{-- panel-heading --}}


        {{-- 兑换码奖品 --}}
        <div class="panel panel-success">
          <div class="panel-heading">
            <h2 class="panel-title">兑换码类奖品</h2>
          </div>

          <div class="panel-body">

            <div class="row">
              <div class="col-xs-12">
                <form class="form-vertical">

                    {{-- 奖项 --}}
                    <div class="form-group">
                      {{-- <label for="selectPrizePlaces" class="col-lg-2 control-label">选择奖项</label> --}}
                      <div class="col-lg-2">
                        <select class="form-control" id="selectPrizePlaces" required>
                          <option selected>一等奖</option>
                          <option>二等奖</option>
                          <option>三等奖</option>
                        </select>
                      </div>
                    </div>

                    {{-- 奖品名称 --}}
                    <div class="form-group">
                      {{-- <label for="inputPrizeName" class="col-lg-2 control-label">奖品名称</label> --}}
                      <div class="col-lg-3">
                        <input type="text" class="form-control" id="inputPrizeName" placeholder="奖品名称" required>
                      </div>
                    </div>

                    {{-- 兑奖链接 --}}
                    <div class="form-group">
                      {{-- <label for="inputURL" class="col-lg-2 control-label">兑奖链接</label> --}}
                      <div class="col-lg-2">
                        <input type="url" class="form-control" id="inputURL" placeholder="兑奖链接" required>
                      </div>
                    </div>

                    {{-- 上传Excel 兑换码 --}}
                    <div class="form-group">
                      <label for="inputCode" class="col-lg-1 control-label">上传Excel</label>
                      <div class="col-lg-3">
                        <input type="file" class="form-control" id="inputExcel" required>
                      </div>
                    </div>

                    {{-- 权重 --}}
                    <div class="form-group">
                      {{-- <label for="inputNumber" class="col-lg-2 control-label">权重</label> --}}
                      <div class="col-lg-1">
                        <input type="number" class="form-control" id="inputNumber" placeholder="权重" required>
                      </div>
                    </div>

                </form>
              </div>
            </div>{{-- row --}}

            <div class="row">
              <div class="col-xs-12">
                <form class="form-vertical">

                    {{-- 奖项 --}}
                    <div class="form-group">
                      {{-- <label for="selectPrizePlaces" class="col-lg-2 control-label">选择奖项</label> --}}
                      <div class="col-lg-2">
                        <select class="form-control" id="selectPrizePlaces" required>
                          <option>一等奖</option>
                          <option selected>二等奖</option>
                          <option>三等奖</option>
                        </select>
                      </div>
                    </div>

                    {{-- 奖品名称 --}}
                    <div class="form-group">
                      {{-- <label for="inputPrizeName" class="col-lg-2 control-label">奖品名称</label> --}}
                      <div class="col-lg-3">
                        <input type="text" class="form-control" id="inputPrizeName" placeholder="奖品名称" required>
                      </div>
                    </div>

                    {{-- 兑奖链接 --}}
                    <div class="form-group">
                      {{-- <label for="inputURL" class="col-lg-2 control-label">兑奖链接</label> --}}
                      <div class="col-lg-2">
                        <input type="url" class="form-control" id="inputURL" placeholder="兑奖链接" required>
                      </div>
                    </div>

                    {{-- 上传Excel 兑换码 --}}
                    <div class="form-group">
                      <label for="inputCode" class="col-lg-1 control-label">上传Excel</label>
                      <div class="col-lg-3">
                        <input type="file" class="form-control" id="inputExcel" required>
                      </div>
                    </div>

                    {{-- 权重 --}}
                    <div class="form-group">
                      {{-- <label for="inputNumber" class="col-lg-2 control-label">权重</label> --}}
                      <div class="col-lg-1">
                        <input type="number" class="form-control" id="inputNumber" placeholder="权重" required>
                      </div>
                    </div>

                </form>
              </div>
            </div>{{-- row --}}

            <div class="row">
              <div class="col-xs-12">
                <form class="form-vertical">

                    {{-- 奖项 --}}
                    <div class="form-group">
                      {{-- <label for="selectPrizePlaces" class="col-lg-2 control-label">选择奖项</label> --}}
                      <div class="col-lg-2">
                        <select class="form-control" id="selectPrizePlaces" required>
                          <option>一等奖</option>
                          <option>二等奖</option>
                          <option selected>三等奖</option>
                        </select>
                      </div>
                    </div>

                    {{-- 奖品名称 --}}
                    <div class="form-group">
                      {{-- <label for="inputPrizeName" class="col-lg-2 control-label">奖品名称</label> --}}
                      <div class="col-lg-3">
                        <input type="text" class="form-control" id="inputPrizeName" placeholder="奖品名称" required>
                      </div>
                    </div>

                    {{-- 兑奖链接 --}}
                    <div class="form-group">
                      {{-- <label for="inputURL" class="col-lg-2 control-label">兑奖链接</label> --}}
                      <div class="col-lg-2">
                        <input type="url" class="form-control" id="inputURL" placeholder="兑奖链接" required>
                      </div>
                    </div>

                    {{-- 上传Excel 兑换码 --}}
                    <div class="form-group">
                      <label for="inputCode" class="col-lg-1 control-label">上传Excel</label>
                      <div class="col-lg-3">
                        <input type="file" class="form-control" id="inputExcel" required>
                      </div>
                    </div>

                    {{-- 权重 --}}
                    <div class="form-group">
                      {{-- <label for="inputNumber" class="col-lg-2 control-label">权重</label> --}}
                      <div class="col-lg-1">
                        <input type="number" class="form-control" id="inputNumber" placeholder="权重" required>
                      </div>
                    </div>

                </form>
              </div>
            </div>{{-- row --}}


            {{-- 按钮 --}}
            <div class="form-group action-btn">
              <div class="col-sm-2">
                <button class="btn btn-lg btn-success">+ 增加奖品</button>
              </div>
              <div class="col-sm-4">
                <input type="number" class="form-control" id="inputProbability" placeholder="请输入此类奖品的中奖概率" required>
              </div>
              <div class="col-sm-4 col-md-3 pull-right" align="center">
                <button type="reset" class="btn btn-lg btn-default">重置</button>
                <button type="submit" class="btn btn-lg btn-success">保存</button>
              </div>
            </div>

          </div>{{-- panel-body --}}

        </div>{{-- panel-heading --}}


        {{-- 实物类奖品 --}}
        <div class="panel panel-info">
          <div class="panel-heading">
            <h2 class="panel-title">实物类奖品</h2>
          </div>

          <div class="panel-body">

            <div class="row">
              <div class="col-xs-12">
                <form class="form-vertical">

                    {{-- 奖项 --}}
                    <div class="form-group">
                      {{-- <label for="selectPrizePlaces" class="col-lg-2 control-label">选择奖项</label> --}}
                      <div class="col-lg-2">
                        <select class="form-control" id="selectPrizePlaces" required>
                          <option selected>一等奖</option>
                          <option>二等奖</option>
                          <option>三等奖</option>
                        </select>
                      </div>
                    </div>

                    {{-- 奖品名称 --}}
                    <div class="form-group">
                      {{-- <label for="inputPrizeName" class="col-lg-2 control-label">奖品名称</label> --}}
                      <div class="col-lg-3">
                        <input type="text" class="form-control" id="inputPrizeName" placeholder="奖品名称" required>
                      </div>
                    </div>

                    {{-- 奖品图片 --}}
                    <div class="form-group">
                      <label class="col-lg-1" for="inputImg" class="col-lg-2 control-label">奖品图片</label>
                      <div class="col-lg-3">
                        <input type="file" class="form-control" id="inputImg" placeholder="上传实物图片">
                      </div>
                    </div>

                    {{-- 奖品数量 --}}
                    <div class="form-group">
                      {{-- <label for="inputNumber" class="col-lg-2 control-label">奖品数量</label> --}}
                      <div class="col-lg-2">
                        <input type="number" class="form-control" id="inputNumber" placeholder="奖品数量" required>
                      </div>
                    </div>

                    {{-- 权重 --}}
                    <div class="form-group">
                      {{-- <label for="inputNumber" class="col-lg-2 control-label">权重</label> --}}
                      <div class="col-lg-1">
                        <input type="number" class="form-control" id="inputNumber" placeholder="权重" required>
                      </div>
                    </div>

                </form>
              </div>
            </div>{{-- row --}}

            <div class="row">
              <div class="col-xs-12">
                <form class="form-vertical">

                    {{-- 奖项 --}}
                    <div class="form-group">
                      {{-- <label for="selectPrizePlaces" class="col-lg-2 control-label">选择奖项</label> --}}
                      <div class="col-lg-2">
                        <select class="form-control" id="selectPrizePlaces" required>
                          <option>一等奖</option>
                          <option selected>二等奖</option>
                          <option>三等奖</option>
                        </select>
                      </div>
                    </div>

                    {{-- 奖品名称 --}}
                    <div class="form-group">
                      {{-- <label for="inputPrizeName" class="col-lg-2 control-label">奖品名称</label> --}}
                      <div class="col-lg-3">
                        <input type="text" class="form-control" id="inputPrizeName" placeholder="奖品名称" required>
                      </div>
                    </div>

                    {{-- 奖品图片 --}}
                    <div class="form-group">
                      <label class="col-lg-1" for="inputImg" class="col-lg-2 control-label">奖品图片</label>
                      <div class="col-lg-3">
                        <input type="file" class="form-control" id="inputImg" placeholder="上传实物图片">
                      </div>
                    </div>

                    {{-- 奖品数量 --}}
                    <div class="form-group">
                      {{-- <label for="inputNumber" class="col-lg-2 control-label">奖品数量</label> --}}
                      <div class="col-lg-2">
                        <input type="number" class="form-control" id="inputNumber" placeholder="奖品数量" required>
                      </div>
                    </div>

                    {{-- 权重 --}}
                    <div class="form-group">
                      {{-- <label for="inputNumber" class="col-lg-2 control-label">权重</label> --}}
                      <div class="col-lg-1">
                        <input type="number" class="form-control" id="inputNumber" placeholder="权重" required>
                      </div>
                    </div>

                </form>
              </div>
            </div>{{-- row --}}

            <div class="row">
              <div class="col-xs-12">
                <form class="form-vertical">

                    {{-- 奖项 --}}
                    <div class="form-group">
                      {{-- <label for="selectPrizePlaces" class="col-lg-2 control-label">选择奖项</label> --}}
                      <div class="col-lg-2">
                        <select class="form-control" id="selectPrizePlaces" required>
                          <option>一等奖</option>
                          <option>二等奖</option>
                          <option selected>三等奖</option>
                        </select>
                      </div>
                    </div>

                    {{-- 奖品名称 --}}
                    <div class="form-group">
                      {{-- <label for="inputPrizeName" class="col-lg-2 control-label">奖品名称</label> --}}
                      <div class="col-lg-3">
                        <input type="text" class="form-control" id="inputPrizeName" placeholder="奖品名称" required>
                      </div>
                    </div>

                    {{-- 奖品图片 --}}
                    <div class="form-group">
                      <label class="col-lg-1" for="inputImg" class="col-lg-2 control-label">奖品图片</label>
                      <div class="col-lg-3">
                        <input type="file" class="form-control" id="inputImg" placeholder="上传实物图片">
                      </div>
                    </div>

                    {{-- 奖品数量 --}}
                    <div class="form-group">
                      {{-- <label for="inputNumber" class="col-lg-2 control-label">奖品数量</label> --}}
                      <div class="col-lg-2">
                        <input type="number" class="form-control" id="inputNumber" placeholder="奖品数量" required>
                      </div>
                    </div>

                    {{-- 权重 --}}
                    <div class="form-group">
                      {{-- <label for="inputNumber" class="col-lg-2 control-label">权重</label> --}}
                      <div class="col-lg-1">
                        <input type="number" class="form-control" id="inputNumber" placeholder="权重" required>
                      </div>
                    </div>

                </form>
              </div>
            </div>{{-- row --}}


            {{-- 按钮 --}}
            <div class="form-group action-btn">
              <div class="col-sm-2">
                <button class="btn btn-lg btn-info">+ 增加奖品</button>
              </div>
              <div class="col-sm-4">
                <input type="number" class="form-control" id="inputProbability" placeholder="请输入此类奖品的中奖概率" required>
              </div>
              <div class="col-sm-4 col-md-3 pull-right" align="center">
                <button type="reset" class="btn btn-lg btn-default">重置</button>
                <button type="submit" class="btn btn-lg btn-info">保存</button>
              </div>
            </div>

          </div>{{-- panel-body --}}

        </div>{{-- panel-heading --}}

      </div>
    </div>
  </div>
@stop
