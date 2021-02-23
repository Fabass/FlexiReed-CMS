<?php
namespace libraries\fxr_lib;

use libraries\fxr_lib as Fxr_lib;

if (!defined('FXR_INDEX')) {
    header('HTTP/1.1 403 Forbidden');
    exit('No direct script access allowed');
}
/**
 * Title: FXR Error Class (Front-End) 
 *
 * @author Fabien Assenarre
 * @link http://www.flexireed.org
 * @copyright Copyright &copy; 2020 Fabien Assenarre
 * @license http://opensource.org/licenses/MIT
 *
 */

abstract class Cache
{
    private $abbr_lang_frt;
    private $action_tag;
    private $cache_active;
    private $cache_comment;
    private $cache_head_pages_content_frt;
    private $cache_head_superglobals_content_frt;
    private $cache_head_themes_content_frt;
    private $cache_pages;
    private $cache_superglobals_content_frt;
    private $cache_superglobals;
    private $cache_tags_pages_frt;
    private $cache_themes_content_frt;
    private $cache_themes_default;
    private $cache_themes_id;
    private $content;
    private $default_public_tpl_frt;
    private $default_tpl_restricted_frt;
    private $duration_cache_time_frt;
    private $fetched_results;
    private $handle;
    private $i;
    private $id_page_frt;
    private $init_cache_time_frt;
    private $key_results;
    private $page_duration_cache_time_frt;
    private $page_id_frt;
    private $page_in_cache_frt;
    private $page_init_cache_time_frt;
    private $page_theme_folder_frt;
    private $page_theme_lang_frt;
    private $page_theme_tpl_frt;
    private $setting_abbr_lang_frt;
    private $setting_default_public_tpl_frt;
    private $setting_default_restricted_tpl_frt;
    private $setting_duration_cache_time_frt;
    private $setting_init_cache_time_frt;
    private $setting_page_in_cache_frt;
    private $setting_theme_folder_frt;
    private $theme_folder_frt;
    private $theme_lang_frt;
    private $theme_tpl_frt;
    private $tpl_content;
    
    /**
     * Update Cache Superglobals Settings
     *
     * @access    public
     * @return    void
     */
    public static function updateCacheSuperglobalsSettings()
    {
        if (defined("UPDATE_CACHE_SUPERGLOBALS_SETTINGS_FRT") && UPDATE_CACHE_SUPERGLOBALS_SETTINGS_FRT == 1) {
            $cache_head_superglobals_content_frt = "<?php\n";
            $cache_head_superglobals_content_frt .= "namespace cache;\n";
            $cache_head_superglobals_content_frt .= "\n";
            $cache_head_superglobals_content_frt .= "if (!defined('FXR_INDEX')) {\n";
            $cache_head_superglobals_content_frt .= "    exit('No direct script access allowed');\n";
            $cache_head_superglobals_content_frt .= "}\n";
            $cache_head_superglobals_content_frt .= "/**\n";
            $cache_head_superglobals_content_frt .= "* Title: FXR Cache Superglobals (Front-End)\n";
            $cache_head_superglobals_content_frt .= "*\n";
            $cache_head_superglobals_content_frt .= "* @author Fabien Assenarre\n";
            $cache_head_superglobals_content_frt .= "* @link http://www.flexireed.org\n";
            $cache_head_superglobals_content_frt .= "* @copyright Copyright &copy; 2017 Fabien Assenarre\n";
            $cache_head_superglobals_content_frt .= "* @license http://www.opensource.org/licenses/mit-license.php MIT\n";
            $cache_head_superglobals_content_frt .= "*\n";
            $cache_head_superglobals_content_frt .= "*/\n";
            $cache_head_superglobals_content_frt .= "\n";
            
            $fetched_results = Fxr_lib\Database::loadQuery('select', "SELECT setting_abbr_lang_frt FROM " . DB_PREFIX . "settings_frt", '+', '');
            
            $cache_superglobals_content_frt = '$cache_superglobals[\'page_lang_frt\'] = array(' . "\n";
            $i                              = 0;
            foreach ($fetched_results as $key_results) {
                
                $setting_abbr_lang_frt = $key_results['setting_abbr_lang_frt'];
                if ($i == 0) {
                    $cache_superglobals_content_frt .= "'$setting_abbr_lang_frt'";
                } else {
                    $cache_superglobals_content_frt .= ", '$setting_abbr_lang_frt'";
                }
                $i++;
                
            }
            $cache_superglobals_content_frt .= ");\n";
            $cache_superglobals_content_frt .= "\n";
            
            $fetched_results = Fxr_lib\Database::loadQuery('select', "SELECT page_id_frt FROM " . DB_PREFIX . "pages_frt", '+', '');
            
            $cache_superglobals_content_frt .= '$cache_superglobals[\'page_id_frt\'] = array(' . "\n";
            $i = 0;
            foreach ($fetched_results as $key_results) {
                $page_id_frt = $key_results['page_id_frt'];
                if ($i == 0) {
                    $cache_superglobals_content_frt .= "'$page_id_frt'";
                } else {
                    $cache_superglobals_content_frt .= ", '$page_id_frt'";
                }
                $i++;
            }
            $cache_superglobals_content_frt .= ");\n";
            $cache_superglobals_content_frt .= "\n";
            
            if (!$handle = fopen(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'settings' . DS . 'cache_superglobals_frt.php', "w")) {
                throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'settings' . DS . 'cache_superglobals_frt.php', 2, ERROR_PAGE_FRT);
            }
            if (fwrite($handle, $cache_head_superglobals_content_frt) === false) {
                throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'settings' . DS . 'cache_superglobals_frt.php', 15, ERROR_PAGE_FRT);
            }
            if (fwrite($handle, $cache_superglobals_content_frt) === false) {
                throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'settings' . DS . 'cache_superglobals_frt.php', 15, ERROR_PAGE_FRT);
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
        $cache_head_themes_content_frt = "<?php\n";
        $cache_head_themes_content_frt .= "namespace cache;\n";
        $cache_head_themes_content_frt .= "\n";
        $cache_head_themes_content_frt .= "if (!defined('FXR_INDEX')) {\n";
        $cache_head_themes_content_frt .= "    exit('No direct script access allowed');\n";
        $cache_head_themes_content_frt .= "}\n";
        $cache_head_themes_content_frt .= "/**\n";
        $cache_head_themes_content_frt .= "* Title: FXR Cache Themes (Front-End)\n";
        $cache_head_themes_content_frt .= "*\n";
        $cache_head_themes_content_frt .= "* @author Fabien Assenarre\n";
        $cache_head_themes_content_frt .= "* @link http://www.flexireed.org\n";
        $cache_head_themes_content_frt .= "* @copyright Copyright &copy; 2017 Fabien Assenarre\n";
        $cache_head_themes_content_frt .= "* @license http://www.opensource.org/licenses/mit-license.php MIT\n";
        $cache_head_themes_content_frt .= "*\n";
        $cache_head_themes_content_frt .= "*/\n";
        $cache_head_themes_content_frt .= "\n";
        
        $fetched_results = Fxr_lib\Database::loadQuery('select', "SELECT setting_abbr_lang_frt, setting_default_public_tpl_frt, setting_default_restricted_tpl_frt, setting_theme_folder_frt FROM " . DB_PREFIX . "settings_frt", '+', '');
        
        $cache_themes_content_frt = '';
        $cache_themes_content_frt .= '$cache_themes_default = array(' . "\n";
        $i = 0;
        
        foreach ($fetched_results as $key_results) {
            $setting_abbr_lang_frt = $key_results['setting_abbr_lang_frt'];
            if ($i == 0) {
                $cache_themes_content_frt .= "'$setting_abbr_lang_frt' => array(\n";
            } else {
                $cache_themes_content_frt .= ", '$setting_abbr_lang_frt' => array(\n";
            }
            $i++;
            $setting_theme_folder_frt = $key_results['setting_theme_folder_frt'];
            $cache_themes_content_frt .= "'$setting_theme_folder_frt',\n";
            $setting_default_public_tpl_frt = $key_results['setting_default_public_tpl_frt'];
            $cache_themes_content_frt .= "'$setting_default_public_tpl_frt',\n";
            $setting_default_restricted_tpl_frt = $key_results['setting_default_restricted_tpl_frt'];
            $cache_themes_content_frt .= "'$setting_default_restricted_tpl_frt'\n";
            $cache_themes_content_frt .= ")\n";
        }
        $cache_themes_content_frt .= ");\n\n";
        
        $fetched_results = Fxr_lib\Database::loadQuery('select', "SELECT page_id_frt, page_theme_tpl_frt, page_theme_folder_frt, page_theme_lang_frt FROM " . DB_PREFIX . "pages_frt", '+', '');
        
        $cache_themes_content_frt .= '$cache_themes_id = array(' . "\n";
        $i = 0;
        
        foreach ($fetched_results as $key_results) {
            $page_id_frt = $key_results['page_id_frt'];
            if ($i == 0) {
                $cache_themes_content_frt .= "'$page_id_frt' => array(\n";
            } else {
                $cache_themes_content_frt .= ", '$page_id_frt' => array(\n";
            }
            $i++;
            $page_theme_lang_frt = $key_results['page_theme_lang_frt'];
            $cache_themes_content_frt .= "'$page_theme_lang_frt',\n";
            $page_theme_folder_frt = $key_results['page_theme_folder_frt'];
            $cache_themes_content_frt .= "'$page_theme_folder_frt',\n";
            $page_theme_tpl_frt = $key_results['page_theme_tpl_frt'];
            $cache_themes_content_frt .= "'$page_theme_tpl_frt'\n";
            $cache_themes_content_frt .= ")\n";
        }
        $cache_themes_content_frt .= ");\n";
        if (!$handle = fopen(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'settings' . DS . 'cache_themes_frt.php', "w")) {
            throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'settings' . DS . 'cache_themes_frt.php', 2, ERROR_PAGE_FRT);
        }
        if (fwrite($handle, $cache_head_themes_content_frt) === false) {
            throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'settings' . DS . 'cache_themes_frt.php', 15, ERROR_PAGE_FRT);
        }
        if (fwrite($handle, $cache_themes_content_frt) === false) {
            throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'settings' . DS . 'cache_themes_frt.php', 15, ERROR_PAGE_FRT);
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
        $cache_head_pages_content_frt = "<?php\n";
        $cache_head_pages_content_frt .= "namespace cache;\n";
        $cache_head_pages_content_frt .= "\n";
        $cache_head_pages_content_frt .= "if (!defined('FXR_INDEX')) {\n";
        $cache_head_pages_content_frt .= "    exit('No direct script access allowed');\n";
        $cache_head_pages_content_frt .= "}\n";
        $cache_head_pages_content_frt .= "/**\n";
        $cache_head_pages_content_frt .= "* Title: FXR Cache Pages (Front-End)\n";
        $cache_head_pages_content_frt .= "*\n";
        $cache_head_pages_content_frt .= "* @author Fabien Assenarre\n";
        $cache_head_pages_content_frt .= "* @link http://www.flexireed.org\n";
        $cache_head_pages_content_frt .= "* @copyright Copyright &copy; 2017 Fabien Assenarre\n";
        $cache_head_pages_content_frt .= "* @license http://www.opensource.org/licenses/mit-license.php MIT\n";
        $cache_head_pages_content_frt .= "*\n";
        $cache_head_pages_content_frt .= "*/\n";
        $cache_head_pages_content_frt .= "\n";
        
        $fetched_results = Fxr_lib\Database::loadQuery('select', "SELECT page_id_frt, page_theme_tpl_frt, page_theme_folder_frt, page_theme_lang_frt, page_init_cache_time_frt, page_duration_cache_time_frt FROM " . DB_PREFIX . "pages_frt WHERE page_in_cache_frt = 1", '+', '');
        
        $cache_tags_pages_frt = '';
        
        $i = 0;
        
        foreach ($fetched_results as $key_results) {
            
            $page_id_frt                  = $key_results['page_id_frt'];
            $page_theme_tpl_frt           = $key_results['page_theme_tpl_frt'];
            $page_theme_folder_frt        = $key_results['page_theme_folder_frt'];
            $page_theme_lang_frt          = $key_results['page_theme_lang_frt'];
            $page_init_cache_time_frt     = $key_results['page_init_cache_time_frt'];
            $page_duration_cache_time_frt = $key_results['page_duration_cache_time_frt'];
            
            if (strtotime($page_init_cache_time_frt) + $page_duration_cache_time_frt > time()) {
                
                $cache_tags_pages_frt .= '$cache_pages[\'' . "$page_id_frt" . '\'] = array(' . "\n";
                
                $cache_tags_pages_frt .= "'$page_theme_lang_frt'\n";
                $cache_tags_pages_frt .= ", '$page_theme_folder_frt'\n";
                $cache_tags_pages_frt .= ", '$page_theme_tpl_frt'\n";
                $cache_tags_pages_frt .= ");\n";
                $cache_tags_pages_frt .= "\n";
            }
        }
        
        $fetched_results = Fxr_lib\Database::loadQuery('select', "SELECT setting_abbr_lang_frt, setting_default_public_tpl_frt, setting_default_restricted_tpl_frt, setting_theme_folder_frt, setting_init_cache_time_frt, setting_duration_cache_time_frt FROM " . DB_PREFIX . "settings_frt WHERE setting_page_in_cache_frt = 1", '+', '');
        
        $i = 0;
        
        foreach ($fetched_results as $key_results) {
            
            $setting_abbr_lang_frt              = $key_results['setting_abbr_lang_frt'];
            $setting_theme_folder_frt           = $key_results['setting_theme_folder_frt'];
            $setting_default_public_tpl_frt     = $key_results['setting_default_public_tpl_frt'];
            $setting_default_restricted_tpl_frt = $key_results['setting_default_restricted_tpl_frt'];
            $setting_init_cache_time_frt        = $key_results['setting_init_cache_time_frt'];
            $setting_duration_cache_time_frt    = $key_results['setting_duration_cache_time_frt'];
            
            if (strtotime($setting_init_cache_time_frt) + $setting_duration_cache_time_frt > time()) {
                $cache_tags_pages_frt .= '$cache_pages[\'' . "$setting_abbr_lang_frt" . '\'] = array(' . "\n";
                
                $cache_tags_pages_frt .= "'$setting_abbr_lang_frt'\n";
                $cache_tags_pages_frt .= ", '$setting_theme_folder_frt'\n";
                $cache_tags_pages_frt .= ", '$setting_default_public_tpl_frt'\n";
                $cache_tags_pages_frt .= ", '$setting_default_restricted_tpl_frt'\n";
                $cache_tags_pages_frt .= ");\n";
                $cache_tags_pages_frt .= "\n";
            }
        }
        
        if (!$handle = fopen(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'settings' . DS . 'cache_pages_frt.php', "w")) {
            throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'settings' . DS . 'cache_pages_frt.php', 2, ERROR_PAGE_FRT);
        }
        if (fwrite($handle, $cache_head_pages_content_frt) === false) {
            throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'settings' . DS . 'cache_pages_frt.php', 15, ERROR_PAGE_FRT);
        }
        if (fwrite($handle, $cache_tags_pages_frt) === false) {
            throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'settings' . DS . 'cache_pages_frt.php', 15, ERROR_PAGE_FRT);
        }
        fclose($handle);
        
        $fetched_results = Fxr_lib\Database::loadQuery('select', "SELECT page_id_frt, page_theme_tpl_frt, page_theme_folder_frt, page_theme_lang_frt, page_init_cache_time_frt, page_duration_cache_time_frt FROM " . DB_PREFIX . "pages_frt WHERE page_in_cache_frt = 0", '+', '');
        
        $i = 0;
        
        foreach ($fetched_results as $key_results) {
            
            if (defined("AUTH_ACCESS_FRT")) {
                $page_id_frt           = $key_results['page_id_frt'];
                $page_theme_lang_frt   = $key_results['page_theme_lang_frt'];
                $page_theme_folder_frt = $key_results['page_theme_folder_frt'];
                $page_theme_tpl_frt    = $key_results['page_theme_tpl_frt'];
                
                if (is_file(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . $page_theme_lang_frt . DS . $page_theme_folder_frt . DS . 'pages' . DS . 'restricted' . DS . AUTH_ACCESS_FRT . DS . $page_id_frt . '.tpl')) {
                    unlink(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . $page_theme_lang_frt . DS . $page_theme_folder_frt . DS . 'pages' . DS . 'restricted' . DS . AUTH_ACCESS_FRT . DS . $page_id_frt . '.tpl');
                }
                
            } else {
                $page_id_frt                  = $key_results['page_id_frt'];
                $page_theme_lang_frt          = $key_results['page_theme_lang_frt'];
                $page_theme_folder_frt        = $key_results['page_theme_folder_frt'];
                $page_theme_tpl_frt           = $key_results['page_theme_tpl_frt'];
                $page_init_cache_time_frt     = $key_results['page_init_cache_time_frt'];
                $page_duration_cache_time_frt = $key_results['page_duration_cache_time_frt'];
                
                if (is_file(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . $page_theme_lang_frt . DS . $page_theme_folder_frt . DS . 'pages' . DS . 'public' . DS . $page_id_frt . '.tpl')) {
                    unlink(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . $page_theme_lang_frt . DS . $page_theme_folder_frt . DS . 'pages' . DS . 'public' . DS . $page_id_frt . '.tpl');
                }
            }
        }
        
        $fetched_results = Fxr_lib\Database::loadQuery('select', "SELECT setting_abbr_lang_frt, setting_default_public_tpl_frt, setting_default_restricted_tpl_frt, setting_theme_folder_frt, setting_init_cache_time_frt, setting_duration_cache_time_frt FROM " . DB_PREFIX . "settings_frt WHERE setting_page_in_cache_frt = 0", '+', '');
        
        $i = 0;
        
        foreach ($fetched_results as $key_results) {
            
            if (defined("AUTH_ACCESS_FRT")) {
                $setting_abbr_lang_frt              = $key_results['setting_abbr_lang_frt'];
                $setting_theme_folder_frt           = $key_results['setting_theme_folder_frt'];
                $setting_default_restricted_tpl_frt = $key_results['setting_default_restricted_tpl_frt'];
                
                if (is_file(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . $setting_abbr_lang_frt . DS . $setting_theme_folder_frt . DS . 'pages' . DS . 'restricted' . DS . AUTH_ACCESS_FRT . DS . $setting_default_restricted_tpl_frt . '.tpl')) {
                    unlink(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . $setting_abbr_lang_frt . DS . $setting_theme_folder_frt . DS . 'pages' . DS . 'restricted' . DS . AUTH_ACCESS_FRT . DS . $setting_default_restricted_tpl_frt . '.tpl');
                }
                
            } else {
                $setting_abbr_lang_frt          = $key_results['setting_abbr_lang_frt'];
                $setting_theme_folder_frt       = $key_results['setting_theme_folder_frt'];
                $setting_default_public_tpl_frt = $key_results['setting_default_public_tpl_frt'];
                
                if (is_file(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . $setting_abbr_lang_frt . DS . $setting_theme_folder_frt . DS . 'pages' . DS . 'public' . DS . $setting_default_public_tpl_frt . '.tpl')) {
                    unlink(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . $setting_abbr_lang_frt . DS . $setting_theme_folder_frt . DS . 'pages' . DS . 'public' . DS . $setting_default_public_tpl_frt . '.tpl');
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
        
        if (!is_dir(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT)) {
            mkdir(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT, 0777, true);
        }
        if (!is_dir(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT)) {
            mkdir(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT, 0777, true);
        }
        if (!is_dir(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'tags')) {
            mkdir(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'tags', 0777, true);
        }
        if (defined("AUTH_ACCESS_FRT")) {
            if (!is_dir(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'tags' . DS . 'restricted' . DS . AUTH_ACCESS_FRT)) {
                mkdir(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'tags' . DS . 'restricted' . DS . AUTH_ACCESS_FRT, 0777, true);
            }
        } else {
            if (!is_dir(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'tags' . DS . 'public')) {
                mkdir(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'tags' . DS . 'public', 0777, true);
            }
        }
        $cache_comment = '<!-- Served from cache :: ' . gmdate("M d Y H:i:s") . ' -->';
        
        if (defined("GET_PAGE_ID_FRT") && GET_PAGE_ID_FRT !== '') {
            if (defined("AUTH_ACCESS_FRT")) {
                if (!is_dir(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'tags' . DS . 'restricted' . DS . AUTH_ACCESS_FRT . DS . $action_tag)) {
                    mkdir(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'tags' . DS . 'restricted' . DS . AUTH_ACCESS_FRT . DS . $action_tag, 0777, true);
                }
                if ($cache_active === 1) {
                    if (!$handle = fopen(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'tags' . DS . 'restricted' . DS . AUTH_ACCESS_FRT . DS . $action_tag . DS . $action_tag . '_' . GET_PAGE_ID_FRT . '.tpl', "w")) {
                        throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'tags' . DS . 'restricted' . DS . AUTH_ACCESS_FRT . DS . $action_tag . DS . $action_tag . '_' . GET_PAGE_ID_FRT . '.tpl', 2, ERROR_PAGE_FRT);
                    }
                    if (fwrite($handle, $content) === false) {
                        throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'tags' . DS . 'restricted' . DS . AUTH_ACCESS_FRT . DS . $action_tag . DS . $action_tag . '_' . GET_PAGE_ID_FRT . '.tpl', 15, ERROR_PAGE_FRT);
                    }
                    if (fwrite($handle, $cache_comment) === false) {
                        throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'tags' . DS . 'restricted' . DS . AUTH_ACCESS_FRT . DS . $action_tag . DS . $action_tag . '_' . GET_PAGE_ID_FRT . '.tpl', 15, ERROR_PAGE_FRT);
                    }
                    fclose($handle);
                } else {
                    if (is_file(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'tags' . DS . 'restricted' . DS . AUTH_ACCESS_FRT . DS . $action_tag . DS . $action_tag . '_' . GET_PAGE_ID_FRT . '.tpl')) {
                        unlink(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'tags' . DS . 'restricted' . DS . AUTH_ACCESS_FRT . DS . $action_tag . DS . $action_tag . '_' . GET_PAGE_ID_FRT . '.tpl');
                    }
                    if (is_dir(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'tags' . DS . 'restricted' . DS . AUTH_ACCESS_FRT . DS . $action_tag)) {
                        rmdir(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'tags' . DS . 'restricted' . DS . AUTH_ACCESS_FRT . DS . $action_tag);
                    }
                }
            } else {
                if (!is_dir(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'tags' . DS . 'public' . DS . $action_tag)) {
                    mkdir(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'tags' . DS . 'public' . DS . $action_tag, 0777, true);
                }
                if ($cache_active === 1) {
                    if (!$handle = fopen(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'tags' . DS . 'public' . DS . $action_tag . DS . $action_tag . '_' . GET_PAGE_ID_FRT . '.tpl', "w")) {
                        throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'tags' . DS . 'public' . DS . $action_tag . DS . $action_tag . '_' . GET_PAGE_ID_FRT . '.tpl', 2, ERROR_PAGE_FRT);
                    }
                    if (fwrite($handle, $content) === false) {
                        throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'tags' . DS . 'public' . DS . $action_tag . DS . $action_tag . '_' . GET_PAGE_ID_FRT . '.tpl', 15, ERROR_PAGE_FRT);
                    }
                    if (fwrite($handle, $cache_comment) === false) {
                        throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'tags' . DS . 'public' . DS . $action_tag . DS . $action_tag . '_' . GET_PAGE_ID_FRT . '.tpl', 15, ERROR_PAGE_FRT);
                    }
                    fclose($handle);
                } else {
                    if (is_file(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'tags' . DS . 'public' . DS . $action_tag . DS . $action_tag . '_' . GET_PAGE_ID_FRT . '.tpl')) {
                        unlink(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'tags' . DS . 'public' . DS . $action_tag . DS . $action_tag . '_' . GET_PAGE_ID_FRT . '.tpl');
                    }
                    if (is_dir(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'tags' . DS . 'public' . DS . $action_tag)) {
                        rmdir(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'tags' . DS . 'public' . DS . $action_tag);
                    }
                }
            }
        } else {
            if (defined("AUTH_ACCESS_FRT")) {
                if (!is_dir(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'tags' . DS . 'restricted' . DS . AUTH_ACCESS_FRT . DS . $action_tag)) {
                    mkdir(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'tags' . DS . 'restricted' . DS . AUTH_ACCESS_FRT . DS . $action_tag, 0777, true);
                }
                if ($cache_active === 1) {
                    if (!$handle = fopen(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'tags' . DS . 'restricted' . DS . AUTH_ACCESS_FRT . DS . $action_tag . DS . $action_tag . '_' . PAGE_LANG_FRT . '.tpl', "w")) {
                        throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'tags' . DS . 'restricted' . DS . AUTH_ACCESS_FRT . DS . $action_tag . DS . $action_tag . '_' . PAGE_LANG_FRT . '.tpl', 2, ERROR_PAGE_FRT);
                    }
                    if (fwrite($handle, $content) === false) {
                        throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'tags' . DS . 'restricted' . DS . AUTH_ACCESS_FRT . DS . $action_tag . DS . $action_tag . '_' . PAGE_LANG_FRT . '.tpl', 15, ERROR_PAGE_FRT);
                    }
                    if (fwrite($handle, $cache_comment) === false) {
                        throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'tags' . DS . 'restricted' . DS . AUTH_ACCESS_FRT . DS . $action_tag . DS . $action_tag . '_' . PAGE_LANG_FRT . '.tpl', 15, ERROR_PAGE_FRT);
                    }
                    fclose($handle);
                } else {
                    if (is_file(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'tags' . DS . 'restricted' . DS . AUTH_ACCESS_FRT . DS . $action_tag . DS . $action_tag . '_' . PAGE_LANG_FRT . '.tpl')) {
                        unlink(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'tags' . DS . 'restricted' . DS . AUTH_ACCESS_FRT . DS . $action_tag . DS . $action_tag . '_' . PAGE_LANG_FRT . '.tpl');
                    }
                    if (is_dir(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'tags' . DS . 'restricted' . DS . AUTH_ACCESS_FRT . DS . $action_tag)) {
                        rmdir(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'tags' . DS . 'restricted' . DS . AUTH_ACCESS_FRT . DS . $action_tag);
                    }
                }
            } else {
                if (!is_dir(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'tags' . DS . 'public' . DS . $action_tag)) {
                    mkdir(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'tags' . DS . 'public' . DS . $action_tag, 0777, true);
                }
                if ($cache_active === 1) {
                    if (!$handle = fopen(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'tags' . DS . 'public' . DS . $action_tag . DS . $action_tag . '_' . PAGE_LANG_FRT . '.tpl', "w")) {
                        throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'tags' . DS . 'public' . DS . $action_tag . DS . $action_tag . '_' . PAGE_LANG_FRT . '.tpl', 2, ERROR_PAGE_FRT);
                    }
                    if (fwrite($handle, $content) === false) {
                        throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'tags' . DS . 'public' . DS . $action_tag . DS . $action_tag . '_' . PAGE_LANG_FRT . '.tpl', 15, ERROR_PAGE_FRT);
                    }
                    if (fwrite($handle, $cache_comment) === false) {
                        throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'tags' . DS . 'public' . DS . $action_tag . DS . $action_tag . '_' . PAGE_LANG_FRT . '.tpl', 15, ERROR_PAGE_FRT);
                    }
                    fclose($handle);
                } else {
                    if (is_file(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'tags' . DS . 'public' . DS . $action_tag . DS . $action_tag . '_' . PAGE_LANG_FRT . '.tpl')) {
                        unlink(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'tags' . DS . 'public' . DS . $action_tag . DS . $action_tag . '_' . PAGE_LANG_FRT . '.tpl');
                    }
                    if (is_dir(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'tags' . DS . 'public' . DS . $action_tag)) {
                        rmdir(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'tags' . DS . 'public' . DS . $action_tag);
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
        
        if (!is_dir(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT)) {
            mkdir(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT, 0777, true);
        }
        if (!is_dir(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT)) {
            mkdir(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT, 0777, true);
        }
        if (!is_dir(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'pages')) {
            mkdir(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'pages', 0777, true);
        }
        if (defined("AUTH_ACCESS_FRT")) {
            if (!is_dir(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'pages' . DS . 'restricted' . DS . AUTH_ACCESS_FRT)) {
                mkdir(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'pages' . DS . 'restricted' . DS . AUTH_ACCESS_FRT, 0777, true);
            }
        } else {
            if (!is_dir(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'pages' . DS . 'public')) {
                mkdir(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'pages' . DS . 'public', 0777, true);
            }
        }
        $cache_comment = '<!-- Served from cache :: ' . gmdate("M d Y H:i:s") . ' -->';
        
        if (defined("GET_PAGE_ID_FRT") && GET_PAGE_ID_FRT !== '') {
            
            $fetched_results = Fxr_lib\Database::loadQuery('select', "SELECT page_id_frt, page_in_cache_frt, page_init_cache_time_frt, page_duration_cache_time_frt FROM " . DB_PREFIX . "pages_frt WHERE page_id_frt = :page_id_frt", '+', array(
                ':page_id_frt' => array(
                    GET_PAGE_ID_FRT => 'i'
                )
            ));
            
            foreach ($fetched_results as $key_results) {
                $page_id_frt                  = $key_results['page_id_frt'];
                $page_in_cache_frt            = $key_results['page_in_cache_frt'];
                $page_init_cache_time_frt     = $key_results['page_init_cache_time_frt'];
                $page_duration_cache_time_frt = $key_results['page_duration_cache_time_frt'];
            }
            
            if (defined("AUTH_ACCESS_FRT")) {
                if (is_file(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'pages' . DS . 'restricted' . DS . AUTH_ACCESS_FRT . DS . GET_PAGE_ID_FRT . '.tpl')) {
                    if (strtotime($page_init_cache_time_frt) + $page_duration_cache_time_frt > time()) {
                        if ($page_in_cache_frt == 0) {
                            unlink(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'pages' . DS . 'restricted' . DS . AUTH_ACCESS_FRT . DS . GET_PAGE_ID_FRT . '.tpl');
                        }
                    } else {
                        if ($page_in_cache_frt == 1) {
                            if (!$handle = fopen(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'pages' . DS . 'restricted' . DS . AUTH_ACCESS_FRT . DS . GET_PAGE_ID_FRT . '.tpl', "w")) {
                                throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'pages' . DS . 'restricted' . DS . AUTH_ACCESS_FRT . DS . GET_PAGE_ID_FRT . '.tpl', 2, ERROR_PAGE_FRT);
                            }
                            if (fwrite($handle, $tpl_content) === false) {
                                throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'pages' . DS . 'restricted' . DS . AUTH_ACCESS_FRT . DS . GET_PAGE_ID_FRT . '.tpl', 15, ERROR_PAGE_FRT);
                            }
                            if (fwrite($handle, $cache_comment) === false) {
                                throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'pages' . DS . 'restricted' . DS . AUTH_ACCESS_FRT . DS . GET_PAGE_ID_FRT . '.tpl', 15, ERROR_PAGE_FRT);
                            }
                            fclose($handle);
                        } else {
                            unlink(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'pages' . DS . 'restricted' . DS . AUTH_ACCESS_FRT . DS . GET_PAGE_ID_FRT . '.tpl');
                        }
                    }
                } else {
                    if ($page_in_cache_frt == 1) {
                        if (!$handle = fopen(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'pages' . DS . 'restricted' . DS . AUTH_ACCESS_FRT . DS . GET_PAGE_ID_FRT . '.tpl', "w")) {
                            throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'pages' . DS . 'restricted' . DS . AUTH_ACCESS_FRT . DS . GET_PAGE_ID_FRT . '.tpl', 2, ERROR_PAGE_FRT);
                        }
                        if (fwrite($handle, $tpl_content) === false) {
                            throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'pages' . DS . 'restricted' . DS . AUTH_ACCESS_FRT . DS . GET_PAGE_ID_FRT . '.tpl', 15, ERROR_PAGE_FRT);
                        }
                        if (fwrite($handle, $cache_comment) === false) {
                            throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'pages' . DS . 'restricted' . DS . AUTH_ACCESS_FRT . DS . GET_PAGE_ID_FRT . '.tpl', 15, ERROR_PAGE_FRT);
                        }
                        fclose($handle);
                    }
                }
            } else {
                if (is_file(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'pages' . DS . 'public' . DS . GET_PAGE_ID_FRT . '.tpl')) {
                    if (strtotime($page_init_cache_time_frt) + $page_duration_cache_time_frt > time()) {
                        if ($page_in_cache_frt == 0) {
                            unlink(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'pages' . DS . 'public' . DS . GET_PAGE_ID_FRT . '.tpl');
                        }
                    } else {
                        if ($page_in_cache_frt == 1) {
                            if (!$handle = fopen(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'pages' . DS . 'public' . DS . GET_PAGE_ID_FRT . '.tpl', "w")) {
                                throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'pages' . DS . 'public' . DS . GET_PAGE_ID_FRT . '.tpl', 2, ERROR_PAGE_FRT);
                            }
                            if (fwrite($handle, $tpl_content) === false) {
                                throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'pages' . DS . 'public' . DS . GET_PAGE_ID_FRT . '.tpl', 15, ERROR_PAGE_FRT);
                            }
                            if (fwrite($handle, $cache_comment) === false) {
                                throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'pages' . DS . 'public' . DS . GET_PAGE_ID_FRT . '.tpl', 15, ERROR_PAGE_FRT);
                            }
                            fclose($handle);
                        } else {
                            unlink(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'pages' . DS . 'public' . DS . GET_PAGE_ID_FRT . '.tpl');
                        }
                    }
                } else {
                    if ($page_in_cache_frt == 1) {
                        if (!$handle = fopen(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'pages' . DS . 'public' . DS . GET_PAGE_ID_FRT . '.tpl', "w")) {
                            throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'pages' . DS . 'public' . DS . GET_PAGE_ID_FRT . '.tpl', 2, ERROR_PAGE_FRT);
                        }
                        if (fwrite($handle, $tpl_content) === false) {
                            throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'pages' . DS . 'public' . DS . GET_PAGE_ID_FRT . '.tpl', 15, ERROR_PAGE_FRT);
                        }
                        if (fwrite($handle, $cache_comment) === false) {
                            throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'pages' . DS . 'public' . DS . GET_PAGE_ID_FRT . '.tpl', 15, ERROR_PAGE_FRT);
                        }
                        fclose($handle);
                    }
                }
            }
        } else {
            $fetched_results = Fxr_lib\Database::loadQuery('select', "SELECT setting_abbr_lang_frt, setting_page_in_cache_frt, setting_init_cache_time_frt, setting_duration_cache_time_frt FROM " . DB_PREFIX . "settings_frt WHERE setting_abbr_lang_frt = :setting_abbr_lang_frt", '+', array(
                ':setting_abbr_lang_frt' => array(
                    PAGE_LANG_FRT => 's'
                )
            ));
            
            foreach ($fetched_results as $key_results) {
                
                $setting_page_in_cache_frt       = $key_results['setting_page_in_cache_frt'];
                $setting_init_cache_time_frt     = $key_results['setting_init_cache_time_frt'];
                $setting_duration_cache_time_frt = $key_results['setting_duration_cache_time_frt'];
                
            }
            
            if (defined("AUTH_ACCESS_FRT")) {
                if (is_file(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'pages' . DS . 'restricted' . DS . AUTH_ACCESS_FRT . DS . PAGE_LANG_FRT . '.tpl')) {
                    if (strtotime($setting_init_cache_time_frt) + $setting_duration_cache_time_frt > time()) {
                        if ($setting_page_in_cache_frt == 0) {
                            unlink(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'pages' . DS . 'restricted' . DS . AUTH_ACCESS_FRT . DS . PAGE_LANG_FRT . '.tpl');
                        }
                    } else {
                        if ($setting_page_in_cache_frt == 1) {
                            if (!$handle = fopen(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'pages' . DS . 'restricted' . DS . AUTH_ACCESS_FRT . DS . PAGE_LANG_FRT . '.tpl', "w")) {
                                throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'pages' . DS . 'restricted' . DS . AUTH_ACCESS_FRT . DS . PAGE_LANG_FRT . '.tpl', 2, ERROR_PAGE_FRT);
                            }
                            if (fwrite($handle, $tpl_content) === false) {
                                throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'pages' . DS . 'restricted' . DS . AUTH_ACCESS_FRT . DS . PAGE_LANG_FRT . '.tpl', 15, ERROR_PAGE_FRT);
                            }
                            if (fwrite($handle, $cache_comment) === false) {
                                throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'pages' . DS . 'restricted' . DS . AUTH_ACCESS_FRT . DS . PAGE_LANG_FRT . '.tpl', 15, ERROR_PAGE_FRT);
                            }
                            fclose($handle);
                        } else {
                            unlink(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'pages' . DS . 'restricted' . DS . AUTH_ACCESS_FRT . DS . PAGE_LANG_FRT . '.tpl');
                        }
                    }
                } else {
                    if ($setting_page_in_cache_frt == 1) {
                        if (!$handle = fopen(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'pages' . DS . 'restricted' . DS . AUTH_ACCESS_FRT . DS . PAGE_LANG_FRT . '.tpl', "w")) {
                            throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'pages' . DS . 'restricted' . DS . AUTH_ACCESS_FRT . DS . PAGE_LANG_FRT . '.tpl', 2, ERROR_PAGE_FRT);
                        }
                        if (fwrite($handle, $tpl_content) === false) {
                            throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'pages' . DS . 'restricted' . DS . AUTH_ACCESS_FRT . DS . PAGE_LANG_FRT . '.tpl', 15, ERROR_PAGE_FRT);
                        }
                        if (fwrite($handle, $cache_comment) === false) {
                            throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'pages' . DS . 'restricted' . DS . AUTH_ACCESS_FRT . DS . PAGE_LANG_FRT . '.tpl', 15, ERROR_PAGE_FRT);
                        }
                        fclose($handle);
                    }
                }
            } else {
                if (is_file(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'pages' . DS . 'public' . DS . PAGE_LANG_FRT . '.tpl')) {
                    if (strtotime($setting_init_cache_time_frt) + $setting_duration_cache_time_frt > time()) {
                        if ($setting_page_in_cache_frt == 0) {
                            unlink(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'pages' . DS . 'public' . DS . PAGE_LANG_FRT . '.tpl');
                        }
                    } else {
                        if ($setting_page_in_cache_frt == 1) {
                            if (!$handle = fopen(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'pages' . DS . 'public' . DS . PAGE_LANG_FRT . '.tpl', "w")) {
                                throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'pages' . DS . 'public' . DS . PAGE_LANG_FRT . '.tpl', 2, ERROR_PAGE_FRT);
                            }
                            if (fwrite($handle, $tpl_content) === false) {
                                throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'pages' . DS . 'public' . DS . PAGE_LANG_FRT . '.tpl', 15, ERROR_PAGE_FRT);
                            }
                            if (fwrite($handle, $cache_comment) === false) {
                                throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'pages' . DS . 'public' . DS . PAGE_LANG_FRT . '.tpl', 15, ERROR_PAGE_FRT);
                            }
                            fclose($handle);
                        } else {
                            unlink(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'pages' . DS . 'public' . DS . PAGE_LANG_FRT . '.tpl');
                        }
                    }
                } else {
                    if ($setting_page_in_cache_frt == 1) {
                        if (!$handle = fopen(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'pages' . DS . 'public' . DS . PAGE_LANG_FRT . '.tpl', "w")) {
                            throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'pages' . DS . 'public' . DS . PAGE_LANG_FRT . '.tpl', 2, ERROR_PAGE_FRT);
                        }
                        if (fwrite($handle, $tpl_content) === false) {
                            throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'pages' . DS . 'public' . DS . PAGE_LANG_FRT . '.tpl', 15, ERROR_PAGE_FRT);
                        }
                        if (fwrite($handle, $cache_comment) === false) {
                            throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'pages' . DS . 'public' . DS . PAGE_LANG_FRT . '.tpl', 15, ERROR_PAGE_FRT);
                        }
                        fclose($handle);
                    }
                }
            }
        }
    }
}
