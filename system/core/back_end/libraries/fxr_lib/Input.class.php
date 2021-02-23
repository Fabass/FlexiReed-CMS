<?php
namespace libraries\fxr_lib;

use libraries\fxr_lib as Fxr_lib;

if (!defined('FXR_INDEX')) {
    header('HTTP/1.1 403 Forbidden');
    exit('No direct script access allowed');
}
/**
 * Title: FXR Input Class (Back-End)
 *
 * @author Fabien Assenarre
 * @link http://www.flexireed.org
 * @copyright Copyright &copy; 2020 Fabien Assenarre
 * @license http://opensource.org/licenses/MIT
 *
 */

class Input
{    
    private $bind_values;
    private $cache_input;
    private $code_exception;
    private $data_type;
    private $filter_output;
    private $input;
    private $page_exception;
    private $regex;
    private $sql_input_name;
    private $sql_table_name;
    
    /**
     * Get Tainted Input
     *
     * @access    private
     * @param     string $input "input"
     * @param     string $data_type "data type"
     * @param     string $regex "regex string"
     * @return    string|bool
     */
    private static function _getTaintedInput($input, $data_type, $regex)
    {
        // numeric data
        if ($data_type === 'digit') {
            if (ctype_digit($input)) {
                return true;
            } else {
                return false;
            }
        // alphabetic data
        } elseif ($data_type === 'alpha') {
            if (ctype_alpha($input)) {
                return true;
            } else {
                return false;
            }
        // alphanumeric data
        } elseif ($data_type === 'alnum') {
            if (ctype_alnum($input)) {
                return true;
            } else {
                return false;
            }
        // custom regex
        } elseif ($data_type === 'regex') {
            if (filter_var($input, FILTER_VALIDATE_REGEXP, array(
                "options" => array(
                    "regexp" => "" . $regex . ""
                )
            ))) {
                return true;
            } else {
                return false;
            }
        // no filtering (not recommended!)
        } elseif ($data_type === 'none') {
            return true;
        // default (alphanumeric)
        } else {
            if (ctype_alnum($input)) {
                return true;
            } else {
                return false;
            }
        }
    }
    
    /**
     * Get Untainted Input
     *
     * @access    public
     * @param     string $input "input"
     * @param     string $data_type "data type"
     * @param     string $regex "regex string"
     * @param     string $sql_table_name "SQL table"
     * @param     string $sql_input_name "input name"
     * @param     array $bind_values "bind values"
     * @param     int $code_exception "code exception"
     * @param     string $page_exception "page exception"
     * @param     int $filter_output "filter output"
     * @param     int $cache_input "cache input"
     * @return    string|bool
     */
    public static function getUntaintedInput($input, $data_type, $regex = '', $sql_table_name = '', $sql_input_name = '', $bind_values = '', $code_exception = '', $page_exception = '', $filter_output = 0, $cache_input = 0)
    {
        // counting required
        if (self::_getTaintedInput($input, $data_type, $regex) == true && $sql_table_name !== '' && $cache_input !== 1) {
            if (Fxr_lib\Database::loadQuery('select', "SELECT COUNT(1) FROM " . $sql_table_name . " WHERE " . $sql_input_name . " = '" . $input . "'", '', $bind_values) != 0) {
                if ($filter_output === '') {
                    return true;
                } elseif ($filter_output == 1) {
                    return $input;
                } elseif ($filter_output == 2) {
                    return htmlentities(utf8_encode($input), ENT_QUOTES);
                } else {
                    return htmlentities(utf8_encode($input), ENT_QUOTES);
                }
            } else {
                if ($code_exception !== '' && $page_exception !== '') {
                    throw new Fxr_lib\Error($input, $code_exception, $page_exception);
                } else {
                    return false;
                }
            }
        // caching required 
        } elseif (self::_getTaintedInput($input, $data_type, $regex) == true && $cache_input === 1) {
            if ($filter_output === '') {
                return true;
            } elseif ($filter_output == 1) {
                return $input;
            } elseif ($filter_output == 2) {
                return htmlentities(utf8_encode($input), ENT_QUOTES);
            } else {
                return htmlentities(utf8_encode($input), ENT_QUOTES);
            }
        // no counting required
        } elseif (self::_getTaintedInput($input, $data_type, $regex) == true && $sql_table_name === '' && $cache_input !== 1) {
            if ($filter_output === '') {
                return true;
            } elseif ($filter_output == 1) {
                return $input;
            } elseif ($filter_output == 2) {
                return htmlentities(utf8_encode($input), ENT_QUOTES);
            } else {
                return htmlentities(utf8_encode($input), ENT_QUOTES);
            }
        // invalid input data
        } else {
            if ($input !== '') {
                if ($code_exception !== '' && $page_exception !== '') {
                    throw new Fxr_lib\Error($input, $code_exception, $page_exception);
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
    }
}
