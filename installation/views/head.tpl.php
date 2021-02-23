<?php
if (!defined('FXR_INDEX')) {
    exit('No direct script access allowed');
}
/**
 * Title: FXR Head View
 *
 * @author Fabien Assenarre
 * @link http://www.flexireed.org
 * @copyright Copyright &copy; 2020 Fabien Assenarre
 * @license http://opensource.org/licenses/MIT
 *
 */
 
?>
<!doctype html>
<html lang="<?= $_SESSION['install_lang']; ?>">
<head>
<meta charset="utf-8">
<meta name="generator" content="FlexiReed CMS">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="robots" content="noindex,nofollow">
<link rel="stylesheet" type="text/css" href="views/installation.css?<?php echo time(); ?>" media="screen">
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<meta name="description" content="FlexiReed CMS | Installation">
<title><?= FLEXIREED_CMS_INSTALLATION; ?>&nbsp;&#124;&nbsp;<?= STEP; ?></title>
</head>
<body>
<div class="container">
<?php echo '<ol class="breadcrumb">' . "\n" . '';
if ($_GET['view'] === 'choose_language' OR empty($_GET['view'])) {
    echo '<li>' . INSTALLATION_LANGUAGE . '</li>' . "\n" . '';
    echo '<li class="active">' . REQUIREMENTS . '</li>' . "\n" . '';
    echo '<li class="active">' . LICENSE . '</li>' . "\n" . '';
    echo '<li class="active">' . DATABASE . '</li>' . "\n" . '';
    echo '<li class="active">' . MAIN_CONFIG . '</li>' . "\n" . '';
    echo '<li class="active">' . FINISHED_TITLE . '</li>' . "\n" . '';
}
if ($_GET['view'] === 'requirements') {
    echo '<li>' . INSTALLATION_LANGUAGE . '</li>' . "\n" . '';
    echo '<li>' . REQUIREMENTS . '</li>' . "\n" . '';
    echo '<li class="active">' . LICENSE . '</li>' . "\n" . '';
    echo '<li class="active">' . DATABASE . '</li>' . "\n" . '';
    echo '<li class="active">' . MAIN_CONFIG . '</li>' . "\n" . '';
    echo '<li class="active">' . FINISHED_TITLE . '</li>' . "\n" . '';
}
if ($_GET['view'] === 'license') {
    echo '<li>' . INSTALLATION_LANGUAGE . '</li>' . "\n" . '';
    echo '<li>' . REQUIREMENTS . '</li>' . "\n" . '';
    echo '<li>' . LICENSE . '</li>' . "\n" . '';
    echo '<li class="active">' . DATABASE . '</li>' . "\n" . '';
    echo '<li class="active">' . MAIN_CONFIG . '</li>' . "\n" . '';
    echo '<li class="active">' . FINISHED_TITLE . '</li>' . "\n" . '';
}
if ($_GET['view'] === 'database') {
    echo '<li>' . INSTALLATION_LANGUAGE . '</li>' . "\n" . '';
    echo '<li>' . REQUIREMENTS . '</li>' . "\n" . '';
    echo '<li>' . LICENSE . '</li>' . "\n" . '';
    echo '<li>' . DATABASE . '</li>' . "\n" . '';
    echo '<li class="active">' . MAIN_CONFIG . '</li>' . "\n" . '';
    echo '<li class="active">' . FINISHED_TITLE . '</li>' . "\n" . '';
}
if ($_GET['view'] === 'main_config') {
    echo '<li>' . INSTALLATION_LANGUAGE . '</li>' . "\n" . '';
    echo '<li>' . REQUIREMENTS . '</li>' . "\n" . '';
    echo '<li>' . LICENSE . '</li>' . "\n" . '';
    echo '<li>' . DATABASE . '</li>' . "\n" . '';
    echo '<li>' . MAIN_CONFIG . '</li>' . "\n" . '';
    echo '<li class="active">' . FINISHED_TITLE . '</li>' . "\n" . '';
}
if ($_GET['view'] === 'finished') {
    echo '<li>' . INSTALLATION_LANGUAGE . '</li>' . "\n" . '';
    echo '<li>' . REQUIREMENTS . '</li>' . "\n" . '';
    echo '<li>' . LICENSE . '</li>' . "\n" . '';
    echo '<li>' . DATABASE . '</li>' . "\n" . '';
    echo '<li>' . MAIN_CONFIG . '</li>' . "\n" . '';
    echo '<li>' . FINISHED_TITLE . '</li>' . "\n" . '';
}
?>
</ol>      