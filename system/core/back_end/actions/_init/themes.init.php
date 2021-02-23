<?php
namespace actions;

use libraries\fxr_lib as Fxr_lib;

if (!defined('FXR_INDEX')) {
    header('HTTP/1.1 403 Forbidden');
    exit('No direct script access allowed');
}
/**
 * Title: FXR Themes Controller (Back-End)
 *
 * @author Fabien Assenarre
 * @link http://www.flexireed.org
 * @copyright Copyright &copy; 2020 Fabien Assenarre
 * @license http://opensource.org/licenses/MIT
 *
 */

//======================================================================
// GET_PAGE_LANG_BCK NOT DEFINED
//======================================================================
if (!defined('GET_PAGE_LANG_BCK') || GET_PAGE_LANG_BCK === '') {
    
    //======================================================================
    // GET_PAGE_ID_BCK NOT defined
    //======================================================================
    if (!defined('GET_PAGE_ID_BCK') || GET_PAGE_ID_BCK === '') {
        
        //-----------------------------------------------------
        // SESSION_PAGE_LANG_BCK NOT defined
        //-----------------------------------------------------
        if (!defined('SESSION_PAGE_LANG_BCK') || SESSION_PAGE_LANG_BCK === '') {
            $_SESSION['page_lang_bck'] = PAGE_LANG_BCK;
            define("THEME_LANG_BCK", PAGE_LANG_BCK);
            /**
             * cache activated
             */
            if (defined('CACHE_THEMES_BCK') && CACHE_THEMES_BCK !== 0) {
                if (isset($cache_themes_default)) {
                    foreach ($cache_themes_default as $input => $array_cache_values) {
                        if ($input === PAGE_LANG_BCK) {
                            foreach ($array_cache_values as $key_value => $cache_value) {
                                if ($key_value === 0) {
                                    define("THEME_FOLDER_BCK", $cache_value);
                                }
                                // public access
                                if ($key_value === 1) {
                                    if (!defined("AUTH_ACCESS_BCK")) {
                                        define("TPL_BCK", $cache_value);
                                    }
                                }
                                // restricted access
                                if ($key_value === 2) {
                                    if (defined("AUTH_ACCESS_BCK")) {
                                        define("TPL_AUTH_BCK", $cache_value);
                                    }
                                }
                            }
                        }
                    }
                }
                $cache_themes_default = '';
                
                if (!defined("THEME_FOLDER_BCK") && !defined("TPL_BCK")) {
                    define("THEME_FOLDER_BCK", Fxr_lib\Database::loadQuery('select', "SELECT setting_theme_folder_bck FROM " . DB_PREFIX . "settings_bck WHERE setting_abbr_lang_bck  = :setting_abbr_lang_bck", '', array(
                        ':setting_abbr_lang_bck' => array(
                            PAGE_LANG_BCK => 's'
                        )
                    )));
                    // restricted access
                    if (defined("AUTH_ACCESS_BCK")) {
                        define("TPL_AUTH_BCK", Fxr_lib\Database::loadQuery('select', "SELECT setting_default_restricted_tpl_bck FROM " . DB_PREFIX . "settings_bck WHERE setting_abbr_lang_bck  = :setting_abbr_lang_bck", '', array(
                            ':setting_abbr_lang_bck' => array(
                                PAGE_LANG_BCK => 's'
                            )
                        )));
                    // public access
                    } else {
                        define("TPL_BCK", Fxr_lib\Database::loadQuery('select', "SELECT setting_default_public_tpl_bck FROM " . DB_PREFIX . "settings_bck WHERE setting_abbr_lang_bck  = :setting_abbr_lang_bck", '', array(
                            ':setting_abbr_lang_bck' => array(
                                PAGE_LANG_BCK => 's'
                            )
                        )));
                    }
                }
            /**
             * cache NOT activated
             */
            } else {
                define("THEME_FOLDER_BCK", Fxr_lib\Database::loadQuery('select', "SELECT setting_theme_folder_bck FROM " . DB_PREFIX . "settings_bck WHERE setting_abbr_lang_bck  = :setting_abbr_lang_bck", '', array(
                    ':setting_abbr_lang_bck' => array(
                        PAGE_LANG_BCK => 's'
                    )
                )));
                // restricted access
                if (defined("AUTH_ACCESS_BCK")) {
                    define("TPL_AUTH_BCK", Fxr_lib\Database::loadQuery('select', "SELECT setting_default_restricted_tpl_bck FROM " . DB_PREFIX . "settings_bck WHERE setting_abbr_lang_bck  = :setting_abbr_lang_bck", '', array(
                        ':setting_abbr_lang_bck' => array(
                            PAGE_LANG_BCK => 's'
                        )
                    )));
                // public access
                } else {
                    define("TPL_BCK", Fxr_lib\Database::loadQuery('select', "SELECT setting_default_public_tpl_bck FROM " . DB_PREFIX . "settings_bck WHERE setting_abbr_lang_bck  = :setting_abbr_lang_bck", '', array(
                        ':setting_abbr_lang_bck' => array(
                            PAGE_LANG_BCK => 's'
                        )
                    )));
                }
            }
        //--------------------------------------------------------
        // SESSION_PAGE_LANG_BCK defined AND equal to default language
        //--------------------------------------------------------
        } elseif (defined('SESSION_PAGE_LANG_BCK') && SESSION_PAGE_LANG_BCK == DEFAULT_LANGUAGE_BCK) {
            $_SESSION['page_lang_bck'] = PAGE_LANG_BCK;
            define("THEME_LANG_BCK", PAGE_LANG_BCK);
            /**
             * cache activated
             */ 
            if (defined('CACHE_THEMES_BCK') && CACHE_THEMES_BCK !==0) {
                if (isset($cache_themes_default)) {
                    foreach ($cache_themes_default as $input => $array_cache_values) {
                        if ($input === PAGE_LANG_BCK) {
                            foreach ($array_cache_values as $key_value => $cache_value) {
                                if ($key_value === 0) {
                                    define("THEME_FOLDER_BCK", $cache_value);
                                }
                                // public access
                                if ($key_value === 1) {
                                    if (!defined("AUTH_ACCESS_BCK")) {
                                        define("TPL_BCK", $cache_value);
                                    }
                                }
                                // restricted access
                                if ($key_value === 2) {
                                    if (defined("AUTH_ACCESS_BCK")) {
                                        define("TPL_AUTH_BCK", $cache_value);
                                    }
                                }
                            }
                        }
                    }
                }
                if (!defined("THEME_FOLDER_BCK") && !defined("TPL_BCK")) {
                    define("THEME_FOLDER_BCK", Fxr_lib\Database::loadQuery('select', "SELECT setting_theme_folder_bck FROM " . DB_PREFIX . "settings_bck WHERE setting_abbr_lang_bck  = :setting_abbr_lang_bck", '', array(
                        ':setting_abbr_lang_bck' => array(
                            PAGE_LANG_BCK => 's'
                        )
                    )));
                    
                    // restricted access
                    if (defined("AUTH_ACCESS_BCK")) {
                        define("TPL_AUTH_BCK", Fxr_lib\Database::loadQuery('select', "SELECT setting_default_restricted_tpl_bck FROM " . DB_PREFIX . "settings_bck WHERE setting_abbr_lang_bck  = :setting_abbr_lang_bck", '', array(
                            ':setting_abbr_lang_bck' => array(
                                PAGE_LANG_BCK => 's'
                            )
                        )));
                        
                    // public access
                    } else {
                        define("TPL_BCK", Fxr_lib\Database::loadQuery('select', "SELECT setting_default_public_tpl_bck FROM " . DB_PREFIX . "settings_bck WHERE setting_abbr_lang_bck  = :setting_abbr_lang_bck", '', array(
                            ':setting_abbr_lang_bck' => array(
                                PAGE_LANG_BCK => 's'
                            )
                        )));
                        
                    }
                }
            } else {
                define("THEME_FOLDER_BCK", Fxr_lib\Database::loadQuery('select', "SELECT setting_theme_folder_bck FROM " . DB_PREFIX . "settings_bck WHERE setting_abbr_lang_bck  = :setting_abbr_lang_bck", '', array(
                    ':setting_abbr_lang_bck' => array(
                        PAGE_LANG_BCK => 's'
                    )
                )));
                
                // restricted access
                if (defined("AUTH_ACCESS_BCK")) {
                    define("TPL_AUTH_BCK", Fxr_lib\Database::loadQuery('select', "SELECT setting_default_restricted_tpl_bck FROM " . DB_PREFIX . "settings_bck WHERE setting_abbr_lang_bck  = :setting_abbr_lang_bck", '', array(
                        ':setting_abbr_lang_bck' => array(
                            PAGE_LANG_BCK => 's'
                        )
                    )));
                    
                // public access
                } else {
                    define("TPL_BCK", Fxr_lib\Database::loadQuery('select', "SELECT setting_default_public_tpl_bck FROM " . DB_PREFIX . "settings_bck WHERE setting_abbr_lang_bck  = :setting_abbr_lang_bck", '', array(
                        ':setting_abbr_lang_bck' => array(
                            PAGE_LANG_BCK => 's'
                        )
                    )));
                    
                }
            }
        //--------------------------------------------------------------
        // SESSION_PAGE_LANG_BCK defined AND different from default language
        //--------------------------------------------------------------
        } else {
            define("THEME_LANG_BCK", SESSION_PAGE_LANG_BCK);
            /**
             * cache activated
             */
            if (defined('CACHE_THEMES_BCK') && CACHE_THEMES_BCK !==0) {
                if (isset($cache_themes_default)) {
                    foreach ($cache_themes_default as $input => $array_cache_values) {
                        if ($input === SESSION_PAGE_LANG_BCK) {
                            foreach ($array_cache_values as $key_value => $cache_value) {
                                if ($key_value === 0) {
                                    define("THEME_FOLDER_BCK", $cache_value);
                                }
                                // public access
                                if ($key_value === 1) {
                                    if (!defined("AUTH_ACCESS_BCK")) {
                                        define("TPL_BCK", $cache_value);
                                    }
                                }
                                // restricted access
                                if ($key_value === 2) {
                                    if (defined("AUTH_ACCESS_BCK")) {
                                        define("TPL_AUTH_BCK", $cache_value);
                                    }
                                }
                            }
                        }
                    }
                }
                $array_cache_values = '';
                if (!defined("THEME_FOLDER_BCK") && !defined("TPL_BCK")) {
                    define("THEME_FOLDER_BCK", Fxr_lib\Database::loadQuery('select', "SELECT setting_theme_folder_bck FROM " . DB_PREFIX . "settings_bck WHERE setting_abbr_lang_bck  = :setting_abbr_lang_bck", '', array(
                        ':setting_abbr_lang_bck' => array(
                            SESSION_PAGE_LANG_BCK => 's'
                        )
                    )));
                    // restricted access
                    if (defined("AUTH_ACCESS_BCK")) {
                        define("TPL_AUTH_BCK", Fxr_lib\Database::loadQuery('select', "SELECT setting_default_restricted_tpl_bck FROM " . DB_PREFIX . "settings_bck WHERE setting_abbr_lang_bck  = :setting_abbr_lang_bck", '', array(
                            ':setting_abbr_lang_bck' => array(
                                SESSION_PAGE_LANG_BCK => 's'
                            )
                        )));
                    // public access
                    } else {
                        define("TPL_BCK", Fxr_lib\Database::loadQuery('select', "SELECT setting_default_public_tpl_bck FROM " . DB_PREFIX . "settings_bck WHERE setting_abbr_lang_bck  = :setting_abbr_lang_bck", '', array(
                            ':setting_abbr_lang_bck' => array(
                                SESSION_PAGE_LANG_BCK => 's'
                            )
                        )));
                    }
                    header('Location: index.php?page_lang=' . SESSION_PAGE_LANG_BCK . '');
                    exit();
                }  
            /**
             * cache NOT activated
             */
            } else {
                define("THEME_FOLDER_BCK", Fxr_lib\Database::loadQuery('select', "SELECT setting_theme_folder_bck FROM " . DB_PREFIX . "settings_bck WHERE setting_abbr_lang_bck  = :setting_abbr_lang_bck", '', array(
                    ':setting_abbr_lang_bck' => array(
                        SESSION_PAGE_LANG_BCK => 's'
                    )
                )));
                // restricted access
                if (defined("AUTH_ACCESS_BCK")) {
                    define("TPL_AUTH_BCK", Fxr_lib\Database::loadQuery('select', "SELECT setting_default_restricted_tpl_bck FROM " . DB_PREFIX . "settings_bck WHERE setting_abbr_lang_bck  = :setting_abbr_lang_bck", '', array(
                        ':setting_abbr_lang_bck' => array(
                            SESSION_PAGE_LANG_BCK => 's'
                        )
                    )));
                // public access    
                } else {
                    define("TPL_BCK", Fxr_lib\Database::loadQuery('select', "SELECT setting_default_public_tpl_bck FROM " . DB_PREFIX . "settings_bck WHERE setting_abbr_lang_bck  = :setting_abbr_lang_bck", '', array(
                        ':setting_abbr_lang_bck' => array(
                            SESSION_PAGE_LANG_BCK => 's'
                        )
                    )));
                }
                header('Location: index.php?page_lang=' . SESSION_PAGE_LANG_BCK . '');
                exit();
            }
        }
    //======================================================================
    // GET_PAGE_ID_BCK defined
    //======================================================================
    } else {
        /**
         * cache activated
         */
        if (defined('CACHE_THEMES_BCK') && CACHE_THEMES_BCK !==0) {
            foreach ($cache_themes_id as $input => $array_cache_values) {
                if ($input == GET_PAGE_ID_BCK) {
                    foreach ($array_cache_values as $key_value => $cache_value) {
                        if ($key_value === 0) {
                            define("THEME_LANG_BCK", $cache_value);
                        }
                        if ($key_value === 1) {
                            define("THEME_FOLDER_BCK", $cache_value);
                        }
                        if ($key_value === 2) {
                            if (defined("AUTH_ACCESS_BCK")) {
                                // restricted access
                                define("TPL_AUTH_BCK", $cache_value);
                            } else {
                                // public access
                                define("TPL_BCK", $cache_value);
                            }
                        }
                    }
                }
            }
            if (!defined("THEME_LANG_BCK") && !defined("THEME_FOLDER_BCK") && !defined("TPL_BCK")) {
                // restricted access
                if (defined("AUTH_ACCESS_BCK")) {
                    if (Fxr_lib\Database::loadQuery('select', "SELECT page_auth_access_bck FROM " . DB_PREFIX . "pages_bck WHERE page_id_bck  = :page_id_bck", '', array(
                        ':page_id_bck' => array(
                            GET_PAGE_ID_BCK => 'i'
                        )
                    )) === AUTH_ACCESS_BCK) {
                        define("THEME_LANG_BCK", Fxr_lib\Database::loadQuery('select', "SELECT  FROM " . DB_PREFIX . "pages_bck WHERE page_id_bck  = :page_id_bck", '', array(
                            ':page_id_bck' => array(
                                GET_PAGE_ID_BCK => 'i'
                            )
                        )));
                        define("THEME_FOLDER_BCK", Fxr_lib\Database::loadQuery('select', "SELECT page_theme_folder_bck FROM " . DB_PREFIX . "pages_bck WHERE page_id_bck  = :page_id_bck", '', array(
                            ':page_id_bck' => array(
                                GET_PAGE_ID_BCK => 'i'
                            )
                        )));
                        define("TPL_AUTH_BCK", Fxr_lib\Database::loadQuery('select', "SELECT page_theme_tpl_bck FROM " . DB_PREFIX . "pages_bck WHERE page_id_bck  = :page_id_bck", '', array(
                            ':page_id_bck' => array(
                                GET_PAGE_ID_BCK => 'i'
                            )
                        )));
                    } else {
                        throw new Fxr_lib\Error(GET_PAGE_ID_BCK, 16, ERROR_PAGE_BCK);
                    }
                // public access
                } else {
                    throw new Fxr_lib\Error(GET_PAGE_ID_BCK, 16, ERROR_PAGE_BCK);
                }
            }
        /**
         * cache NOT activated
         */
        } else {
            // restricted access
            if (defined("AUTH_ACCESS_BCK")) {
                if (Fxr_lib\Database::loadQuery('select', "SELECT page_auth_access_bck FROM " . DB_PREFIX . "pages_bck WHERE page_id_bck  = :page_id_bck", '', array(
                    ':page_id_bck' => array(
                        GET_PAGE_ID_BCK => 'i'
                    )
                )) == AUTH_ACCESS_BCK) {
                    define("THEME_LANG_BCK", Fxr_lib\Database::loadQuery('select', "SELECT page_theme_lang_bck FROM " . DB_PREFIX . "pages_bck WHERE page_id_bck  = :page_id_bck", '', array(
                        ':page_id_bck' => array(
                            GET_PAGE_ID_BCK => 'i'
                        )
                    )));
                    define("THEME_FOLDER_BCK", Fxr_lib\Database::loadQuery('select', "SELECT page_theme_folder_bck FROM " . DB_PREFIX . "pages_bck WHERE page_id_bck  = :page_id_bck", '', array(
                        ':page_id_bck' => array(
                            GET_PAGE_ID_BCK => 'i'
                        )
                    )));
                    define("TPL_AUTH_BCK", Fxr_lib\Database::loadQuery('select', "SELECT page_theme_tpl_bck FROM " . DB_PREFIX . "pages_bck WHERE page_id_bck  = :page_id_bck", '', array(
                        ':page_id_bck' => array(
                            GET_PAGE_ID_BCK => 'i'
                        )
                    )));
                } else {
                    throw new Fxr_lib\Error(GET_PAGE_ID_BCK, 16, ERROR_PAGE_BCK);
                }
            // public access
            } else {
                throw new Fxr_lib\Error(GET_PAGE_ID_BCK, 16, ERROR_PAGE_BCK);
            }
            //--------------------------------------------------------------
            // SESSION_PAGE_LANG_BCK defined
            //--------------------------------------------------------------
            if (defined('SESSION_PAGE_LANG_BCK') && SESSION_PAGE_LANG_BCK !=='') {
                // sets language with corresponding page ID 
                if (SESSION_PAGE_LANG_BCK !== THEME_LANG_BCK && defined(THEME_LANG_BCK)) {
                    header('Location: index.php?page_lang=' . THEME_LANG_BCK . '&page_id=' . GET_PAGE_ID_BCK . '');
                    exit();
                }
            }
        }
    }
//======================================================================
// GET_PAGE_LANG_BCK defined
//======================================================================
} else {
    // checks authorized languages
    include DIR_INDEX_SYSTEM . DS . 'config' . DS . 'back_end' . DS . 'config_lang_bck.php';
    foreach ($languages as $abbr_language => $name_language) {
        $unauthorized_lang = strpos($abbr_language, '/');
        if ($unauthorized_lang === false) {
            if (GET_PAGE_LANG_BCK === strtolower($abbr_language)) {
                if (defined('CHECK_FILE_EXISTS_BCK') && CHECK_FILE_EXISTS_BCK !== 0) {
                    // checks if language folder exists
                    if (!is_dir(DIR_INDEX . 'themes' . DS . 'back_end' . DS . strtolower($abbr_language))) {
                        throw new Fxr_lib\Error('themes' . DS . 'back_end' . DS . strtolower($abbr_language), 2, ERROR_PAGE_BCK);
                    }
                }
                //======================================================================
                // GET_PAGE_ID_BCK NOT defined
                //======================================================================
                if (!defined('GET_PAGE_ID_BCK') OR GET_PAGE_ID_BCK === '') {
                    $_SESSION['page_lang_bck'] = GET_PAGE_LANG_BCK;
                    define("THEME_LANG_BCK", GET_PAGE_LANG_BCK);
                    /**
                     * cache activated
                     */
                    if (defined('CACHE_THEMES_BCK') && CACHE_THEMES_BCK !==0) {
                        if (isset($cache_themes_default)) {
                            foreach ($cache_themes_default as $input => $array_cache_values) {
                                if ($input === GET_PAGE_LANG_BCK) {
                                    foreach ($array_cache_values as $key_value => $cache_value) {
                                        if ($key_value === 0) {
                                            define("THEME_FOLDER_BCK", $cache_value);
                                        }
                                        // public access
                                        if ($key_value === 1) {
                                            if (!defined("AUTH_ACCESS_BCK")) {
                                                define("TPL_BCK", $cache_value);
                                            }
                                        }
                                        // restricted access
                                        if ($key_value === 2) {
                                            if (defined("AUTH_ACCESS_BCK")) {
                                                define("TPL_AUTH_BCK", $cache_value);
                                            }
                                        }
                                    }
                                }
                            }
                        }
                        if (!defined("THEME_FOLDER_BCK") && !defined("TPL_BCK")) {
                            // restricted access
                            if (defined("AUTH_ACCESS_BCK")) {
                                if (Fxr_lib\Database::loadQuery('select', "SELECT setting_default_restricted_tpl_bck FROM " . DB_PREFIX . "settings_bck WHERE setting_abbr_lang_bck  = :setting_abbr_lang_bck", '', array(
                                    ':setting_abbr_lang_bck' => array(
                                        GET_PAGE_LANG_BCK => 's'
                                    )
                                ))) {
                                    define("THEME_FOLDER_BCK", Fxr_lib\Database::loadQuery('select', "SELECT setting_theme_folder_bck FROM " . DB_PREFIX . "settings_bck WHERE setting_abbr_lang_bck  = :setting_abbr_lang_bck", '', array(
                                        ':setting_abbr_lang_bck' => array(
                                            GET_PAGE_LANG_BCK => 's'
                                        )
                                    )));
                                    define("TPL_AUTH_BCK", Fxr_lib\Database::loadQuery('select', "SELECT setting_default_restricted_tpl_bck FROM " . DB_PREFIX . "settings_bck WHERE setting_abbr_lang_bck  = :setting_abbr_lang_bck", '', array(
                                        ':setting_abbr_lang_bck' => array(
                                            GET_PAGE_LANG_BCK => 's'
                                        )
                                    )));
                                } else {
                                    throw new Fxr_lib\Error(GET_PAGE_ID_BCK, 7, ERROR_PAGE_BCK);
                                }
                            // public access
                            } else {
                                if (Fxr_lib\Database::loadQuery('select', "SELECT setting_default_public_tpl_bck FROM " . DB_PREFIX . "settings_bck WHERE setting_abbr_lang_bck  = :setting_abbr_lang_bck", '', array(
                                    ':setting_abbr_lang_bck' => array(
                                        GET_PAGE_LANG_BCK => 's'
                                    )
                                ))) {
                                    define("THEME_FOLDER_BCK", Fxr_lib\Database::loadQuery('select', "SELECT setting_theme_folder_bck FROM " . DB_PREFIX . "settings_bck WHERE setting_abbr_lang_bck  = :setting_abbr_lang_bck", '', array(
                                        ':setting_abbr_lang_bck' => array(
                                            GET_PAGE_LANG_BCK => 's'
                                        )
                                    )));
                                    define("TPL_BCK", Fxr_lib\Database::loadQuery('select', "SELECT setting_default_public_tpl_bck FROM " . DB_PREFIX . "settings_bck WHERE setting_abbr_lang_bck  = :setting_abbr_lang_bck", '', array(
                                        ':setting_abbr_lang_bck' => array(
                                            GET_PAGE_LANG_BCK => 's'
                                        )
                                    )));
                                } else {
                                    throw new Fxr_lib\Error(GET_PAGE_ID_BCK, 7, ERROR_PAGE_BCK);
                                }
                            }
                        }
                    /**
                     * cache NOT activated
                     */
                    } else {
                        // restricted access
                        if (defined("AUTH_ACCESS_BCK")) {
                            if (Fxr_lib\Database::loadQuery('select', "SELECT setting_default_restricted_tpl_bck FROM " . DB_PREFIX . "settings_bck WHERE setting_abbr_lang_bck  = :setting_abbr_lang_bck", '', array(
                                ':setting_abbr_lang_bck' => array(
                                    GET_PAGE_LANG_BCK => 's'
                                )
                            ))) {
                                define("THEME_FOLDER_BCK", Fxr_lib\Database::loadQuery('select', "SELECT setting_theme_folder_bck FROM " . DB_PREFIX . "settings_bck WHERE setting_abbr_lang_bck  = :setting_abbr_lang_bck", '', array(
                                    ':setting_abbr_lang_bck' => array(
                                        GET_PAGE_LANG_BCK => 's'
                                    )
                                )));
                                define("TPL_AUTH_BCK", Fxr_lib\Database::loadQuery('select', "SELECT setting_default_restricted_tpl_bck FROM " . DB_PREFIX . "settings_bck WHERE setting_abbr_lang_bck  = :setting_abbr_lang_bck", '', array(
                                    ':setting_abbr_lang_bck' => array(
                                        GET_PAGE_LANG_BCK => 's'
                                    )
                                )));
                            } else {
                                throw new Fxr_lib\Error(GET_PAGE_ID_BCK, 7, ERROR_PAGE_BCK);
                            }
                        // public access  
                        } else {
                            if (Fxr_lib\Database::loadQuery('select', "SELECT setting_default_public_tpl_bck FROM " . DB_PREFIX . "settings_bck WHERE setting_abbr_lang_bck  = :setting_abbr_lang_bck", '', array(
                                ':setting_abbr_lang_bck' => array(
                                    GET_PAGE_LANG_BCK => 's'
                                )
                            ))) {
                                define("THEME_FOLDER_BCK", Fxr_lib\Database::loadQuery('select', "SELECT setting_theme_folder_bck FROM " . DB_PREFIX . "settings_bck WHERE setting_abbr_lang_bck  = :setting_abbr_lang_bck", '', array(
                                    ':setting_abbr_lang_bck' => array(
                                        GET_PAGE_LANG_BCK => 's'
                                    )
                                )));
                                define("TPL_BCK", Fxr_lib\Database::loadQuery('select', "SELECT setting_default_public_tpl_bck FROM " . DB_PREFIX . "settings_bck WHERE setting_abbr_lang_bck  = :setting_abbr_lang_bck", '', array(
                                    ':setting_abbr_lang_bck' => array(
                                        GET_PAGE_LANG_BCK => 's'
                                    )
                                )));
                            } else {
                                throw new Fxr_lib\Error(GET_PAGE_ID_BCK, 7, ERROR_PAGE_BCK);
                            }
                        }
                    }
                    
                //======================================================================
                // GET_PAGE_ID_BCK defined
                //======================================================================
                } else {
                    /**
                     * cache activated
                     */
                    if (defined('CACHE_THEMES_BCK') && CACHE_THEMES_BCK !==0) {
                        foreach ($cache_themes_id as $input => $array_cache_values) {
                            if ($input == GET_PAGE_ID_BCK) {
                                foreach ($array_cache_values as $key_value => $cache_value) {
                                    if ($key_value === 0) {
                                        define("THEME_LANG_BCK", $cache_value);
                                    }
                                    if ($key_value === 1) {
                                        define("THEME_FOLDER_BCK", $cache_value);
                                    }
                                    if ($key_value === 2) {
                                        if (defined("AUTH_ACCESS_BCK")) {
                                            // restricted access
                                            define("TPL_AUTH_BCK", $cache_value);
                                        } else {
                                            // public access
                                            define("TPL_BCK", $cache_value);
                                        }
                                    }
                                }
                            }
                        }
                        if (!defined("THEME_LANG_BCK") && !defined("THEME_FOLDER_BCK") && !defined("TPL_BCK")) {
                            define("THEME_LANG_BCK", Fxr_lib\Database::loadQuery('select', "SELECT page_theme_lang_bck FROM " . DB_PREFIX . "pages_bck WHERE page_id_bck  = :page_id_bck", '', array(
                                ':page_id_bck' => array(
                                    GET_PAGE_ID_BCK => 'i'
                                )
                            )));
                            define("THEME_FOLDER_BCK", "" . Fxr_lib\Database::loadQuery('select', "SELECT page_theme_folder_bck FROM " . DB_PREFIX . "pages_bck WHERE page_id_bck  = :page_id_bck", '', array(
                                ':page_id_bck' => array(
                                    GET_PAGE_ID_BCK => 'i'
                                )
                            )) . "");
                            // restricted access
                            if (defined("AUTH_ACCESS_BCK")) {
                                if (Fxr_lib\Database::loadQuery('select', "SELECT page_auth_access_bck FROM " . DB_PREFIX . "pages_bck WHERE page_id_bck  = :page_id_bck", '', array(
                                    ':page_id_bck' => array(
                                        GET_PAGE_ID_BCK => 'i'
                                    )
                                )) == AUTH_ACCESS_BCK) {
                                    define("TPL_AUTH_BCK", Fxr_lib\Database::loadQuery('select', "SELECT page_theme_tpl_bck FROM " . DB_PREFIX . "pages_bck WHERE page_id_bck  = :page_id_bck", '', array(
                                        ':page_id_bck' => array(
                                            GET_PAGE_ID_BCK => 'i'
                                        )
                                    )));
                                } else {
                                    throw new Fxr_lib\Error(GET_PAGE_ID_BCK, 16, ERROR_PAGE_BCK);
                                }
                            // public access 
                            } else {
                                throw new Fxr_lib\Error(GET_PAGE_ID_BCK, 16, ERROR_PAGE_BCK);
                            }
                        }
                    /**
                     * cache NOT activated
                     */
                    } else {
                        // page_lang matched with page_id
                        if (Fxr_lib\Database::loadQuery('select', "SELECT page_id_bck FROM " . DB_PREFIX . "pages_bck WHERE page_id_bck  = :page_id_bck AND page_theme_lang_bck  = :page_theme_lang_bck", '', array(
                            ':page_id_bck' => array(
                                GET_PAGE_ID_BCK => 'i'
                            ),
                            ':page_theme_lang_bck' => array(
                                GET_PAGE_LANG_BCK => 's'
                            )
                        ))) {
                            define("THEME_LANG_BCK", Fxr_lib\Database::loadQuery('select', "SELECT page_theme_lang_bck FROM " . DB_PREFIX . "pages_bck WHERE page_id_bck  = :page_id_bck AND page_theme_lang_bck  = :page_theme_lang_bck", '', array(
                                ':page_id_bck' => array(
                                    GET_PAGE_ID_BCK => 'i'
                                ),
                                ':page_theme_lang_bck' => array(
                                    GET_PAGE_LANG_BCK => 's'
                                )
                            )));
                            define("THEME_FOLDER_BCK", "" . Fxr_lib\Database::loadQuery('select', "SELECT page_theme_folder_bck FROM " . DB_PREFIX . "pages_bck WHERE page_id_bck  = :page_id_bck AND page_theme_lang_bck  = :page_theme_lang_bck", '', array(
                                ':page_id_bck' => array(
                                    GET_PAGE_ID_BCK => 'i'
                                ),
                                ':page_theme_lang_bck' => array(
                                    GET_PAGE_LANG_BCK => 's'
                                )
                            )) . "");
                            
                            // restricted access
                            if (defined("AUTH_ACCESS_BCK")) {
                                if (Fxr_lib\Database::loadQuery('select', "SELECT page_auth_access_bck FROM " . DB_PREFIX . "pages_bck WHERE page_id_bck  = :page_id_bck", '', array(
                                    ':page_id_bck' => array(
                                        GET_PAGE_ID_BCK => 'i'
                                    )
                                )) == AUTH_ACCESS_BCK) {
                                    define("TPL_AUTH_BCK", Fxr_lib\Database::loadQuery('select', "SELECT page_theme_tpl_bck FROM " . DB_PREFIX . "pages_bck WHERE page_id_bck  = :page_id_bck", '', array(
                                        ':page_id_bck' => array(
                                            GET_PAGE_ID_BCK => 'i'
                                        )
                                    )));
                                } else {
                                    throw new Fxr_lib\Error(GET_PAGE_ID_BCK, 16, ERROR_PAGE_BCK);
                                }
                                
                            // public access
                            } else {
                                throw new Fxr_lib\Error(GET_PAGE_ID_BCK, 16, ERROR_PAGE_BCK);
                            }
                        }
                        // page_lang NOT matched with page_id
                        if (!Fxr_lib\Database::loadQuery('select', "SELECT page_id_bck FROM " . DB_PREFIX . "pages_bck WHERE page_id_bck  = :page_id_bck AND page_theme_lang_bck  = :page_theme_lang_bck", '', array(
                            ':page_id_bck' => array(
                                GET_PAGE_ID_BCK => 'i'
                            ),
                            ':page_theme_lang_bck' => array(
                                GET_PAGE_LANG_BCK => 's'
                            )
                        ))) {
                            
                            if (Fxr_lib\Database::loadQuery('select', "SELECT page_theme_lang_bck FROM " . DB_PREFIX . "pages_bck WHERE page_id_bck  = :page_id_bck", '', array(
                                ':page_id_bck' => array(
                                    GET_PAGE_ID_BCK => 'i'
                                )
                            ))) {
                                define("THEME_LANG_BCK", Fxr_lib\Database::loadQuery('select', "SELECT page_theme_lang_bck FROM " . DB_PREFIX . "pages_bck WHERE page_id_bck  = :page_id_bck", '', array(
                                    ':page_id_bck' => array(
                                        GET_PAGE_ID_BCK => 'i'
                                    )
                                )));
                                define("THEME_FOLDER_BCK", "" . Fxr_lib\Database::loadQuery('select', "SELECT page_theme_folder_bck FROM " . DB_PREFIX . "pages_bck WHERE page_id_bck  = :page_id_bck", '', array(
                                    ':page_id_bck' => array(
                                        GET_PAGE_ID_BCK => 'i'
                                    )
                                )) . "");
                            } else {
                                throw new Fxr_lib\Error(GET_PAGE_ID_BCK, 7, ERROR_PAGE_BCK);
                            }
                            
                            $get_page_lang_bck  = strtr(GET_PAGE_LANG_BCK, "-", "_");
                            $theme_lang_bck = strtr(THEME_LANG_BCK, "-", "_");
                            
                            if (Fxr_lib\Database::loadQuery('select', "SELECT " . $get_page_lang_bck . " FROM " . DB_PREFIX . "pages_lang_bck WHERE " . $theme_lang_bck . " = " . GET_PAGE_ID_BCK . "", '', '')) {
                                header('Location: index.php?page_lang=' . GET_PAGE_LANG_BCK . '&page_id=' . Fxr_lib\Database::loadQuery('select', "SELECT " . $get_page_lang_bck . " FROM " . DB_PREFIX . "pages_lang_bck WHERE " . $theme_lang_bck . " = :page_id_bck", '', array(
                                    ':page_id_bck' => array(
                                        GET_PAGE_ID_BCK => 'i'
                                    )
                                )) . '');
                                exit();
                            } else {
                                throw new Fxr_lib\Error(GET_PAGE_LANG_BCK . DS . GET_PAGE_ID_BCK, 7, ERROR_PAGE_BCK);
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
if (!defined('THEME_LANG_BCK') && !defined('THEME_FOLDER_BCK') && !defined('TPL_BCK') && !defined('TPL_AUTH_BCK')) {
    define("THEME_LANG_BCK", DEFAULT_LANGUAGE_BCK);
    define("THEME_FOLDER_BCK", DEFAULT_THEME_FOLDER_BCK);
    define("TPL_BCK", DEFAULT_HOME_TPL_BCK);
}
header('Content-language: ' . THEME_LANG_BCK . '');

/**
 * Update Cache themes settings
 */
if (defined("UPDATE_CACHE_THEMES_SETTINGS_BCK") && UPDATE_CACHE_THEMES_SETTINGS_BCK == 1) {
    Fxr_lib\Cache::updateCacheThemesSettings();
}
