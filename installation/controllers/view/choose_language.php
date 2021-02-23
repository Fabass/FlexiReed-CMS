<?php
if (!defined('FXR_INDEX')) {
    exit('No direct script access allowed');
}
/**
 * Title: FXR Choose Language Controller
 *
 * @author Fabien Assenarre
 * @link http://www.flexireed.org
 * @copyright Copyright &copy; 2020 Fabien Assenarre
 * @license http://opensource.org/licenses/MIT
 *
 */

if (!isset($_SESSION['install_lang']) OR empty($_SESSION['install_lang'])) {
    // set default language
    $_SESSION['install_lang'] = strtolower(trim(INSTALL_DEFAULT_LANGUAGE));
}

// define root URL
$root_url = $_SERVER['PHP_SELF'];
// define full URL
$full_url = str_replace("" . DIRECTORY_SEPARATOR . "installation" . DIRECTORY_SEPARATOR . "index.php", "", $root_url);
define("FULL_URL", $full_url);
