<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');
// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);

$board['bo_gallery_width'] = 70;
$board['bo_gallery_height'] = 70;
?>
<div style="margin-right:10px;">
<!-- <?php echo $bo_subject; ?> 웹진형 최신글 시작 { -->
    <?php for ($i=0; $i<count($list); $i++) {  ?>
	
        <li style="  list-style:none; width:50%; float:left; margin-top:10px; ">
            <?php
			$content = cut_str(preg_replace("@<.*?>@","", $list[$i]['wr_content']),140); // 내용 자르기
	
			$thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $board['bo_gallery_width'], $board['bo_gallery_height']);
			if($thumb['src']) {
				$img_content = '<img src="'.$thumb['src'].'" alt="'.$thumb['alt'].'" width="'.$board['bo_gallery_width'].'" height="'.$board['bo_gallery_height'].'">';
			} else {
				$img_content = '<img src="http://i.imgur.com/s5oV1bl.png">';
			}


			echo "<a href=\"".$list[$i]['href']."\">";
			echo "<div style=\"height:165px; margin: 0 0 0px 10px; border:1px solid #ECEEF0;\">";
			echo "<img style=\"width:100%; height:100px;\" src=".$list[$i]['file'][0][path]."/".$list[$i]['file'][0][file].">"; 
			echo "<div style=\"padding:10px;\"";
			echo "<p class=\"title2\">".$list[$i]['subject']."</p>";
		    echo "</div>";
			echo "</div>";
			echo "</a>";
			
             ?>   
        </li>
    <?php }  ?>
<!-- } <?php echo $bo_subject; ?> 최신글 끝 -->
</div>
<style>
.title2{font-family:맑은 고딕; font-size:15px;}
</style>
