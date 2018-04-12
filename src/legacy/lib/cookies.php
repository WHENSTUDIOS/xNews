<?php

if(isset($_COOKIE['themeMode'])){
    
} else {
    setcookie('themeMode', 'light', 2147483647);
    route('c', 'index');
}

?>