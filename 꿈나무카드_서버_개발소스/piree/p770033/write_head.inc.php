<?php

/*
===========================================================

	프로젝트 이름 : 피리 버젼 3

	만든사람 : 피리 PIREE ( 원병철 , piree1977@gmail.com )

	홈페이지 : http://www.piree.co.kr

	작성날짜 : 2016년 01월 25일 월요일 오후 14시 50분 - 날씨 추워, 추워!! 너무 추워!!

	저 작 권 : Copyright ⓒ 2014-2016 투스포츠 (원병철) All right reserved
							그누보드 외에 추가된 소스는~
							만든사람의 허락없이 무단으로 사용할수 없습니다.
							사용하고자 할 경우 만든사람의 허락을 받아야 합니다.
							http://www.piree.co.kr 에 문의해 주세요.

===========================================================
 피리 > 게시판 > 피리 맵 페이지 > 글쓰기 관련 처리
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
	// 설정_정보_파일__첨부
	include_once( get__sam_file($sub_menu, 'config', 'path') );

	#########################################################
	# 끝 => 피리_맵_페이지__설정_정보_파일__첨부
	#########################################################



	#########################################################
	# 시작 => 상수__변수
	#########################################################

	//=======================================================
	// 


	//=======================================================
	// 

	#########################################################
	# 끝 => 상수__변수
	#########################################################



	#########################################################
	# 시작 => 칼럼__추가
	#########################################################

	//=======================================================
	// 시작 => 게시글_번호__유무
	IF ( $write['wr_id'] > 0 )
	{

			#####################################################
			# 시작 => 게시글_번호__있으면

			//===================================================
			// 배열복사
			$temp_res = $write;

	}
	ELSE
	{

			#####################################################
			# 시작 => 게시글_번호__없으면

			//===================================================
			// 게시글__1ROW__가져오기
			$sql = "SELECT * FROM `". $write_table ."` LIMIT 1";
			$temp_res = sql_fetch($sql, false);

	}
	// 끝 => 게시글_번호__유무
	//=======================================================


	//=======================================================
	// 시작 => 좌표__경도__없으면
	IF ( !isset($temp_res['wr_lng']) )
	{

			//===================================================
			// 필드_추가__쿼리문
			$sql = "ALTER TABLE `". $write_table ."` ADD `wr_lng` float NOT NULL";
			sql_query ($sql, false);

	}
	// 끝 => 좌표__경도__없으면
	//=======================================================


	//=======================================================
	// 시작 => 좌표__위도__없으면
	IF ( !isset($temp_res['wr_lat']) )
	{

			//===================================================
			// 필드_추가__쿼리문
			$sql = "ALTER TABLE `". $write_table ."` ADD `wr_lat` float NOT NULL";
			sql_query ($sql, false);

	}
	// 끝 => 좌표__위도__없으면
	//=======================================================

	#########################################################
	# 끝 => 칼럼__추가
	#########################################################



	#########################################################
	# 시작 => 좌표__지우기
	#########################################################

	//=======================================================
	// 좌표__지우기
	$sql	= "UPDATE `". $write_table ."` SET ";
	$sql .= "`wr_lng`='0', ";
	$sql .= "`wr_lat`='0' ";
	$sql .= "WHERE `wr_id` = '".$wr_id."'";
	sql_query($sql);

	#########################################################
	# 끝 => 좌표__지우기
	#########################################################


?>