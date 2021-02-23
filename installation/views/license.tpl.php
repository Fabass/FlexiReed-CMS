<?php
if (!defined('FXR_INDEX')) {
    exit('No direct script access allowed');
}
/**
 * Title: FXR License View
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
<h1><?= LICENSE; ?><br><small><?= STEP_3; ?></small></h1>
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
<form method="post" action="index.php?view=database" accept-charset="utf-8">
<div class="formInner">
<div class="formHeader" style="height: 225px; overflow:scroll; text-align: left;">
<h2>The MIT License (MIT)</h2>
<p>Copyright (c) 2021 Fabien Assenarre</p>
<p>Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:</p>
<p>The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.</p>
<p>THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.</p>
<input type="checkbox" name="agreement" value="OK"> <?= I_HAVE_READ . "\n"; ?>
</div>
</div>
<input value="<?= NEXT; ?>" type="submit" class="btn btn-success pull-right">
</form>
<a href="?view=requirements" class="btn btn-default pull-left"><?= BACK; ?></a>
</div>
</section>
</main>
