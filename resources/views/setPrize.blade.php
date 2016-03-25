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
            <form class="form-vertical" action="" method="POST" enctype="multipart/form-data">

              <input type="hidden" name="_token" value="{{ csrf_token() }}">

              <div class="row">
                <div class="col-sm-8 col-sm-offset-2 col-md-12 col-md-offset-0">

                  <div class="form-group">
                    <div class="col-sm-6 col-md-2">
                      <label for="inputProbability" class="control-label">链接类奖品中奖概率</label>
                    </div>
                    <div class="col-sm-6 col-md-2">
                      <input type="number" class="form-control" id="inputProbability" placeholder="中奖概率（单位: %）">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-6 col-md-2">
                      <label for="inputProbability" class="control-label">兑换码类奖品中奖概率</label>
                    </div>
                    <div class="col-sm-6 col-md-2">
                      <input type="number" class="form-control" id="inputProbability" placeholder="中奖概率（单位: %）">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-6 col-md-2">
                      <label for="inputProbability" class="control-label">实物类奖品中奖概率</label>
                    </div>
                    <div class="col-sm-6 col-md-2">
                      <input type="number" class="form-control" id="inputProbability" placeholder="中奖概率（单位: %）">
                    </div>
                  </div>


                </div>
              </div><!-- row -->


              {{-- 按钮 --}}
              <div class="row">
                <div class="form-group action-btn col-xs-12">
                  <div class="col-sm-4 col-md-3 pull-right" align="center">
                    <button type="reset" class="btn btn-lg btn-default">重置</button>
                    <button type="submit" class="btn btn-lg btn-warning">保存</button>
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


          </div>{{-- panel-body --}}
        </div>{{-- panel --}}



        {{-- 兑换码奖品 --}}
        <div class="panel panel-success">
          <div class="panel-heading">
            <h2 class="panel-title">兑换码类奖品</h2>
          </div>

          <div class="panel-body">

          </div>{{-- panel-body --}}
        </div>{{-- panel --}}



        {{-- 实物类奖品 --}}
        <div class="panel panel-info">
          <div class="panel-heading">
            <h2 class="panel-title">实物类奖品</h2>
          </div>

          <div class="panel-body">

          </div>{{-- panel-body --}}
        </div>{{-- panel --}}

      </div>
    </div>
  </div>
@stop
