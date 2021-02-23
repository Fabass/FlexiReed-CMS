<?php
if (!defined('FXR_INDEX')) {
    exit('No direct script access allowed');
}
/**
 * Title: FXR Installation Configuration File 
 *
 * @author Fabien Assenarre
 * @link http://www.flexireed.org
 * @copyright Copyright &copy; 2020 Fabien Assenarre
 * @license http://opensource.org/licenses/MIT
 *
 */

define('INSTALL_FXR_VERSION', '0.5.0');
define('INSTALL_DEFAULT_LANGUAGE', 'en-us');
define('INSTALL_DEFAULT_DATABASE', 'mysql');
define('INSTALL_DEFAULT_DATABASE_DRIVER', 'mysql_pdo');
define('INSTALL_PHP_VERSION_REQUIRED', 7.30);
define('INSTALL_MYSQL_VERSION_REQUIRED', 5.00);
error_reporting(E_ERROR | E_PARSE);