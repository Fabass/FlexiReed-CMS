<?php
/**
 * Title: FXR Main Index (Back-End)
 *
 * @author Fabien Assenarre
 * @link http://www.flexireed.org
 * @copyright Copyright &copy; 2020 Fabien Assenarre
 * @license http://opensource.org/licenses/MIT
 *
 */

// defines FXR index
define("FXR_INDEX", 1);
// defines start time
define("START_TIME", microtime(true));

/*
 * you can change the constant value as well as corresponding folder name
 * for more security 
 */
define("SYSTEM", "system");
define("CACHE", "cache");
define("HTML", "html");

// defines system paths
define("DS", DIRECTORY_SEPARATOR);
define("DIR_INDEX_SYSTEM", __DIR__);
define("DIR_INDEX", str_replace('' . SYSTEM . '', '', DIR_INDEX_SYSTEM));
define("DIR_BACK", DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end');
define("DIR_INDEX_CURL", "http://" . $_SERVER['HTTP_HOST'] . str_replace('' . $_SERVER['DOCUMENT_ROOT'] . '', '', DIR_INDEX));

/*
 * checks file existence
 * modify it with care
 */
define("CHECK_FILE_EXISTS_BCK", 1);
// turn it to 0 only after having deleted the installation folder
define("CHECK_INSTALL_EXISTS_BCK", 1);

/*
 * defines configuration files and loads them
 */
$config_files = array(
    'config_sys_bck',
    'config_db_bck'
);
foreach ($config_files as $config_file) {
    if (defined('CHECK_FILE_EXISTS_BCK') && CHECK_FILE_EXISTS_BCK !== 0) {
        if (!is_file(DIR_INDEX_SYSTEM . DS . 'config' . DS . 'back_end' . DS . $config_file . '.php')) {
            exit('One or more configuration files are missing!');
        } else {
            include DIR_INDEX_SYSTEM . DS . 'config' . DS . 'back_end' . DS . $config_file . '.php';
        }
    } else {
        require DIR_INDEX_SYSTEM . DS . 'config' . DS . 'back_end' . DS . $config_file . '.php';
    }
}

/*
 * if required runs installation process
 */
if (!defined('FXR_VERSION')) {
    if (!is_file('..' . DS . 'installation' . DS . 'index.php')) {
        exit('Unable to run installation process!');
    } else {
    	$uri = $_SERVER['REQUEST_URI'];
    	$uri_exploded = explode(DS, $uri);
    	$dir_index = str_replace($uri_exploded[count($uri_exploded)-2].DS.$uri_exploded[count($uri_exploded)-1], "", $_SERVER['REQUEST_URI']);
    	exit('<!doctype html>' . "\n" . '<html>' . "\n" . '<body>' . "\n" . '<p>No installation detected.</p>' . "\n" . '<a href="'.$dir_index.'index.php">Load installation page</a>' . "\n" . '</body>' . "\n" . '</html>');
    }
} else {
    if (defined('CHECK_FILE_EXISTS_BCK') && CHECK_INSTALL_EXISTS_BCK !== 0 && is_file(DIR_INDEX . DS . 'installation' . DS . 'index.php')) {
        exit('<!doctype html>' . "\n" . '<html>' . "\n" . '<body>' . "\n" . '<p>For security reasons, please delete the installation folder before to continue.</p>' . "\n" . '<a href=".">Reload page</a>' . "\n" . '</body>' . "\n" . '</html>');
    } else {
        /*
         * checks PHP version
         */
        if (defined('CHECK_PHP_BCK') && CHECK_PHP_BCK !== 0) {
            if (version_compare(PHP_VERSION, PHP_VERSION_REQUIRED, '<')) {
                exit('PHP ' . number_format(PHP_VERSION_REQUIRED, 1) . ' is needed to run FlexiReed!');
            }
        }
        /*
         * loads "_main_bck.php" file
         */
        if (defined('CHECK_FILE_EXISTS_BCK') && CHECK_FILE_EXISTS_BCK !== 0) {
            if (!is_file(DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . 'main_bck.php')) {
                exit('Unable ton find "main_bck.php" file');
            } else {
                include DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . 'main_bck.php';
            }
        } else {
            include DIR_INDEX_SYSTEM . DS . 'core' . DS . 'back_end' . DS . 'main_bck.php';
        }
    }
}
