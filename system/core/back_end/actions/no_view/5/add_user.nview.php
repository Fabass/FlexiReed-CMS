<?php
namespace actions;

use libraries\fxr_lib as Fxr_lib;
use libraries\add as Add;

if (!defined('FXR_INDEX')) {
    header('HTTP/1.1 403 Forbidden');
    exit('No direct script access allowed');
}
/**
 * Title: FXR Actions No View (Back-End)
 *
 * @author Fabien Assenarre
 * @link http://www.flexireed.org
 * @copyright Copyright &copy; 2020 Fabien Assenarre
 * @license http://opensource.org/licenses/MIT
 *
 */

$actions_no_view['add_user'] = function()
{
    //-----------------------------------------------------
    // restricted access
    //-----------------------------------------------------
    if (defined("AUTH_ACCESS_BCK") && (AUTH_ACCESS_BCK == 1)) {
        $action_lang_auth   = THEME_LANG_BCK;
        $action_folder_auth = THEME_FOLDER_BCK;
        $action_tpl_auth    = '5_add_user';
        
        if ((defined("THEME_LANG_BCK") && isset($action_lang_auth)) && (defined("THEME_FOLDER_BCK") && isset($action_folder_auth)) && (defined("TPL_AUTH_BCK") && isset($action_tpl_auth))) {
            if ((THEME_LANG_BCK == $action_lang_auth || $action_lang_auth == '_all') && (THEME_FOLDER_BCK == $action_folder_auth || $action_folder_auth == '_all') && (TPL_AUTH_BCK == $action_tpl_auth || $action_tpl_auth == '_all')) {
                
                if (isset($_POST['page_submitted']) && $_POST['page_submitted'] !== '') {
                    
                    if (defined("GET_MODIFIED_ID") && GET_MODIFIED_ID !== '') {

                        if (defined("POST_USER_LOGIN_BCK") && defined("POST_USER_NAME_BCK") && defined("POST_USER_EMAIL_BCK") && defined("POST_USER_PASSWORD_BCK") && defined("POST_USER_CONFIRM_PASSWORD_BCK") && defined("POST_USER_THEME_FOLDER_BCK") && defined("POST_USER_LEVEL_ACCESS_BCK") && defined("POST_USER_THEME_LANG_BCK") && defined("POST_USER_TIMEZONE_BCK")) {
                            
                            if (POST_USER_PASSWORD_BCK == POST_USER_CONFIRM_PASSWORD_BCK) {
                                
                                if (GET_MODIFIED_ID == Fxr_lib\Database::loadQuery('select', "SELECT user_id_bck FROM " . DB_PREFIX . "users_bck WHERE user_login_bck = :user_login_bck AND user_password_bck = :user_password_bck", '', array(
                                    ':user_login_bck' => array(
                                        $_SESSION['post_login'] => 's'
                                    ),
                                    ':user_password_bck' => array(
                                        $_SESSION['post_password'] => 's'
                                    )
                                ), '')) {
                                    $user = 'active';
                                }
                                
                                if (!Fxr_lib\Database::loadQuery('update', "UPDATE " . DB_PREFIX . "users_bck SET user_id_bck = :user_id_bck, user_login_bck = :user_login_bck, user_password_bck = :user_password_bck, user_name_bck = :user_name_bck, user_email_bck = :user_email_bck, user_lang_bck = :user_lang_bck, user_timezone_bck = :user_timezone_bck, user_theme_bck = :user_theme_bck, user_create_date_bck = :user_create_date_bck, user_last_connect_bck = :user_last_connect_bck, user_level_access_bck = :user_level_access_bck WHERE user_id_bck = :user_id_bck", '', array(
                                    ':user_id_bck' => array(
                                        GET_MODIFIED_ID => 's'
                                    ),
                                    ':user_login_bck' => array(
                                        POST_USER_LOGIN_BCK => 's'
                                    ),
                                    ':user_password_bck' => array(
                                        hash('sha512', SALT_BCK . POST_USER_PASSWORD_BCK) => 's'
                                    ),
                                    ':user_name_bck' => array(
                                        POST_USER_NAME_BCK => 's'
                                    ),
                                    ':user_email_bck' => array(
                                        POST_USER_EMAIL_BCK => 's'
                                    ),
                                    ':user_lang_bck' => array(
                                        POST_USER_THEME_LANG_BCK => 's'
                                    ),
                                    ':user_timezone_bck' => array(
                                        POST_USER_TIMEZONE_BCK => 's'
                                    ),
                                    ':user_theme_bck' => array(
                                        POST_USER_THEME_FOLDER_BCK => 's'
                                    ),
                                    ':user_create_date_bck' => array(
                                        date("Y-m-d H:i:s", time()) => 's'
                                    ),
                                    ':user_last_connect_bck' => array(
                                        date("Y-m-d H:i:s", time()) => 's'
                                    ),
                                    ':user_level_access_bck' => array(
                                        POST_USER_LEVEL_ACCESS_BCK => 'i'
                                    )
                                ))) {
                                    $_SESSION['modified_page'] = GET_MODIFIED_ID;
                                    
                                    if ($user == 'active') {
                                        $_SESSION['post_login']    = '';
                                        $_SESSION['post_password'] = '';
                                        isset($_SESSION['page_lang_bck']) ? $session_lang = $_SESSION['page_lang_bck'] : $session_lang = '';
                                        session_unset();
                                        session_destroy();
                                        header('Location: index.php?logout&success');
                                        exit();
                                    }
                                    header('Location: index.php?page_id=6&success');
                                    exit();
                                } else {
                                    header('Location: index.php?page_id=5&modified_id=' . GET_MODIFIED_ID . '&fail');
                                    exit();
                                }
                            }
                        } else {
                            header('Location: index.php?page_id=5&modified_id=' . GET_MODIFIED_ID . '&fail');
                            exit();
                        }
                        
                    } else {
                        if (defined("POST_USER_LOGIN_BCK") && defined("POST_USER_NAME_BCK") && defined("POST_USER_EMAIL_BCK") && defined("POST_USER_PASSWORD_BCK") && defined("POST_USER_CONFIRM_PASSWORD_BCK") && defined("POST_USER_THEME_FOLDER_BCK") && defined("POST_USER_LEVEL_ACCESS_BCK") && defined("POST_USER_THEME_LANG_BCK") && defined("POST_USER_TIMEZONE_BCK")) {
                            
                            if (POST_USER_PASSWORD_BCK == POST_USER_CONFIRM_PASSWORD_BCK) {
                                
                                if (!Fxr_lib\Database::loadQuery('insert', "INSERT INTO " . DB_PREFIX . "users_bck (user_id_bck, user_login_bck, user_password_bck, user_name_bck, user_email_bck, user_lang_bck, user_timezone_bck, user_theme_bck, user_create_date_bck, user_last_connect_bck, user_level_access_bck) VALUES (:user_id_bck, :user_login_bck, :user_password_bck, :user_name_bck, :user_email_bck, :user_lang_bck, :user_timezone_bck, :user_theme_bck, :user_create_date_bck, :user_last_connect_bck, :user_level_access_bck)", '', array(
                                    ':user_id_bck' => array(
                                        GET_MODIFIED_ID => 's'
                                    ),
                                    ':user_login_bck' => array(
                                        POST_USER_LOGIN_BCK => 's'
                                    ),
                                    ':user_password_bck' => array(
                                        hash('sha512', SALT_BCK . POST_USER_PASSWORD_BCK) => 's'
                                    ),
                                    ':user_name_bck' => array(
                                        POST_USER_NAME_BCK => 's'
                                    ),
                                    ':user_email_bck' => array(
                                        POST_USER_EMAIL_BCK => 's'
                                    ),
                                    ':user_lang_bck' => array(
                                        POST_USER_THEME_LANG_BCK => 's'
                                    ),
                                    ':user_timezone_bck' => array(
                                        POST_USER_TIMEZONE_BCK => 's'
                                    ),
                                    ':user_theme_bck' => array(
                                        POST_USER_THEME_FOLDER_BCK => 's'
                                    ),
                                    ':user_create_date_bck' => array(
                                        date("Y-m-d H:i:s", time()) => 's'
                                    ),
                                    ':user_last_connect_bck' => array(
                                        date("Y-m-d H:i:s", time()) => 's'
                                    ),
                                    ':user_level_access_bck' => array(
                                        POST_USER_LEVEL_ACCESS_BCK => 'i'
                                    )
                                ))) {
                                    $_SESSION['saved_page'] = 1;
                                    header('Location: index.php?page_id=6&success');
                                    exit();
                                } else {
                                    header('Location: index.php?page_id=5&fail');
                                    exit();
                                }
                                
                            } else {
                                header('Location: index.php?page_id=5&fail');
                                exit();
                            }
                            
                        } else {
                            header('Location: index.php?page_id=5&fail');
                            exit();
                        }
                    }
                }
            }
        }
    }
};
