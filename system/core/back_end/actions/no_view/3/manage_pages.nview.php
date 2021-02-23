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

$actions_no_view['delete_page'] = function()
{
    //-----------------------------------------------------
    // restricted access
    //-----------------------------------------------------
    if (defined("AUTH_ACCESS_BCK") && (AUTH_ACCESS_BCK == 1)) {
        $action_lang_auth   = THEME_LANG_BCK;
        $action_folder_auth = THEME_FOLDER_BCK;
        $action_tpl_auth    = '3_manage_pages';
        
        if ((defined("THEME_LANG_BCK") && isset($action_lang_auth)) && (defined("THEME_FOLDER_BCK") && isset($action_folder_auth)) && (defined("TPL_AUTH_BCK") && isset($action_tpl_auth))) {
            if ((THEME_LANG_BCK == $action_lang_auth || $action_lang_auth == '_all') && (THEME_FOLDER_BCK == $action_folder_auth || $action_folder_auth == '_all') && (TPL_AUTH_BCK == $action_tpl_auth || $action_tpl_auth == '_all')) {
                
                if (defined("GET_DELETED_ID") && GET_DELETED_ID !== '') {
                    if (!Fxr_lib\Database::loadQuery('delete', "DELETE FROM " . DB_PREFIX . "pages_frt WHERE page_id_frt = :page_id_frt", '', array(
                        ':page_id_frt' => array(
                            GET_DELETED_ID => 'i'
                        )
                    ))) {
                        $_SESSION['deleted_page'] = GET_DELETED_ID;
                        header('Location: index.php?page_id=3&success');
                        exit();
                    } else {
                        header('Location: index.php?page_id=3&fail');
                        exit();
                    }
                } else {
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
            }
        }
    }
};
