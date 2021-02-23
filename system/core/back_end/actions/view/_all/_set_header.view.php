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
// meta
//======================================================================
$tags_view['meta'] = function()
{
    $action_tag = 'meta';
    $content    = '';
    
    //-----------------------------------------------------
    // restricted access
    //-----------------------------------------------------
    if (defined("AUTH_ACCESS_BCK") && (AUTH_ACCESS_BCK == 1)) {
        $action_lang_auth   = THEME_LANG_BCK;
        $action_folder_auth = THEME_FOLDER_BCK;
        $action_tpl_auth    = '_all';
        $cache_active       = 1;
        
        if ((defined("THEME_LANG_BCK") && isset($action_lang_auth)) && (defined("THEME_FOLDER_BCK") && isset($action_folder_auth)) && (defined("TPL_AUTH_BCK") && isset($action_tpl_auth))) {
            if ((THEME_LANG_BCK == $action_lang_auth || $action_lang_auth == '_all') && (THEME_FOLDER_BCK == $action_folder_auth || $action_folder_auth == '_all') && (TPL_AUTH_BCK == $action_tpl_auth || $action_tpl_auth == '_all')) {
                if (!defined("GET_PAGE_ID_BCK") || GET_PAGE_ID_BCK === '') {
                    $content .= Fxr_lib\Template::loadSubTemplates('_all' . DS . 'meta' . DS . 'meta__home', '', Fxr_lib\Database::loadQuery('select', "SELECT setting_abbr_lang_bck, setting_default_description_bck, setting_theme_folder_bck FROM " . DB_PREFIX . "settings_bck WHERE setting_abbr_lang_bck = :setting_abbr_lang_bck", '+', array(
                        ':setting_abbr_lang_bck' => array(
                            THEME_LANG_BCK => 's'
                        )
                    )), '', 1);
                    /*
                     * cache
                     */
                    if (defined('UPDATE_CACHE_TAGS_OUTPUTS_BCK') && UPDATE_CACHE_TAGS_OUTPUTS_BCK === 1) {
                        Fxr_lib\Cache::updateCacheTagsOutputs($action_tag, $content, $cache_active);
                    }
                    return $content;
                } else {
                    $content .= Fxr_lib\Template::loadSubTemplates('_all' . DS . 'meta' . DS . 'meta_' . GET_PAGE_ID_BCK . '', '', Fxr_lib\Database::loadQuery('select', "SELECT page_title_bck, page_description_bck, page_theme_folder_bck, page_theme_lang_bck FROM " . DB_PREFIX . "pages_bck WHERE page_id_bck = :page_id_bck", '+', array(
                        ':page_id_bck' => array(
                            GET_PAGE_ID_BCK => 'i'
                        )
                    )), '', 1);
                    /*
                     * cache
                     */
                    if (defined('UPDATE_CACHE_TAGS_OUTPUTS_BCK') && UPDATE_CACHE_TAGS_OUTPUTS_BCK === 1) {
                        Fxr_lib\Cache::updateCacheTagsOutputs($action_tag, $content, $cache_active);
                    }
                    return $content;
                }
            } else {
                return '{' . $action_tag . '}';
            }
        } else {
            return '{' . $action_tag . '}';
        }
        //-----------------------------------------------------
        // public access
        //-----------------------------------------------------
    } else {
        $action_lang   = THEME_LANG_BCK;
        $action_folder = THEME_FOLDER_BCK;
        $action_tpl    = '_home_page';
        $cache_active  = 1;
        
        if ((defined("THEME_LANG_BCK") && isset($action_lang)) && (defined("THEME_FOLDER_BCK") && isset($action_folder)) && (defined("TPL_BCK") && isset($action_tpl))) {
            if ((THEME_LANG_BCK == $action_lang || $action_lang == '_all') && (THEME_FOLDER_BCK == $action_folder || $action_folder == '_all') && (TPL_BCK == $action_tpl || $action_tpl == '_all')) {
                $content .= Fxr_lib\Template::loadSubTemplates('_all' . DS . 'meta' . DS . 'meta__home', '', Fxr_lib\Database::loadQuery('select', "SELECT setting_abbr_lang_bck, setting_default_title_bck, setting_default_description_bck, setting_theme_folder_bck FROM " . DB_PREFIX . "settings_bck WHERE setting_abbr_lang_bck = :setting_abbr_lang_bck", '+', array(
                    ':setting_abbr_lang_bck' => array(
                        THEME_LANG_BCK => 's'
                    )
                )), '', 1);
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
// js
//======================================================================
$tags_view['js'] = function()
{
    $action_tag = 'js';
    $content    = '';
    
    //-----------------------------------------------------
    // restricted access
    //-----------------------------------------------------
    if (defined("AUTH_ACCESS_BCK") && (AUTH_ACCESS_BCK == 1)) {
        $action_lang_auth   = THEME_LANG_BCK;
        $action_folder_auth = THEME_FOLDER_BCK;
        $action_tpl_auth    = '_all';
        $cache_active       = 1;
        
        if ((defined("THEME_LANG_BCK") && isset($action_lang_auth)) && (defined("THEME_FOLDER_BCK") && isset($action_folder_auth)) && (defined("TPL_AUTH_BCK") && isset($action_tpl_auth))) {
            if ((THEME_LANG_BCK == $action_lang_auth || $action_lang_auth == '_all') && (THEME_FOLDER_BCK == $action_folder_auth || $action_folder_auth == '_all') && (TPL_AUTH_BCK == $action_tpl_auth || $action_tpl_auth == '_all')) {
                if (!defined("GET_PAGE_ID_BCK") || GET_PAGE_ID_BCK === '') {
                    $content .= Fxr_lib\Template::loadSubTemplates('_all' . DS . 'js' . DS . 'js__home', '', Fxr_lib\Database::loadQuery('select', "SELECT setting_abbr_lang_bck, setting_theme_folder_bck FROM " . DB_PREFIX . "settings_bck WHERE setting_abbr_lang_bck = :setting_abbr_lang_bck", '+', array(
                        ':setting_abbr_lang_bck' => array(
                            THEME_LANG_BCK => 's'
                        )
                    )), '', 1);
                    /*
                     * cache
                     */
                    if (defined('UPDATE_CACHE_TAGS_OUTPUTS_BCK') && UPDATE_CACHE_TAGS_OUTPUTS_BCK === 1) {
                        Fxr_lib\Cache::updateCacheTagsOutputs($action_tag, $content, $cache_active);
                    }
                    return $content;
                } else {
                    $content .= Fxr_lib\Template::loadSubTemplates('_all' . DS . 'js' . DS . 'js_' . GET_PAGE_ID_BCK . '', '', Fxr_lib\Database::loadQuery('select', "SELECT page_theme_folder_bck, page_theme_lang_bck FROM " . DB_PREFIX . "pages_bck WHERE page_id_bck = :page_id_bck", '+', array(
                        ':page_id_bck' => array(
                            GET_PAGE_ID_BCK => 'i'
                        )
                    )), '', 1);
                    /*
                     * cache
                     */
                    if (defined('UPDATE_CACHE_TAGS_OUTPUTS_BCK') && UPDATE_CACHE_TAGS_OUTPUTS_BCK === 1) {
                        Fxr_lib\Cache::updateCacheTagsOutputs($action_tag, $content, $cache_active);
                    }
                    return $content;
                }
            } else {
                return '{' . $action_tag . '}';
            }
        } else {
            return '{' . $action_tag . '}';
        }
        //-----------------------------------------------------
        // public access
        //-----------------------------------------------------
    } else {
        $action_lang   = THEME_LANG_BCK;
        $action_folder = THEME_FOLDER_BCK;
        $action_tpl    = '_home_page';
        $cache_active  = 1;
        
        if ((defined("THEME_LANG_BCK") && isset($action_lang)) && (defined("THEME_FOLDER_BCK") && isset($action_folder)) && (defined("TPL_BCK") && isset($action_tpl))) {
            if ((THEME_LANG_BCK == $action_lang || $action_lang == '_all') && (THEME_FOLDER_BCK == $action_folder || $action_folder == '_all') && (TPL_BCK == $action_tpl || $action_tpl == '_all')) {
                $content .= Fxr_lib\Template::loadSubTemplates('_all' . DS . 'js' . DS . 'js__home', '', Fxr_lib\Database::loadQuery('select', "SELECT setting_abbr_lang_bck, setting_theme_folder_bck FROM " . DB_PREFIX . "settings_bck WHERE setting_abbr_lang_bck = :setting_abbr_lang_bck", '+', array(
                    ':setting_abbr_lang_bck' => array(
                        THEME_LANG_BCK => 's'
                    )
                )), '', 1);
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
// top_nav
//======================================================================
$tags_view['top_nav'] = function()
{
    $action_tag = 'top_nav';
    $content    = '';
    
    //-----------------------------------------------------
    // restricted access
    //-----------------------------------------------------
    if (defined("AUTH_ACCESS_BCK") && (AUTH_ACCESS_BCK == 1)) {
        $action_lang_auth   = THEME_LANG_BCK;
        $action_folder_auth = THEME_FOLDER_BCK;
        $action_tpl_auth    = '_all';
        $cache_active       = 1;
        
        if ((defined("THEME_LANG_BCK") && isset($action_lang_auth)) && (defined("THEME_FOLDER_BCK") && isset($action_folder_auth)) && (defined("TPL_AUTH_BCK") && isset($action_tpl_auth))) {
            if ((THEME_LANG_BCK == $action_lang_auth || $action_lang_auth == '_all') && (THEME_FOLDER_BCK == $action_folder_auth || $action_folder_auth == '_all') && (TPL_AUTH_BCK == $action_tpl_auth || $action_tpl_auth == '_all')) {
                if (defined("POST_LOGIN") && POST_LOGIN !== '' && defined("POST_PASSWORD") && POST_PASSWORD !== '') {
                    $content .= Fxr_lib\Template::loadSubTemplates('_all' . DS . 'top_nav' . DS . 'top_nav', '', Fxr_lib\Database::loadQuery('select', "SELECT user_login_bck FROM " . DB_PREFIX . "users_bck WHERE user_login_bck = :user_login_bck", '+', array(
                        ':user_login_bck' => array(
                            POST_LOGIN => 's'
                        )
                    )), array(
                        'home_admin' => DIR_INDEX_CURL . SYSTEM . DS . 'index.php',
                        'view_backend' => DIR_INDEX_CURL
                    ), 1);
                    /*
                     * cache
                     */
                    if (defined('UPDATE_CACHE_TAGS_OUTPUTS_BCK') && UPDATE_CACHE_TAGS_OUTPUTS_BCK === 1) {
                        Fxr_lib\Cache::updateCacheTagsOutputs($action_tag, $content, $cache_active);
                    }
                    return $content;
                } elseif (isset($_SESSION['post_login']) && $_SESSION['post_login'] !== '' && isset($_SESSION['post_password']) && $_SESSION['post_password'] !== '') {
                    $content .= Fxr_lib\Template::loadSubTemplates('_all' . DS . 'top_nav' . DS . 'top_nav', '', Fxr_lib\Database::loadQuery('select', "SELECT user_login_bck FROM " . DB_PREFIX . "users_bck WHERE user_login_bck = :user_login_bck", '+', array(
                        ':user_login_bck' => array(
                            $_SESSION['post_login'] => 's'
                        )
                    )), array(
                        'home_admin' => DIR_INDEX_CURL . SYSTEM . DS . 'index.php',
                        'view_backend' => DIR_INDEX_CURL
                    ), 1);
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
    
    //-----------------------------------------------------
    // restricted access
    //-----------------------------------------------------
    if (defined("AUTH_ACCESS_BCK") && (AUTH_ACCESS_BCK == 1)) {
        
        $action_lang_auth   = THEME_LANG_BCK;
        $action_folder_auth = THEME_FOLDER_BCK;
        $action_tpl_auth    = '_all';
        $cache_active       = 1;
        
        /*
         * loads nav home
         */
        # Not active
        if (defined("GET_PAGE_ID_BCK") && GET_PAGE_ID_BCK !== '') {
            $content .= Fxr_lib\Template::loadSubTemplates('_all' . DS . 'nav' . DS . 'nav_home', 1, '', '', 1);
            # Active
        } else {
            $content .= Fxr_lib\Template::loadSubTemplates('_all' . DS . 'nav' . DS . 'nav_home_active', 1, '', '', 1);
        }
        
        /*
         * prepares nav WITHOUT subnav
         */
        $arr_page_id_nav    = array();
        $arr_page_title_nav = array();
        $nav                = array();
        
        foreach (Fxr_lib\Database::loadQuery('select', "SELECT page_id_bck, page_title_bck FROM " . DB_PREFIX . "pages_bck WHERE page_in_nav_bck = '1'  AND page_in_sub_nav_bck = '0' AND page_theme_lang_bck = :page_theme_lang_bck", '+', array(
            ':page_theme_lang_bck' => array(
                THEME_LANG_BCK => 's'
            )
        )) as $results) {
            foreach ($results as $key => $value) {
                if ($key === 'page_id_bck') {
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
        
        foreach (Fxr_lib\Database::loadQuery('select', "SELECT page_in_sub_nav_bck, page_id_bck, page_title_bck FROM " . DB_PREFIX . "pages_bck WHERE page_in_nav_bck = '1' AND page_in_sub_nav_bck != '0' AND page_theme_lang_bck = :page_theme_lang_bck", '+', array(
            ':page_theme_lang_bck' => array(
                THEME_LANG_BCK => 's'
            )
        )) as $results) {
            foreach ($results as $key => $value) {
                if ($key === 'page_in_sub_nav_bck') {
                    $arr_in_subnav[] = $value;
                }
                if ($key === 'page_id_bck') {
                    $arr_page_id_subnav[] = $value;
                }
                if ($key === 'page_title_bck') {
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
                                'page_id_bck' => $page_id_subnav2,
                                'page_title_bck' => $page_title_subnav
                            ), 1);
                        }
                    }
                }
                if (defined("GET_PAGE_ID_bck") && in_array(GET_PAGE_ID_BCK, $arr_page_id_subnav2)) {
                    $content .= Fxr_lib\Template::loadSubTemplates('_all' . DS . 'nav' . DS . 'nav_subnav_active', 1, '', array(
                        'page_id_bck' => $page_id_nav,
                        'page_title_bck' => $page_title_nav,
                        'subnav' => $sub_content
                    ), 1);
                } else {
                    $content .= Fxr_lib\Template::loadSubTemplates('_all' . DS . 'nav' . DS . 'nav_subnav', 1, '', array(
                        'page_id_bck' => $page_id_nav,
                        'page_title_bck' => $page_title_nav,
                        'subnav' => $sub_content
                    ), 1);
                }
            # Nav without subnav
            } else {
                if (defined("GET_PAGE_ID_bck") && GET_PAGE_ID_BCK == $page_id_nav) {
                    $content .= Fxr_lib\Template::loadSubTemplates('_all' . DS . 'nav' . DS . 'nav_active', 1, '', array(
                        'page_id_bck' => $page_id_nav,
                        'page_title_bck' => $page_title_nav,
                        'subnav' => ''
                    ), 1);
                } else {
                    $content .= Fxr_lib\Template::loadSubTemplates('_all' . DS . 'nav' . DS . 'nav', 1, '', array(
                        'page_id_bck' => $page_id_nav,
                        'page_title_bck' => $page_title_nav,
                        'subnav' => ''
                    ), 1);
                }
            }
        }
        /*
         * cache
         */
        if (defined('UPDATE_CACHE_TAGS_OUTPUTS_BCK') && UPDATE_CACHE_TAGS_OUTPUTS_BCK === 1) {
            Fxr_lib\Cache::updateCacheTagsOutputs($action_tag, $content, $cache_active);
        }
        return $content;
    } else {
    }
};

//======================================================================
// breadcrumb
//======================================================================
$tags_view['breadcrumb'] = function()
{
    $action_tag = 'breadcrumb';
    $content    = '';
    
    //-----------------------------------------------------
    // restricted access
    //-----------------------------------------------------
    if (defined("AUTH_ACCESS_BCK") && (AUTH_ACCESS_BCK == 1)) {
        $action_lang_auth   = THEME_LANG_BCK;
        $action_folder_auth = THEME_FOLDER_BCK;
        $action_tpl_auth    = '_all';
        $cache_active       = 1;
        
        if ((defined("THEME_LANG_BCK") && isset($action_lang_auth)) && (defined("THEME_FOLDER_BCK") && isset($action_folder_auth)) && (defined("TPL_AUTH_BCK") && isset($action_tpl_auth))) {
            if ((THEME_LANG_BCK == $action_lang_auth || $action_lang_auth == '_all') && (THEME_FOLDER_BCK == $action_folder_auth || $action_folder_auth == '_all') && (TPL_AUTH_BCK == $action_tpl_auth || $action_tpl_auth == '_all')) {
                
                if (defined("GET_PAGE_ID_BCK") && GET_PAGE_ID_BCK !== '') {
                    if (Fxr_lib\Database::loadQuery('select', "SELECT page_title_bck FROM " . DB_PREFIX . "pages_bck WHERE page_id_bck = :page_id_bck AND page_in_nav_bck = '1'", '+', array(
                        ':page_id_bck' => array(
                            GET_PAGE_ID_BCK => 'i'
                        )
                    ))) {
                        $content .= Fxr_lib\Template::loadSubTemplates('_all' . DS . 'breadcrumb' . DS . 'breadcrumb_home_link', 1, '', array(
                            'home_admin' => DIR_INDEX_CURL . SYSTEM
                        ), 1);
                        $content .= Fxr_lib\Template::loadSubTemplates('_all' . DS . 'breadcrumb' . DS . 'breadcrumb_nav', '', Fxr_lib\Database::loadQuery('select', "SELECT page_title_bck FROM " . DB_PREFIX . "pages_bck WHERE page_id_bck =  '" . GET_PAGE_ID_BCK . "'", '+', ''), '', 1);
                    }
                    
                    if (Fxr_lib\Database::loadQuery('select', "SELECT page_title_bck FROM " . DB_PREFIX . "pages_bck WHERE page_id_bck = :page_id_bck AND page_in_nav_bck = '0'", '+', array(
                        ':page_id_bck' => array(
                            GET_PAGE_ID_BCK => 'i'
                        )
                    ))) {
                        $content .= Fxr_lib\Template::loadSubTemplates('_all' . DS . 'breadcrumb' . DS . 'breadcrumb_home_link', 1, '', array(
                            'home_admin' => DIR_INDEX_CURL . SYSTEM
                        ), 1);
                        $content .= Fxr_lib\Template::loadSubTemplates('_all' . DS . 'breadcrumb' . DS . 'breadcrumb_nav_link', '', Fxr_lib\Database::loadQuery('select', "SELECT page_id_bck, page_title_bck FROM " . DB_PREFIX . "pages_bck WHERE page_id_bck =  :page_id_bck", '+', array(
                            ':page_id_bck' => array(
                                Fxr_lib\Database::loadQuery('select', "SELECT page_in_sub_nav_bck FROM " . DB_PREFIX . "pages_bck WHERE page_id_bck = :page_id_bck", '', array(
                                    ':page_id_bck' => array(
                                        GET_PAGE_ID_BCK => 'i'
                                    )
                                )) => 'i'
                            )
                        )), '', 1);
                        $content .= Fxr_lib\Template::loadSubTemplates('_all' . DS . 'breadcrumb' . DS . 'breadcrumb_nav', '', Fxr_lib\Database::loadQuery('select', "SELECT page_title_bck FROM " . DB_PREFIX . "pages_bck WHERE page_id_bck =  '" . GET_PAGE_ID_BCK . "'", '+', ''), '', 1);
                    }
                } else {
                    $content .= Fxr_lib\Template::loadSubTemplates('_all' . DS . 'breadcrumb' . DS . 'breadcrumb_home', 1, '', '', 1);
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
// website_url
//======================================================================
$tags_view['website_url'] = function()
{
    $action_tag = 'website_url';
    $content    = '';
    
    //-----------------------------------------------------
    // restricted access
    //-----------------------------------------------------
    if (defined("AUTH_ACCESS_BCK") && (AUTH_ACCESS_BCK == 1)) {
        $action_lang_auth   = THEME_LANG_BCK;
        $action_folder_auth = THEME_FOLDER_BCK;
        $action_tpl_auth    = '_all';
        $cache_active       = 1;
        
        if ((defined("THEME_LANG_BCK") && isset($action_lang_auth)) && (defined("THEME_FOLDER_BCK") && isset($action_folder_auth)) && (defined("TPL_AUTH_BCK") && isset($action_tpl_auth))) {
            if ((THEME_LANG_BCK == $action_lang_auth || $action_lang_auth == '_all') && (THEME_FOLDER_BCK == $action_folder_auth || $action_folder_auth == '_all') && (TPL_AUTH_BCK == $action_tpl_auth || $action_tpl_auth == '_all')) {
        
        	$uri = $_SERVER['REQUEST_URI'];
        	$uri_exploded = explode(DS, $uri);
        	
        	$front_uri = str_replace($uri_exploded[count($uri_exploded)-2].DS.$uri_exploded[count($uri_exploded)-1], "", $_SERVER['REQUEST_URI']);
        	
        	$content = $_SERVER['HTTP_HOST'] . $front_uri . 'index.php';
                
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
