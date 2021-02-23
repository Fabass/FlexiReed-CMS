<!DOCTYPE html>
<html lang="<?php echo THEME_LANG_BCK; ?>">
<head>
<meta charset="utf-8">
<meta name="description" content="Default home page back-end">
<meta name="generator" content="FlexiReed CMS">
<title>Login Panel (back-end)</title>
<link rel="stylesheet" href="../themes/back_end/<?php echo THEME_LANG_BCK; ?>/<?php echo THEME_FOLDER_BCK; ?>/css/normalize.css">
</head>
<body>
<?php
$errors = $e->getError();
if (!empty($error)) {
    foreach ($error as $code => $message) {
        if ($code === $errors['code']) {
            $error_code      = $code;
            $error_msg       = $message;
            $error_input     = $errors['input'];
            $error_file_path = explode(DIRECTORY_SEPARATOR, $errors['file']);
            $error_file      = array_pop($error_file_path);
            $error_line      = $errors['line'];
        }
    }
    echo '<p><strong>'. $error_msg . "</strong></p>\n";
}
?>
<form action="index.php" enctype="multipart/form-data" method="post" role="form">
<h1>Login Panel</h1>
<h2>Please sign in</h2>
<label for="inputLogin">Login</label>
<input type="text" id="inputLogin" placeholder="Login" name="login" required autofocus>
<label for="inputPassword">Password</label>
<input type="password" id="inputPassword" placeholder="Password"  name="password" required>
<button type="submit">Sign in</button>
</form>
<p>(Please note this is the default login panel with no HTML/CSS theme loaded, you can easily custom it and delete this message :-)</p>
<script src="../themes/back_end/<?php echo THEME_LANG_BCK; ?>/<?php echo THEME_FOLDER_BCK; ?>/js/jsfile.js"></script>
</body>
</html>