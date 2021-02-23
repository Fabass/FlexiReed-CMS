<?php
if (!defined('FXR_INDEX')) {
    exit('No direct script access allowed');
}
/**
 * Title: FXR Main Config View
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
<h1><?= MAIN_CONFIG; ?><br><small><?= STEP_5; ?></small></h1>
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
<form action="index.php?view=finished" method="post" id="config_form" accept-charset="utf-8">
<div class="formInner">
<div class="formHeader">
<fieldset>
<legend><?= ADMIN_ACCOUNT_INFORMATION; ?></legend>
<div class="form-group">
<label for="site_name"><?= SITE_NAME; ?> <span title="<?= THIS_FIELD_IS_REQUIRED; ?>"><span class="asterisk">*</span></span></label>
<input id="site_name" type="text" name="site_name" value="
<?php if (isset($_SESSION['site_name'])) {
    echo $_SESSION['site_name'];
    unset($_SESSION['site_name']);
} else {
    echo MY_PERSONAL_WEBSITE;
}
?>" class="form-control" size="25" maxlength="50" placeholder="<?= ENTER_YOUR_SITE_NAME; ?>">
</div>
<div class="form-group">
<label for="full_name"><?= FULL_NAME; ?><span title="<?= THIS_FIELD_IS_REQUIRED; ?>"><span class="asterisk">*</span></span></label>
<input id="full_name" type="text" name="full_name" value="
<?php if (isset($_SESSION['full_name'])) {
    echo $_SESSION['full_name'];
    unset($_SESSION['full_name']);
}
?>" class="form-control" size="25" maxlength="50" placeholder="<?= ENTER_YOUR_FULL_NAME; ?>">
<?= DESCRIPTION_FULL_NAME; ?>
</div>
<div class="form-group">
<label for="user_mail"><?= EMAIL_ADDRESS; ?> <span title="<?= THIS_FIELD_IS_REQUIRED; ?>"><span class="asterisk">*</span></span></label>
<input id="user_mail" type="text" name="user_mail" value="
<?php if (isset($_SESSION['user_mail'])) {
    echo $_SESSION['user_mail'];
    unset($_SESSION['user_mail']);
}
?>" class="form-control" size="25" maxlength="50" placeholder="<?= ENTER_YOUR_EMAIL_ADDRESS; ?>">
</div>
<div class="form-group">
<label for="user_name"><?= USERNAME_LOGIN; ?> <span title="<?= THIS_FIELD_IS_REQUIRED; ?>"><span class="asterisk">*</span></span></label>
<input id="user_name" type="text" name="user_name" value="
<?php if (isset($_SESSION['user_name'])) {
    echo $_SESSION['user_name'];
    unset($_SESSION['user_name']);
}
?>" class="form-control" size="25" maxlength="10" placeholder="<?= ENTER_YOUR_USER_NAME; ?>">
<?= DESCRIPTION_USER_NAME; ?>
</div>
<div class="form-group">
<label for="user_password"><?= PASSWORD; ?> <span title="<? THIS_FIELD_IS_REQUIRED; ?>"><span class="asterisk">*</span></span></label>
<input id="user_password" type="password" name="user_password" value="
<?php if (isset($_SESSION['user_password'])) {
    echo $_SESSION['user_password'];
    unset($_SESSION['user_password']);
}
?>" class="form-control" size="25" maxlength="15" placeholder="<?= ENTER_YOUR_PASSWORD; ?>">
<?= DESCRIPTION_PASSWORD; ?>
</div>
<div class="form-group">
<label for="user_password_confirm"><?= CONFIRM_PASSWORD; ?> <span title="<?= THIS_FIELD_IS_REQUIRED; ?>"><span class="asterisk">*</span></span></label>
<input id="user_password_confirm" type="password" name="user_password_confirm" value="
<?php if (isset($_SESSION['user_password_confirm'])) {
    echo $_SESSION['user_password_confirm'];
    unset($_SESSION['user_password_confirm']);
}
?>" class="form-control" size="25" maxlength="15" placeholder="<?= CONFIRM_YOUR_PASSWORD; ?>">
</div>
</fieldset>
</div>
</div>
<div class="formInner">
<div class="formHeader">
<fieldset>
<legend><?= SERVER_SETTINGS; ?></legend>
<label for="default_language"><?= DEFAULT_LANGUAGE_TXT; ?></label>
<select id="default_language" name="default_language"  class="form-control">
<?php foreach ($languages as $abbr_language => $name_language) {
    $unauthorized_lang = strpos($abbr_language, '/');
    
    if ($unauthorized_lang === false) {
        if (strtolower(trim($_SESSION['install_lang'])) !== strtolower(trim($abbr_language))) {
            echo '<option value="' . $abbr_language . '">' . $name_language . '</option>' . "\n";
        } else {
            echo '<option value="' . $abbr_language . '" selected="selected">' . $name_language . '</option>' . "\n";
        }
    }
}
unset($abbr_language);
?>
</select>
<label for="default_timezone"><?= DEFAULT_TIME_ZONE; ?></label>
<select id="default_timezone" name="default_timezone"  class="form-control">
<?php foreach ($timezones as $abbr_timezone => $name_timezone) {
    echo '<option value="' . $abbr_timezone . '">' . $abbr_timezone . '</option>' . "\n";
    foreach ($name_timezone as $abbr_timezone2 => $name_timezone2) {
        if ($name_timezone2 != ini_get('date.timezone')) {
            echo '<option value="' . $name_timezone2 . '">' . $name_timezone2 . '</option>' . "\n";
        } else {
            echo '<option value="' . $name_timezone2 . '" selected="selected">' . $name_timezone2 . '</option>' . "\n";
        }
    }
}
unset($abbr_timezone);
?>
</select>
</fieldset>
</div>
</div>
<input value="<?= NEXT; ?>" type="submit" class="btn btn-success pull-right">
</form>
<a href="?view=database" class="btn btn-default pull-left"><?= BACK; ?></a>
</div>
</section>
</main>
