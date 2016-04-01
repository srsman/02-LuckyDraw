
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>抽奖</title>

      <link rel="stylesheet" href="{{ asset('dist/css/bootstrap.min.css') }}">
      <link rel="stylesheet" href="{{ asset('dist/css/index.css') }}">
      <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
      <script src="//cdn.bootcss.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
      <script type="text/javascript" src="{{asset('js/easing.js')}}"></script>
      <style>
.main_bg{background:url({{asset('dist/img/main_bg.jpg')}}) top center no-repeat;}
.main{width:500px;height:900px;position:relative;margin:0 auto;}
.num_mask{background:url({{asset('dist/img/num_mask.png')}}) 0px 0px no-repeat;height:184px;width:750px;position:absolute;left:50%;top:340px;margin-left:-370px;z-index:9;}
.num_box{height:450px;width:750px;position:absolute;left:50%;top:340px;margin-left:-370px;z-index:8;overflow:hidden;text-align:center;}
.num{background:url({{asset('dist/img/num.png')}}) top center repeat-y;width:163px;height:265px;float:left;margin-right:12px;margin-left: 12px}
.btn{background:url({{asset('dist/img/btn_start.png')}}) 0px 0px no-repeat;width:264px;height:89px;position:absolute;left:50%;bottom:50px;margin-left:-132px;cursor:pointer;clear:both;}
.partner2{float: left;margin-right: 40px;margin-left:40px;width: 130px;height: 130px}
</style>
</head>
<body>
  




 {{-- 滚动模态框 --}}
  <div class="modal fade bs-example-modal-lg" id="roll" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
    <div class="modal-dialog modal-lg" role="document" style="
    width: 900px;">
      <div class="modal-content" width="900px" >
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title" id="myModalLabel"> <center>
            <img src="{{asset('dist/img/logo.png')}}" width="200px" height="120px" alt="" />  
          </center> </h4>
        </div>
        <div class="modal-body" >
         
          <br />  
          <div class="main_bg">
            <div class="main">
              <div class="num_mask"></div>
              <div class="num_box">
                <div class="num"></div>
                <div class="num"></div>
                <div class="num"></div>
                <div class="num"></div>
                <div class="btn"></div>
              </div>
            </div>
          </div>
          <br />  
          <br />  
        </div>
        {{-- <p>合作伙伴</p> --}}
        <div class="modal-footer">
          <div>
            <img class="partner2" src="{{ asset('dist/img/partner1.jpg') }}" alt="">  
            <img class="partner2" src="{{ asset('dist/img/partner2.png') }}" alt="">  
            <img class="partner2" src="{{ asset('dist/img/partner3.jpg') }}" alt="">  
            <img class="partner2" src="{{ asset('dist/img/partner4.jpg') }}" alt=""></div>
          <!--   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
        -->
      </div>
    </div>
  </div>
  </div>
   {{-- 模态框结束 --}}
   {{-- 滚动算法 --}}
   <script>
$(document).ready(function() {  
    $("#roll").modal('show');
  });


function numRand() {
  var x = 9999; //上限
  var y = 1111; //下限
  var rand = parseInt(Math.random() * (x - y + 1) + y);
  return rand;
}
var isBegin = false;
$(function(){
  var u = 265;
  $('.btn').click(function(){
    if(isBegin) return false;
    isBegin = true;
    $(".num").css('backgroundPositionY',0);
    var result = numRand();
    var result = '0000';
    $('#res').text('摇奖结果 = '+result);
    var num_arr = (result+'').split('');
    $(".num").each(function(index){
      var _num = $(this);
      setTimeout(function(){
        _num.animate({ 
          backgroundPositionY: (u*60) - (u*num_arr[index])
        },{
          duration: 6000+index*3000,
          easing: "easeInOutCirc",
          complete: function(){
            if(index==3){
              isBegin = false;
              alert('恭喜你中奖啦');
              $('#roll').modal('hide');

          };

          }

        });

      }, index * 300);

    });

  }); 


});

</script>
</body>
</html>
