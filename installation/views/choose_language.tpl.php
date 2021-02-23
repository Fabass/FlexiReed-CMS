<?php
if (!defined('FXR_INDEX')) {
    exit('No direct script access allowed');
}
/**
 * Title: FXR Choose Language View
 *
 * @author Fabien Assenarre
 * @link http://www.flexireed.org
 * @copyright Copyright &copy; 2020 Fabien Assenarre
 * @license http://opensource.org/licenses/MIT
 *
 */ ?>

<main role="main">
<section class="jumbotron">
<div class="container">
<div class="pageHeader">
<h1><?= INSTALLATION_LANGUAGE; ?><br><small><?= STEP_1; ?></small></h1>
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
<form method="post" action="index.php?view=requirements" accept-charset="utf-8">
<div class="formInner">
<div class="formHeader">
<h2><?= CHOOSE_YOUR_INSTALLATION_LANGUAGE; ?></h2>
<select name="choose_lang" class="form-control" id="formLanguages">
<?php foreach ($languages as $abbr_language => $name_language) {
    $unauthorized_lang = strpos($abbr_language, '/');
    if ($unauthorized_lang === false) {
        if (strtolower(trim($_SESSION['install_lang'])) !== strtolower(trim($abbr_language))) {
            echo '<option value="' . strtolower(trim($abbr_language)) . '">' . $name_language . '</option>' . "\n";
        } else {
            echo '<option value="' . strtolower(trim($abbr_language)) . '" selected="selected">' . $name_language . '</option>' . "\n";
        }
    }
}
unset($abbr_language);
?>
</select>
</div>
</div>
<input value="<?= NEXT; ?>" type="submit" class="btn btn-success pull-right">
</form>
<a href="<?= FULL_URL; ?>" class="btn btn-default pull-left"><?= BACK; ?></a>
</div>
</section>
</main>
