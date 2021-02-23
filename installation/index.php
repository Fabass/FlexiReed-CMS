<?php
/**
 * Title: FXR Installation Index 
 *
 * @author Fabien Assenarre
 * @link http://www.flexireed.org
 * @copyright Copyright &copy; 2020 Fabien Assenarre
 * @license http://opensource.org/licenses/MIT
 *
 */

header('Expires: Sun, 01 Jan 2014 00:00:00 GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', FALSE);
header('Pragma: no-cache');
session_start();
// necessary to avoid a bug in localhost installation
ob_start();
// define FXR index
define('FXR_INDEX', 1);
// include installation config file
require 'install_config.php';
// include languages settings
require 'model' . DIRECTORY_SEPARATOR . 'languages.php';
// set language installation
require 'controllers' . DIRECTORY_SEPARATOR . 'no_view' . DIRECTORY_SEPARATOR . 'set_lang.php';
// define current view
require 'controllers' . DIRECTORY_SEPARATOR . 'no_view' . DIRECTORY_SEPARATOR . 'get_view.php';
// load head file
require 'controllers' . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'head.php';
// check PHP & MySQL versions
require 'controllers' . DIRECTORY_SEPARATOR . 'no_view' . DIRECTORY_SEPARATOR . 'check_config.php';
// check license agreement
require 'controllers' . DIRECTORY_SEPARATOR . 'no_view' . DIRECTORY_SEPARATOR . 'check_license.php';
// load controllers with view
require 'controllers' . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . GET_VIEW . '.php';
// load current view
require 'views' . DIRECTORY_SEPARATOR . GET_VIEW . '.tpl.php';
// load foot file
require 'views' . DIRECTORY_SEPARATOR . 'foot.tpl.php';
// flush content
ob_end_flush();
?>
