<?php

/*
===========================================================

	프로젝트 이름 : 피리 맵 페이지 PLUS

	만든사람 : 피리 PIREE

	홈페이지 : http://www.piree.co.kr

	작성날짜 : 2015년 12월 19일 토요일 오전 03시 57분 - 날씨 강추위가 물러가 덜 추운 편이다.

	저 작 권 : Copyright ⓒ 2014-2015 투스포츠 (원병철) All right reserved
							그누보드 외에 추가된 소스는~
							만든사람의 허락없이 무단으로 사용할수 없습니다.
							사용하고자 할 경우 만든사람의 허락을 받아야 합니다.
							http://www.piree.co.kr 에 문의해 주세요.

===========================================================
 피리 SAM > 피리 맵 페이지 PLUS > 설정 정보 수정 폼 > 기본값
===========================================================


*/


	#########################################################
	# 시작 => 선처리
	#########################################################

	//=======================================================
	// 개별_페이지__접근_불가
	IF ( !defined('_GNUBOARD_') )										EXIT;

	#########################################################
	# 끝 => 선처리
	#########################################################



	#########################################################
	# 시작 => 기본값
	#########################################################

	//=======================================================
	// 사용할__지도_선택
	$DEVAR_use_map_c = 'google_map';


	//=======================================================
	// 구글맵__API_KEY
	$DEVAR_api_key_google_map = '';


	//=======================================================
	// 다음_지도__API_KEY
	$DEVAR_api_key_daum_map = '';


	//=======================================================
	// 네이버_지도__API_KEY
	$DEVAR_api_key_naver_map = '';


	//=======================================================
	// 지도_적용_지역
	$DEVAR_map_view_area = 'KR';


	//=======================================================
	// 지도_크기__해상도
	$DEVAR_map_size_x = 728;
	$DEVAR_map_size_h = 120;


	//=======================================================
	// 현재_위치__사용
	$DEVAR_now_here_point = 0;


	//=======================================================
	// 지도_처음__좌표
	$DEVAR_map_start_point_lng = 127.031006;
	$DEVAR_map_start_point_lat = 37.278290;


	//=======================================================
	// 기본__줌
	$DEVAR_basic_zoom = 15;


	//=======================================================
	// 보이는__큰_마커_수
	$DEVAR_view_marker_big_t = 26;
	$DEVAR_view_marker_big_t = 15;


	//=======================================================
	// 보이는__작은_마커_수
	$DEVAR_view_marker_small_t = 100;
	$DEVAR_view_marker_small_t = 30;


	//=======================================================
	// 큰_마커__지도_중앙__위주로
	$DEVAR_use_marker_center_deploy = 1;


	//=======================================================
	// 마커_출력수__이상_DATA_있으면__보임_방식
	$DEVAR_marker_count_many_c = 'page';


	//=======================================================
	// InfoWindow_크기__해상도
	$DEVAR_infowin_size_w = 220;
	$DEVAR_infowin_size_h = 60;


	//=======================================================
	// 오른쪽_패널_크기__해상도
	$DEVAR_panel_size_w = 360;
	$DEVAR_panel_size_h = 500;


	//=======================================================
	// 패널_게시글_목록_이미지__보여주기_여부
	$DEVAR_panel_image_view_n = 260;


	//=======================================================
	// 오른쪽_패널_크기__해상도
	$DEVAR_panel_image_size_w = 60;
	$DEVAR_panel_image_size_h = 60;


	//=======================================================
	// 패널_게시글_목록_이미지__보여주기_여부
	$infowin_image_view_n = 1;


	//=======================================================
	// 오른쪽_패널_크기__해상도
	$DEVAR_panel_image_size_w = 60;
	$DEVAR_panel_image_size_h = 60;


	//=======================================================
	// 패널에_게시글_수
	$DEVAR_panel_article_row_n = 30;


	//=======================================================
	// InfoWindow_이미지__보여주기_여부
	$DEVAR_infowin_image_view_n = 1;


	//=======================================================
	// InfoWindow_이미지_크기_해상도
	$DEVAR_infowin_image_size_w = 60;
	$DEVAR_infowin_image_size_h = 60;


	//=======================================================
	// 지도_로드시_오른쪽_패널__보여주기_여부
	$DEVAR_panel_load_view_n = 1;


	//=======================================================
	// 클러스터링_기능__사용_여부
	$DEVAR_clustering_use_n = 1;


	//=======================================================
	// 클러스터링_기능_줌
	$DEVAR_clustering_zoom = 14;


	//=======================================================
	// InfoWindow에__제목_길이
	$DEVAR_infowin_title_len = 35;


	//=======================================================
	// InfoWindow__내용_폼
	$DEVAR_infowin_cont_form = '';


	//=======================================================
	// InfoWindow__피리_내용보기
	$DEVAR_infowin_piree_content = 1;


	//=======================================================
	// 마커_클릭시__목록창
	$DEVAR_marker_choice_open_listwin = 1;


	//=======================================================
	// 선택된_DATA__스크롤_이동
	$DEVAR_choice_data_scroll_move = 1;


	//=======================================================
	// 지도_저장__기능_사용
	$DEVAR_map_save_func_use = 1;


	//=======================================================
	// 주소복사__사용
	$DEVAR_url_copy__piree = 1;


	//=======================================================
	// DATA_좌표__자동등록
	$DEVAR_data_coord_auto_regist = 0;

	#########################################################
	# 끝 => 기본값
	#########################################################



	#########################################################
	# 시작 => 기본값
	#########################################################

	//=======================================================
	// 사용할__지도_선택
	$p770033__use_map_c = $DEVAR_use_map_c;


	//=======================================================
	// 구글맵__API_KEY
	$p770033__api_key_google_map = $DEVAR_api_key_google_map;


	//=======================================================
	// 다음_지도__API_KEY
	$p770033__api_key_daum_map = $DEVAR_api_key_daum_map;


	//=======================================================
	// 네이버_지도__API_KEY
	$p770033__api_key_naver_map = $DEVAR_api_key_naver_map;


	//=======================================================
	// 지도_적용_지역
	$p770033__map_view_area = $DEVAR_map_view_area;


	//=======================================================
	// 지도_크기__해상도
	$p770033__map_size_x = $DEVAR_map_size_x;
	$p770033__map_size_h = $DEVAR_map_size_h;


	//=======================================================
	// 현재_위치__사용
	$p770033__now_here_point = $DEVAR_now_here_point;


	//=======================================================
	// 현재_위치__사용__문자열
	$DEVAR_now_here_point_s = $DEVAR_now_here_point == 1 ? "현재 위치를 사용합니다." : "현재 위치를 사용하지 않습니다.";


	//=======================================================
	// 지도_처음__좌표
	$p770033__map_start_point_lng = $DEVAR_map_start_point_lng;
	$p770033__map_start_point_lat = $DEVAR_map_start_point_lat;


	//=======================================================
	// 기본__줌
	$p770033__basic_zoom = $DEVAR_basic_zoom;


	//=======================================================
	// 보이는__큰_마커_수
	$p770033__view_marker_big_t = $DEVAR_view_marker_big_t;
	$p770033__view_marker_big_t = $DEVAR_view_marker_big_t;


	//=======================================================
	// 보이는__작은_마커_수
	$p770033__view_marker_small_t = $DEVAR_view_marker_small_t;
	$p770033__view_marker_small_t = $DEVAR_view_marker_small_t;


	//=======================================================
	// 큰_마커__지도_중앙__위주로
	$p770033__use_marker_center_deploy = $DEVAR_use_marker_center_deploy;


	//=======================================================
	// 마커_출력수__이상_DATA_있으면__보임_방식
	$p770033__marker_count_many_c = $DEVAR_marker_count_many_c;


	//=======================================================
	// InfoWindow_크기__해상도
	$p770033__infowin_size_w = $DEVAR_infowin_size_w;
	$p770033__infowin_size_h = $DEVAR_infowin_size_h;


	//=======================================================
	// 오른쪽_패널_크기__해상도
	$p770033__panel_size_w = $DEVAR_panel_size_w;
	$p770033__panel_size_h = $DEVAR_panel_size_h;


	//=======================================================
	// 패널_게시글_목록_이미지__보여주기_여부
	$p770033__panel_image_view_n = $DEVAR_panel_image_view_n;


	//=======================================================
	// 오른쪽_패널_크기__해상도
	$p770033__panel_image_size_w = $DEVAR_panel_image_size_w;
	$p770033__panel_image_size_h = $DEVAR_panel_image_size_h;


	//=======================================================
	// 시작 => 패널_게시글_목록_이미지__보여주기_여부
	IF ( $infowin_image_view_n != 1 )
	{
			// 기본값
			$infowin_image_view_n = 0;
	}
	// 끝 => 패널_게시글_목록_이미지__보여주기_여부
	//=======================================================


	//=======================================================
	// 오른쪽_패널_크기__해상도
	$p770033__panel_image_size_w = $DEVAR_panel_image_size_w;
	$p770033__panel_image_size_h = $DEVAR_panel_image_size_h;


	//=======================================================
	// 패널에_게시글_수
	$p770033__panel_article_row_n = $DEVAR_panel_article_row_n;


	//=======================================================
	// InfoWindow_이미지__보여주기_여부
	$p770033__infowin_image_view_n = $DEVAR_infowin_image_view_n;


	//=======================================================
	// InfoWindow_이미지_크기_해상도
	$p770033__infowin_image_size_w = $DEVAR_infowin_image_size_w;
	$p770033__infowin_image_size_h = $DEVAR_infowin_image_size_h;


	//=======================================================
	// 지도_로드시_오른쪽_패널__보여주기_여부
	$p770033__panel_load_view_n = $DEVAR_panel_load_view_n;


	//=======================================================
	// 클러스터링_기능__사용_여부
	$p770033__clustering_use_n = $DEVAR_clustering_use_n;


	//=======================================================
	// 클러스터링_기능_줌
	$p770033__clustering_zoom = $DEVAR_clustering_zoom;


	//=======================================================
	// InfoWindow에__제목_길이
	$p770033__infowin_title_len = $DEVAR_infowin_title_len;


	//=======================================================
	// InfoWindow__내용_폼
	$p770033__infowin_cont_form = $DEVAR_infowin_cont_form;


	//=======================================================
	// InfoWindow__피리_내용보기
	$p770033__infowin_piree_content = $DEVAR_infowin_piree_content;


	//=======================================================
	// 마커_클릭시__목록창
	$p770033__marker_choice_open_listwin = $DEVAR_marker_choice_open_listwin;


	//=======================================================
	// 선택된_DATA__스크롤_이동
	$p770033__choice_data_scroll_move = $DEVAR_choice_data_scroll_move;


	//=======================================================
	// 지도_저장__기능_사용
	$p770033__map_save_func_use = $DEVAR_map_save_func_use;


	//=======================================================
	// 주소복사__사용
	$p770033__url_copy__piree = $DEVAR_url_copy__piree;


	//=======================================================
	// DATA_좌표__자동등록
	$p770033__data_coord_auto_regist = $DEVAR_data_coord_auto_regist;

	#########################################################
	# 끝 => 기본값
	#########################################################


?>