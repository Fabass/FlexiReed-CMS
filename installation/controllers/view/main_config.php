<?php
if (!defined('FXR_INDEX')) {
    exit('No direct script access allowed');
}
/**
 * Title: FXR Main Config Controller
 *
 * @author Fabien Assenarre
 * @link http://www.flexireed.org
 * @copyright Copyright &copy; 2020 Fabien Assenarre
 * @license http://opensource.org/licenses/MIT
 *
 */

$session_errors = array();

// check SQL driver name		
if (empty($_POST['db_driver']) && empty($_SESSION['db_driver'])) {
    $session_errors[] = ERROR_BAD_DRIVER;
} else {
    if (!empty($_POST['db_driver'])) {
        $_SESSION['db_driver'] = $_POST['db_driver'];
    }
}
// check SQL database name			
if (empty($_POST['sql_database']) && empty($_SESSION['sql_database'])) {
    $session_errors[] = ERROR_EMPTY_DATABASE;
} else {
    if (!empty($_POST['sql_database'])) {
        $_SESSION['sql_database'] = $_POST['sql_database'];
    }
}
// check SQL username name
if (empty($_POST['sql_username']) && empty($_SESSION['sql_username'])) {
    $session_errors[] = ERROR_EMPTY_USERNAME;
} else {
    if (!empty($_POST['sql_username'])) {
        $_SESSION['sql_username'] = $_POST['sql_username'];
    }
}
// check SQL password name
if (empty($_POST['sql_password']) && empty($_SESSION['sql_password'])) {
    $session_errors[] = ERROR_EMPTY_PASSWORD;
} else {
    if (!empty($_POST['sql_password'])) {
        $_SESSION['sql_password'] = $_POST['sql_password'];
    }
}
// check SQL host name
if (empty($_POST['sql_host']) && empty($_SESSION['sql_host'])) {
    $session_errors[] = ERROR_EMPTY_HOST;
} else {
    if (!empty($_POST['sql_host'])) {
        $_SESSION['sql_host'] = $_POST['sql_host'];
    }
}
// check SQL prefix name
if (!empty($_POST['sql_prefix']) && empty($_SESSION['sql_prefix'])) {
    $_SESSION['sql_prefix'] = $_POST['sql_prefix'];
}

// load error process
if (!empty($session_errors)) {
    $_SESSION['error']       = $session_errors;
    $_SESSION['redirection'] = 'database';
    header('Location: index.php?view=database');
    exit();
} else {
    require '.' . DIRECTORY_SEPARATOR . 'controllers' . DIRECTORY_SEPARATOR . 'no_view' . DIRECTORY_SEPARATOR . 'set_prefix.php';
    
    // load creation tables file
    if (!file_exists('.' . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'create_tables.php')) {
        exit(ERROR_UNABLE_FIND_FILE . '&nbsp;"create_tables.php"');
    } else {
        require '.' . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'create_tables.php';
    }
    // load timezones file
    if (!file_exists('.' . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'timezones.php')) {
        exit(ERROR_UNABLE_FIND_FILE . '&nbsp;"timezones.php"');
    } else {
        require '.' . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'timezones.php';
    }
    
    // MySQL PDO driver connection	
    if ($_POST['db_driver'] === 'mysql_pdo') {
        $dsn = 'mysql:host=' . $_POST['sql_host'] . ';dbname=' . $_POST['sql_database'] . '';
        
        try {
            $mysql_pdo = new PDO($dsn, $_POST['sql_username'], $_POST['sql_password']);
            $mysql_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            foreach ($queries as $query) {
                $mysql_pdo->query($query);
            }
            unset($query);
        }
        catch (PDOException $e) {
            // PDO host error
            if (preg_match("/Unknown MySQL server host/i", $e->getMessage())) {
                $_SESSION['sql_host']    = '';
                $_SESSION['error']       = ERROR_BAD_HOST . '&nbsp;"' . htmlentities($_POST['sql_host']) . '"';
                $_SESSION['redirection'] = 'database';
                header('Location: index.php?view=database');
                exit();
                // PDO username/password error
            } elseif (preg_match("/Access denied for user/i", $e->getMessage())) {
                $_SESSION['sql_username'] = '';
                $_SESSION['sql_password'] = '';
                $_SESSION['error']        = ERROR_BAD_USERNAME;
                $_SESSION['redirection']  = 'database';
                header('Location: index.php?view=database');
                exit();
                // PDO database error
            } elseif (preg_match("/Unknown database/i", $e->getMessage())) {
                $_SESSION['sql_database'] = '';
                $_SESSION['error']        = ERROR_BAD_DATABASE . '&nbsp;"' . htmlentities($_POST['sql_database']) . '"';
                $_SESSION['redirection']  = 'database';
                header('Location: index.php?view=database');
                exit();
                // PDO other error
            } else {
                $_SESSION['error']       = $e->getMessage();
                $_SESSION['redirection'] = 'database';
                header('Location: index.php?view=database');
                exit();
            }
        }
    }
}
