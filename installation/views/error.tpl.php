<?php
if (!defined('FXR_INDEX')) {
    exit('No direct script access allowed');
}
/**
 * Title: FXR Error View
 *
 * @author Fabien Assenarre
 * @link http://www.flexireed.org
 * @copyright Copyright &copy; 2020 Fabien Assenarre
 * @license http://opensource.org/licenses/MIT
 *
 */
 
 ?>
<div class="alert alert-danger">
<i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
<?php if (!is_array($_SESSION['error'])) {
    echo $_SESSION['error'] . "\n" . '</div>' . "\n";
} else {
    foreach ($_SESSION['error'] as $key) {
        echo $key . "\n" . '</div>' . "\n";
    }
}
?>
