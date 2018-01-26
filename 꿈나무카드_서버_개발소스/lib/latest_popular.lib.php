<?php
if (!defined('_GNUBOARD_')) exit;

// 인기글 추출
// $cache_time 캐시 갱신시간
function latest_popular($bo_table, $rows=10, $subject_len=40, $term='', $options='')
{
    global $g5;

	switch($term){
		case '일간': $term_time = date("Y-m-d H:i:s", G5_SERVER_TIME-3600*24); break;
		case '주간': $term_time = date("Y-m-d H:i:s", G5_SERVER_TIME-3600*24*7); break;
		case '월간': $term_time = date("Y-m-d H:i:s", G5_SERVER_TIME-3600*24*30); break;
	}

        $list = array();

     if($bo_table){	//각 게시판 출력
		$sql = " select * from {$g5['board_table']} where bo_table = '{$bo_table}' ";
        $board = sql_fetch($sql);
        $bo_subject = get_text($board['bo_subject']);

        $tmp_write_table = $g5['write_prefix'] . $bo_table; // 게시판 테이블 전체이름
		$sql_between = " wr_datetime between '$term_time' and '".G5_TIME_YMDHIS."' ";
        $sql = " select * from {$tmp_write_table} where wr_is_comment = 0 and {$sql_between} order by {$options} limit 0, {$rows} ";
        $result = sql_query($sql);
        for ($i=0; $row = sql_fetch_array($result); $i++) {
            $list[$i] = get_list($row, $board, $latest_skin_url, $subject_len);
        }
    }else{	//전체 게시판 출력

       $sql_between = " a.bn_datetime between '$term_time' and '".G5_TIME_YMDHIS."' ";
       $sql_common = " from {$g5['board_new_table']} a, {$g5['board_table']} b where a.bo_table = b.bo_table and b.bo_use_search = 1 and a.wr_id = a.wr_parent and {$sql_between} ";
       $sql_order = " order by a.bn_datetime desc ";

       $sql = " select a.*, count(b.bo_subject) as cnt {$sql_common} {$sql_order} limit 0, {$rows} ";
       $row = sql_fetch($sql);
	   

       if($row[cnt] > 0){
		$sql = " select a.*, b.bo_subject {$sql_common} {$sql_order} limit 0, {$rows} ";
	       $result = sql_query($sql);
	
	       for ($i=0; $row = sql_fetch_array($result); $i++){
			$tmp_write_table = $g5['write_prefix'].$row['bo_table'];
			$bo_table = $row['bo_table'];
	
			 if($i > 0)
			 $sql2 .= " union ";
			 $sql2 .= "(select '{$bo_table}' as bo_table, wr_id, wr_subject, wr_hit, wr_good from {$tmp_write_table} where wr_datetime between '{$term_time}' and '".G5_TIME_YMDHIS."') ";
	       }
			$sql2 .= " order by ".$options." limit 0, 10";
			$result2 = sql_query($sql2);
	
			 for ($i=0; $row2 = sql_fetch_array($result2); $i++){
		    $list[$i]['href'] = G5_BBS_URL.'/board.php?bo_table='.$row2['bo_table'].'&amp;wr_id='.$row2['wr_id'];
		    $list[$i]['subject'] = $row2['wr_subject'];
		 }
	   }

    }

    ob_start();
?>

<style type=text/css>
.lt_full {position:relative;float:left;padding-bottom:10px;width:100%;height:135px;}
.lt2 {position:relative;float:left;padding-bottom:10px;width:50%;}
.lt2 ul {margin:0 0 0 0;padding:0;list-style:none}
.lt2 li {padding:0}
</style>

<div class="lt_full">
<div class="lt2">
    <ul>
    <?php for ($i=0; $i<count($list); $i++) {  ?>
        <li>
            <?php
            echo "<a href=\"".$list[$i]['href']."\">";
				echo "<img src='".G5_URL."/img/num_".($i+1).".gif'> ";
                echo "<strong>".$list[$i]['subject']."</strong>";

            if ($list[$i]['comment_cnt'])
                echo $list[$i]['comment_cnt'];

            echo "</a>";
             ?>
        </li>
    <?php
		if (($i+1)%($rows/2)==0) echo "</ul></div><div class='lt2'><ul>";
		}
	?>
    <?php if (count($list) == 0) { //게시물이 없을 때  ?>
    <li>게시물이 없습니다.</li>
    <?php }  ?>
    </ul>
</div>
</div>

<?
	$content = ob_get_contents();
    ob_end_clean();

    return $content;
}
?>


<style>
.tab_list ul{position:relative;margin:0;padding:0;border-bottom:1px solid #ccc;font-family:Tahoma, Sans-serif;font-size:12px;list-style:none;*zoom:1}
.tab_list ul:after{display:block;clear:both;content:""}
.tab_list li{float:left;margin-bottom:-1px}
.tab_list li a{float:left;position:relative;border:1px solid #eee;border-bottom-color:#ccc;background:#fafafa;color:#666;text-decoration:none}
.tab_list li a span{display:inline-block;padding:6px 25px 6px 25px;letter-spacing:-1px;cursor:pointer}
.tab_list li ul{display:none;position:absolute;top:40px;left:0;width:100%;margin:0;padding:0;border:0;list-style:none;*zoom:1}
.tab_list li li{float:none;position:relative;margin:0 0 8px 8px;color:#999}
.tab_list li li a{float:none;margin:0;padding:0;border:0 !important;background:transparent;font-weight:normal;color:#333 !important;letter-spacing:normal;}
.tab_list.m1 .m1 a,
.tab_list.m2 .m2 a,
.tab_list.m3 .m3 a,
.tab_list.m4 .m4 a,
.tab_list.m5 .m5 a {margin-top:-1px;border:1px solid #ccc;border-bottom:1px solid #fff;background:transparent;color:#333}
.tab_list.m1 .m1 a span,
.tab_list.m2 .m2 a span,
.tab_list.m3 .m3 a span,
.tab_list.m4 .m4 a span,
.tab_list.m5 .m5 a span{padding-top:7px;font-weight:bold}
.tab_list.m1 .m1 ul,
.tab_list.m2 .m2 ul,
.tab_list.m3 .m3 ul,
.tab_list.m4 .m4 ul,
.tab_list.m5 .m5 ul{margin-top:-20px;display:block}
</style>

<div style="height:110px" class="tab_list m1">
<ul>


<li class="m1">
<a href="#" jquery16408452460570924265=1><span>일간 조회수</span></a> 
<ul>
  <li><?php echo latest_popular($bo_table, 10, 10, '일간', 'wr_hit desc'); ?></li>
</ul>
</li>

<li class="m3">
<a href="#" jquery16408452460570924265=3><span>주간 조회수</span></a> 
<ul>
  <li><?php echo latest_popular($bo_table, 10, 10, '주간', 'wr_hit desc'); ?></li>
</ul>
</li>


</ul>
</div>

<script type="text/javascript">
jQuery(function($){
	var tab = $('.tab_list');
	tab.removeClass('js_off');
	tab.css('height', tab.find('>ul>li>ul:visible').height()+0);
	function onSelectTab(){
		var t = $(this);
		var myClass = t.parent('li').attr('class');
		t.parents('.tab_list:first').attr('class', 'tab_list '+myClass);
		tab.css('height', t.next('ul').height()+0);
	}
	tab.find('>ul>li>a').click(onSelectTab).focus(onSelectTab);
});
</script>