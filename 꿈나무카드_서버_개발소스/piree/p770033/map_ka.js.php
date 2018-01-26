

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
  # 시작 => 왼쪽__패널
  #########################################################

?>
/*
Author     : Dave Earley
Author Url : http://Dave-Earley.com
Date       : 20th March 2010
*/
	$(document).ready(function() {
<?php

/*
	* PIREE_SOSS
	* 피리 PIREE
	* 2016년 11월 25일 금요일 오전 05시 55분 - 날씨 추워
	* 지도 로드시 오른쪽 패널을 보여주기 여부
*/

	//=======================================================
	// 시작 => 지도_로드시_오른쪽_패널__보여주기_아니면
	IF ( $p770033__panel_load_view_n != 1 )
	{
?>

<?php
	}
	// 끝 => 지도_로드시_오른쪽_패널__보여주기_아니면
	//=======================================================

?>
			$("#box_main").show();
			$('#box_link').toggle(

			function() {
					$('#box_main').hide( function() {
					    $('#box_main').animate({
					        width: '0'
					    }, 100);
					});
						$('#box_img').attr("src", "<?php echo $p770033__prog_u; ?>img/button/button_pannel_open__26_26.png");
			},

			function() {
					$('#box_main').animate({
					    width: '350'
					}, 800, function() {
					    $('#box_main').show();
					    $('#box_img').attr("src", "<?php echo $p770033__prog_u; ?>img/button/button_pannel_close__26_26.png");
					});
			});


			//===================================================
			// 결과창__높이
			$('#box_main').height( $(window).height()-52 );
			$('#article_list').height( $('#box_main').height()-10 );

	});

<?php

  #########################################################
  # 끝 => 왼쪽__패널
  #########################################################



  #########################################################
  # 시작 => 지도__관련
  #########################################################

  		#####################################################
  		# 시작 => QUERY_STRING
  		#####################################################

  		//===================================================
  		// QUERY_STRING
			$bo_table		= trim($_GET['bo_table']);
			$wr_id			= trim($_GET['wr_id']);
			$center_lat	= trim($_GET['center_lat']);
			$center_lng	= trim($_GET['center_lng']);

  		#####################################################
  		# 끝 => QUERY_STRING
  		#####################################################



  		#####################################################
  		# 시작 => 지도__관련__처리
  		#####################################################

  		//===================================================
  		// 시작 => 지도_중앙__좌표__없으면
  		IF ( !$center_lat )													$center_lat = $p770033__map_start_point_lat;
  		IF ( !$center_lng )													$center_lng = $p770033__map_start_point_lng;


  		//===================================================
  		// 현재_위치__사용_여부
  		$point_here_use = 0;


  		//===================================================
  		// 시작 => 현재_위치__사용_이면
  		IF ( $p770033__now_here_point == 1 )
  		{

					//===============================================
					// 시작 => 게시글_번호__없으면
					IF ( !$wr_id || !isset($wr_id) || $wr_id < 1 )
					{

							//===========================================
							// 현재_위치__사용_여부
							$point_here_use = 1;

					}
					// 끝 => 게시글_번호__없으면
					//===============================================

  		}
  		// 끝 => 현재_위치__사용_이면
  		//===================================================

  		#####################################################
  		# 끝 => 지도__관련__처리
  		#####################################################



  		#####################################################
  		# 시작 => 지도__보여주기
  		#####################################################

?>

  		// 지도
  		var map;

  		var idle_count = 0;

  		// 마커_배열
  		var markers = [];

  		// 마커_내용_배열
  		var marker_cont = [];

  		var info_window = new google.maps.InfoWindow();

  		var marker, i;

  		var link_head_s = '<?php echo G5_BBS_URL; ?>/board.php?bo_table=<?php echo $bo_table; ?>&wr_id=';

  		var image_d_c = '<?php echo $p770033__prog_u; ?>img/marker/cyan_num_23_43/';
  		var image_d_r = '<?php echo $p770033__prog_u; ?>img/marker/red_num_29_46/';




  		//###################################################
  		// 시작 => JQUERY
  		jQuery(document).ready(function()
  		{

  				//===============================================
  				// 지도__로드
  				google.maps.event.addDomListener(window, 'load', initialize);


  				//###############################################
  				//## 시작 => 지도__초기화_하기
  				function initialize()
  				{

  						//===========================================
  						// 시작 => 지도_노출용_레이어__있으면
  						if($("#map_view").length)
  						{

  								var mapOptions = {								// 구글 맵 옵션 설정
  						        zoom : <?php echo $p770033__basic_zoom; ?>,										// 기본 확대율
  						        center : new google.maps.LatLng(<?php echo $center_lat; ?>, <?php echo $center_lng; ?>),	// 지도 중앙 위치
  						        scrollwheel : false,						// 마우스 휠로 확대 축소 사용 여부
  						        mapTypeControl : false,					// 맵 타입 컨트롤 사용 여부
  								maxZoom: 16,
								gestureHandling: 'greedy'
								};
							




  								map = new google.maps.Map(document.getElementById('map_view'), mapOptions);	//구글 맵을 사용할 타겟

if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

            infoWindow.setPosition(pos);
            infoWindow.setContent('Location found.');
            map.setCenter(pos);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        }

<?php

  								//=======================================
  								// 시작 => 현재_위치__사용_이면
  								IF ( $point_here_use == 1 )
  								{
?>
  										//===================================
  										// 시작 => Try_HTML5__geolocation
  										if ( navigator.geolocation )
  										{
  												navigator.geolocation.getCurrentPosition(function(position) {
  												var pos = {
  														lat: position.coords.latitude,
  														lng: position.coords.longitude
  												};

  														map.setCenter(pos);
  												});
  										}
  										// 끝 => Try_HTML5__geolocation
  										//===================================
<?php
  								}
  								// 끝 => 현재_위치__사용_이면
  								//=======================================

?>

  // Create the search box and link it to the UI element.
  var input = document.getElementById('pac-input');
  var searchBox = new google.maps.places.SearchBox(input);
  map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

  // Bias the SearchBox results towards current map's viewport.
  map.addListener('bounds_changed', function() {
    searchBox.setBounds(map.getBounds());
  });

  searchBox.addListener('places_changed', function() {
    var places = searchBox.getPlaces();

    if (places.length == 0) {
      return;
    }

    // For each place, get the icon, name and location.
    var bounds = new google.maps.LatLngBounds();
    places.forEach(function(place) {
      var icon = {
        url: place.icon,
        size: new google.maps.Size(71, 71),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(17, 34),
        scaledSize: new google.maps.Size(25, 25)
      };


      if (place.geometry.viewport) {
        // Only geocodes have viewport.
        bounds.union(place.geometry.viewport);
      } else {
        bounds.extend(place.geometry.location);
      }
    });
    map.fitBounds(bounds);
  });
  // [END region_getplaces]

  								//=======================================
  								// 리사이즈에_따른__마커_위치
  						    google.maps.event.addDomListener(window, 'resize', function()
  						    {
  						        var center = map.getCenter();
  						        google.maps.event.trigger(map, "resize");
  						        map.setCenter(center);
  						        get_local_data(map.getCenter(), 1);
  						    });


  						    google.maps.event.addListener(map, 'dragend', function()
  						    {
  						        get_local_data(map.getCenter(), 1);
  						    });


  						    google.maps.event.addListener(map, 'zoom_changed', function()
  						    {
  						        get_local_data(map.getCenter(), 1);
  						    });


  						    google.maps.event.addListener(map, 'idle', function()
  						    {
  						        if ( idle_count < 3 )
  						        {
  						        		get_local_data(map.getCenter(), 1);
  						        		idle_count++;
  						        }
  						    });

  						}
  						// 끝 => 지도_노출용_레이어__있으면
  						//===========================================

  				}
  				//## 끝 => 지도__초기화_하기
  				//###############################################




  				//###############################################
  				//## 시작 => 지역내_DATA__가져오기
  				function get_local_data(center, in_page)
  				{

  						//===========================================
  						// 지역내_DATA__지우기
  						clear_local_data();


  						//===========================================
  						// 지도_외곽_4지점_좌표__알아내기
  						var south = map.getBounds().getSouthWest();
  						var north = map.getBounds().getNorthEast();
  						var crd_lng_1 = south.lng();
  						var crd_lng_2 = north.lng();
  						var crd_lat_1 = south.lat();
  						var crd_lat_2 = north.lat();


  						//===========================================
  						// DATA__가져오는_URL
  						var get_data_url  = '<?php echo $p770033__prog_u; ?>map_ka.xml.php?';
  								get_data_url += 'center_lat=' + center.lat() + '&';
  								get_data_url += 'center_lng=' + center.lng() + '&';
  								get_data_url += 'crd_lng_1=' + crd_lng_1 + '&';
  								get_data_url += 'crd_lng_2=' + crd_lng_2 + '&';
  								get_data_url += 'crd_lat_1=' + crd_lat_1 + '&';
  								get_data_url += 'crd_lat_2=' + crd_lat_2 + '&';
  								get_data_url += 'page=' + in_page + '&';
  								get_data_url += 'bo_table=<?php echo $bo_table; ?>&';
  								get_data_url += 'wr_id=<?php echo $wr_id; ?>';
							<?php

  						//===========================================
  						// 시작 => 카테고리__있으면
  						IF ( $sca )  {  ?>
  								get_data_url += '&sca=' + encodeURI('<?php echo $sca; ?>')';
							<?php  }  ?>


  						//===========================================
  						// 시작 => DATA__다운로드_받기
  						data_download_url(get_data_url, function(data)
  						{

  								//=======================================
  								// 결과창__보여줄_HTML
  								var i_html = '';


  								//=======================================
  								// 결과창__보여줄_HTML
  								var r_html = '';


  								//=======================================
  								// 반복문_내__HTML
  								var l_html = '';


  								//=======================================
  								// XML_파일__읽기
  								var xml = parse_xml(data);


  								//=======================================
  								// 마커_노드
  								var markerNodes = xml.documentElement.getElementsByTagName("marker");


  								//=======================================
  								// 새_좌표
  								var bounds = new google.maps.LatLngBounds();


  								//=======================================
  								// 마커_순서
  								var marker_n = 0;


  								//=======================================
  								// 게시글_번호
  								var wr_id = 0;


  								//=======================================
  								// ROW__구분
  								var row_div = '';


  								//=======================================
  								// 이름
  								var subject = '';


  								//=======================================
  								// 주소
  								var address = '';


  								//=======================================
  								// 주소
  								var content = '';


  								//=======================================
  								// ZINDEX
  								var zindex = 0;

  								//=======================================
  								// 주소
  								var option = '';
  								//=======================================
  								// 좌표_선택__여부
  								var is_choice = 0;


  								//=======================================
  								// 패널에_이미지_URL
  								var panel_img_url = '';


  								//=======================================
  								// InfoWindow_이미지_URL
  								var infowin_limg_url = "";


  								//=======================================
  								// 마커_순서
  								var marker_loop = 0;


  								//=======================================
  								// ROW__값
  								var row_var = '';


  								//=======================================
  								// 기타값
  								var etc_var_1 = '';
  								var etc_var_2 = '';
  								var etc_var_3 = '';


  								//=======================================
  								// 시작 => 반복문____마커_수_만큼__돌리기
  								for (var i = 0; i < markerNodes.length; i++)
  								{

  										//===================================
  										// ROW__구분
  										row_div = markerNodes[i].getAttribute("r_d");


  										//===================================
  										// 시작 => ROW__구분
  										if ( row_div == 'mak' )
  										{

  												//###############################
  												//## 시작 => ROW__마커__이면

  												//===============================
  												// 마커_순서
  												marker_n = markerNodes[i].getAttribute("mk_n");


  												//===============================
  												// 게시글_번호
  												wr_id = markerNodes[i].getAttribute("wr_id");


  												//===============================
  												// 이름
  												subject = markerNodes[i].getAttribute("subject");


  												//===============================
  												// 주소
  												address = markerNodes[i].getAttribute("address");

  												//===============================
  												// 내용
  												content = markerNodes[i].getAttribute("content");

												//===============================
  												// 내용
  												option = markerNodes[i].getAttribute("option");

  												//===============================
  												// ZINDEX
  												zindex = markerNodes[i].getAttribute("zi");


  												//===============================
  												// 좌표_선택__여부
  												is_choice = markerNodes[i].getAttribute("is_ch");


  												//===============================
  												// 패널에_이미지_URL
  												panel_img_url = markerNodes[i].getAttribute("panel_img_url");


  												//===============================
  												// InfoWindow_이미지_URL
  												infowin_limg_url = markerNodes[i].getAttribute("infowin_limg_url");


  												//===============================
  												// 좌표
  												var latlng = new google.maps.LatLng( 
  																														parseFloat(markerNodes[i].getAttribute("lat")),
  																														parseFloat(markerNodes[i].getAttribute("lng"))
  																														);


  												//===============================
  												// 마커_생성
  												create_marker(marker_loop, latlng, marker_n, wr_id, subject, address, content, option, infowin_limg_url, zindex, is_choice);


  												//===============================
  												// 좌표_목록_확장
  												bounds.extend(latlng);


  												//===============================
  												// 시작 => 마커_번호__있으면
		  										if ( marker_n > 0 )
  												{

															//===========================
															// 결과_창__HTML__만들기
															l_html = get_article_list_html(marker_loop, marker_n, wr_id, subject, address, option, content, panel_img_url);


															//===========================
															// 결과__HTML
															r_html += l_html;

  												}
													// 끝 => 마커_번호__있으면
  												//===============================


  												//===============================
  												// 마커_순서
  												marker_loop++;

  										}
  										else if ( row_div == 'tot' )
  										{

  												//###############################
  												//## 시작 => ROW__전체_건수__이면

  												//===============================
  												// ROW__값
  												row_var = markerNodes[i].getAttribute("r_v");


  												//===============================
  												// 결과_창__HTML__만들기
													l_html  = "<div class=\"article_total_d\"><span style=\"padding:0 0 0 10px; font-size:16px; color:#fff;\">주변 가맹점 ";
													l_html += "<strong>" + row_var + "</strong> 개</span></div>";


  												//===============================
  												// 결과__HTML
  												r_html += l_html;

  										}
  										// 끝 => ROW__구분
  										//===================================

  								}
  								// 끝 => 반복문____마커_수_만큼__돌리기
  								//=======================================


<?php

/*
	* PIREE_SOSS
	* 피리 PIREE
	* 2016년 11월 25일 금요일 오전 06시 33분 - 날씨 추워
	* 클러스터링 기능을 사용하기 여부
*/

							//===========================================
							// 시작 => 클러스터링_기능__사용하기_이면
							IF ( $p770033__clustering_use_n == 1 )
							{
?>
  								//=======================================
  								// 클러스터링__적용
  								var markerCluster = new MarkerClusterer(map, markers,
  								{
  										imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m',
  										maxZoom: <?php echo $p770033__clustering_zoom; ?>
  										}
  								);
<?php
							}
							// 끝 => 클러스터링_기능__사용하기_이면
							//===========================================

?>


  								//=======================================
  								// 여러_좌표__마커_찍기
  								// map.fitBounds(bounds);


  								//=======================================
  								// 결과창__HTML_보여주기
  								$('#article_list').html(r_html);

  						});
  						// 끝 => DATA__다운로드_받기
  						//===========================================

  				}
  				//## 끝 => 지역내_DATA__가져오기
  				//###############################################




  				//###############################################
  				//## 시작 => 지역내_DATA__지우기
  				function clear_local_data()
  				{

  						//===========================================
  						// INFO_WINDOW__닫기
  						info_window.close();


  						//===========================================
  						// 시작 => 반복문____마커_만큼__돌려라
  						for (var i = 0; i < markers.length; i++)
  						{

  								//=======================================
  								// 마커의_위치를__지운다
  								markers[i].setMap(null);

  						}
  						// 끝 => 반복문____마커_만큼__돌려라
  						//===========================================


  						//===========================================
  						// 마커수를__0으로
  						markers.length = 0;

  				}
  				//## 끝 => 지역내_DATA__지우기
  				//###############################################




  				//###############################################
  				//## 시작 => DATA__다운로드
  				function data_download_url(url, callback)
  				{

  						//===========================================
  						// 
  						var request = window.ActiveXObject ? new ActiveXObject('Microsoft.XMLHTTP') : new XMLHttpRequest;


  						//===========================================
  						// 
  						request.onreadystatechange = function()
  						{
  								if (request.readyState == 4)
  								{
  										request.onreadystatechange = doNothing;
  										callback(request.responseText, request.status);
  								}
  						};


  						//===========================================
  						// URL__열기
  						request.open('GET', url, true);


  						//===========================================
  						// 
  						request.send(null);

  				}
  				//## 끝 => DATA__다운로드
  				//###############################################




  				//###############################################
  				//## 시작 => XML__문자열로_변환하여_가져오기
  				function parse_xml(str)
  				{

  						//===========================================
  						// 시작 => 결과__구분
  						if (window.ActiveXObject)
  						{
  								var doc = new ActiveXObject('Microsoft.XMLDOM');
  								doc.loadXML(str);
  								return doc;
  						}
  						else if (window.DOMParser)
  						{
  								return (new DOMParser).parseFromString(str, 'text/xml');
  						}
  						// 끝 => 결과__구분
  						//===========================================

  				}
  				//## 끝 => XML__문자열로_변환하여_가져오기
  				//###############################################




  				//###############################################
  				//## 시작 => 마커__생성
  				function create_marker(loop_n, latlng, marker_n, wr_id, subject, address, content, option, infowin_limg_url, zindex, is_choice)
  				{

  						//===========================================
  						// 시작 => 마커_번호__구분
  						if ( !marker_n || marker_n == 0 )
  						{

									//=======================================
									// 시작 => 선택된__페이지__여부
									if ( is_choice == 1 )
									{
											// 시작 => 선택된__마커__이면
											image_s = image_d_c + 'PIREE_MAP_SKIN__marker__cyan.png';
									}
									else
									{
											// 시작 => 그냥__다른_마커__이면
											image_s = image_d_c + 'PIREE_MAP_SKIN__marker__cyan.png';
									}

							}
							else
  						{

									//=======================================
									// 시작 => 선택된__페이지__여부
									if ( is_choice == 1 )
									{
											// 시작 => 선택된__마커__이면
											image_s = image_d_c + 'PIREE_MAP_SKIN__marker__cyan.png';
									}
									else
									{
											// 시작 => 그냥__다른_마커__이면
											image_s = image_d_c + 'PIREE_MAP_SKIN__marker__cyan.png';
									}

							}
  						// 끝 => 마커_번호__구분
  						//===========================================


  						//===========================================
  						// INFOWINDO__내용
  						var i_html = "";


  						//===========================================
  						// 시작 => INFOWIN_이미지_URL__유무__구분
  						if ( infowin_limg_url )
  						{

									//#######################################
									// INFOWIN_이미지_URL__있으면

  								//=======================================
  								// 넘겨줄__HTML
  								i_html += "<div id=\"map_infowin\" style=\"width:<?php echo $p770033__infowin_size_w; ?>px !important;\">";
  								i_html += "<div style=\"padding: 5px 0 0 0; \" class=\"tbl_piree_01 tbl_wrap\"><table style=\"width:<?php echo $p770033__infowin_size_w; ?>px !important;\"><tbody><tr>";
  								i_html += "<td align=\"left\" valign=\"top\" style=\"width:<?php echo ($p770033__infowin_image_size_w+6); ?>px !important;\"><a href=\"" + link_head_s + wr_id + "\" target=\"_blank\"><img src=\"" + infowin_limg_url + "\" alt=\"" + subject + "\"></a></td>";
  								i_html += "<td align=\"left\" valign=\"top\" style=\" background:#D21279 !important; width:<?php echo ($p770033__infowin_size_w-$p770033__infowin_image_size_w-10); ?>px !important;\"><a href=\"" + link_head_s + wr_id + "\" target=\"_blank\"><span style=\"font-size:20px !important;\" class=\"mi_title\">" + subject + "</span></a>";


  								//=======================================
  								// 시작 => 주소__있으면
  								if ( address )
  								{

  										//=====================================
  										// 넘겨줄__HTML
  										i_html += "<br style=\"clear:both;\"><span class=\"mi_address\">" + address + "</span>";

  								}
  								// 끝 => 주소__있으면
  								//=======================================

  								//=======================================
  								// 시작 => 주소__있으면
  								if ( content )
  								{

  										//=====================================
  										// 넘겨줄__HTML
  										i_html += "<br style=\"clear:both;\"><span class=\"mi_address\" style=\"color:#000 !important;\">" + content + "</span>";

  								}
  								// 끝 => 주소__있으면
  								//=======================================


  								//=======================================
  								// 넘겨줄__HTML
  								i_html += "</td></tr></tbody></table></div>";
  								i_html += "</div>";

  						}
  						else
  						{

									//#######################################
									// INFOWIN_이미지_URL__없으면

  								//=======================================
  								// 넘겨줄__HTML
								
  								i_html  = "<div id=\"map_infowin\" onclick=\"window.location=\'"+ link_head_s + wr_id +"\' \"><span class=\"mi_title\">" + subject + "</span>";

  								//=======================================
  								// 시작 => 주소__있으면
  								if ( address )
  								{

  										//=====================================
  										// 넘겨줄__HTML
  										i_html += "<br style=\"clear:both;\"><span class=\"mi_address\">" + address + "</span>";

  								}
  								// 끝 => 주소__있으면
  								//=======================================

								  								// 시작 => 주소__있으면


								  								//=======================================
  								// 시작 => 주소__있으면
  								if ( content )
  								{

  										//=====================================
  										// 넘겨줄__HTML
  										i_html += "<br style=\"clear:both;\"><span class=\"mi_address\"><span style=\"font-weight:bold\">" + option + " </span>" + content + "</span>";

  								}
  								// 끝 => 주소__있으면
  								//=======================================


								  								//=======================================

  								// 끝 => 주소__있으면
  								//=======================================

  								//=======================================
  								// 넘겨줄__HTML
  								i_html += "</div>";

  						}
  						// 끝 => INFOWIN_이미지_URL__유무__구분
  						//===========================================


  						//===========================================
  						// 마커_내용_배열
  						marker_cont[loop_n] = i_html;


  						//===========================================
  						// 마커_옵션

						var icon = {
						 url:  image_s,
    scaledSize: new google.maps.Size(30, 30)
};
  						var marker = new google.maps.Marker({
  								map: map,
  								title: subject,
  								icon : icon,
  								position: latlng,
									zIndex : zindex
  						});


  						//===========================================
  						// 마커__클릭시
  						google.maps.event.addListener(marker, 'click', function()
  						{

  								//=======================================
  								// 마커__열기
  								info_window.setContent(i_html);
  								info_window.open(map, marker);


  								//=======================================
  								// 시작 => 마커_번호__유무
  								if ( marker_n > 0 )
  								{

		  								//###################################
		  								//## 마커_번호__있으면

		  								//===================================
		  								// 결과창__해당_게시글_위로_올리기
		  								var right_height_cha_n = $('#article_result_' + loop_n).offset().top - $('#article_result_1').offset().top;
		  								scrollTop: $("#article_list").animate({ scrollTop: right_height_cha_n}, 0);


		  								//===================================
		  								// 시작 => 반복문__게시글_목록수_만큼
		  								for (var j=0; j<=markers.length; j++)
		  								{
		  								    $('#article_result_' + j).attr("style", "border:0;");
		  								    if ( loop_n == j )
		  								    {
		  								        $('#article_result_' + j).attr("style", "border:2px solid #4196ff;");
		  								    }
		  								}

  								}
  								else
  								{

		  								//###################################
		  								//## 마커_번호__없으면

		  								//===================================
		  								// 시작 => 반복문__게시글_목록수_만큼
		  								for (var j=0; j<=markers.length; j++)
		  								{
		  								    $('#article_result_' + j).attr("style", "border:0;");
		  								}

  								}
  								// 끝 => 마커_번호__유무
  								//=======================================

  						});


  						//===========================================
  						// 마커_푸시
  						markers.push(marker);

  				}
  				//## 끝 => 마커__생성
  				//###############################################




  				//###############################################
  				//## 시작 => 결과_창__HTML__만들기
  				function get_article_list_html(loop_n, marker_n, wr_id, subject, address, content, panel_img_url)
  				{

  						//===========================================
  						// 넘겨줄__HTML
  						var html_s = "";


  						//===========================================
  						// 시작 => 패널에_이미지_URL__유무__구분
  						if ( panel_img_url )
  						{

									//#######################################
									// 패널에_이미지_URL__있으면

  								//=======================================
  								// 넘겨줄__HTML
  								html_s += "<a href=\"" + link_head_s + wr_id + "\" target=\"_blank\">";
  								html_s += "<div class=\"article_list_right\" id=\"article_result_" + loop_n + "\" onMouseOver=\"view_market_infowindow(" + loop_n + ");\">";
  								html_s += "<div style=\"padding:5px 0 0 5px;\" class=\"tbl_piree_01 tbl_wrap\"><table style=\"width:<?php echo ($p770033__panel_size_w-40); ?>px !important;\"><tbody><tr><td align=\"left\" valign=\"top\" style=\"width:<?php echo ($p770033__panel_image_size_w+6); ?>px !important;\"><img src=\"" + panel_img_url + "\" alt=\"" + subject + "\"></td>";
  								html_s += "<td align=\"left\" valign=\"top\"><span style=\"font-family:Malgun Gothic; color:#D21279 !important; font-size:18px;\"><strong>" + marker_n + ". " + subject + "</strong></span>";


  								//=======================================
  								// 시작 => 주소__있으면
  								if ( address )
  								{

  										//=====================================
  										// 넘겨줄__HTML
  										html_s += "<br style=\"clear:both;\"><span style=\"font-family:Malgun Gothic; color:#777777; font-size:15px;\">" + address + "</span>";

  								}
  								// 끝 => 주소__있으면
  								//=======================================

  								//=======================================
  								// 시작 => 주소__있으면
  								if ( content )
  								{

  										//=====================================
  										// 넘겨줄__HTML
  										html_s += "<br style=\"clear:both;\"><span style=\"font-family:Malgun Gothic; color:#777777;  font-size:15px;\">" + content + "</span>";

  								}
  								// 끝 => 주소__있으면
  								//=======================================

  								//=======================================
  								// 넘겨줄__HTML
  								html_s += "</td></tr></tbody></table></div></div></a>";

  						}
  						else
  						{

									//#######################################
									// 패널에_이미지_URL__없으면

  								//=======================================
  								// 넘겨줄__HTML
  								html_s += "<a href=\"" + link_head_s + wr_id + "\" target=\"_blank\">";
  								html_s += "<div style=\"padding-left:8px;\" class=\"article_list_right\" id=\"article_result_" + loop_n + "\" onMouseOver=\"view_market_infowindow(" + loop_n + ");\">";
  								html_s += "<strong>" + marker_n + ". " + subject + "</strong>";


  								//=======================================
  								// 시작 => 주소__있으면
  								if ( address )
  								{

  										//=====================================
  										// 넘겨줄__HTML
  										html_s += "<br style=\"clear:both;\">" + address;

  								}
  								// 끝 => 주소__있으면
  								//=======================================

  								//=======================================
  								// 시작 => 주소__있으면
  								if ( content )
  								{

  										//=====================================
  										// 넘겨줄__HTML
  										html_s += "<br style=\"clear:both;\">" + content;

  								}
  								// 끝 => 주소__있으면
  								//=======================================


  								//=======================================
  								// 넘겨줄__HTML
  								html_s += "</div></a>";

  						}
  						// 끝 => 패널에_이미지_URL__유무__구분
  						//===========================================


  						//===========================================
  						// 넘겨주기__HTML
  						return html_s;

  				}
  				//## 끝 => 결과_창__HTML__만들기
  				//###############################################




  				//###############################################
  				//## 시작 => DONOTHING
					function doNothing()
					{
							alert ("뭥미?");
					}

  		});
  		// 끝 => JQUERY
  		//###################################################



  		//###################################################
  		//## 시작 => 결과창_마우스_올리면__마커_띄우기
  		function view_market_infowindow(i)
  		{
  				info_window.setContent(marker_cont[i]);
  				info_window.open(map, markers[i]);
  		}
  		//## 끝 => 결과창_마우스_올리면__마커_띄우기
  		//###################################################

<?php

  		#####################################################
  		# 끝 => 지도__보여주기
  		#####################################################

  #########################################################
  # 끝 => 지도__관련
  #########################################################


?>