<?php
if (!defined('FXR_INDEX')) {
    exit('No direct script access allowed');
}
/**
 * Title: FXR Check License Agreement
 *
 * @author Fabien Assenarre
 * @link http://www.flexireed.org
 * @copyright Copyright &copy; 2020 Fabien Assenarre
 * @license http://opensource.org/licenses/MIT
 *
 */

if (GET_VIEW !== 'choose_language' AND GET_VIEW !== 'requirements' AND GET_VIEW !== 'license' AND GET_VIEW !== 'database') {
    if ($_SESSION['license'] !== true) {
        $_SESSION['error']       = ERROR_LICENSE;
        $_SESSION['redirection'] = 'license';
        header('Location: index.php?view=license');
        exit();
    }
}
