<?php

include_once('../common.php');
define('_INDEX_', true);

if(!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once('../head.php');
?>





<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://ggnamu.com/css/com.css">

<p id="demo"></p>

<script>
var x = document.getElementById("demo");

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(redirectToPosition);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function redirectToPosition(position) {
    window.location='index.php?lat='+position.coords.latitude+'&long='+position.coords.longitude;
}
</script>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
<?php
$lat=(isset($_GET['lat']))?$_GET['lat']:'';
$long=(isset($_GET['long']))?$_GET['long']:'';


$xml = simplexml_load_file("https://maps.google.com/maps/api/geocode/xml?latlng=".$lat.",".$long."&language=ko&sensor=false&key=AIzaSyAI3MsIElGhtIJfuhCHHL1YgBraFVqPnAc");
$add = $xml->result->address_component[2]->long_name;
$data='.sb';
if ($add == '강남구') $data='.gn';
if ($add == '강동구') $data='.gd';
if ($add == '강북구') $data='.gb';
if ($add == '강서구') $data='.gs';
if ($add == '관악구') $data='.ga';
if ($add == '광진구') $data='.gj';
if ($add == '구로구') $data='.gr';
if ($add == '금천구') $data='.gc';
if ($add == '노원구') $data='.nw';
if ($add == '도봉구') $data='.db';
if ($add == '동대문구') $data='.dd';
if ($add == '동작구') $data='.dj';
if ($add == '마포구') $data='.mp';
if ($add == '서대문구') $data='.sm';
if ($add == '서초구') $data='.sc';
if ($add == '성동구') $data='.sd';
if ($add == '성북구') $data='.sb';
if ($add == '송파구') $data='.sp';
if ($add == '양천구') $data='.yc';
if ($add == '영등포구') $data='.yd';
if ($add == '용산구') $data='.ys';
if ($add == '은평구') $data='.ep';
if ($add == '종로구') $data='.jn';
if ($add == '중구') $data='.jg';
if ($add == '중랑구') $data='.jr';
?>

	
	<div class="dropdown" style="margin : 10px 0 0 10px;">
  <button class="btn btn-primary dropdown-toggle selected" type="button" data-toggle="dropdown"><? if ($add=='') {echo '자치구';} else {echo $add;}?>
  <span class="caret"></span></button>
	 <ul class="dropdown-menu">
	 <li>
      <ul class="col-xs-6">
    <li class="control" data-filter=".gn"><a href="#">강남구</a></li>
    <li class="control" data-filter=".gd"><a href="#">강동구</a></li>
    <li class="control" data-filter=".gb"><a href="#">강북구</a></li>
	<li class="control" data-filter=".gs"><a href="#">강서구</a></li>
    <li class="control" data-filter=".ga"><a href="#">관악구</a></li>
    <li class="control" data-filter=".gj"><a href="#">광진구</a></li>
	<li class="control" data-filter=".gr"><a href="#">구로구</a></li>
    <li class="control" data-filter=".gc"><a href="#">금천구</a></li>
    <li class="control" data-filter=".nw"><a href="#">노원구</a></li>
	<li class="control" data-filter=".db"><a href="#">도봉구</a></li>
    <li class="control" data-filter=".dd"><a href="#">동대문구</a></li>
    <li class="control" data-filter=".dj"><a href="#">동작구</a></li>
	
		</ul>
		<ul class="col-xs-6">
	    <li class="control" data-filter=".mp"><a href="#">마포구</a></li>
	<li class="control" data-filter=".sm"><a href="#">서대문구</a></li>
        <li class="control" data-filter=".sd"><a href="#">성동구</a></li>
    <li class="control" data-filter=".sb"><a href="#">성북구</a></li>
    <li class="control" data-filter=".sp"><a href="#">송파구</a></li>
	    <li class="control" data-filter=".yc"><a href="#">양천구</a></li>
    <li class="control" data-filter=".yd"><a href="#">영등포구</a></li>
    <li class="control" data-filter=".ys"><a href="#">용산구</a></li>
	    <li class="control" data-filter=".ep"><a href="#">은평구</a></li>
    <li class="control" data-filter=".jn"><a href="#">종로구</a></li>
    <li class="control" data-filter=".jg"><a href="#">중구</a></li>
	    <li class="control" data-filter=".jr"><a href="#">중랑구</a></li>
	 </ul>
    </li>
  </ul>
<button style="background-color:#FFF; width:160px; height:34px; border:1px solid #AAA; border-radius:3px;"onclick="getLocation()"><img style="width:22px; height:22px; "src="https://i.imgur.com/x6w7aiA.png"><span style="margin-left:5px; font-weight:bold;font-size:12px; color:#000;">현재위치로 자동검색</span></button>
	</div>

	<script>
	$('.dropdown-menu a').click(function(){
    $('.selected').text($(this).text());
  });
	</script>
<style>
.control{height:25px; margin-top:10px;}
</style>

        <div class="container2" style="margin-bottom:65px;">
		<?=latest("basic4", "week", 320, 30);?>
		
        </div>

        <script src="https://demos.kunkalabs.com/mixitup/mixitup.min.js"></script>

        <script>
            var containerEl = document.querySelector('.container2');			
			var mixer = mixitup(containerEl);
			mixer.filter('<?= $data ?>');
		</script>


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
</div>
</div>



</body>
</html>
