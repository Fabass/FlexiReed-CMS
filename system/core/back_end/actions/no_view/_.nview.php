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

//======================================================================
// name_of_your_action
//======================================================================
$actions_no_view['name_of_your_action'] = function()
{
    //-----------------------------------------------------
    // restricted access
    //-----------------------------------------------------
    if (defined("AUTH_ACCESS_BCK") && AUTH_ACCESS_BCK !== '') {
        
        /**
         * theme language for this tag
         */
        $action_lang_auth   = THEME_LANG_BCK; // (default: THEME_LANG_BCK)
        /**
         * theme folder for this tag
         */
        $action_folder_auth = THEME_FOLDER_BCK; // (default: THEME_FOLDER_BCK)
        /**
         * theme tpl for this tag
         */
        $action_tpl_auth    = '_all'; // '_all'|'tpl_name' (default: '_all')
        
        if ((defined("THEME_LANG_BCK") && isset($action_lang_auth)) && (defined("THEME_FOLDER_BCK") && isset($action_folder_auth)) && (defined("TPL_AUTH_BCK") && isset($action_tpl_auth))) {
            if ((THEME_LANG_BCK == $action_lang_auth || $action_lang_auth == '_all') && (THEME_FOLDER_BCK == $action_folder_auth || $action_folder_auth == '_all') && (TPL_AUTH_BCK == $action_tpl_auth || $action_tpl_auth == '_all')) {
                
                if ((AUTH_ACCESS_BCK == 1)) { // level access; must be an integer different from 0 (default: 1)
                
                    ///////////////////////////
                    // ADD YOUR LOGIC CODE HERE
                    ///////////////////////////
                }
            }
        }
    //-----------------------------------------------------
    // public access
    //-----------------------------------------------------
    } else {
        /**
         * theme language for this tag
         */
        $action_lang   = THEME_LANG_BCK; // (default: THEME_LANG_BCK)
        /**
         * theme folder for this tag
         */
        $action_folder = THEME_FOLDER_BCK; // (default: THEME_FOLDER_BCK)
        /**
         * theme tpl for this tag
         */
        $action_tpl    = '_all'; // '_all'|'tpl_name' (default: '_all')
        
        if ((defined("THEME_LANG_BCK") && isset($action_lang)) && (defined("THEME_FOLDER_BCK") && isset($action_folder)) && (defined("TPL_BCK") && isset($action_tpl))) {
            if ((THEME_LANG_BCK == $action_lang || $action_lang == '_all') && (THEME_FOLDER_BCK == $action_folder || $action_folder == '_all') && (TPL_BCK == $action_tpl || $action_tpl == '_all')) {
                
                ///////////////////////////
                // ADD YOUR LOGIC CODE HERE
                ///////////////////////////
                
            }
        }
    }
};
