<?php
namespace actions;

use libraries\fxr_lib as Fxr_lib;
use libraries\add as Add;

if (!defined('FXR_INDEX')) {
    header('HTTP/1.1 403 Forbidden');
    exit('No direct script access allowed');
}
/**
 * Title: FXR Actions No View (Back-End)
 *
 * @author Fabien Assenarre
 * @link http://www.flexireed.org
 * @copyright Copyright &copy; 2020 Fabien Assenarre
 * @license http://opensource.org/licenses/MIT
 *
 */

$actions_no_view['add_page'] = function()
{
    //-----------------------------------------------------
    // restricted access
    //-----------------------------------------------------
    if (defined("AUTH_ACCESS_BCK") && (AUTH_ACCESS_BCK == 1)) {
        $action_lang_auth   = THEME_LANG_BCK;
        $action_folder_auth = THEME_FOLDER_BCK;
        $action_tpl_auth    = '2_add_page';
        
        if ((defined("THEME_LANG_BCK") && isset($action_lang_auth)) && (defined("THEME_FOLDER_BCK") && isset($action_folder_auth)) && (defined("TPL_AUTH_BCK") && isset($action_tpl_auth))) {
            if ((THEME_LANG_BCK == $action_lang_auth || $action_lang_auth == '_all') && (THEME_FOLDER_BCK == $action_folder_auth || $action_folder_auth == '_all') && (TPL_AUTH_BCK == $action_tpl_auth || $action_tpl_auth == '_all')) {
                
                if (isset($_POST['page_submitted']) && $_POST['page_submitted'] !== '') {
                    
                    if (defined("GET_MODIFIED_ID") && GET_MODIFIED_ID !== '') {
             
                        if (defined("POST_META_TITLE") && defined("POST_URL_TITLE") && defined("POST_META_DESCRIPTION") && defined("POST_SUMMARY") && defined("POST_BODY") && defined("POST_AUTH_ACCESS") && defined("POST_THEME_LANG_BCK") && defined("POST_THEME_FOLDER_BCK") && defined("POST_THEME_TPL_BCK") && defined("POST_IN_HOME") && defined("POST_IN_NAV") && defined("POST_IN_SUBNAV") && defined("POST_IN_CACHE") && defined("POST_CACHE_DURATION")) {
                            
                            if (!Fxr_lib\Database::loadQuery('update', "UPDATE " . DB_PREFIX . "pages_frt SET page_posted_frt = :page_posted_frt, page_author_frt = :page_author_frt, page_title_frt = :page_title_frt, page_title_url_frt = :page_title_url_frt, page_description_frt = :page_description_frt, page_summary_frt = :page_summary_frt, page_body_frt = :page_body_frt, page_in_home_frt = :page_in_home_frt, page_in_nav_frt = :page_in_nav_frt, page_in_sub_nav_frt = :page_in_sub_nav_frt, page_in_cache_frt = :page_in_cache_frt, page_auth_access_frt = :page_auth_access_frt, page_theme_tpl_frt = :page_theme_tpl_frt, page_theme_folder_frt = :page_theme_folder_frt, page_theme_lang_frt = :page_theme_lang_frt, page_init_cache_time_frt = :page_init_cache_time_frt, page_duration_cache_time_frt = :page_duration_cache_time_frt WHERE page_id_frt = :page_id_frt", '', array(
                                ':page_id_frt' => array(
                                    GET_MODIFIED_ID => 's'
                                ),
                                ':page_posted_frt' => array(
                                    date("Y-m-d H:i:s", time()) => 's'
                                ),
                                ':page_author_frt' => array(
                                    $_SESSION['post_login'] => 's'
                                ),
                                ':page_title_frt' => array(
                                    POST_META_TITLE => 's'
                                ),
                                ':page_title_url_frt' => array(
                                    strtolower(trim(preg_replace('~[^0-9a-z]+~i', '-', html_entity_decode(preg_replace('~&([a-z]{1,2})(?:acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);~i', '$1', htmlentities(POST_URL_TITLE, ENT_QUOTES, 'UTF-8')), ENT_QUOTES, 'UTF-8')), '-')) => 's'
                                ),
                                ':page_description_frt' => array(
                                    POST_META_DESCRIPTION => 's'
                                ),
                                ':page_summary_frt' => array(
                                    POST_SUMMARY => 's'
                                ),
                                ':page_body_frt' => array(
                                    POST_BODY => 's'
                                ),
                                ':page_in_home_frt' => array(
                                    POST_IN_HOME => 'i'
                                ),
                                ':page_in_nav_frt' => array(
                                    POST_IN_NAV => 'i'
                                ),
                                ':page_in_sub_nav_frt' => array(
                                    POST_IN_SUBNAV => 'i'
                                ),
                                ':page_in_cache_frt' => array(
                                    POST_IN_CACHE => 'i'
                                ),
                                ':page_auth_access_frt' => array(
                                    POST_AUTH_ACCESS => 'i'
                                ),
                                ':page_theme_tpl_frt' => array(
                                    POST_THEME_TPL_BCK => 's'
                                ),
                                ':page_theme_folder_frt' => array(
                                    POST_THEME_FOLDER_BCK => 's'
                                ),
                                ':page_theme_lang_frt' => array(
                                    POST_THEME_LANG_BCK => 's'
                                ),
                                ':page_init_cache_time_frt' => array(
                                    date("Y-m-d H:i:s", time()) => 's'
                                ),
                                ':page_duration_cache_time_frt' => array(
                                    POST_CACHE_DURATION => 's'
                                )
                            ))) {
                                $_SESSION['modified_page'] = GET_MODIFIED_ID;
                                header('Location: index.php?page_id=3&success');
                                exit();
                            } else {
                                header('Location: index.php?page_id=2&modified_id=' . GET_MODIFIED_ID . '&fail');
                                exit();
                            }
                        } else {
                            header('Location: index.php?page_id=2&modified_id=' . GET_MODIFIED_ID . '&fail');
                            exit();
                        }   
                         
                    } else {
                        if (defined("POST_META_TITLE") && defined("POST_URL_TITLE") && defined("POST_META_DESCRIPTION") && defined("POST_SUMMARY") && defined("POST_BODY") && defined("POST_AUTH_ACCESS") && defined("POST_THEME_LANG_BCK") && defined("POST_THEME_FOLDER_BCK") && defined("POST_THEME_TPL_BCK") && defined("POST_IN_HOME") && defined("POST_IN_NAV") && defined("POST_IN_SUBNAV") && defined("POST_IN_CACHE") && defined("POST_CACHE_DURATION")) {
                            
                            if (!Fxr_lib\Database::loadQuery('insert', "INSERT INTO " . DB_PREFIX . "pages_frt (page_id_frt, page_posted_frt, page_author_frt, page_title_frt, page_title_url_frt, page_description_frt, page_summary_frt, page_body_frt, page_in_home_frt, page_in_nav_frt, page_in_sub_nav_frt, page_in_cache_frt, page_auth_access_frt, page_theme_tpl_frt, page_theme_folder_frt, page_theme_lang_frt, page_init_cache_time_frt, page_duration_cache_time_frt) VALUES (:page_id_frt, :page_posted_frt, :page_author_frt, :page_title_frt, :page_title_url_frt, :page_description_frt, :page_summary_frt, :page_body_frt, :page_in_home_frt, :page_in_nav_frt, :page_in_sub_nav_frt, :page_in_cache_frt, :page_auth_access_frt, :page_theme_tpl_frt, :page_theme_folder_frt, :page_theme_lang_frt, :page_init_cache_time_frt, :page_duration_cache_time_frt)", '', array(
                                ':page_id_frt' => array(
                                    '' => 'i'
                                ),
                                ':page_posted_frt' => array(
                                    date("Y-m-d H:i:s", time()) => 's'
                                ),
                                ':page_author_frt' => array(
                                    $_SESSION['post_login'] => 's'
                                ),
                                ':page_title_frt' => array(
                                    POST_META_TITLE => 's'
                                ),
                                ':page_title_url_frt' => array(
                                    strtolower(trim(preg_replace('~[^0-9a-z]+~i', '-', html_entity_decode(preg_replace('~&([a-z]{1,2})(?:acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);~i', '$1', htmlentities(POST_URL_TITLE, ENT_QUOTES, 'UTF-8')), ENT_QUOTES, 'UTF-8')), '-')) => 's'
                                ),
                                ':page_description_frt' => array(
                                    POST_META_DESCRIPTION => 's'
                                ),
                                ':page_summary_frt' => array(
                                    POST_SUMMARY => 's'
                                ),
                                ':page_body_frt' => array(
                                    POST_BODY => 's'
                                ),
                                ':page_in_home_frt' => array(
                                    POST_IN_HOME => 'i'
                                ),
                                ':page_in_nav_frt' => array(
                                    POST_IN_NAV => 'i'
                                ),
                                ':page_in_sub_nav_frt' => array(
                                    POST_IN_SUBNAV => 'i'
                                ),
                                ':page_in_cache_frt' => array(
                                    POST_IN_CACHE => 'i'
                                ),
                                ':page_auth_access_frt' => array(
                                    POST_AUTH_ACCESS => 'i'
                                ),
                                ':page_theme_tpl_frt' => array(
                                    POST_THEME_TPL_BCK => 's'
                                ),
                                ':page_theme_folder_frt' => array(
                                    POST_THEME_FOLDER_BCK => 's'
                                ),
                                ':page_theme_lang_frt' => array(
                                    POST_THEME_LANG_BCK => 's'
                                ),
                                ':page_init_cache_time_frt' => array(
                                    date("Y-m-d H:i:s", time()) => 's'
                                ),
                                ':page_duration_cache_time_frt' => array(
                                    POST_CACHE_DURATION => 's'
                                )
                            ))) {
                                $_SESSION['saved_page'] = 1;
                                header('Location: index.php?page_id=3&success');
                                exit();
                            } else {
                                header('Location: index.php?page_id=2&fail');
                                exit();
                            }
                        } else {
                            header('Location: index.php?page_id=2&fail');
                            exit();
                        }
                    }
                }
            }
        }
    }
};
