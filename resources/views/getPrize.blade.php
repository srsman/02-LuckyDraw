@extends('layout-mobile')

@section('title')LANSUR 微信抽奖@stop

@section('body')
  @parent

  <main id="get-prize" class="container-fluid">
    <div class="row">
      <div class="col-xs-12 col-sm-6 col-sm-offset-3">
        <img id="brand-logo" src="{{ asset('dist/img/logo.png') }}" alt="LANSUR Logo">
        <a href="" data-toggle="modal" data-target="#rule"><span class="rule pull-right glyphicon glyphicon-question-sign" aria-hidden="true"></span></a>

        {{-- 提示中奖区域 --}}
        <section class="prize-info col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2">
          <h5 class="col-xs-12">恭喜你！<br>中了{{ $luckdraw['prize'] }}！</h5>
          <h6 class="prize-name">{{$luckdraw['name']}}</h6>
          <div class="prize-img col-xs-8 col-xs-offset-2">
            <img class="prize" src="{{substr('http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'], 0,-9).'uploads/img/'.$luckdraw['url'] }}" alt="奖品图片">
          </div>
        </section>
        @if($luckdraw['category_id']===2)
        <section class="other-prizes col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2">
          <h6 class="prize-code">【领取码】: {{ $luckdraw['code'] }}</h6>
        </section>
        @endif

        <section class="other-prizes col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2">
          <h6>还有这些奖品喔：</h6>
          <ul>
            @foreach($name_rands as $name_rand)
            <li>{{ $name_rand }}</li>
            @endforeach
          </ul>
        </section>

        <section class="get-btn col-xs-6 col-xs-offset-3">
        @if($luckdraw['category_id']===3)
          <a href="" class="btn btn-normal btn-success" data-toggle="modal" data-target="#getIt">我要领奖</a>
        @else
          <a href="{{ 'https://'.$luckdraw['prize_url'] }}" class="btn btn-normal btn-success" >兑换</a>
        @endif
        </section>
        {{-- 提示中奖区域 --}}

        <section class="partner col-xs-12">
          <p>合作伙伴</p>
          <img src="{{ asset('dist/img/partner1.jpg') }}" alt="">
          <img src="{{ asset('dist/img/partner2.jpg') }}" alt="">
          <img src="{{ asset('dist/img/partner3.jpg') }}" alt="">
          <img src="{{ asset('dist/img/partner4.jpg') }}" alt="">
        </section>

        {{-- 填写领奖信息模态框 --}}
        <div id="getIt" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">填写领奖信息</h4>
              </div>
              <div class="modal-body">

                {{-- 领奖表单 --}}
                <form class="form-horizontal" action="fillInfo/{{$cuid}}" method="POST" >
                  <fieldset>
                    <div class="form-group">
                      <label for="inputName" class="col-lg-2 control-label">姓名</label>
                      <div class="col-lg-10">
                        <input type="text" class="form-control" id="inputName"  placeholder="请填写你的姓名" name="award_realname">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPhone" class="col-lg-2 control-label">手机号</label>
                      <div class="col-lg-10">
                        <input type="text" class="form-control" id="inputPhone"  placeholder="请填写你的手机号码" name="award_phone">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputAddress" class="col-lg-2 control-label">住址</label>
                      <div class="col-lg-10">
                        <input type="text" class="form-control" id="inputAddress"  placeholder="请填写领取奖品的地址" name="award_address">
                      </div>
                    </div>
                  </fieldset>

                  <div class="modal-footer">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <button type="submit" class="btn btn-primary">确定</button>
                  </div>

                </form>

              </div>

            </div>
          </div>
        </div><!-- 模态框结束 -->

        {{-- 抽奖说明模态框 --}}
        <div id="rule" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="rule">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h5 class="modal-title">抽奖说明</h5>
              </div>
              <div class="modal-body">
                <p>①若抽中实物类奖品，请务必填写准确的联系信息，如因个人原因信息错漏导致一切后果本公司概不负责。</p>
                <p>②本次抽奖的优惠串码与领奖链接由合作方提供。如果出现链接失效或者串码无法兑换等情况请到“兰瑟官方”公众号后台咨询客服。</p>
                <p>③兑换码与链接都有相应时间限制。具体详见“兰瑟官方”公众号奖品规则明细。</p>
                <p>④免责声明，非兰瑟品牌的奖品所产生的纠纷和造成的一切后果本公司概不负责。</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">好，了解</button>
              </div>
            </div>
          </div>
        </div>
        {{-- 模态框结束 --}}

      </div>
    </div>
  </main>

@stop
