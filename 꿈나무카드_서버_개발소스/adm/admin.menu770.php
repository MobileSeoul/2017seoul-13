<?php

/*
===========================================================

	프로젝트 이름 : 피리 웹프로그램

	만든사람 : 피리 PIREE

	홈페이지 : http://www.piree.co.kr

	작성날짜 : 2016년 01월 24일 일요일 오전 03시 31분 - 날씨 추워, 추워!! 너무 추워!!

	저 작 권 : Copyright ⓒ 2014-2015 투스포츠 (원병철) All right reserved
				      그누보드 외에 추가된 소스는~
				      만든사람의 허락없이 무단으로 사용할수 없습니다.
				      사용하고자 할 경우 만든사람의 허락을 받아야 합니다.
				      http://www.piree.co.kr 에 문의해 주세요.

===========================================================
 관리자 > 피리 > 피리 메뉴
===========================================================


*/


	#########################################################
	# 시작 => 피리__메뉴
	#########################################################

	//=======================================================
	// 피리__메뉴__배열
	$menu["menu770"] = array (
												    array("770000", "피리 PLUS G5",								G5_ADMIN_URL.'/p770001/pi__update.php',	"piree"),
												    array("770001", "피리 테이블 생성",						G5_ADMIN_URL."/p770001/",								"table"),
														array("770033", "피리 맵 페이지 PLUS 0.1.3",	G5_ADMIN_URL."/p770033/",								"piree_map_page"),
														array("770999", "피리 프로그램 소식",					G5_ADMIN_URL.'/p770001/pi__update.php',	"update", 1),
												    );

	#########################################################
	# 끝 => 피리__메뉴
	#########################################################


?>