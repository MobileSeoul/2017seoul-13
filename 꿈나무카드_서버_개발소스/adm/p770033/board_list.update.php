<?php

/*
===========================================================

	프로젝트 이름 : 피리 맵 페이지

	만든사람 : 피리 PIREE

	홈페이지 : http://www.piree.co.kr

	작성날짜 : 2015년 12월 28일 월요일 오전 01시 29분 - 날씨 춥다 

	저 작 권 : Copyright ⓒ 2014-2015 투스포츠 (원병철) All right reserved
							그누보드 외에 추가된 소스는~
							만든사람의 허락없이 무단으로 사용할수 없습니다.
							사용하고자 할 경우 만든사람의 허락을 받아야 합니다.
							http://www.piree.co.kr 에 문의해 주세요.

===========================================================
 피리 SAM > 관리자 > 피리 맵 페이지 > 게시판 목록
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
	# 시작 => 선_처리
	#########################################################

	//=======================================================
	// 기본처리_파일__첨부
	include_once('./_common.php');

	#########################################################
	# 끝 => 선_처리
	#########################################################



	#########################################################
	# 시작 => 선_처리__관리자_확인
	#########################################################

	//=======================================================
	// 시작 => 회원_여부__확인
	IF ($is_guest || !$is_member)
	{
			alert ("회원만 이용하실 수 있습니다.", G5_DOMAIN."/");
			EXIT;
	}
	// 끝 => 회원_여부__확인
	//=======================================================


	//=======================================================
	// 시작 => 관리자__아니면
	IF (!$is_admin)
	{
			alert ("권한이 없습니다.", G5_DOMAIN."/");
			EXIT;
	}
	// 끝 => 관리자__아니면
	//=======================================================


	//=======================================================
	// 관리자_확인
	auth_check($auth[$sub_menu], 'r');

	#########################################################
	# 끝 => 선_처리__관리자_확인
	#########################################################



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
	$is_piree_program_config = 0;


	//=======================================================
	// 설정_정보_화일__첨부
	include_once( get__sam_file($sub_menu, 'config', 'path') );

	#########################################################
	# 끝 => 피리_맵_페이지__설정_정보_파일__첨부
	#########################################################



	#########################################################
	# 시작 => 상수__변수
	#########################################################

	//=======================================================
	// 게시판__수
	$board_t = 0;


	//=======================================================
	// 게시판___배열
	$board_arr = array();

	#########################################################
	# 끝 => 상수__변수
	#########################################################



	#########################################################
	# 시작 => 필드__유무__확인하기
	#########################################################

	//=======================================================
	// 필드_추가__처리_파일
	include "./board.field_add.inc.php";

	#########################################################
	# 끝 => 필드__유무__확인하기
	#########################################################



	#########################################################
	# 시작 => 게시판__수__파악하기
	#########################################################

	//=======================================================
	// 게시판__수__파악하는__쿼리문
	$sql		 = "SELECT COUNT(*) FROM `".$g5['board_table']."`";
	$board_t = sql_efv($sql);
	$board_t = (int)$board_t;

	#########################################################
	# 끝 => 게시판__수__파악하기
	#########################################################



	#########################################################
	# 시작 => 게시판__목록__불러오기
	#########################################################
	IF ($board_t > 0)
	{

			#####################################################
			# 시작 => 게시판__목록__불러오기
			#####################################################

			//===================================================
			// 게시판__불러오기
			$sql		= "SELECT * ";
			$sql	 .= "FROM `".$g5['board_table']."` ORDER BY gr_id, bo_table ASC";
			$result = sql_query ($sql);


			//===================================================
			// 시작 => 반복문__돌리기
			FOR ($i=0; $row=sql_fetch_array($result); $i++)
			{

					//===============================================
					// 게시판_코드
					$in_bo_table = $row["bo_table"];


					//===============================================
					// 게시판_PC_이름__쿼터_제거
					$bo_subject = stripslashes($row["bo_subject"]);


					//===============================================
					// 게시판_모바일_이름__쿼터_제거
					$bo_mobile_subject = stripslashes($row["bo_mobile_subject"]);


					//===============================================
					// 게시글_리스트_스킨에서_처리
					$arti_list_skin_ok_n = $arti_list_skin_ok_arr[$in_bo_table] == 1 ? 1 : 0;


					//===============================================
					// 시작 => 게시글_리스트_스킨에서_처리__다르면
					IF ( $arti_list_skin_ok_n != $row["bo_arti_list_skin_ok"] )
					{

							//===========================================
							// 게시판__게시글_리스트_스킨에서_처리__수정하는__쿼리문
							$sql	= "UPDATE `". $g5['board_table'] ."` SET ";
							$sql .= "`bo_arti_list_skin_ok` = '". $arti_list_skin_ok_n ."' ";
							$sql .= "WHERE `bo_table` = '". $in_bo_table ."'";


							//===========================================
							// 시작 => 쿼리_실행
							IF ( !sql_query ($sql) )
							{
									alert ("[ ". $bo_subject ." ] 게시판의\\n\\n\\\"게시글 리스트 스킨에서 처리\\\"를 수정하지 못했습니다.");
							}
							// 끝 => 쿼리_실행
							//===========================================

					}
					// 끝 => 게시글_리스트_스킨에서_처리__다르면
					//===============================================

			}
			// 끝 => 반복문__돌리기
			//===================================================

			#####################################################
			# 끝 => 게시판__목록__불러오기
			#####################################################

	}
	#########################################################
	# 끝 => 게시판__불러오기
	#########################################################



	#########################################################
	# 시작 => 마무리__페이지_이동
	#########################################################

	//=======================================================
	// 페이지_이동
	$go_url_s = 'board_list.php';


	//=======================================================
	// 페이지_이동
	goto_url($go_url_s);
	EXIT;

	#########################################################
	# 끝 => 마무리__페이지_이동
	#########################################################


?>