<?php

$theme = $_GET['theme'];

if($theme === 'light'){
    setcookie('themeMode', 'light', 2147483647);
    header("Location: index.php?content=index");
} elseif($theme === 'dark') {
    setcookie('themeMode', 'dark', 2147483647);
    header("Location: index.php?content=index");
}

?>