<?php
if (!defined('FXR_INDEX')) {
    exit('No direct script access allowed');
}
/**
 * Title: FXR Database Controller
 *
 * @author Fabien Assenarre
 * @link http://www.flexireed.org
 * @copyright Copyright &copy; 2020 Fabien Assenarre
 * @license http://opensource.org/licenses/MIT
 *
 */

if (!empty($_POST['agreement'])) {
    if ($_POST['agreement'] != 'OK') {
        $_SESSION['license']     = false;
        $_SESSION['error']       = ERROR_LICENSE;
        $_SESSION['redirection'] = 'license';
        header('Location: index.php?view=license');
        exit();
    } else {
        $_SESSION['license'] = true;
    }
} else {
    if ($_SESSION['license'] !== true) {
        $_SESSION['license']     = false;
        $_SESSION['error']       = ERROR_LICENSE;
        $_SESSION['redirection'] = 'license';
        header('Location: index.php?view=license');
        exit();
    }
}

// define database drivers connection
require 'model' . DIRECTORY_SEPARATOR . 'db_drivers.php';
