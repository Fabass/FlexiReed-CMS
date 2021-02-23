<?php
if (!defined('FXR_INDEX')) {
    exit('No direct script access allowed');
}
/**
 * Title: FXR Create SQL Tables (Main Config View)
 *
 * @author Fabien Assenarre
 * @link http://www.flexireed.org
 * @copyright Copyright &copy; 2020 Fabien Assenarre
 * @license http://opensource.org/licenses/MIT
 *
 */

// create pages_frt table
$queries[] = "CREATE TABLE IF NOT EXISTS `" . PREFIX_QUERY . "pages_frt` (
`page_id_frt` int(11) NOT NULL AUTO_INCREMENT,
  `page_posted_frt` timestamp NOT NULL,
  `page_author_frt` varchar(100) NOT NULL,
  `page_title_frt` varchar(140) NOT NULL,
  `page_title_url_frt` varchar(140) NOT NULL,
  `page_description_frt` varchar(75) NOT NULL,
  `page_summary_frt` mediumtext NOT NULL,
  `page_body_frt` mediumtext NOT NULL,
  `page_in_home_frt` int(1) NOT NULL,
  `page_in_nav_frt` int(11) NOT NULL,
  `page_in_sub_nav_frt` int(5) NOT NULL,
  `page_in_cache_frt` int(1) NOT NULL DEFAULT '0',
  `page_auth_access_frt` int(1) NOT NULL DEFAULT '0',
  `page_theme_tpl_frt` varchar(50) NOT NULL,
  `page_theme_folder_frt` varchar(50) NOT NULL DEFAULT 'theme_default_frt',
  `page_theme_lang_frt` varchar(50) NOT NULL DEFAULT 'en-us',
  `page_init_cache_time_frt` timestamp NOT NULL,
  `page_duration_cache_time_frt` int(11) NOT NULL DEFAULT '31536000',
  PRIMARY KEY (`page_id_frt`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;";

// create pages_bck table
$queries[] = "CREATE TABLE IF NOT EXISTS `" . PREFIX_QUERY . "pages_bck` (
`page_id_bck` int(11) NOT NULL AUTO_INCREMENT,
  `page_posted_bck` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `page_author_bck` varchar(100) NOT NULL,
  `page_title_bck` varchar(140) NOT NULL,
  `page_title_url_bck` varchar(140) NOT NULL,
  `page_description_bck` varchar(75) NOT NULL,
  `page_summary_bck` mediumtext NOT NULL,
  `page_body_bck` mediumtext NOT NULL,
  `page_in_home_bck` int(1) NOT NULL,
  `page_in_nav_bck` int(11) NOT NULL,
  `page_in_sub_nav_bck` int(5) NOT NULL,
  `page_in_cache_bck` int(1) NOT NULL DEFAULT '0',
  `page_auth_access_bck` int(1) NOT NULL DEFAULT '0',
  `page_theme_tpl_bck` varchar(50) NOT NULL,
  `page_theme_folder_bck` varchar(50) NOT NULL DEFAULT 'theme_default_bck',
  `page_theme_lang_bck` varchar(50) NOT NULL DEFAULT 'en-us',
  `page_init_cache_time_bck` timestamp NOT NULL,
  `page_duration_cache_time_bck` int(11) NOT NULL DEFAULT '31536000',
  PRIMARY KEY (`page_id_bck`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;";

// create pages_lang_frt table
$queries[] = "CREATE TABLE IF NOT EXISTS `" . PREFIX_QUERY . "pages_lang_frt` (
  `en_US` varchar(5) NOT NULL,
  `af_ZA` varchar(5) NOT NULL,
  `ar_AA` varchar(5) NOT NULL,
  `az_AZ` varchar(5) NOT NULL,
  `be_BY` varchar(5) NOT NULL,
  `bg_BG` varchar(5) NOT NULL,
  `bn_BD` varchar(5) NOT NULL,
  `bs_BA` varchar(5) NOT NULL,
  `ca_ES` varchar(5) NOT NULL,
  `ckb_IQ` varchar(5) NOT NULL,
  `cs_CZ` varchar(5) NOT NULL,
  `da_DK` varchar(5) NOT NULL,
  `de_DE` varchar(5) NOT NULL,
  `el_GR` varchar(5) NOT NULL,
  `en_AU` varchar(5) NOT NULL,
  `en_GB` varchar(5) NOT NULL,
  `eo_XX` varchar(5) NOT NULL,
  `es_ES` varchar(5) NOT NULL,
  `et_EE` varchar(5) NOT NULL,
  `fa_IR` varchar(5) NOT NULL,
  `fi_FI` varchar(5) NOT NULL,
  `fr_FR` varchar(5) NOT NULL,
  `gl_ES` varchar(5) NOT NULL,
  `gu_IN` varchar(5) NOT NULL,
  `he_IL` varchar(5) NOT NULL,
  `hr_HR` varchar(5) NOT NULL,
  `hu_HU` varchar(5) NOT NULL,
  `id_ID` varchar(5) NOT NULL,
  `is_IS` varchar(5) NOT NULL,
  `it_IT` varchar(5) NOT NULL,
  `ja_JP` varchar(5) NOT NULL,
  `ka_GE` varchar(5) NOT NULL,
  `km_KH` varchar(5) NOT NULL,
  `lo_LA` varchar(5) NOT NULL,
  `lt_LT` varchar(5) NOT NULL,
  `lv_LV` varchar(5) NOT NULL,
  `mk_MK` varchar(5) NOT NULL,
  `ml_IN` varchar(5) NOT NULL,
  `mn_MN` varchar(5) NOT NULL,
  `nb_NO` varchar(5) NOT NULL,
  `nl_NL` varchar(5) NOT NULL,
  `nn_NO` varchar(5) NOT NULL,
  `pl_PL` varchar(5) NOT NULL,
  `pt_BR` varchar(5) NOT NULL,
  `pt_PT` varchar(5) NOT NULL,
  `ro_RO` varchar(5) NOT NULL,
  `ru_RU` varchar(5) NOT NULL,
  `sk_SK` varchar(5) NOT NULL,
  `sq_AL` varchar(5) NOT NULL,
  `sr_RS` varchar(5) NOT NULL,
  `sr_YU` varchar(5) NOT NULL,
  `sv_SE` varchar(5) NOT NULL,
  `sy_IQ` varchar(5) NOT NULL,
  `ta_IN` varchar(5) NOT NULL,
  `th_TH` varchar(5) NOT NULL,
  `tr_TR` varchar(5) NOT NULL,
  `uk_UA` varchar(5) NOT NULL,
  `vi_VN` varchar(5) NOT NULL,
  `zh_CN` varchar(5) NOT NULL,
  `zh_TW` varchar(5) NOT NULL,
  PRIMARY KEY (`en_US`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;";

// create pages_lang_bck table
$queries[] = "CREATE TABLE IF NOT EXISTS `" . PREFIX_QUERY . "pages_lang_bck` (
  `en_US` varchar(5) NOT NULL,
  `af_ZA` varchar(5) NOT NULL,
  `ar_AA` varchar(5) NOT NULL,
  `az_AZ` varchar(5) NOT NULL,
  `be_BY` varchar(5) NOT NULL,
  `bg_BG` varchar(5) NOT NULL,
  `bn_BD` varchar(5) NOT NULL,
  `bs_BA` varchar(5) NOT NULL,
  `ca_ES` varchar(5) NOT NULL,
  `ckb_IQ` varchar(5) NOT NULL,
  `cs_CZ` varchar(5) NOT NULL,
  `da_DK` varchar(5) NOT NULL,
  `de_DE` varchar(5) NOT NULL,
  `el_GR` varchar(5) NOT NULL,
  `en_AU` varchar(5) NOT NULL,
  `en_GB` varchar(5) NOT NULL,
  `eo_XX` varchar(5) NOT NULL,
  `es_ES` varchar(5) NOT NULL,
  `et_EE` varchar(5) NOT NULL,
  `fa_IR` varchar(5) NOT NULL,
  `fi_FI` varchar(5) NOT NULL,
  `fr_FR` varchar(5) NOT NULL,
  `gl_ES` varchar(5) NOT NULL,
  `gu_IN` varchar(5) NOT NULL,
  `he_IL` varchar(5) NOT NULL,
  `hr_HR` varchar(5) NOT NULL,
  `hu_HU` varchar(5) NOT NULL,
  `id_ID` varchar(5) NOT NULL,
  `is_IS` varchar(5) NOT NULL,
  `it_IT` varchar(5) NOT NULL,
  `ja_JP` varchar(5) NOT NULL,
  `ka_GE` varchar(5) NOT NULL,
  `km_KH` varchar(5) NOT NULL,
  `lo_LA` varchar(5) NOT NULL,
  `lt_LT` varchar(5) NOT NULL,
  `lv_LV` varchar(5) NOT NULL,
  `mk_MK` varchar(5) NOT NULL,
  `ml_IN` varchar(5) NOT NULL,
  `mn_MN` varchar(5) NOT NULL,
  `nb_NO` varchar(5) NOT NULL,
  `nl_NL` varchar(5) NOT NULL,
  `nn_NO` varchar(5) NOT NULL,
  `pl_PL` varchar(5) NOT NULL,
  `pt_BR` varchar(5) NOT NULL,
  `pt_PT` varchar(5) NOT NULL,
  `ro_RO` varchar(5) NOT NULL,
  `ru_RU` varchar(5) NOT NULL,
  `sk_SK` varchar(5) NOT NULL,
  `sq_AL` varchar(5) NOT NULL,
  `sr_RS` varchar(5) NOT NULL,
  `sr_YU` varchar(5) NOT NULL,
  `sv_SE` varchar(5) NOT NULL,
  `sy_IQ` varchar(5) NOT NULL,
  `ta_IN` varchar(5) NOT NULL,
  `th_TH` varchar(5) NOT NULL,
  `tr_TR` varchar(5) NOT NULL,
  `uk_UA` varchar(5) NOT NULL,
  `vi_VN` varchar(5) NOT NULL,
  `zh_CN` varchar(5) NOT NULL,
  `zh_TW` varchar(5) NOT NULL,
  PRIMARY KEY (`en_US`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;";

// create settings_frt table
$queries[] = "CREATE TABLE IF NOT EXISTS `" . PREFIX_QUERY . "settings_frt` (
`setting_lang_id_frt` int(3) NOT NULL AUTO_INCREMENT,
  `setting_abbr_lang_frt` varchar(5) NOT NULL,
  `setting_default_title_frt` varchar(50) NOT NULL,
  `setting_default_description_frt` text NOT NULL,
  `setting_default_public_tpl_frt` varchar(50) NOT NULL,
  `setting_default_restricted_tpl_frt` varchar(50) NOT NULL,
  `setting_theme_folder_frt` varchar(50) NOT NULL,
  `setting_site_name_frt` varchar(50) NOT NULL,
  `setting_page_in_cache_frt` int(1) NOT NULL,
  `setting_init_cache_time_frt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `setting_duration_cache_time_frt` int(11) NOT NULL,
  PRIMARY KEY (`setting_lang_id_frt`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;";

// create settings_bck table
$queries[] = "CREATE TABLE IF NOT EXISTS `" . PREFIX_QUERY . "settings_bck` (
`setting_lang_id_bck` int(3) AUTO_INCREMENT,
  `setting_abbr_lang_bck` varchar(5) NOT NULL,
  `setting_default_title_bck` varchar(50) NOT NULL,
  `setting_default_description_bck` text NOT NULL,
  `setting_default_public_tpl_bck` varchar(50) NOT NULL,
  `setting_default_restricted_tpl_bck` varchar(50) NOT NULL,
  `setting_theme_folder_bck` varchar(50) NOT NULL,
  `setting_site_name_bck` varchar(50) NOT NULL,
  `setting_page_in_cache_bck` int(1) NOT NULL,
  `setting_init_cache_time_bck` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `setting_duration_cache_time_bck` int(11) NOT NULL,
  PRIMARY KEY (`setting_lang_id_bck`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;";

// create users_frt table
$queries[] = "CREATE TABLE IF NOT EXISTS `" . PREFIX_QUERY . "users_frt` (
`user_id_frt` int(11) NOT NULL AUTO_INCREMENT,
  `user_login_frt` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `user_password_frt` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `user_name_frt` varchar(100) NOT NULL,
  `user_email_frt` varchar(255) NOT NULL,
  `user_lang_frt` varchar(6) NOT NULL,
  `user_timezone_frt` varchar(70) NOT NULL,
  `user_theme_frt` varchar(50) NOT NULL,
  `user_create_date_frt` datetime NOT NULL,
  `user_last_connect_frt` datetime NOT NULL,
  `user_level_access_frt` mediumtext NOT NULL,
    PRIMARY KEY (`user_id_frt`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;";

// create users_bck table
$queries[] = "CREATE TABLE IF NOT EXISTS `" . PREFIX_QUERY . "users_bck` (
`user_id_bck` int(11) NOT NULL AUTO_INCREMENT,
  `user_login_bck` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `user_password_bck` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `user_name_bck` varchar(100) NOT NULL,
  `user_email_bck` varchar(255) NOT NULL,
  `user_lang_bck` varchar(6) NOT NULL,
  `user_timezone_bck` varchar(70) NOT NULL,
  `user_theme_bck` varchar(50) NOT NULL,
  `user_create_date_bck` datetime NOT NULL,
  `user_last_connect_bck` datetime NOT NULL,
  `user_level_access_bck` mediumtext NOT NULL,
    PRIMARY KEY (`user_id_bck`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;";
