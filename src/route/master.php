<?php

function article($article, $theme){
    require('lib/config.php');
    require("view/$theme/article.php");
}

function content($content, $theme){
    require('lib/config.php');
    if(file_exists("view/$theme/$content.php")){
        require("view/$theme/$content.php");
    }
    echo 'File does not exist';
}

?>