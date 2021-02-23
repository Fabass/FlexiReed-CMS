<?php
if (!defined('FXR_INDEX')) {
    exit('No direct script access allowed');
}
/**
 * Title: FXR Check PHP & MySQL Versions
 *
 * @author Fabien Assenarre
 * @link http://www.flexireed.org
 * @copyright Copyright &copy; 2020 Fabien Assenarre
 * @license http://opensource.org/licenses/MIT
 *
 */

if (GET_VIEW !== 'choose_language' AND GET_VIEW !== 'requirements') {
    $session_errors = array();
    // check PHP version
    if (version_compare(PHP_VERSION, INSTALL_PHP_VERSION_REQUIRED, '<')) {
        $session_errors[] = ERROR_PHP;
    }
    // check MySQL version
    if (strpos($_SERVER['HTTP_HOST'], 'localhost') !== false) {
         $dsn = 'mysql:dbname=mysql;host=localhost';
         $user = 'root';
         $password = 'root';
         try {
             $dbh = new PDO($dsn, $user, $password);
             $mysql_version = $dbh->getAttribute( PDO::ATTR_SERVER_VERSION );
         } catch (PDOException $e) {
             echo CONNECTION_FAILED.': ' . $e->getMessage();
         }
     }
     if (!isset($mysql_version) && function_exists('shell_exec')) {
         function checkMysqlVersion()
         {
             $output = shell_exec('mysql -V');
             preg_match('@[0-9]+\.[0-9]+\.[0-9]+@', $output, $version);
             return $version[0];
         }
         $check_mysql_version = checkMysqlVersion();
         if (!empty($check_mysql_version)) {
             $mysql_version = $check_mysql_version;
         } else {
             $mysql_version = '';
         }
     }
     if (!isset($mysql_version)) {
         $mysql_version = '';
     }
    
    if (!empty($mysql_version) && $mysql_version < INSTALL_MYSQL_VERSION_REQUIRED) {
        $session_errors[] = ERROR_MYSQL;
    }
    
    if (!empty($session_errors)) {
        $_SESSION['error']       = $session_errors;
        $_SESSION['redirection'] = 'requirements';
        header('Location: index.php?view=requirements');
        exit();
    }
} 
