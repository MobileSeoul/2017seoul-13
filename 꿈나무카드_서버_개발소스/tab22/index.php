<?php

include_once('../common.php');
define('_INDEX_', true);

if(!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once('../head.php');
?>





<script>
$(document).ready(function() {
    $(".contentPost").delay(1000).fadeIn(250);
});
</script>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
<iframe style="height:500px; width:100%" src="https://ggnamu.com/piree/p770033/map_ka.php?bo_table=map"></iframe>

	<script>
	$('.dropdown-menu a').click(function(){
    $('.selected').text($(this).text());
  });
	</script>
<style>
.control{height:25px; margin-top:10px;}
</style>

        

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