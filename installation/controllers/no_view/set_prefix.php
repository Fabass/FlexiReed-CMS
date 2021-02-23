<?php
if (!defined('FXR_INDEX')) {
    exit('No direct script access allowed');
}
/**
 * Title: FXR Set Query Prefix
 *
 * @author Fabien Assenarre
 * @link http://www.flexireed.org
 * @copyright Copyright &copy; 2020 Fabien Assenarre
 * @license http://opensource.org/licenses/MIT
 *
 */

if (!isset($_SESSION['sql_prefix']) OR empty($_SESSION['sql_prefix'])) {
    define('PREFIX_QUERY', 'fxr_');
} else {
    define('PREFIX_QUERY', $_SESSION['sql_prefix']);
}
