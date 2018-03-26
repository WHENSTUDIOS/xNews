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
    require('lib/config.php');
    require('lib/db/pdo.php');
    if(file_exists("lib/handlers/$action.php")){
        require("lib/handlers/$action.php");
    } else {
        echo 'Action does not exist';
    }
}

?>