<?php
namespace actions;

use libraries\fxr_lib as Fxr_lib;
use libraries\add as Add;

if (!defined('FXR_INDEX')) {
    header('HTTP/1.1 403 Forbidden');
    exit('No direct script access allowed');
}
/**
 * Title: FXR Actions View (Back-End)
 *
 * @author Fabien Assenarre
 * @link http://www.flexireed.org
 * @copyright Copyright &copy; 2020 Fabien Assenarre
 * @license http://opensource.org/licenses/MIT
 *
 */

//======================================================================
// name_of_your_tag
//======================================================================
$tags_view['name_of_your_tag'] = function()
{
    $action_tag = 'name_of_your_tag';
    $content    = ''; // let this empty
    
    //-----------------------------------------------------
    // restricted access
    //-----------------------------------------------------
    if (defined("AUTH_ACCESS_BCK") && !empty(AUTH_ACCESS_BCK)) {
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
        /**
         * cache activation for this tag
         */
        $cache_active       = 1; // 0|1 (default: 1)
        
        if ((defined("THEME_LANG_BCK") && !empty($action_lang_auth)) && (defined("THEME_FOLDER_BCK") && !empty($action_folder_auth)) && (defined("TPL_AUTH_BCK") && !empty($action_tpl_auth))) {
            if ((THEME_LANG_BCK == $action_lang_auth || $action_lang_auth == '_all') && (THEME_FOLDER_BCK == $action_folder_auth || $action_folder_auth == '_all') && (TPL_AUTH_BCK == $action_tpl_auth || $action_tpl_auth == '_all')) {
            
            	///////////////////////////
            	// ADD YOUR LOGIC CODE HERE
            	///////////////////////////
            	$content .= '';
            	///////////////////////////
            	
            	/**
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
        /**
         * cache activation for this tag
         */
        $cache_active  = 1; // 0|1 (default: 1)
        
        if ((defined("THEME_LANG_BCK") && !empty($action_lang)) && (defined("THEME_FOLDER_BCK") && !empty($action_folder)) && (defined("TPL_BCK") && !empty($action_tpl))) {
            if ((THEME_LANG_BCK == $action_lang || $action_lang == '_all') && (THEME_FOLDER_BCK == $action_folder || $action_folder == '_all') && (TPL_BCK == $action_tpl || $action_tpl == '_all')) {
                
                ///////////////////////////
                // ADD YOUR LOGIC CODE HERE
                ///////////////////////////
                $content .= '';
                ///////////////////////////
                
                /**
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
