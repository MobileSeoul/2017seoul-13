<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');
// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);

$board['bo_gallery_width'] = 70;
$board['bo_gallery_height'] = 70;
?>
<style>
/* http://meyerweb.com/eric/tools/css/reset/ 
   v2.0 | 20110126
   License: none (public domain)
*/

html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
b, u, i, center,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td,
article, aside, canvas, details, embed, 
figure, figcaption, footer, header, hgroup, 
menu, nav, output, ruby, section, summary,
time, mark, audio, video {
	margin: 0;
	padding: 0;
	border: 0;
	font-size: 100%;
	font: inherit;
	vertical-align: baseline;
}
/* HTML5 display-role reset for older browsers */
article, aside, details, figcaption, figure, 
footer, header, hgroup, menu, nav, section {
	display: block;
}
body {
	line-height: 1;
}
ol, ul {
	list-style: none;
}
blockquote, q {
	quotes: none;
}
blockquote:before, blockquote:after,
q:before, q:after {
	content: '';
	content: none;
}
table {
	border-collapse: collapse;
	border-spacing: 0;
}
</style>
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

			echo "<div data-ripple class=\" mix green cell bg-primary-darker\"  style=\"background-color:#fff;  list-style:none; margin:10px 10px 10px 0;\">";
    
			$content = cut_str(preg_replace("@<.*?>@","", $list[$i]['wr_content']),140); // 내용 자르기
	
			$thumb = get_list_thumbnail($board['bo_table'], $list[$i]['wr_id'], 140, 140); 
			if($thumb['src']) {
				$img_content = '<img src="'.$thumb['src'].'" alt="'.$thumb['alt'].'" width="'.$board['bo_gallery_width'].'" height="'.$board['bo_gallery_height'].'">';
			} else {
				$img_content = '<img src="http://i.imgur.com/s5oV1bl.png">';
			}

			echo "<div style=\"height:90px; border:1px solid #ECEEF0; padding-top:10px; padding-left:10px;\">";
			echo "<div class=\"left\" style=\"float:left; width:80px;\">";
			echo "".$img_content."";
			echo "</div>";
			echo "<div class=\"right\" style=\"float:left; width:100%-90px; margin-left:0px;\">";
			echo "<p style=\"font-size:16px; line-height:20px; font-family:맑은고딕; font-weight:bold;\">".$list[$i]['subject']."</p>";
			echo "<p style=\"font-size:14px; padding-top:6px;line-height:16px; font-family:맑은고딕;\">".$list[$i]['wr_2']."</p>";
			
			if ($list[$i]['wr_good']=='0') echo "<img style=\"width:100px;\"src=\"http://i.imgur.com/olCDXnw.png\">" ;
			if ($list[$i]['wr_good']=='1') echo "<img style=\"width:100px;\"src=\"http://i.imgur.com/U1Hp4bo.png\">" ;
			if ($list[$i]['wr_good']=='2') echo "<img style=\"width:100px;\"src=\"http://i.imgur.com/INPjeTs.png\">" ;
			if ($list[$i]['wr_good']=='3') echo "<img style=\"width:100px;\"src=\"http://i.imgur.com/LKrx4Vc.png\">" ;
			if ($list[$i]['wr_good']>='4') echo "<img style=\"width:100px;\"src=\"http://i.imgur.com/Pz8NvXL.png\">" ;
		

			echo "<a href=\"http://bigberd.com/bbs/good.php?bo_table=".$bo_table."&amp;wr_id=".$list[$i]['wr_id']."&amp;good=good&amp;\">";
			echo "<img src=\"http://i.imgur.com/39ur9KW.png\" style=\"padding-top:2px;width:20px;\">";
			$Co = sql_fetch("select * from $tmp_write_table where wr_num = {$list[$i][wr_num]} and wr_is_comment = 1 and wr_comment = {$list[$i][wr_comment]}");
$Co_datetime = substr($Co[wr_datetime],0,-9);
$Co_datetime = substr($Co_datetime,0,4).substr($Co_datetime,5,2).substr($Co_datetime,8,2);
$To_datetime = date("Ymd");
if($To_datetime - $Co_datetime > 100000){
    echo "<img style=\"margin-top:2px;margin-left:4px;width:20px;\" src='http://i.imgur.com/Ew1Saea.png' >";
}else
    echo " <img style=\"margin-top:2px;margin-left:4px;width:20px;\" src='http://i.imgur.com/IAbM30j.png' >";
			echo "</div>";		
		    echo "</div>";

			
             
        echo "</div>";
		
echo "</a>";
		
			?>   
    <?php }  ?>
<!-- } <?php echo $bo_subject; ?> 최신글 끝 -->
