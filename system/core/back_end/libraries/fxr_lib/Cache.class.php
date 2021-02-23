<?php
namespace libraries\fxr_lib;

use libraries\fxr_lib as Fxr_lib;

if (!defined('FXR_INDEX')) {
    header('HTTP/1.1 403 Forbidden');
    exit('No direct script access allowed');
}
/**
 * Title: FXR Error Class (Back-End) 
 *
 * @author Fabien Assenarre
 * @link http://www.flexireed.org
 * @copyright Copyright &copy; 2020 Fabien Assenarre
 * @license http://opensource.org/licenses/MIT
 *
 */

abstract class Cache
{    
    private $abbr_lang_bck;
    private $action_tag;
    private $cache_active;
    private $cache_comment;
    private $cache_head_pages_content_bck;
    private $cache_head_superglobals_content_bck;
    private $cache_head_themes_content_bck;
    private $cache_pages;
    private $cache_superglobals_content_bck;
    private $cache_superglobals;
    private $cache_tags_pages_bck;
    private $cache_themes_content_bck;
    private $cache_themes_default;
    private $cache_themes_id;
    private $content;
    private $default_public_tpl_bck;
    private $default_tpl_restricted_bck;
    private $duration_cache_time_bck;
    private $fetched_results;
    private $handle;
    private $i;
    private $id_page_bck;
    private $init_cache_time_bck;
    private $key_results;
    private $page_duration_cache_time_bck;
    private $page_id_bck;
    private $page_in_cache_bck;
    private $page_init_cache_time_bck;
    private $page_theme_folder_bck;
    private $page_theme_lang_bck;
    private $page_theme_tpl_bck;
    private $setting_abbr_lang_bck;
    private $setting_default_public_tpl_bck;
    private $setting_default_restricted_tpl_bck;
    private $setting_duration_cache_time_bck;
    private $setting_init_cache_time_bck;
    private $setting_page_in_cache_bck;
    private $setting_theme_folder_bck;
    private $theme_folder_bck;
    private $theme_lang_bck;
    private $theme_tpl_bck;
    private $tpl_content;
    
    /**
     * Update Cache Superglobals Settings
     *
     * @access    public
     * @return    void
     */
    public static function updateCacheSuperglobalsSettings()
    {
        if (defined("UPDATE_CACHE_SUPERGLOBALS_SETTINGS_BCK") && UPDATE_CACHE_SUPERGLOBALS_SETTINGS_BCK == 1) {
            $cache_head_superglobals_content_bck = "<?php\n";
            $cache_head_superglobals_content_bck .= "namespace cache;\n";
            $cache_head_superglobals_content_bck .= "\n";
            $cache_head_superglobals_content_bck .= "if (!defined('FXR_INDEX')) {\n";
            $cache_head_superglobals_content_bck .= "    exit('No direct script access allowed');\n";
            $cache_head_superglobals_content_bck .= "}\n";
            $cache_head_superglobals_content_bck .= "/**\n";
            $cache_head_superglobals_content_bck .= "* Title: FXR Cache Superglobals (Back-End)\n";
            $cache_head_superglobals_content_bck .= "*\n";
            $cache_head_superglobals_content_bck .= "* @author Fabien Assenarre\n";
            $cache_head_superglobals_content_bck .= "* @link http://www.flexireed.org\n";
            $cache_head_superglobals_content_bck .= "* @copyright Copyright &copy; 2017 Fabien Assenarre\n";
            $cache_head_superglobals_content_bck .= "* @license http://www.opensource.org/licenses/mit-license.php MIT\n";
            $cache_head_superglobals_content_bck .= "*\n";
            $cache_head_superglobals_content_bck .= "*/\n";
            $cache_head_superglobals_content_bck .= "\n";
            
            $fetched_results = Fxr_lib\Database::loadQuery('select', "SELECT setting_abbr_lang_bck FROM " . DB_PREFIX . "settings_bck", '+', '');
            
            $cache_superglobals_content_bck = '$cache_superglobals[\'page_lang_bck\'] = array(' . "\n";
            $i                              = 0;
            foreach ($fetched_results as $key_results) {
                
                $setting_abbr_lang_bck = $key_results['setting_abbr_lang_bck'];
                if ($i == 0) {
                    $cache_superglobals_content_bck .= "'$setting_abbr_lang_bck'";
                } else {
                    $cache_superglobals_content_bck .= ", '$setting_abbr_lang_bck'";
                }
                $i++;
                
            }
            $cache_superglobals_content_bck .= ");\n";
            $cache_superglobals_content_bck .= "\n";
            
            $fetched_results = Fxr_lib\Database::loadQuery('select', "SELECT page_id_bck FROM " . DB_PREFIX . "pages_bck", '+', '');
            
            $cache_superglobals_content_bck .= '$cache_superglobals[\'page_id\'] = array(' . "\n";
            $i = 0;
            foreach ($fetched_results as $key_results) {
                $page_id_bck = $key_results['page_id_bck'];
                if ($i == 0) {
                    $cache_superglobals_content_bck .= "'$page_id_bck'";
                } else {
                    $cache_superglobals_content_bck .= ", '$page_id_bck'";
                }
                $i++;
            }
            $cache_superglobals_content_bck .= ");\n";
            $cache_superglobals_content_bck .= "\n";
            
            if (!$handle = fopen(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'settings' . DS . 'cache_superglobals_bck.php', "w")) {
                throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'settings' . DS . 'cache_superglobals_bck.php', 2, '
                04');
            }
            if (fwrite($handle, $cache_head_superglobals_content_bck) === false) {
                throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'settings' . DS . 'cache_superglobals_bck.php', 15, ERROR_PAGE_BCK);
            }
            if (fwrite($handle, $cache_superglobals_content_bck) === false) {
                throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'settings' . DS . 'cache_superglobals_bck.php', 15, ERROR_PAGE_BCK);
            }
            fclose($handle);
        }
    }
    
    
    /**
     * Update Cache Themes Settings
     *
     * @access    public
     * @return    void
     */
    public static function updateCacheThemesSettings()
    {
        $cache_head_themes_content_bck = "<?php\n";
        $cache_head_themes_content_bck .= "namespace cache;\n";
        $cache_head_themes_content_bck .= "\n";
        $cache_head_themes_content_bck .= "if (!defined('FXR_INDEX')) {\n";
        $cache_head_themes_content_bck .= "    exit('No direct script access allowed');\n";
        $cache_head_themes_content_bck .= "}\n";
        $cache_head_themes_content_bck .= "/**\n";
        $cache_head_themes_content_bck .= "* Title: FXR Cache Themes (Back-End)\n";
        $cache_head_themes_content_bck .= "*\n";
        $cache_head_themes_content_bck .= "* @author Fabien Assenarre\n";
        $cache_head_themes_content_bck .= "* @link http://www.flexireed.org\n";
        $cache_head_themes_content_bck .= "* @copyright Copyright &copy; 2017 Fabien Assenarre\n";
        $cache_head_themes_content_bck .= "* @license http://www.opensource.org/licenses/mit-license.php MIT\n";
        $cache_head_themes_content_bck .= "*\n";
        $cache_head_themes_content_bck .= "*/\n";
        $cache_head_themes_content_bck .= "\n";
        
        $fetched_results = Fxr_lib\Database::loadQuery('select', "SELECT setting_abbr_lang_bck, setting_default_public_tpl_bck, setting_default_restricted_tpl_bck, setting_theme_folder_bck FROM " . DB_PREFIX . "settings_bck", '+', '');
        
        $cache_themes_content_bck = '';
        $cache_themes_content_bck .= '$cache_themes_default = array(' . "\n";
        $i = 0;
        
        foreach ($fetched_results as $key_results) {
            $setting_abbr_lang_bck = $key_results['setting_abbr_lang_bck'];
            if ($i == 0) {
                $cache_themes_content_bck .= "'$setting_abbr_lang_bck' => array(\n";
            } else {
                $cache_themes_content_bck .= ", '$setting_abbr_lang_bck' => array(\n";
            }
            $i++;
            $setting_theme_folder_bck = $key_results['setting_theme_folder_bck'];
            $cache_themes_content_bck .= "'$setting_theme_folder_bck',\n";
            $setting_default_public_tpl_bck = $key_results['setting_default_public_tpl_bck'];
            $cache_themes_content_bck .= "'$setting_default_public_tpl_bck',\n";
            $setting_default_restricted_tpl_bck = $key_results['setting_default_restricted_tpl_bck'];
            $cache_themes_content_bck .= "'$setting_default_restricted_tpl_bck'\n";
            $cache_themes_content_bck .= ")\n";
        }
        $cache_themes_content_bck .= ");\n\n";
        
        $fetched_results = Fxr_lib\Database::loadQuery('select', "SELECT page_id_bck, page_theme_tpl_bck, page_theme_folder_bck, page_theme_lang_bck FROM " . DB_PREFIX . "pages_bck", '+', '');
        
        $cache_themes_content_bck .= '$cache_themes_id = array(' . "\n";
        $i = 0;
        
        foreach ($fetched_results as $key_results) {
            $page_id_bck = $key_results['page_id_bck'];
            if ($i == 0) {
                $cache_themes_content_bck .= "'$page_id_bck' => array(\n";
            } else {
                $cache_themes_content_bck .= ", '$page_id_bck' => array(\n";
            }
            $i++;
            $page_theme_lang_bck = $key_results['page_theme_lang_bck'];
            $cache_themes_content_bck .= "'$page_theme_lang_bck',\n";
            $page_theme_folder_bck = $key_results['page_theme_folder_bck'];
            $cache_themes_content_bck .= "'$page_theme_folder_bck',\n";
            $page_theme_tpl_bck = $key_results['page_theme_tpl_bck'];
            $cache_themes_content_bck .= "'$page_theme_tpl_bck'\n";
            $cache_themes_content_bck .= ")\n";
        }
        $cache_themes_content_bck .= ");\n";
        if (!$handle = fopen(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'settings' . DS . 'cache_themes_bck.php', "w")) {
            throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'settings' . DS . 'cache_themes_bck.php', 2, ERROR_PAGE_BCK);
        }
        if (fwrite($handle, $cache_head_themes_content_bck) === false) {
            throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'settings' . DS . 'cache_themes_bck.php', 15, ERROR_PAGE_BCK);
        }
        if (fwrite($handle, $cache_themes_content_bck) === false) {
            throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'settings' . DS . 'cache_themes_bck.php', 15, ERROR_PAGE_BCK);
        }
        fclose($handle);
    }
    
    
    /**
     * Update Cache Pages Settings
     *
     * @access    public
     * @return    void
     */
    public static function updateCachePagesSettings()
    {
        $cache_head_pages_content_bck = "<?php\n";
        $cache_head_pages_content_bck .= "namespace cache;\n";
        $cache_head_pages_content_bck .= "\n";
        $cache_head_pages_content_bck .= "if (!defined('FXR_INDEX')) {\n";
        $cache_head_pages_content_bck .= "    exit('No direct script access allowed');\n";
        $cache_head_pages_content_bck .= "}\n";
        $cache_head_pages_content_bck .= "/**\n";
        $cache_head_pages_content_bck .= "* Title: FXR Cache Pages (Back-End)\n";
        $cache_head_pages_content_bck .= "*\n";
        $cache_head_pages_content_bck .= "* @author Fabien Assenarre\n";
        $cache_head_pages_content_bck .= "* @link http://www.flexireed.org\n";
        $cache_head_pages_content_bck .= "* @copyright Copyright &copy; 2017 Fabien Assenarre\n";
        $cache_head_pages_content_bck .= "* @license http://www.opensource.org/licenses/mit-license.php MIT\n";
        $cache_head_pages_content_bck .= "*\n";
        $cache_head_pages_content_bck .= "*/\n";
        $cache_head_pages_content_bck .= "\n";
        
        $fetched_results = Fxr_lib\Database::loadQuery('select', "SELECT page_id_bck, page_theme_tpl_bck, page_theme_folder_bck, page_theme_lang_bck, page_init_cache_time_bck, page_duration_cache_time_bck FROM " . DB_PREFIX . "pages_bck WHERE page_in_cache_bck = 1", '+', '');
        
        $cache_tags_pages_bck = '';
        
        $i = 0;
        
        foreach ($fetched_results as $key_results) {
            
            $page_id_bck                  = $key_results['page_id_bck'];
            $page_theme_tpl_bck           = $key_results['page_theme_tpl_bck'];
            $page_theme_folder_bck        = $key_results['page_theme_folder_bck'];
            $page_theme_lang_bck          = $key_results['page_theme_lang_bck'];
            $page_init_cache_time_bck     = $key_results['page_init_cache_time_bck'];
            $page_duration_cache_time_bck = $key_results['page_duration_cache_time_bck'];
            
            if (strtotime($page_init_cache_time_bck) + $page_duration_cache_time_bck > time()) {
                
                $cache_tags_pages_bck .= '$cache_pages[\'' . "$page_id_bck" . '\'] = array(' . "\n";
                
                $cache_tags_pages_bck .= "'$page_theme_lang_bck'\n";
                $cache_tags_pages_bck .= ", '$page_theme_folder_bck'\n";
                $cache_tags_pages_bck .= ", '$page_theme_tpl_bck'\n";
                $cache_tags_pages_bck .= ");\n";
                $cache_tags_pages_bck .= "\n";
            }
        }
        
        $fetched_results = Fxr_lib\Database::loadQuery('select', "SELECT setting_abbr_lang_bck, setting_default_public_tpl_bck, setting_default_restricted_tpl_bck, setting_theme_folder_bck, setting_init_cache_time_bck, setting_duration_cache_time_bck FROM " . DB_PREFIX . "settings_bck WHERE setting_page_in_cache_bck = 1", '+', '');
        
        $i = 0;
        
        foreach ($fetched_results as $key_results) {
            
            $setting_abbr_lang_bck              = $key_results['setting_abbr_lang_bck'];
            $setting_theme_folder_bck          = $key_results['setting_theme_folder_bck'];
            $setting_default_public_tpl_bck     = $key_results['setting_default_public_tpl_bck'];
            $setting_default_restricted_tpl_bck = $key_results['setting_default_restricted_tpl_bck'];
            $setting_init_cache_time_bck        = $key_results['setting_init_cache_time_bck'];
            $setting_duration_cache_time_bck    = $key_results['setting_duration_cache_time_bck'];
            
            if (strtotime($setting_init_cache_time_bck) + $setting_duration_cache_time_bck > time()) {
                $cache_tags_pages_bck .= '$cache_pages[\'' . "$setting_abbr_lang_bck" . '\'] = array(' . "\n";
                
                $cache_tags_pages_bck .= "'$setting_abbr_lang_bck'\n";
                $cache_tags_pages_bck .= ", '$setting_theme_folder_bck'\n";
                $cache_tags_pages_bck .= ", '$setting_default_public_tpl_bck'\n";
                $cache_tags_pages_bck .= ", '$setting_default_restricted_tpl_bck'\n";
                $cache_tags_pages_bck .= ");\n";
                $cache_tags_pages_bck .= "\n";
            }
        }
        
        if (!$handle = fopen(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'settings' . DS . 'cache_pages_bck.php', "w")) {
            throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'settings' . DS . 'cache_pages_bck.php', 2, ERROR_PAGE_BCK);
        }
        if (fwrite($handle, $cache_head_pages_content_bck) === false) {
            throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'settings' . DS . 'cache_pages_bck.php', 15, ERROR_PAGE_BCK);
        }
        if (fwrite($handle, $cache_tags_pages_bck) === false) {
            throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'settings' . DS . 'cache_pages_bck.php', 15, ERROR_PAGE_BCK);
        }
        fclose($handle);
        
        $fetched_results = Fxr_lib\Database::loadQuery('select', "SELECT page_id_bck, page_theme_tpl_bck, page_theme_folder_bck, page_theme_lang_bck, page_init_cache_time_bck, page_duration_cache_time_bck FROM " . DB_PREFIX . "pages_bck WHERE page_in_cache_bck = 0", '+', '');
        
        $i = 0;
        
        foreach ($fetched_results as $key_results) {
            
            if (defined("AUTH_ACCESS_BCK")) {
                $page_id_bck           = $key_results['page_id_bck'];
                $page_theme_lang_bck   = $key_results['page_theme_lang_bck'];
                $page_theme_folder_bck = $key_results['page_theme_folder_bck'];
                $page_theme_tpl_bck    = $key_results['page_theme_tpl_bck'];
                
                if (is_file(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . $page_theme_lang_bck . DS . $page_theme_folder_bck . DS . 'pages' . DS . 'restricted' . DS . AUTH_ACCESS_BCK . DS . $page_id_bck . '.tpl')) {
                    unlink(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . $page_theme_lang_bck . DS . $page_theme_folder_bck . DS . 'pages' . DS . 'restricted' . DS . AUTH_ACCESS_BCK . DS . $page_id_bck . '.tpl');
                }
                
            } else {
                $page_id_bck                  = $key_results['page_id_bck'];
                $page_theme_lang_bck          = $key_results['page_theme_lang_bck'];
                $page_theme_folder_bck        = $key_results['page_theme_folder_bck'];
                $page_theme_tpl_bck           = $key_results['page_theme_tpl_bck'];
                $page_init_cache_time_bck     = $key_results['page_init_cache_time_bck'];
                $page_duration_cache_time_bck = $key_results['page_duration_cache_time_bck'];
                
                if (is_file(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . $page_theme_lang_bck . DS . $page_theme_folder_bck . DS . 'pages' . DS . 'public' . DS . $page_id_bck . '.tpl')) {
                    unlink(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . $page_theme_lang_bck . DS . $page_theme_folder_bck . DS . 'pages' . DS . 'public' . DS . $page_id_bck . '.tpl');
                }
            }
        }
        
        $fetched_results = Fxr_lib\Database::loadQuery('select', "SELECT setting_abbr_lang_bck, setting_default_public_tpl_bck, setting_default_restricted_tpl_bck, setting_theme_folder_bck, setting_init_cache_time_bck, setting_duration_cache_time_bck FROM " . DB_PREFIX . "settings_bck WHERE setting_page_in_cache_bck = 0", '+', '');
        
        $i = 0;
        
        foreach ($fetched_results as $key_results) {
            
            if (defined("AUTH_ACCESS_BCK")) {
                $setting_abbr_lang_bck              = $key_results['setting_abbr_lang_bck'];
                $setting_theme_folder_bck           = $key_results['setting_theme_folder_bck'];
                $setting_default_restricted_tpl_bck = $key_results['setting_default_restricted_tpl_bck'];
                
                if (is_file(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . $setting_abbr_lang_bck . DS . $setting_theme_folder_bck . DS . 'pages' . DS . 'restricted' . DS . AUTH_ACCESS_BCK . DS . $setting_default_restricted_tpl_bck . '.tpl')) {
                    unlink(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . $setting_abbr_lang_bck . DS . $setting_theme_folder_bck . DS . 'pages' . DS . 'restricted' . DS . AUTH_ACCESS_BCK . DS . $setting_default_restricted_tpl_bck . '.tpl');
                }
                
            } else {
                $setting_abbr_lang_bck          = $key_results['setting_abbr_lang_bck'];
                $setting_theme_folder_bck      = $key_results['setting_theme_folder_bck'];
                $setting_default_public_tpl_bck = $key_results['setting_default_public_tpl_bck'];
                
                if (is_file(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . $setting_abbr_lang_bck . DS . $setting_theme_folder_bck . DS . 'pages' . DS . 'public' . DS . $setting_default_public_tpl_bck . '.tpl')) {
                    unlink(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . $setting_abbr_lang_bck . DS . $setting_theme_folder_bck . DS . 'pages' . DS . 'public' . DS . $setting_default_public_tpl_bck . '.tpl');
                }
            }
        }
    }
    
    
    /**
     * Update Cache Tags Outputs
     *
     * @access    public
     * @return    void
     */
    public static function updateCacheTagsOutputs($action_tag, $content, $cache_active)
    {
        
        if (!is_dir(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK)) {
            mkdir(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK, 0777, true);
        }
        if (!is_dir(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK)) {
            mkdir(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK, 0777, true);
        }
        if (!is_dir(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'tags')) {
            mkdir(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'tags', 0777, true);
        }
        if (defined("AUTH_ACCESS_BCK")) {
            if (!is_dir(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'tags' . DS . 'restricted' . DS . AUTH_ACCESS_BCK)) {
                mkdir(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'tags' . DS . 'restricted' . DS . AUTH_ACCESS_BCK, 0777, true);
            }
        } else {
            if (!is_dir(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'tags' . DS . 'public')) {
                mkdir(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'tags' . DS . 'public', 0777, true);
            }
        }
        $cache_comment = '<!-- Served from cache :: ' . gmdate("M d Y H:i:s") . ' -->';
        
        if (defined("GET_PAGE_ID_BCK") && GET_PAGE_ID_BCK !== '') {
            if (defined("AUTH_ACCESS_BCK")) {
                if (!is_dir(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'tags' . DS . 'restricted' . DS . AUTH_ACCESS_BCK . DS . $action_tag)) {
                    mkdir(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'tags' . DS . 'restricted' . DS . AUTH_ACCESS_BCK . DS . $action_tag, 0777, true);
                }
                if ($cache_active === 1) {
                    if (!$handle = fopen(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'tags' . DS . 'restricted' . DS . AUTH_ACCESS_BCK . DS . $action_tag . DS . $action_tag . '_' . GET_PAGE_ID_BCK . '.tpl', "w")) {
                        throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'tags' . DS . 'restricted' . DS . AUTH_ACCESS_BCK . DS . $action_tag . DS . $action_tag . '_' . GET_PAGE_ID_BCK . '.tpl', 2, ERROR_PAGE_BCK);
                    }
                    if (fwrite($handle, $content) === false) {
                        throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'tags' . DS . 'restricted' . DS . AUTH_ACCESS_BCK . DS . $action_tag . DS . $action_tag . '_' . GET_PAGE_ID_BCK . '.tpl', 15, ERROR_PAGE_BCK);
                    }
                    if (fwrite($handle, $cache_comment) === false) {
                        throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'tags' . DS . 'restricted' . DS . AUTH_ACCESS_BCK . DS . $action_tag . DS . $action_tag . '_' . GET_PAGE_ID_BCK . '.tpl', 15, ERROR_PAGE_BCK);
                    }
                    fclose($handle);
                } else {
                    if (is_file(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'tags' . DS . 'restricted' . DS . AUTH_ACCESS_BCK . DS . $action_tag . DS . $action_tag . '_' . GET_PAGE_ID_BCK . '.tpl')) {
                        unlink(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'tags' . DS . 'restricted' . DS . AUTH_ACCESS_BCK . DS . $action_tag . DS . $action_tag . '_' . GET_PAGE_ID_BCK . '.tpl');
                    }
                    if (is_dir(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'tags' . DS . 'restricted' . DS . AUTH_ACCESS_BCK . DS . $action_tag)) {
                        rmdir(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'tags' . DS . 'restricted' . DS . AUTH_ACCESS_BCK . DS . $action_tag);
                    }
                }
            } else {
                if (!is_dir(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'tags' . DS . 'public' . DS . $action_tag)) {
                    mkdir(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'tags' . DS . 'public' . DS . $action_tag, 0777, true);
                }
                if ($cache_active === 1) {
                    if (!$handle = fopen(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'tags' . DS . 'public' . DS . $action_tag . DS . $action_tag . '_' . GET_PAGE_ID_BCK . '.tpl', "w")) {
                        throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'tags' . DS . 'public' . DS . $action_tag . DS . $action_tag . '_' . GET_PAGE_ID_BCK . '.tpl', 2, ERROR_PAGE_BCK);
                    }
                    if (fwrite($handle, $content) === false) {
                        throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'tags' . DS . 'public' . DS . $action_tag . DS . $action_tag . '_' . GET_PAGE_ID_BCK . '.tpl', 15, ERROR_PAGE_BCK);
                    }
                    if (fwrite($handle, $cache_comment) === false) {
                        throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'tags' . DS . 'public' . DS . $action_tag . DS . $action_tag . '_' . GET_PAGE_ID_BCK . '.tpl', 15, ERROR_PAGE_BCK);
                    }
                    fclose($handle);
                } else {
                    if (is_file(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'tags' . DS . 'public' . DS . $action_tag . DS . $action_tag . '_' . GET_PAGE_ID_BCK . '.tpl')) {
                        unlink(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'tags' . DS . 'public' . DS . $action_tag . DS . $action_tag . '_' . GET_PAGE_ID_BCK . '.tpl');
                    }
                    if (is_dir(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'tags' . DS . 'public' . DS . $action_tag)) {
                        rmdir(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'tags' . DS . 'public' . DS . $action_tag);
                    }
                }
            }
        } else {
            if (defined("AUTH_ACCESS_BCK")) {
                if (!is_dir(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'tags' . DS . 'restricted' . DS . AUTH_ACCESS_BCK . DS . $action_tag)) {
                    mkdir(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'tags' . DS . 'restricted' . DS . AUTH_ACCESS_BCK . DS . $action_tag, 0777, true);
                }
                if ($cache_active === 1) {
                    if (!$handle = fopen(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'tags' . DS . 'restricted' . DS . AUTH_ACCESS_BCK . DS . $action_tag . DS . $action_tag . '_' . PAGE_LANG_BCK . '.tpl', "w")) {
                        throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'tags' . DS . 'restricted' . DS . AUTH_ACCESS_BCK . DS . $action_tag . DS . $action_tag . '_' . PAGE_LANG_BCK . '.tpl', 2, ERROR_PAGE_BCK);
                    }
                    if (fwrite($handle, $content) === false) {
                        throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'tags' . DS . 'restricted' . DS . AUTH_ACCESS_BCK . DS . $action_tag . DS . $action_tag . '_' . PAGE_LANG_BCK . '.tpl', 15, ERROR_PAGE_BCK);
                    }
                    if (fwrite($handle, $cache_comment) === false) {
                        throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'tags' . DS . 'restricted' . DS . AUTH_ACCESS_BCK . DS . $action_tag . DS . $action_tag . '_' . PAGE_LANG_BCK . '.tpl', 15, ERROR_PAGE_BCK);
                    }
                    fclose($handle);
                } else {
                    if (is_file(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'tags' . DS . 'restricted' . DS . AUTH_ACCESS_BCK . DS . $action_tag . DS . $action_tag . '_' . PAGE_LANG_BCK . '.tpl')) {
                        unlink(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'tags' . DS . 'restricted' . DS . AUTH_ACCESS_BCK . DS . $action_tag . DS . $action_tag . '_' . PAGE_LANG_BCK . '.tpl');
                    }
                    if (is_dir(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'tags' . DS . 'restricted' . DS . AUTH_ACCESS_BCK . DS . $action_tag)) {
                        rmdir(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'tags' . DS . 'restricted' . DS . AUTH_ACCESS_BCK . DS . $action_tag);
                    }
                }
            } else {
                if (!is_dir(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'tags' . DS . 'public' . DS . $action_tag)) {
                    mkdir(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'tags' . DS . 'public' . DS . $action_tag, 0777, true);
                }
                if ($cache_active === 1) {
                    if (!$handle = fopen(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'tags' . DS . 'public' . DS . $action_tag . DS . $action_tag . '_' . PAGE_LANG_BCK . '.tpl', "w")) {
                        throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'tags' . DS . 'public' . DS . $action_tag . DS . $action_tag . '_' . PAGE_LANG_BCK . '.tpl', 2, ERROR_PAGE_BCK);
                    }
                    if (fwrite($handle, $content) === false) {
                        throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'tags' . DS . 'public' . DS . $action_tag . DS . $action_tag . '_' . PAGE_LANG_BCK . '.tpl', 15, ERROR_PAGE_BCK);
                    }
                    if (fwrite($handle, $cache_comment) === false) {
                        throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'tags' . DS . 'public' . DS . $action_tag . DS . $action_tag . '_' . PAGE_LANG_BCK . '.tpl', 15, ERROR_PAGE_BCK);
                    }
                    fclose($handle);
                } else {
                    if (is_file(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'tags' . DS . 'public' . DS . $action_tag . DS . $action_tag . '_' . PAGE_LANG_BCK . '.tpl')) {
                        unlink(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'tags' . DS . 'public' . DS . $action_tag . DS . $action_tag . '_' . PAGE_LANG_BCK . '.tpl');
                    }
                    if (is_dir(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'tags' . DS . 'public' . DS . $action_tag)) {
                        rmdir(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'tags' . DS . 'public' . DS . $action_tag);
                    }
                }
            }
        }
    }
    
    
    /**
     * Update Cache Pages Outputs
     *
     * @access    public
     * @return    void
     */
    public static function updateCachePagesOutputs($tpl_content = '')
    {
        
        if (!is_dir(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK)) {
            mkdir(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK, 0777, true);
        }
        if (!is_dir(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK)) {
            mkdir(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK, 0777, true);
        }
        if (!is_dir(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'pages')) {
            mkdir(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'pages', 0777, true);
        }
        if (defined("AUTH_ACCESS_BCK")) {
            if (!is_dir(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'pages' . DS . 'restricted' . DS . AUTH_ACCESS_BCK)) {
                mkdir(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'pages' . DS . 'restricted' . DS . AUTH_ACCESS_BCK, 0777, true);
            }
        } else {
            if (!is_dir(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'pages' . DS . 'public')) {
                mkdir(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'pages' . DS . 'public', 0777, true);
            }
        }
        $cache_comment = '<!-- Served from cache :: ' . gmdate("M d Y H:i:s") . ' -->';
        
        if (defined("GET_PAGE_ID_BCK") && GET_PAGE_ID_BCK !== '') {
            
            $fetched_results = Fxr_lib\Database::loadQuery('select', "SELECT page_id_bck, page_in_cache_bck, page_init_cache_time_bck, page_duration_cache_time_bck FROM " . DB_PREFIX . "pages_bck WHERE page_id_bck = :page_id_bck", '+', array(
                ':page_id_bck' => array(
                    GET_PAGE_ID_BCK => 'i'
                )
            ));
            
            foreach ($fetched_results as $key_results) {
                $page_id_bck                  = $key_results['page_id_bck'];
                $page_in_cache_bck            = $key_results['page_in_cache_bck'];
                $page_init_cache_time_bck     = $key_results['page_init_cache_time_bck'];
                $page_duration_cache_time_bck = $key_results['page_duration_cache_time_bck'];
            }
            
            if (defined("AUTH_ACCESS_BCK")) {
                if (is_file(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'pages' . DS . 'restricted' . DS . AUTH_ACCESS_BCK . DS . GET_PAGE_ID_BCK . '.tpl')) {
                    if (strtotime($page_init_cache_time_bck) + $page_duration_cache_time_bck > time()) {
                        if ($page_in_cache_bck == 0) {
                            unlink(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'pages' . DS . 'restricted' . DS . AUTH_ACCESS_BCK . DS . GET_PAGE_ID_BCK . '.tpl');
                        }
                    } else {
                        if ($page_in_cache_bck == 1) {
                            if (!$handle = fopen(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'pages' . DS . 'restricted' . DS . AUTH_ACCESS_BCK . DS . GET_PAGE_ID_BCK . '.tpl', "w")) {
                                throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'pages' . DS . 'restricted' . DS . AUTH_ACCESS_BCK . DS . GET_PAGE_ID_BCK . '.tpl', 2, ERROR_PAGE_BCK);
                            }
                            if (fwrite($handle, $tpl_content) === false) {
                                throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'pages' . DS . 'restricted' . DS . AUTH_ACCESS_BCK . DS . GET_PAGE_ID_BCK . '.tpl', 15, ERROR_PAGE_BCK);
                            }
                            if (fwrite($handle, $cache_comment) === false) {
                                throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'pages' . DS . 'restricted' . DS . AUTH_ACCESS_BCK . DS . GET_PAGE_ID_BCK . '.tpl', 15, ERROR_PAGE_BCK);
                            }
                            fclose($handle);
                        } else {
                            unlink(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'pages' . DS . 'restricted' . DS . AUTH_ACCESS_BCK . DS . GET_PAGE_ID_BCK . '.tpl');
                        }
                    }
                } else {
                    if ($page_in_cache_bck == 1) {
                        if (!$handle = fopen(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'pages' . DS . 'restricted' . DS . AUTH_ACCESS_BCK . DS . GET_PAGE_ID_BCK . '.tpl', "w")) {
                            throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'pages' . DS . 'restricted' . DS . AUTH_ACCESS_BCK . DS . GET_PAGE_ID_BCK . '.tpl', 2, ERROR_PAGE_BCK);
                        }
                        if (fwrite($handle, $tpl_content) === false) {
                            throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'pages' . DS . 'restricted' . DS . AUTH_ACCESS_BCK . DS . GET_PAGE_ID_BCK . '.tpl', 15, ERROR_PAGE_BCK);
                        }
                        if (fwrite($handle, $cache_comment) === false) {
                            throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'pages' . DS . 'restricted' . DS . AUTH_ACCESS_BCK . DS . GET_PAGE_ID_BCK . '.tpl', 15, ERROR_PAGE_BCK);
                        }
                        fclose($handle);
                    }
                }
            } else {
                if (is_file(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'pages' . DS . 'public' . DS . GET_PAGE_ID_BCK . '.tpl')) {
                    if (strtotime($page_init_cache_time_bck) + $page_duration_cache_time_bck > time()) {
                        if ($page_in_cache_bck == 0) {
                            unlink(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'pages' . DS . 'public' . DS . GET_PAGE_ID_BCK . '.tpl');
                        }
                    } else {
                        if ($page_in_cache_bck == 1) {
                            if (!$handle = fopen(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'pages' . DS . 'public' . DS . GET_PAGE_ID_BCK . '.tpl', "w")) {
                                throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'pages' . DS . 'public' . DS . GET_PAGE_ID_BCK . '.tpl', 2, ERROR_PAGE_BCK);
                            }
                            if (fwrite($handle, $tpl_content) === false) {
                                throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'pages' . DS . 'public' . DS . GET_PAGE_ID_BCK . '.tpl', 15, ERROR_PAGE_BCK);
                            }
                            if (fwrite($handle, $cache_comment) === false) {
                                throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'pages' . DS . 'public' . DS . GET_PAGE_ID_BCK . '.tpl', 15, ERROR_PAGE_BCK);
                            }
                            fclose($handle);
                        } else {
                            unlink(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'pages' . DS . 'public' . DS . GET_PAGE_ID_BCK . '.tpl');
                        }
                    }
                } else {
                    if ($page_in_cache_bck == 1) {
                        if (!$handle = fopen(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'pages' . DS . 'public' . DS . GET_PAGE_ID_BCK . '.tpl', "w")) {
                            throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'pages' . DS . 'public' . DS . GET_PAGE_ID_BCK . '.tpl', 2, ERROR_PAGE_BCK);
                        }
                        if (fwrite($handle, $tpl_content) === false) {
                            throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'pages' . DS . 'public' . DS . GET_PAGE_ID_BCK . '.tpl', 15, ERROR_PAGE_BCK);
                        }
                        if (fwrite($handle, $cache_comment) === false) {
                            throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'pages' . DS . 'public' . DS . GET_PAGE_ID_BCK . '.tpl', 15, ERROR_PAGE_BCK);
                        }
                        fclose($handle);
                    }
                }
            }
        } else {
            $fetched_results = Fxr_lib\Database::loadQuery('select', "SELECT setting_abbr_lang_bck, setting_page_in_cache_bck, setting_init_cache_time_bck, setting_duration_cache_time_bck FROM " . DB_PREFIX . "settings_bck WHERE setting_abbr_lang_bck = :setting_abbr_lang_bck", '+', array(
                ':setting_abbr_lang_bck' => array(
                    PAGE_LANG_BCK => 's'
                )
            ));
            
            foreach ($fetched_results as $key_results) {
                
                $setting_page_in_cache_bck       = $key_results['setting_page_in_cache_bck'];
                $setting_init_cache_time_bck     = $key_results['setting_init_cache_time_bck'];
                $setting_duration_cache_time_bck = $key_results['setting_duration_cache_time_bck'];
                
            }
            
            if (defined("AUTH_ACCESS_BCK")) {
                if (is_file(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'pages' . DS . 'restricted' . DS . AUTH_ACCESS_BCK . DS . PAGE_LANG_BCK . '.tpl')) {
                    if (strtotime($setting_init_cache_time_bck) + $setting_duration_cache_time_bck > time()) {
                        if ($setting_page_in_cache_bck == 0) {
                            unlink(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'pages' . DS . 'restricted' . DS . AUTH_ACCESS_BCK . DS . PAGE_LANG_BCK . '.tpl');
                        }
                    } else {
                        if ($setting_page_in_cache_bck == 1) {
                            if (!$handle = fopen(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'pages' . DS . 'restricted' . DS . AUTH_ACCESS_BCK . DS . PAGE_LANG_BCK . '.tpl', "w")) {
                                throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'pages' . DS . 'restricted' . DS . AUTH_ACCESS_BCK . DS . PAGE_LANG_BCK . '.tpl', 2, ERROR_PAGE_BCK);
                            }
                            if (fwrite($handle, $tpl_content) === false) {
                                throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'pages' . DS . 'restricted' . DS . AUTH_ACCESS_BCK . DS . PAGE_LANG_BCK . '.tpl', 15, ERROR_PAGE_BCK);
                            }
                            if (fwrite($handle, $cache_comment) === false) {
                                throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'pages' . DS . 'restricted' . DS . AUTH_ACCESS_BCK . DS . PAGE_LANG_BCK . '.tpl', 15, ERROR_PAGE_BCK);
                            }
                            fclose($handle);
                        } else {
                            unlink(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'pages' . DS . 'restricted' . DS . AUTH_ACCESS_BCK . DS . PAGE_LANG_BCK . '.tpl');
                        }
                    }
                } else {
                    if ($setting_page_in_cache_bck == 1) {
                        if (!$handle = fopen(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'pages' . DS . 'restricted' . DS . AUTH_ACCESS_BCK . DS . PAGE_LANG_BCK . '.tpl', "w")) {
                            throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'pages' . DS . 'restricted' . DS . AUTH_ACCESS_BCK . DS . PAGE_LANG_BCK . '.tpl', 2, ERROR_PAGE_BCK);
                        }
                        if (fwrite($handle, $tpl_content) === false) {
                            throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'pages' . DS . 'restricted' . DS . AUTH_ACCESS_BCK . DS . PAGE_LANG_BCK . '.tpl', 15, ERROR_PAGE_BCK);
                        }
                        if (fwrite($handle, $cache_comment) === false) {
                            throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'pages' . DS . 'restricted' . DS . AUTH_ACCESS_BCK . DS . PAGE_LANG_BCK . '.tpl', 15, ERROR_PAGE_BCK);
                        }
                        fclose($handle);
                    }
                }
            } else {
                if (is_file(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'pages' . DS . 'public' . DS . PAGE_LANG_BCK . '.tpl')) {
                    if (strtotime($setting_init_cache_time_bck) + $setting_duration_cache_time_bck > time()) {
                        if ($setting_page_in_cache_bck == 0) {
                            unlink(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'pages' . DS . 'public' . DS . PAGE_LANG_BCK . '.tpl');
                        }
                    } else {
                        if ($setting_page_in_cache_bck == 1) {
                            if (!$handle = fopen(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'pages' . DS . 'public' . DS . PAGE_LANG_BCK . '.tpl', "w")) {
                                throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'pages' . DS . 'public' . DS . PAGE_LANG_BCK . '.tpl', 2, ERROR_PAGE_BCK);
                            }
                            if (fwrite($handle, $tpl_content) === false) {
                                throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'pages' . DS . 'public' . DS . PAGE_LANG_BCK . '.tpl', 15, ERROR_PAGE_BCK);
                            }
                            if (fwrite($handle, $cache_comment) === false) {
                                throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'pages' . DS . 'public' . DS . PAGE_LANG_BCK . '.tpl', 15, ERROR_PAGE_BCK);
                            }
                            fclose($handle);
                        } else {
                            unlink(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'pages' . DS . 'public' . DS . PAGE_LANG_BCK . '.tpl');
                        }
                    }
                } else {
                    if ($setting_page_in_cache_bck == 1) {
                        if (!$handle = fopen(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'pages' . DS . 'public' . DS . PAGE_LANG_BCK . '.tpl', "w")) {
                            throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'pages' . DS . 'public' . DS . PAGE_LANG_BCK . '.tpl', 2, ERROR_PAGE_BCK);
                        }
                        if (fwrite($handle, $tpl_content) === false) {
                            throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'pages' . DS . 'public' . DS . PAGE_LANG_BCK . '.tpl', 15, ERROR_PAGE_BCK);
                        }
                        if (fwrite($handle, $cache_comment) === false) {
                            throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_BCK . DS . THEME_FOLDER_BCK . DS . 'pages' . DS . 'public' . DS . PAGE_LANG_BCK . '.tpl', 15, ERROR_PAGE_BCK);
                        }
                        fclose($handle);
                    }
                }
            }
        }
    }
}
