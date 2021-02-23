<?php
if (!defined('FXR_INDEX')) {
    exit('No direct script access allowed');
}
/**
 * Title: FXR Database Drivers Connection
 *
 * @author Fabien Assenarre
 * @link http://www.flexireed.org
 * @copyright Copyright &copy; 2020 Fabien Assenarre
 * @license http://opensource.org/licenses/MIT
 *
 */

$db_drivers = array(
    'mysql_pdo' => 'MySQL (PDO)',
    '/mysql_mysqli' => 'MySQL (mysqli)'
);
