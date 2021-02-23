<?php
namespace actions;

use libraries\fxr_lib as Fxr_lib;
use libraries\add as Add;

if (!defined('FXR_INDEX')) {
    header('HTTP/1.1 403 Forbidden');
    exit('No direct script access allowed');
}
/**
 * Title: FXR Tags (Front-End)
 *
 * @author Fabien Assenarre
 * @link http://www.flexireed.org
 * @copyright Copyright &copy; 2017 Fabien Assenarre
 * @license http://opensource.org/licenses/MIT
 *
 */

//======================================================================
// meta
//======================================================================
$tags_view['meta'] = function()
{
    $action_tag = 'meta';
    $content    = '';
    
    if (defined("AUTH_ACCESS_FRT") && (AUTH_ACCESS_FRT == 1)) {
        
    //-----------------------------------------------------
    // public access
    //-----------------------------------------------------
    } else {
        $action_lang   = THEME_LANG_FRT;
        $action_folder = THEME_FOLDER_FRT;
        $action_tpl    = '_all';
        $cache_active  = 1;
        
        if ((defined("THEME_LANG_FRT") && isset($action_lang)) && (defined("THEME_FOLDER_FRT") && isset($action_folder)) && (defined("TPL_FRT") && isset($action_tpl))) {
            if ((THEME_LANG_FRT == $action_lang || $action_lang == '_all') && (THEME_FOLDER_FRT == $action_folder || $action_folder == '_all') && (TPL_FRT == $action_tpl || $action_tpl == '_all')) {
                if (!defined("GET_PAGE_ID_FRT") || GET_PAGE_ID_FRT === '') {
                    $content .= Fxr_lib\Template::loadSubTemplates('_all' . DS . 'meta' . DS . 'meta_home', '', Fxr_lib\Database::loadQuery('select', "SELECT setting_abbr_lang_frt, setting_default_title_frt, setting_default_description_frt, setting_theme_folder_frt, setting_site_name_frt FROM " . DB_PREFIX . "settings_frt WHERE setting_abbr_lang_frt = :setting_abbr_lang_frt", '+', array(
                    ':setting_abbr_lang_frt' => array(
                        THEME_LANG_FRT => 's'
                      )
                    )), '');
                } else {
                    $content .= Fxr_lib\Template::loadSubTemplates('_all_id' . DS . 'meta' . DS . 'meta_id', '', Fxr_lib\Database::loadQuery('select', "SELECT page_title_frt, page_description_frt, page_theme_folder_frt, page_theme_lang_frt FROM " . DB_PREFIX . "pages_frt WHERE page_id_frt = :page_id_frt", '+', array(
                	    ':page_id_frt' => array(
                	        GET_PAGE_ID_FRT => 'i'
                	    )
                    )), '', 1);
                }
                /*
                 * cache
                 */
                if (defined('UPDATE_CACHE_TAGS_OUTPUTS_FRT') && UPDATE_CACHE_TAGS_OUTPUTS_FRT === 1) {
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
// js
//======================================================================
$tags_view['js'] = function()
{
    $action_tag = 'js';
    $content    = '';
    
    if (defined("AUTH_ACCESS_FRT") && (AUTH_ACCESS_FRT == 1)) {
        
    //-----------------------------------------------------
    // public access
    //-----------------------------------------------------
    } else {
        $action_lang   = THEME_LANG_FRT;
        $action_folder = THEME_FOLDER_FRT;
        $action_tpl    = '_all';
        $cache_active  = 1;
        
        if ((defined("THEME_LANG_FRT") && isset($action_lang)) && (defined("THEME_FOLDER_FRT") && isset($action_folder)) && (defined("TPL_FRT") && isset($action_tpl))) {
            if ((THEME_LANG_FRT == $action_lang || $action_lang == '_all') && (THEME_FOLDER_FRT == $action_folder || $action_folder == '_all') && (TPL_FRT == $action_tpl || $action_tpl == '_all')) {
                
                /*
                 * loads js_home tpl
                 */
                $content .= Fxr_lib\Template::loadSubTemplates('_all' . DS . 'js' . DS . 'js_home', '', Fxr_lib\Database::loadQuery('select', "SELECT setting_abbr_lang_frt, setting_theme_folder_frt FROM " . DB_PREFIX . "settings_frt WHERE setting_abbr_lang_frt = :setting_abbr_lang_frt", '+', array(
                    ':setting_abbr_lang_frt' => array(
                        THEME_LANG_FRT => 's'
                    )
                )), '');
                /*
                 * cache
                 */
                if (defined('UPDATE_CACHE_TAGS_OUTPUTS_FRT') && UPDATE_CACHE_TAGS_OUTPUTS_FRT === 1) {
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
// nav
//======================================================================
$tags_view['nav'] = function()
{
    $action_tag = 'nav';
    $content    = '';
    
    if (defined("AUTH_ACCESS_FRT") && (AUTH_ACCESS_FRT == 1)) {
        
    //-----------------------------------------------------
    // public access
    //-----------------------------------------------------
    } else {
        $action_lang_auth   = THEME_LANG_FRT;
        $action_folder_auth = THEME_FOLDER_FRT;
        $action_tpl_auth    = '_all';
        $cache_active       = 1;
        
        /*
         * loads nav home
         */
        # Not active
        if (defined("GET_PAGE_ID_FRT") && GET_PAGE_ID_FRT !== '') {
            $content .= Fxr_lib\Template::loadSubTemplates('_all' . DS . 'nav' . DS . 'nav_home', 1, '', '');
            # Active
        } else {
            $content .= Fxr_lib\Template::loadSubTemplates('_all' . DS . 'nav' . DS . 'nav_home_active', 1, '', '');
        }
        
        /*
         * prepares nav WITHOUT subnav
         */
        $arr_page_id_nav    = array();
        $arr_page_title_nav = array();
        $nav                = array();
        
        foreach (Fxr_lib\Database::loadQuery('select', "SELECT page_id_frt, page_title_frt FROM " . DB_PREFIX . "pages_frt WHERE page_in_nav_frt = '1'  AND page_in_sub_nav_frt = '0' AND page_theme_lang_frt = :page_theme_lang_frt", '+', array(
            ':page_theme_lang_frt' => array(
                THEME_LANG_FRT => 's'
            )
        )) as $results) {
            foreach ($results as $key => $value) {
                if ($key === 'page_id_frt') {
                    $arr_page_id_nav[] = $value;
                } else {
                    $arr_page_title_nav[] = $value;
                }
            }
        }
        $nav = array_combine($arr_page_id_nav, $arr_page_title_nav);
        
        /*
         * prepares nav WITH subnav
         */
        $arr_in_subnav         = array();
        $arr_page_id_subnav    = array();
        $arr_page_title_subnav = array();
        
        foreach (Fxr_lib\Database::loadQuery('select', "SELECT page_in_sub_nav_frt, page_id_frt, page_title_frt FROM " . DB_PREFIX . "pages_frt WHERE page_in_nav_frt = '1' AND page_in_sub_nav_frt != '0' AND page_theme_lang_frt = :page_theme_lang_frt", '+', array(
            ':page_theme_lang_frt' => array(
                THEME_LANG_FRT => 's'
            )
        )) as $results) {
            foreach ($results as $key => $value) {
                if ($key === 'page_in_sub_nav_frt') {
                    $arr_in_subnav[] = $value;
                }
                if ($key === 'page_id_frt') {
                    $arr_page_id_subnav[] = $value;
                }
                if ($key === 'page_title_frt') {
                    $arr_page_title_subnav[] = $value;
                }
            }
        }
        $arr_page_id_in_subnav    = array_combine($arr_page_id_subnav, $arr_in_subnav);
        $arr_page_id_title_subnav = array_combine($arr_page_id_subnav, $arr_page_title_subnav);
        
        /*
         * loads menu
         */
        foreach ($nav as $page_id_nav => $page_title_nav) {
            # Nav with subnav
            if (in_array($page_id_nav, $arr_page_id_in_subnav)) {
                $sub_content = '';
                foreach ($arr_page_id_in_subnav as $page_id_subnav => $in_subnav) {
                    foreach ($arr_page_id_title_subnav as $page_id_subnav2 => $page_title_subnav) {
                        if ($page_id_nav == $in_subnav && $page_id_subnav == $page_id_subnav2) {
                            // loads subnav
                            $arr_page_id_subnav2[] = $page_id_subnav;
                            $sub_content .= Fxr_lib\Template::loadSubTemplates('_all' . DS . 'nav' . DS . 'nav', 1, '', array(
                                'page_id_frt' => $page_id_subnav2,
                                'page_title_frt' => $page_title_subnav
                            ), '');
                        }
                    }
                }
                if (defined("GET_PAGE_ID_FRT") && in_array(GET_PAGE_ID_FRT, $arr_page_id_subnav2)) {
                    $content .= Fxr_lib\Template::loadSubTemplates('_all' . DS . 'nav' . DS . 'nav_subnav_active', 1, '', array(
                        'page_id_frt' => $page_id_nav,
                        'page_title_frt' => $page_title_nav,
                        'subnav' => $sub_content
                    ), '');
                } else {
                    $content .= Fxr_lib\Template::loadSubTemplates('_all' . DS . 'nav' . DS . 'nav_subnav', 1, '', array(
                        'page_id_frt' => $page_id_nav,
                        'page_title_frt' => $page_title_nav,
                        'subnav' => $sub_content
                    ), '');
                }
            # Nav without subnav
            } else {
                if (defined("GET_PAGE_ID_FRT") && GET_PAGE_ID_FRT == $page_id_nav) {
                    $content .= Fxr_lib\Template::loadSubTemplates('_all' . DS . 'nav' . DS . 'nav_active', 1, '', array(
                        'page_id_frt' => $page_id_nav,
                        'page_title_frt' => $page_title_nav,
                        'subnav' => ''
                    ), '');
                } else {
                    $content .= Fxr_lib\Template::loadSubTemplates('_all' . DS . 'nav' . DS . 'nav', 1, '', array(
                        'page_id_frt' => $page_id_nav,
                        'page_title_frt' => $page_title_nav,
                        'subnav' => ''
                    ), '');
                }
            }
        }
        /*
         * cache
         */
        if (defined('UPDATE_CACHE_TAGS_OUTPUTS_FRT') && UPDATE_CACHE_TAGS_OUTPUTS_FRT === 1) {
            Fxr_lib\Cache::updateCacheTagsOutputs($action_tag, $content, $cache_active);
        }
        return $content;
    }
};
