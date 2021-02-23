<?php
namespace libraries\fxr_lib;

use libraries\fxr_lib as Fxr_lib;

if (!defined('FXR_INDEX')) {
    header('HTTP/1.1 403 Forbidden');
    exit('No direct script access allowed');
}
/**
 * Title: FXR Database Class (Front-End)
 *
 * @author Fabien Assenarre
 * @link http://www.flexireed.org
 * @copyright Copyright &copy; 2020 Fabien Assenarre
 * @license http://opensource.org/licenses/MIT
 *
 */

class Database
{   
    private $bind_type_param;
    private $bind_type;
    private $bind_value_param;
    private $bind_value;
    private $bind_values_param = array();
    private $bind_values = array();
    private $configDbFrt;
    private $db_database_name;
    private $db_host;
    private $db_name;
    private $db_password;
    private $db_username;
    private $db;
    private $dsn;
    private $e;
    private $fetched_results;
    private $i;
    private static $instance;
    private $key_results;
    private $key;
    private static $queries_count = array();
    private $query_use;
    private $query;
    private $results;
    private $row;
    private $stmt;
    private $sub_template_name = array();
    private $value_result;
    private $value;
    
    function __construct($db_host, $db_username, $db_password, $db_database_name)
    {
        if (!empty(self::$instance)) {
            return self::$instance;
        }
        self::$instance = $this;
    }
    
    /**
     * Get Connection Instance
     *
     * @access    private
     * @param     void
     * @return    PDO|false
     */
    private static function _getInstance()
    {
        if (empty(self::$instance)) {
            include SYSTEM . DS . 'config' . DS . 'front_end' . DS . 'config_db_frt.php';
            $db_host     = $configDbFrt['db_host'];
            $db_name     = $configDbFrt['db_name'];
            $db_username = $configDbFrt['db_username'];
            $db_password = $configDbFrt['db_password'];
            
            if ($configDbFrt['db_system'] === 'mysql') {
                $dsn = 'mysql:host=' . $db_host . ';dbname=' . $db_name . '';
            }
            
            try {
                self::$instance = new \PDO($dsn, $db_username, $db_password);
                self::$instance->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                self::$instance->exec('SET NAMES utf8');
            }
            catch (\PDOException $e) {
                throw new Fxr_lib\Error('config_db_frt.php', 4, ERROR_PAGE_FRT);
            }
        }
        return self::$instance;
    }
    
    /**
     * Load Query
     *
     * @access    public
     * @param     string $query_use "select|insert|delete|update"
     * @param     string $query "query"
     * @param     string $sub_template_name "sub-template name"
     * @param     array $bind_values "bind values"
     * @return    mixed
     */
    public static function loadQuery($query_use, $query, $sub_template_name, $bind_values)
    {
        $db = self::_getInstance();
        // prepare query
        if ($stmt = $db->prepare($query)) {
            if (!empty($bind_values)) {
                foreach ($bind_values as $bind_value => $bind_type) {
                    foreach ($bind_type as $key => $value) {
                        if ($value === 'i') {
                            $stmt->bindValue($bind_value, $key, \PDO::PARAM_INT);
                        } elseif ($value === 's') {
                            $stmt->bindValue($bind_value, $key, \PDO::PARAM_STR);
                        } elseif ($value === 'b') {
                            $stmt->bindValue($bind_value, $key, \PDO::PARAM_BOOL);
                        } else {
                            throw new Fxr_lib\Error($bind_value, 5, ERROR_PAGE_FRT);
                        }
                    }
                }
            }
            $bind_values       = null;
            $bind_values_param = null;
        } else {
            throw new Fxr_lib\Error($query, 6, ERROR_PAGE_FRT);
        }
        // load "select" query
        if ($query_use === 'select') {
            $stmt->execute();
            $fetched_results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            $stmt = null;
            
            // no sub-template needed
            if (!empty($sub_template_name)) {
                return $fetched_results;
            // sub-templates needed
            } else {
                foreach ($fetched_results as $key_results) {
                    foreach ($key_results as $row) {
                        return $row;
                    }
                }
                $fetched_results = null;
                $key_results     = null;
            }
        // load "insert", "delete" or "update" query
        } elseif ($query_use === 'count') {
            $row_count = $stmt->rowCount();
            return $row_count;
        // load "insert", "delete" or "update" query
        } else {
            $stmt->execute();
            $stmt->closeCursor();
            $stmt = null;
        }
    }
}
