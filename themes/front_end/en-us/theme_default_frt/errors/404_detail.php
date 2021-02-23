<!DOCTYPE html>
<html lang="en-us">
<head>
<meta charset="utf-8">
<title>Error 404! | Front-end</title>
<style>
h1, h2, p {
	text-align: center;
}
table {
	border-collapse: separate;
	border-spacing: 10px;
	float: none !important;
	margin: 0 auto !important;
	text-align: left;
}
</style>
</head>
<body>
<h1>Error 404</h1>
<h2>Page requested not found!</h2>
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
echo '<table style="">';
echo "\n";
echo '<tr>';
echo "\n";
echo '<td><b>Error code:&nbsp;</b></td>';
echo "\n";
echo '<td>' . $error_code . '</td>';
echo "\n";
echo '</tr>';
echo "\n";
echo '<tr>';
echo '<td><b>Error message:</b></td>';
echo '<td>' . $error_msg . '</td>';
echo "\n";
echo '</tr>';
echo "\n";
echo '<tr>';
echo '<td><b>Error input:&nbsp;</b></td>';
echo '<td>' . htmlentities($error_input, ENT_QUOTES) . '</td>';
echo "\n";
echo '</tr>';
echo "\n";
echo '<tr>';
echo '<td><b>Error file:&nbsp;</b></td>';
echo '<td>' . $error_file . '</td>';
echo "\n";
echo '</tr>';
echo "\n";
echo '<tr>';
echo '<td><b>Error line:&nbsp;</b></td>';
echo '<td>' . $error_line . '</td>';
echo "\n";
echo '</tr>';
echo "\n";
echo '</table>';
echo "\n";
}
?>
<p><a href="index.php">Back to home page</a></p>
</body>
</html>