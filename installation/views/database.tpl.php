<?php
if (!defined('FXR_INDEX')) {
    exit('No direct script access allowed');
}
/**
 * Title: FXR Database View
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
<h1><?= DATABASE; ?><br><small><?= STEP_4; ?></small></h1>
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
$_SESSION['redirection'] = '';?>
<form action="index.php?view=main_config" method="post" id="database_form" accept-charset="utf-8">
<div class="formInner">
<div class="formHeader">
<fieldset>
<legend><?= DATABASE_DRIVER_CONNECTION; ?></legend>
<select name="db_driver" class="form-control">
<?php if (!isset($_SESSION['db_driver']) OR empty($_SESSION['db_driver'])) {
    
    foreach ($db_drivers as $value => $db_driver) {
        $unauthorized_driver = strpos($value, '/');
        
        if ($unauthorized_driver === false) {
            if (strtolower(trim(INSTALL_DEFAULT_DATABASE_DRIVER)) !== strtolower(trim($value))) {
                echo '<option value="' . strtolower(trim($value)) . '">' . $db_driver . '</option>' . "\n";
            } else {
                echo '<option value="' . strtolower(trim($value)) . '" selected="selected">' . $db_driver . '</option>' . "\n";
            }
        }
    }
    unset($value);
} else {
    foreach ($db_drivers as $value => $db_driver) {
        $unauthorized_driver = strpos($value, '/');
        
        if ($unauthorized_driver === false) {
            if (strtolower(trim($_SESSION['db_driver'])) !== strtolower(trim($value))) {
                echo '<option value="' . strtolower(trim($value)) . '">' . $db_driver . '</option>' . "\n";
            } else {
                echo '<option value="' . strtolower(trim($value)) . '" selected="selected">' . $db_driver . '</option>' . "\n";
            }
        }
    }
    unset($value);
}
?>
</select>
</fieldset>
</div>
</div>
<div class="formInner">
<div class="formHeader">
<fieldset>
<legend><?= DATABASE_SETTINGS; ?></legend>
<div class="form-group">
<label for="sql_database"><?= DATABASE_NAME; ?> <span title="<?= THIS_FIELD_IS_REQUIRED; ?>"><span class="asterisk">*</span></span></label>
<input id="sql_database" type="text" name="sql_database" value="
<?php if (isset($_SESSION['sql_database'])) {
    echo htmlentities($_SESSION['sql_database']);
    unset($_SESSION['sql_database']);
}
?>" class="form-control" size="20" maxlength="64" placeholder="<?= ENTER_DATABASE_NAME; ?>">
</div>
<div class="form-group">
<label for="sql_username"><?= DATABASE_USERNAME; ?><span title="<?= THIS_FIELD_IS_REQUIRED; ?>"><span class="asterisk">*</span></span></label>
<input id="sql_username" type="text" name="sql_username" value="
<?php if (isset($_SESSION['sql_username'])) {
      echo htmlentities($_SESSION['sql_username']);
      unset($_SESSION['sql_username']);
  }
?>" class="form-control" size="16" maxlength="16" placeholder="<?= ENTER_DATABASE_USERNAME; ?>">
</div>
<div class="form-group">
<label for="sql_password"><?= DATABASE_PASSWORD; ?><span title="<?= THIS_FIELD_IS_REQUIRED; ?>"><span class="asterisk">*</span></span></label>
<input id="sql_password" type="password" name="sql_password" value="
<?php if (isset($_SESSION['sql_password'])) {
    echo htmlentities($_SESSION['sql_password']);
    unset($_SESSION['sql_password']);
}
?>" class="form-control" size="16" maxlength="16" placeholder="<?= ENTER_DATABASE_PASSWORD; ?>">
</div>
<div class="form-group">
<label for="sql_host"><?= DATABASE_HOST; ?><span title="<?= THIS_FIELD_IS_REQUIRED; ?>"><span class="asterisk">*</span></span></label>
<input id="sql_host" type="text" name="sql_host" value="
<?php if (isset($_SESSION['sql_host'])) {
    echo htmlentities($_SESSION['sql_host']);
    unset($_SESSION['sql_host']);
} else {
    if (strpos($_SERVER['HTTP_HOST'], 'localhost') !== false OR strpos($_SERVER['HTTP_HOST'], '127.0.0.1') !== false) {
        echo 'localhost';
    }
}
?>" class="form-control" size="20" maxlength="60" placeholder="<?= ENTER_DATABASE_HOST; ?>">
</div>
<div class="form-group">
<label for="sql_prefix"><?= TABLE_PREFIX; ?></label>
<input id="sql_prefix" type="text" name="sql_prefix" value="
<?php if (isset($_SESSION['sql_prefix'])) {
    echo htmlentities($_SESSION['sql_prefix']);
    unset($_SESSION['sql_prefix']);
} else {
    echo 'fxr_';
}
?>" class="form-control" size="6" maxlength="9" placeholder="<?= ENTER_DATABASE_PREFIX; ?>">
</div>
</fieldset>
</div>
</div>
<input value="<?= NEXT; ?>" type="submit" class="btn btn-success pull-right">
</form>
<a href="?view=license" class="btn btn-default pull-left"><?= BACK; ?></a>
</div>
</section>
</main>
