<?php

$theme = $_GET['theme'];
$return = $_GET['callback'];
$name = 'theme';

if($theme === 'light'){
    setcookie('themeMode', 'light', 2147483647);
    route('c', $return);
} elseif($theme === 'dark') {
    setcookie('themeMode', 'dark', 2147483647);
    route('c', $return);
}

?>