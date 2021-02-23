<?php
namespace libraries\fxr_lib;

use libraries\fxr_lib as Fxr_lib;

if (!defined('FXR_INDEX')) {
    header('HTTP/1.1 403 Forbidden');
    exit('No direct script access allowed');
}
/**
 * Title: FXR Authentication Class (Back-End) 
 *
 * @author Fabien Assenarre
 * @link http://www.flexireed.org
 * @copyright Copyright &copy; 2020 Fabien Assenarre
 * @license http://opensource.org/licenses/MIT
 *
 */

class Authentication
{
    private $post_login;
    private $post_password;
    private $session_lang;
    private $session_login;
    private $session_password;
    private $sql_post;
    private $sql_session;
    
    /**
     * Checks POST vars
     *
     * @access    public
     * @param     string $post_login "POST login"
     * @param     string $post_password "POST password"
     * @param     string $session_login "SESSION login"
     * @param     string $session_password "SESSION password"
     * @param     string $sql_post "SQL POST"
     * @return    void
     */
    public static function check_post($post_login, $post_password, $session_login, $session_password, $sql_post)
    {
        if (Fxr_lib\Database::loadQuery('select', $sql_post, '', '')) {
            $_SESSION['post_login']    = $post_login;
            $_SESSION['post_password'] = hash('sha512', SALT_BCK . $post_password);
            $_SESSION['last_activity'] = time();
        } else {
            throw new Fxr_lib\Error('', 13, 'auth_login');
        }
    }
    
    /**
     * Checks SESSION vars
     *
     * @access    public
     * @param     string $sql_session "SQL SESSION"
     * @return    void
     */
    public static function check_session($sql_session)
    {        
        if (Fxr_lib\Database::loadQuery('select', $sql_session, '', '')) {
            if (isset($_SESSION['last_activity']) && ($_SERVER['REQUEST_TIME'] - $_SESSION['last_activity'] > RENEW_SESSION_TIME_BCK)) {
                // session expired
                $_SESSION['post_login']    = '';
                $_SESSION['post_password'] = '';
                session_unset();
                session_destroy();
                throw new Fxr_lib\Error('', 14, 'auth_login');
            } else {
                $_SESSION['last_activity'] = time();
            }
            // session ended
            if (isset($_GET['logout'])) {
                $_SESSION['post_login']    = '';
                $_SESSION['post_password'] = '';
                isset($_SESSION['page_lang_bck']) ? $session_lang = $_SESSION['page_lang_bck'] : $session_lang = '';
                session_unset();
                session_destroy();
                if (isset($session_lang) && ($session_lang != DEFAULT_LANGUAGE_BCK)) {
                    header('Location: ' . $_SERVER['PHP_SELF'] . '?page_lang=' . $session_lang . '');
                } else {
                    header('Location: ' . $_SERVER['PHP_SELF'] . '');
                }
                exit();
            }
        } else {
            throw new Fxr_lib\Error('', 13, 'auth_login');
        }
    }
}
