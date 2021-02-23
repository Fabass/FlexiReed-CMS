<?php
if (!defined('FXR_INDEX')) {
    exit('No direct script access allowed');
}
/**
 * Title: FXR License Controller
 *
 * @author Fabien Assenarre
 * @link http://www.flexireed.org
 * @copyright Copyright &copy; 2020 Fabien Assenarre
 * @license http://opensource.org/licenses/MIT
 *
 */

if (isset($_SESSION['license']) OR !empty($_SESSION['license'])) {
    $_SESSION['license'] = false;
}

if (version_compare(PHP_VERSION, INSTALL_PHP_VERSION_REQUIRED, '<')) {
    $session_errors[] = ERROR_PHP;
    header('Location: index.php?view=requirements');
    exit();
}
