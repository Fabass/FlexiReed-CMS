<?php
if (!defined('FXR_INDEX')) {
    exit('No direct script access allowed');
}
/**
 * Title: FXR Get View  
 *
 * @author Fabien Assenarre
 * @link http://www.flexireed.org
 * @copyright Copyright &copy; 2020 Fabien Assenarre
 * @license http://opensource.org/licenses/MIT
 *
 */

// set authorized views
$views = array(
    'choose_language',
    'requirements',
    'license',
    'database',
    'main_config',
    'finished'
);

if (empty($_GET['view'])) {
    // set default view 
    $get_view = 'choose_language';
} else {
    // set default view 
    $get_view = 'choose_language';
    
    foreach ($views as $view) {
        // if authorized view load it
        if ($view === $_GET['view']) {
            $get_view = $_GET['view'];
        }
    }
}
// define current view
define('GET_VIEW', $get_view);
