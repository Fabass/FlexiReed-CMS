<?php
use \libraries\fxr_lib as Fxr_lib;

if (!defined('FXR_INDEX')) {
    header('HTTP/1.1 403 Forbidden');
    exit('No direct script access allowed');
}
/**
 * Title: FXR Autoload Function (Front-End)
 *
 * @author Fabien Assenarre
 * @link http://www.flexireed.org
 * @copyright Copyright &copy; 2020 Fabien Assenarre
 * @license http://opensource.org/licenses/MIT
 *
 */

/**
 * Enables Autoloading Classes
 *
 * @param string $class_path_ns class path namespace
 * @return void
 */
function autoload($class_path_ns)
{
    // transform "namespace path" ($class_path_ns) into "system path" ($class_path_sys) 
    $class_path_sys = strtr($class_path_ns, '\\', DS);
    
    if (defined('CHECK_FILE_EXISTS_FRT') && CHECK_FILE_EXISTS_FRT !== 1) {
        if (CHECK_CLASS_EXISTS_FRT !== 1) {
            include DIR_FRONT . DS . $class_path_sys . '.class.php';
        } else {
            include DIR_FRONT . DS . $class_path_sys . '.class.php';
            if (!class_exists($class_path_ns, false)) {
                throw new Fxr_lib\Error($class_path_sys, 1, ERROR_PAGE_FRT);
            }
        }
    } else {
        if (defined('CHECK_CLASS_EXISTS_FRT') && CHECK_CLASS_EXISTS_FRT !== 1) {
            if (!is_file(DIR_FRONT . DS . $class_path_sys . '.class.php')) {
                if ($class_path_ns !== 'libraries\fxr_lib\Error') {
                    throw new Fxr_lib\Error($class_path_sys, 1, ERROR_PAGE_FRT);
                } else {
                    exit('Unable ton find ' . $class_path_sys . '');
                }
            } else {
                include DIR_FRONT . DS . $class_path_sys . '.class.php';
            }
        } else {
            if (!is_file(DIR_FRONT . DS . $class_path_sys . '.class.php')) {
                if ($class_path_ns !== 'libraries\fxr_lib\Error') {
                    throw new Fxr_lib\Error($class_path_sys, 1, ERROR_PAGE_FRT);
                } else {
                    exit('Unable ton find ' . $class_path_sys . '');
                }
            } else {
                include DIR_FRONT . DS . $class_path_sys . '.class.php';
                if (!class_exists($class_path_ns, false)) {
                    throw new Fxr_lib\Error($class_path_sys, 1, ERROR_PAGE_FRT);
                }
            }
        }
    }
}
spl_autoload_register('autoload');
