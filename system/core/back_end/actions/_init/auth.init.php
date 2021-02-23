<?php
namespace actions;

use libraries\fxr_lib as Fxr_lib;

if (!defined('FXR_INDEX')) {
    header('HTTP/1.1 403 Forbidden');
    exit('No direct script access allowed');
}
/**
 * Title: FXR Authentication Controller (Back-End)
 *
 * @author Fabien Assenarre
 * @link http://www.flexireed.org
 * @copyright Copyright &copy; 2020 Fabien Assenarre
 * @license http://opensource.org/licenses/MIT
 *
 */

//======================================================================
// if $_POST values exists
//======================================================================
if (defined("POST_LOGIN") && POST_LOGIN !== '' && defined("POST_PASSWORD") && POST_PASSWORD !== '') {
    $_SESSION['post_login']    = '';
    $_SESSION['post_password'] = '';
    Fxr_lib\Authentication::check_post(POST_LOGIN, POST_PASSWORD, $_SESSION['post_login'], $_SESSION['post_password'], "SELECT user_login_bck, user_password_bck FROM " . DB_PREFIX . "users_bck WHERE user_login_bck = '" . POST_LOGIN . "' AND user_password_bck = '" . hash('sha512', SALT_BCK . POST_PASSWORD) . "'");
    
    //-----------------------------------------------------
    // access authorized
    //-----------------------------------------------------
    if (!defined("AUTH_ACCESS_BCK")) {
        define("AUTH_ACCESS_BCK", Fxr_lib\Database::loadQuery('select', "SELECT user_level_access_bck FROM " . DB_PREFIX . "users_bck WHERE user_login_bck  =  :user_login_bck AND user_password_bck = :user_password_bck", '', array(
            ':user_login_bck' => array(
                $_SESSION['post_login'] => 's'
            ),
            ':user_password_bck' => array(
                $_SESSION['post_password'] => 's'
            )
        )));
        Fxr_lib\Database::loadQuery('update', "UPDATE " . DB_PREFIX . "users_bck SET user_last_connect_bck = :user_last_connect_bck WHERE user_login_bck  =  :user_login_bck AND user_password_bck = :user_password_bck", '', array(
            ':user_last_connect_bck' => array(
                date("Y-m-d H:i:s", time()) => 's'
            ),
            ':user_login_bck' => array(
                $_SESSION['post_login'] => 's'
            ),
            ':user_password_bck' => array(
                $_SESSION['post_password'] => 's'
            )
        ));
    } else {
        throw new Fxr_lib\Error('', 13, 'auth_login');
    }
}

//======================================================================
// if $_SESSION values exists
//======================================================================
if (isset($_SESSION['post_login']) && $_SESSION['post_login'] !== '' && isset($_SESSION['post_password']) && $_SESSION['post_password'] !== '') {
    Fxr_lib\Authentication::check_session("SELECT user_login_bck, user_password_bck FROM " . DB_PREFIX . "users_bck WHERE user_login_bck = '" . $_SESSION['post_login'] . "' AND user_password_bck = '" . $_SESSION['post_password'] . "'");
    
    //-----------------------------------------------------
    // access authorized
    //-----------------------------------------------------
    if (!defined("AUTH_ACCESS_BCK")) {
        define("AUTH_ACCESS_BCK", Fxr_lib\Database::loadQuery('select', "SELECT user_level_access_bck FROM " . DB_PREFIX . "users_bck WHERE user_login_bck  =  :user_login_bck AND user_password_bck = :user_password_bck", '', array(
            ':user_login_bck' => array(
                $_SESSION['post_login'] => 's'
            ),
            ':user_password_bck' => array(
                $_SESSION['post_password'] => 's'
            )
        )));
    } else {
        if (!defined("POST_LOGIN") || !defined("POST_PASSWORD") || (POST_LOGIN !== $_SESSION['post_login']) || (hash('sha512', SALT_BCK . POST_PASSWORD) !== $_SESSION['post_password'])) {
            throw new Fxr_lib\Error('', 13, 'auth_login');
        }
    }
}
