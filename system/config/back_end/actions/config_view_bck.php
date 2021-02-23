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
* sets actions view
*/ 
$view_files = array(
    '_set_header.view'  => '_all',
    'add_page.view'  => 2,
    'manage_pages.view'=> 3,
    'add_user.view'  => 5,
    'manage_users.view'=> 6
);
