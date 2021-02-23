<?php
if (!defined('FXR_INDEX')) {
    exit('No direct script access allowed');
}
/**
 * Title: FXR Set Language Installation
 *
 * @author Fabien Assenarre
 * @link http://www.flexireed.org
 * @copyright Copyright &copy; 2020 Fabien Assenarre
 * @license http://opensource.org/licenses/MIT
 *
 */

if (!empty($_POST['choose_lang'])) {
    // if exists set language with user choice
    if (!file_exists('model' . DIRECTORY_SEPARATOR . 'i18n' . DIRECTORY_SEPARATOR . '' . strtolower(trim($_POST['choose_lang'])) . '.php')) {
        if (!isset($_SESSION['install_lang']) OR empty($_SESSION['install_lang'])) {
            $_SESSION['install_lang'] = strtolower(trim(INSTALL_DEFAULT_LANGUAGE));
        } else {
            if (!file_exists('model' . DIRECTORY_SEPARATOR . 'i18n' . DIRECTORY_SEPARATOR . '' . $_SESSION['install_lang'] . '.php')) {
                $_SESSION['install_lang'] = strtolower(trim(INSTALL_DEFAULT_LANGUAGE));
            }
        }
    } else {
        $_SESSION['install_lang'] = strtolower(trim($_POST['choose_lang']));
    }
} else {
    if (!isset($_SESSION['install_lang']) OR empty($_SESSION['install_lang'])) {
        // set default language
        $_SESSION['install_lang'] = strtolower(trim(INSTALL_DEFAULT_LANGUAGE));
        
        // if exists set language with browser detected language
        if (!empty($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
            foreach ($languages as $abbr_language => $name_language) {
                $unauthorized_lang = strpos($abbr_language, '/');
                $detected_lang     = strpos(strtolower(trim($_SERVER['HTTP_ACCEPT_LANGUAGE'])), strtolower(trim($abbr_language)));
                
                if ($unauthorized_lang !== true) {
                    if ($detected_lang != false) {
                        if (strtolower(trim($abbr_language)) != strtolower(trim(INSTALL_DEFAULT_LANGUAGE))) {
                            $_SESSION['install_lang'] = strtolower(trim($abbr_language));
                        }
                    }
                }
            }
        }
    }
}

// load i18n file 
if (!file_exists('model' . DIRECTORY_SEPARATOR . 'i18n' . DIRECTORY_SEPARATOR . '' . strtolower(trim($_SESSION['install_lang'])) . '.php')) {
    $_SESSION['install_lang'] = strtolower(trim(INSTALL_DEFAULT_LANGUAGE));
    require 'model' . DIRECTORY_SEPARATOR . 'i18n' . DIRECTORY_SEPARATOR . '' . strtolower(trim(INSTALL_DEFAULT_LANGUAGE)) . '.php';
} else {
    require 'model' . DIRECTORY_SEPARATOR . 'i18n' . DIRECTORY_SEPARATOR . '' . strtolower(trim($_SESSION['install_lang'])) . '.php';
}
