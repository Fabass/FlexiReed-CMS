<?php
if (!defined('FXR_INDEX')) {
    exit('No direct script access allowed');
}
/**
 * Title: FXR Requirements View
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
<h1><?= REQUIREMENTS; ?><br><small><?= STEP_2; ?></small></h1>
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
<form method="post" action="index.php?view=license" accept-charset="utf-8">
<div class="formInner">
<div class="formHeader">
<h2><?= CHECK_PHP_MYSQL_TXT; ?></h2>
<table class="table">
<caption class="invisible"><?= CHECK_PHP_MYSQL_TXT; ?></caption>
<thead>
<tr>
<th><?= VERSIONS . "\n"; ?>
<th> <?= ACTUAL . "\n"; ?>
<th> <?= REQUIRED . "\n"; ?>
<th> <?= STATUS . "\n"; ?>
</thead>
<tbody>
<tr id="phprow">
<th> PHP
<td> <?= number_format(phpversion(), 1) . "\n"; ?>
<td> <?= '>=&nbsp;' . number_format(INSTALL_PHP_VERSION_REQUIRED, 1) . "\n"; ?>
<td><?php if (phpversion() >= INSTALL_PHP_VERSION_REQUIRED) {
    echo '<span class="label label-success">' . OK . '</span>' . "\n";
} else {
    echo '<span class="label label-danger">' . FAILED . '</span>' . "\n";
}
?>
<tr>
<th> MySQL
<td> <?php if (strpos($_SERVER['HTTP_HOST'], 'localhost') !== false) {
     $dsn = 'mysql:dbname=mysql;host=localhost';
     $user = 'root';
     $password = 'root';
     try {
         $dbh = new PDO($dsn, $user, $password);
         $mysql_version = $dbh->getAttribute( PDO::ATTR_SERVER_VERSION );
         echo number_format($mysql_version, 1) . "\n";
     } catch (PDOException $e) {
         echo CONNECTION_FAILED.': ' . $e->getMessage();
     }
 }
 if (!isset($mysql_version) && function_exists('shell_exec')) {
     function checkMysqlVersion()
     {
         $output = shell_exec('mysql -V');
         preg_match('@[0-9]+\.[0-9]+\.[0-9]+@', $output, $version);
         return $version[0];
     }
     $check_mysql_version = checkMysqlVersion();
     if (!empty($check_mysql_version)) {
         echo number_format($check_mysql_version, 1) . "\n";
         $mysql_version = $check_mysql_version;
     } else {
         echo '?' . "\n";
         $mysql_version = '';
     }
 }
 if (!isset($mysql_version)) {
     echo '?' . "\n";
     $mysql_version = '';
 }
?>
<td> <?= '>=&nbsp;' . number_format(INSTALL_MYSQL_VERSION_REQUIRED, 1) . "\n"; ?>
<td> <?php if ($mysql_version >= INSTALL_MYSQL_VERSION_REQUIRED && !empty($mysql_version)) {
    echo '<span class="label label-success">' . OK . '</span>' . "\n";
} elseif (empty($mysql_version)) {
    echo '<span class="label label-warning">' . DELAYED . '</span>' . "\n";
} else {
    echo '<span class="label label-danger">' . FAILED . '</span>' . "\n";
} ?>
</table>
</div>
</div>
<input value="<?= NEXT; ?>" type="submit" class="btn btn-success pull-right">
</form>
<a href="?view=choose_language" class="btn btn-default pull-left"><?= BACK; ?></a>
</div>
</section>
</main>
