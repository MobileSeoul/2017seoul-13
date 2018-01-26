<?php
include_once('./_common.php');
define('_INDEX_', true);

if(!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once('./_head.php');
?>



<body class="main">
<div id="wrap">
    <div id="header">
        <div class="util">
            <div class="util_in">
            
            
            
            
                
                <ul class="util_link">
                
                    <li><a href="#">로그인</a></li>
                    <li><a href="#">회원가입</a></li>
                
                </ul>
            </div>
        </div>
        <div class="gnb" id="gnb">

                       <h1 style="margin-left:20px;"><a href="info.php"><img src="http://cyranoch.cafe24.com/css/ggom.png" style="width:180px;"></a></h1>
            <ul class="depth1" style="margin-right:-350px !important;">
                <li class="t m3"><a href="info01.php" class="tl">꿈나무카드</a>
                </li>
                <li class="t m4"><a href="info02.php" class="tl">가맹점안내</a>
                </li>
                <li class="t m5"><a href="info03.php" class="tl">착한가게</a>
                </li>

                <li class="t m6"><a href="info04.php" class="tl">빅리더소개</a>
                </li>
                            
            </ul>
        </div>
    </div>

<div class="snb_nav">
        <div class="snb">
            <div class="dep1">
                <h2>착한가게</h2>
            </div>
                  
            
        </div>
    </div>    
    <!-- //snb_nav -->

    
    <!-- container -->
    <div id="container">

<!-- contents -->
        

        <div id="contents" class="contents">
           
            <h3 class="tit_cnt">착한가게 추천</h3>
			<h5 style="position:relative;z-index:2;height:26px;padding:8px 0 0 60px;margin:30px 0 -2px;background:url('http://cyranoch.cafe24.com/css/bg_education.jpg') no-repeat 30px 0;color:#fff;line-height:1;font-size:18px;font-weight:bold;letter-spacing:-1px;">착한가게란?</h5>
			<div class="box_line5">
				<p class="txt_ty8"><strong>영양균형, 결식아동급식 등의 기준을 바탕으로 빅데이터 분석을 통해서 검증된 꿈나무카드 가맹점<br></strong>
			</div>
<?=latest("basic5", "week", 10, 30);?> 
	<script>
	jQuery(function($) {

  // MAD-RIPPLE // (jQ+CSS)
  $(document).on("mousedown", "[data-ripple]", function(e) {
    
    var $self = $(this);
    
    if($self.is(".btn-disabled")) {
      return;
    }
    if($self.closest("[data-ripple]")) {
      e.stopPropagation();
    }
    
    var initPos = $self.css("position"),
        offs = $self.offset(),
        x = e.pageX - offs.left,
        y = e.pageY - offs.top,
        dia = Math.min(this.offsetHeight, this.offsetWidth, 100), // start diameter
        $ripple = $('<div/>', {class : "ripple",appendTo : $self });
    
    if(!initPos || initPos==="static") {
      $self.css({position:"relative"});
    }
    
    $('<div/>', {
      class : "rippleWave",
      css : {
        background: $self.data("ripple"),
        width: dia,
        height: dia,
        left: x - (dia/2),
        top: y - (dia/2),
      },
      appendTo : $ripple,
      one : {
        animationend : function(){
          $ripple.remove();
        }
      }
    });
  });

});
	</script>
	<style>
	/* MAD-RIPPLE EFFECT */
.ripple{
  position: absolute;
  top:0; left:0; bottom:0; right:0;
  overflow: hidden;
  -webkit-transform: translateZ(0); /* to contain zoomed ripple */
  transform: translateZ(0);
  border-radius: inherit; /* inherit from parent (rounded buttons etc) */
  pointer-events: none; /* allow user interaction */
          animation: ripple-shadow 0.4s forwards;
  -webkit-animation: ripple-shadow 0.4s forwards;
}
.rippleWave{
  backface-visibility: hidden;
  position: absolute;
  border-radius: 50%;
  transform: scale(0.7); -webkit-transform: scale(0.7);
  background: rgba(255,255,255, 1);
  opacity: 0.45;
          animation: ripple 2s forwards;
  -webkit-animation: ripple 2s forwards;
}
@keyframes ripple-shadow {
  0%   {box-shadow: 0 0 0 rgba(0,0,0,0.0);}
  20%  {box-shadow: 0 4px 16px rgba(0,0,0,0.3);}
  100% {box-shadow: 0 0 0 rgba(0,0,0,0.0);}
}
@-webkit-keyframes ripple-shadow {
  0%   {box-shadow: 0 0 0 rgba(0,0,0,0.0);}
  20%  {box-shadow: 0 4px 16px rgba(0,0,0,0.3);}
  100% {box-shadow: 0 0 0 rgba(0,0,0,0.0);}
}
@keyframes ripple {
  to {transform: scale(24); opacity:0;}
}
@-webkit-keyframes ripple {
  to {-webkit-transform: scale(24); opacity:0;}
}

/* MAD-COLORS */
.bg-primary-darker{background:#1976D2; color:#fff;}
.bg-primary{ background:#2196F3; color:#fff; }
.bg-primary.lighter{ background: #BBDEFB; color: rgba(0,0,0,0.82);}
.bg-accented{ background:#FF4081; color:#fff; }
	</style>
			
				<br/>


			<h4  style="padding-left:28px;margin:58px 0 36px;line-height:1;background:url('http://cyranoch.cafe24.com/css/bg_tit1.gif') no-repeat 0 4px;font-size:28px;font-weight:bold;letter-spacing:-2px;color:#333;">인증절차</h4>
			<ul class="list_ty3 st2">
				<li>영양균형, 결식아동급식 등의 기준을 바탕으로 착한가게 선정</li>
			</ul>

			<h4  style="padding-left:28px;margin:58px 0 36px;line-height:1;background:url('http://cyranoch.cafe24.com/css/bg_tit1.gif') no-repeat 0 4px;font-size:28px;font-weight:bold;letter-spacing:-2px;color:#333;">인증혜택</h4>
			<ul class="list_ty3 st2">
				<li>기홍보에 활용할 수 있도록 인증마크 부여</li>
				<li>빅데이터 기반의 상권분석 및 컨설팅 제공</li>
			</ul>



        </div>
        <!-- //contents -->
        
	
		
 
        <!-- //contents -->

    </div>
    <!-- //container -->

    <!-- footer -->
        


















    <div id="footer">
        <!-- allmenu -->
         
        <!-- allmenu -->
        <div class="footer_menu">
            <ul>          
                <li><a href="#">이용약관</a></li>
                <li><a href="#"><strong>개인정보처리방침</strong></a></li>
                <li><a href="http://cyranoch.cafe24.com/info06.php">상담센터</a></li>
                <li class="last"><a href="http://cyranoch.cafe24.com/info07.php">문의하기</a></li>                
            </ul>
        </div>
        <div class="footer_in">
			<p class="center_call">
				성북아동청소년센터<strong>02-2241-2451</strong>
			</p>
            <div class="footer_info">
                <address>서울특별시 동대문구 경희대로26 네오르네상스관 B111</address>
                <p>Copyright(c) 2017 bigleader. All Rights Reserved.</p>
            </div>
            
        </div>
    </div>
    

    <!-- //footer -->
</div>
<!-- //wrap -->
</div>

</body>
</html>
