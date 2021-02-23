<?php
if (!defined('FXR_INDEX')) {
    exit('No direct script access allowed');
}
/**
 * Title: FXR Process View
 *
 * @author Fabien Assenarre
 * @link http://www.flexireed.org
 * @copyright Copyright &copy; 2020 Fabien Assenarre
 * @license http://opensource.org/licenses/MIT
 *
 */
 
header('Expires: Sun, 01 Jan 2014 00:00:00 GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');
?>
<!doctype html>
<html lang="<?= $_SESSION['install_lang'];?>">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="FlexiReed CMS | Installation">
<meta name="generator" content="FlexiReed CMS">
<meta name="robots" content="noindex,nofollow">
<link rel="stylesheet" type="text/css" href="installation/views/process.css" media="screen">
<title><?= NO_INSTALLATION_DETECTED;?>&nbsp;&#124;&nbsp;FlexiReed <?= INSTALL_FXR_VERSION; ?></title>
</head>
<body>
<main role="main">
<section class="jumbotron text-center">
<div class="container">
<h1><?= FLEXIREED_CMS_INSTALLATION; ?></h1>
<p class="lead text-muted"><?= NO_INSTALLATION_DETECTED; ?></p>
<p><a href="<?= LINK_INSTALLATION ?>" class="btn btn-success my-2"><?= RUN_INSTALLATION; ?></a></p>
</div>
</section>
</main>
</body>
</html>