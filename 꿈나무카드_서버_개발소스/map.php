<?php
include_once('./_common.php');
define('_INDEX_', true);

if(!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once('./_head.php');
?>


<?php 
$address = $view['wr_subject']; 

$xml = simplexml_load_file("http://maps.google.com/maps/api/geocode/xml?address=".urlencode($address)."&language=ko&sensor=false"); 
$lat = $xml->result->geometry->location->lat; 
$lng = $xml->result->geometry->location->lng;
$add = $xml->result->formatted_address;

$sql = "update g5_write_hotplace set wr_4='$add' where wr_id='$view[wr_id]'";
sql_query($sql);​
?> 

INSERT INTO g5_write_map (wr_num, wr_subject) VALUES (	1	,'	김용현베이커리');