<?php
namespace config;

if (!defined('FXR_INDEX')) {
    exit('No direct script access allowed');
}
/**
* Title: FXR Controllers Configuration File (Back End)
*
* @author Fabien Assenarre
* @link http://www.flexireed.org
* @copyright Copyright &copy; 2020 Fabien Assenarre
* @license http://opensource.org/licenses/MIT
*
*/

/*
* sets init actions
*/ 
$init_files = array(
    'superglobals.init',
    'auth.init',
    'themes.init'
);
