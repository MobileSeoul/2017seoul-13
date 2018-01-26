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

<p style="margin-top:10px; font-family:맑은고딕; line-height:15px; font-weight:bold;padding-bottom:10px;font-size:15px; margin-bottom:10px;"><?php echo cut_str(get_text($view['wr_subject']), 70); // 글제목 출력?>
</p>
<div id="map2"><a href="#"><p style="margin-bottom:10px;border-bottom:1px solid #EFEFEF; padding-bottom:10px;margin-top:10px;  font-family:맑은고딕; line-height:15px; font-size:15px; ">
<? echo $view['wr_2']?>
</p></a>
</div>

<style>
#map {
    display: none;
}
</style>
<script>
$(document).ready(
    function() {
        $("#map2").click(function() {
            $("#map").toggle();
        });
    });
</script>
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
<script src="http://maps.google.com/maps?file=api&amp;v=1&hl=ko&amp;sensor=true&amp;key=AIzaSyAI3MsIElGhtIJfuhCHHL1YgBraFVqPnAc" type="text/javascript"></script> 

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

  showAddress("<?=$view['wr_subject']?>"); //실제 주소를 날리고 좌표를 콜백받아 처리할 함수
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
<style>
.blind{display:none;}
</style>
	<link href="https://elfsight.com/wp-content/themes/elfsight/instalink/instalink/instalink-2.0.7.min.css" rel="stylesheet">
	<script src="https://elfsight.com/wp-content/themes/elfsight/instalink/instalink/vendor/jquery.min.js"></script>
	<div data-il
		 data-il-username=""
		 data-il-hashtag="<?=$view['wr_subject']?>" 
		 data-il-lang="ko"
		 data-il-show-heading="false" 
		 data-il-scroll="false"
		 data-il-width="100%" 
		 data-il-height="230px" 
		 data-il-image-size="medium" 
		 data-il-bg-color="#FFF" 
		 data-il-content-bg-color="#FFF" 
		 data-il-font-color="#FFFFFF"
		 data-il-ban=""
		 data-il-cache-media-time="">
	</div>
<div>
<style>
.editor{border:1px solid #ECEEF0; width:100%; height:80px; }
</style>
<div class="editor">
<p style="text-align:center;">
<p style="margin-bottom:10px; margin-top:5px; text-align:center;">
<?
if ($view['wr_good']=='0') echo "<img style=\"width:100px;\"src=\"http://i.imgur.com/olCDXnw.png\">" ;
			if ($view['wr_good']=='1') echo "<img style=\"width:100px;\"src=\"http://i.imgur.com/U1Hp4bo.png\">" ;
			if ($view['wr_good']=='2') echo "<img style=\"width:100px;\"src=\"http://i.imgur.com/INPjeTs.png\">" ;
			if ($view['wr_good']=='3') echo "<img style=\"width:100px;\"src=\"http://i.imgur.com/LKrx4Vc.png\">" ;
			if ($view['wr_good']>='4') echo "<img style=\"width:100px;\"src=\"http://i.imgur.com/Pz8NvXL.png\">" ;
?>
<a href="<?php echo $good_href.'&amp;'.$qstr ?>"
<button type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-star"></span> 추천 </button>
</a>

</p>
<div class="quo" style="padding : 0 20px 0 20px;">
<img src="http://i.imgur.com/Ni9w3hK.png" style="width:12px;float:left;">
<img src="http://i.imgur.com/poXTghK.png" style="width:12px;float:right;">
<center><p style="font-size:15px; font-weight:bold;"><?=$view['wr_content'] ?></p>


</center>

</div>
<p style="border-bottom:1px solid #EFEFEF; padding-bottom:10px;margin-top:30px;  font-family:맑은고딕; line-height:15px; font-size:15px; ">코멘트</p>
	<?php include_once('./view_comment.php'); ?>