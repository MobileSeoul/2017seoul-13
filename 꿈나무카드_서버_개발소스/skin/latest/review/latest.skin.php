<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');
// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);

$board['bo_gallery_width'] = 70;
$board['bo_gallery_height'] = 70;
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

			echo"<div data-ripple class=\"funding\" style=\"background-color:#fff; border:2px solid #EEE; width:calc(100%-20px); margin:10px;\">";
			echo"<div class=\"top\" style=\"width:100%;\">";
$thumb2 = get_list_thumbnail($board['bo_table'], $list[$i]['wr_id'], 500, 200); 
$img_content2 = '<img src="'.$thumb2['src'].'" alt="'.$thumb2['alt'].'" width="100%">';	
			echo"".$img_content2."";
			echo"<div class=\"bottom\" style=\"padding:10px;\">";
			echo "<p style=\"font-family:맑온고딕; font-size:15px; line-height:20px;font-weight:bold;\">".$list[$i]['subject']."</p>";
echo "<p style=\"font-family:맑온고딕; font-size:15px; line-height:20px;\">".$list[$i]['wr_2']."</p>";
echo "<div class=\"day\" style=\"height:15px; width:100%;\">";
echo "<p style=\"font-family:맑온고딕; font-size:15px; font-weight:bold; line-height:20px; float:left;\">".$list[$i]['wr_content']."</p></div>";
echo "</div>";

echo "<div class=\"bottom\" style=\"width:100%; height:30px; background-color:#fff;\"><center><p style=\"font-size:15px; font-weight:bold;width:100px;\">";
echo "MORE INFO</p></center></div>";
echo"</div></div>";
echo "<a>";

?>   
    <?php }  ?>
<!-- } <?php echo $bo_subject; ?> 최신글 끝 -->