{{-- 滚动模态框 --}}
<div class="modal fade" id="roll" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">
          <center><img src="{{asset('dist/img/logo.png')}}" alt="兰瑟 Logo" title="兰瑟 Logo"></center>
        </h4>
      </div>

      <div class="modal-body">
        <div class="main_bg">
          <div class="main">
            <div class="num_mask"></div>
            <div class="num_box">
              <div class="roll-num"></div>
              <div class="roll-num"></div>
              <div class="roll-num"></div>
              <div class="roll-num"></div>
            </div>
            <button id="begin" href="" class="btn btn-normal btn-danger">开始摇奖</button>
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <section class="partner col-xs-12">
          <img class="img-responsive col-xs-3" src="{{ asset('dist/img/partner1.jpg') }}" alt="">
          <img class="img-responsive col-xs-3" src="{{ asset('dist/img/partner2.png') }}" alt="">
          <img class="img-responsive col-xs-3" src="{{ asset('dist/img/partner3.jpg') }}" alt="">
          <img class="img-responsive col-xs-3" src="{{ asset('dist/img/partner4.jpg') }}" alt="">
        </section>
      </div>
    </div>
  </div>
</div>
{{-- 模态框结束 --}}
