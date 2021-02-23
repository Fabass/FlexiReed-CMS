<?php
namespace libraries\fxr_lib;

use libraries\fxr_lib as Fxr_lib;

if (!defined('FXR_INDEX')) {
    header('HTTP/1.1 403 Forbidden');
    exit('No direct script access allowed');
}
/**
 * Title: FXR Template Class (Front-End)
 *
 * @author Fabien Assenarre
 * @link http://www.flexireed.org
 * @copyright Copyright &copy; 2020 Fabien Assenarre
 * @license http://opensource.org/licenses/MIT
 *
 */

class Template extends Cache
{
    private $action;
    private $actions;  
    private $actions_no_view;  
    private $add_sub_tag_key;  
    private $add_sub_tag_name;  
    private $add_sub_tag_value;  
    private $add_sub_tags;  
    private $arr_add_sub_tag_value;  
    private $arr_sub_tags;  
    private $cache_active;  
    private $cache_comment;  
    private $cache_pages;  
    private $cache_tag_name_view;  
    private $cache_tags;  
    private $ch;  
    private $handle;  
    private $home_tpl;  
    private $i;  
    private $id;  
    private $key;  
    private $loop_nb;  
    private $merged_sub_tpl;
    private $mysql_timestamp;  
    private $name_action;  
    private $no_view_file;  
    private $no_view_files;  
    private $output_filter;  
    private $setting;  
    private $sql_sub_tag;  
    private $sql_sub_tags;  
    private $sub_tag_merged;  
    private $sub_tag_name;  
    private $sub_tag_name_sql;  
    private $sub_tag_value;  
    private $sub_tag_value_sql;  
    private static $sub_tags = array();
    private $sub_tags_merged;  
    private $sub_tags_values_merged;  
    private $sub_tpl_file;  
    private $sub_tpl_name_file;  
    private $tag_content;  
    private $tag_name;  
    private $tag_name_view;  
    private $tag_tpl;  
    private $tag_value;  
    private $tag_view;  
    private static $tags = array(); 
    private $tags_view;  
    private $tags_view_no_cache;  
    private $tpl_content;  
    private $tpl_name_file;  
    private $tpl_name_file_curl;  
    private $tpl_name_file_index;  
    private $view_file;  
    private $view_files;  
    
    /**
     * Sets Tags Values
     *
     * @access    private
     * @param    string $tag_name "tag name"
     * @param    string $tag_value "tag value"
     * @return    void
     */
    private static function _setTags($tag_name, $tag_value)
    {
        self::$tags['{' . $tag_name . '}'] = $tag_value;
    }
    
    /**
     * Sets Sub-Tags Values
     *
     * @access    private
     * @param    string $sub_tag_name "sub-tag name"
     * @param    string $sub_tag_value "sub-tag value"
     * @return    void
     */
    private static function _setSubTags($sub_tag_name, $sub_tag_value)
    {
        self::$sub_tags['{{' . $sub_tag_name . '}}'] = $sub_tag_value;
    }
    
    /**
     * Sets Template
     *
     * @access    public
     * @return    void
     */
    public function setTemplate()
    {
        
        /**
         * loads actions configuration file
         */
        if (defined('CHECK_FILE_EXISTS_FRT') && CHECK_FILE_EXISTS_FRT !== 0) {
            if (is_file(DIR_INDEX_SYSTEM . DS . 'config' . DS . 'front_end' . DS . 'actions' . DS . 'config_no_view_frt.php')) {
                include DIR_INDEX_SYSTEM . DS . 'config' . DS . 'front_end' . DS . 'actions' . DS . 'config_no_view_frt.php';
            } else {
                exit('One or more configuration files are missing!');
            }
        } else {
            include DIR_INDEX_SYSTEM . DS . 'config' . DS . 'front_end' . DS . 'actions' . DS . 'config_no_view_frt.php';
        }
        foreach ($no_view_files as $no_view_file => $id) {
            if ($id == '_all') {
                if (defined('CHECK_FILE_EXISTS_FRT') && CHECK_FILE_EXISTS_FRT !== 0) {
                    if (is_file(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . 'actions' . DS . 'no_view' . DS . '_all' . DS . $no_view_file . '.php')) {
                        include DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . 'actions' . DS . 'no_view' . DS . '_all' . DS . $no_view_file . '.php';
                    } else {
                        throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . 'actions' . DS . 'no_view' . DS . '_all' . DS . $no_view_file . '.php', 9, ERROR_PAGE_FRT);
                    }
                } else {
                    include DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . 'actions' . DS . 'no_view' . DS . '_all' . DS . $no_view_file . '.php';
                }
            }
        }
        if (!defined('GET_PAGE_ID_FRT') || GET_PAGE_ID_FRT === '') {
            foreach ($no_view_files as $no_view_file => $id) {
                if ($id == '_home') {
                    if (defined('CHECK_FILE_EXISTS_FRT') && CHECK_FILE_EXISTS_FRT !== 0) {
                        if (is_file(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . 'actions' . DS . 'no_view' . DS . '_home' . DS . $no_view_file . '.php')) {
                            include DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . 'actions' . DS . 'no_view' . DS . '_home' . DS . $no_view_file . '.php';
                        } else {
                            throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . 'actions' . DS . 'no_view' . DS . '_home' . DS . $no_view_file . '.php', 9, ERROR_PAGE_FRT);
                        }
                    } else {
                        include DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . 'actions' . DS . 'no_view' . DS . '_home' . DS . $no_view_file . '.php';
                    }
                }
            }
        } else {
            foreach ($no_view_files as $no_view_file => $id) {
                if ($id == GET_PAGE_ID_FRT) {
                    if (defined('CHECK_FILE_EXISTS_FRT') && CHECK_FILE_EXISTS_FRT !== 0) {
                        if (is_file(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . 'actions' . DS . 'no_view' . DS . GET_PAGE_ID_FRT . DS . $no_view_file . '.php')) {
                            include DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . 'actions' . DS . 'no_view' . DS . GET_PAGE_ID_FRT . DS . $no_view_file . '.php';
                        } else {
                            throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . 'actions' . DS . 'no_view' . DS . GET_PAGE_ID_FRT . DS . $no_view_file . '.php', 9, ERROR_PAGE_FRT);
                        }
                    } else {
                        include DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . 'actions' . DS . 'no_view' . DS . GET_PAGE_ID_FRT . DS . $no_view_file . '.php';
                    }
                }
            }
        }
        
        /**
         * loads no view actions
         */
        if (isset($actions_no_view)) {
            foreach ($actions_no_view as $name_action => $action) {
                call_user_func($action);
            }
        }
        $actions = null;
        
        /**
         * defines path to cached page
         */
        if (defined('CACHE_PAGES_FRT') && CACHE_PAGES_FRT === 1) {
            
            if (defined("GET_PAGE_ID_FRT") && GET_PAGE_ID_FRT !== '') {
                if (defined("AUTH_ACCESS_FRT")) {
                    if (is_file(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'pages' . DS . 'restricted' . DS . AUTH_ACCESS_FRT . DS . GET_PAGE_ID_FRT . '.tpl')) {
                        define("CACHE_PAGE_FILE", DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'pages' . DS . 'restricted' . DS . AUTH_ACCESS_FRT . DS . GET_PAGE_ID_FRT . '.tpl');
                    }
                } else {
                    if (is_file(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'pages' . DS . 'public' . DS . GET_PAGE_ID_FRT . '.tpl')) {
                        define("CACHE_PAGE_FILE", DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'pages' . DS . 'public' . DS . GET_PAGE_ID_FRT . '.tpl');
                    }
                }
            } else {
                if (defined("AUTH_ACCESS_FRT")) {
                    if (is_file(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'pages' . DS . 'restricted' . DS . AUTH_ACCESS_FRT . DS . PAGE_LANG_FRT . '.tpl')) {
                        define("CACHE_PAGE_FILE", DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'pages' . DS . 'restricted' . DS . AUTH_ACCESS_FRT . DS . PAGE_LANG_FRT . '.tpl');
                    }
                } else {
                    if (is_file(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'pages' . DS . 'public' . DS . PAGE_LANG_FRT . '.tpl')) {
                        define("CACHE_PAGE_FILE", DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'pages' . DS . 'public' . DS . PAGE_LANG_FRT . '.tpl');
                    }
                }
            }
        }
        
        if (!defined("CACHE_PAGE_FILE")) {
            /**
             * loads actions configuration file
             */
            if (defined('CHECK_FILE_EXISTS_FRT') && CHECK_FILE_EXISTS_FRT !== 0) {
                if (is_file(DIR_INDEX_SYSTEM . DS . 'config' . DS . 'front_end' . DS . 'actions' . DS . 'config_view_frt.php')) {
                    include DIR_INDEX_SYSTEM . DS . 'config' . DS . 'front_end' . DS . 'actions' . DS . 'config_view_frt.php';
                } else {
                    exit('One or more configuration files are missing!');
                }
            } else {
                include DIR_INDEX_SYSTEM . DS . 'config' . DS . 'front_end' . DS . 'actions' . DS . 'config_view_frt.php';
            }
            foreach ($view_files as $view_file => $id) {
                if ($id == '_all') {
                    if (defined('CHECK_FILE_EXISTS_FRT') && CHECK_FILE_EXISTS_FRT !== 0) {
                        if (is_file(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . 'actions' . DS . 'view' . DS . '_all' . DS . $view_file . '.php')) {
                            include DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . 'actions' . DS . 'view' . DS . '_all' . DS . $view_file . '.php';
                        } else {
                            throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . 'actions' . DS . 'view' . DS . '_all' . DS . $view_file . '.php', 10, ERROR_PAGE_FRT);
                        }
                    } else {
                        include DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . 'actions' . DS . 'view' . DS . '_all' . DS . $view_file . '.php';
                    }
                }
                if ($id == '_all_id') {
                    if (defined('CHECK_FILE_EXISTS_FRT') && CHECK_FILE_EXISTS_FRT !== 0) {
                        if (is_file(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . 'actions' . DS . 'view' . DS . '_all_id' . DS . $view_file . '.php')) {
                            include DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . 'actions' . DS . 'view' . DS . '_all_id' . DS . $view_file . '.php';
                        } else {
                            throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . 'actions' . DS . 'view' . DS . '_all_id' . DS . $view_file . '.php', 10, ERROR_PAGE_FRT);
                        }
                    } else {
                        include DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . 'actions' . DS . 'view' . DS . '_all_id' . DS . $view_file . '.php';
                    }
                }
            }
            if (!defined('GET_PAGE_ID_FRT') || GET_PAGE_ID_FRT === '') {
                foreach ($view_files as $view_file => $id) {
                    if ($id == '_home') {
                        if (defined('CHECK_FILE_EXISTS_FRT') && CHECK_FILE_EXISTS_FRT !== 0) {
                            if (is_file(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . 'actions' . DS . 'view' . DS . '_home' . DS . $view_file . '.php')) {
                                include DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . 'actions' . DS . 'view' . DS . '_home' . DS . $view_file . '.php';
                            } else {
                                throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . 'actions' . DS . 'view' . DS . '_home' . DS . $view_file . '.php', 10, ERROR_PAGE_FRT);
                            }
                        } else {
                            include DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . 'actions' . DS . 'view' . DS . '_home' . DS . $view_file . '.php';
                        }
                    }
                }
            } else {
                foreach ($view_files as $view_file => $id) {
                    if ($id == GET_PAGE_ID_FRT) {
                        if (defined('CHECK_FILE_EXISTS_FRT') && CHECK_FILE_EXISTS_FRT !== 0) {
                            if (is_file(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . 'actions' . DS . 'view' . DS . GET_PAGE_ID_FRT . DS . $view_file . '.php')) {
                                include DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . 'actions' . DS . 'view' . DS . GET_PAGE_ID_FRT . DS . $view_file . '.php';
                            } else {
                                throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . 'actions' . DS . 'view' . DS . GET_PAGE_ID_FRT . DS . $view_file . '.php', 10, ERROR_PAGE_FRT);
                            }
                        } else {
                            include DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . 'actions' . DS . 'view' . DS . GET_PAGE_ID_FRT . DS . $view_file . '.php';
                        }
                    }
                }
            }
            
            if (defined("CACHE_TAGS_FRT") && CACHE_TAGS_FRT == 1) {
                foreach ($tags_view as $tag_name_view => $tag_view) {
                    if (defined("GET_PAGE_ID_FRT") && GET_PAGE_ID_FRT !== '') {
                        if (defined("AUTH_ACCESS_FRT")) {
                            if (is_file(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'tags' . DS . 'restricted' . DS . AUTH_ACCESS_FRT . DS . $tag_name_view . DS . $tag_name_view . '_' . GET_PAGE_ID_FRT . '.tpl')) {
                                $tag_view = file_get_contents(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'tags' . DS . 'restricted' . DS . AUTH_ACCESS_FRT . DS . $tag_name_view . DS . $tag_name_view . '_' . GET_PAGE_ID_FRT . '.tpl');
                                Template::_setTags($tag_name_view, $tag_view);
                            } else {
                                Template::_setTags($tag_name_view, call_user_func($tag_view));
                            }
                        } else {
                            if (is_file(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'tags' . DS . 'public' . DS . $tag_name_view . DS . $tag_name_view . '_' . GET_PAGE_ID_FRT . '.tpl')) {
                                $tag_view = file_get_contents(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'tags' . DS . 'public' . DS . $tag_name_view . DS . $tag_name_view . '_' . GET_PAGE_ID_FRT . '.tpl');
                                Template::_setTags($tag_name_view, $tag_view);
                            } else {
                                Template::_setTags($tag_name_view, call_user_func($tag_view));
                            }
                        }
                    } else {
                        if (defined("AUTH_ACCESS_FRT")) {
                            if (is_file(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'tags' . DS . 'restricted' . DS . AUTH_ACCESS_FRT . DS . $tag_name_view . DS . $tag_name_view . '_' . PAGE_LANG_FRT . '.tpl')) {
                                $tag_view = file_get_contents(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'tags' . DS . 'restricted' . DS . AUTH_ACCESS_FRT . DS . $tag_name_view . DS . $tag_name_view . '_' . PAGE_LANG_FRT . '.tpl');
                                Template::_setTags($tag_name_view, $tag_view);
                            } else {
                                Template::_setTags($tag_name_view, call_user_func($tag_view));
                            }
                        } else {
                            if (is_file(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'tags' . DS . 'public' . DS . $tag_name_view . DS . $tag_name_view . '_' . PAGE_LANG_FRT . '.tpl')) {
                                $tag_view = file_get_contents(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'outputs' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . 'tags' . DS . 'public' . DS . $tag_name_view . DS . $tag_name_view . '_' . PAGE_LANG_FRT . '.tpl');
                                Template::_setTags($tag_name_view, $tag_view);
                            } else {
                                Template::_setTags($tag_name_view, call_user_func($tag_view));
                            }
                        }
                    }
                }
            } else {
                foreach ($tags_view as $tag_name_view => $tag_view) {
                    Template::_setTags($tag_name_view, call_user_func($tag_view));
                }
            }
        }
        $tags_view          = null;
        $tags_view_no_cache = null;
    }
    
    /**
     * Loads Template
     *
     * @access    public
     * @return    string $tpl_content "template content"
     */
    public function loadTemplate()
    {
        
        /**
         * defines path to cached page
         */
        if (defined('CACHE_PAGES_FRT') && CACHE_PAGES_FRT === 1) {
            $tpl_name_file_index = '';
            /**
             * defines path to non-cached page
             */
            if (!defined('CACHE_PAGE_FILE')) {
                // restricted access
                if (defined("AUTH_ACCESS_FRT")) {
                    $tpl_name_file_index = DIR_INDEX . DS . 'themes' . DS . 'front_end' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . HTML . DS . 'restricted' . DS . AUTH_ACCESS_FRT . DS . 'tpl' . DS . TPL_AUTH_FRT . '.tpl';
                // public access
                } else {
                    $tpl_name_file_index = DIR_INDEX . DS . 'themes' . DS . 'front_end' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . HTML . DS . 'public' . DS . 'tpl' . DS . TPL_FRT . '.tpl';
                }
                
                if (!is_file($tpl_name_file_index)) {
                    $_SESSION['page_lang'] = '';
                    throw new Fxr_lib\Error($tpl_name_file_index, 11, ERROR_PAGE_FRT);
                }
                
                // sets template content
                $tpl_content = file_get_contents($tpl_name_file_index);
                foreach (self::$tags as $tag_name => $tag_value) {
                    $tpl_content = str_replace($tag_name, $tag_value, $tpl_content);
                }
                self::$tags          = null;
                $tpl_name_file_index = null;
                
                /**
                 * activates gzip output buffering
                 */
                if (defined('GZIP_ACTIVATE_FRT') && GZIP_ACTIVATE_FRT !== 0) {
                    if (!ob_start("ob_gzhandler")) {
                        ob_start("ob_gzhandler");
                    }
                }
                
                if (defined('UPDATE_CACHE_PAGE_OUTPUTS_FRT') && UPDATE_CACHE_PAGE_OUTPUTS_FRT === 1) {
                    Fxr_lib\Cache::updateCachePagesOutputs($tpl_content);
                }
                return $tpl_content;
            } else {
                return file_get_contents(CACHE_PAGE_FILE);
            }
            /**
             * defines path to non-cached page
             */
        } else {
            /**
             * CHECK_FILE_EXISTS_FRT activated
             */
            if (defined('CHECK_FILE_EXISTS_FRT') && CHECK_FILE_EXISTS_FRT !== 0) {
                // restricted access
                if (defined("AUTH_ACCESS_FRT")) {
                    if (defined("TPL_AUTH_FRT")) {
                        $tpl_name_file_index = DIR_INDEX . DS . 'themes' . DS . 'front_end' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . HTML . DS . 'restricted' . DS . AUTH_ACCESS_FRT . DS . 'tpl' . DS . TPL_AUTH_FRT . '.tpl';
                        $tpl_name_file_curl  = DIR_INDEX_CURL . DS . 'themes' . DS . 'front_end' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . HTML . DS . 'restricted' . DS . AUTH_ACCESS_FRT . DS . 'tpl' . DS . TPL_AUTH_FRT . '.tpl';
                    } else {
                        throw new Fxr_lib\Error('TPL_AUTH_FRT', 11, ERROR_PAGE_FRT);
                    }
                // public access
                } else {
                    if (defined("TPL_FRT")) {
                        $tpl_name_file_index = DIR_INDEX . DS . 'themes' . DS . 'front_end' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . HTML . DS . 'public' . DS . 'tpl' . DS . TPL_FRT . '.tpl';
                        $tpl_name_file_curl  = DIR_INDEX_CURL . DS . 'themes' . DS . 'front_end' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . HTML . DS . 'public' . DS . 'tpl' . DS . TPL_FRT . '.tpl';
                    } else {
                        throw new Fxr_lib\Error('TPL_FRT', 11, ERROR_PAGE_FRT);
                    }
                }
                if (!is_file($tpl_name_file_index)) {
                    $_SESSION['page_lang'] = '';
                    throw new Fxr_lib\Error($tpl_name_file_index, 11, ERROR_PAGE_FRT);
                }
                
                # CURL default activation
                if (defined('CURL_ACTIVATE_FRT') && CURL_ACTIVATE_FRT !== 0) {
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $tpl_name_file_curl);
                    curl_setopt($ch, CURLOPT_HEADER, false);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 1);
                    $tpl_content = curl_exec($ch);
                    curl_close($ch);
                # file_get_contents alternative
                } else {
                    $tpl_content = file_get_contents($tpl_name_file_index);
                }
                
                // loads tags
                foreach (self::$tags as $tag_name => $tag_value) {
                    $tpl_content = str_replace($tag_name, $tag_value, $tpl_content);
                }
                self::$tags    = null;
                $tpl_name_file = null;
                
                /**
                 * activates gzip output buffering
                 */
                if (defined('GZIP_ACTIVATE_FRT') && GZIP_ACTIVATE_FRT !== 0) {
                    if (!ob_start("ob_gzhandler")) {
                        ob_start("ob_gzhandler");
                    }
                }
                
                if (defined('UPDATE_CACHE_PAGE_OUTPUTS_FRT') && UPDATE_CACHE_PAGE_OUTPUTS_FRT === 1) {
                    Fxr_lib\Cache::updateCachePagesOutputs($tpl_content);
                }
                
                return $tpl_content;
                
            /**
             * CHECK_FILE_EXISTS_FRT not activated
             */
            } else {
                // restricted access
                if (defined("AUTH_ACCESS_FRT")) {
                    $tpl_name_file_index = DIR_INDEX . DS . 'themes' . DS . 'front_end' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . HTML . DS . 'restricted' . DS . AUTH_ACCESS_FRT . DS . 'tpl' . DS . TPL_AUTH_FRT . '.tpl';
                    $tpl_name_file_curl  = DIR_INDEX_CURL . DS . 'themes' . DS . 'front_end' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . HTML . DS . 'restricted' . DS . AUTH_ACCESS_FRT . DS . 'tpl' . DS . TPL_AUTH_FRT . '.tpl';
                // public access
                } else {
                    $tpl_name_file_index = DIR_INDEX . DS . 'themes' . DS . 'front_end' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . HTML . DS . 'public' . DS . 'tpl' . DS . TPL_FRT . '.tpl';
                    $tpl_name_file_curl  = DIR_INDEX_CURL . DS . 'themes' . DS . 'front_end' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . HTML . DS . 'public' . DS . 'tpl' . DS . TPL_FRT . '.tpl';
                }
                
                # CURL default activation
                if (defined('CURL_ACTIVATE_FRT') && CURL_ACTIVATE_FRT !== 0) {
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $tpl_name_file_curl);
                    curl_setopt($ch, CURLOPT_HEADER, false);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 1);
                    $tpl_content = curl_exec($ch);
                    curl_close($ch);
                # file_get_contents alternative
                } else {
                    $tpl_content = file_get_contents($tpl_name_file_index);
                }
                
                // loads tags
                foreach (self::$tags as $tag_name => $tag_value) {
                    $tpl_content = str_replace($tag_name, $tag_value, $tpl_content);
                }
                self::$tags    = null;
                $tpl_name_file = null;
                
                if (defined('UPDATE_CACHE_PAGE_OUTPUTS_FRT') && UPDATE_CACHE_PAGE_OUTPUTS_FRT === 1) {
                    Fxr_lib\Cache::updateCachePagesOutputs($tpl_content);
                }
                
                /**
                 * activates gzip output buffering
                 */
                if (defined('GZIP_ACTIVATE_FRT') && GZIP_ACTIVATE_FRT !== 0) {
                    if (!ob_start("ob_gzhandler")) {
                        ob_start("ob_gzhandler");
                    }
                }
                return $tpl_content;
            }
        }
    }
    
    /**
     * Sets Sub-Templates
     *
     * @access    private
     * @param     int $loop_nb "number of loops"
     * @param     string $sql_sub_tags "SQL sub-tags"
     * @param     string $add_sub_tags "additional sub-tags"
     * @return    string $sub_tags_merged "sub-tags merged"
     */
    private static function _setSubTemplates($loop_nb = '', $sql_sub_tags = '', $add_sub_tags = '')
    {
        if (!empty($sql_sub_tags)) {
            // SQL tags +,  add tags +
            if (!empty($add_sub_tags)) {
                $i = -1;
                foreach ($sql_sub_tags as $sql_sub_tag) {
                    $i++;
                    foreach ($sql_sub_tag as $sub_tag_name_sql => $sub_tag_value_sql) {
                        $sub_tags_values_merged[$sub_tag_name_sql] = $sub_tag_value_sql;
                    }
                    foreach ($add_sub_tags as $add_sub_tag_name => $add_sub_tag_value) {
                        if (is_array($add_sub_tag_value)) {
                            foreach ($add_sub_tag_value as $add_sub_tag_key => $arr_add_sub_tag_value) {
                                if ($i === $add_sub_tag_key) {
                                    $sub_tags_values_merged[$add_sub_tag_name] = $arr_add_sub_tag_value;
                                }
                            }
                        } else {
                            $sub_tags_values_merged[$add_sub_tag_name] = $add_sub_tag_value;
                        }
                    }
                    $sub_tags_merged[] = $sub_tags_values_merged;
                }
            // SQL tags +,  add tags -
            } else {
                foreach ($sql_sub_tags as $sql_sub_tag) {
                    foreach ($sql_sub_tag as $sub_tag_name_sql => $sub_tag_value_sql) {
                        $sub_tags_values_merged[$sub_tag_name_sql] = $sub_tag_value_sql;
                    }
                    $sub_tags_merged[] = $sub_tags_values_merged;
                }
            }
        } else {
            // SQL tags -,  add tags +
            if (!empty($add_sub_tags)) {
                for ($i = 0; $i < $loop_nb; $i++) {
                    foreach ($add_sub_tags as $add_sub_tag_name => $add_sub_tag_value) {
                        if (is_array($add_sub_tag_value)) {
                            foreach ($add_sub_tag_value as $add_sub_tag_key => $arr_add_sub_tag_value) {
                                if ($i === $add_sub_tag_key) {
                                    $sub_tags_values_merged[$add_sub_tag_name] = $arr_add_sub_tag_value;
                                }
                            }
                        } else {
                            $sub_tags_values_merged[$add_sub_tag_name] = $add_sub_tag_value;
                        }
                    }
                    $sub_tags_merged[] = $sub_tags_values_merged;
                }
            // SQL tags -,  add tags -
            } else {
                $sub_tags_merged = '';
            }
        }
        $sql_sub_tags = null;
        $add_sub_tags = null;
        return $sub_tags_merged;
    }
    
    /**
     * Loads Sub-Templates
     *
     * @access    public
     * @param     string $sub_tpl_name_file "sub-template file name"
     * @param     string $loop_nb "number of loops"
     * @param     string $sql_sub_tags "SQL sub-tags"
     * @param     string $add_sub_tags "additional sub-tags"
     * @param     int $output_filter "output filter"
     * @return    string $merged_sub_tpl "sub-templates merged"
     */
    public static function loadSubTemplates($sub_tpl_name_file, $loop_nb = '', $sql_sub_tags = '', $add_sub_tags = '', $output_filter = 1)
    {
        /**
         * loads merged sub-tags
         */
        $sub_tags_merged = self::_setSubTemplates($loop_nb, $sql_sub_tags, $add_sub_tags);
        $merged_sub_tpl  = '';
        if (isset($sub_tags_merged) && $sub_tags_merged !== '') {
            /**
             * sets sub-tags
             */
            foreach ($sub_tags_merged as $sub_tag_merged) {
                foreach ($sub_tag_merged as $sub_tag_name => $sub_tag_value) {
                    if ($output_filter === '' || $output_filter === 1) {
                        Template::_setSubTags($sub_tag_name, $sub_tag_value);
                    } elseif ($output_filter === 2) {
                        Template::_setSubTags($sub_tag_name, htmlentities($sub_tag_value, ENT_QUOTES));
                    } elseif ($output_filter === 3) {
                        Template::_setSubTags($sub_tag_name, html_entity_decode($sub_tag_value));
                    } else {
                        Template::_setSubTags($sub_tag_name, htmlentities($sub_tag_value, ENT_QUOTES));
                    }
                }
                $arr_sub_tags[] = self::$sub_tags;
            }
            self::$sub_tags  = null;
            $sub_tags_merged = null;
            /**
             * replaces sub-tags with contents
             */
            foreach ($arr_sub_tags as $sub_tags) {
                /**
                 * CHECK_FILE_EXISTS_FRT activated
                 */
                if (defined('CHECK_FILE_EXISTS_FRT') && CHECK_FILE_EXISTS_FRT !== 0) {
                    // restricted access
                    if (defined("AUTH_ACCESS_FRT")) {
                        if (is_file(DIR_INDEX . DS . 'themes' . DS . 'front_end' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . HTML . DS . 'restricted' . DS . AUTH_ACCESS_FRT . DS . 'sub_tpl' . DS . $sub_tpl_name_file . '.tpl')) {
                            $sub_tpl_file = file_get_contents(DIR_INDEX . DS . 'themes' . DS . 'front_end' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . HTML . DS . 'restricted' . DS . AUTH_ACCESS_FRT . DS . 'sub_tpl' . DS . $sub_tpl_name_file . '.tpl');
                        } else {
                            throw new Fxr_lib\Error($sub_tpl_name_file, 12, ERROR_PAGE_FRT);
                        }
                    // public access
                    } else {
                        if (is_file(DIR_INDEX . DS . 'themes' . DS . 'front_end' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . HTML . DS . 'public' . DS . 'sub_tpl' . DS . $sub_tpl_name_file . '.tpl')) {
                            # CURL default activation
                            if (defined('CURL_ACTIVATE_FRT') && CURL_ACTIVATE_FRT !== 0) {
                                $ch                 = curl_init();
                                $tpl_name_file_curl = DIR_INDEX_CURL . DS . 'themes' . DS . 'front_end' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . HTML . DS . 'public' . DS . 'sub_tpl' . DS . $sub_tpl_name_file . '.tpl';
                                curl_setopt($ch, CURLOPT_URL, $tpl_name_file_curl);
                                curl_setopt($ch, CURLOPT_HEADER, false);
                                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 1);
                                $sub_tpl_file = curl_exec($ch);
                                curl_close($ch);
                            # file_get_contents alternative
                            } else {
                                $sub_tpl_file = file_get_contents(DIR_INDEX . DS . 'themes' . DS . 'front_end' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . HTML . DS . 'public' . DS . 'sub_tpl' . DS . $sub_tpl_name_file . '.tpl');
                            }  
                        } else {
                            throw new Fxr_lib\Error($sub_tpl_name_file, 12, ERROR_PAGE_FRT);
                        }
                    }
                /**
                 * CHECK_FILE_EXISTS_FRT not activated
                 */
                } else {
                    // restricted access
                    if (defined("AUTH_ACCESS_FRT")) {
                        $sub_tpl_file = file_get_contents(DIR_INDEX . DS . 'themes' . DS . 'front_end' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . HTML . DS . 'restricted' . DS . AUTH_ACCESS_FRT . DS . 'sub_tpl' . DS . $sub_tpl_name_file . '.tpl');
                    // public access
                    } else {
                        $sub_tpl_file = file_get_contents(DIR_INDEX . DS . 'themes' . DS . 'front_end' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . HTML . DS . 'public' . DS . 'sub_tpl' . DS . $sub_tpl_name_file . '.tpl');
                    }
                }
                // loads sub-tags
                foreach ($sub_tags as $sub_tag_name => $sub_tag_value) {
                    $sub_tpl_file = str_replace($sub_tag_name, $sub_tag_value, $sub_tpl_file);
                }
                $merged_sub_tpl .= $sub_tpl_file;
            }
            $arr_sub_tags = null;
            $sub_tags     = null;
            $sub_tpl_file = null;
        /**
          * in case of empty merged sub-tags
          */
        } else {
            for ($i = 0; $i < $loop_nb; $i++) {
                if (defined('CHECK_FILE_EXISTS_FRT') && CHECK_FILE_EXISTS_FRT !== 0) {
                    // restricted access
                    if (defined("AUTH_ACCESS_FRT")) {
                        if (is_file(DIR_INDEX . DS . 'themes' . DS . 'front_end' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . HTML . DS . 'restricted' . DS . AUTH_ACCESS_FRT . DS . 'sub_tpl' . DS . $sub_tpl_name_file . '.tpl')) {
                            $sub_tpl_file = file_get_contents(DIR_INDEX . DS . 'themes' . DS . 'front_end' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . HTML . DS . 'restricted' . DS . AUTH_ACCESS_FRT . DS . 'sub_tpl' . DS . $sub_tpl_name_file . '.tpl');
                        } else {
                            throw new Fxr_lib\Error($sub_tpl_name_file, 12, ERROR_PAGE_FRT);
                        }
                    // public access
                    } else {
                        if (is_file(DIR_INDEX . DS . 'themes' . DS . 'front_end' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . HTML . DS . 'public' . DS . 'sub_tpl' . DS . $sub_tpl_name_file . '.tpl')) {
                            $sub_tpl_file = file_get_contents(DIR_INDEX . DS . 'themes' . DS . 'front_end' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . HTML . DS . 'public' . DS . 'sub_tpl' . DS . $sub_tpl_name_file . '.tpl');
                        } else {
                            throw new Fxr_lib\Error($sub_tpl_name_file, 12, ERROR_PAGE_FRT);
                        }
                    }
                } else {
                    // restricted access
                    if (defined("AUTH_ACCESS_FRT")) {
                        $sub_tpl_file = file_get_contents(DIR_INDEX . DS . 'themes' . DS . 'front_end' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . HTML . DS . 'restricted' . DS . AUTH_ACCESS_FRT . DS . 'sub_tpl' . DS . $sub_tpl_name_file . '.tpl');
                    // public access
                    } else {
                        $sub_tpl_file = file_get_contents(DIR_INDEX . DS . 'themes' . DS . 'front_end' . DS . THEME_LANG_FRT . DS . THEME_FOLDER_FRT . DS . HTML . DS . 'public' . DS . 'sub_tpl' . DS . $sub_tpl_name_file . '.tpl');
                    }
                }
                $merged_sub_tpl .= $sub_tpl_file;
            }
        }
        $sub_tpl_file = null;
        return $merged_sub_tpl;
    }
}
