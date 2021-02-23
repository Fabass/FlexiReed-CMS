<?php
namespace actions;

use libraries\fxr_lib as Fxr_lib;

if (!defined('FXR_INDEX')) {
    header('HTTP/1.1 403 Forbidden');
    exit('No direct script access allowed');
}
/**
 * Title: FXR Superglobals Controller (Front-End)
 *
 * @author Fabien Assenarre
 * @link http://www.flexireed.org
 * @copyright Copyright &copy; 2020 Fabien Assenarre
 * @license http://opensource.org/licenses/MIT
 *
 */

// starts session if not exists
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/**
 * sets language before loading other superglobals control
 * (enables to load i18n customized error messages)
 */
//======================================================================
// GET PAGE_LANG_FRT
//======================================================================
if (isset($_GET['page_lang']) && Fxr_lib\Input::getUntaintedInput($_GET['page_lang'], 'regex', '/^[a-z]{2}[-]{1}[a-zA-Z]{2}+$/', '', '', '', $code_exception = 8, $page_exception = ERROR_PAGE_FRT, '', $cache_input = 1)) {
    if ($cache_input === 1 && !empty($cache_superglobals)) {
        foreach ($cache_superglobals as $input => $array_cache_values) {
            if ($input === 'page_lang_frt') {
                foreach ($array_cache_values as $cache_value) {
                    if ($_GET['page_lang'] === $cache_value) {
                        define("GET_PAGE_LANG_FRT", strtolower($_GET['page_lang']));
                        define("PAGE_LANG_FRT", GET_PAGE_LANG_FRT);
                    }
                }
            }
        }
        if (!defined("GET_PAGE_LANG_FRT")) {
            throw new Fxr_lib\Error($_GET['page_lang'], 3, ERROR_PAGE_FRT);
        }
    } else {
        if (!defined('GET_PAGE_LANG_FRT')) {

            if (Fxr_lib\Input::getUntaintedInput($_GET['page_lang'], 'none', '', '' . DB_PREFIX . 'settings_frt', 'setting_abbr_lang_frt', array(
                ':setting_abbr_lang_frt' => array(
                    $_GET['page_lang'] => 's'
                )
            ), $code_exception = 7, $page_exception = ERROR_PAGE_FRT, '', $cache_input = 0)) {
                define("GET_PAGE_LANG_FRT", strtolower($_GET['page_lang']));
                define("PAGE_LANG_FRT", GET_PAGE_LANG_FRT);
            }
        }
    }
} else {
    if (isset($_GET['page_lang']) && empty($_GET['page_lang'])) {
        define("GET_PAGE_LANG_FRT", '');
    }
    define("PAGE_LANG_FRT", DEFAULT_LANGUAGE_FRT);
}

//======================================================================
// GET PAGE_ID_FRT
//======================================================================
if (isset($_GET['page_id']) && Fxr_lib\Input::getUntaintedInput($_GET['page_id'], 'digit', '', '', '', '', $code_exception = 8, $page_exception = ERROR_PAGE_FRT, '', $cache_input = 1)) {
    if ($cache_input === 1 && !empty($cache_superglobals)) {
        foreach ($cache_superglobals as $input => $array_cache_values) {
            if ($input === 'page_id_frt') {
                foreach ($array_cache_values as $cache_value) {
                    if ($_GET['page_id'] === $cache_value) {
                        define("GET_PAGE_ID_FRT", $_GET['page_id']);
                    }
                }
            }
        }
        if (!defined("GET_PAGE_ID_FRT")) {
            throw new Fxr_lib\Error($_GET['page_id'], 3, ERROR_PAGE_FRT);
        }
    } else {
        if (!defined('GET_PAGE_ID_FRT')) {
            if (Fxr_lib\Input::getUntaintedInput($_GET['page_id'], 'none', '', '' . DB_PREFIX . 'pages_frt', 'page_id_frt', array(
                ':page_id_frt' => array(
                    $_GET['page_id'] => 'i'
                )
            ), $code_exception = 7, $page_exception = ERROR_PAGE_FRT, '', '')) {
                define("GET_PAGE_ID_FRT", $_GET['page_id']);
            }
        }
    }
} else {
    if (isset($_GET['page_id']) && empty($_GET['page_id'])) {
        define("GET_PAGE_ID_FRT", '');
    }
}

/**
 * add additional superglobal var here
 */  

$cache_superglobals = '';

/**
 * Update cache superglobals settings
 */
if (defined("UPDATE_CACHE_SUPERGLOBALS_SETTINGS_FRT") && UPDATE_CACHE_SUPERGLOBALS_SETTINGS_FRT == 1) {
    Fxr_lib\Cache::updateCacheSuperglobalsSettings();
}
