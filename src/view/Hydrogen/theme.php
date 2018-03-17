<?php

$theme = $_GET['theme'];
$return = $_GET['return'];
$name = 'theme';

if($theme === 'light'){
    setcookie('themeMode', 'light', 2147483647);
    header("Location: index.php?content=$return");
} elseif($theme === 'dark') {
    setcookie('themeMode', 'dark', 2147483647);
    header("Location: index.php?content=$return");
}

?>