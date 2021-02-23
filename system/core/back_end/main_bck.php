<?php
namespace back_end;

use libraries\fxr_lib as Fxr_lib;

if (!defined('FXR_INDEX')) {
    header('HTTP/1.1 403 Forbidden');
    exit('No direct script access allowed');
}
/**
 * Title: FXR Main Controller (Back-End)
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
    require DIR_BACK . DS . 'libraries' . DS . 'autoload_bck.php';
    
    /**
     * loads superglobals cache
     */
    if (defined('CACHE_SUPERGLOBALS_BCK') && CACHE_SUPERGLOBALS_BCK === 1) {
        if (defined('CHECK_FILE_EXISTS_BCK') && CHECK_FILE_EXISTS_BCK !== 0) {
            if (!is_file(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'settings' . DS . 'cache_superglobals_bck.php')) {
                exit('Unable ton find "superglobals.php" file');
            } else {
                include DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'settings' . DS . 'cache_superglobals_bck.php';
            }
        } else {
            require DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'settings' . DS . 'cache_superglobals_bck.php';
        }
    } else {
        $cache_superglobals = '';
    }
    
    /**
     * loads cache themes settings
     */
    if (defined('CHECK_FILE_EXISTS_BCK') && CHECK_FILE_EXISTS_BCK !== 0) {
        if (defined('CACHE_THEMES_BCK') && CACHE_THEMES_BCK !== 0) {
            if (!is_file(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'settings' . DS . 'cache_themes_bck.php')) {
                exit('Unable ton find "cache_themes_bck.php" file');
            } else {
                include DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'settings' . DS . 'cache_themes_bck.php';
            }
        }
    } else {
        require DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . CACHE . DS . 'settings' . DS . 'cache_themes_bck.php';
    }
    
    /**
     * sets and loads init actions
     */
    if (defined('CHECK_FILE_EXISTS_BCK') && CHECK_FILE_EXISTS_BCK !== 0) {
        if (is_file(DIR_INDEX_SYSTEM . DS . 'config' . DS . 'back_end' . DS . 'actions' . DS . 'config_init_bck.php')) {
            include DIR_INDEX_SYSTEM . DS . 'config' . DS . 'back_end' . DS . 'actions' . DS . 'config_init_bck.php';
        } else {
            exit('One or more configuration files are missing!');
        }
    } else {
        require DIR_INDEX_SYSTEM . DS . 'config' . DS . 'back_end' . DS . 'actions' . DS . 'config_init_bck.php';
    }
    foreach ($init_files as $init_file) {
        if (defined('CHECK_FILE_EXISTS_BCK') && CHECK_FILE_EXISTS_BCK !== 0) {
            if (is_file(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . 'actions' . DS . '_init' . DS . $init_file . '.php')) {
                include DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . 'actions' . DS . '_init' . DS . $init_file . '.php';
            } else {
                throw new Fxr_lib\Error(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . 'actions' . DS . '_init' . DS . $init_file . '.php', 2, ERROR_PAGE_BCK);
            }
        } else {
            require DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . 'actions' . DS . '_init' . DS . $init_file . '.php';
        }
    }
    
    ob_start();
    
    // sets template file 
    $page = new Fxr_lib\Template();
        
    $page->setTemplate();
    flush();
    
    // no need more 'echo', all content is flushed here!
    echo $page->loadTemplate();
    
    flush();
    while (@ob_end_flush());
     
/*
* catches any exceptions and loads 404 page
*/
}
catch (Fxr_lib\Error $e) {
    header('HTTP/1.1 404 Not Found');
    // if themes not defined, sets default values
    if (!defined('THEME_LANG_BCK') && !defined('THEME_FOLDER_BCK')) {
        define("THEME_LANG_BCK", DEFAULT_LANGUAGE_BCK);
        define("THEME_FOLDER_BCK", DEFAULT_THEME_FOLDER_BCK);
    }
    if (!defined('THEME_LANG_BCK') || !defined('THEME_FOLDER_BCK')) {
        exit('Unable to define themes!');
    }
    // if $_SESSION['lang_page'] not defined, sets default values
    if (!defined("PAGE_LANG_BCK")) {
        define("PAGE_LANG", DEFAULT_LANGUAGE_BCK);
    } else {
    	define("PAGE_LANG", PAGE_LANG_BCK);
    }
    // if ERROR_TPL not defined, sets default values
    if (!defined("ERROR_TPL")) {
        define("ERROR_TPL", ERROR_PAGE_BCK);
    }
    // loads exceptions file
    if (is_file(DIR_INDEX . DS . 'themes' . DS . 'back_end' . DS . PAGE_LANG . DS . 'exceptions.php')) {
        include DIR_INDEX . DS . 'themes' . DS . 'back_end' . DS . PAGE_LANG . DS . 'exceptions.php';
    } else {
        require DIR_INDEX . DS . 'themes' . DS . 'back_end' . DS . DEFAULT_LANGUAGE_BCK . DS . 'exceptions.php';
    }
    // loads 404 page
    if (is_file(DIR_INDEX . DS . 'themes' . DS . 'back_end' . DS . PAGE_LANG . DS . THEME_FOLDER_BCK . DS . 'errors' . DS . ERROR_TPL . '.php')) {
        include DIR_INDEX . DS . 'themes' . DS . 'back_end' . DS . PAGE_LANG . DS . THEME_FOLDER_BCK . DS . 'errors' . DS . ERROR_TPL . '.php';
    } else {
        require DIR_INDEX . DS . 'themes' . DS . 'back_end' . DS . '404.php';
    }
}
