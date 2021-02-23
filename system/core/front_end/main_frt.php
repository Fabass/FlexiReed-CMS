<?php
namespace front_end;

use libraries\fxr_lib as Fxr_lib;

if (!defined('FXR_INDEX')) {
    header('HTTP/1.1 403 Forbidden');
    exit('No direct script access allowed');
}
/**
 * Title: FXR Main Controller (Front-End)
 *
 * @author Fabien Assenarre
 * @link http://www.flexireed.org
 * @copyright Copyright &copy; 2020 Fabien Assenarre
 * @license http://opensource.org/licenses/MIT
 *
 */
 
header('Content-Type: text/html; charset=utf-8');
header("HTTP/1.1 200 OK");
 
/*
 * loads page
 */
try {
    // sets autoloader
    require DIR_FRONT . DS . 'libraries' . DS . 'autoload_frt.php';
    
    /**
     * loads superglobals cache
     */
    if (defined('CACHE_SUPERGLOBALS_FRT') && CACHE_SUPERGLOBALS_FRT === 1) {
        if (defined('CHECK_FILE_EXISTS_FRT') && CHECK_FILE_EXISTS_FRT !== 0) {
            if (!is_file(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'settings' . DS . 'cache_superglobals_frt.php')) {
                exit('Unable ton find "superglobals.php" file');
            } else {
                include DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'settings' . DS . 'cache_superglobals_frt.php';
            }
        } else {
            require DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'settings' . DS . 'cache_superglobals_frt.php';
        }
    } else {
        $cache_superglobals = '';
    }
    
    /**
     * loads cache themes settings
     */
    if (defined('CHECK_FILE_EXISTS_FRT') && CHECK_FILE_EXISTS_FRT !== 0) {
        if (defined('CACHE_THEMES_FRT') && CACHE_THEMES_FRT !== 0) {
            if (!is_file(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'settings' . DS . 'cache_themes_frt.php')) {
                exit('Unable ton find "cache_themes_frt.php" file');
            } else {
                include DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'settings' . DS . 'cache_themes_frt.php';
            }
        }
    } else {
        require DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . CACHE . DS . 'settings' . DS . 'cache_themes_frt.php';
    }
    
    /**
     * sets and loads init actions
     */
    if (defined('CHECK_FILE_EXISTS_FRT') && CHECK_FILE_EXISTS_FRT !== 0) {
        if (is_file(DIR_INDEX_SYSTEM . DS . 'config' . DS . 'front_end' . DS . 'actions' . DS . 'config_init_frt.php')) {
            include DIR_INDEX_SYSTEM . DS . 'config' . DS . 'front_end' . DS . 'actions' . DS . 'config_init_frt.php';
        } else {
            exit('One or more configuration files are missing!');
        }
    } else {
        require DIR_INDEX_SYSTEM . DS . 'config' . DS . 'front_end' . DS . 'actions' . DS . 'config_init_frt.php';
    }
    foreach ($init_files as $init_file) {
        if (defined('CHECK_FILE_EXISTS_FRT') && CHECK_FILE_EXISTS_FRT !== 0) {
            if (is_file(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . 'actions' . DS . '_init' . DS . $init_file . '.php')) {
                include DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . 'actions' . DS . '_init' . DS . $init_file . '.php';
            } else {
                throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . 'actions' . DS . '_init' . DS . $init_file . '.php', 2, ERROR_PAGE_FRT);
            }
        } else {
            require DIR_INDEX_SYSTEM . DS . 'core' . DS . 'front_end' . DS . 'actions' . DS . '_init' . DS . $init_file . '.php';
        }
    }
    
    // sets template file 
    $page = new Fxr_lib\Template();
        
    $page->setTemplate();
    
    // no need more 'echo', all content is flushed here!
    echo $page->loadTemplate();
    
/*
* catches any exceptions and loads 404 page
*/
}
catch (Fxr_lib\Error $e) {
    header('HTTP/1.1 404 Not Found');
    // if themes not defined, sets default values
    if (!defined('THEME_LANG_FRT') && !defined('THEME_FOLDER_FRT')) {
        define("THEME_LANG_FRT", DEFAULT_LANGUAGE_FRT);
        define("THEME_FOLDER_FRT", DEFAULT_THEME_FOLDER_FRT);
    }
    if (!defined('THEME_LANG_FRT') || !defined('THEME_FOLDER_FRT')) {
        exit('Unable to define themes!');
    }
    // if $_SESSION['lang_page'] not defined, sets default values
    if (!defined("PAGE_LANG_FRT")) {
        define("PAGE_LANG", DEFAULT_LANGUAGE_FRT);
    } else {
    	define("PAGE_LANG", PAGE_LANG_FRT);
    }
    // if ERROR_TPL not defined, sets default values
    if (!defined("ERROR_TPL")) {
        define("ERROR_TPL", ERROR_PAGE_FRT);
    }
    // loads exceptions file
    if (is_file(DIR_INDEX . DS . 'themes' . DS . 'front_end' . DS . PAGE_LANG . DS . 'exceptions.php')) {
        include DIR_INDEX . DS . 'themes' . DS . 'front_end' . DS . PAGE_LANG . DS . 'exceptions.php';
    } else {
        require DIR_INDEX . DS . 'themes' . DS . 'front_end' . DS . DEFAULT_LANGUAGE_FRT . DS . 'exceptions.php';
    }
    // loads 404 page
    if (is_file(DIR_INDEX . DS . 'themes' . DS . 'front_end' . DS . PAGE_LANG . DS . THEME_FOLDER_FRT . DS . 'errors' . DS . ERROR_TPL . '.php')) {
        include DIR_INDEX . DS . 'themes' . DS . 'front_end' . DS . PAGE_LANG . DS . THEME_FOLDER_FRT . DS . 'errors' . DS . ERROR_TPL . '.php';
    } else {
        require DIR_INDEX . DS . 'themes' . DS . 'front_end' . DS . '404.php';
    }
}
