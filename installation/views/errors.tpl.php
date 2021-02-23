<?php
if (!defined('FXR_INDEX')) {
    exit('No direct script access allowed');
}
/**
 * Title: FXR Errors View
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
<ul>
<?php foreach ($_SESSION['error'] as $error) {
    echo '<li>' . $error . '</li>' . "\n";
}
?>
</ul>
</div>
