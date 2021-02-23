<?php
if (!defined('FXR_INDEX')) {
    exit('No direct script access allowed');
}
/**
 * Title: FXR Process Controller
 *
 * @author Fabien Assenarre
 * @link http://www.flexireed.org
 * @copyright Copyright &copy; 2020 Fabien Assenarre
 * @license http://opensource.org/licenses/MIT
 *
 */

// include installation config file
require 'installation' . DIRECTORY_SEPARATOR . 'install_config.php';
require 'installation' . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'languages.php';

if (!isset($_SESSION['install_lang']) OR empty($_SESSION['install_lang'])) {
    // set default language
    $_SESSION['install_lang'] = INSTALL_DEFAULT_LANGUAGE;
    
    // if exists set language with browser detected language         
    if (!empty($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
        foreach ($languages as $abbr_language => $name_language) {
            $unauthorized_lang = strpos($abbr_language, '/');
            $detected_lang     = strpos(strtolower(trim($_SERVER['HTTP_ACCEPT_LANGUAGE'])), strtolower(trim($abbr_language)));
            
            if ($unauthorized_lang !== true) {
                if ($detected_lang != false) {
                    if (strtolower(trim($abbr_language)) != strtolower(trim(INSTALL_DEFAULT_LANGUAGE))) {
                        $_SESSION['install_lang'] = $abbr_language;
                    }
                }
            }
        }
    }
}

// load i18n file 
if (!file_exists('installation' . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'i18n' . DIRECTORY_SEPARATOR . '' . $_SESSION['install_lang'] . '.php')) {
    $_SESSION['install_lang'] = INSTALL_DEFAULT_LANGUAGE;
    require 'installation' . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'i18n' . DIRECTORY_SEPARATOR . '' . INSTALL_DEFAULT_LANGUAGE . '.php';
    require 'installation' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'process.tpl.php';
} else {
    require 'installation' . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'i18n' . DIRECTORY_SEPARATOR . '' . $_SESSION['install_lang'] . '.php';
    require 'installation' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'process.tpl.php';
}
