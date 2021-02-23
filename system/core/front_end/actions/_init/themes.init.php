<?php
namespace actions;

use libraries\fxr_lib as Fxr_lib;

if (!defined('FXR_INDEX')) {
    header('HTTP/1.1 403 Forbidden');
    exit('No direct script access allowed');
}
/**
 * Title: FXR Themes Controller (Front-End)
 *
 * @author Fabien Assenarre
 * @link http://www.flexireed.org
 * @copyright Copyright &copy; 2020 Fabien Assenarre
 * @license http://opensource.org/licenses/MIT
 *
 */

//======================================================================
// GET_PAGE_LANG_FRT NOT DEFINED
//======================================================================
if (!defined('GET_PAGE_LANG_FRT') || GET_PAGE_LANG_FRT === '') {
    
    //======================================================================
    // GET_PAGE_ID_FRT NOT defined
    //======================================================================
    if (!defined('GET_PAGE_ID_FRT') || GET_PAGE_ID_FRT === '') {
        
        //-----------------------------------------------------
        // SESSION_PAGE_LANG_FRT NOT defined
        //-----------------------------------------------------
        if (!defined('SESSION_PAGE_LANG_FRT') || SESSION_PAGE_LANG_FRT === '') {
            $_SESSION['page_lang_frt'] = PAGE_LANG_FRT;
            define("THEME_LANG_FRT", PAGE_LANG_FRT);
            /**
             * cache activated
             */
            if (defined('CACHE_THEMES_FRT') && CACHE_THEMES_FRT !== 0) {
                if (isset($cache_themes_default)) {
                    foreach ($cache_themes_default as $input => $array_cache_values) {
                        if ($input === PAGE_LANG_FRT) {
                            foreach ($array_cache_values as $key_value => $cache_value) {
                                if ($key_value === 0) {
                                    define("THEME_FOLDER_FRT", $cache_value);
                                }
                                // public access
                                if ($key_value === 1) {
                                    if (!defined("AUTH_ACCESS_FRT")) {
                                        define("TPL_FRT", $cache_value);
                                    }
                                }
                                // restricted access
                                if ($key_value === 2) {
                                    if (defined("AUTH_ACCESS_FRT")) {
                                        define("TPL_AUTH_FRT", $cache_value);
                                    }
                                }
                            }
                        }
                    }
                }
                $cache_themes_default = '';
                
                if (!defined("THEME_FOLDER_FRT") && !defined("TPL_FRT")) {
                    define("THEME_FOLDER_FRT", Fxr_lib\Database::loadQuery('select', "SELECT setting_theme_folder_frt FROM " . DB_PREFIX . "settings_frt WHERE setting_abbr_lang_frt  = :setting_abbr_lang_frt", '', array(
                        ':setting_abbr_lang_frt' => array(
                            PAGE_LANG_FRT => 's'
                        )
                    )));
                    // restricted access
                    if (defined("AUTH_ACCESS_FRT")) {
                        define("TPL_AUTH_FRT", Fxr_lib\Database::loadQuery('select', "SELECT setting_default_restricted_tpl_frt FROM " . DB_PREFIX . "settings_frt WHERE setting_abbr_lang_frt  = :setting_abbr_lang_frt", '', array(
                            ':setting_abbr_lang_frt' => array(
                                PAGE_LANG_FRT => 's'
                            )
                        )));
                    // public access
                    } else {
                        define("TPL_FRT", Fxr_lib\Database::loadQuery('select', "SELECT setting_default_public_tpl_frt FROM " . DB_PREFIX . "settings_frt WHERE setting_abbr_lang_frt  = :setting_abbr_lang_frt", '', array(
                            ':setting_abbr_lang_frt' => array(
                                PAGE_LANG_FRT => 's'
                            )
                        )));
                    }
                }
            /**
             * cache NOT activated
             */
            } else {
                define("THEME_FOLDER_FRT", Fxr_lib\Database::loadQuery('select', "SELECT setting_theme_folder_frt FROM " . DB_PREFIX . "settings_frt WHERE setting_abbr_lang_frt  = :setting_abbr_lang_frt", '', array(
                    ':setting_abbr_lang_frt' => array(
                        PAGE_LANG_FRT => 's'
                    )
                )));
                // restricted access
                if (defined("AUTH_ACCESS_FRT")) {
                    define("TPL_AUTH_FRT", Fxr_lib\Database::loadQuery('select', "SELECT setting_default_restricted_tpl_frt FROM " . DB_PREFIX . "settings_frt WHERE setting_abbr_lang_frt  = :setting_abbr_lang_frt", '', array(
                        ':setting_abbr_lang_frt' => array(
                            PAGE_LANG_FRT => 's'
                        )
                    )));
                // public access
                } else {
                    define("TPL_FRT", Fxr_lib\Database::loadQuery('select', "SELECT setting_default_public_tpl_frt FROM " . DB_PREFIX . "settings_frt WHERE setting_abbr_lang_frt  = :setting_abbr_lang_frt", '', array(
                        ':setting_abbr_lang_frt' => array(
                            PAGE_LANG_FRT => 's'
                        )
                    )));
                }
            }
        //--------------------------------------------------------
        // SESSION_PAGE_LANG_FRT defined AND equal to default language
        //--------------------------------------------------------
        } elseif (defined('SESSION_PAGE_LANG_FRT') && SESSION_PAGE_LANG_FRT == DEFAULT_LANGUAGE_FRT) {
            $_SESSION['page_lang_frt'] = PAGE_LANG_FRT;
            define("THEME_LANG_FRT", PAGE_LANG_FRT);
            /**
             * cache activated
             */ 
            if (defined('CACHE_THEMES_FRT') && CACHE_THEMES_FRT !==0) {
                if (isset($cache_themes_default)) {
                    foreach ($cache_themes_default as $input => $array_cache_values) {
                        if ($input === PAGE_LANG_FRT) {
                            foreach ($array_cache_values as $key_value => $cache_value) {
                                if ($key_value === 0) {
                                    define("THEME_FOLDER_FRT", $cache_value);
                                }
                                // public access
                                if ($key_value === 1) {
                                    if (!defined("AUTH_ACCESS_FRT")) {
                                        define("TPL_FRT", $cache_value);
                                    }
                                }
                                // restricted access
                                if ($key_value === 2) {
                                    if (defined("AUTH_ACCESS_FRT")) {
                                        define("TPL_AUTH_FRT", $cache_value);
                                    }
                                }
                            }
                        }
                    }
                }
                if (!defined("THEME_FOLDER_FRT") && !defined("TPL_FRT")) {
                    define("THEME_FOLDER_FRT", Fxr_lib\Database::loadQuery('select', "SELECT setting_theme_folder_frt FROM " . DB_PREFIX . "settings_frt WHERE setting_abbr_lang_frt  = :setting_abbr_lang_frt", '', array(
                        ':setting_abbr_lang_frt' => array(
                            PAGE_LANG_FRT => 's'
                        )
                    )));
                    
                    // restricted access
                    if (defined("AUTH_ACCESS_FRT")) {
                        define("TPL_AUTH_FRT", Fxr_lib\Database::loadQuery('select', "SELECT setting_default_restricted_tpl_frt FROM " . DB_PREFIX . "settings_frt WHERE setting_abbr_lang_frt  = :setting_abbr_lang_frt", '', array(
                            ':setting_abbr_lang_frt' => array(
                                PAGE_LANG_FRT => 's'
                            )
                        )));
                        
                    // public access
                    } else {
                        define("TPL_FRT", Fxr_lib\Database::loadQuery('select', "SELECT setting_default_public_tpl_frt FROM " . DB_PREFIX . "settings_frt WHERE setting_abbr_lang_frt  = :setting_abbr_lang_frt", '', array(
                            ':setting_abbr_lang_frt' => array(
                                PAGE_LANG_FRT => 's'
                            )
                        )));
                        
                    }
                }
            } else {
                define("THEME_FOLDER_FRT", Fxr_lib\Database::loadQuery('select', "SELECT setting_theme_folder_frt FROM " . DB_PREFIX . "settings_frt WHERE setting_abbr_lang_frt  = :setting_abbr_lang_frt", '', array(
                    ':setting_abbr_lang_frt' => array(
                        PAGE_LANG_FRT => 's'
                    )
                )));
                
                // restricted access
                if (defined("AUTH_ACCESS_FRT")) {
                    define("TPL_AUTH_FRT", Fxr_lib\Database::loadQuery('select', "SELECT setting_default_restricted_tpl_frt FROM " . DB_PREFIX . "settings_frt WHERE setting_abbr_lang_frt  = :setting_abbr_lang_frt", '', array(
                        ':setting_abbr_lang_frt' => array(
                            PAGE_LANG_FRT => 's'
                        )
                    )));
                    
                // public access
                } else {
                    define("TPL_FRT", Fxr_lib\Database::loadQuery('select', "SELECT setting_default_public_tpl_frt FROM " . DB_PREFIX . "settings_frt WHERE setting_abbr_lang_frt  = :setting_abbr_lang_frt", '', array(
                        ':setting_abbr_lang_frt' => array(
                            PAGE_LANG_FRT => 's'
                        )
                    )));
                    
                }
            }
        //--------------------------------------------------------------
        // SESSION_PAGE_LANG_FRT defined AND different from default language
        //--------------------------------------------------------------
        } else {
            define("THEME_LANG_FRT", SESSION_PAGE_LANG_FRT);
            /**
             * cache activated
             */
            if (defined('CACHE_THEMES_FRT') && CACHE_THEMES_FRT !==0) {
                if (isset($cache_themes_default)) {
                    foreach ($cache_themes_default as $input => $array_cache_values) {
                        if ($input === SESSION_PAGE_LANG_FRT) {
                            foreach ($array_cache_values as $key_value => $cache_value) {
                                if ($key_value === 0) {
                                    define("THEME_FOLDER_FRT", $cache_value);
                                }
                                // public access
                                if ($key_value === 1) {
                                    if (!defined("AUTH_ACCESS_FRT")) {
                                        define("TPL_FRT", $cache_value);
                                    }
                                }
                                // restricted access
                                if ($key_value === 2) {
                                    if (defined("AUTH_ACCESS_FRT")) {
                                        define("TPL_AUTH_FRT", $cache_value);
                                    }
                                }
                            }
                        }
                    }
                }
                $array_cache_values = '';
                if (!defined("THEME_FOLDER_FRT") && !defined("TPL_FRT")) {
                    define("THEME_FOLDER_FRT", Fxr_lib\Database::loadQuery('select', "SELECT setting_theme_folder_frt FROM " . DB_PREFIX . "settings_frt WHERE setting_abbr_lang_frt  = :setting_abbr_lang_frt", '', array(
                        ':setting_abbr_lang_frt' => array(
                            SESSION_PAGE_LANG_FRT => 's'
                        )
                    )));
                    // restricted access
                    if (defined("AUTH_ACCESS_FRT")) {
                        define("TPL_AUTH_FRT", Fxr_lib\Database::loadQuery('select', "SELECT setting_default_restricted_tpl_frt FROM " . DB_PREFIX . "settings_frt WHERE setting_abbr_lang_frt  = :setting_abbr_lang_frt", '', array(
                            ':setting_abbr_lang_frt' => array(
                                SESSION_PAGE_LANG_FRT => 's'
                            )
                        )));
                    // public access
                    } else {
                        define("TPL_FRT", Fxr_lib\Database::loadQuery('select', "SELECT setting_default_public_tpl_frt FROM " . DB_PREFIX . "settings_frt WHERE setting_abbr_lang_frt  = :setting_abbr_lang_frt", '', array(
                            ':setting_abbr_lang_frt' => array(
                                SESSION_PAGE_LANG_FRT => 's'
                            )
                        )));
                    }
                    header('Location: index.php?page_lang=' . SESSION_PAGE_LANG_FRT . '');
                    exit();
                }  
            /**
             * cache NOT activated
             */
            } else {
                define("THEME_FOLDER_FRT", Fxr_lib\Database::loadQuery('select', "SELECT setting_theme_folder_frt FROM " . DB_PREFIX . "settings_frt WHERE setting_abbr_lang_frt  = :setting_abbr_lang_frt", '', array(
                    ':setting_abbr_lang_frt' => array(
                        SESSION_PAGE_LANG_FRT => 's'
                    )
                )));
                // restricted access
                if (defined("AUTH_ACCESS_FRT")) {
                    define("TPL_AUTH_FRT", Fxr_lib\Database::loadQuery('select', "SELECT setting_default_restricted_tpl_frt FROM " . DB_PREFIX . "settings_frt WHERE setting_abbr_lang_frt  = :setting_abbr_lang_frt", '', array(
                        ':setting_abbr_lang_frt' => array(
                            SESSION_PAGE_LANG_FRT => 's'
                        )
                    )));
                // public access    
                } else {
                    define("TPL_FRT", Fxr_lib\Database::loadQuery('select', "SELECT setting_default_public_tpl_frt FROM " . DB_PREFIX . "settings_frt WHERE setting_abbr_lang_frt  = :setting_abbr_lang_frt", '', array(
                        ':setting_abbr_lang_frt' => array(
                            SESSION_PAGE_LANG_FRT => 's'
                        )
                    )));
                }
                header('Location: index.php?page_lang=' . SESSION_PAGE_LANG_FRT . '');
                exit();
            }
        }
    //======================================================================
    // GET_PAGE_ID_FRT defined
    //======================================================================
    } else {
        /**
         * cache activated
         */
        if (defined('CACHE_THEMES_FRT') && CACHE_THEMES_FRT !==0) {
            foreach ($cache_themes_id as $input => $array_cache_values) {
                if ($input == GET_PAGE_ID_FRT) {
                    foreach ($array_cache_values as $key_value => $cache_value) {
                        if ($key_value === 0) {
                            define("THEME_LANG_FRT", $cache_value);
                        }
                        if ($key_value === 1) {
                            define("THEME_FOLDER_FRT", $cache_value);
                        }
                        if ($key_value === 2) {
                            if (defined("AUTH_ACCESS_FRT")) {
                                // restricted access
                                define("TPL_AUTH_FRT", $cache_value);
                            } else {
                                // public access
                                define("TPL_FRT", $cache_value);
                            }
                        }
                    }
                }
            }
            if (!defined("THEME_LANG_FRT") && !defined("THEME_FOLDER_FRT") && !defined("TPL_FRT")) {
                // restricted access
                if (defined("AUTH_ACCESS_FRT")) {
                    if (Fxr_lib\Database::loadQuery('select', "SELECT page_auth_access_frt FROM " . DB_PREFIX . "pages_frt WHERE page_id_frt  = :page_id_frt", '', array(
                        ':page_id_frt' => array(
                            GET_PAGE_ID_FRT => 'i'
                        )
                    )) === AUTH_ACCESS_FRT) {
                        define("THEME_LANG_FRT", Fxr_lib\Database::loadQuery('select', "SELECT  FROM " . DB_PREFIX . "pages_frt WHERE page_id_frt  = :page_id_frt", '', array(
                            ':page_id_frt' => array(
                                GET_PAGE_ID_FRT => 'i'
                            )
                        )));
                        define("THEME_FOLDER_FRT", Fxr_lib\Database::loadQuery('select', "SELECT page_theme_folder_frt FROM " . DB_PREFIX . "pages_frt WHERE page_id_frt  = :page_id_frt", '', array(
                            ':page_id_frt' => array(
                                GET_PAGE_ID_FRT => 'i'
                            )
                        )));
                        define("TPL_AUTH_FRT", Fxr_lib\Database::loadQuery('select', "SELECT page_theme_tpl_frt FROM " . DB_PREFIX . "pages_frt WHERE page_id_frt  = :page_id_frt", '', array(
                            ':page_id_frt' => array(
                                GET_PAGE_ID_FRT => 'i'
                            )
                        )));
                    } else {
                        throw new Fxr_lib\Error(GET_PAGE_ID_FRT, 16, ERROR_PAGE_FRT);
                    }
                // public access
                } else {
                    throw new Fxr_lib\Error(GET_PAGE_ID_FRT, 16, ERROR_PAGE_FRT);
                }
            }
        /**
         * cache NOT activated
         */
        } else {
            // restricted access
            if (defined("AUTH_ACCESS_FRT")) {
                if (Fxr_lib\Database::loadQuery('select', "SELECT page_auth_access_frt FROM " . DB_PREFIX . "pages_frt WHERE page_id_frt  = :page_id_frt", '', array(
                    ':page_id_frt' => array(
                        GET_PAGE_ID_FRT => 'i'
                    )
                )) == AUTH_ACCESS_FRT) {
                    define("THEME_LANG_FRT", Fxr_lib\Database::loadQuery('select', "SELECT page_theme_lang_frt FROM " . DB_PREFIX . "pages_frt WHERE page_id_frt  = :page_id_frt", '', array(
                        ':page_id_frt' => array(
                            GET_PAGE_ID_FRT => 'i'
                        )
                    )));
                    define("THEME_FOLDER_FRT", Fxr_lib\Database::loadQuery('select', "SELECT page_theme_folder_frt FROM " . DB_PREFIX . "pages_frt WHERE page_id_frt  = :page_id_frt", '', array(
                        ':page_id_frt' => array(
                            GET_PAGE_ID_FRT => 'i'
                        )
                    )));
                    define("TPL_AUTH_FRT", Fxr_lib\Database::loadQuery('select', "SELECT page_theme_tpl_frt FROM " . DB_PREFIX . "pages_frt WHERE page_id_frt  = :page_id_frt", '', array(
                        ':page_id_frt' => array(
                            GET_PAGE_ID_FRT => 'i'
                        )
                    )));
                } else {
                    throw new Fxr_lib\Error(GET_PAGE_ID_FRT, 16, ERROR_PAGE_FRT);
                }
            // public access
            } else {
                if (Fxr_lib\Database::loadQuery('select', "SELECT page_auth_access_frt FROM " . DB_PREFIX . "pages_frt WHERE page_id_frt  = :page_id_frt", '', array(
                    ':page_id_frt' => array(
                        GET_PAGE_ID_FRT => 'i'
                    )
                )) == 0) {
                    define("THEME_LANG_FRT", Fxr_lib\Database::loadQuery('select', "SELECT page_theme_lang_frt FROM " . DB_PREFIX . "pages_frt WHERE page_id_frt  = :page_id_frt", '', array(
                        ':page_id_frt' => array(
                            GET_PAGE_ID_FRT => 'i'
                        )
                    )));
                    define("THEME_FOLDER_FRT", Fxr_lib\Database::loadQuery('select', "SELECT page_theme_folder_frt FROM " . DB_PREFIX . "pages_frt WHERE page_id_frt  = :page_id_frt", '', array(
                        ':page_id_frt' => array(
                            GET_PAGE_ID_FRT => 'i'
                        )
                    )));
                    define("TPL_FRT", Fxr_lib\Database::loadQuery('select', "SELECT page_theme_tpl_frt FROM " . DB_PREFIX . "pages_frt WHERE page_id_frt  = :page_id_frt", '', array(
                        ':page_id_frt' => array(
                            GET_PAGE_ID_FRT => 'i'
                        )
                    )));
                } else {
                    throw new Fxr_lib\Error(GET_PAGE_ID_FRT, 7, ERROR_PAGE_FRT);
                }
            }
            //--------------------------------------------------------------
            // SESSION_PAGE_LANG_FRT defined
            //--------------------------------------------------------------
            if (defined('SESSION_PAGE_LANG_FRT') && SESSION_PAGE_LANG_FRT !=='') {
                // sets language with corresponding page ID 
                if (SESSION_PAGE_LANG_FRT !== THEME_LANG_FRT && defined(THEME_LANG_FRT)) {
                    header('Location: index.php?page_lang=' . THEME_LANG_FRT . '&page_id=' . GET_PAGE_ID_FRT . '');
                    exit();
                }
            }
        }
    }
//======================================================================
// GET_PAGE_LANG_FRT defined
//======================================================================
} else {
    // checks authorized languages
    include DIR_INDEX_SYSTEM . DS . 'config' . DS . 'front_end' . DS . 'config_lang_frt.php';
    foreach ($languages as $abbr_language => $name_language) {
        $unauthorized_lang = strpos($abbr_language, '/');
        if ($unauthorized_lang === false) {
            if (GET_PAGE_LANG_FRT === strtolower($abbr_language)) {
                if (defined('CHECK_FILE_EXISTS_FRT') && CHECK_FILE_EXISTS_FRT !== 0) {
                    // checks if language folder exists
                    if (!is_dir(DIR_INDEX . 'themes' . DS . 'front_end' . DS . strtolower($abbr_language))) {
                        throw new Fxr_lib\Error('themes' . DS . 'front_end' . DS . strtolower($abbr_language), 2, ERROR_PAGE_FRT);
                    }
                }
                //======================================================================
                // GET_PAGE_ID_FRT NOT defined
                //======================================================================
                if (!defined('GET_PAGE_ID_FRT') OR GET_PAGE_ID_FRT === '') {
                    $_SESSION['page_lang_frt'] = GET_PAGE_LANG_FRT;
                    define("THEME_LANG_FRT", GET_PAGE_LANG_FRT);
                    /**
                     * cache activated
                     */
                    if (defined('CACHE_THEMES_FRT') && CACHE_THEMES_FRT !==0) {
                        if (isset($cache_themes_default)) {
                            foreach ($cache_themes_default as $input => $array_cache_values) {
                                if ($input === GET_PAGE_LANG_FRT) {
                                    foreach ($array_cache_values as $key_value => $cache_value) {
                                        if ($key_value === 0) {
                                            define("THEME_FOLDER_FRT", $cache_value);
                                        }
                                        // public access
                                        if ($key_value === 1) {
                                            if (!defined("AUTH_ACCESS_FRT")) {
                                                define("TPL_FRT", $cache_value);
                                            }
                                        }
                                        // restricted access
                                        if ($key_value === 2) {
                                            if (defined("AUTH_ACCESS_FRT")) {
                                                define("TPL_AUTH_FRT", $cache_value);
                                            }
                                        }
                                    }
                                }
                            }
                        }
                        if (!defined("THEME_FOLDER_FRT") && !defined("TPL_FRT")) {
                            // restricted access
                            if (defined("AUTH_ACCESS_FRT")) {
                                if (Fxr_lib\Database::loadQuery('select', "SELECT setting_default_restricted_tpl_frt FROM " . DB_PREFIX . "settings_frt WHERE setting_abbr_lang_frt  = :setting_abbr_lang_frt", '', array(
                                    ':setting_abbr_lang_frt' => array(
                                        GET_PAGE_LANG_FRT => 's'
                                    )
                                ))) {
                                    define("THEME_FOLDER_FRT", Fxr_lib\Database::loadQuery('select', "SELECT setting_theme_folder_frt FROM " . DB_PREFIX . "settings_frt WHERE setting_abbr_lang_frt  = :setting_abbr_lang_frt", '', array(
                                        ':setting_abbr_lang_frt' => array(
                                            GET_PAGE_LANG_FRT => 's'
                                        )
                                    )));
                                    define("TPL_AUTH_FRT", Fxr_lib\Database::loadQuery('select', "SELECT setting_default_restricted_tpl_frt FROM " . DB_PREFIX . "settings_frt WHERE setting_abbr_lang_frt  = :setting_abbr_lang_frt", '', array(
                                        ':setting_abbr_lang_frt' => array(
                                            GET_PAGE_LANG_FRT => 's'
                                        )
                                    )));
                                } else {
                                    throw new Fxr_lib\Error(GET_PAGE_ID_FRT, 7, ERROR_PAGE_FRT);
                                }
                            // public access
                            } else {
                                if (Fxr_lib\Database::loadQuery('select', "SELECT setting_default_public_tpl_frt FROM " . DB_PREFIX . "settings_frt WHERE setting_abbr_lang_frt  = :setting_abbr_lang_frt", '', array(
                                    ':setting_abbr_lang_frt' => array(
                                        GET_PAGE_LANG_FRT => 's'
                                    )
                                ))) {
                                    define("THEME_FOLDER_FRT", Fxr_lib\Database::loadQuery('select', "SELECT setting_theme_folder_frt FROM " . DB_PREFIX . "settings_frt WHERE setting_abbr_lang_frt  = :setting_abbr_lang_frt", '', array(
                                        ':setting_abbr_lang_frt' => array(
                                            GET_PAGE_LANG_FRT => 's'
                                        )
                                    )));
                                    define("TPL_FRT", Fxr_lib\Database::loadQuery('select', "SELECT setting_default_public_tpl_frt FROM " . DB_PREFIX . "settings_frt WHERE setting_abbr_lang_frt  = :setting_abbr_lang_frt", '', array(
                                        ':setting_abbr_lang_frt' => array(
                                            GET_PAGE_LANG_FRT => 's'
                                        )
                                    )));
                                } else {
                                    throw new Fxr_lib\Error(GET_PAGE_ID_FRT, 7, ERROR_PAGE_FRT);
                                }
                            }
                        }
                    /**
                     * cache NOT activated
                     */
                    } else {
                        // restricted access
                        if (defined("AUTH_ACCESS_FRT")) {
                            if (Fxr_lib\Database::loadQuery('select', "SELECT setting_default_restricted_tpl_frt FROM " . DB_PREFIX . "settings_frt WHERE setting_abbr_lang_frt  = :setting_abbr_lang_frt", '', array(
                                ':setting_abbr_lang_frt' => array(
                                    GET_PAGE_LANG_FRT => 's'
                                )
                            ))) {
                                define("THEME_FOLDER_FRT", Fxr_lib\Database::loadQuery('select', "SELECT setting_theme_folder_frt FROM " . DB_PREFIX . "settings_frt WHERE setting_abbr_lang_frt  = :setting_abbr_lang_frt", '', array(
                                    ':setting_abbr_lang_frt' => array(
                                        GET_PAGE_LANG_FRT => 's'
                                    )
                                )));
                                define("TPL_AUTH_FRT", Fxr_lib\Database::loadQuery('select', "SELECT setting_default_restricted_tpl_frt FROM " . DB_PREFIX . "settings_frt WHERE setting_abbr_lang_frt  = :setting_abbr_lang_frt", '', array(
                                    ':setting_abbr_lang_frt' => array(
                                        GET_PAGE_LANG_FRT => 's'
                                    )
                                )));
                            } else {
                                throw new Fxr_lib\Error(GET_PAGE_ID_FRT, 7, ERROR_PAGE_FRT);
                            }
                        // public access  
                        } else {
                            if (Fxr_lib\Database::loadQuery('select', "SELECT setting_default_public_tpl_frt FROM " . DB_PREFIX . "settings_frt WHERE setting_abbr_lang_frt  = :setting_abbr_lang_frt", '', array(
                                ':setting_abbr_lang_frt' => array(
                                    GET_PAGE_LANG_FRT => 's'
                                )
                            ))) {
                                define("THEME_FOLDER_FRT", Fxr_lib\Database::loadQuery('select', "SELECT setting_theme_folder_frt FROM " . DB_PREFIX . "settings_frt WHERE setting_abbr_lang_frt  = :setting_abbr_lang_frt", '', array(
                                    ':setting_abbr_lang_frt' => array(
                                        GET_PAGE_LANG_FRT => 's'
                                    )
                                )));
                                define("TPL_FRT", Fxr_lib\Database::loadQuery('select', "SELECT setting_default_public_tpl_frt FROM " . DB_PREFIX . "settings_frt WHERE setting_abbr_lang_frt  = :setting_abbr_lang_frt", '', array(
                                    ':setting_abbr_lang_frt' => array(
                                        GET_PAGE_LANG_FRT => 's'
                                    )
                                )));
                            } else {
                                throw new Fxr_lib\Error(GET_PAGE_ID_FRT, 7, ERROR_PAGE_FRT);
                            }
                        }
                    }
                    
                //======================================================================
                // GET_PAGE_ID_FRT defined
                //======================================================================
                } else {
                    /**
                     * cache activated
                     */
                    if (defined('CACHE_THEMES_FRT') && CACHE_THEMES_FRT !==0) {
                        foreach ($cache_themes_id as $input => $array_cache_values) {
                            if ($input == GET_PAGE_ID_FRT) {
                                foreach ($array_cache_values as $key_value => $cache_value) {
                                    if ($key_value === 0) {
                                        define("THEME_LANG_FRT", $cache_value);
                                    }
                                    if ($key_value === 1) {
                                        define("THEME_FOLDER_FRT", $cache_value);
                                    }
                                    if ($key_value === 2) {
                                        if (defined("AUTH_ACCESS_FRT")) {
                                            // restricted access
                                            define("TPL_AUTH_FRT", $cache_value);
                                        } else {
                                            // public access
                                            define("TPL_FRT", $cache_value);
                                        }
                                    }
                                }
                            }
                        }
                        if (!defined("THEME_LANG_FRT") && !defined("THEME_FOLDER_FRT") && !defined("TPL_FRT")) {
                            define("THEME_LANG_FRT", Fxr_lib\Database::loadQuery('select', "SELECT page_theme_lang_frt FROM " . DB_PREFIX . "pages_frt WHERE page_id_frt  = :page_id_frt", '', array(
                                ':page_id_frt' => array(
                                    GET_PAGE_ID_FRT => 'i'
                                )
                            )));
                            define("THEME_FOLDER_FRT", "" . Fxr_lib\Database::loadQuery('select', "SELECT page_theme_folder_frt FROM " . DB_PREFIX . "pages_frt WHERE page_id_frt  = :page_id_frt", '', array(
                                ':page_id_frt' => array(
                                    GET_PAGE_ID_FRT => 'i'
                                )
                            )) . "");
                            // restricted access
                            if (defined("AUTH_ACCESS_FRT")) {
                                if (Fxr_lib\Database::loadQuery('select', "SELECT page_auth_access_frt FROM " . DB_PREFIX . "pages_frt WHERE page_id_frt  = :page_id_frt", '', array(
                                    ':page_id_frt' => array(
                                        GET_PAGE_ID_FRT => 'i'
                                    )
                                )) == AUTH_ACCESS_FRT) {
                                    define("TPL_AUTH_FRT", Fxr_lib\Database::loadQuery('select', "SELECT page_theme_tpl_frt FROM " . DB_PREFIX . "pages_frt WHERE page_id_frt  = :page_id_frt", '', array(
                                        ':page_id_frt' => array(
                                            GET_PAGE_ID_FRT => 'i'
                                        )
                                    )));
                                } else {
                                    throw new Fxr_lib\Error(GET_PAGE_ID_FRT, 16, ERROR_PAGE_FRT);
                                }
                            // public access 
                            } else {
                                if (Fxr_lib\Database::loadQuery('select', "SELECT page_auth_access_frt FROM " . DB_PREFIX . "pages_frt WHERE page_id_frt  = :page_id_frt", '', array(
                                    ':page_id_frt' => array(
                                        GET_PAGE_ID_FRT => 'i'
                                    )
                                )) == 0) {
                                    define("TPL_FRT", Fxr_lib\Database::loadQuery('select', "SELECT page_theme_tpl_frt FROM " . DB_PREFIX . "pages_frt WHERE page_id_frt  = :page_id_frt", '', array(
                                        ':page_id_frt' => array(
                                            GET_PAGE_ID_FRT => 'i'
                                        )
                                    )));
                                } else {
                                    throw new Fxr_lib\Error(GET_PAGE_ID_FRT, 7, ERROR_PAGE_FRT);
                                }
                            }
                        }
                    /**
                     * cache NOT activated
                     */
                    } else {
                        // page_lang matched with page_id
                        if (Fxr_lib\Database::loadQuery('select', "SELECT page_id_frt FROM " . DB_PREFIX . "pages_frt WHERE page_id_frt  = :page_id_frt AND page_theme_lang_frt  = :page_theme_lang_frt", '', array(
                            ':page_id_frt' => array(
                                GET_PAGE_ID_FRT => 'i'
                            ),
                            ':page_theme_lang_frt' => array(
                                GET_PAGE_LANG_FRT => 's'
                            )
                        ))) {
                            define("THEME_LANG_FRT", Fxr_lib\Database::loadQuery('select', "SELECT page_theme_lang_frt FROM " . DB_PREFIX . "pages_frt WHERE page_id_frt  = :page_id_frt AND page_theme_lang_frt  = :page_theme_lang_frt", '', array(
                                ':page_id_frt' => array(
                                    GET_PAGE_ID_FRT => 'i'
                                ),
                                ':page_theme_lang_frt' => array(
                                    GET_PAGE_LANG_FRT => 's'
                                )
                            )));
                            define("THEME_FOLDER_FRT", "" . Fxr_lib\Database::loadQuery('select', "SELECT page_theme_folder_frt FROM " . DB_PREFIX . "pages_frt WHERE page_id_frt  = :page_id_frt AND page_theme_lang_frt  = :page_theme_lang_frt", '', array(
                                ':page_id_frt' => array(
                                    GET_PAGE_ID_FRT => 'i'
                                ),
                                ':page_theme_lang_frt' => array(
                                    GET_PAGE_LANG_FRT => 's'
                                )
                            )) . "");
                            
                            // restricted access
                            if (defined("AUTH_ACCESS_FRT")) {
                                if (Fxr_lib\Database::loadQuery('select', "SELECT page_auth_access_frt FROM " . DB_PREFIX . "pages_frt WHERE page_id_frt  = :page_id_frt", '', array(
                                    ':page_id_frt' => array(
                                        GET_PAGE_ID_FRT => 'i'
                                    )
                                )) == AUTH_ACCESS_FRT) {
                                    define("TPL_AUTH_FRT", Fxr_lib\Database::loadQuery('select', "SELECT page_theme_tpl_frt FROM " . DB_PREFIX . "pages_frt WHERE page_id_frt  = :page_id_frt", '', array(
                                        ':page_id_frt' => array(
                                            GET_PAGE_ID_FRT => 'i'
                                        )
                                    )));
                                } else {
                                    throw new Fxr_lib\Error(GET_PAGE_ID_FRT, 16, ERROR_PAGE_FRT);
                                }
                                
                            // public access
                            } else {
                                if (Fxr_lib\Database::loadQuery('select', "SELECT page_auth_access_frt FROM " . DB_PREFIX . "pages_frt WHERE page_id_frt  = :page_id_frt", '', array(
                                    ':page_id_frt' => array(
                                        GET_PAGE_ID_FRT => 'i'
                                    )
                                )) != 1) {
                                    define("TPL_FRT", Fxr_lib\Database::loadQuery('select', "SELECT page_theme_tpl_frt FROM " . DB_PREFIX . "pages_frt WHERE page_id_frt  = :page_id_frt", '', array(
                                        ':page_id_frt' => array(
                                            GET_PAGE_ID_FRT => 'i'
                                        )
                                    )));
                                } else {
                                    throw new Fxr_lib\Error(GET_PAGE_ID_FRT, 7, ERROR_PAGE_FRT);
                                }
                            }
                        }
                        // page_lang NOT matched with page_id
                        if (!Fxr_lib\Database::loadQuery('select', "SELECT page_id_frt FROM " . DB_PREFIX . "pages_frt WHERE page_id_frt  = :page_id_frt AND page_theme_lang_frt  = :page_theme_lang_frt", '', array(
                            ':page_id_frt' => array(
                                GET_PAGE_ID_FRT => 'i'
                            ),
                            ':page_theme_lang_frt' => array(
                                GET_PAGE_LANG_FRT => 's'
                            )
                        ))) {
                            
                            if (Fxr_lib\Database::loadQuery('select', "SELECT page_theme_lang_frt FROM " . DB_PREFIX . "pages_frt WHERE page_id_frt  = :page_id_frt", '', array(
                                ':page_id_frt' => array(
                                    GET_PAGE_ID_FRT => 'i'
                                )
                            ))) {
                                define("THEME_LANG_FRT", Fxr_lib\Database::loadQuery('select', "SELECT page_theme_lang_frt FROM " . DB_PREFIX . "pages_frt WHERE page_id_frt  = :page_id_frt", '', array(
                                    ':page_id_frt' => array(
                                        GET_PAGE_ID_FRT => 'i'
                                    )
                                )));
                                define("THEME_FOLDER_FRT", "" . Fxr_lib\Database::loadQuery('select', "SELECT page_theme_folder_frt FROM " . DB_PREFIX . "pages_frt WHERE page_id_frt  = :page_id_frt", '', array(
                                    ':page_id_frt' => array(
                                        GET_PAGE_ID_FRT => 'i'
                                    )
                                )) . "");
                            } else {
                                throw new Fxr_lib\Error(GET_PAGE_ID_FRT, 7, ERROR_PAGE_FRT);
                            }
                            
                            $get_page_lang_frt  = strtr(GET_PAGE_LANG_FRT, "-", "_");
                            $theme_lang_frt = strtr(THEME_LANG_FRT, "-", "_");
                            
                            if (Fxr_lib\Database::loadQuery('select', "SELECT " . $get_page_lang_frt . " FROM " . DB_PREFIX . "pages_lang_frt WHERE " . $theme_lang_frt . " = " . GET_PAGE_ID_FRT . "", '', '')) {
                                header('Location: index.php?page_lang=' . GET_PAGE_LANG_FRT . '&page_id=' . Fxr_lib\Database::loadQuery('select', "SELECT " . $get_page_lang_frt . " FROM " . DB_PREFIX . "pages_lang_frt WHERE " . $theme_lang_frt . " = :page_id_frt", '', array(
                                    ':page_id_frt' => array(
                                        GET_PAGE_ID_FRT => 'i'
                                    )
                                )) . '');
                                exit();
                            } else {
                                throw new Fxr_lib\Error(GET_PAGE_LANG_FRT . DS . GET_PAGE_ID_FRT, 7, ERROR_PAGE_FRT);
                            }
                        }
                    }
                }
            }
        }
    }
}

/**
 * defines default themes (just in case)
 */
if (!defined('THEME_LANG_FRT') && !defined('THEME_FOLDER_FRT') && !defined('TPL_FRT') && !defined('TPL_AUTH_FRT')) {
    define("THEME_LANG_FRT", DEFAULT_LANGUAGE_FRT);
    define("THEME_FOLDER_FRT", DEFAULT_THEME_FOLDER_FRT);
    define("TPL_FRT", DEFAULT_HOME_TPL_FRT);
}
header('Content-language: ' . THEME_LANG_FRT . '');

/**
 * Update Cache themes settings
 */
if (defined("UPDATE_CACHE_THEMES_SETTINGS_FRT") && UPDATE_CACHE_THEMES_SETTINGS_FRT == 1) {
    Fxr_lib\Cache::updateCacheThemesSettings();
}
