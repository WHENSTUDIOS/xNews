<?php

if(isset($_COOKIE['themeMode'])){
    
} else {
    setcookie('themeMode', 'light', 2147483647);
    header("Location: index.php?content=index");
}

?>