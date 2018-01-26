<?php
include_once('./_common.php');

define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if(defined('G5_THEME_PATH')) {
    require_once(G5_THEME_PATH.'/index.php');
    return;
}

if (G5_IS_MOBILE) {
    include_once(G5_MOBILE_PATH.'/index.php');
    return;
}

include_once(G5_PATH.'/head.php');
?>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.min.js"></script>
<style>
.tabs{
	width:100%;
	height:28px;
	overflow:hidden;
}
.tabs a{

font-size: 1.125em;
font-weight: bold;
text-align: center;
float: left;
width: 64px;
height: 38px;
line-height: 38px;
color: #000;
font-family:맑은고딕;
}
.tabs a.active {
border-top: 2px solid #2a70be;
margin-top: -2px;
background-size: 64px 39px;
background-position: left top;
color: #c14545;
}
.news-list{
	padding:0 10px;
}
.news-list li{
overflow: hidden;
border-bottom: 1px solid #eceef0;
font-weight: normal;
height: 100px;
}
.right .title{font-size:15px; line-height:20px; font-family:맑은고딕; font-weight:bold;}
.right .con1{font-size:15px; line-height:20px; font-family:맑은고딕;}
.right .con2{font-size:15px; line-height:20px; font-family:맑은고딕;}
</style>




<div class="tabs"> <a href="#" class="active">전체</a>  <a href="#" >일반식당</a> <a href="#" >도시락</a> <a href="#">베이커리</a>  <a href="#">편의점</a> </div>
  <div id="tabs-container" class="swiper-container">
    <div class="swiper-wrapper">
      <div class="swiper-slide">
        <div class="content-slide">
    
	<?=latest("basic", "03", 20, 30);?> 

        </div>
      </div>
      <div class="swiper-slide">
        <div class="content-slide">
		
         <?=latest("basic", "01", 20, 30);?> 
		
        </div>
      </div>
	        <div class="swiper-slide">
        <div class="content-slide">
	  <?=latest("basic", "02", 20, 30);?> 


        </div>
      </div>
	       <div class="swiper-slide">
        <div class="content-slide">
       
<?=latest("basic", "03", 20, 30);?> 

        </div>
      </div>
      <div class="swiper-slide">
        <div class="content-slide"> 
       
	   <?=latest("basic", "04", 20, 30);?> 

        </div>
      </div>
    </div>
  </div>

<script type="text/javascript">
window.onload = function() {
    var tabsSwiper = new Swiper('#tabs-container',{
    speed:500,
    onSlideChangeStart: function(){
      $(".tabs .active").removeClass('active')
      $(".tabs a").eq(tabsSwiper.activeIndex).addClass('active')  
    }
  })
  $(".tabs a").on('touchstart mousedown',function(e){
    e.preventDefault()
    $(".tabs .active").removeClass('active')
    $(this).addClass('active')
    tabsSwiper.slideTo( $(this).index() )
  })
  $(".tabs a").click(function(e){
    e.preventDefault()
  })
  
}
</script>


<?php
include_once(G5_PATH.'/tail.php');
?>
