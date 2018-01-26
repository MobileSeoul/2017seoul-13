
-- 작성날짜 : 2015년 12월 17일 목요일 오후 12시 06분 - 날씨 무쟈게 춥다

-- 피리 > 피리 맵 페이지 PLUS G5 > DB SCHEMA 화일

-- --------------------------------------------------------


DROP TABLE IF EXISTS `g5__piree_MAP_data`;
CREATE TABLE IF NOT EXISTS `g5__piree_MAP_data` (
  `msd_n` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `msd_list_key_n` INT(11) NOT NULL default '0',
  `msd_code` varchar(12) NOT NULL default '',
  `msd_table` varchar(40) NOT NULL default '',
  `msd_v_n` bigint(20) unsigned NOT NULL default '0',
  `msd_v_s` varchar(20) NOT NULL default '',
  `msd_mb_id` varchar(20) NOT NULL DEFAULT '',
  `msd_mb_name` varchar(255) NOT NULL DEFAULT '',
  `msd_mb_cont` varchar(600) NOT NULL DEFAULT '',
  `msd_regi_time_n` INT(11) UNSIGNED NOT NULL,
  `msd_save_time_n` INT(11) UNSIGNED NOT NULL,
  `msd_modi_time_n` INT(11) UNSIGNED NOT NULL,
  PRIMARY KEY  (`msd_n`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- --------------------------------------------------------
