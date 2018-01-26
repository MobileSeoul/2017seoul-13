<?php

/*
===========================================================

	프로젝트 이름 : 피리 맵 페이지

	만든사람 : 피리 PIREE

	홈페이지 : http://www.piree.co.kr

	작성날짜 : 2015년 12월 17일 목요일 오후 15시 48분 - 날씨 춥다 추워

	저 작 권 : Copyright ⓒ 2014-2015 투스포츠 (원병철) All right reserved
							그누보드 외에 추가된 소스는~
							만든사람의 허락없이 무단으로 사용할수 없습니다.
							사용하고자 할 경우 만든사람의 허락을 받아야 합니다.
							http://www.piree.co.kr 에 문의해 주세요.

===========================================================
 피리 SAM > 관리자 > 피리 맵 페이지 > 설정 정보 수정 폼
===========================================================


*/


	#########################################################
	# 시작 => 최_우선__상수__변수
	#########################################################

	//=======================================================
	// 메뉴_번호__지정____피리_맵_페이지
	$sub_menu = 770033;

	#########################################################
	# 끝 => 최_우선__상수__변수
	#########################################################



	#########################################################
	# 시작 => 선_처리__메뉴_지정__관리자_확인
	#########################################################

	//=======================================================
	// 기본처리_파일__첨부
	include_once('./_common.php');


	//=======================================================
	// 시작 => 회원_여부__확인
	IF ( $is_guest || !$is_member)
	{
			alert ("회원만 이용하실 수 있습니다", G5_DOMAIN."/");
			EXIT;
	}
	// 끝 => 회원_여부__확인
	//=======================================================


	//=======================================================
	// 시작 => 운영자__아니면
	IF (!$is_admin)
	{
			alert ("권한이 없습니다", G5_DOMAIN."/");
			EXIT;
	}
	// 끝 => 운영자__아니면
	//=======================================================


	//=======================================================
	// 관리자_확인
	auth_check($auth[$sub_menu], "w");

	#########################################################
	# 끝 => 선_처리
	#########################################################



	#########################################################
	# 시작 => 설정__기본값__현재값
	#########################################################

	//=======================================================
	// 설정_정보_화일__첨부
	include_once( get__sam_file($sub_menu, 'config.default.php', 'path') );

	#########################################################
	# 끝 => 설정__기본값__현재값
	#########################################################s



	#########################################################
	# 시작 => 피리_맵_페이지__설정_정보_파일__첨부
	#########################################################

	//=======================================================
	// 기본_설정_첨부__여부
	// 0 - 안해
	// 1 - 하자
	$is_get__piree_config = 0;


	//=======================================================
	// 설정_정보__가져오기
	$is_get__p770033 = 1;


	//=======================================================
	// 설정_화면__여부
	$is_piree_program_config = 1;


	//=======================================================
	// 설정_정보_화일__첨부
	include_once( get__sam_file($sub_menu, 'config', 'path') );

	#########################################################
	# 끝 => 피리_맵_페이지__설정_정보_파일__첨부
	#########################################################



	#########################################################
	# 시작 => 각__프로그램__상수_변수__기본_값
	#########################################################

	//=======================================================
	// 시작 => 
	IF ( !$p770033__1 || !$p770033__2 )
	{

			//===================================================
			// 
			$p770033__1 = '';


			//===================================================
			// 
			$p770033__2 = 0;

	}
	// 끝 => 
	//=======================================================

	#########################################################
	# 끝 => 각__프로그램__상수_변수__기본_값
	#########################################################



	#########################################################
	# 시작 => 상수__변수
	#########################################################

	//=======================================================
	// 

	#########################################################
	# 끝 => 상수__변수
	#########################################################



	#########################################################
	# 시작 => 마무리__페이지_ECHO_관련
	#########################################################

	//=======================================================
	// 타이틀
	$g5['title'] = "피리 맵 페이지 G5";


	//=======================================================
	// HEAD_첨부
	include_once('../admin.head.php');

	#########################################################
	# 끝 => 마무리__페이지_ECHO_관련
	#########################################################


?>

<section>
		<!-- <h2>그누보드 카테고리 정보 수정하기</h2> -->

		<form name="form__config" id="form__config" action="./__config.update.php" method="post">


		<div class="btn_confirm">
			<input type="submit" class="btn_submit" value=" 설 정 정 보 를	저 장 합 니 다 ">
			<input type="button" class="btn_cancel" value=" 취소하기 " onClick="PageUrl('./index.php')">
		</div>


		<div class="tbl_frm01 tbl_wrap">
				<table>
				<tbody>

						<tr>
								<th scope="row"><span class="font_4444ff">사용할 지도 선택</span></th>
								<td class="line_h_2_2">
<?php

								//=========================================
								// 시작 => 반복문
								WHILE ( list($key, $val) = each($map_list_arr) )
								{
?>
										<input type="radio" name="use_map_c" id="use_map_c_<?php echo $key; ?>" value="<?php echo $key; ?>"<?php	IF ( $p770033__use_map_c == $key ) echo " checked"; ?>> 
										<label for="use_map_c_<?php echo $key; ?>"><?php echo $val; ?></label><br>
<?php
								}
								// 끝 => 반복문
								//=========================================

?>
										<?php echo_help("사용할 지도를 선택해 주세요."); ?><br />
										<?php echo_help("현재는 \"구글맵\"만 지원합니다."); ?><br />
										<?php echo_help("현재 준비중이며 차후 업데이트 버전에 적용할 예정입니다."); ?><br />
										<?php echo_help("기본값은 <strong> ". $map_list_arr[$DEVAR_use_map_c] ." </strong> 입니다."); ?>
								</td>
						</tr>

						<tr>
								<th scope="row"><label for="api_key_google_map">구글맵 API KEY<strong class="sound_only">선택입력</strong></label></th>
								<td class="line_h_2_2">
										<input type="text" name="api_key_google_map" id="api_key_google_map" value="<?php echo $p770033__api_key_google_map; ?>" class="frm_input" style="width:200px;"><br />
										<?php echo_help("구글맵 API 키가 있으면 입력해 주세요."); ?><br />
										<?php echo_help("<a href=\"https://developers.google.com/maps/documentation/directions/get-api-key?hl=ko\" target=\"_blank\">발급받으러 가기 [여기 클릭]</a>"); ?>
								</td>
						</tr>

						<tr>
								<th scope="row"><label for="api_key_daum_map">다음 지도 API KEY<strong class="sound_only">선택입력</strong></label></th>
								<td class="line_h_2_2">
										<input type="text" name="api_key_daum_map" id="api_key_daum_map" value="<?php echo $p770033__api_key_daum_map; ?>" class="frm_input" style="width:200px;"><br />
										<?php echo_help("다음 지도 API 키가 있으면 입력해 주세요."); ?><br />
										<?php echo_help("<a href=\"http://developers.daum.net/console\" target=\"_blank\">발급받으러 가기 [여기 클릭]</a>"); ?><br />
										<?php echo_help("다음 지도는 차후 제공 예정입니다."); ?>
								</td>
						</tr>

						<tr>
								<th scope="row"><label for="api_key_naver_map">네이버 지도 API KEY<strong class="sound_only">선택입력</strong></label></th>
								<td class="line_h_2_2">
										<input type="text" name="api_key_naver_map" id="api_key_naver_map" value="<?php echo $p770033__api_key_naver_map; ?>" class="frm_input" style="width:200px;"><br />
										<?php echo_help("네이버 지도 API 키가 있으면 입력해 주세요."); ?><br />
										<?php echo_help("<a href=\"https://developer.naver.com/openapi/register.nhn\" target=\"_blank\">발급받으러 가기 [여기 클릭]</a>"); ?><br />
										<?php echo_help("네이버 지도는 차후 제공 예정입니다."); ?>
								</td>
						</tr>

						<tr>
								<th scope="row"><label for="map_view_area">지도 적용 지역<strong class="sound_only">선택입력</strong></label></th>
								<td class="line_h_2_2">
										<input type="radio" name="map_view_area" id="map_view_area_0" value=""<?php	IF (!$p770033__map_view_area || $p770033__map_view_area != 'KR' ) echo " checked";	?>> 
										<label for="map_view_area_0">기본 지도</label><br />
										<input type="radio" name="map_view_area" id="map_view_area_ko" value="KR"<?php	IF ( $p770033__map_view_area == 'KR' ) echo " checked";	?>> 
										<label for="map_view_area_ko">대한민국</label><br />
										<?php echo_help("기본값은 <strong> ". $map_config_region_arr[$DEVAR_map_view_area] ." </strong> 입니다."); ?>
								</td>
						</tr>

						<tr>
								<th scope="row"><span class="font_4444ff">지도 크기 (해상도)</span></th>
								<td class="line_h_2_2">
										<label for="map_size_h">세로</label>
										<input type="text" name="map_size_h" id="map_size_h" value="<?php echo $p770033__map_size_h; ?>" class="frm_input" style="width:50px;"> Pixel
										<br />
										<?php echo_help("화면에 보여줄 지도의 크기(해상도)를 입력해 주세요."); ?><br />
										<?php echo_help("기본값은 <strong> ". $DEVAR_map_size_h ." </strong> 입니다."); ?>
								</td>
						</tr>

						<tr>
								<th scope="row">현재 위치 사용</th>
								<td class="line_h_2_2">
										<input type="checkbox" name="now_here_point" id="now_here_point" value="1"<?php	IF ( $p770033__now_here_point == 1) echo " checked";	?>> 
										<label for="now_here_point" class="str_bold">현재 위치를 사용합니다.<strong class="sound_only">선택입력</strong></label><br />
										<?php echo_help("기본값은 <strong> ". $DEVAR_now_here_point_s ."  </strong> 입니다."); ?>
								</td>
						</tr>

						<tr>
								<th scope="row">지도 처음 좌표</th>
								<td class="line_h_2_2">
										<label for="start">경도</label>
										<input type="text" name="map_start_point_lng" id="map_start_point_lng" value="<?php echo $p770033__map_start_point_lng; ?>" class="frm_input" style="width:200px;">
										<br />
										<label for="map_start_point">위도</label>
										<input type="text" name="map_start_point_lat" id="map_start_point_lat" value="<?php echo $p770033__map_start_point_lat; ?>" class="frm_input" style="width:200px;">
										<br />
										<?php echo_help("현재 위치를 사용하지 않는 경우 \"처음 보여줄 좌표\" 위치의 좌표를 입력해 주세요."); ?><br />
										<?php echo_help("기본값은 <strong> ". $DEVAR_map_start_point_lng ." × ". $DEVAR_map_start_point_lat ." </strong> 입니다."); ?>
								</td>
						</tr>

						<tr>
								<th scope="row">기본 줌</th>
								<td class="line_h_2_2">
<?php

								//=========================================
								// 시작 => 반복문
								FOR ( $i=1; $i<21; $i++ )
								{
										$class_cl_bo = $i == 1 || $i == 11 ? 'cl_bo ' : '';
?>
										<div class="<?php echo $class_cl_bo; ?>fl_left td_left_50">
												<input type="radio" name="basic_zoom" id="basic_zoom_<?php echo $i; ?>" value="<?php echo $i; ?>"<?php	IF ( $p770033__basic_zoom == $i ) echo " checked"; ?>> 
												<label for="basic_zoom_<?php echo $i; ?>"><?php echo $i; ?></label>
										</div>
<?php
								}
								// 끝 => 반복문
								//=========================================

?>
										<div class="cl_bo fl_left">
												<?php echo_help("처음 지도를 열었을때 보여줄 줌을 선택해 주세요."); ?><br />
												<?php echo_help("기본값은 <strong> ". $DEVAR_basic_zoom ." </strong> 입니다."); ?>
										</div>
								</td>
						</tr>

						<tr>
								<th scope="row"><label for="view_marker_small_t" class="font_4444ff">보이는 작은 마커 수<strong class="sound_only">선택입력</strong></label></th>
								<td class="line_h_2_2">
										<input type="text" name="view_marker_small_t" id="view_marker_small_t" value="<?php echo $p770033__view_marker_small_t; ?>" class="frm_input" style="width:50px;"> 개 보임<br />
										<?php echo_help("작은 마커는 숫자나 알파벳이 표시되지 않고 작은 아이콘으로 표시 됩니다."); ?><br />
										<?php echo_help("이 보이는 \"작은 마커\"의 숫자를 입력해 주세요."); ?><br />
										<?php echo_help("너무 많은 숫자를 입력하면 화면에 마커가 너무 많아 지도가 잘 보이지 않을수 있습니다."); ?><br />
										<?php echo_help("되도록 100개 이내로 입력하시길 권장합니다."); ?><br />
										<?php echo_help("기본값은 <strong> ". $DEVAR_view_marker_small_t ." </strong> 입니다."); ?>
								</td>
						</tr>

						<tr>
								<th scope="row">InfoWindow (인포윈도우)</th>
								<td>
										<div class="line_h_3_2">

												<p class="line_h_2_4">
														<label for="infowin_size_w">InfoWindow 크기 가로</label> 
														<input type="text" name="infowin_size_w" id="infowin_size_w" value="<?php echo $p770033__infowin_size_w; ?>" class="frm_input" style="width:50px;"> Pixel
														<br />
														<label for="infowin_size_h">InfoWindow 크기 세로</label> 
														<input type="text" name="infowin_size_h" id="infowin_size_h" value="<?php echo $p770033__infowin_size_h; ?>" class="frm_input" style="width:50px;"> Pixel
														<br />
														<?php echo_help("마커를 클릭했을때 보여지는 \"InfoWindow의 크기\"를 입력하세요."); ?><br />
														<?php echo_help("기본값은 <strong> ". $DEVAR_infowin_size_w ." × ".  $DEVAR_infowin_size_h ." </strong> 입니다."); ?>
												</p>

												<p class="line_h_2_4">
														<input type="checkbox" name="infowin_image_view_n" id="infowin_image_view_n" value="1"<?php	IF ( $p770033__infowin_image_view_n == 1) echo " checked";	?>> 
														<label for="infowin_image_view_n">마커 클릭시 뜨는 "InfoWindow"에 이미지를 보여줍니다.<strong class="sound_only">선택입력</strong></label>
												</p>

												<p class="line_h_2_4">
														<label for="infowin_image_size_w">InfoWindow 이미지 크기 가로</label> 
														<input type="text" name="infowin_image_size_w" id="infowin_image_size_w" value="<?php echo $p770033__infowin_image_size_w; ?>" class="frm_input" style="width:50px;"> Pixel
														<br />
														<label for="infowin_image_size_h">InfoWindow 이미지 크기 세로</label> 
														<input type="text" name="infowin_image_size_h" id="infowin_image_size_h" value="<?php echo $p770033__infowin_image_size_h; ?>" class="frm_input" style="width:50px;"> Pixel
														<br />
														<?php echo_help("마커를 클릭했을때 보여지는 \"InfoWindow의 크기\"를 입력하세요."); ?><br />
														<?php echo_help("기본값은 <strong> ". $DEVAR_infowin_image_size_w ." × ".  $DEVAR_infowin_image_size_h ." </strong> 입니다."); ?>
												</p>

										</div>
								</td>
						</tr>

						<tr>
								<th scope="row">패널 (게시글 목록)</th>
								<td>
										<div class="line_h_3_2">

												<p class="line_h_2_4">
														<input type="checkbox" name="panel_load_view_n" id="panel_load_view_n" value="1"<?php	IF ( $p770033__panel_load_view_n == 1) echo " checked";	?>> 
														<label for="panel_load_view_n" class="str_3334dd_bold_10">지도 로드시 오른쪽 패널을 보여줍니다. (패널을 숨기지 않습니다.)<strong class="sound_only">선택입력</strong></label>
												</p>

												<p class="line_h_2_4">
														<label for="panel_size_w">패널 (게시글 목록) 크기 가로</label> 
														<input type="text" name="panel_size_w" id="panel_size_w" value="<?php echo $p770033__panel_size_w; ?>" class="frm_input" style="width:50px;"> Pixel
														<br />
														<label for="panel_size_h">패널 (게시글 목록) 크기 세로</label> 
														<input type="text" name="panel_size_h" id="panel_size_h" value="<?php echo $p770033__panel_size_h; ?>" class="frm_input" style="width:50px;"> Pixel
														<br />
														<?php echo_help("지도 마커의 목록을 보여주는 오른쪽 \"패널\"의 크기를 입력하세요."); ?><br />
														<?php echo_help("기본값은 <strong> ". $DEVAR_panel_size_w ." × ".  $DEVAR_panel_size_h ." </strong> 입니다."); ?>
												</p>

												<p class="line_h_2_4">
														<input type="text" name="panel_article_row_n" id="panel_article_row_n" value="<?php echo $p770033__panel_article_row_n; ?>" class="frm_input" style="width:50px;"> 개 보임<br />
														<?php echo_help("오른쪽 패널에 게시글 가져올 수를 입력해 주세요."); ?><br />
														<?php echo_help("마커 아이콘이 30개까지만 있으니 30 이내로 입력해 주세요."); ?><br />
														<?php echo_help("기본값은 <strong> ". $DEVAR_panel_article_row_n ." </strong> 입니다."); ?>
												</p>

												<p class="line_h_2_4">
														<input type="checkbox" name="panel_image_view_n" id="panel_image_view_n" value="1"<?php	IF ( $p770033__panel_image_view_n == 1) echo " checked";	?>> 
														<label for="panel_image_view_n">오른쪽 패널 게시글 목록에 이미지를 보여줍니다.<strong class="sound_only">선택입력</strong></label>
												</p>

												<p class="line_h_2_4">
														<label for="panel_image_size_w">패널 이미지 크기 가로</lbel> 
														<input type="text" name="panel_image_size_w" id="panel_image_size_w" value="<?php echo $p770033__panel_image_size_w; ?>" class="frm_input" style="width:50px;"> Pixel
														<br />
														<label for="panel_image_size_h">패널 이미지 크기 세로</label> 
														<input type="text" name="panel_image_size_h" id="panel_image_size_h" value="<?php echo $p770033__panel_image_size_h; ?>" class="frm_input" style="width:50px;"> Pixel
														<br />
														<?php echo_help("지도 마커의 목록을 보여주는 오른쪽 \"패널\"에 이미지를 보여줄지 체크/해제 해 주세요."); ?><br />
														<?php echo_help("지도 마커의 목록을 보여주는 오른쪽 \"패널 크기\"를 입력하세요."); ?><br />
														<?php echo_help("기본값은 <strong> ". $DEVAR_panel_image_size_w ." × ".  $DEVAR_panel_image_size_h ." </strong> 입니다."); ?>
												</p>

										</div>
								</td>
						</tr>

						<tr>
								<th scope="row">클러스터링 기능</th>
								<td>
										<div class="line_h_3_2">

												<p class="line_h_2_4">
														<input type="checkbox" name="clustering_use_n" id="clustering_use_n" value="1"<?php	IF ( $p770033__clustering_use_n == 1) echo " checked";	?>> 
														<label for="clustering_use_n" class="str_3334dd_bold_10">클러스터링 기능을 사용합니다. (마커 모아 보여주기)<strong class="sound_only">선택입력</strong></label>
												</p>

												<p>
														<div class="cl_bo fl_left">
																<span class="str_3334dd_bold_10">클러스터링 기능 줌</span> 
														</div>
<?php

												//=================================
												// 시작 => 반복문
												FOR ( $i=1; $i<21; $i++ )
												{
														$class_cl_bo = $i == 1 || $i == 11 ? 'cl_bo ' : '';
?>
														<div class="<?php echo $class_cl_bo; ?>fl_left td_left_50">
																<input type="radio" name="clustering_zoom" id="clustering_zoom_<?php echo $i; ?>" value="<?php echo $i; ?>"<?php	IF ( $p770033__clustering_zoom == $i ) echo " checked"; ?>> 
																<label for="clustering_zoom_<?php echo $i; ?>"><?php echo $i; ?></label>
														</div>
<?php
												}
												// 끝 => 반복문
												//=================================

?>
												</p>

										</div>
								</td>
						</tr>

				</tbody>
				</table>

		</div>


		<br />


		<div class="btn_confirm">
			<input type="submit" class="btn_submit" value=" 설 정 정 보 를	저 장 합 니 다 ">
			<input type="button" class="btn_cancel" value=" 취소하기 " onClick="PageUrl('./index.php')">
		</div>

		</form>

</section>


<?php

	//=======================================================
	// ADMIN_TAIL__첨부
	include_once('../admin.tail.php');

?>