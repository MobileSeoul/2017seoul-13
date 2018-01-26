<?php

/*
===========================================================

	프로젝트 이름 : 피리 맵 페이지 PLUS G5

	만든사람 : 피리 PIREE

	홈페이지 : http://www.piree.co.kr

	작성날짜 : 2016년 01월 12일 화요일 오전 02시 19분 - 날씨 한파가 왔다

	저 작 권 : Copyright ⓒ 2014-2015 투스포츠 (원병철) All right reserved
						 그누보드 외에 추가된 소스는~
						 만든사람의 허락없이 무단으로 사용할수 없습니다.
						 사용하고자 할 경우 만든사람의 허락을 받아야 합니다.
						 http://www.piree.co.kr 에 문의해 주세요.

===========================================================
 PLUS - 피리 맵 페이지 PLUS G5 > 내용 보기
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



	#########################################################
	# 시작 => 피리_맵_페이지__글_보기_VIEW_파일__첨부
	#########################################################

	//=======================================================
	// 피리_맵_페이지__설정_정보_파일__경로
	include_once( get__sam_file(PIREE_PLUS_PIREE_MAP_PAGE_N, 'view_head.inc.php', 'path') );

	#########################################################
	# 끝 => 피리_맵_페이지__글_보기_VIEW_파일__첨부
	#########################################################



	#########################################################
	# 시작 => 보여주기
	#########################################################

	//=======================================================
	// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
	add_stylesheet('<link rel="stylesheet" href="'.$board_skin_url.'/style.css">', 0);

	#########################################################
	# 끝 => 보여주기
	#########################################################


?>

<script src="<?php echo G5_JS_URL; ?>/viewimageresize.js"></script>

<div id="bo_v_table"><?php echo $board['bo_subject']; ?></div>

<article id="bo_v" style="width:<?php echo $width; ?>">
		<header>
				<h1 id="bo_v_title">
						<?php
						if ($category_name) echo ($category_name ? $view['ca_name'].' | ' : ''); // 분류 출력 끝
						echo cut_str(get_text($view['wr_subject']), 70); // 글제목 출력
						?>
				</h1>
		</header>

		<section id="bo_v_info">
				<h2>페이지 정보</h2>
				작성자 <strong><?php echo $view['name'] ?><?php if ($is_ip_view) { echo "&nbsp;($ip)"; } ?></strong>
				<span class="sound_only">작성일</span><strong><?php echo date("y-m-d H:i", strtotime($view['wr_datetime'])) ?></strong>
				조회<strong><?php echo number_format($view['wr_hit']) ?>회</strong>
				댓글<strong><?php echo number_format($view['wr_comment']) ?>건</strong>
		</section>

    <section class="bo_v_info_add">
        <h2>위치 정보</h2>
        <span class="font_aaa">주소</span> <strong><?php echo $view['wr_1'] ?></strong>
        <span class="font_aaa">좌표 경도</span> <strong><?php echo $wr_lng ?></strong>
        <span class="font_aaa">위도</span> <strong><?php echo $wr_lat ?></strong>
        <strong><?php echo $coord_regist_s ?></strong>
    </section>

		<?php
		if ($view['file']['count']) {
				$cnt = 0;
				for ($i=0; $i<count($view['file']); $i++) {
						if (isset($view['file'][$i]['source']) && $view['file'][$i]['source'] && !$view['file'][$i]['view'])
								$cnt++;
				}
		}
		 ?>

		<?php if($cnt) { ?>
		<section id="bo_v_file">
				<h2>첨부파일</h2>
				<ul>
				<?php
				// 가변 파일
				for ($i=0; $i<count($view['file']); $i++) {
						if (isset($view['file'][$i]['source']) && $view['file'][$i]['source'] && !$view['file'][$i]['view']) {
				 ?>
						<li>
								<a href="<?php echo $view['file'][$i]['href'];	?>" class="view_file_download">
										<img src="<?php echo $board_skin_url ?>/img/icon_file.gif" alt="첨부">
										<strong><?php echo $view['file'][$i]['source'] ?></strong>
										<?php echo $view['file'][$i]['content'] ?> (<?php echo $view['file'][$i]['size'] ?>)
								</a>
								<span class="bo_v_file_cnt"><?php echo $view['file'][$i]['download'] ?>회 다운로드</span>
								<span>DATE : <?php echo $view['file'][$i]['datetime'] ?></span>
						</li>
				<?php
						}
				}
				 ?>
				</ul>
		</section>
		<?php } ?>

		<?php
		if (implode('', $view['link'])) {
		 ?>
		<section id="bo_v_link">
				<h2>관련링크</h2>
				<ul>
				<?php
				// 링크
				$cnt = 0;
				for ($i=1; $i<=count($view['link']); $i++) {
						if ($view['link'][$i]) {
								$cnt++;
								$link = cut_str($view['link'][$i], 70);
				 ?>
						<li>
								<a href="<?php echo $view['link_href'][$i] ?>" target="_blank">
										<img src="<?php echo $board_skin_url ?>/img/icon_link.gif" alt="관련링크">
										<strong><?php echo $link ?></strong>
								</a>
								<span class="bo_v_link_cnt"><?php echo $view['link_hit'][$i] ?>회 연결</span>
						</li>
				<?php
						}
				}
				 ?>
				</ul>
		</section>
		<?php } ?>

		<div id="bo_v_top">
				<?php
				ob_start();
				 ?>
				<?php if ($prev_href || $next_href) { ?>
				<ul class="bo_v_nb">
						<?php if ($prev_href) { ?><li><a href="<?php echo $prev_href ?>" class="btn_b01">이전글</a></li><?php } ?>
						<?php if ($next_href) { ?><li><a href="<?php echo $next_href ?>" class="btn_b01">다음글</a></li><?php } ?>
				</ul>
				<?php } ?>

				<ul class="bo_v_com">
						<?php if ($update_href) { ?><li><a href="<?php echo $update_href ?>" class="btn_b01">수정</a></li><?php } ?>
						<?php if ($delete_href) { ?><li><a href="<?php echo $delete_href ?>" class="btn_b01" onclick="del(this.href); return false;">삭제</a></li><?php } ?>
						<?php if ($copy_href) { ?><li><a href="<?php echo $copy_href ?>" class="btn_admin" onclick="board_move(this.href); return false;">복사</a></li><?php } ?>
						<?php if ($move_href) { ?><li><a href="<?php echo $move_href ?>" class="btn_admin" onclick="board_move(this.href); return false;">이동</a></li><?php } ?>
						<?php if ($search_href) { ?><li><a href="<?php echo $search_href ?>" class="btn_b01">검색</a></li><?php } ?>
						<li><a href="<?php echo $list_href ?>" class="btn_b01">목록</a></li>
						<?php if ($reply_href) { ?><li><a href="<?php echo $reply_href ?>" class="btn_b01">답변</a></li><?php } ?>
						<?php if ($write_href) { ?><li><a href="<?php echo $write_href ?>" class="btn_b02">글쓰기</a></li><?php } ?>
            <li><a href="<?php echo get_map_article($bo_table, $wr_id); ?>" class="btn_admin" target="_blank">지도보기</a></li>
				</ul>
				<?php
				$link_buttons = ob_get_contents();
				ob_end_flush();
				 ?>
		</div>

		<section id="bo_v_atc">
				<h2 id="bo_v_atc_title">본문</h2>

				<?php
				// 파일 출력
				$v_img_count = count($view['file']);
				if($v_img_count) {
						echo "<div id=\"bo_v_img\">\n";

						for ($i=0; $i<=count($view['file']); $i++) {
								if ($view['file'][$i]['view']) {
										//echo $view['file'][$i]['view'];
										echo get_view_thumbnail($view['file'][$i]['view']);
								}
						}

						echo "</div>\n";
				}
				 ?>

				<div id="bo_v_con"><?php echo get_view_thumbnail($view['content']); ?></div>
				<?php//echo $view['rich_content']; // {이미지:0} 과 같은 코드를 사용할 경우 ?>

				<?php if ($is_signature) { ?><p><?php echo $signature ?></p><?php } ?>

				<?php if ($scrap_href || $good_href || $nogood_href) { ?>
				<div id="bo_v_act">
						<?php if ($scrap_href) { ?><a href="<?php echo $scrap_href; ?>" target="_blank" class="btn_b01" onclick="win_scrap(this.href); return false;">스크랩</a><?php } ?>
						<?php if ($good_href) { ?>
						<span class="bo_v_act_gng">
								<a href="<?php echo $good_href.'&amp;'.$qstr ?>" id="good_button" class="btn_b01">추천 <strong><?php echo number_format($view['wr_good']) ?></strong></a>
								<b id="bo_v_act_good">이 글을 추천하셨습니다</b>
						</span>
						<?php } ?>
						<?php if ($nogood_href) { ?>
						<span class="bo_v_act_gng">
								<a href="<?php echo $nogood_href.'&amp;'.$qstr ?>" id="nogood_button" class="btn_b01">비추천	<strong><?php echo number_format($view['wr_nogood']) ?></strong></a>
								<b id="bo_v_act_nogood"></b>
						</span>
						<?php } ?>
				</div>
				<?php } else {
						if($board['bo_use_good'] || $board['bo_use_nogood']) {
				?>
				<div id="bo_v_act">
						<?php if($board['bo_use_good']) { ?><span>추천 <strong><?php echo number_format($view['wr_good']) ?></strong></span><?php } ?>
						<?php if($board['bo_use_nogood']) { ?><span>비추천 <strong><?php echo number_format($view['wr_nogood']) ?></strong></span><?php } ?>
				</div>
				<?php
						}
				}
				?>



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



				<?php
				include(G5_SNS_PATH."/view.sns.skin.php");
				?>
		</section>

		<?php
		// 코멘트 입출력
		include_once ('./view_comment.php');
		 ?>

		<div id="bo_v_bot">
				<!-- 링크 버튼 -->
				<?php echo $link_buttons ?>
		</div>

</article>

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

<!-- 게시글 보기 끝 -->

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