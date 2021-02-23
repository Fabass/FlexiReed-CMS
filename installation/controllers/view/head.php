<?php
if (!defined('FXR_INDEX')) {
    exit('No direct script access allowed');
}
/**
 * Title: FXR Head Controller
 *
 * @author Fabien Assenarre
 * @link http://www.flexireed.org
 * @copyright Copyright &copy; 2020 Fabien Assenarre
 * @license http://opensource.org/licenses/MIT
 *
 */

// choose language view
if (GET_VIEW === 'choose_language') {
    $step = STEP_1_OF_6;
    // requirements view
} elseif (GET_VIEW === 'requirements') {
    $step = STEP_2_OF_6;
    // license view
} elseif (GET_VIEW === 'license') {
    $step = STEP_3_OF_6;
    // database view
} elseif (GET_VIEW === 'database') {
    $step = STEP_4_OF_6;
    // main config view
} elseif (GET_VIEW === 'main_config') {
    $step = STEP_5_OF_6;
    // finished view
} elseif (GET_VIEW === 'finished') {
    $step = STEP_6_OF_6;
    // default
} else {
    $step = STEP_1_OF_6;
}
define('STEP', $step);

// include head view
if (!file_exists('.' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'head.tpl.php')) {
    exit(ERROR_UNABLE_FIND_FILE . '&nbsp;"head.tpl.php"');
} else {
    require '.' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'head.tpl.php';
}
