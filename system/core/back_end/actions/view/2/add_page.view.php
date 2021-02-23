<?php
namespace actions;

use libraries\fxr_lib as Fxr_lib;
use libraries\add as Add;

if (!defined('FXR_INDEX')) {
    header('HTTP/1.1 403 Forbidden');
    exit('No direct script access allowed');
}
/**
 * Title: FXR Tags (Back-End)
 *
 * @author Fabien Assenarre
 * @link http://www.flexireed.org
 * @copyright Copyright &copy; 2020 Fabien Assenarre
 * @license http://opensource.org/licenses/MIT
 *
 */

//======================================================================
// form_fields
//======================================================================
$tags_view['form_fields'] = function()
{
    $action_tag = 'form_fields';
    $content    = '';
    
    //-----------------------------------------------------
    // restricted access
    //-----------------------------------------------------
    if (defined("AUTH_ACCESS_BCK") && (AUTH_ACCESS_BCK == 1)) {
        $action_lang_auth   = THEME_LANG_BCK;
        $action_folder_auth = THEME_FOLDER_BCK;
        $action_tpl_auth    = '2_add_page';
        $cache_active       = 0;
        
        if ((defined("THEME_LANG_BCK") && isset($action_lang_auth)) && (defined("THEME_FOLDER_BCK") && isset($action_folder_auth)) && (defined("TPL_AUTH_BCK") && isset($action_tpl_auth))) {
            if ((THEME_LANG_BCK == $action_lang_auth || $action_lang_auth == '_all') && (THEME_FOLDER_BCK == $action_folder_auth || $action_folder_auth == '_all') && (TPL_AUTH_BCK == $action_tpl_auth || $action_tpl_auth == '_all')) {
                
                if (defined("GET_MODIFIED_ID") && GET_MODIFIED_ID !== '') {
                    if (Fxr_lib\Database::loadQuery('select', "SELECT page_id_frt FROM " . DB_PREFIX . "pages_frt WHERE page_id_frt = :page_id_frt", '+', array(
                        ':page_id_frt' => array(
                            GET_MODIFIED_ID => 'i'
                        )
                    ))) {
                        $content .= Fxr_lib\Template::loadSubTemplates('2_add_page' . DS . 'add_page_form_fields_modified', '', Fxr_lib\Database::loadQuery('select', "SELECT page_id_frt, page_title_frt, page_title_url_frt, page_description_frt, page_summary_frt, page_body_frt, page_in_home_frt, page_in_nav_frt, page_in_sub_nav_frt, page_in_cache_frt, page_auth_access_frt, page_theme_tpl_frt, page_theme_folder_frt, page_theme_lang_frt, page_duration_cache_time_frt   FROM " . DB_PREFIX . "pages_frt WHERE page_id_frt = :page_id_frt", '+', array(
                            ':page_id_frt' => array(
                                GET_MODIFIED_ID => 'i'
                            )
                        )), array(
                            (isset($_SESSION['meta_title']) && $_SESSION['meta_title'] !== '') ? 'page_title_frt' : '' => $_SESSION['meta_title'],
                            (isset($_SESSION['url_title']) && $_SESSION['url_title'] !== '') ? 'page_title_url_frt' : '' => $_SESSION['meta_title'],
                            (isset($_SESSION['meta_description']) && $_SESSION['meta_description'] !== '') ? 'page_description_frt' : '' => $_SESSION['meta_description'],
                            (isset($_SESSION['summary']) && $_SESSION['summary'] !== '') ? 'page_summary_frt' : '' => $_SESSION['summary'],
                            (isset($_SESSION['body']) && $_SESSION['body'] !== '') ? 'page_body_frt' : '' => $_SESSION['body'],
                            (isset($_SESSION['auth_access']) && $_SESSION['auth_access'] !== '') ? 'page_auth_access_frt' : '' => $_SESSION['auth_access'],
                            (isset($_SESSION['theme_lang_bck']) && $_SESSION['theme_lang_bck'] !== '') ? 'page_theme_lang_frt' : '' => $_SESSION['theme_lang_bck'],
                            (isset($_SESSION['theme_folder_bck']) && $_SESSION['theme_folder_bck'] !== '') ? 'page_theme_folder_frt' : '' => $_SESSION['theme_folder_bck'],
                            (isset($_SESSION['theme_tpl_bck']) && $_SESSION['theme_tpl_bck'] !== '') ? 'page_theme_tpl_frt' : '' => $_SESSION['theme_tpl_bck'],
                            (isset($_SESSION['in_home']) && $_SESSION['in_home'] !== '') ? 'page_in_home_frt' : '' => $_SESSION['in_home'],
                            (isset($_SESSION['in_nav']) && $_SESSION['in_nav'] !== '') ? 'page_in_nav_frt' : '' => $_SESSION['in_nav'],
                            (isset($_SESSION['in_subnav']) && $_SESSION['in_subnav'] !== '') ? 'page_in_sub_nav_frt' : '' => $_SESSION['in_subnav'],
                            (isset($_SESSION['in_cache']) && $_SESSION['in_cache'] !== '') ? 'page_in_cache_frt' : '' => $_SESSION['in_cache'],
                            (isset($_SESSION['cache_duration']) && $_SESSION['cache_duration'] !== '') ? 'page_duration_cache_time_frt' : '' => $_SESSION['cache_duration'],
                            'page_in_home_frt' => Fxr_lib\Database::loadQuery('select', "SELECT page_in_home_frt FROM " . DB_PREFIX . "pages_frt WHERE page_id_frt = :page_id_frt", '', array(
                                ':page_id_frt' => array(
                                    GET_MODIFIED_ID => 'i'
                                )
                            )) == '1' ? Fxr_lib\Template::loadSubTemplates('2_add_page' . DS . 'add_page_select_option_1', 1, '', '') : Fxr_lib\Template::loadSubTemplates('2_add_page' . DS . 'add_page_select_option_0', 1, '', ''),
                            'page_in_nav_frt' => Fxr_lib\Database::loadQuery('select', "SELECT page_in_nav_frt FROM " . DB_PREFIX . "pages_frt WHERE page_id_frt = :page_id_frt", '', array(
                                ':page_id_frt' => array(
                                    GET_MODIFIED_ID => 'i'
                                )
                            )) == '1' ? Fxr_lib\Template::loadSubTemplates('2_add_page' . DS . 'add_page_select_option_1', 1, '', '') : Fxr_lib\Template::loadSubTemplates('2_add_page' . DS . 'add_page_select_option_0', 1, '', ''),
                            'page_in_cache_frt' => Fxr_lib\Database::loadQuery('select', "SELECT page_in_cache_frt FROM " . DB_PREFIX . "pages_frt WHERE page_id_frt = :page_id_frt", '', array(
                                ':page_id_frt' => array(
                                    GET_MODIFIED_ID => 'i'
                                )
                            )) == '1' ? Fxr_lib\Template::loadSubTemplates('2_add_page' . DS . 'add_page_select_option_1', 1, '', '') : Fxr_lib\Template::loadSubTemplates('2_add_page' . DS . 'add_page_select_option_0', 1, '', '')
                        ), 1);
                    }
                    $_SESSION['meta_title']       = '';
                    $_SESSION['url_title']        = '';
                    $_SESSION['meta_description'] = '';
                    $_SESSION['summary']          = '';
                    $_SESSION['body']             = '';
                    $_SESSION['auth_access']      = '';
                    $_SESSION['theme_lang_bck']   = '';
                    $_SESSION['theme_folder_bck'] = '';
                    $_SESSION['theme_tpl_bck']    = '';
                    $_SESSION['in_home']          = '';
                    $_SESSION['in_nav']           = '';
                    $_SESSION['in_subnav']        = '';
                    $_SESSION['in_cache']         = '';
                    $_SESSION['cache_duration']   = '';
                } else {
                    $content .= Fxr_lib\Template::loadSubTemplates('2_add_page' . DS . 'add_page_form_fields', 1, '', array(
                        'page_title_frt' => '' . (isset($_GET['fail']) && $_SESSION['meta_title']  !== '') ? $_SESSION['meta_title'] : '' . $_SESSION['meta_title'] = '',
                        'page_title_url_frt' => '' . (isset($_GET['fail']) && isset($_SESSION['url_title']) && $_SESSION['url_title'] !== '') ? $_SESSION['url_title'] : '' . $_SESSION['url_title'] = '',
                        'page_description_frt' => '' . (isset($_GET['fail']) && isset($_SESSION['meta_description']) && $_SESSION['meta_description'] !== '') ? $_SESSION['meta_description'] : '' . $_SESSION['meta_description'] = '',
                        'page_summary_frt' => '' . (isset($_GET['fail']) && isset($_SESSION['summary']) && $_SESSION['summary'] !== '') ? $_SESSION['summary'] : '' . '',
                        'page_body_frt' => '' . (isset($_GET['fail']) && isset($_SESSION['body']) && $_SESSION['body'] !== '') ? $_SESSION['body'] : '' . '',
                        'page_auth_access_frt' => '' . (isset($_GET['fail']) && isset($_SESSION['auth_access']) && $_SESSION['auth_access'] !== '') ? $_SESSION['auth_access'] : '0',
                        'page_theme_lang_frt' => '' . (isset($_GET['fail']) && isset($_SESSION['theme_lang_bck']) && $_SESSION['theme_lang_bck'] !== '') ? $_SESSION['theme_lang_bck'] : '' . DEFAULT_LANGUAGE_FRT,
                        'page_theme_folder_frt' => '' . (isset($_GET['fail']) && isset($_SESSION['theme_folder_bck']) && $_SESSION['theme_folder_bck'] !== '') ? $_SESSION['theme_folder_bck'] : '' . DEFAULT_THEME_FOLDER_FRT,
                        'page_theme_tpl_frt' => '' . (isset($_GET['fail']) && isset($_SESSION['theme_tpl_bck']) && $_SESSION['theme_tpl_bck'] !== '') ? $_SESSION['theme_tpl_bck'] : 'site_page',
                        'page_in_home_frt' => '' . (isset($_GET['fail']) && isset($_SESSION['in_home']) && $_SESSION['in_home'] !== '') ? Fxr_lib\Template::loadSubTemplates('2_add_page' . DS . 'add_page_select_option_' . $_SESSION['in_home'] . '', 1, '', '') : Fxr_lib\Template::loadSubTemplates('2_add_page' . DS . 'add_page_select_option_0', 1, '', ''),
                        'page_in_nav_frt' => '' . (isset($_GET['fail']) && isset($_SESSION['in_nav']) && $_SESSION['in_nav'] !== '') ? Fxr_lib\Template::loadSubTemplates('2_add_page' . DS . 'add_page_select_option_' . $_SESSION['in_nav'] . '', 1, '', '') : Fxr_lib\Template::loadSubTemplates('2_add_page' . DS . 'add_page_select_option_1', 1, '', ''),
                        'page_in_sub_nav_frt' => '' . (isset($_GET['fail']) && isset($_SESSION['in_subnav']) && $_SESSION['in_subnav'] !== '') ? $_SESSION['in_subnav'] : '0',
                        'page_in_cache_frt' => '' . (isset($_GET['fail']) && isset($_SESSION['in_cache']) && $_SESSION['in_cache'] !== '') ? Fxr_lib\Template::loadSubTemplates('2_add_page' . DS . 'add_page_select_option_' . $_SESSION['in_cache'] . '', 1, '', '') : Fxr_lib\Template::loadSubTemplates('2_add_page' . DS . 'add_page_select_option_1', 1, '', ''),
                        'page_duration_cache_time_frt' => '' . (isset($_GET['fail']) && isset($_SESSION['cache_duration']) && $_SESSION['cache_duration'] !== '') ? $_SESSION['cache_duration'] : '' . '31536000'
                    ), 1);
                    $_SESSION['meta_title']       = '';
                    $_SESSION['url_title']        = '';
                    $_SESSION['meta_description'] = '';
                    $_SESSION['summary']          = '';
                    $_SESSION['body']             = '';
                    $_SESSION['auth_access']      = '';
                    $_SESSION['theme_lang_bck']   = '';
                    $_SESSION['theme_folder_bck'] = '';
                    $_SESSION['theme_tpl_bck']    = '';
                    $_SESSION['in_home']          = '';
                    $_SESSION['in_nav']           = '';
                    $_SESSION['in_subnav']        = '';
                    $_SESSION['in_cache']         = '';
                    $_SESSION['cache_duration']   = '';
                }
                /*
                 * cache
                 */
                if (defined('UPDATE_CACHE_TAGS_OUTPUTS_BCK') && UPDATE_CACHE_TAGS_OUTPUTS_BCK === 1) {
                    Fxr_lib\Cache::updateCacheTagsOutputs($action_tag, $content, $cache_active);
                }
                return $content;
            } else {
                return '{' . $action_tag . '}';
            }
        } else {
            return '{' . $action_tag . '}';
        }
    }
};

//======================================================================
// errors_feedbacks
//======================================================================
$tags_view['errors_feedbacks'] = function()
{
    $action_tag = 'errors_feedbacks';
    $content    = '';
    
    //-----------------------------------------------------
    // restricted access
    //-----------------------------------------------------
    if (defined("AUTH_ACCESS_BCK") && (AUTH_ACCESS_BCK == 1)) {
        $action_lang_auth   = THEME_LANG_BCK;
        $action_folder_auth = THEME_FOLDER_BCK;
        $action_tpl_auth    = '2_add_page';
        $cache_active       = 0;
        
        if ((defined("THEME_LANG_BCK") && isset($action_lang_auth)) && (defined("THEME_FOLDER_BCK") && isset($action_folder_auth)) && (defined("TPL_AUTH_BCK") && isset($action_tpl_auth))) {
            if ((THEME_LANG_BCK == $action_lang_auth || $action_lang_auth == '_all') && (THEME_FOLDER_BCK == $action_folder_auth || $action_folder_auth == '_all') && (TPL_AUTH_BCK == $action_tpl_auth || $action_tpl_auth == '_all')) {
                
                if (isset($_GET['fail'])) {
                    $fields               = array(
                        isset($_SESSION['error_meta_title']) ? $_SESSION['error_meta_title'] : '',
                        isset($_SESSION['error_url_title']) ? $_SESSION['error_url_title'] : '',
                        isset($_SESSION['error_meta_description']) ? $_SESSION['error_meta_description'] : '',
                        isset($_SESSION['error_summary']) ? $_SESSION['error_summary'] : '',
                        isset($_SESSION['error_body']) ? $_SESSION['error_body'] : '',
                        isset($_SESSION['error_auth_access']) ? $_SESSION['error_auth_access'] : '',
                        isset($_SESSION['error_theme_lang_bck']) ? $_SESSION['error_theme_lang_bck'] : '',
                        isset($_SESSION['error_theme_folder_bck']) ? $_SESSION['error_theme_folder_bck'] : '',
                        isset($_SESSION['error_theme_tpl_bck']) ? $_SESSION['error_theme_tpl_bck'] : '',
                        isset($_SESSION['error_in_home']) ? $_SESSION['error_in_home'] : '',
                        isset($_SESSION['error_in_nav']) ? $_SESSION['error_in_nav'] : '',
                        isset($_SESSION['error_in_subnav']) ? $_SESSION['error_in_subnav'] : '',
                        isset($_SESSION['error_in_cache']) ? $_SESSION['error_in_cache'] : '',
                        isset($_SESSION['error_cache_duration']) ? $_SESSION['error_cache_duration'] : ''
                    );
                    $fields_without_nulls = array_filter($fields, 'strlen');
                    
                    if (count($fields_without_nulls) == 0) {
                        $content .= '';
                    } elseif (count($fields_without_nulls) == 1) {
                        $content .= Fxr_lib\Template::loadSubTemplates('2_add_page' . DS . 'add_page_error_begin_one', 1, '', '', 1);
                    } else {
                        $content .= Fxr_lib\Template::loadSubTemplates('2_add_page' . DS . 'add_page_error_begin_many', 1, '', '', 1);
                    }
                    foreach ($fields_without_nulls as $key => $field) {
                        $content .= Fxr_lib\Template::loadSubTemplates('2_add_page' . DS . 'add_page_error_empty', 1, '', array(
                            'field' => '' . $field . ''
                        ), 1);
                    }
                    $content .= Fxr_lib\Template::loadSubTemplates('2_add_page' . DS . 'add_page_error_end', 1, '', '', 1);
                }
                $_SESSION['error_meta_title']       = '';
                $_SESSION['error_url_title']        = '';
                $_SESSION['error_meta_description'] = '';
                $_SESSION['error_summary']          = '';
                $_SESSION['error_body']             = '';
                $_SESSION['error_auth_access']      = '';
                $_SESSION['error_theme_lang_bck']   = '';
                $_SESSION['error_theme_folder_bck'] = '';
                $_SESSION['error_theme_tpl_bck']    = '';
                $_SESSION['error_in_home']          = '';
                $_SESSION['error_in_nav']           = '';
                $_SESSION['error_in_subnav']        = '';
                $_SESSION['error_in_cache']         = '';
                $_SESSION['error_cache_duration']   = '';
                /*
                 * cache
                 */
                if (defined('UPDATE_CACHE_TAGS_OUTPUTS_BCK') && UPDATE_CACHE_TAGS_OUTPUTS_BCK === 1) {
                    Fxr_lib\Cache::updateCacheTagsOutputs($action_tag, $content, $cache_active);
                }
                return $content;
            } else {
                return '{' . $action_tag . '}';
            }
        } else {
            return '{' . $action_tag . '}';
        }
    }
};
