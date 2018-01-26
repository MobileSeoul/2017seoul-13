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


<div style="margin:0px 0px 0 0;height:40px;border-bottom:1px solid #DCDCDC;background-color:#FFF;">

<li style="list-style:none; width:25%; float:left;">
<a href="http://cyranoch.cafe24.com/index.php">
<div style="height:40px; margin: 0 0 0px 10px;  ">
			<div style="padding:10px;">
		<center><p style="font-size:15px; font-family:맑은고딕; color:#000;">가맹점</p></center>
		   </div>
			</div>
</a>
</li>



<li style="list-style:none; width:25%; float:left;">
<a href="http://cyranoch.cafe24.com/mypage.php">
<div style="height:40px; margin: 0 0 0px 10px;  ">
			<div style="padding:10px;">
		<center><p style="font-size:15px; font-family:맑은고딕;  font-weight:bold;  color:#DC1400;">프로그램</p></center>
		   </div>
			</div>
</a>
</li>

<li style="list-style:none; width:25%; float:left;">
<a href="http://cyranoch.cafe24.com/bbs/board.php?bo_table=community">
<div style="height:40px; margin: 0 0 0px 10px;  ">
			<div style="padding:10px;">
		<center><p style="font-size:15px; font-family:맑은고딕; color:#000;">커뮤니티</p></center>
		   </div>
			</div>
</a>
</li>

<li style="list-style:none; width:25%; float:left;">
<a href="http://cyranoch.cafe24.com/info.php">
<div style="height:40px; margin: 0 0 0px 10px;  ">
			<div style="padding:10px;">
		<center><p style="font-size:15px; font-family:맑은고딕; color:#000;">영양정보</p></center>
		   </div>
			</div>
</a>
</li>
</div>

<?=latest("gal", "guide", 20, 30);?> 


<?php
include_once(G5_PATH.'/tail.php');
?>
