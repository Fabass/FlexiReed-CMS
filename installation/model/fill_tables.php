<?php
if (!defined('FXR_INDEX')) {
    exit('No direct script access allowed');
}
/**
 * Title: FXR Fill SQL Tables (Finished View)
 *
 * @author Fabien Assenarre
 * @link http://www.flexireed.org
 * @copyright Copyright &copy; 2020 Fabien Assenarre
 * @license http://opensource.org/licenses/MIT
 *
 */

// select fxr_pages_frt
$select_fxr_pages_frt = "SELECT page_id_frt 
                      FROM " . PREFIX_QUERY . "pages_frt";

// insert into fxr_pages_frt
$insert_fxr_pages_frt = "INSERT INTO `" . PREFIX_QUERY . "pages_frt` VALUES (
                      '1',
                      '" . date("Y-m-d H:i:s", time()) . "',
                      '" . $_SESSION['user_name'] . "',
                      'Nav Title',
                      'nav-title',
                      'My Description',
                      '<h2>The standard Lorem Ipsum passage, used since the 1500s</h2>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>',
                      '<h2>Section 1.10.32 of de Finibus Bonorum et Malorum, written by Cicero in 45 BC</h2>
<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>',
                      '1',
                      '1',
                      '0',
                      '1',
                      '0',
                      'site_page',
                      '" . I18N_DEFAULT_THEME_FOLDER_FRT . "',
                      '" . I18N_DEFAULT_LANG_FRT . "',
                      '" . date("Y-m-d H:i:s") . "',
                      '31536000')";

// update fxr_pages_frt
$update_fxr_pages_frt = "UPDATE `" . PREFIX_QUERY . "pages_frt` SET
                      page_id_frt='1',
                      page_posted_frt='" . date("Y-m-d H:i:s", time()) . "',
                      page_author_frt='" . $_SESSION['user_name'] . "',
                      page_title_frt='Nav Title',
                      page_title_url_frt='nav-title',
                      page_description_frt='My Description',
                      page_summary_frt='<h2>The standard Lorem Ipsum passage, used since the 1500s</h2>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>',
                      page_body_frt='
                     <h2>Section 1.10.32 of de Finibus Bonorum et Malorum, written by Cicero in 45 BC</h2>
<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>',
                      page_in_home_frt='1',
                      page_in_nav_frt='1',
                      page_in_sub_nav_frt=0,
                      page_in_cache_frt='1',
                      page_auth_access_frt='0',
                      page_theme_tpl_frt='site_page',
                      page_theme_folder_frt='" . I18N_DEFAULT_THEME_FOLDER_FRT . "',
                      page_theme_lang_frt='" . I18N_DEFAULT_LANG_FRT . "',
                      page_init_cache_time_frt='" . date("Y-m-d H:i:s", time()) . "',
                      page_duration_cache_time_frt='31536000'
                      WHERE
                      page_id_frt='1'";

// select fxr_settings_bck
$select_fxr_settings_frt = "SELECT setting_lang_id_frt 
                      FROM " . PREFIX_QUERY . "settings_frt";

// insert into fxr_settings_bck
$insert_fxr_settings_frt = "INSERT INTO `" . PREFIX_QUERY . "settings_frt` VALUES (
                      '1',
                      '" . I18N_DEFAULT_LANG_FRT . "',
                      '" . I18N_DEFAULT_TITLE_HOME_FRT . "',
                      '" . I18N_DEFAULT_DESCRIPTION_HOME_FRT . "', 
                      '" . I18N_DEFAULT_TPL_HOME_FRT . "',
                      '', 
                      '" . I18N_DEFAULT_THEME_FOLDER_FRT . "',
                      '" . $_SESSION['site_name'] . "',
                      '1',
                      '" . date("Y-m-d H:i:s", time()) . "',
                      '31536000')";

// update fxr_settings_bck
$update_fxr_settings_frt = "UPDATE `" . PREFIX_QUERY . "settings_frt` SET 
                      setting_lang_id_frt='1', 
                      setting_abbr_lang_frt='" . I18N_DEFAULT_LANG_FRT . "', 
                      setting_default_title_frt='" . I18N_DEFAULT_TITLE_HOME_FRT . "', 
                      setting_default_description_frt='" . I18N_DEFAULT_DESCRIPTION_HOME_FRT . "',
                      setting_default_public_tpl_frt='" . I18N_DEFAULT_TPL_HOME_FRT . "',
                      setting_default_restricted_tpl_frt= '" . I18N_DEFAULT_TPL_HOME_FRT . "',
                      setting_theme_folder_frt='" . I18N_DEFAULT_THEME_FOLDER_FRT . "',
                      setting_site_name_frt= '" . $_SESSION['site_name'] . "',
                      setting_page_in_cache_frt='1',
                      setting_init_cache_time_frt='" . date("Y-m-d H:i:s", time()) . "',
                      setting_duration_cache_time_frt='31536000'
                      WHERE
                      setting_lang_id_frt='1'";

// select fxr_pages_bck
$select_fxr_pages_bck = "SELECT page_id_bck 
                      FROM " . PREFIX_QUERY . "pages_bck";

// insert into fxr_pages_bck
$insert_fxr_pages_bck = "INSERT INTO `" . PREFIX_QUERY . "pages_bck` VALUES
(1, '" . date("Y-m-d H:i:s", time()) . "', '" . $_SESSION['user_name'] . "', 'Pages', 'pages', '', '', '', 0, 1, 0, 1, 1, '1_pages_settings','" . I18N_DEFAULT_THEME_FOLDER_BCK . "','" . I18N_DEFAULT_LANG_BCK . "', '" . date("Y-m-d H:i:s", time()) . "', 31536000),
(2, '" . date("Y-m-d H:i:s", time()) . "', '" . $_SESSION['user_name'] . "', 'Add page', 'add-page', '', '', '', 0, 0, 1, 1, 1, '2_add_page','" . I18N_DEFAULT_THEME_FOLDER_BCK . "','" . I18N_DEFAULT_LANG_BCK . "', '" . date("Y-m-d H:i:s", time()) . "', 31536000),
(3, '" . date("Y-m-d H:i:s", time()) . "', '" . $_SESSION['user_name'] . "', 'Manage pages', 'manage-pages', '', '', '', 0, 0, 1, 1, 1, '3_manage_pages','" . I18N_DEFAULT_THEME_FOLDER_BCK . "', '" . I18N_DEFAULT_LANG_BCK . "', '" . date("Y-m-d H:i:s", time()) . "', 31536000),
(4, '" . date("Y-m-d H:i:s", time()) . "', '" . $_SESSION['user_name'] . "', 'Users', 'users', '', '', '', 0, 1, 0, 1, 1, '4_users_settings','" . I18N_DEFAULT_THEME_FOLDER_BCK . "','" . I18N_DEFAULT_LANG_BCK . "', '" . date("Y-m-d H:i:s", time()) . "', 31536000),
(5, '" . date("Y-m-d H:i:s", time()) . "', '" . $_SESSION['user_name'] . "', 'Add user', 'add-user', '', '', '', 0, 0, 4, 1, 1, '5_add_user','" . I18N_DEFAULT_THEME_FOLDER_BCK . "','" . I18N_DEFAULT_LANG_BCK . "', '" . date("Y-m-d H:i:s", time()) . "', 31536000),
(6, '" . date("Y-m-d H:i:s", time()) . "', '" . $_SESSION['user_name'] . "', 'Manage users', 'manage-users', '', '', '', 0, 0, 4, 1, 1, '6_manage_users','" . I18N_DEFAULT_THEME_FOLDER_BCK . "', '" . I18N_DEFAULT_LANG_BCK . "', '" . date("Y-m-d H:i:s", time()) . "', 31536000)";

// update fxr_pages_frt
$update_fxr_pages_bck = "UPDATE `" . PREFIX_QUERY . "pages_bck` SET
                      page_id_bck='1',
                      page_posted_bck='" . date("Y-m-d H:i:s", time()) . "',
                      page_author_bck='" . $_SESSION['user_name'] . "',
                      page_title_bck='Pages',
                      page_title_url_bck='pages',
                      page_description_bck='',
                      page_summary_bck='',
                      page_body_bck='',
                      page_in_home_bck='0',
                      page_in_nav_bck='1',
                      page_in_sub_nav_bck='0',
                      page_in_cache_bck='1',
                      page_auth_access_bck='1',
                      page_theme_tpl_bck='1_pages_settings',
                      page_theme_folder_bck='" . I18N_DEFAULT_THEME_FOLDER_BCK . "',
                      page_theme_lang_bck='" . I18N_DEFAULT_LANG_BCK . "',
                      page_init_cache_time_bck='" . date("Y-m-d H:i:s", time()) . "',
                      page_duration_cache_time_bck='31536000'
                      WHERE
                      page_id_bck='1'";

$update_fxr_pages_bck2 = "UPDATE `" . PREFIX_QUERY . "pages_bck` SET
                       page_id_bck='2',
                       page_posted_bck='" . date("Y-m-d H:i:s", time()) . "',
                       page_author_bck='" . $_SESSION['user_name'] . "',
                       page_title_bck='Add page',
                       page_title_url_bck='add-page',
                       page_description_bck='',
                       page_summary_bck='',
                       page_body_bck='',
                       page_in_home_bck='0',
                       page_in_nav_bck='0',
                       page_in_sub_nav_bck='1',
                       page_in_cache_bck='1',
                       page_auth_access_bck='1',
                       page_theme_tpl_bck='2_add_page',
                       page_theme_folder_bck='" . I18N_DEFAULT_THEME_FOLDER_BCK . "',
                       page_theme_lang_bck='" . I18N_DEFAULT_LANG_BCK . "',
                       page_init_cache_time_bck='" . date("Y-m-d H:i:s", time()) . "',
                       page_duration_cache_time_bck='31536000'
                       WHERE
                       page_id_bck='2'";

$update_fxr_pages_bck3 = "UPDATE `" . PREFIX_QUERY . "pages_bck` SET
                      page_id_bck='3',
                      page_posted_bck='" . date("Y-m-d H:i:s", time()) . "',
                      page_author_bck='" . $_SESSION['user_name'] . "',
                      page_title_bck='Manage pages',
                      page_title_url_bck='manage-pages',
                      page_description_bck='',
                      page_summary_bck='',
                      page_body_bck='',
                      page_in_home_bck='0',
                      page_in_nav_bck='0',
                      page_in_sub_nav_bck='1',
                      page_in_cache_bck='1',
                      page_auth_access_bck='1',
                      page_theme_tpl_bck='3_manage_pages',
                      page_theme_folder_bck='" . I18N_DEFAULT_THEME_FOLDER_BCK . "',
                      page_theme_lang_bck='" . I18N_DEFAULT_LANG_BCK . "',
                      page_init_cache_time_bck='" . date("Y-m-d H:i:s", time()) . "',
                      page_duration_cache_time_bck='31536000'
                      WHERE
                      page_id_bck='3'";

$update_fxr_pages_bck4 = "UPDATE `" . PREFIX_QUERY . "pages_bck` SET
                      page_id_bck='4',
                      page_posted_bck='" . date("Y-m-d H:i:s", time()) . "',
                      page_author_bck='" . $_SESSION['user_name'] . "',
                      page_title_bck='Pages',
                      page_title_url_bck='pages',
                      page_description_bck='',
                      page_summary_bck='',
                      page_body_bck='',
                      page_in_home_bck='0',
                      page_in_nav_bck='1',
                      page_in_sub_nav_bck='0',
                      page_in_cache_bck='1',
                      page_auth_access_bck='1',
                      page_theme_tpl_bck='4_users_settings',
                      page_theme_folder_bck='" . I18N_DEFAULT_THEME_FOLDER_BCK . "',
                      page_theme_lang_bck='" . I18N_DEFAULT_LANG_BCK . "',
                      page_init_cache_time_bck='" . date("Y-m-d H:i:s", time()) . "',
                      page_duration_cache_time_bck='31536000'
                      WHERE
                      page_id_bck='4'";

$update_fxr_pages_bck5 = "UPDATE `" . PREFIX_QUERY . "pages_bck` SET
                       page_id_bck='5',
                       page_posted_bck='" . date("Y-m-d H:i:s", time()) . "',
                       page_author_bck='" . $_SESSION['user_name'] . "',
                       page_title_bck='Add user',
                       page_title_url_bck='add-user',
                       page_description_bck='',
                       page_summary_bck='',
                       page_body_bck='',
                       page_in_home_bck='0',
                       page_in_nav_bck='0',
                       page_in_sub_nav_bck='4',
                       page_in_cache_bck='1',
                       page_auth_access_bck='1',
                       page_theme_tpl_bck='5_add_user',
                       page_theme_folder_bck='" . I18N_DEFAULT_THEME_FOLDER_BCK . "',
                       page_theme_lang_bck='" . I18N_DEFAULT_LANG_BCK . "',
                       page_init_cache_time_bck='" . date("Y-m-d H:i:s", time()) . "',
                       page_duration_cache_time_bck='31536000'
                       WHERE
                       page_id_bck='5'";

$update_fxr_pages_bck6 = "UPDATE `" . PREFIX_QUERY . "pages_bck` SET
                      page_id_bck='6',
                      page_posted_bck='" . date("Y-m-d H:i:s", time()) . "',
                      page_author_bck='" . $_SESSION['user_name'] . "',
                      page_title_bck='Manage users',
                      page_title_url_bck='manage-users',
                      page_description_bck='',
                      page_summary_bck='',
                      page_body_bck='',
                      page_in_home_bck='0',
                      page_in_nav_bck='0',
                      page_in_sub_nav_bck='4',
                      page_in_cache_bck='1',
                      page_auth_access_bck='1',
                      page_theme_tpl_bck='6_manage_users',
                      page_theme_folder_bck='" . I18N_DEFAULT_THEME_FOLDER_BCK . "',
                      page_theme_lang_bck='" . I18N_DEFAULT_LANG_BCK . "',
                      page_init_cache_time_bck='" . date("Y-m-d H:i:s", time()) . "',
                      page_duration_cache_time_bck='31536000'
                      WHERE
                      page_id_bck='6'";

// select fxr_settings_bck
$select_fxr_settings_bck = "SELECT setting_lang_id_bck 
                      FROM " . PREFIX_QUERY . "settings_bck";

// insert into fxr_settings_bck
$insert_fxr_settings_bck = "INSERT INTO `" . PREFIX_QUERY . "settings_bck` VALUES (
                      '1',
                      '" . I18N_DEFAULT_LANG_BCK . "',
                      '" . I18N_DEFAULT_TITLE_HOME_BCK . "',
                      '" . I18N_DEFAULT_DESCRIPTION_HOME_BCK . "', 
                      '" . I18N_DEFAULT_TPL_HOME_BCK . "',
                      '" . I18N_DEFAULT_TPL_HOME_FRT . "', 
                      '" . I18N_DEFAULT_THEME_FOLDER_BCK . "',
                      '" . $_SESSION['site_name'] . "',
                      '1',
                      '" . date("Y-m-d H:i:s", time()) . "',
                      '31536000')";

// update fxr_settings_bck
$update_fxr_settings_bck = "UPDATE `" . PREFIX_QUERY . "settings_bck` SET 
                      setting_lang_id_bck='1', 
                      setting_abbr_lang_bck='" . I18N_DEFAULT_LANG_BCK . "', 
                      setting_default_title_bck='" . I18N_DEFAULT_TITLE_HOME_BCK . "', 
                      setting_default_description_bck='" . I18N_DEFAULT_DESCRIPTION_HOME_BCK . "',
                      setting_default_public_tpl_bck='" . I18N_DEFAULT_TPL_HOME_BCK . "',
                      setting_default_restricted_tpl_bck='" . I18N_DEFAULT_TPL_HOME_BCK . "',
                      setting_theme_folder_bck='" . I18N_DEFAULT_THEME_FOLDER_BCK . "',
                      setting_site_name_bck= '" . $_SESSION['site_name'] . "',
                      setting_page_in_cache_bck='1',
                      setting_init_cache_time_bck='" . date("Y-m-d H:i:s", time()) . "',
                      setting_duration_cache_time_bck='31536000'
                      WHERE
                      setting_lang_id_bck='1'";

// select fxr_users_bck
$select_fxr_users_bck = "SELECT user_login_bck 
                    FROM " . PREFIX_QUERY . "users_bck";

// insert into fxr_users_bck
$insert_fxr_users_bck = "INSERT INTO `" . PREFIX_QUERY . "users_bck` VALUES (
                    '1',
                    '" . $_SESSION['user_name'] . "',
                    '" . $hash_password . "',
                    '" . $_SESSION['full_name'] . "',
                    '" . $_SESSION['user_mail'] . "',
                    '" . $_SESSION['default_language'] . "',
                    '" . $_SESSION['default_timezone'] . "',
                    'theme_default_bck',
                    '" . $timestamp . "',
                    '" . $timestamp . "',
                    '1')";

// update fxr_users_bck
$update_fxr_users_bck = "UPDATE `" . PREFIX_QUERY . "users_bck` SET
                    user_id_bck='1',
                    user_login_bck='" . $_SESSION['user_name'] . "',
                    user_password_bck='" . $hash_password . "',
                    user_name_bck='" . $_SESSION['full_name'] . "',
                    user_email_bck='" . $_SESSION['user_mail'] . "',
                    user_lang_bck='" . $_SESSION['default_language'] . "',
                    user_timezone_bck ='" . $_SESSION['default_timezone'] . "',                  
                    user_theme_bck='" . I18N_DEFAULT_THEME_FOLDER_BCK . "',
                    user_create_date_bck='" . $timestamp . "',
                    user_last_connect_bck='" . $timestamp . "',
                    user_level_access_bck = '1'
                    WHERE
                    user_id_bck='1'";
                    