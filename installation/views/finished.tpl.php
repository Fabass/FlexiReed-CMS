<?php
if (!defined('FXR_INDEX')) {
    exit('No direct script access allowed');
}
/**
 * Title: FXR Finished View
 *
 * @author Fabien Assenarre
 * @link http://www.flexireed.org
 * @copyright Copyright &copy; 2020 Fabien Assenarre
 * @license http://opensource.org/licenses/MIT
 *
 */
?>

<main role="main">
<section class="jumbotron">
<div class="container">
<div class="pageHeader">
<h1><?= FINISHED_TITLE; ?><br><small><?= STEP_6; ?></small></h1>
</div>
<?php // load error message
if (isset($_SESSION['error']) AND !empty($_SESSION['error'])) {
    if ($_SESSION['redirection'] == GET_VIEW) {
        // only one error detected
        if (!is_array($_SESSION['error'])) {
            require 'views' . DIRECTORY_SEPARATOR . 'error.tpl.php';
            // more than one error detected
        } else {
            if (count($_SESSION['error']) == 1) {
                require 'views' . DIRECTORY_SEPARATOR . 'error.tpl.php';
            } else {
                require 'views' . DIRECTORY_SEPARATOR . 'errors.tpl.php';
            }
        }
    }
}
// initialize error loading process
$_SESSION['error']       = '';
$_SESSION['redirection'] = '';
?>
<div class="formHeader">
<div class="alert alert-success"><p><i class="fa fa-check"></i> <?= FINISHED_MSG; ?></p></div>
<a href="<?= FULL_URL . DIRECTORY_SEPARATOR . 'system'; ?>" class="btn btn-success pull-right"><?= GO_TO_BACK_END; ?></a>
<a href="?view=main_config" class="btn btn-default pull-left"><?= BACK; ?></a>
</div>
</div>
</section>
</main>
