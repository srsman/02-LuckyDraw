@extends('layout-mobile')

@section('title')LANSUR 微信抽奖@stop

@section('body')
  @parent

  <main id="get-prize" class="container-fluid">
    <div class="row">
      <div class="col-xs-12">
        <img id="brand-logo" src="{{ asset('dist/img/logo1.png') }}" alt="LANSUR Logo">
        <div class="jumbotron">
          <h1>中奖啦！</h1>
          <p>恭喜你，中了实物类一等奖！奖品是：SKII 眼霜！</p>
          <p>同类奖品还有 SKII 眼霜、深海碳泥面膜……</p>
          <p><a class="btn btn-danger btn-lg" data-toggle="modal" data-target="#getIt">点击领奖</a></p>
        </div>

        {{-- 模态框 --}}
        <div id="getIt" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">填写领奖信息</h4>
              </div>
              <div class="modal-body">

                {{-- 领奖表单 --}}
                <form class="form-horizontal">
                  <fieldset>
                    <div class="form-group">
                      <label for="inputName" class="col-lg-2 control-label">姓名</label>
                      <div class="col-lg-10">
                        <input type="text" class="form-control" id="inputName" placeholder="请填写你的姓名">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPhone" class="col-lg-2 control-label">手机号</label>
                      <div class="col-lg-10">
                        <input type="password" class="form-control" id="inputPhone" placeholder="请填写你的手机号码">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputAddress" class="col-lg-2 control-label">住址</label>
                      <div class="col-lg-10">
                        <input type="text" class="form-control" id="inputAddress" placeholder="请填写领取奖品的地址">
                      </div>
                    </div>
                  </fieldset>
                </form>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                <button type="button" class="btn btn-primary">确定</button>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </main>

@stop