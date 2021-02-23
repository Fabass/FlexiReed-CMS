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
 // form_feedbacks
 //======================================================================
 $tags_view['form_feedbacks'] = function()
 {
     $action_tag = 'form_feedbacks';
     $content    = '';
     
     //-----------------------------------------------------
     // restricted access
     //-----------------------------------------------------
     if (defined("AUTH_ACCESS_BCK") && (AUTH_ACCESS_BCK == 1)) {
         $action_lang_auth   = THEME_LANG_BCK;
         $action_folder_auth = THEME_FOLDER_BCK;
         $action_tpl_auth    = '6_manage_users';
         $cache_active       = 0;
         
         if ((defined("THEME_LANG_BCK") && isset($action_lang_auth)) && (defined("THEME_FOLDER_BCK") && isset($action_folder_auth)) && (defined("TPL_AUTH_BCK") && isset($action_tpl_auth))) {
             if ((THEME_LANG_BCK == $action_lang_auth || $action_lang_auth == '_all') && (THEME_FOLDER_BCK == $action_folder_auth || $action_folder_auth == '_all') && (TPL_AUTH_BCK == $action_tpl_auth || $action_tpl_auth == '_all')) {
                 
                 if (isset($_GET['success'])) {
                     if (isset($_SESSION['saved_page']) && $_SESSION['saved_page'] !== '') {
                         $content .= Fxr_lib\Template::loadSubTemplates('5_add_user' . DS . 'add_user_success_saved', 1, '', '', 1);
                         $_SESSION['saved_page'] = '';
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
                 return '{' . $action_tag . '}';
             }
         } else {
             return '{' . $action_tag . '}';
         }
     }
 };
 

//======================================================================
// manage_feedbacks
//======================================================================
$tags_view['manage_feedbacks'] = function()
{
    $action_tag = 'manage_feedbacks';
    $content    = '';
    
    //-----------------------------------------------------
    // restricted access
    //-----------------------------------------------------
    if (defined("AUTH_ACCESS_BCK") && (AUTH_ACCESS_BCK == 1)) {
        $action_lang_auth   = THEME_LANG_BCK;
        $action_folder_auth = THEME_FOLDER_BCK;
        $action_tpl_auth    = '6_manage_users';
        $cache_active = 0;
        
        if ((defined("THEME_LANG_BCK") && isset($action_lang_auth)) && (defined("THEME_FOLDER_BCK") && isset($action_folder_auth)) && (defined("TPL_AUTH_BCK") && isset($action_tpl_auth))) {
            
            if ((THEME_LANG_BCK == $action_lang_auth || $action_lang_auth == '_all') && (THEME_FOLDER_BCK == $action_folder_auth || $action_folder_auth == '_all') && (TPL_AUTH_BCK == $action_tpl_auth || $action_tpl_auth == '_all')) {
                
                if (isset($_GET['success'])) {
                    if (isset($_SESSION['modified_page']) && $_SESSION['modified_page'] !== '') {
                        $content .= Fxr_lib\Template::loadSubTemplates('6_manage_users' . DS . 'manage_pages_success_modified', 1, '', array(
                            'page_id' => '\'' . $_SESSION['modified_page'] . '\''
                        ), 1);
                    }
                    if (isset($_SESSION['deleted_page']) && $_SESSION['deleted_page'] !== '') {
                        $content .= Fxr_lib\Template::loadSubTemplates('6_manage_users' . DS . 'manage_pages_success_deleted', 1, '', array(
                            'page_id' => '\'' . $_SESSION['deleted_page'] . '\''
                        ), 1);
                    }
                }
                $_SESSION['modified_page'] = '';
                $_SESSION['deleted_page']  = '';
                /*
                 * cache
                 */
                if (defined('UPDATE_CACHE_TAGS_OUTPUTS_BCK') && UPDATE_CACHE_TAGS_OUTPUTS_BCK === 1) {
                    Fxr_lib\Cache::updateCacheTagsOutputs($action_tag, $content, $cache_active);
                }
                return $content;
            }
        }
    }
};

//======================================================================
// pages_management
//======================================================================
$tags_view['manage_pages_table'] = function()
{
    $action_tag = 'manage_pages_table';
    $content    = '';
    
    //-----------------------------------------------------
    // restricted access
    //-----------------------------------------------------
    if (defined("AUTH_ACCESS_BCK") && (AUTH_ACCESS_BCK == 1)) {
        $action_lang_auth   = THEME_LANG_BCK;
        $action_folder_auth = THEME_FOLDER_BCK;
        $action_tpl_auth    = '6_manage_users';
        $cache_active = 0;
        
        if ((defined("THEME_LANG_BCK") && isset($action_lang_auth)) && (defined("THEME_FOLDER_BCK") && isset($action_folder_auth)) && (defined("TPL_AUTH_BCK") && isset($action_tpl_auth))) {
            if ((THEME_LANG_BCK == $action_lang_auth || $action_lang_auth == '_all') && (THEME_FOLDER_BCK == $action_folder_auth || $action_folder_auth == '_all') && (TPL_AUTH_BCK == $action_tpl_auth || $action_tpl_auth == '_all')) {
                $content .= Fxr_lib\Template::loadSubTemplates('6_manage_users' . DS . 'manage_users_table', '', Fxr_lib\Database::loadQuery('select', "SELECT user_id_bck, user_login_bck, user_name_bck, user_level_access_bck FROM " . DB_PREFIX . "users_bck ORDER BY user_id_bck ASC", '+', ''), '', 1);
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
