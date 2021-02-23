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
 * @copyright Copyright &copy; 2020 Fabien Assenarre
 * @license http://opensource.org/licenses/MIT
 *
 */

//======================================================================
// meta
//======================================================================
$tags_view['home_content'] = function()
{
    $action_tag = 'home_content';
    $content    = '';
    
    if (defined("AUTH_ACCESS_FRT") && (AUTH_ACCESS_FRT == 1)) {
        
    //-----------------------------------------------------
    // public access
    //-----------------------------------------------------
    } else {
        $action_lang   = THEME_LANG_FRT;
        $action_folder = THEME_FOLDER_FRT;
        $action_tpl    = '_home_page';
        $cache_active  = 1;
        
        if ((defined("THEME_LANG_FRT") && isset($action_lang)) && (defined("THEME_FOLDER_FRT") && isset($action_folder)) && (defined("TPL_FRT") && isset($action_tpl))) {
            if ((THEME_LANG_FRT == $action_lang || $action_lang == '_all') && (THEME_FOLDER_FRT == $action_folder || $action_folder == '_all') && (TPL_FRT == $action_tpl || $action_tpl == '_all')) {
                $content .= Fxr_lib\Template::loadSubTemplates('article' . DS . 'article_home', '', Fxr_lib\Database::loadQuery('select', "SELECT page_id_frt, page_title_frt, page_summary_frt FROM " . DB_PREFIX . "pages_frt WHERE page_theme_lang_frt = '" . THEME_LANG_FRT . "' AND page_in_home_frt = '1'", '+', ''), '', 1);
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
