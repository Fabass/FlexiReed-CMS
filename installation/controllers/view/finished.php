<?php
if (!defined('FXR_INDEX')) {
    exit('No direct script access allowed');
}
/**
 * Title: FXR Finished Controller
 *
 * @author Fabien Assenarre
 * @link http://www.flexireed.org
 * @copyright Copyright &copy; 2020 Fabien Assenarre
 * @license http://opensource.org/licenses/MIT
 *
 */

$session_errors = array();

// check user site name	
if (!empty($_POST['site_name'])) {
    $_SESSION['site_name'] = $_POST['site_name'];
} else {
    $_SESSION['site_name'] = '';
    $session_errors[]      = ERROR_SITE_NAME;
}

// check user full name
if (!empty($_POST['full_name'])) {
    if (preg_match("/^[a-zA-Z0-9àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ\s_.-]{1,50}$/", $_POST['full_name'])) {
        $_SESSION['full_name'] = $_POST['full_name'];
    } else {
        $_SESSION['full_name'] = '';
        $session_errors[]      = ERROR_BAD_FULL_NAME;
    }
} else {
    $_SESSION['full_name'] = '';
    $session_errors[]      = ERROR_EMPTY_FULL_NAME;
}

// check user mail
if (!empty($_POST['user_mail'])) {
    if (preg_match("/^([a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4})*$/", $_POST['user_mail'])) {
        $_SESSION['user_mail'] = $_POST['user_mail'];
    } else {
        $_SESSION['user_mail'] = '';
        $session_errors[]      = ERROR_BAD_USER_MAIL;
    }
} else {
    $_SESSION['user_mail'] = '';
    $session_errors[]      = ERROR_EMPTY_USER_MAIL;
}

// check user name
if (!empty($_POST['user_name'])) {
    if (preg_match("/^[a-zA-Z0-9_.-]{4,10}$/", $_POST['user_name'])) {
        $_SESSION['user_name'] = $_POST['user_name'];
    } else {
        $_SESSION['user_name'] = '';
        $session_errors[]      = ERROR_BAD_USER_NAME;
    }
} else {
    $_SESSION['user_name'] = '';
    $session_errors[]      = ERROR_EMPTY_USER_NAME;
}

// check user password	
if (!empty($_POST['user_password'])) {
    if (preg_match("/^(?=^.{6,15}$)((?=.*[0-9])(?=.*[A-Z])(?=.*[a-z]))^.*$/", $_POST['user_password'])) {
        $_SESSION['user_password'] = $_POST['user_password'];
    } else {
        $_SESSION['user_password'] = '';
        $session_errors[]          = ERROR_BAD_USER_PASSWORD;
    }
} else {
    $_SESSION['user_password'] = '';
    $session_errors[]          = ERROR_EMPTY_USER_PASSWORD;
}

// check user confirm password
if (!empty($_POST['user_password_confirm'])) {
    if ($_POST['user_password'] === $_POST['user_password_confirm']) {
        $_SESSION['user_password_confirm'] = $_POST['user_password_confirm'];
    } else {
        $_SESSION['user_password_confirm'] = '';
        $session_errors[]                  = ERROR_BAD_USER_PASSWORD_CONFIRM;
    }
} else {
    $_SESSION['user_password']         = '';
    $_SESSION['user_password_confirm'] = '';
    $session_errors[]                  = ERROR_EMPTY_USER_PASSWORD_CONFIRM;
}

// check server default language
if (!empty($_POST['default_language'])) {
    $_SESSION['default_language'] = strtolower(trim($_POST['default_language']));
} else {
    $_SESSION['default_language'] = '';
    $session_errors[]             = ERROR_DEFAULT_LANGUAGE;
}

// check server default timezone
if (!empty($_POST['default_timezone'])) {
    $_SESSION['default_timezone'] = $_POST['default_timezone'];
} else {
    $_SESSION['default_timezone'] = '';
    $session_errors[]             = ERROR_DEFAULT_TIMEZONE;
}

// load error process
if (!empty($session_errors)) {
    $_SESSION['error']       = $session_errors;
    $_SESSION['redirection'] = 'main_config';
    header('Location: index.php?view=main_config');
    exit();
} else {
    require '.' . DIRECTORY_SEPARATOR . 'controllers' . DIRECTORY_SEPARATOR . 'no_view' . DIRECTORY_SEPARATOR . 'set_prefix.php';
    $timestamp = date('Y-m-d H:i:s', time());
    
    /**
     * Generate random salt
     *
     * @param integer $max default=15
     * @return string
     */
    function generateSalt($max = 15)
    {
        $characters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#%&*?";
        $i          = 0;
        $salt       = "";
        while ($i < $max) {
            $salt .= $characters{mt_rand(0, (strlen($characters) - 1))};
            $i++;
        }
        return $salt;
    }
    define('SALT_FRT', generateSalt());
    define('SALT_BCK', generateSalt());
    
    $_SESSION['salt_frt'] = SALT_FRT;
    $_SESSION['salt_bck'] = SALT_BCK;
    
    $hash_password = hash('sha512', $_SESSION['salt_bck'] . $_SESSION['user_password']);
    
    // load fill tables file
    if (!file_exists('.' . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'fill_tables.php')) {
        exit(ERROR_UNABLE_FIND_FILE . '&nbsp;"fill_tables.php"');
    } else {
        require '.' . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'fill_tables.php';
    }
    
    // MySQL PDO driver connection
    if ($_SESSION['db_driver'] === 'mysql_pdo') {
        $dsn = 'mysql:host=' . $_SESSION['sql_host'] . ';dbname=' . $_SESSION['sql_database'] . '';
        
        try {
            $mysql_pdo = new PDO($dsn, $_SESSION['sql_username'], $_SESSION['sql_password']);
            $mysql_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $fxr_pages_frt    = $mysql_pdo->query($select_fxr_pages_frt);
            $fxr_pages_bck    = $mysql_pdo->query($select_fxr_pages_bck);
            $fxr_settings_frt = $mysql_pdo->query($select_fxr_settings_frt);
            $fxr_settings_bck = $mysql_pdo->query($select_fxr_settings_bck);
            $fxr_users_bck    = $mysql_pdo->query($select_fxr_users_bck);
            
            $fxr_pages_frt->execute();
            $fxr_pages_bck->execute();
            $fxr_settings_frt->execute();
            $fxr_settings_bck->execute();
            $fxr_users_bck->execute();
            
            if ($result = $fxr_pages_frt->fetchAll()) {
                // update fxr_settings table
                $mysql_pdo->query($update_fxr_pages_frt);
            } else {
                // insert in fxr_settings table
                $mysql_pdo->query($insert_fxr_pages_frt);
            }
            
            if ($result = $fxr_pages_bck->fetchAll()) {
                // update fxr_settings table
                $mysql_pdo->query($update_fxr_pages_bck);
                $mysql_pdo->query($update_fxr_pages_bck2);
                $mysql_pdo->query($update_fxr_pages_bck3);
                $mysql_pdo->query($update_fxr_pages_bck4);
                $mysql_pdo->query($update_fxr_pages_bck5);
                $mysql_pdo->query($update_fxr_pages_bck6);
            } else {
                // insert in fxr_settings table
                $mysql_pdo->query($insert_fxr_pages_bck);
            }
            
            if ($result = $fxr_settings_frt->fetchAll()) {
                // update fxr_settings table
                $mysql_pdo->query($update_fxr_settings_frt);
            } else {
                // insert in fxr_settings table
                $mysql_pdo->query($insert_fxr_settings_frt);
            }
            
            if ($result = $fxr_settings_bck->fetchAll()) {
                // update fxr_settings table
                $mysql_pdo->query($update_fxr_settings_bck);
            } else {
                // insert in fxr_settings table
                $mysql_pdo->query($insert_fxr_settings_bck);
            }
            
            if ($result = $fxr_users_bck->fetchAll()) {
                // update fxr_users table
                $mysql_pdo->query($update_fxr_users_bck);
            } else {
                // insert in fxr_users table
                $mysql_pdo->query($insert_fxr_users_bck);
            }
        }
        catch (PDOException $e) {
            // MySQL PDO host error 
            if (preg_match("/Unknown MySQL server host/i", $e->getMessage())) {
                $_SESSION['sql_host']    = '';
                $_SESSION['error']       = ERROR_BAD_HOST;
                $_SESSION['redirection'] = 'database';
                header('Location: index.php?view=database');
                exit();
                // MySQL PDO username/password error
            } elseif (preg_match("/Access denied for user/i", $e->getMessage())) {
                $_SESSION['sql_username'] = '';
                $_SESSION['sql_password'] = '';
                $_SESSION['error']        = ERROR_BAD_USERNAME;
                $_SESSION['redirection']  = 'database';
                header('Location: index.php?view=database');
                exit();
                // MySQL PDO database error
            } elseif (preg_match("/Unknown database/i", $e->getMessage())) {
                $_SESSION['sql_database'] = '';
                $_SESSION['error']        = ERROR_BAD_DATABASE;
                $_SESSION['redirection']  = 'database';
                header('Location: index.php?view=database');
                exit();
                // MySQL PDO other error
            } else {
                $_SESSION['error']       = $e->getMessage();
                $_SESSION['redirection'] = 'database';
                header('Location: index.php?view=database');
                exit();
            }
        }
    }
    
    // define database front end configuration path 
    $config_sys_front_path = '..' . DIRECTORY_SEPARATOR . 'system' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'front_end' . DIRECTORY_SEPARATOR . 'config_sys_frt.php';
    // define database back end configuration path 
    $config_sys_back_path  = '..' . DIRECTORY_SEPARATOR . 'system' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'back_end' . DIRECTORY_SEPARATOR . 'config_sys_bck.php';
    // define database front end configuration path
    $db_config_front_path  = '..' . DIRECTORY_SEPARATOR . 'system' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'front_end' . DIRECTORY_SEPARATOR . 'config_db_frt.php';
    // define database back end configuration path
    $db_config_back_path   = '..' . DIRECTORY_SEPARATOR . 'system' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'back_end' . DIRECTORY_SEPARATOR . 'config_db_bck.php';
    
    // define database parameters
    $db_driver    = $_SESSION['db_driver'];
    $sql_host     = $_SESSION['sql_host'];
    $sql_username = $_SESSION['sql_username'];
    $sql_password = $_SESSION['sql_password'];
    $sql_database = $_SESSION['sql_database'];
    $sql_prefix   = $_SESSION['sql_prefix'];
    
    // define content to write in database configuration files (front & back)
    require 'model' . DIRECTORY_SEPARATOR . 'db_config_frt.php';
    require 'model' . DIRECTORY_SEPARATOR . 'db_config_bck.php';
    
    // define content to write in system configuration files (front & back)
    require 'model' . DIRECTORY_SEPARATOR . 'sys_config_frt.php';
    require 'model' . DIRECTORY_SEPARATOR . 'sys_config_bck.php';
    
    // if possible write content in database front end configuration file
    if (!file_exists($db_config_front_path) OR !is_writable($db_config_front_path)) {
        $_SESSION['error']       = ERROR_CONFIG_FRONT;
        $_SESSION['redirection'] = 'main_config';
        header('Location: index.php?view=main_config');
        exit();
    } else {
        file_put_contents($db_config_front_path, $db_config_content_frt);
    }
    
    // if possible write content in database back end configuration file
    if (!file_exists($db_config_back_path) OR !is_writable($db_config_back_path)) {
        $_SESSION['error']       = ERROR_CONFIG_BACK;
        $_SESSION['redirection'] = 'main_config';
        header('Location: index.php?view=main_config');
        exit();
    } else {
        file_put_contents($db_config_back_path, $db_config_content_bck);
    }
    
    // if possible write content in database front end configuration file
    if (!file_exists($config_sys_front_path) OR !is_writable($config_sys_front_path)) {
        $_SESSION['error']       = ERROR_CONFIG_FRONT;
        $_SESSION['redirection'] = 'main_config';
        header('Location: index.php?view=main_config');
        exit();
    } else {
        file_put_contents($config_sys_front_path, $config_sys_content_frt);
    }
    
    // if possible write content in database back end configuration file
    if (!file_exists($config_sys_back_path) OR !is_writable($config_sys_back_path)) {
        $_SESSION['error']       = ERROR_CONFIG_BACK;
        $_SESSION['redirection'] = 'main_config';
        header('Location: index.php?view=main_config');
        exit();
    } else {
        file_put_contents($config_sys_back_path, $config_sys_content_bck);
    }
    
    // define root URL
    $root_url = $_SERVER['PHP_SELF'];
    // define full URL
    $full_url = str_replace("" . DIRECTORY_SEPARATOR . "installation" . DIRECTORY_SEPARATOR . "index.php", "", $root_url);
    define("FULL_URL", $full_url);
    $_SESSION['finished'] = 1;
}
