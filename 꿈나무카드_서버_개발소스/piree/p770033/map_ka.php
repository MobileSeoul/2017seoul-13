<?php

/*
===========================================================

	프로젝트 이름 : 피리 웹프로그램 - 피리 맵 페이지 PLUS G5

	만든사람 : 피리 PIREE

	홈페이지 : http://www.piree.co.kr

	작성날짜 : 2016년 01월 24일 일요일 오전 06시 34분 - 날씨 추워, 추워!! 너무 추워!!

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
  # 시작 => 선처리
  #########################################################

  //=======================================================
  // 그누보드5__기본_파일__첨부
	include_once('./_common.php');


  //=======================================================
  // 

  #########################################################
  # 끝 => 선처리
  #########################################################



  #########################################################
  # 시작 => 설정
  #########################################################

  //=======================================================
  // 


  //=======================================================
  // 

  #########################################################
  # 끝 => 설정
  #########################################################



	#########################################################
	# 시작 => 피리_맵_페이지__설정_정보_파일__첨부
	#########################################################

	//=======================================================
	// 피리_메뉴__번호
	$piree_menu_n = 770033;


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
	// 피리_맵_페이지__설정_정보_파일__경로
	include_once( get__sam_file($piree_menu_n, 'config', 'path') );

	#########################################################
	# 끝 => 피리_맵_페이지__설정_정보_파일__첨부
	#########################################################



  #########################################################
  # 시작 => 지도_중앙_좌표
  #########################################################

  //=======================================================
  // 지도_중앙_좌표
  $center_lat = trim($_GET['center_lat']);
  $center_lng = trim($_GET['center_lng']);

  #########################################################
  # 끝 => 지도_중앙_좌표
  #########################################################



  #########################################################
  # 시작 => 지도__관련__처리
  #########################################################

  //=======================================================
  // 시작 => 게시글_번호__유무
  IF ( $wr_id > 0 )
  {

			//===================================================
			// 시작 => 지도_중앙__좌표__없으면
  		IF ( !$center_lat )													$center_lat = $write['wr_lat'];
  		IF ( !$center_lng )													$center_lng = $write['wr_lng'];

  }
  ELSE
  {

			//===================================================
			// 시작 => 지도_중앙__좌표__없으면
  		IF ( !$center_lat )													$center_lat = $p770033__map_start_point_lat;
  		IF ( !$center_lng )													$center_lng = $p770033__map_start_point_lng;

  }
  // 끝 => 게시글_번호__유무
  //=======================================================


  //=======================================================
  // 시작 => 지도_중앙__좌표__없으면
  IF ( !$center_lng )															$center_lng = 126.98213209999994;
  IF ( !$center_lat )															$center_lat = 37.560981;

  #########################################################
  # 끝 => 지도__관련__처리
  #########################################################



  #########################################################
  # 시작 => JS_소스__직접보기__방지
  # 시작 => MAP_JS_SOSS_HIDDEN
  #########################################################

  //=======================================================
  // 지도_자바스크립트_링크
  $map_ka_link  = $p770033__prog_u ."map_ka.js.php?";
  $map_ka_link .= "center_lat=". $center_lat ."&";
  $map_ka_link .= "center_lng=". $center_lng ."&";
  $map_ka_link .= "bo_table=". $bo_table ."&";
  $map_ka_link .= "wr_id=". $wr_id;

  #########################################################
  # 끝 => JS_소스__직접보기__방지
  # 끝 => MAP_JS_SOSS_HIDDEN
  #########################################################



  #########################################################
  # 시작 => 보여주기
  #########################################################

  //=======================================================
  // 상단__보여주기
  include_once(G5_PATH.'/head.sub.php');


  //=======================================================
  // add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
	add_stylesheet('<link rel="stylesheet" href="'. get__sam_file($piree_menu_n, 'map_ka.css', 'url') .'">', 11);


/*
	* PIREE_SOSS
	* 피리 PIREE
	* 2016년 11월 25일 금요일 오전 06시 31분 - 날씨 추워
	* 클러스터링 기능을 사용하기 여부
*/

	//=======================================================
	// 시작 => 클러스터링_기능__사용하기_이면
	IF ( $p770033__clustering_use_n == 1 )
	{
			add_javascript('<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">"></script>', 14);
	}
	// 끝 => 클러스터링_기능__사용하기_이면
	//=======================================================


  //=======================================================
	// 시작 => 지역__여부
	IF ( $p770033__map_view_area )
	{
			add_javascript('<script type="text/javascript" src="https://maps.google.com/maps/api/js?v=3.exp&libraries=places&sensor=true&key=AIzaSyAI3MsIElGhtIJfuhCHHL1YgBraFVqPnAc&region='. $p770033__map_view_area .'"></script>', 17);
	}
	ELSE
	{
			add_javascript('<script type="text/javascript" src="https://maps.google.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyAI3MsIElGhtIJfuhCHHL1YgBraFVqPnAc&sensor=true"></script>', 17);
	}
	// 끝 => 지역__여부
  //=======================================================

  #########################################################
  # 끝 => 보여주기
  #########################################################
?>
<script src="https://cdn.klokantech.com/maptilerlayer/v1/index.js"></script>


	<div id="map_view" style="width: 100%; height:100%;"></div>

	
	<div id="box_wrap">


	<input id="pac-input" class="controls" type="text" placeholder="동명을 입력해주세요.">
			

	</div>


<?
  #########################################################
  # 시작 => STYLE
  #########################################################

  //=======================================================
  // 패널_크기
  $penel_size_style = "";


  //=======================================================
	// 시작 => 패널_크기__있으면
	IF ( $p770033__panel_size_w || $p770033__panel_size_h )
	{

  		//===================================================
  		// 패널_크기
  		$penel_size_style = " style=\"";


  		//===================================================
  		// 시작 => 패널_크기_가로__있으면
  		IF ( $p770033__panel_size_w > 0 )
  		{
  				//===============================================
  				// 패널_크기
  				$penel_size_style .= "width:". $p770033__panel_size_w ."px !important;";
  		}
  		// 끝 => 패널_크기_가로__있으면
  		//===================================================


  		//===================================================
  		// 시작 => 패널_크기_세로__있으면
  		IF ( $p770033__panel_size_h > 0 )
  		{
  				//===============================================
  				// 패널_크기
  				$penel_size_style .= "height:". $p770033__panel_size_h ."px !important;";
  		}
  		// 끝 => 패널_크기_세로__있으면
  		//===================================================


  		//===================================================
  		// 패널_크기
  		$penel_size_style .= "\"";

	}
	// 끝 => 패널_크기__있으면
  //=======================================================

  #########################################################
  # 끝 => STYLE
  #########################################################


?>





	<script type="text/javascript" src="<?php echo $map_ka_link; ?>"></script>


<?php

  //=======================================================
  // TAIL__불러오기
  include_once(G5_PATH.'/tail.sub.php');

?>