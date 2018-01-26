<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');
// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);

$board['bo_gallery_width'] = 118;
$board['bo_gallery_height'] = 118;
?>
<!-- <?php echo $bo_subject; ?> 웹진형 최신글 시작 { -->
    <?php for ($i=0; $i<count($list); $i++) {  
	
	// 세션
	$ss_list = 'ss_view_'.$bo_table.'_'.$list[$i]['wr_id']; 
	if (!get_session($ss_list)) { 
	set_session($ss_list, TRUE); 
	} 
	?>
        <?php
			echo "<a href=\"".$list[$i]['href']."\">";

			echo "<div  data-ripple class=\"cell bg-primary-darker\" style=\"background-color:#F0F2F9; list-style:none; margin:10px;\">";
    
			$content = cut_str(preg_replace("@<.*?>@","", $list[$i]['wr_content']),140); // 내용 자르기
	
			$thumb = get_list_thumbnail($board['bo_table'], $list[$i]['wr_id'], 240, 240); 
			if($thumb['src']) {
				$img_content = '<img src="'.$thumb['src'].'" alt="'.$thumb['alt'].'" width="'.$board['bo_gallery_width'].'" height="'.$board['bo_gallery_height'].'">';
			} else {
				$img_content = '<img src="http://i.imgur.com/s5oV1bl.png">';
			}

			echo "<div style=\"border-radius:5px; background-color:#fff;   height:120px; border:1px solid #ECEEF0; \">";
			echo "<div class=\"left\" style=\"float:left; width:120px;\">";
			echo "".$img_content."";
			echo "</div>";
			echo "<div class=\"right\" style=\"float:left; width:100%-120px; margin-left:10px;\">";
			echo "<p style=\"text-align:center;font-size:14px; font-weight:bold; padding:5px;margin-top:10px;color:#D21279;line-height:18px; color:#FFF; background-color:#DA1328; width:85px;font-family:맑은고딕;\">착한가게</p>";
			echo "<p style=\"width:500px; font-size:15px;font-weight:bold; word-break:normal; line-height:20px; padding-top:5px;padding-bottom:3px;font-family:맑은고딕; \">".$list[$i]['subject']."</p>";
			echo "<p style=\"width:500px; font-size:15px;word-break:normal; line-height:20px; padding-top:0px;padding-bottom:3px;font-family:맑은고딕; \">".$list[$i]['wr_3']."</p>";
			echo "<p style=\"width:500px; font-size:15px;word-break:normal; line-height:20px; padding-top:0px;padding-bottom:3px;font-family:맑은고딕; \">".$list[$i]['wr_content']."</p>";
			
			
			echo "<a href=\"".$list[$i]['href']."\">";
			echo "</a>";
			echo "</div>";		
		    echo "</div>";

			
             
        echo "</div>";
		echo "</a>";
			?>   
    <?php }  ?>
<!-- } <?php echo $bo_subject; ?> 최신글 끝 -->

