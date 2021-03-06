<?php

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

            <center><img class="image01" style="height:200px; width:100%" data-frame="<?=$image[$i]?>" src="<?=$image[$i]?>"  ?></center>

        <?php } ?>
</div>



<!-- 게시물 읽기 시작 -->

<?php if ($update_href) { ?><a href="<?php echo $update_href ?>" class="btn_b01">수정</a><?php } ?>
<?php if ($copy_href) { ?><li><a href="<?php echo $copy_href ?>" class="btn_admin" onclick="board_move(this.href); return false;">복사</a></li><?php } ?>

<div class="con" style="margin: 0 20px 0 20px;">
<p style="margin-top:20px; font-family:맑은고딕; line-height:15px; font-weight:bold; font-size:15px; margin-bottom:10px;"><?php echo cut_str(get_text($view['wr_subject']), 70); // 글제목 출력?>
</p>
<div style="max-width:500px;">
<?php echo get_view_thumbnail($view['content']); ?>
</div>
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