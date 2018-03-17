<?php

$theme = $_GET['theme'];

if($theme === 'light'){
    setcookie('themeMode', 'light', 2147483647);
} elseif($theme === 'dark') {
    setcookie('themeMode', 'dark', 2147483647);
}

?>