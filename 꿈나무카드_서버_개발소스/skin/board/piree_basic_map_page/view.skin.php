
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=0,maximum-scale=10,user-scalable=yes">




<script>
$(document).ready(function() {
    $(".contentPost").delay(500).fadeIn(250);
});
</script>

<style>
.contentPost { display:none;}
</style>

<div class="contentPost" style="margin-bottom:65px;">

<?php
if($bo_table == "write" && $wr_id) { // free보드의 글내용에서
 $sw = "copy"; // 글이동이면 move, 글복사이면 copy
 $bo_list = "01"; // free_best로 이동 
 $ca_name = ""; // 이동 또는 복사시 등록될 분류명 - 미입력시 원글 분류 등록
 if($sw == "copy" && $write['wr_8'] == "1") {
  ; //글복사이고 이미 복사된 글이면 통과 - 여분필드 8번을 복사글 체크용으로 사용
 } else {
  // 조회수가 1000 이상이면
  $is_automove = ($write['wr_good'] >= 5) ? true : false; // 테스트를 위하여 조회수를 하양조정 함.
  if($is_automove) {
   include_once('./move_auto.php');
   if($sw == 'copy') { //복사글 기록 - 여분필드 8번
    sql_query(" update $write_table set wr_8 = '1' where wr_id = '$wr_id' ");
   }
  }
 }
}
/*
===========================================================

	프로젝트 이름 : 피리 웹프로그램 - 피리 맵 페이지 PLUS G5

	만든사람 : 피리 PIREE

	홈페이지 : http://www.piree.co.kr

	작성날짜 : 2016년 01월 24일 일요일 오전 06시 23분 - 날씨 추워, 추워!! 너무 추워!!

	저 작 권 : Copyright ⓒ 2014-2016 투스포츠 (원병철) All right reserved
						 그누보드 외에 추가된 소스는~
						 만든사람의 허락없이 무단으로 사용할수 없습니다.
						 사용하고자 할 경우 만든사람의 허락을 받아야 합니다.
						 http://www.piree.co.kr 에 문의해 주세요.

===========================================================
 피리 맵 페이지 PLUS G5 > 내용 보기
===========================================================


*/
	#########################################################
	# 시작 => 접근__유효__확인
	#########################################################

	//=======================================================
	// 개별_페이지__접근_불가
	IF (!defined('_GNUBOARD_'))									 EXIT;

	#########################################################
	# 끝 => 접근__유효__확인
	#########################################################



	#########################################################
	# 시작 => 필요한_파일__첨부
	#########################################################

	//=======================================================
	// THUMBNAIL_파일__첨부하기
	include_once(G5_LIB_PATH.'/thumbnail.lib.php');

	#########################################################
	# 끝 => 필요한_파일__첨부
	#########################################################



?>
<script src="<?php echo G5_JS_URL; ?>/viewimageresize.js"></script>
<style>
.image01 {

    max-width: 500px;
    }
</style>

<div style="width:100%;">
			<?php for ($i=0; $i<count($view['file'])-1; $i++) { 

            $image[$i] = G5_URL."/data/file/$bo_table/".$view[file][$i][file]; ?>

            <center><img class="image01" style="width:100%" data-frame="<?=$image[$i]?>" src="<?=$image[$i]?>"  ?></center>

        <?php } ?>


</div>



<!-- 게시물 읽기 시작 -->


<div class="con" style="margin: 0 10px 0 10px;">

<p style="margin-top:10px; font-family:맑은고딕; line-height:15px; font-weight:bold;padding-bottom:10px;font-size:18px; color:#D21279;margin-bottom:10px;"><?php echo cut_str(get_text($view['wr_subject']), 70); // 글제목 출력?>
</p>
<p style="margin-bottom:10px; padding-bottom:10px;margin-top:10px;  font-family:맑은고딕; line-height:15px; font-size:15px; ">
<?echo $view['wr_1'];?>
</p>
<p style="margin-bottom:10px;border-bottom:1px solid #EFEFEF; padding-bottom:10px;margin-top:10px;  font-family:맑은고딕; line-height:15px; font-size:15px; ">
<span style="font-weight:bold;"><?echo $view['wr_6'];?></span><?echo $view['wr_2'];?>
</p>


<?php

/*

	* PIREE_SOSS
	* 2016년 11월 02일 수요일 오전 08시 30분 - 날씨 맑음
	* PIREE 피리
	* 게시글에 투표 - 투표 입력창 삽입

*/

	//=======================================================
	// 시작 => 게시글에_투표__사용하면
	IF ($board['bo_arti_vote_multi_use_n'] == 1)
	{

			//===================================================
			// 시작 => 투표_번호__있으면
			IF ($view['wr_pi_atvt_n'] > 0)
			{

					//===============================================
					// 게시글에_투표__번호
					$wr_pi_atvt_n = $view['wr_pi_atvt_n'];


					//===============================================
					// 상위_첨부_위치__INCLUDE
					$top_position_c = "include";


					//===============================================
					// 전달된__보는_페이지
					// do_form - 투표하기
					$v_page = "do_form";


					//===============================================
					// 게시글에_투표__파일
					include_once( get__sam_file(PIREE_PLUS_PIREE_ARTICLE_VOTE_N, 'vote_view.php', 'path') );

			}
			// 끝 => 투표_번호__있으면
			//===================================================

	}
	// 끝 => 게시글에_투표__사용하면
	//=======================================================

?>




    <!-- 링크 버튼 시작 { -->
    <div id="bo_v_bot">
        <?php echo $link_buttons ?>
    </div>
    <!-- } 링크 버튼 끝 -->

</article>
<!-- } 게시판 읽기 끝 -->

<script>
<?php if ($board['bo_download_point'] < 0) { ?>
$(function() {
    $("a.view_file_download").click(function() {
        if(!g5_is_member) {
            alert("다운로드 권한이 없습니다.\n회원이시라면 로그인 후 이용해 보십시오.");
            return false;
        }

        var msg = "파일을 다운로드 하시면 포인트가 차감(<?php echo number_format($board['bo_download_point']) ?>점)됩니다.\n\n포인트는 게시물당 한번만 차감되며 다음에 다시 다운로드 하셔도 중복하여 차감하지 않습니다.\n\n그래도 다운로드 하시겠습니까?";

        if(confirm(msg)) {
            var href = $(this).attr("href")+"&js=on";
            $(this).attr("href", href);

            return true;
        } else {
            return false;
        }
    });
});
<?php } ?>

function board_move(href)
{
    window.open(href, "boardmove", "left=50, top=50, width=500, height=550, scrollbars=1");
}
</script>

<script>
$(function() {
    $("a.view_image").click(function() {
        window.open(this.href, "large_image", "location=yes,links=no,toolbar=no,top=10,left=10,width=10,height=10,resizable=yes,scrollbars=no,status=no");
        return false;
    });

    // 추천, 비추천
    $("#good_button, #nogood_button").click(function() {
        var $tx;
        if(this.id == "good_button")
            $tx = $("#bo_v_act_good");
        else
            $tx = $("#bo_v_act_nogood");

        excute_good(this.href, $(this), $tx);
        return false;
    });

    // 이미지 리사이즈
    $("#bo_v_atc").viewimageresize();
});

function excute_good(href, $el, $tx)
{
    $.post(
        href,
        { js: "on" },
        function(data) {
            if(data.error) {
                alert(data.error);
                return false;
            }

            if(data.count) {
                $el.find("strong").text(number_format(String(data.count)));
                if($tx.attr("id").search("nogood") > -1) {
                    $tx.text("이 글을 비추천하셨습니다.");
                    $tx.fadeIn(200).delay(2500).fadeOut(200);
                } else {
                    $tx.text("이 글을 추천하셨습니다.");
                    $tx.fadeIn(200).delay(2500).fadeOut(200);
                }
            }
        }, "json"
    );
}
</script>
<!-- } 게시글 읽기 끝 -->
<!--
<style>
.editor{border:1px solid #ECEEF0; width:100%; height:210px; }
</style>
<div class="editor">
<p style="text-align:center;"><img src="http://i.imgur.com/VJbCDuv.png" style="border-radius:25px; margin-top:10px; width:50px; "></p>
<p style="margin-top:5px; text-align:center;font-weight:bold; font-family:맑은고딕;font-size:14px;color:#000;">천승재</p>
<p style="margin-bottom:10px; margin-top:5px; text-align:center;"><img style="width:80px; "src="http://i.imgur.com/INPjeTs.png"></p>
<div class="quo" style="padding : 0 20px 0 20px;">
<img src="http://i.imgur.com/Ni9w3hK.png" style="width:12px;float:left;">
<img src="http://i.imgur.com/poXTghK.png" style="width:12px;float:right;">
</div>
<p style="padding: 0 32px 0 32px;  margin-top:22px; font-family:맑은고딕;font-size:12px;color:#666; ">동네 빵집의 신선한 변화, 항상 같은 빵들과 같은 맛, 같은 모양의 빵들에 질릴 때 행복을 주는 개성을 가지고 있는 빵들, 타르트 맛집! 타르트뿐만아니라 빵도 맛있다. 타르트가격도 저렴하고 필링은 꽉 차있고 타르트지도 부드러움</p>
</div>
-->			
<div id="map">
<script src="https://maps.google.com/maps?file=api&amp;v=1&hl=ko&amp;sensor=true&amp;key=AIzaSyAI3MsIElGhtIJfuhCHHL1YgBraFVqPnAc" type="text/javascript"></script> 

<script type="text/javascript">
var map = null;
var geocoder = null;

function initialize()
{ 
 if (GBrowserIsCompatible())
 {
  
  map = new GMap2(document.getElementById("map_canvas")); //지도를 표시할 영역지정하여 map인스턴스 생성
  map.setUIToDefault();
  geocoder = new GClientGeocoder();

  showAddress("<?=$view['wr_1']?>"); //실제 주소를 날리고 좌표를 콜백받아 처리할 함수
 }
}

function showAddress(address) {
 if (geocoder) {
   geocoder.getLatLng(
   address,
   function(point) {
   if (!point) {
     alert(address + " not found");
   } else {
     map.setCenter(point, 16);
     var marker = new GMarker(point);


     map.addOverlay(marker); //지도좌표에 표시할 마크
     marker(); //이미지 함수변경함 첫번째 이미지가 구글 지도에 들어가게 설정함 wr_2는 간단설명 호줄받게함
   }
   }
   );
 }
}
</script>
<body onload="initialize()" onunload="GUnload()" style="margin:0px;">

<div id="map_canvas" style="margin:0 auto;height:200px;"></div>
</div>
<!--<script src="http://api.map.baidu.com/api?v=2.0&ak=[key]" type="text/javascript"></script>
<script type="text/javascript">  
function initialize() {  
  var mp = new BMap.Map('map2');  
  mp.centerAndZoom(new BMap.Point("<?echo $lng; ?>", "<?echo $lat; ?>"), 11);  
}  
   
function loadScript() {  
  var script = document.createElement("script");  
  script.src = "http://api.map.baidu.com/api?v=2.0&ak=[key]&callback=initialize";//此为v2.0版本的引用方式  
  document.body.appendChild(script);  
}  
   
window.onload = loadScript;  
</script>  
</head>  
<body>  
  <div id="map2" style="width:500px;height:320px"></div>  
<script type="text/javascript">  
function initialize() {  
  var map = new BMap.Map('map3');  
  var point = new BMap.Point("<?echo $lng; ?>", "<?echo $lat; ?>");
  var marker = new BMap.Marker(point);  // 创建标注
	map.addOverlay(marker);              // 将标注添加到地图中
	map.centerAndZoom(point, 15);
}  
   
function loadScript() {  
  var script = document.createElement("script");  
  script.src = "http://api.map.baidu.com/api?v=1.4&ak=Y9I4XuUZqlzcrLcNboi0j6XGC66LNHiz&callback=initialize";
  document.body.appendChild(script);  
}  
   
window.onload = loadScript;  
</script>  
  <div id="map3" style="width:100%;height:200px"></div>  
-->


<p style="border-bottom:1px solid #EFEFEF; padding-bottom:10px;margin-top:10px;  font-family:맑은고딕; line-height:15px; font-size:15px; ">인스타그램</p>
<style>
.blind{display:none;}
/* 
	InstaLink
	Version: 2.0.7
	Release date: Tue Jul 26 2016
	
	elfsight.com
	
	Copyright (c) 2016 Elfsight, LLC. ALL RIGHTS RESERVED
 */

.instalink{display:block;position:relative;box-sizing:border-box;overflow:hidden;min-height:200px;min-width:100px;margin:0;padding:0;border-radius:3px;-webkit-transform:translateZ(0);transform:translateZ(0);background:#f8f8f8;font:400 11px/1.2 Arial,sans-serif;-webkit-font-smoothing:antialiased;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;direction:ltr !important;}.instalink a{border:0 !important;outline:0 !important;text-decoration:none}.instalink img,.instalink a img{margin:0;padding:0;border:0;outline:0}.instalink *{margin:0;padding:0}.instalink-cap{position:absolute;visibility:hidden;top:0;right:0;bottom:0;left:0;opacity:0;-webkit-transform:translateY(40px);-ms-transform:translateY(40px);transform:translateY(40px);-webkit-transition:all .2s ease;transition:all .2s ease;}.instalink-cap::before{display:block;position:absolute;width:256px;height:52px;top:50%;left:50%;margin:-26px 0 0 -123px;background:url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAQAAAAAvCAYAAAAM/xQxAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNiAoV2luZG93cykiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6ODJDNUI5QkQ5NEVGMTFFNTk4NzlFQkMzQUMzREMzREQiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6ODJDNUI5QkU5NEVGMTFFNTk4NzlFQkMzQUMzREMzREQiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDo4MkM1QjlCQjk0RUYxMUU1OTg3OUVCQzNBQzNEQzNERCIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDo4MkM1QjlCQzk0RUYxMUU1OTg3OUVCQzNBQzNEQzNERCIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PkdcXnkAAA2hSURBVHja7F0LmFVV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") no-repeat;-webkit-backface-visibility:hidden;-webkit-animation:_il-cap-blinking 2s infinite;animation:_il-cap-blinking 2s infinite;content:'';}@media (-webkit-min-device-pixel-ratio:1.5),(min-device-pixel-ratio:1.5){.instalink-cap::before{background:url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAgAAAABdCAYAAADT9976AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNiAoV2luZG93cykiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6OENFQ0U5ODg5NEZGMTFFNTk5QUZCMDE1NkZFNkQ3QkEiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6OENFQ0U5ODk5NEZGMTFFNTk5QUZCMDE1NkZFNkQ3QkEiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDo4Q0VDRTk4Njk0RkYxMUU1OTlBRkIwMTU2RkU2RDdCQSIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDo4Q0VDRTk4Nzk0RkYxMUU1OTlBRkIwMTU2RkU2RDdCQSIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/Phd4s8gAACAXSURBVHja7F0HvFTF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") no-repeat;background-size:246px 52px}}.instalink-loading .instalink-cap,.instalink-error .instalink-cap{visibility:visible;opacity:1;-webkit-transform:translateY(0);-ms-transform:translateY(0);transform:translateY(0)}.instalink-error .instalink-cap::before{-webkit-animation:none;animation:none}.instalink-alert{position:absolute;visibility:hidden;width:100%;margin:20px 0;opacity:0;text-align:center;font-size:14px;color:#ff4253;-webkit-transition:all .2s ease;transition:all .2s ease}.instalink-error .instalink-alert{visibility:visible;opacity:1}.instalink-content{position:relative;visibility:hidden;height:100%;opacity:0;-webkit-transition:all .3s ease;transition:all .3s ease}.instalink-ready > .instalink-content{visibility:visible;opacity:1;-webkit-transition-delay:.1s;transition-delay:.1s}.instalink-header{display:block;position:relative;border-bottom:none !important;box-shadow:inset 0 0 100px rgba(255,255,255,0),0 1px 0 0 rgba(0,0,0,0.05);background:#285989;text-decoration:none;-webkit-transition:all .3s ease;transition:all .3s ease;}.instalink-header::before,.instalink-header::after{display:table;clear:both;width:100%;height:0;content:''}a.instalink-header:hover{box-shadow:inset 0 0 100px rgba(255,255,255,0.2),0 1px 0 0 rgba(0,0,0,0.05)}.instalink-header-pic{display:block;float:left;width:34px;height:34px;}.instalink-rtl .instalink-header-pic{float:right}.instalink-header-name{display:block;float:left;overflow:hidden;width:70%;margin-left:14px;white-space:nowrap;text-transform:uppercase;text-overflow:ellipsis;line-height:34px;font-weight:bold;font-size:14px;color:#fff;}.instalink-header-name a{color:#fff}.instalink-rtl .instalink-header-name{float:right;margin-left:0;margin-right:14px}.instalink-tiny .instalink-header-name{width:40%}.instalink-header-logo{display:block;position:absolute;top:8px;right:12px;width:18px;height:18px;background:url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABIAAAASCAYAAABWzo5XAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNiAoV2luZG93cykiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6MEQxREZCNUJBREVCMTFFNEE3MDZCMTAwNzYzMzc1MTAiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6MEQxREZCNUNBREVCMTFFNEE3MDZCMTAwNzYzMzc1MTAiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDowRDFERkI1OUFERUIxMUU0QTcwNkIxMDA3NjMzNzUxMCIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDowRDFERkI1QUFERUIxMUU0QTcwNkIxMDA3NjMzNzUxMCIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/Pn+2QqgAAAECSURBVHjarJSxDoJAEEQPYoelkRY7SxP/QQtDY+ys/QO/SCsTEysLO1s6Szst5WppPed0NCtcxCCbvLAsuwM3d0EZY2JwMdXDzsaeTZRSofovUr+CyAp0yIS1sFHh7Udwzhd9VVOUfZEGO+ZD0AZT8bz7zr7sxgYEQJGANWdIoTVImKc5ESmWsifhzCOkR3OwZ26XkzmWmoml7jnjNPvGq/eDv7dvu3bgdQACx3BA02VvwewINIH+wWzN3shldsT7sahZYxdgKUw27FFlQi8x7dhlLUQ+hLyH2jM6uaPfBCPQE55swVX0ROCUP9l9h7kJeUWLFGZq/Y3MbPKPiNW4CzAAYxCy4ocYffcAAAAASUVORK5CYII=") no-repeat;}@media (-webkit-min-device-pixel-ratio:1.5),(min-device-pixel-ratio:1.5){.instalink-header-logo{background:url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACQAAAAkCAYAAADhAJiYAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAIGNIUk0AAHolAACAhgAA/KgAAIN/AABrRQAA/OcAADfrAAAQTQvWbXkAAAJISURBVHja5JixaxRBFMZ/e3okMY0EG+u7CFflJIUcgmAhWN0Vgo1cmX9DgmUa/wKxOAQPksImWAuHFopic8VFSJ1YpPGi2chn8w4249ztzsRsDnwwxbx5+83H7HvfvF0kIakuaVvSWOXb2PauSyKRVAfeAze4XPsOtBJJ28Aj5sN2EkljYGlOCB0nklTCRs+BV8DvjG8B2AQeZgPLIPQLWHbITOwO8CHrqJRwOj+nkJmQpWxCQfZfEro6Y+3KZRBaBh5PIfPEdZ6nylKgB7wBRuZbBTpAF6g68T+A08x80Ur/rEXePx8l1ewe9I2axQRbzAl9Au4B45y4a8A7YD0EPJRQCjSAbwXja8DQ8/qCqmwDuG9j31nrBZDBYnuObz+Dv1Ekh5qWBxVJqbPWnpE300bbwUgNG9vrjM0q+xWPhowiqnHk0aWVGGFMLlCbkhhCR45uANyK2HzVmZ8adjCh1Coka+0IQh1nPjTsqLvsrTPvWikTUPbdHMwgQi+BrE5Vgb6JHgWEse9okAwzmtDQQLO2bgpcyzkZn0r3PWlQWIcm46akA0/ciaQXpjMNGx3znXjiDwwri/2XDhUhhKS75/yIHBsGeYSK9kMD4AFwGFFlh/bs4F93jANgDXjtJPrUbLDYtaJkiuaQbzQkbUn66tx3qfm2LCYPp1mkH7oNfAk4uSpwPaPuacCzTeBzXgO+ENHKxuSWdy8foU3gGXB8wc3/EvDU1zHO1c+GCrA7R9+Ju3P3w6oC7AEtYKeEvPG+Jtu7Bez9GQCkioxtSnXQwwAAAABJRU5ErkJggg==") no-repeat;background-size:18px 18px}}.instalink-rtl .instalink-header-logo{right:auto;left:12px}.instalink-panel{padding:10px 0;box-shadow:0 1px 0 0 rgba(0,0,0,0.05);}.instalink-panel::before,.instalink-panel::after{display:table;clear:both;width:100%;height:0;content:''}.instalink-tiny .instalink-panel{text-align:center}.instalink-panel-counter{display:block;float:left;width:54px;text-align:center;}.instalink-rtl .instalink-panel-counter{float:right}.instalink-tiny .instalink-panel-counter{display:none}.instalink-medium .instalink-panel-counter{width:65px}.instalink-large .instalink-panel-counter{width:75px}.instalink-panel-counter-value{display:block;font-style:normal;font-weight:700;font-size:13px}.instalink-panel-counter-label{display:block;overflow:hidden;width:54px;margin-top:2px;text-overflow:ellipsis;white-space:nowrap;color:#727272;}.instalink-medium .instalink-panel-counter-label{width:65px}.instalink-large .instalink-panel-counter-label{width:75px}.instalink-small .instalink-panel-following{display:none}.instalink-panel-subscribe{display:inline-block;float:right;margin-right:11px;padding:8px 12px;border-radius:3px;box-shadow:inset 0 0 100px rgba(255,255,255,0);background:#285989;text-decoration:none;color:#fff;-webkit-transition:all .3s ease;transition:all .3s ease;}.instalink-rtl .instalink-panel-subscribe{float:left;margin-right:0;margin-left:11px}.instalink-tiny .instalink-panel-subscribe{float:none;margin-right:0}.instalink-panel-subscribe:hover{box-shadow:inset 0 0 100px rgba(255,255,255,0.2)}.instalink-scrollbar{position:absolute;visibility:hidden;top:0;right:0;bottom:0;opacity:0;-webkit-transition:all .3s ease;transition:all .3s ease;}.instalink-rtl .instalink-scrollbar{right:auto;left:0}.instalink-scrollbar.visible,.instalink:active .instalink-scrollbar,.instalink:hover .instalink-scrollbar{visibility:visible;opacity:1}.instalink-scrollbar-slider{width:2px;border-radius:10px;background:#858585;-webkit-transform-origin:50% 0;-ms-transform-origin:50% 0;transform-origin:50% 0}.instalink-feed::before,.instalink-feed::after{display:table;clear:both;width:100%;height:0;content:''}.instalink-feed-loader{position:relative;visibility:hidden;opacity:0;-webkit-transition:all .3s ease;transition:all .3s ease;}.instalink-has-pages .instalink-feed-loader{visibility:visible;opacity:1;height:40px;margin:15px 0;}.instalink-has-pages .instalink-feed-loader::before{height:40px}.instalink-feed-loader::before{display:block;height:0;width:40px;margin:0 auto;border:1px solid #afafaf;border-radius:50% 50%;-webkit-animation:_instalink-feed-loader 1.5s infinite;animation:_instalink-feed-loader 1.5s infinite;content:''}.instalink-feed-inner{position:relative}.instalink-feed-container{position:absolute;overflow:hidden;top:0;right:-17px;bottom:0;left:0;-webkit-overflow-scrolling:touch;}.instalink-rtl .instalink-feed-container{right:0;left:-17px}.instalink-scroll .instalink-feed-container{overflow:auto;overflow-y:auto;overflow-x:hidden}.instalink-feed-wrapper{position:absolute;overflow:hidden;left:0;bottom:0;right:0;background:#f8f8f8;}.instalink-user .instalink-feed-wrapper{top:86px}.instalink-tag .instalink-feed-wrapper{top:35px}.instalink-hide-heading .instalink-feed-wrapper{top:0}.instalink-feed-post{display:block;position:relative;float:left;-webkit-transform:translate3d(0,0,0);transform:translate3d(0,0,0);}.instalink-rtl .instalink-feed-post{float:right}.instalink-feed-post::before{position:absolute;display:block;top:50%;left:50%;height:40px;width:40px;margin:-20px 0 0 -20px;border:1px solid #afafaf;border-radius:50% 50%;-webkit-animation:_instalink-feed-loader 1.5s infinite;animation:_instalink-feed-loader 1.5s infinite;content:'';}.instalink-feed-post-loaded.instalink-feed-post::before{display:none}.instalink-feed-post span{display:block;position:absolute;overflow:hidden;visibility:hidden;top:50%;left:50%;opacity:0;-webkit-transform:scale(.6);-ms-transform:scale(.6);transform:scale(.6);-webkit-backface-visibility:hidden;backface-visibility:hidden;-webkit-transition:all .4s ease;transition:all .4s ease}.instalink-feed-post-video span::after{display:block;position:absolute;width:0;height:0;border-style:solid;border-color:transparent transparent transparent rgba(255,255,255,0.7);content:'';}.instalink-image-size-xlarge .instalink-feed-post-video span::after{top:2%;right:2%;border-width:15px 0 15px 26px}.instalink-image-size-large .instalink-feed-post-video span::after{top:5%;right:5%;border-width:12.5px 0 12.5px 21.7px}.instalink-image-size-medium .instalink-feed-post-video span::after{top:6%;right:6%;border-width:10px 0 10px 17.3px}.instalink-image-size-small .instalink-feed-post-video span::after{top:7%;right:7%;border-width:7.5px 0 7.5px 13px}.instalink-feed-post img{display:block;position:relative;max-width:none !important;max-height:none !important;-webkit-transition:all .4s ease,top 0s,left 0s;transition:all .4s ease,top 0s,left 0s;}.instalink-feed-post-portrait.instalink-feed-post img{top:50%;width:100% !important;-webkit-transform:translateY(-50%) translateZ(0);transform:translateY(-50%) translateZ(0)}.instalink-feed-post-landscape.instalink-feed-post img{left:50%;height:100% !important;-webkit-transform:translateX(-50%) translateZ(0);transform:translateX(-50%) translateZ(0)}.instalink-feed-post-square.instalink-feed-post img{width:100% !important;height:100% !important}.instalink-feed-post:hover span img{opacity:.85}.instalink-feed-post-loaded span{visibility:visible;opacity:1;-webkit-transform:scale(1);-ms-transform:scale(1);transform:scale(1)}.instalink-loading .instalink-feed{display:none}@-webkit-keyframes _il-cap-blinking{0%{opacity:1}50%{opacity:.3}100%{opacity:1}}@keyframes _il-cap-blinking{0%{opacity:1}50%{opacity:.3}100%{opacity:1}}@-webkit-keyframes _instalink-feed-loader{0%{-webkit-transform:scale(0,0);transform:scale(0,0);opacity:1}60%{-webkit-transform:scale(.9,.9);transform:scale(.9,.9);opacity:1}99%{-webkit-transform:scale(1.2,1.2);transform:scale(1.2,1.2);opacity:0}100%{-webkit-transform:scale(0,0);transform:scale(0,0);opacity:1}}@keyframes _instalink-feed-loader{0%{-webkit-transform:scale(0,0);transform:scale(0,0);opacity:1}60%{-webkit-transform:scale(.9,.9);transform:scale(.9,.9);opacity:1}99%{-webkit-transform:scale(1.2,1.2);transform:scale(1.2,1.2);opacity:0}100%{-webkit-transform:scale(0,0);transform:scale(0,0);opacity:1}}
</style>
	<script src="https://ggnamu.com/tab11/jquery.min.js"></script>
	<div data-il
		 data-il-username=""
		 data-il-hashtag="<?=$view['wr_subject']?>" 
		 data-il-lang="ko"
		 data-il-show-heading="false" 
		 data-il-scroll="false"
		 data-il-width="100%" 
		 data-il-height="300px" 
		 data-il-image-size="medium" 
		 data-il-bg-color="#FFF" 
		 data-il-content-bg-color="#FFF" 
		 data-il-font-color="#FFFFFF"
		 data-il-ban=""
		 data-il-cache-media-time="">
	</div>