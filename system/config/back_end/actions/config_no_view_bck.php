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
* sets actions no view
*/ 
$no_view_files = array(
    'add_page.nview'  => 2,
    'manage_pages.nview'=> 3,
    'add_user.nview'  => 5,
    'manage_users.nview'=> 6
);
