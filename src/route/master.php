<?php


function article($article, $theme, $u, $mysqli){
    require('lib/config.php');
    require("view/$theme/article.php");
}

function content($content, $theme, $u, $mysqli){
    require('lib/config.php');
    if(file_exists("view/$theme/$content.php")){
        require("view/$theme/$content.php");
    } else {
        echo 'File does not exist';
    }
}

function action($action){
    if(file_exists("lib/actions/$action.php")){
        require("lib/actions/$action.php");
    } else {
        echo 'Action does not exist';
    }
}

?>