<?php

/*
===========================================================

	프로젝트 이름 : 피리 웹프로그램

	만든사람 : 피리 PIREE

	홈페이지 : http://www.piree.co.kr

	작성날짜 : 2016년 05월 30일 월요일 오전 03시 26분 - 날씨 비옴

	저 작 권 : Copyright ⓒ 2014-2016 투스포츠 (원병철) All right reserved
							그누보드 외에 추가된 소스는~
							만든사람의 허락없이 무단으로 사용할수 없습니다.
							사용하고자 할 경우 만든사람의 허락을 받아야 합니다.
							http://www.piree.co.kr 에 문의해 주세요.

===========================================================
 피리 > 관리자 > 최고 회원 레벨
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
	# 시작 => 각__게시판__관련
	#########################################################

	//=======================================================
	// 그누보드_카테고리__가져오는__쿼리문
	$sql	 = "SELECT COUNT(*) FROM `". $g5['board_table'] ."`";
	$total = sql_efv($sql);
	$total = (int)$total;


	//=======================================================
	// 시작 => 게시판__있으면
	IF ( $total > 0 )
	{

			//===================================================
			// 게시판_목록__가져오기
			$sql		= "SELECT `bo_table` FROM `". $g5['board_table'] ."` ORDER BY `bo_table` ASC";
			$result = sql_query($sql);


			//===================================================
			// 시작 => 반복문__게시판_목록
			WHILE (  $res = sql_fetch_array($result) )
			{

					//===============================================
					// 시작 => 게시판_코드__있으면
					IF ( $res['bo_table'] )
					{

							#############################################
							# 시작 => 게시판_테이블_관련
							#############################################

							//===========================================
							// 게시판_코드
							$in_bo_table = $res['bo_table'];


							//===========================================
							// 게시판_테이블_이름
							$write_table = $g5['write_prefix'] . $in_bo_table;

							#############################################
							# 끝 => 게시판_테이블_관련
							#############################################



							#############################################
							# 시작 => 게시글_1개__가져오기
							#############################################

							//===========================================
							// ROW_1개__가져오기
							$sql = "SELECT * FROM ". $write_table ." LIMIT 1";
							$row = sql_fetch($sql);

							#############################################
							# 끝 => 게시글_1개__가져오기
							#############################################



							#############################################
							# 시작 => 신고하기
							#############################################

							//===========================================
							// 시작 => 신고건수__없으면
							IF ( !isset($row['wr_pi_report_t'] ) )
							{
									$sql = "ALTER TABLE `". $write_table ."` ADD `wr_pi_report_t` tinyint(4) UNSIGNED NOT NULL DEFAULT '0'";
									sql_query($sql, false);
							}
							// 끝 => 신고건수__없으면
							//===========================================

							#############################################
							# 끝 => 신고하기
							#############################################



							#############################################
							# 시작 => 단축_URL
							#############################################

							//===========================================
							// 시작 => 단축_URL__없으면
							IF ( !isset($row['wr_sh_url_s'] ) )
							{
									$sql = "ALTER TABLE `". $write_table ."` ADD `wr_sh_url_s` varchar(20) NOT NULL DEFAULT ''";
									sql_query($sql, false);
							}
							// 끝 => 단축_URL__없으면
							//===========================================

							#############################################
							# 끝 => 단축_URL
							#############################################



							#############################################
							# 시작 => 카테고리
							#############################################

							//===========================================
							// 시작 => 카테고리_번호__없으면
							IF (!isset($row['wr_pi_ca_n'] ) )
							{
									$sql = "ALTER TABLE `". $write_table ."` ADD `wr_pi_ca_n` INT UNSIGNED NOT NULL DEFAULT '0'";
									sql_query($sql, false);
							}
							// 끝 => 카테고리_번호__없으면
							//===========================================

							#############################################
							# 끝 => 카테고리
							#############################################



							#############################################
							# 시작 => 투표
							#############################################

							//===========================================
							// 시작 => 칼럼__게시글_투표_번호__없으면
							IF (!isset($row['wr_pi_atvt_n'] ) )
							{
									$sql = "ALTER TABLE `". $write_table ."` ADD `wr_pi_atvt_n` INT UNSIGNED NOT NULL DEFAULT '0'";
									sql_query($sql, false);
							}
							// 끝 => 칼럼__게시글_투표_번호__없으면
							//===========================================

							#############################################
							# 끝 => 투표
							#############################################



							#############################################
							# 시작 => 기타
							#############################################

							//===========================================
							// 시작 => 게시글__보임_여부__없으면
							IF (!isset($row['wr_pi_is_view_n'] ) )
							{
									$sql = "ALTER TABLE `". $write_table ."` ADD `wr_pi_is_view_n` TINYINT UNSIGNED NOT NULL DEFAULT '1'";
									sql_query($sql, false);
							}
							// 끝 => 게시글__보임_여부__없으면
							//===========================================


							//===========================================
							// 시작 => 칼럼__읽기_레벨__없으면
							IF (!isset($row['wr_pi_read_level_n'] ) )
							{
									$sql = "ALTER TABLE `". $write_table ."` ADD `wr_pi_read_level_n` TINYINT UNSIGNED NOT NULL DEFAULT '0'";
									sql_query($sql, false);
							}
							// 끝 => 칼럼__읽기_레벨__없으면
							//===========================================

							#############################################
							# 끝 => 기타
							#############################################

					}
					// 끝 => 게시판_코드__있으면
					//===============================================

			}
			// 끝 => 반복문__게시판_목록
			//===================================================

	}
	// 끝 => 게시판__있으면
	//=======================================================

	#########################################################
	# 끝 => 각__게시판__관련
	#########################################################


?>