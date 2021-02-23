<?php
namespace actions;

use libraries\fxr_lib as Fxr_lib;

if (!defined('FXR_INDEX')) {
    header('HTTP/1.1 403 Forbidden');
    exit('No direct script access allowed');
}
/**
 * Title: FXR Superglobals Controller (Back-End)
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
// GET PAGE_LANG_BCK
//======================================================================
if (isset($_GET['page_lang']) && Fxr_lib\Input::getUntaintedInput($_GET['page_lang'], 'regex', '/^[a-z]{2}[-]{1}[a-zA-Z]{2}+$/', '', '', '', $code_exception = 8, $page_exception = ERROR_PAGE_BCK, '', $cache_input = 1)) {
    if ($cache_input === 1 && !empty($cache_superglobals)) {
        foreach ($cache_superglobals as $input => $array_cache_values) {
            if ($input === 'page_lang_bck') {
                foreach ($array_cache_values as $cache_value) {
                    if ($_GET['page_lang'] === $cache_value) {
                        define("GET_PAGE_LANG_BCK", strtolower($_GET['page_lang']));
                        define("PAGE_LANG_BCK", GET_PAGE_LANG_BCK);
                    }
                }
            }
        }
        if (!defined("GET_PAGE_LANG_BCK")) {
            throw new Fxr_lib\Error($_GET['page_lang'], 3, ERROR_PAGE_BCK);
        }
    } else {
        if (!defined('GET_PAGE_LANG_BCK')) {
            if (Fxr_lib\Input::getUntaintedInput($_GET['page_lang'], 'none', '', '' . DB_PREFIX . 'settings_bck', 'setting_abbr_lang_bck', array(
                ':setting_abbr_lang_bck' => array(
                    $_GET['page_lang'] => 's'
                )
            ), $code_exception = 7, $page_exception = ERROR_PAGE_BCK, '', $cache_input = 0)) {
                define("GET_PAGE_LANG_BCK", strtolower($_GET['page_lang']));
                define("PAGE_LANG_BCK", GET_PAGE_LANG_BCK);
            }
        }
    }
} else {
    if (isset($_GET['page_lang']) && $_GET['page_lang'] === '') {
        define("GET_PAGE_LANG_BCK", '');
    }
    define("PAGE_LANG_BCK", DEFAULT_LANGUAGE_BCK);
}


//======================================================================
// GET PAGE_ID_BCK
//======================================================================
if (isset($_GET['page_id']) && Fxr_lib\Input::getUntaintedInput($_GET['page_id'], 'digit', '', '', '', '', $code_exception = 8, $page_exception = ERROR_PAGE_BCK, '', $cache_input = 1)) {
    if ($cache_input === 1 && !empty($cache_superglobals)) {
        foreach ($cache_superglobals as $input => $array_cache_values) {
            if ($input === 'page_id_bck') {
                foreach ($array_cache_values as $cache_value) {
                    if ($_GET['page_id'] === $cache_value) {
                        define("GET_PAGE_ID_BCK", $_GET['page_id']);
                    }
                }
            }
        }
        if (!defined("GET_PAGE_ID_BCK")) {
            throw new Fxr_lib\Error($_GET['page_id'], 3, ERROR_PAGE_BCK);
        }
    } else {
        if (!defined('GET_PAGE_ID_BCK')) {
            if (Fxr_lib\Input::getUntaintedInput($_GET['page_id'], 'none', '', '' . DB_PREFIX . 'pages_bck', 'page_id_bck', array(
                ':page_id_bck' => array(
                    $_GET['page_id'] => 'i'
                )
            ), $code_exception = 7, $page_exception = ERROR_PAGE_BCK, '', '')) {
                define("GET_PAGE_ID_BCK", $_GET['page_id']);
            }
        }
    }
} else {
    if (isset($_GET['page_id']) && $_GET['page_id'] === '') {
        define("GET_PAGE_ID_BCK", '');
    }
}

//======================================================================
// SESSION PAGE_LANG_BCK
//======================================================================
if (isset($_SESSION['page_lang_bck']) && Fxr_lib\Input::getUntaintedInput($_SESSION['page_lang_bck'], 'regex', '/^[a-z]{2}[-]{1}[a-zA-Z]{2}+$/', '', '', '', $code_exception = 8, $page_exception = ERROR_PAGE_BCK, '', $cache_input = 0)) {
    if ($cache_input === 1 && !empty($cache_superglobals)) {
        foreach ($cache_superglobals as $input => $array_cache_values) {
            if ($input === 'page_lang_bck') {
                foreach ($array_cache_values as $cache_value) {
                    if ($_SESSION['page_lang_bck'] === $cache_value) {
                        define("SESSION_PAGE_LANG_BCK", $_SESSION['page_lang_bck']);
                    }
                }
            }
        }
        if (!defined("SESSION_PAGE_LANG_BCK")) {
            throw new Fxr_lib\Error($_SESSION['page_lang_bck'], 3, ERROR_PAGE_BCK);
        }
    } else {
        if (!defined('SESSION_PAGE_LANG_BCK')) {
            if (Fxr_lib\Input::getUntaintedInput($_SESSION['page_lang_bck'], 'none', '', '' . DB_PREFIX . 'settings_bck', 'setting_abbr_lang_bck', array(
                ':setting_abbr_lang_bck' => array(
                    $_SESSION['page_lang_bck'] => 's'
                )
            ), $code_exception = 7, $page_exception = ERROR_PAGE_BCK, '', $cache_input = 0)) {
                define("SESSION_PAGE_LANG_BCK", $_SESSION['page_lang_bck']);
            }
        }
    }
} else {
    if (isset($_SESSION['page_lang_bck']) && $_SESSION['page_lang_bck'] === '') {
        define("SESSION_PAGE_LANG_BCK", '');
    }
}

//======================================================================
// POST login
//======================================================================
if (isset($_POST['login']) && Fxr_lib\Input::getUntaintedInput($_POST['login'], 'regex', '/^[a-zA-Z0-9_.-]{4,10}$/', '', '', '', $code_exception = 13, $page_exception = 'auth_login', '', $cache_input = 0)) {
    if ($cache_input === 1 && !empty($cache_superglobals)) {
        foreach ($cache_superglobals as $input => $array_cache_values) {
            if ($input === 'login') {
                foreach ($array_cache_values as $cache_value) {
                    if ($_POST['login'] === $cache_value) {
                        define("POST_LOGIN", $_POST['login']);
                    }
                }
            }
        }
        if (!defined("POST_LOGIN")) {
            throw new Fxr_lib\Error($_POST['login'], 3, ERROR_PAGE_BCK);
        }
    } else {
    	if (!defined('POST_LOGIN')) {
    		if (Fxr_lib\Input::getUntaintedInput($_POST['login'], 'none', '', '', '', '', $code_exception = '', $page_exception = '', '', $cache_input = 0)) {
    			define("POST_LOGIN", $_POST['login']);
    		}
		}
    }
} else {
    if (isset($_POST['login']) && $_POST['login'] === '') {
        define("POST_LOGIN", '');
    }
}

//======================================================================
// POST password
//======================================================================
if (isset($_POST['password']) && Fxr_lib\Input::getUntaintedInput($_POST['password'], 'regex', '/^(?=^.{6,15}$)((?=.*[0-9])(?=.*[A-Z])(?=.*[a-z]))^.*$/', '', '', '', $code_exception = 13, $page_exception = 'auth_login', '', $cache_input = 0)) {
    if ($cache_input === 1 && !empty($cache_superglobals)) {
        foreach ($cache_superglobals as $input => $array_cache_values) {
            if ($input === 'password') {
                foreach ($array_cache_values as $cache_value) {
                    if ($_POST['password'] === $cache_value) {
                        define("POST_PASSWORD", $_POST['password']);
                    }
                }
            }
        }
        if (!defined("POST_PASSWORD")) {
            throw new Fxr_lib\Error($_POST['password'], 3, ERROR_PAGE_BCK);
        }
    } else {
        if (!defined('POST_PASSWORD')) {
            if (Fxr_lib\Input::getUntaintedInput($_POST['password'], 'none', '', '', '', '', $code_exception = '', $page_exception = '', '', $cache_input = 0)) {
                define("POST_PASSWORD", $_POST['password']);
            }
        }
    }
} else {
    if (isset($_POST['password']) && $_POST['password'] === '') {
        define("POST_PASSWORD", '');
    }
}

//======================================================================
// SESSION post_login
//======================================================================
if (isset($_SESSION['post_login']) && Fxr_lib\Input::getUntaintedInput($_SESSION['post_login'], 'regex', '/^[a-zA-Z0-9_.-]{4,10}$/', '', '', '', $code_exception = 13, $page_exception = 'auth_login', '', $cache_input = 0)) {
    if ($cache_input === 1 && !empty($cache_superglobals)) {
        foreach ($cache_superglobals as $input => $array_cache_values) {
            if ($input === 'post_login') {
                foreach ($array_cache_values as $cache_value) {
                    if ($_SESSION['post_login'] === $cache_value) {
                        define("SESSION_LOGIN", $_SESSION['post_login']);
                    }
                }
            }
        }
        if (!defined("SESSION_LOGIN")) {
            throw new Fxr_lib\Error($_SESSION['post_login'], 3, ERROR_PAGE_BCK);
        }
    } else {
        if (!defined('SESSION_LOGIN')) {
            if (Fxr_lib\Input::getUntaintedInput($_SESSION['post_login'], 'none', '', '', '', '', $code_exception = '', $page_exception = '', '', $cache_input = 0)) {
                define("SESSION_LOGIN", $_SESSION['post_login']);
            }
        }
    }
} else {
    if (isset($_SESSION['post_login']) && $_SESSION['post_login'] === '') {
        define("SESSION_LOGIN", '');
    }
}

//======================================================================
// SESSION post_password
//======================================================================
if (isset($_SESSION['post_password']) && Fxr_lib\Input::getUntaintedInput($_SESSION['post_password'], 'alnum', '', '', '', '', $code_exception = 13, $page_exception = 'auth_login', '', $cache_input = 0)) {
    if ($cache_input === 1 && !empty($cache_superglobals)) {
        foreach ($cache_superglobals as $input => $array_cache_values) {
            if ($input === 'post_password') {
                foreach ($array_cache_values as $cache_value) {
                    if ($_SESSION['post_password'] === $cache_value) {
                        define("SESSION_PASSWORD", $_SESSION['post_password']);
                    }
                }
            }
        }
        if (!defined("SESSION_PASSWORD")) {
            throw new Fxr_lib\Error($_SESSION['post_password'], 3, ERROR_PAGE_BCK);
        }
    } else {
        if (!defined('SESSION_PASSWORD')) {
            if (Fxr_lib\Input::getUntaintedInput($_SESSION['post_password'], 'none', '', '', '', '', $code_exception = '', $page_exception = '', '', $cache_input = 0)) {
                define("SESSION_PASSWORD", $_SESSION['post_password']);
            }
        }
    }
} else {
    if (isset($_SESSION['post_password']) && $_SESSION['post_password'] === '') {
        define("SESSION_PASSWORD", '');
    }
}

//======================================================================
// SESSION last_activity
//======================================================================
if (isset($_SESSION['last_activity']) && Fxr_lib\Input::getUntaintedInput($_SESSION['last_activity'], 'digit', '', '', '', '', $code_exception = 8, $page_exception = ERROR_PAGE_BCK, '', $cache_input = 0)) {
    if ($cache_input === 1 && !empty($cache_superglobals)) {
        foreach ($cache_superglobals as $input => $array_cache_values) {
            if ($input === 'last_activity') {
                foreach ($array_cache_values as $cache_value) {
                    if ($_SESSION['last_activity'] === $cache_value) {
                        define("SESSION_LAST_ACTIVITY", $_SESSION['last_activity']);
                    }
                }
            }
        }
        if (!defined("SESSION_LAST_ACTIVITY")) {
            throw new Fxr_lib\Error($_SESSION['last_activity'], 3, ERROR_PAGE_BCK);
        }
    } else {
        if (!defined('SESSION_LAST_ACTIVITY')) {
            if (Fxr_lib\Input::getUntaintedInput($_SESSION['last_activity'], 'none', '', '', '', '', $code_exception = '', $page_exception = '', '', $cache_input = 0)) {
                define("SESSION_LAST_ACTIVITY", $_SESSION['last_activity']);
            }
        }
    }
} else {
    if (isset($_SESSION['last_activity']) && $_SESSION['last_activity'] === '') {
        define("SESSION_LAST_ACTIVITY", '');
    }
}

//======================================================================
// POST meta_title
//======================================================================
if (isset($_POST['meta_title']) && Fxr_lib\Input::getUntaintedInput($_POST['meta_title'], 'none', '', '', '', '', $code_exception = '', $page_exception = '', '', $cache_input = 0)) {
    if ($cache_input === 1 && !empty($cache_superglobals)) {
        foreach ($cache_superglobals as $input => $array_cache_values) {
            if ($input === 'meta_title') {
                foreach ($array_cache_values as $cache_value) {
                    if ($_POST['meta_title'] === $cache_value) {
                        define("POST_META_TITLE", $_POST['meta_title']);
                        $_SESSION['meta_title'] = POST_META_TITLE;
                    }
                }
            }
        }
        if (!defined("POST_META_TITLE")) {
            throw new Fxr_lib\Error($_POST['meta_title'], 3, ERROR_PAGE_BCK);
        }
    } else {
        if ($_POST['meta_title'] === '') {
            $_SESSION['error_meta_title'] = 'Meta Title';
            define("ERROR_POST_META_TITLE", $_SESSION['error_meta_title']);
        } else {
            define("POST_META_TITLE", $_POST['meta_title']);
            $_SESSION['meta_title'] = POST_META_TITLE;
        }
    }
} else {
    if (isset($_POST['meta_title'])) {
        $_SESSION['error_meta_title'] = 'Meta Title';
        define("ERROR_POST_META_TITLE", $_SESSION['error_meta_title']);
    }
}

//======================================================================
// POST url_title
//======================================================================
if (isset($_POST['url_title']) && Fxr_lib\Input::getUntaintedInput($_POST['url_title'], 'none', '', '', '', '', $code_exception = '', $page_exception = '', '', $cache_input = 0)) {
    if ($cache_input === 1 && !empty($cache_superglobals)) {
        foreach ($cache_superglobals as $input => $array_cache_values) {
            if ($input === 'url_title') {
                foreach ($array_cache_values as $cache_value) {
                    if ($_POST['url_title'] === $cache_value) {
                        define("POST_URL_TITLE", $_POST['url_title']);
                        $_SESSION['url_title'] = POST_URL_TITLE;
                    }
                }
            }
        }
        if (!defined("POST_URL_TITLE")) {
            throw new Fxr_lib\Error($_POST['url_title'], 3, ERROR_PAGE_BCK);
        }
    } else {
        if ($_POST['url_title'] === '') {
            $_SESSION['error_url_title'] = 'URL Title';
            define("ERROR_POST_URL_TITLE", $_SESSION['error_url_title']);
        } else {
            define("POST_URL_TITLE", $_POST['url_title']);
            $_SESSION['url_title'] = POST_URL_TITLE;
        }
    }
} else {
    if (isset($_POST['url_title'])) {
        $_SESSION['error_url_title'] = 'URL Title';
        define("ERROR_POST_URL_TITLE", $_SESSION['error_url_title']);
    }
}

//======================================================================
// POST meta_description
//======================================================================
if (isset($_POST['meta_description']) && Fxr_lib\Input::getUntaintedInput($_POST['meta_description'], 'none', '', '', '', '', $code_exception = '', $page_exception = '', '', $cache_input = 0)) {
    if ($cache_input === 1 && !empty($cache_superglobals)) {
        foreach ($cache_superglobals as $input => $array_cache_values) {
            if ($input === 'meta_description') {
                foreach ($array_cache_values as $cache_value) {
                    if ($_POST['meta_description'] === $cache_value) {
                        define("POST_META_DESCRIPTION", $_POST['meta_description']);
                        $_SESSION['meta_description'] = POST_META_DESCRIPTION;
                    }
                }
            }
        }
        if (!defined("POST_META_DESCRIPTION")) {
            throw new Fxr_lib\Error($_POST['meta_description'], 3, ERROR_PAGE_BCK);
        }
    } else {
        if ($_POST['meta_description'] === '') {
            $_SESSION['error_meta_description'] = 'Meta Description';
            define("ERROR_POST_META_DESCRIPTION", $_SESSION['error_meta_description']);
        } else {
            define("POST_META_DESCRIPTION", $_POST['meta_description']);
            $_SESSION['meta_description'] = POST_META_DESCRIPTION;
        }
    }
} else {
    if (isset($_POST['meta_description'])) {
        $_SESSION['error_meta_description'] = 'Meta Description';
        define("ERROR_POST_META_DESCRIPTION", $_SESSION['error_meta_description']);
    }
}

//======================================================================
// POST summary
//======================================================================
if (isset($_POST['summary']) && Fxr_lib\Input::getUntaintedInput($_POST['summary'], 'none', '', '', '', '', $code_exception = '', $page_exception = '', '', $cache_input = 0)) {
    if ($cache_input === 1 && !empty($cache_superglobals)) {
        foreach ($cache_superglobals as $input => $array_cache_values) {
            if ($input === 'summary') {
                foreach ($array_cache_values as $cache_value) {
                    if ($_POST['summary'] === $cache_value) {
                        define("POST_SUMMARY", $_POST['summary']);
                        $_SESSION['summary'] = POST_SUMMARY;
                    }
                }
            }
        }
        if (!defined("POST_SUMMARY")) {
            throw new Fxr_lib\Error($_POST['summary'], 3, ERROR_PAGE_BCK);
        }
    } else {
        if ($_POST['summary'] === '') {
            $_SESSION['error_summary'] = 'Summary';
            define("ERROR_POST_SUMMARY", $_SESSION['error_summary']);
        } else {
            define("POST_SUMMARY", $_POST['summary']);
            $_SESSION['summary'] = POST_SUMMARY;
        }
    }
} else {
    if (isset($_POST['summary'])) {
        $_SESSION['error_summary'] = 'Summary';
        define("ERROR_POST_SUMMARY", $_SESSION['error_summary']);
    }
}

//======================================================================
// POST body
//======================================================================
if (isset($_POST['body']) && Fxr_lib\Input::getUntaintedInput($_POST['body'], 'none', '', '', '', '', $code_exception = '', $page_exception = '', '', $cache_input = 0)) {
    if ($cache_input === 1 && !empty($cache_superglobals)) {
        foreach ($cache_superglobals as $input => $array_cache_values) {
            if ($input === 'body') {
                foreach ($array_cache_values as $cache_value) {
                    if ($_POST['body'] === $cache_value) {
                        define("POST_BODY", $_POST['body']);
                        $_SESSION['body'] = POST_BODY;
                    }
                }
            }
        }
        if (!defined("POST_BODY")) {
            throw new Fxr_lib\Error($_POST['body'], 3, ERROR_PAGE_BCK);
        }
    } else {
        if ($_POST['body'] === '') {
            $_SESSION['error_body'] = 'Body';
            define("ERROR_POST_BODY", $_SESSION['error_body']);
        } else {
            define("POST_BODY", $_POST['body']);
            $_SESSION['body'] = POST_BODY;
        }
    }
} else {
    if (isset($_POST['body'])) {
        $_SESSION['error_body'] = 'Body';
        define("ERROR_POST_BODY", $_SESSION['error_body']);
    }
}

//======================================================================
// POST auth_access
//======================================================================
if (isset($_POST['auth_access']) && Fxr_lib\Input::getUntaintedInput($_POST['auth_access'], 'digit', '', '', '', '', $code_exception = '', $page_exception = '', '', $cache_input = 0)) {
    if ($cache_input === 1 && !empty($cache_superglobals)) {
        foreach ($cache_superglobals as $input => $array_cache_values) {
            if ($input === 'auth_access') {
                foreach ($array_cache_values as $cache_value) {
                    if ($_POST['auth_access'] === $cache_value) {
                        define("POST_AUTH_ACCESS", $_POST['auth_access']);
                        $_SESSION['auth_access'] = POST_AUTH_ACCESS;
                    }
                }
            }
        }
        if (!defined("POST_AUTH_ACCESS")) {
            throw new Fxr_lib\Error($_POST['auth_access'], 3, ERROR_PAGE_BCK);
        }
    } else {
        if ($_POST['auth_access'] === '') {
            $_SESSION['error_auth_access'] = 'auth_access';
            define("ERROR_POST_AUTH_ACCESS", $_SESSION['error_auth_access']);
        } else {
            define("POST_AUTH_ACCESS", $_POST['auth_access']);
            $_SESSION['auth_access'] = POST_AUTH_ACCESS;
        }
    }
} else {
    if (isset($_POST['auth_access'])) {
        $_SESSION['error_auth_access'] = 'auth_access';
        define("ERROR_POST_AUTH_ACCESS", $_SESSION['error_auth_access']);
    }
}

//======================================================================
// POST theme_lang_bck
//======================================================================
if (isset($_POST['theme_lang_bck']) && Fxr_lib\Input::getUntaintedInput($_POST['theme_lang_bck'], 'regex', '/^[a-z]{2}[-]{1}[a-zA-Z]{2}+$/', '', '', '', $code_exception = '', $page_exception = '', '', $cache_input = 0)) {
    if ($cache_input === 1 && !empty($cache_superglobals)) {
        foreach ($cache_superglobals as $input => $array_cache_values) {
            if ($input === 'theme_lang_bck') {
                foreach ($array_cache_values as $cache_value) {
                    if ($_POST['theme_lang_bck'] === $cache_value) {
                        define("POST_THEME_LANG_BCK", $_POST['theme_lang_bck']);
                        $_SESSION['theme_lang_bck'] = POST_THEME_LANG_BCK;
                    }
                }
            }
        }
        if (!defined("POST_THEME_LANG_BCK")) {
            throw new Fxr_lib\Error($_POST['theme_lang_bck'], 3, ERROR_PAGE_BCK);
        }
    } else {
        if ($_POST['theme_lang_bck'] === '') {
            $_SESSION['error_theme_lang_bck'] = 'Lang';
            define("ERROR_POST_THEME_LANG_BCK", $_SESSION['error_theme_lang_bck']);
        } else {
            define("POST_THEME_LANG_BCK", $_POST['theme_lang_bck']);
            $_SESSION['theme_lang_bck'] = POST_THEME_LANG_BCK;
        }
    }
} else {
    if (isset($_POST['theme_lang_bck'])) {
        $_SESSION['error_theme_lang_bck'] = 'Lang';
        define("ERROR_POST_THEME_LANG_BCK", $_SESSION['error_theme_lang_bck']);
    }
}

//======================================================================
// POST theme_folder_bck
//======================================================================
if (isset($_POST['theme_folder_bck']) && Fxr_lib\Input::getUntaintedInput($_POST['theme_folder_bck'], 'regex', '/^[a-zA-Z0-9_]{1,20}$/', '', '', '', $code_exception = '', $page_exception = '', '', $cache_input = 0)) {
    if ($cache_input === 1 && !empty($cache_superglobals)) {
        foreach ($cache_superglobals as $input => $array_cache_values) {
            if ($input === 'theme_folder_bck') {
                foreach ($array_cache_values as $cache_value) {
                    if ($_POST['theme_folder_bck'] === $cache_value) {
                        define("POST_THEME_FOLDER_BCK", $_POST['theme_folder_bck']);
                        $_SESSION['theme_folder_bck'] = POST_THEME_FOLDER_BCK;
                    }
                }
            }
        }
        if (!defined("POST_THEME_FOLDER_BCK")) {
            throw new Fxr_lib\Error($_POST['theme_folder_bck'], 3, ERROR_PAGE_BCK);
        }
    } else {
        if ($_POST['theme_folder_bck'] === '') {
            $_SESSION['error_theme_folder_bck'] = 'Folder';
            define("ERROR_POST_THEME_FOLDER_BCK", $_SESSION['error_theme_folder_bck']);
        } else {
            define("POST_THEME_FOLDER_BCK", $_POST['theme_folder_bck']);
            $_SESSION['theme_folder_bck'] = POST_THEME_FOLDER_BCK;
        }
    }
} else {
    if (isset($_POST['theme_folder_bck'])) {
        $_SESSION['error_theme_folder_bck'] = 'Folder';
        define("ERROR_POST_THEME_FOLDER_BCK", $_SESSION['error_theme_folder_bck']);
    }
}

//======================================================================
// POST theme_tpl_bck
//======================================================================
if (isset($_POST['theme_tpl_bck']) && Fxr_lib\Input::getUntaintedInput($_POST['theme_tpl_bck'], 'regex', '/^[a-zA-Z0-9_]{1,20}$/', '', '', '', $code_exception = '', $page_exception = '', '', $cache_input = 0)) {
    if ($cache_input === 1 && !empty($cache_superglobals)) {
        foreach ($cache_superglobals as $input => $array_cache_values) {
            if ($input === 'theme_tpl_bck') {
                foreach ($array_cache_values as $cache_value) {
                    if ($_POST['theme_tpl_bck'] === $cache_value) {
                        define("POST_THEME_TPL_BCK", $_POST['theme_tpl_bck']);
                        $_SESSION['theme_tpl_bck'] = POST_THEME_TPL_BCK;
                    }
                }
            }
        }
        if (!defined("POST_THEME_TPL_BCK")) {
            throw new Fxr_lib\Error($_POST['theme_tpl_bck'], 3, ERROR_PAGE_BCK);
        }
    } else {
        if ($_POST['theme_tpl_bck'] === '') {
            $_SESSION['error_theme_tpl_bck'] = 'Tpl';
            define("ERROR_POST_THEME_TPL_BCK", $_SESSION['error_theme_tpl_bck']);
        } else {
            define("POST_THEME_TPL_BCK", $_POST['theme_tpl_bck']);
            $_SESSION['theme_tpl_bck'] = POST_THEME_TPL_BCK;
        }
    }
} else {
    if (isset($_POST['theme_tpl_bck'])) {
        $_SESSION['error_theme_tpl_bck'] = 'Tpl';
        define("ERROR_POST_THEME_TPL_BCK", $_SESSION['error_theme_tpl_bck']);
    }
}

//======================================================================
// POST in_home
//======================================================================
if (isset($_POST['in_home']) && Fxr_lib\Input::getUntaintedInput($_POST['in_home'], 'digit', '', '', '', '', $code_exception = '', $page_exception = '', '', $cache_input = 0)) {
    if ($cache_input === 1 && !empty($cache_superglobals)) {
        foreach ($cache_superglobals as $input => $array_cache_values) {
            if ($input === 'in_home') {
                foreach ($array_cache_values as $cache_value) {
                    if ($_POST['in_home'] === $cache_value) {
                        define("POST_IN_HOME", $_POST['in_home']);
                        $_SESSION['in_home'] = POST_IN_HOME;
                    }
                }
            }
        }
        if (!defined("POST_IN_HOME")) {
            throw new Fxr_lib\Error($_POST['in_home'], 3, ERROR_PAGE_BCK);
        }
    } else {
        if ($_POST['in_home'] === '') {
            $_SESSION['error_in_home'] = 'in_home';
            define("ERROR_POST_IN_HOME", $_SESSION['error_in_home']);
        } else {
            define("POST_IN_HOME", $_POST['in_home']);
            $_SESSION['in_home'] = POST_IN_HOME;
        }
    }
} else {
    if (isset($_POST['in_home'])) {
        $_SESSION['error_in_home'] = 'in_home';
        define("ERROR_POST_IN_HOME", $_SESSION['error_in_home']);
    }
}

//======================================================================
// POST in_nav
//======================================================================
if (isset($_POST['in_nav']) && Fxr_lib\Input::getUntaintedInput($_POST['in_nav'], 'digit', '', '', '', '', $code_exception = '', $page_exception = '', '', $cache_input = 0)) {
    if ($cache_input === 1 && !empty($cache_superglobals)) {
        foreach ($cache_superglobals as $input => $array_cache_values) {
            if ($input === 'in_nav') {
                foreach ($array_cache_values as $cache_value) {
                    if ($_POST['in_nav'] === $cache_value) {
                        define("POST_IN_NAV", $_POST['in_nav']);
                        $_SESSION['in_nav'] = POST_IN_NAV;
                    }
                }
            }
        }
        if (!defined("POST_IN_NAV")) {
            throw new Fxr_lib\Error($_POST['in_nav'], 3, ERROR_PAGE_BCK);
        }
    } else {
        if ($_POST['in_nav'] === '') {
            $_SESSION['error_in_nav'] = 'in_nav';
            define("ERROR_POST_IN_NAV", $_SESSION['error_in_nav']);
        } else {
            define("POST_IN_NAV", $_POST['in_nav']);
            $_SESSION['in_nav'] = POST_IN_NAV;
        }
    }
} else {
    if (isset($_POST['in_nav'])) {
        $_SESSION['error_in_nav'] = 'in_nav';
        define("ERROR_POST_IN_NAV", $_SESSION['error_in_nav']);
    }
}

//======================================================================
// POST in_subnav
//======================================================================
if (isset($_POST['in_subnav']) && Fxr_lib\Input::getUntaintedInput($_POST['in_subnav'], 'digit', '', '', '', '', $code_exception = '', $page_exception = '', '', $cache_input = 0)) {
    if ($cache_input === 1 && !empty($cache_superglobals)) {
        foreach ($cache_superglobals as $input => $array_cache_values) {
            if ($input === 'in_subnav') {
                foreach ($array_cache_values as $cache_value) {
                    if ($_POST['in_subnav'] === $cache_value) {
                        define("POST_IN_SUBNAV", $_POST['in_subnav']);
                        $_SESSION['in_subnav'] = POST_IN_SUBNAV;
                    }
                }
            }
        }
        if (!defined("POST_IN_SUBNAV")) {
            throw new Fxr_lib\Error($_POST['in_subnav'], 3, ERROR_PAGE_BCK);
        }
    } else {
        if ($_POST['in_subnav'] === '') {
            $_SESSION['error_in_subnav'] = 'in_subnav';
            define("ERROR_POST_IN_SUBNAV", $_SESSION['error_in_subnav']);
        } else {
            define("POST_IN_SUBNAV", $_POST['in_subnav']);
            $_SESSION['in_subnav'] = POST_IN_SUBNAV;
        }
    }
} else {
    if (isset($_POST['in_subnav'])) {
        $_SESSION['error_in_subnav'] = 'in_subnav';
        define("ERROR_POST_IN_SUBNAV", $_SESSION['error_in_subnav']);
    }
}

//======================================================================
// POST in_cache
//======================================================================
if (isset($_POST['in_cache']) && Fxr_lib\Input::getUntaintedInput($_POST['in_cache'], 'digit', '', '', '', '', $code_exception = '', $page_exception = '', '', $cache_input = 0)) {
    if ($cache_input === 1 && !empty($cache_superglobals)) {
        foreach ($cache_superglobals as $input => $array_cache_values) {
            if ($input === 'in_cache') {
                foreach ($array_cache_values as $cache_value) {
                    if ($_POST['in_cache'] === $cache_value) {
                        define("POST_IN_CACHE", $_POST['in_cache']);
                        $_SESSION['in_cache'] = POST_IN_CACHE;
                    }
                }
            }
        }
        if (!defined("POST_IN_CACHE")) {
            throw new Fxr_lib\Error($_POST['in_cache'], 3, ERROR_PAGE_BCK);
        }
    } else {
        if ($_POST['in_cache'] === '') {
            $_SESSION['error_in_cache'] = 'in_cache';
            define("ERROR_POST_IN_CACHE", $_SESSION['error_in_cache']);
        } else {
            define("POST_IN_CACHE", $_POST['in_cache']);
            $_SESSION['in_cache'] = POST_IN_CACHE;
        }
    }
} else {
    if (isset($_POST['in_cache'])) {
        $_SESSION['error_in_cache'] = 'in_cache';
        define("ERROR_POST_IN_CACHE", $_SESSION['error_in_cache']);
    }
}

//======================================================================
// POST cache_duration
//======================================================================
if (isset($_POST['cache_duration']) && Fxr_lib\Input::getUntaintedInput($_POST['cache_duration'], 'digit', '', '', '', '', $code_exception = '', $page_exception = '', '', $cache_input = 0)) {
    if ($cache_input === 1 && !empty($cache_superglobals)) {
        foreach ($cache_superglobals as $input => $array_cache_values) {
            if ($input === 'cache_duration') {
                foreach ($array_cache_values as $cache_value) {
                    if ($_POST['cache_duration'] === $cache_value) {
                        define("POST_CACHE_DURATION", $_POST['cache_duration']);
                        $_SESSION['cache_duration'] = POST_CACHE_DURATION;
                    }
                }
            }
        }
        if (!defined("POST_CACHE_DURATION")) {
            throw new Fxr_lib\Error($_POST['cache_duration'], 3, ERROR_PAGE_BCK);
        }
    } else {
        if ($_POST['cache_duration'] === '') {
            $_SESSION['error_cache_duration'] = 'Cache duration';
            define("ERROR_POST_CACHE_DURATION", $_SESSION['error_cache_duration']);
        } else {
            define("POST_CACHE_DURATION", $_POST['cache_duration']);
            $_SESSION['cache_duration'] = POST_CACHE_DURATION;
        }
    }
} else {
    if (isset($_POST['cache_duration'])) {
        $_SESSION['error_cache_duration'] = 'Cache duration';
        define("ERROR_POST_CACHE_DURATION", $_SESSION['error_cache_duration']);
    }
}


//======================================================================
// POST user_login_bck
//======================================================================
if (isset($_POST['user_login_bck']) && Fxr_lib\Input::getUntaintedInput($_POST['user_login_bck'], 'regex', '/^[a-zA-Z0-9_.-]{4,10}$/', '', '', '', $code_exception = '', $page_exception = '', '', $cache_input = 0)) {
    if ($cache_input === 1 && !empty($cache_superglobals)) {
        foreach ($cache_superglobals as $input => $array_cache_values) {
            if ($input === 'user_login_bck') {
                foreach ($array_cache_values as $cache_value) {
                    if ($_POST['user_login_bck'] === $cache_value) {
                        define("POST_USER_LOGIN_BCK", $_POST['user_login_bck']);
                        $_SESSION['user_login_bck'] = POST_USER_LOGIN_BCK;
                    }
                }
            }
        }
        if (!defined("POST_USER_LOGIN_BCK")) {
            throw new Fxr_lib\Error($_POST['user_login_bck'], 3, ERROR_PAGE_BCK);
        }
    } else {
        if ($_POST['user_login_bck'] === '') {
            $_SESSION['error_user_login_bck'] = 'Login';
            define("ERROR_POST_USER_LOGIN_BCK", $_SESSION['error_user_login_bck']);
        } else {
            define("POST_USER_LOGIN_BCK", $_POST['user_login_bck']);
            $_SESSION['user_login_bck'] = POST_USER_LOGIN_BCK;
        }
    }
} else {
    if (isset($_POST['user_login_bck'])) {
        $_SESSION['error_user_login_bck'] = 'Login';
        define("ERROR_POST_USER_LOGIN_BCK", $_SESSION['error_user_login_bck']);
    }
}

//======================================================================
// POST user_name_bck
//======================================================================
if (isset($_POST['user_name_bck']) && Fxr_lib\Input::getUntaintedInput($_POST['user_name_bck'], 'regex', '/^[a-zA-Z0-9àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ\s_.-]{1,50}$/', '', '', '', $code_exception = '', $page_exception = '', '', $cache_input = 0)) {
    if ($cache_input === 1 && !empty($cache_superglobals)) {
        foreach ($cache_superglobals as $input => $array_cache_values) {
            if ($input === 'user_name_bck') {
                foreach ($array_cache_values as $cache_value) {
                    if ($_POST['user_name_bck'] === $cache_value) {
                        define("POST_USER_NAME_BCK", $_POST['user_name_bck']);
                        $_SESSION['user_name_bck'] = POST_USER_NAME_BCK;
                    }
                }
            }
        }
        if (!defined("POST_USER_NAME_BCK")) {
            throw new Fxr_lib\Error($_POST['user_name_bck'], 3, ERROR_PAGE_BCK);
        }
    } else {
        if ($_POST['user_name_bck'] === '') {
            $_SESSION['error_user_name_bck'] = 'Full name';
            define("ERROR_POST_USER_NAME_BCK", $_SESSION['error_user_name_bck']);
        } else {
            define("POST_USER_NAME_BCK", $_POST['user_name_bck']);
            $_SESSION['user_name_bck'] = POST_USER_NAME_BCK;
        }
    }
} else {
    if (isset($_POST['user_name_bck'])) {
        $_SESSION['error_user_name_bck'] = 'Full name';
        define("ERROR_POST_USER_NAME_BCK", $_SESSION['error_user_name_bck']);
    }
}

//======================================================================
// POST user_email_bck
//======================================================================
if (isset($_POST['user_email_bck']) && Fxr_lib\Input::getUntaintedInput($_POST['user_email_bck'], 'regex', '/^([a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4})*$/', '', '', '', $code_exception = '', $page_exception = '', '', $cache_input = 0)) {
    if ($cache_input === 1 && !empty($cache_superglobals)) {
        foreach ($cache_superglobals as $input => $array_cache_values) {
            if ($input === 'user_email_bck') {
                foreach ($array_cache_values as $cache_value) {
                    if ($_POST['user_email_bck'] === $cache_value) {
                        define("POST_USER_EMAIL_BCK", $_POST['user_email_bck']);
                        $_SESSION['user_email_bck'] = POST_USER_EMAIL_BCK;
                    }
                }
            }
        }
        if (!defined("POST_USER_EMAIL_BCK")) {
            throw new Fxr_lib\Error($_POST['user_email_bck'], 3, ERROR_PAGE_BCK);
        }
    } else {
        if ($_POST['user_email_bck'] === '') {
            $_SESSION['error_user_email_bck'] = 'E-mail';
            define("ERROR_POST_USER_EMAIL_BCK", $_SESSION['error_user_email_bck']);
        } else {
            define("POST_USER_EMAIL_BCK", $_POST['user_email_bck']);
            $_SESSION['user_email_bck'] = POST_USER_EMAIL_BCK;
        }
    }
} else {
    if (isset($_POST['user_email_bck'])) {
        $_SESSION['error_user_email_bck'] = 'E-mail';
        define("ERROR_POST_USER_EMAIL_BCK", $_SESSION['error_user_email_bck']);
    }
}

//======================================================================
// POST user_password_bck
//======================================================================
if (isset($_POST['user_password_bck']) && Fxr_lib\Input::getUntaintedInput($_POST['user_password_bck'], 'regex', '/^(?=^.{6,15}$)((?=.*[0-9])(?=.*[A-Z])(?=.*[a-z]))^.*$/', '', '', '', $code_exception = '', $page_exception = '', '', $cache_input = 0)) {
    if ($cache_input === 1 && !empty($cache_superglobals)) {
        foreach ($cache_superglobals as $input => $array_cache_values) {
            if ($input === 'user_password_bck') {
                foreach ($array_cache_values as $cache_value) {
                    if ($_POST['user_password_bck'] === $cache_value) {
                        define("POST_USER_PASSWORD_BCK", $_POST['user_password_bck']);
                        $_SESSION['user_password_bck'] = POST_USER_PASSWORD_BCK;
                    }
                }
            }
        }
        if (!defined("POST_USER_PASSWORD_BCK")) {
            throw new Fxr_lib\Error($_POST['user_password_bck'], 3, ERROR_PAGE_BCK);
        }
    } else {
        if ($_POST['user_password_bck'] === '') {
            $_SESSION['error_user_password_bck'] = 'Password';
            define("ERROR_POST_USER_PASSWORD_BCK", $_SESSION['error_user_password_bck']);
        } else {
            define("POST_USER_PASSWORD_BCK", $_POST['user_password_bck']);
            $_SESSION['user_password_bck'] = POST_USER_PASSWORD_BCK;
        }
    }
} else {
    if (isset($_POST['user_password_bck'])) {
        $_SESSION['error_user_password_bck'] = 'Password';
        define("ERROR_POST_USER_PASSWORD_BCK", $_SESSION['error_user_password_bck']);
    }
}

//======================================================================
// POST user_confirm_password_bck
//======================================================================
if (isset($_POST['user_confirm_password_bck']) && Fxr_lib\Input::getUntaintedInput($_POST['user_confirm_password_bck'], 'regex', '/^(?=^.{6,15}$)((?=.*[0-9])(?=.*[A-Z])(?=.*[a-z]))^.*$/', '', '', '', $code_exception = '', $page_exception = '', '', $cache_input = 0)) {
    if ($cache_input === 1 && !empty($cache_superglobals)) {
        foreach ($cache_superglobals as $input => $array_cache_values) {
            if ($input === 'user_confirm_password_bck') {
                foreach ($array_cache_values as $cache_value) {
                    if ($_POST['user_confirm_password_bck'] === $cache_value) {
                        define("POST_USER_CONFIRM_PASSWORD_BCK", $_POST['user_confirm_password_bck']);
                        $_SESSION['user_confirm_password_bck'] = POST_USER_CONFIRM_PASSWORD_BCK;
                    }
                }
            }
        }
        if (!defined("POST_USER_CONFIRM_PASSWORD_BCK")) {
            throw new Fxr_lib\Error($_POST['user_confirm_password_bck'], 3, ERROR_PAGE_BCK);
        }
    } else {
        if ($_POST['user_confirm_password_bck'] === '') {
            $_SESSION['error_user_confirm_password_bck'] = 'Confirm Password';
            define("ERROR_POST_USER_CONFIRM_PASSWORD_BCK", $_SESSION['error_user_confirm_password_bck']);
        } else {
        if (defined("POST_USER_PASSWORD_BCK") && POST_USER_PASSWORD_BCK == $_POST['user_confirm_password_bck']) {
        	define("POST_USER_CONFIRM_PASSWORD_BCK", $_POST['user_confirm_password_bck']);
        	$_SESSION['user_confirm_password_bck'] = POST_USER_CONFIRM_PASSWORD_BCK;
        } else {
        	$_SESSION['error_user_confirm_password_bck'] = 'Password does not match the confirm password';
        }
            
        }
    }
} else {
    if (isset($_POST['user_confirm_password_bck'])) {
        $_SESSION['error_user_confirm_password_bck'] = 'Confirm Password';
        define("ERROR_POST_USER_CONFIRM_PASSWORD_BCK", $_SESSION['error_user_confirm_password_bck']);
    }
}

//======================================================================
// POST user_theme_folder_bck
//======================================================================
if (isset($_POST['user_theme_folder_bck']) && Fxr_lib\Input::getUntaintedInput($_POST['user_theme_folder_bck'], 'none', '', '', '', '', $code_exception = '', $page_exception = '', '', $cache_input = 0)) {
    if ($cache_input === 1 && !empty($cache_superglobals)) {
        foreach ($cache_superglobals as $input => $array_cache_values) {
            if ($input === 'user_theme_folder_bck') {
                foreach ($array_cache_values as $cache_value) {
                    if ($_POST['user_theme_folder_bck'] === $cache_value) {
                        define("POST_USER_THEME_FOLDER_BCK", $_POST['user_theme_folder_bck']);
                        $_SESSION['user_theme_folder_bck'] = POST_USER_THEME_FOLDER_BCK;
                    }
                }
            }
        }
        if (!defined("POST_USER_THEME_FOLDER_BCK")) {
            throw new Fxr_lib\Error($_POST['user_theme_folder_bck'], 3, ERROR_PAGE_BCK);
        }
    } else {
        if ($_POST['user_theme_folder_bck'] === '') {
            $_SESSION['error_user_theme_folder_bck'] = 'Folder';
            define("ERROR_POST_USER_THEME_FOLDER_BCK", $_SESSION['error_user_theme_folder_bck']);
        } else {
            define("POST_USER_THEME_FOLDER_BCK", $_POST['user_theme_folder_bck']);
            $_SESSION['user_theme_folder_bck'] = POST_USER_THEME_FOLDER_BCK;
        }
    }
} else {
    if (isset($_POST['user_theme_folder_bck'])) {
        $_SESSION['error_user_theme_folder_bck'] = 'Folder';
        define("ERROR_POST_USER_THEME_FOLDER_BCK", $_SESSION['error_user_theme_folder_bck']);
    }
}

//======================================================================
// POST user_level_access_bck
//======================================================================
if (isset($_POST['user_level_access_bck']) && Fxr_lib\Input::getUntaintedInput($_POST['user_level_access_bck'], 'digit', '', '', '', '', $code_exception = '', $page_exception = '', '', $cache_input = 0)) {
    if ($cache_input === 1 && !empty($cache_superglobals)) {
        foreach ($cache_superglobals as $input => $array_cache_values) {
            if ($input === 'user_level_access_bck') {
                foreach ($array_cache_values as $cache_value) {
                    if ($_POST['user_level_access_bck'] === $cache_value) {
                        define("POST_USER_LEVEL_ACCESS_BCK", $_POST['user_level_access_bck']);
                        $_SESSION['user_level_access_bck'] = POST_USER_LEVEL_ACCESS_BCK;
                    }
                }
            }
        }
        if (!defined("POST_USER_LEVEL_ACCESS_BCK")) {
            throw new Fxr_lib\Error($_POST['user_level_access_bck'], 3, ERROR_PAGE_BCK);
        }
    } else {
        if ($_POST['user_level_access_bck'] === '') {
            $_SESSION['error_user_level_access_bck'] = 'Access';
            define("ERROR_POST_USER_LEVEL_ACCESS_BCK", $_SESSION['error_user_level_access_bck']);
        } else {
            define("POST_USER_LEVEL_ACCESS_BCK", $_POST['user_level_access_bck']);
            $_SESSION['user_level_access_bck'] = POST_USER_LEVEL_ACCESS_BCK;
        }
    }
} else {
    if (isset($_POST['user_level_access_bck'])) {
        $_SESSION['error_user_level_access_bck'] = 'Access';
        define("ERROR_POST_USER_LEVEL_ACCESS_BCK", $_SESSION['error_user_level_access_bck']);
    }
}

//======================================================================
// POST user_theme_lang_bck
//======================================================================
if (isset($_POST['user_theme_lang_bck']) && Fxr_lib\Input::getUntaintedInput($_POST['user_theme_lang_bck'], 'regex', '/^[a-z]{2}[-]{1}[a-zA-Z]{2}+$/', '', '', '', $code_exception = '', $page_exception = '', '', $cache_input = 0)) {
    if ($cache_input === 1 && !empty($cache_superglobals)) {
        foreach ($cache_superglobals as $input => $array_cache_values) {
            if ($input === 'user_theme_lang_bck') {
                foreach ($array_cache_values as $cache_value) {
                    if ($_POST['user_theme_lang_bck'] === $cache_value) {
                        define("POST_USER_THEME_LANG_BCK", $_POST['user_theme_lang_bck']);
                        $_SESSION['user_theme_lang_bck'] = POST_USER_THEME_LANG_BCK;
                    }
                }
            }
        }
        if (!defined("POST_USER_THEME_LANG_BCK")) {
            throw new Fxr_lib\Error($_POST['user_theme_lang_bck'], 3, ERROR_PAGE_BCK);
        }
    } else {
        if ($_POST['user_theme_lang_bck'] === '') {
            $_SESSION['error_user_theme_lang_bck'] = 'Lang';
            define("ERROR_POST_USER_THEME_LANG_BCK", $_SESSION['error_user_theme_lang_bck']);
        } else {
            define("POST_USER_THEME_LANG_BCK", $_POST['user_theme_lang_bck']);
            $_SESSION['user_theme_lang_bck'] = POST_USER_THEME_LANG_BCK;
        }
    }
} else {
    if (isset($_POST['user_theme_lang_bck'])) {
        $_SESSION['error_user_theme_lang_bck'] = 'Lang';
        define("ERROR_POST_USER_THEME_LANG_BCK", $_SESSION['error_user_theme_lang_bck']);
    }
}

//======================================================================
// POST user_timezone_bck
//======================================================================
if (isset($_POST['user_timezone_bck']) && Fxr_lib\Input::getUntaintedInput($_POST['user_timezone_bck'], 'none', '', '', '', '', $code_exception = '', $page_exception = '', '', $cache_input = 0)) {
    if ($cache_input === 1 && !empty($cache_superglobals)) {
        foreach ($cache_superglobals as $input => $array_cache_values) {
            if ($input === 'user_timezone_bck') {
                foreach ($array_cache_values as $cache_value) {
                    if ($_POST['user_timezone_bck'] === $cache_value) {
                        define("POST_USER_TIMEZONE_BCK", $_POST['user_timezone_bck']);
                        $_SESSION['user_timezone_bck'] = POST_USER_TIMEZONE_BCK;
                    }
                }
            }
        }
        if (!defined("POST_USER_TIMEZONE_BCK")) {
            throw new Fxr_lib\Error($_POST['user_timezone_bck'], 3, ERROR_PAGE_BCK);
        }
    } else {
        if ($_POST['user_timezone_bck'] === '') {
            $_SESSION['error_user_timezone_bck'] = 'Timezone';
            define("ERROR_POST_USER_TIMEZONE_BCK", $_SESSION['error_user_timezone_bck']);
        } else {
            define("POST_USER_TIMEZONE_BCK", $_POST['user_timezone_bck']);
            $_SESSION['user_timezone_bck'] = POST_USER_TIMEZONE_BCK;
        }
    }
} else {
    if (isset($_POST['user_timezone_bck'])) {
        $_SESSION['error_user_timezone_bck'] = 'Lang';
        define("ERROR_POST_USER_TIMEZONE_BCK", $_SESSION['error_user_timezone_bck']);
    }
}

//======================================================================
// GET FAIL
//======================================================================
if (isset($_GET['fail']) && Fxr_lib\Input::getUntaintedInput($_GET['fail'], 'none', '', '', '', '', $code_exception = '', $page_exception = '', '', $cache_input = 0)) {
    if ($cache_input === 1 && !empty($cache_superglobals)) {
        foreach ($cache_superglobals as $input => $array_cache_values) {
            if ($input === 'fail') {
                foreach ($array_cache_values as $cache_value) {
                    if ($_GET['fail'] === $cache_value) {
                        define("GET_FAIL", $_GET['fail']);
                    }
                }
            }
        }
        if (!defined("GET_FAIL")) {
            throw new Fxr_lib\Error($_GET['fail'], 3, ERROR_PAGE_BCK);
        }
    } else {
        define("GET_FAIL", 1);
    }
} else {
    if (isset($_GET['fail'])) {
        throw new Fxr_lib\Error($_GET['fail'], 8, ERROR_PAGE_BCK);
    }
}

//======================================================================
// GET MODIFIED_ID
//======================================================================
if (isset($_GET['modified_id']) && Fxr_lib\Input::getUntaintedInput($_GET['modified_id'], 'digit', '', '', '', '', $code_exception = '', $page_exception = '', '', $cache_input = 0)) {
    if ($cache_input === 1 && !empty($cache_superglobals)) {
        foreach ($cache_superglobals as $input => $array_cache_values) {
            if ($input === 'modified_id') {
                foreach ($array_cache_values as $cache_value) {
                    if ($_GET['modified_id'] === $cache_value) {
                        define("GET_MODIFIED_ID", $_GET['modified_id']);
                    }
                }
            }
        }
        if (!defined("GET_MODIFIED_ID")) {
            throw new Fxr_lib\Error($_GET['modified_id'], 3, ERROR_PAGE_BCK);
        }
    } else {
        define("GET_MODIFIED_ID", $_GET['modified_id']);
    }
} else {
    if (isset($_GET['modified_id'])) {
        throw new Fxr_lib\Error($_GET['modified_id'], 8, ERROR_PAGE_BCK);
    }
}

//======================================================================
// GET DELETED_ID
//======================================================================
if (isset($_GET['deleted_id']) && Fxr_lib\Input::getUntaintedInput($_GET['deleted_id'], 'digit', '', '', '', '', $code_exception = '', $page_exception = '', '', $cache_input = 0)) {
    if ($cache_input === 1 && !empty($cache_superglobals)) {
        foreach ($cache_superglobals as $input => $array_cache_values) {
            if ($input === 'deleted_id') {
                foreach ($array_cache_values as $cache_value) {
                    if ($_GET['deleted_id'] === $cache_value) {
                        define("GET_DELETED_ID", $_GET['deleted_id']);
                    }
                }
            }
        }
        if (!defined("GET_DELETED_ID")) {
            throw new Fxr_lib\Error($_GET['deleted_id'], 3, ERROR_PAGE_BCK);
        }
    } else {
        define("GET_DELETED_ID", $_GET['deleted_id']);
    }
} else {
    if (isset($_GET['deleted_id'])) {
        throw new Fxr_lib\Error($_GET['deleted_id'], 8, ERROR_PAGE_BCK);
    }
}

/**
 * add additional superglobal var here
 */  

$cache_superglobals = '';

/**
 * Update cache superglobals settings
 */
if (defined("UPDATE_CACHE_SUPERGLOBALS_SETTINGS_BCK") && UPDATE_CACHE_SUPERGLOBALS_SETTINGS_BCK == 1) {
    Fxr_lib\Cache::updateCacheSuperglobalsSettings();
}
