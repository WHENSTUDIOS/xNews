<?php

function article($article, $theme){
    require('lib/include/requires.php');
    require('lib/include/includes.php');
    require('lib/config.php');
    require("view/$theme/article.php");
}

function content($content, $theme){
    require("view/$theme/$content.php");
}

?>