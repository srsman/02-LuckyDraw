<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LANSUR 微信抽奖</title>
<script type="text/javascript" src="{{ asset('js/jquery-1.7.2-min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/easing.js') }}"></script>

<style>
html,body{margin:0;padding:0;overflow:hidden;background:#fff;}
.body{background:url({{ asset('img/body_bg.jpg') }}) 0px 0px repeat-x #000;}
.main_bg{background:url({{ asset('img/main_bg_2.jpg')}}) top center no-repeat;height:1000px;}
.main{width:1000px;height:1000px;position:relative;margin:0 auto;}
.num_mask{background:url({{asset('img/num_mask.png')}}) 0px 0px no-repeat;height:184px;width:740px;position:absolute;left:50%;top:340px;margin-left:-379px;z-index:9;}
.num_box{height:450px;width:750px;position:absolute;left:50%;top:340px;margin-left:-370px;z-index:8;overflow:hidden;text-align:center;}
.num{background:url({{asset('img/num.png')}}) top center repeat-y;width:163px;height:265px;float:left;margin-right:23px;}
.btn{background:url({{asset('img/btn_start.png')}}) 0px 0px no-repeat;width:264px;height:89px;position:absolute;left:50%;bottom:0;margin-left:-132px;cursor:pointer;clear:both;}
.partner{float: left;margin-right: 20px;margin-left:20px;width: 200px;height: 180px}
</style>
</head>
<body>
<br />
<center><img src="{{asset('img/logo.png')}}" width="300px" alt="兰瑟 Logo" title="兰瑟 Logo" /></center>
<br />
<br />
<div class="main_bg">

  <div class="main">
    <div id="res" style="text-align:center;color:#fff;padding-top:15px;"></div>
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
  	<div>
      <img class="partner" src="{{ asset('dist/img/partner1.jpg') }}" alt="">
      <img class="partner" src="{{ asset('dist/img/partner2.png') }}" alt="">
      <img class="partner" src="{{ asset('dist/img/partner3.jpg') }}" alt="">
      <img class="partner" src="{{ asset('dist/img/partner4.jpg') }}" alt="">
    </div>
</body>
</html>
<script>
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
		// var result = numRand();
		var result = '0000';
		// $('#res').text('摇奖结果 = '+result);
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
							location.href = '../Prize/CUID={{$cuid}}';

					};

					}

				});

			}, index * 300);

		});

	});


});

</script>
