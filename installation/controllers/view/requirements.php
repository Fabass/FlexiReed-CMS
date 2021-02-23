<?php
if (!defined('FXR_INDEX')) {
    exit('No direct script access allowed');
}
/**
 * Title: FXR Requirements Controller
 *
 * @author Fabien Assenarre
 * @link http://www.flexireed.org
 * @copyright Copyright &copy; 2020 Fabien Assenarre
 * @license http://opensource.org/licenses/MIT
 *
 */

if (!empty($_POST['choose_lang'])) {
    if (!file_exists('model' . DIRECTORY_SEPARATOR . 'i18n' . DIRECTORY_SEPARATOR . '' . $_POST['choose_lang'] . '.php')) {
        $_SESSION['error']       = '' . $_POST['choose_lang'] . ERROR_LANGUAGE_NOT_AVAILABLE . '';
        $_SESSION['redirection'] = 'choose_language';
        header('Location: index.php?view=choose_language');
        exit();
    } else {
        $_SESSION['install_lang'] = $_POST['choose_lang'];
    }
}
