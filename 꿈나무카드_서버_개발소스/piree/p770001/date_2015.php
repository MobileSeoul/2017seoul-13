<?php

/*
===========================================================

	프로젝트 이름 : 피리 게시글에 투표, 복수 질문 G5

	만든사람 : 피리 PIREE

	홈페이지 : http://www.piree.co.kr

	작성날짜 : 2015년 2014년 01월 22일 수요일 오전 08시 55분 - 날씨 추워~ B급으로 추워~

===========================================================
 피리 > 달력 입력 > 2015년 데이터
===========================================================


*/


	#########################################################
	# 시작 => 날짜__2014년
	#########################################################

	//=======================================================
	// 배열
	// $val[0] $val[1] $val[2]			 $val[3] $val[4]	 $val[5]			 $val[6]			$val[7]			$val[8]		 $val[9]
	// date_m, date_d, date_Ymd,		 yoil_n, yoil_seq, lunar_Ymd,		kor_gapja_s, cha_gapja_s, is_holiday, is_24_jeolki
	// 1,			1,			'2014-01-01', 3,			1,				'2013-12-01', '',					'壬申',			1,					 ''


	//=======================================================
	// 배열
	$dates[] = array('1','1','2015-01-01','4','1','2014-11-11','','丁丑','1','');
	$dates[] = array('1','2','2015-01-02','5','1','2014-11-12','','戊寅','0','');
	$dates[] = array('1','3','2015-01-03','6','1','2014-11-13','','己卯','0','');
	$dates[] = array('1','4','2015-01-04','0','2','2014-11-14','','庚辰','0','');
	$dates[] = array('1','5','2015-01-05','1','2','2014-11-15','','辛巳','0','');
	$dates[] = array('1','6','2015-01-06','2','2','2014-11-16','','壬午','0','소한');
	$dates[] = array('1','7','2015-01-07','3','2','2014-11-17','','癸未','0','');
	$dates[] = array('1','8','2015-01-08','4','2','2014-11-18','','甲申','0','');
	$dates[] = array('1','9','2015-01-09','5','2','2014-11-19','','乙酉','0','');
	$dates[] = array('1','10','2015-01-10','6','2','2014-11-20','','丙戌','0','');
	$dates[] = array('1','11','2015-01-11','0','3','2014-11-21','','丁亥','0','');
	$dates[] = array('1','12','2015-01-12','1','3','2014-11-22','','戊子','0','');
	$dates[] = array('1','13','2015-01-13','2','3','2014-11-23','','己丑','0','');
	$dates[] = array('1','14','2015-01-14','3','3','2014-11-24','','庚寅','0','');
	$dates[] = array('1','15','2015-01-15','4','3','2014-11-25','','辛卯','0','');
	$dates[] = array('1','16','2015-01-16','5','3','2014-11-26','','壬辰','0','');
	$dates[] = array('1','17','2015-01-17','6','3','2014-11-27','','癸巳','0','');
	$dates[] = array('1','18','2015-01-18','0','4','2014-11-28','','甲午','0','');
	$dates[] = array('1','19','2015-01-19','1','4','2014-11-29','','乙未','0','');
	$dates[] = array('1','20','2015-01-20','2','4','2014-12-01','','丙申','0','대한');
	$dates[] = array('1','21','2015-01-21','3','4','2014-12-02','','丁酉','0','');
	$dates[] = array('1','22','2015-01-22','4','4','2014-12-03','','戊戌','0','');
	$dates[] = array('1','23','2015-01-23','5','4','2014-12-04','','己亥','0','');
	$dates[] = array('1','24','2015-01-24','6','4','2014-12-05','','庚子','0','');
	$dates[] = array('1','25','2015-01-25','0','5','2014-12-06','','辛丑','0','');
	$dates[] = array('1','26','2015-01-26','1','5','2014-12-07','','壬寅','0','');
	$dates[] = array('1','27','2015-01-27','2','5','2014-12-08','','癸卯','0','');
	$dates[] = array('1','28','2015-01-28','3','5','2014-12-09','','甲辰','0','');
	$dates[] = array('1','29','2015-01-29','4','5','2014-12-10','','乙巳','0','');
	$dates[] = array('1','30','2015-01-30','5','5','2014-12-11','','丙午','0','');
	$dates[] = array('1','31','2015-01-31','6','5','2014-12-12','','丁未','0','');
	$dates[] = array('2','1','2015-02-01','0','1','2014-12-13','','戊申','0','');
	$dates[] = array('2','2','2015-02-02','1','1','2014-12-14','','己酉','0','');
	$dates[] = array('2','3','2015-02-03','2','1','2014-12-15','','庚戌','0','');
	$dates[] = array('2','4','2015-02-04','3','1','2014-12-16','','辛亥','0','입춘');
	$dates[] = array('2','5','2015-02-05','4','1','2014-12-17','','壬子','0','');
	$dates[] = array('2','6','2015-02-06','5','1','2014-12-18','','癸丑','0','');
	$dates[] = array('2','7','2015-02-07','6','1','2014-12-19','','甲寅','0','');
	$dates[] = array('2','8','2015-02-08','0','2','2014-12-20','','乙卯','0','');
	$dates[] = array('2','9','2015-02-09','1','2','2014-12-21','','丙辰','0','');
	$dates[] = array('2','10','2015-02-10','2','2','2014-12-22','','丁巳','0','');
	$dates[] = array('2','11','2015-02-11','3','2','2014-12-23','','戊午','0','');
	$dates[] = array('2','12','2015-02-12','4','2','2014-12-24','','己未','0','');
	$dates[] = array('2','13','2015-02-13','5','2','2014-12-25','','庚申','0','');
	$dates[] = array('2','14','2015-02-14','6','2','2014-12-26','','辛酉','0','');
	$dates[] = array('2','15','2015-02-15','0','3','2014-12-27','','壬戌','0','');
	$dates[] = array('2','16','2015-02-16','1','3','2014-12-28','','癸亥','0','');
	$dates[] = array('2','17','2015-02-17','2','3','2014-12-29','','<font color=','0','');
	$dates[] = array('2','18','2015-02-18','3','3','2014-12-30','','乙丑','0','');
	$dates[] = array('2','19','2015-02-19','4','3','2014-01-01','','丙寅','0','우수');
	$dates[] = array('2','20','2015-02-20','5','3','2014-01-02','','丁卯','0','');
	$dates[] = array('2','21','2015-02-21','6','3','2014-01-03','','戊辰','0','');
	$dates[] = array('2','22','2015-02-22','0','4','2014-01-04','','己巳','0','');
	$dates[] = array('2','23','2015-02-23','1','4','2014-01-05','','庚午','0','');
	$dates[] = array('2','24','2015-02-24','2','4','2014-01-06','','辛未','0','');
	$dates[] = array('2','25','2015-02-25','3','4','2014-01-07','','壬申','0','');
	$dates[] = array('2','26','2015-02-26','4','4','2014-01-08','','癸酉','0','');
	$dates[] = array('2','27','2015-02-27','5','4','2014-01-09','','甲戌','0','');
	$dates[] = array('2','28','2015-02-28','6','4','2014-01-10','','乙亥','0','');
	$dates[] = array('3','1','2015-03-01','0','1','2015-01-11','','丙子','0','');
	$dates[] = array('3','2','2015-03-02','1','1','2015-01-12','','丁丑','0','');
	$dates[] = array('3','3','2015-03-03','2','1','2015-01-13','','戊寅','0','');
	$dates[] = array('3','4','2015-03-04','3','1','2015-01-14','','己卯','0','');
	$dates[] = array('3','5','2015-03-05','4','1','2015-01-15','','庚辰','0','');
	$dates[] = array('3','6','2015-03-06','5','1','2015-01-16','','辛巳','0','경칩');
	$dates[] = array('3','7','2015-03-07','6','1','2015-01-17','','壬午','0','');
	$dates[] = array('3','8','2015-03-08','0','2','2015-01-18','','癸未','0','');
	$dates[] = array('3','9','2015-03-09','1','2','2015-01-19','','甲申','0','');
	$dates[] = array('3','10','2015-03-10','2','2','2015-01-20','','乙酉','0','');
	$dates[] = array('3','11','2015-03-11','3','2','2015-01-21','','丙戌','0','');
	$dates[] = array('3','12','2015-03-12','4','2','2015-01-22','','丁亥','0','');
	$dates[] = array('3','13','2015-03-13','5','2','2015-01-23','','戊子','0','');
	$dates[] = array('3','14','2015-03-14','6','2','2015-01-24','','己丑','0','');
	$dates[] = array('3','15','2015-03-15','0','3','2015-01-25','','庚寅','0','');
	$dates[] = array('3','16','2015-03-16','1','3','2015-01-26','','辛卯','0','');
	$dates[] = array('3','17','2015-03-17','2','3','2015-01-27','','壬辰','0','');
	$dates[] = array('3','18','2015-03-18','3','3','2015-01-28','','癸巳','0','');
	$dates[] = array('3','19','2015-03-19','4','3','2015-01-29','','甲午','0','');
	$dates[] = array('3','20','2015-03-20','5','3','2015-02-01','','乙未','0','');
	$dates[] = array('3','21','2015-03-21','6','3','2015-02-02','','丙申','0','춘분');
	$dates[] = array('3','22','2015-03-22','0','4','2015-02-03','','丁酉','0','');
	$dates[] = array('3','23','2015-03-23','1','4','2015-02-04','','戊戌','0','');
	$dates[] = array('3','24','2015-03-24','2','4','2015-02-05','','己亥','0','');
	$dates[] = array('3','25','2015-03-25','3','4','2015-02-06','','庚子','0','');
	$dates[] = array('3','26','2015-03-26','4','4','2015-02-07','','辛丑','0','');
	$dates[] = array('3','27','2015-03-27','5','4','2015-02-08','','壬寅','0','');
	$dates[] = array('3','28','2015-03-28','6','4','2015-02-09','','癸卯','0','');
	$dates[] = array('3','29','2015-03-29','0','5','2015-02-10','','甲辰','0','');
	$dates[] = array('3','30','2015-03-30','1','5','2015-02-11','','乙巳','0','');
	$dates[] = array('3','31','2015-03-31','2','5','2015-02-12','','丙午','0','');
	$dates[] = array('4','1','2015-04-01','3','1','2015-02-13','','丁未','0','');
	$dates[] = array('4','2','2015-04-02','4','1','2015-02-14','','戊申','0','');
	$dates[] = array('4','3','2015-04-03','5','1','2015-02-15','','己酉','0','');
	$dates[] = array('4','4','2015-04-04','6','1','2015-02-16','','庚戌','0','');
	$dates[] = array('4','5','2015-04-05','0','2','2015-02-17','','辛亥','0','청명');
	$dates[] = array('4','6','2015-04-06','1','2','2015-02-18','','壬子','0','');
	$dates[] = array('4','7','2015-04-07','2','2','2015-02-19','','癸丑','0','');
	$dates[] = array('4','8','2015-04-08','3','2','2015-02-20','','甲寅','0','');
	$dates[] = array('4','9','2015-04-09','4','2','2015-02-21','','乙卯','0','');
	$dates[] = array('4','10','2015-04-10','5','2','2015-02-22','','丙辰','0','');
	$dates[] = array('4','11','2015-04-11','6','2','2015-02-23','','丁巳','0','');
	$dates[] = array('4','12','2015-04-12','0','3','2015-02-24','','戊午','0','');
	$dates[] = array('4','13','2015-04-13','1','3','2015-02-25','','己未','0','');
	$dates[] = array('4','14','2015-04-14','2','3','2015-02-26','','庚申','0','');
	$dates[] = array('4','15','2015-04-15','3','3','2015-02-27','','辛酉','0','');
	$dates[] = array('4','16','2015-04-16','4','3','2015-02-28','','壬戌','0','');
	$dates[] = array('4','17','2015-04-17','5','3','0000-00-00','','癸亥','0','');
	$dates[] = array('4','18','2015-04-18','6','3','0000-00-00','','<font color=','0','');
	$dates[] = array('4','19','2015-04-19','0','4','2015-03-01','','乙丑','0','');
	$dates[] = array('4','20','2015-04-20','1','4','2015-03-02','','丙寅','0','곡우');
	$dates[] = array('4','21','2015-04-21','2','4','2015-03-03','','丁卯','0','');
	$dates[] = array('4','22','2015-04-22','3','4','2015-03-04','','戊辰','0','');
	$dates[] = array('4','23','2015-04-23','4','4','2015-03-05','','己巳','0','');
	$dates[] = array('4','24','2015-04-24','5','4','2015-03-06','','庚午','0','');
	$dates[] = array('4','25','2015-04-25','6','4','2015-03-07','','辛未','0','');
	$dates[] = array('4','26','2015-04-26','0','5','2015-03-08','','壬申','0','');
	$dates[] = array('4','27','2015-04-27','1','5','2015-03-09','','癸酉','0','');
	$dates[] = array('4','28','2015-04-28','2','5','2015-03-10','','甲戌','0','');
	$dates[] = array('4','29','2015-04-29','3','5','2015-03-11','','乙亥','0','');
	$dates[] = array('4','30','2015-04-30','4','5','2015-03-12','','丙子','0','');
	$dates[] = array('5','1','2015-05-01','5','1','2015-03-13','','丁丑','0','');
	$dates[] = array('5','2','2015-05-02','6','1','2015-03-14','','戊寅','0','');
	$dates[] = array('5','3','2015-05-03','0','2','2015-03-15','','己卯','0','');
	$dates[] = array('5','4','2015-05-04','1','2','2015-03-16','','庚辰','0','');
	$dates[] = array('5','5','2015-05-05','2','2','2015-03-17','','辛巳','0','');
	$dates[] = array('5','6','2015-05-06','3','2','2015-03-18','','壬午','0','입하');
	$dates[] = array('5','7','2015-05-07','4','2','2015-03-19','','癸未','0','');
	$dates[] = array('5','8','2015-05-08','5','2','2015-03-20','','甲申','0','');
	$dates[] = array('5','9','2015-05-09','6','2','2015-03-21','','乙酉','0','');
	$dates[] = array('5','10','2015-05-10','0','3','2015-03-22','','丙戌','0','');
	$dates[] = array('5','11','2015-05-11','1','3','2015-03-23','','丁亥','0','');
	$dates[] = array('5','12','2015-05-12','2','3','2015-03-24','','戊子','0','');
	$dates[] = array('5','13','2015-05-13','3','3','2015-03-25','','己丑','0','');
	$dates[] = array('5','14','2015-05-14','4','3','2015-03-26','','庚寅','0','');
	$dates[] = array('5','15','2015-05-15','5','3','2015-03-27','','辛卯','0','');
	$dates[] = array('5','16','2015-05-16','6','3','2015-03-28','','壬辰','0','');
	$dates[] = array('5','17','2015-05-17','0','4','2015-03-29','','癸巳','0','');
	$dates[] = array('5','18','2015-05-18','1','4','2015-04-01','','甲午','0','');
	$dates[] = array('5','19','2015-05-19','2','4','2015-04-02','','乙未','0','');
	$dates[] = array('5','20','2015-05-20','3','4','2015-04-03','','丙申','0','');
	$dates[] = array('5','21','2015-05-21','4','4','2015-04-04','','丁酉','0','소만');
	$dates[] = array('5','22','2015-05-22','5','4','2015-04-05','','戊戌','0','');
	$dates[] = array('5','23','2015-05-23','6','4','2015-04-06','','己亥','0','');
	$dates[] = array('5','24','2015-05-24','0','5','2015-04-07','','庚子','0','');
	$dates[] = array('5','25','2015-05-25','1','5','2015-04-08','','辛丑','0','');
	$dates[] = array('5','26','2015-05-26','2','5','2015-04-09','','壬寅','0','');
	$dates[] = array('5','27','2015-05-27','3','5','2015-04-10','','癸卯','0','');
	$dates[] = array('5','28','2015-05-28','4','5','2015-04-11','','甲辰','0','');
	$dates[] = array('5','29','2015-05-29','5','5','2015-04-12','','乙巳','0','');
	$dates[] = array('5','30','2015-05-30','6','5','2015-04-13','','丙午','0','');
	$dates[] = array('5','31','2015-05-31','0','6','2015-04-14','','丁未','0','');
	$dates[] = array('6','1','2015-06-01','1','1','2015-04-15','','戊申','0','');
	$dates[] = array('6','2','2015-06-02','2','1','2015-04-16','','己酉','0','');
	$dates[] = array('6','3','2015-06-03','3','1','2015-04-17','','庚戌','0','');
	$dates[] = array('6','4','2015-06-04','4','1','2015-04-18','','辛亥','0','');
	$dates[] = array('6','5','2015-06-05','5','1','2015-04-19','','壬子','0','');
	$dates[] = array('6','6','2015-06-06','6','1','2015-04-20','','癸丑','0','망종');
	$dates[] = array('6','7','2015-06-07','0','2','2015-04-21','','甲寅','0','');
	$dates[] = array('6','8','2015-06-08','1','2','2015-04-22','','乙卯','0','');
	$dates[] = array('6','9','2015-06-09','2','2','2015-04-23','','丙辰','0','');
	$dates[] = array('6','10','2015-06-10','3','2','2015-04-24','','丁巳','0','');
	$dates[] = array('6','11','2015-06-11','4','2','2015-04-25','','戊午','0','');
	$dates[] = array('6','12','2015-06-12','5','2','2015-04-26','','己未','0','');
	$dates[] = array('6','13','2015-06-13','6','2','2015-04-27','','庚申','0','');
	$dates[] = array('6','14','2015-06-14','0','3','2015-04-28','','辛酉','0','');
	$dates[] = array('6','15','2015-06-15','1','3','2015-04-29','','壬戌','0','');
	$dates[] = array('6','16','2015-06-16','2','3','2015-05-01','','癸亥','0','');
	$dates[] = array('6','17','2015-06-17','3','3','2015-05-02','','<font color=','0','');
	$dates[] = array('6','18','2015-06-18','4','3','2015-05-03','','乙丑','0','');
	$dates[] = array('6','19','2015-06-19','5','3','2015-05-04','','丙寅','0','');
	$dates[] = array('6','20','2015-06-20','6','3','2015-05-05','','丁卯','0','');
	$dates[] = array('6','21','2015-06-21','0','4','2015-05-06','','戊辰','0','');
	$dates[] = array('6','22','2015-06-22','1','4','2015-05-07','','己巳','0','하지');
	$dates[] = array('6','23','2015-06-23','2','4','2015-05-08','','庚午','0','');
	$dates[] = array('6','24','2015-06-24','3','4','2015-05-09','','辛未','0','');
	$dates[] = array('6','25','2015-06-25','4','4','2015-05-10','','壬申','0','');
	$dates[] = array('6','26','2015-06-26','5','4','2015-05-11','','癸酉','0','');
	$dates[] = array('6','27','2015-06-27','6','4','2015-05-12','','甲戌','0','');
	$dates[] = array('6','28','2015-06-28','0','5','2015-05-13','','乙亥','0','');
	$dates[] = array('6','29','2015-06-29','1','5','2015-05-14','','丙子','0','');
	$dates[] = array('6','30','2015-06-30','2','5','2015-05-15','','丁丑','0','');
	$dates[] = array('7','1','2015-07-01','3','1','2015-05-16','','戊寅','0','');
	$dates[] = array('7','2','2015-07-02','4','1','2015-05-17','','己卯','0','');
	$dates[] = array('7','3','2015-07-03','5','1','2015-05-18','','庚辰','0','');
	$dates[] = array('7','4','2015-07-04','6','1','2015-05-19','','辛巳','0','');
	$dates[] = array('7','5','2015-07-05','0','2','2015-05-20','','壬午','0','');
	$dates[] = array('7','6','2015-07-06','1','2','2015-05-21','','癸未','0','');
	$dates[] = array('7','7','2015-07-07','2','2','2015-05-22','','甲申','0','소서');
	$dates[] = array('7','8','2015-07-08','3','2','2015-05-23','','乙酉','0','');
	$dates[] = array('7','9','2015-07-09','4','2','2015-05-24','','丙戌','0','');
	$dates[] = array('7','10','2015-07-10','5','2','2015-05-25','','丁亥','0','');
	$dates[] = array('7','11','2015-07-11','6','2','2015-05-26','','戊子','0','');
	$dates[] = array('7','12','2015-07-12','0','3','2015-05-27','','己丑','0','');
	$dates[] = array('7','13','2015-07-13','1','3','2015-05-28','','庚寅','0','');
	$dates[] = array('7','14','2015-07-14','2','3','2015-05-29','','辛卯','0','');
	$dates[] = array('7','15','2015-07-15','3','3','2015-05-30','','壬辰','0','');
	$dates[] = array('7','16','2015-07-16','4','3','2015-06-01','','癸巳','0','');
	$dates[] = array('7','17','2015-07-17','5','3','2015-06-02','','甲午','0','');
	$dates[] = array('7','18','2015-07-18','6','3','2015-06-03','','乙未','0','');
	$dates[] = array('7','19','2015-07-19','0','4','2015-06-04','','丙申','0','');
	$dates[] = array('7','20','2015-07-20','1','4','2015-06-05','','丁酉','0','');
	$dates[] = array('7','21','2015-07-21','2','4','2015-06-06','','戊戌','0','');
	$dates[] = array('7','22','2015-07-22','3','4','2015-06-07','','己亥','0','');
	$dates[] = array('7','23','2015-07-23','4','4','2015-06-08','','庚子','0','대서');
	$dates[] = array('7','24','2015-07-24','5','4','2015-06-09','','辛丑','0','');
	$dates[] = array('7','25','2015-07-25','6','4','2015-06-10','','壬寅','0','');
	$dates[] = array('7','26','2015-07-26','0','5','2015-06-11','','癸卯','0','');
	$dates[] = array('7','27','2015-07-27','1','5','2015-06-12','','甲辰','0','');
	$dates[] = array('7','28','2015-07-28','2','5','2015-06-13','','乙巳','0','');
	$dates[] = array('7','29','2015-07-29','3','5','2015-06-14','','丙午','0','');
	$dates[] = array('7','30','2015-07-30','4','5','2015-06-15','','丁未','0','');
	$dates[] = array('7','31','2015-07-31','5','5','2015-06-16','','戊申','0','');
	$dates[] = array('8','1','2015-08-01','6','1','2015-06-17','','己酉','0','');
	$dates[] = array('8','2','2015-08-02','0','2','2015-06-18','','庚戌','0','');
	$dates[] = array('8','3','2015-08-03','1','2','2015-06-19','','辛亥','0','');
	$dates[] = array('8','4','2015-08-04','2','2','2015-06-20','','壬子','0','');
	$dates[] = array('8','5','2015-08-05','3','2','2015-06-21','','癸丑','0','');
	$dates[] = array('8','6','2015-08-06','4','2','2015-06-22','','甲寅','0','');
	$dates[] = array('8','7','2015-08-07','5','2','2015-06-23','','乙卯','0','');
	$dates[] = array('8','8','2015-08-08','6','2','2015-06-24','','丙辰','0','입추');
	$dates[] = array('8','9','2015-08-09','0','3','2015-06-25','','丁巳','0','');
	$dates[] = array('8','10','2015-08-10','1','3','2015-06-26','','戊午','0','');
	$dates[] = array('8','11','2015-08-11','2','3','2015-06-27','','己未','0','');
	$dates[] = array('8','12','2015-08-12','3','3','2015-06-28','','庚申','0','');
	$dates[] = array('8','13','2015-08-13','4','3','2015-06-29','','辛酉','0','');
	$dates[] = array('8','14','2015-08-14','5','3','2015-06-30','','壬戌','0','');
	$dates[] = array('8','15','2015-08-15','6','3','2015-07-01','','癸亥','0','');
	$dates[] = array('8','16','2015-08-16','0','4','2015-07-02','','<font color=','0','');
	$dates[] = array('8','17','2015-08-17','1','4','2015-07-03','','乙丑','0','');
	$dates[] = array('8','18','2015-08-18','2','4','2015-07-04','','丙寅','0','');
	$dates[] = array('8','19','2015-08-19','3','4','2015-07-05','','丁卯','0','');
	$dates[] = array('8','20','2015-08-20','4','4','2015-07-06','','戊辰','0','');
	$dates[] = array('8','21','2015-08-21','5','4','2015-07-07','','己巳','0','');
	$dates[] = array('8','22','2015-08-22','6','4','2015-07-08','','庚午','0','');
	$dates[] = array('8','23','2015-08-23','0','5','2015-07-09','','辛未','0','처서');
	$dates[] = array('8','24','2015-08-24','1','5','2015-07-10','','壬申','0','');
	$dates[] = array('8','25','2015-08-25','2','5','2015-07-11','','癸酉','0','');
	$dates[] = array('8','26','2015-08-26','3','5','2015-07-12','','甲戌','0','');
	$dates[] = array('8','27','2015-08-27','4','5','2015-07-13','','乙亥','0','');
	$dates[] = array('8','28','2015-08-28','5','5','2015-07-14','','丙子','0','');
	$dates[] = array('8','29','2015-08-29','6','5','2015-07-15','','丁丑','0','');
	$dates[] = array('8','30','2015-08-30','0','6','2015-07-16','','戊寅','0','');
	$dates[] = array('8','31','2015-08-31','1','6','2015-07-17','','己卯','0','');
	$dates[] = array('9','1','2015-09-01','2','1','2015-07-18','','庚辰','0','');
	$dates[] = array('9','2','2015-09-02','3','1','2015-07-19','','辛巳','0','');
	$dates[] = array('9','3','2015-09-03','4','1','2015-07-20','','壬午','0','');
	$dates[] = array('9','4','2015-09-04','5','1','2015-07-21','','癸未','0','');
	$dates[] = array('9','5','2015-09-05','6','1','2015-07-22','','甲申','0','');
	$dates[] = array('9','6','2015-09-06','0','2','2015-07-23','','乙酉','0','');
	$dates[] = array('9','7','2015-09-07','1','2','2015-07-24','','丙戌','0','');
	$dates[] = array('9','8','2015-09-08','2','2','2015-07-25','','丁亥','0','백로');
	$dates[] = array('9','9','2015-09-09','3','2','2015-07-26','','戊子','0','');
	$dates[] = array('9','10','2015-09-10','4','2','2015-07-27','','己丑','0','');
	$dates[] = array('9','11','2015-09-11','5','2','2015-07-28','','庚寅','0','');
	$dates[] = array('9','12','2015-09-12','6','2','2015-07-29','','辛卯','0','');
	$dates[] = array('9','13','2015-09-13','0','3','2015-08-01','','壬辰','0','');
	$dates[] = array('9','14','2015-09-14','1','3','2015-08-02','','癸巳','0','');
	$dates[] = array('9','15','2015-09-15','2','3','2015-08-03','','甲午','0','');
	$dates[] = array('9','16','2015-09-16','3','3','2015-08-04','','乙未','0','');
	$dates[] = array('9','17','2015-09-17','4','3','2015-08-05','','丙申','0','');
	$dates[] = array('9','18','2015-09-18','5','3','2015-08-06','','丁酉','0','');
	$dates[] = array('9','19','2015-09-19','6','3','2015-08-07','','戊戌','0','');
	$dates[] = array('9','20','2015-09-20','0','4','2015-08-08','','己亥','0','');
	$dates[] = array('9','21','2015-09-21','1','4','2015-08-09','','庚子','0','');
	$dates[] = array('9','22','2015-09-22','2','4','2015-08-10','','辛丑','0','');
	$dates[] = array('9','23','2015-09-23','3','4','2015-08-11','','壬寅','0','추분');
	$dates[] = array('9','24','2015-09-24','4','4','2015-08-12','','癸卯','0','');
	$dates[] = array('9','25','2015-09-25','5','4','2015-08-13','','甲辰','0','');
	$dates[] = array('9','26','2015-09-26','6','4','2015-08-14','','乙巳','0','');
	$dates[] = array('9','27','2015-09-27','0','5','2015-08-15','','丙午','0','');
	$dates[] = array('9','28','2015-09-28','1','5','2015-08-16','','丁未','0','');
	$dates[] = array('9','29','2015-09-29','2','5','2015-08-17','','戊申','0','');
	$dates[] = array('9','30','2015-09-30','3','5','2015-08-18','','己酉','0','');
	$dates[] = array('10','1','2015-10-01','4','1','2015-08-19','','庚戌','0','');
	$dates[] = array('10','2','2015-10-02','5','1','2015-08-20','','辛亥','0','');
	$dates[] = array('10','3','2015-10-03','6','1','2015-08-21','','壬子','0','');
	$dates[] = array('10','4','2015-10-04','0','2','2015-08-22','','癸丑','0','');
	$dates[] = array('10','5','2015-10-05','1','2','2015-08-23','','甲寅','0','');
	$dates[] = array('10','6','2015-10-06','2','2','2015-08-24','','乙卯','0','');
	$dates[] = array('10','7','2015-10-07','3','2','2015-08-25','','丙辰','0','');
	$dates[] = array('10','8','2015-10-08','4','2','2015-08-26','','丁巳','0','한로');
	$dates[] = array('10','9','2015-10-09','5','2','2015-08-27','','戊午','0','');
	$dates[] = array('10','10','2015-10-10','6','2','2015-08-28','','己未','0','');
	$dates[] = array('10','11','2015-10-11','0','3','2015-08-29','','庚申','0','');
	$dates[] = array('10','12','2015-10-12','1','3','2015-08-30','','辛酉','0','');
	$dates[] = array('10','13','2015-10-13','2','3','2015-09-01','','壬戌','0','');
	$dates[] = array('10','14','2015-10-14','3','3','2015-09-02','','癸亥','0','');
	$dates[] = array('10','15','2015-10-15','4','3','2015-09-03','','<font color=','0','');
	$dates[] = array('10','16','2015-10-16','5','3','2015-09-04','','乙丑','0','');
	$dates[] = array('10','17','2015-10-17','6','3','2015-09-05','','丙寅','0','');
	$dates[] = array('10','18','2015-10-18','0','4','2015-09-06','','丁卯','0','');
	$dates[] = array('10','19','2015-10-19','1','4','2015-09-07','','戊辰','0','');
	$dates[] = array('10','20','2015-10-20','2','4','2015-09-08','','己巳','0','');
	$dates[] = array('10','21','2015-10-21','3','4','2015-09-09','','庚午','0','');
	$dates[] = array('10','22','2015-10-22','4','4','2015-09-10','','辛未','0','');
	$dates[] = array('10','23','2015-10-23','5','4','2015-09-11','','壬申','0','');
	$dates[] = array('10','24','2015-10-24','6','4','2015-09-12','','癸酉','0','상강');
	$dates[] = array('10','25','2015-10-25','0','5','2015-09-13','','甲戌','0','');
	$dates[] = array('10','26','2015-10-26','1','5','2015-09-14','','乙亥','0','');
	$dates[] = array('10','27','2015-10-27','2','5','2015-09-15','','丙子','0','');
	$dates[] = array('10','28','2015-10-28','3','5','2015-09-16','','丁丑','0','');
	$dates[] = array('10','29','2015-10-29','4','5','2015-09-17','','戊寅','0','');
	$dates[] = array('10','30','2015-10-30','5','5','2015-09-18','','己卯','0','');
	$dates[] = array('10','31','2015-10-31','6','5','2015-09-19','','庚辰','0','');
	$dates[] = array('11','1','2015-11-01','0','1','2015-09-20','','辛巳','0','');
	$dates[] = array('11','2','2015-11-02','1','1','2015-09-21','','壬午','0','');
	$dates[] = array('11','3','2015-11-03','2','1','2015-09-22','','癸未','0','');
	$dates[] = array('11','4','2015-11-04','3','1','2015-09-23','','甲申','0','');
	$dates[] = array('11','5','2015-11-05','4','1','2015-09-24','','乙酉','0','');
	$dates[] = array('11','6','2015-11-06','5','1','2015-09-25','','丙戌','0','');
	$dates[] = array('11','7','2015-11-07','6','1','2015-09-26','','丁亥','0','');
	$dates[] = array('11','8','2015-11-08','0','2','2015-09-27','','戊子','0','입동');
	$dates[] = array('11','9','2015-11-09','1','2','2015-09-28','','己丑','0','');
	$dates[] = array('11','10','2015-11-10','2','2','2015-09-29','','庚寅','0','');
	$dates[] = array('11','11','2015-11-11','3','2','2015-09-30','','辛卯','0','');
	$dates[] = array('11','12','2015-11-12','4','2','2015-10-01','','壬辰','0','');
	$dates[] = array('11','13','2015-11-13','5','2','2015-10-02','','癸巳','0','');
	$dates[] = array('11','14','2015-11-14','6','2','2015-10-03','','甲午','0','');
	$dates[] = array('11','15','2015-11-15','0','3','2015-10-04','','乙未','0','');
	$dates[] = array('11','16','2015-11-16','1','3','2015-10-05','','丙申','0','');
	$dates[] = array('11','17','2015-11-17','2','3','2015-10-06','','丁酉','0','');
	$dates[] = array('11','18','2015-11-18','3','3','2015-10-07','','戊戌','0','');
	$dates[] = array('11','19','2015-11-19','4','3','2015-10-08','','己亥','0','');
	$dates[] = array('11','20','2015-11-20','5','3','2015-10-09','','庚子','0','');
	$dates[] = array('11','21','2015-11-21','6','3','2015-10-10','','辛丑','0','');
	$dates[] = array('11','22','2015-11-22','0','4','2015-10-11','','壬寅','0','');
	$dates[] = array('11','23','2015-11-23','1','4','2015-10-12','','癸卯','0','소설');
	$dates[] = array('11','24','2015-11-24','2','4','2015-10-13','','甲辰','0','');
	$dates[] = array('11','25','2015-11-25','3','4','2015-10-14','','乙巳','0','');
	$dates[] = array('11','26','2015-11-26','4','4','2015-10-15','','丙午','0','');
	$dates[] = array('11','27','2015-11-27','5','4','2015-10-16','','丁未','0','');
	$dates[] = array('11','28','2015-11-28','6','4','2015-10-17','','戊申','0','');
	$dates[] = array('11','29','2015-11-29','0','5','2015-10-18','','己酉','0','');
	$dates[] = array('11','30','2015-11-30','1','5','2015-10-19','','庚戌','0','');
	$dates[] = array('12','1','2015-12-01','2','1','2015-10-20','','辛亥','0','');
	$dates[] = array('12','2','2015-12-02','3','1','2015-10-21','','壬子','0','');
	$dates[] = array('12','3','2015-12-03','4','1','2015-10-22','','癸丑','0','');
	$dates[] = array('12','4','2015-12-04','5','1','2015-10-23','','甲寅','0','');
	$dates[] = array('12','5','2015-12-05','6','1','2015-10-24','','乙卯','0','');
	$dates[] = array('12','6','2015-12-06','0','2','2015-10-25','','丙辰','0','');
	$dates[] = array('12','7','2015-12-07','1','2','2015-10-26','','丁巳','0','대설');
	$dates[] = array('12','8','2015-12-08','2','2','2015-10-27','','戊午','0','');
	$dates[] = array('12','9','2015-12-09','3','2','2015-10-28','','己未','0','');
	$dates[] = array('12','10','2015-12-10','4','2','2015-10-29','','庚申','0','');
	$dates[] = array('12','11','2015-12-11','5','2','2015-11-01','','辛酉','0','');
	$dates[] = array('12','12','2015-12-12','6','2','2015-11-02','','壬戌','0','');
	$dates[] = array('12','13','2015-12-13','0','3','2015-11-03','','癸亥','0','');
	$dates[] = array('12','14','2015-12-14','1','3','2015-11-04','','<font color=','0','');
	$dates[] = array('12','15','2015-12-15','2','3','2015-11-05','','乙丑','0','');
	$dates[] = array('12','16','2015-12-16','3','3','2015-11-06','','丙寅','0','');
	$dates[] = array('12','17','2015-12-17','4','3','2015-11-07','','丁卯','0','');
	$dates[] = array('12','18','2015-12-18','5','3','2015-11-08','','戊辰','0','');
	$dates[] = array('12','19','2015-12-19','6','3','2015-11-09','','己巳','0','');
	$dates[] = array('12','20','2015-12-20','0','4','2015-11-10','','庚午','0','');
	$dates[] = array('12','21','2015-12-21','1','4','2015-11-11','','辛未','0','');
	$dates[] = array('12','22','2015-12-22','2','4','2015-11-12','','壬申','0','동지');
	$dates[] = array('12','23','2015-12-23','3','4','2015-11-13','','癸酉','0','');
	$dates[] = array('12','24','2015-12-24','4','4','2015-11-14','','甲戌','0','');
	$dates[] = array('12','25','2015-12-25','5','4','2015-11-15','','乙亥','1','');
	$dates[] = array('12','26','2015-12-26','6','4','2015-11-16','','丙子','0','');
	$dates[] = array('12','27','2015-12-27','0','5','2015-11-17','','丁丑','0','');
	$dates[] = array('12','28','2015-12-28','1','5','2015-11-18','','戊寅','0','');
	$dates[] = array('12','29','2015-12-29','2','5','2015-11-19','','己卯','0','');
	$dates[] = array('12','30','2015-12-30','3','5','2015-11-20','','庚辰','0','');
	$dates[] = array('12','31','2015-12-31','4','5','2015-11-21','','辛巳','0','');

	#########################################################
	# 끝 => 날짜__2014년
	#########################################################


?>