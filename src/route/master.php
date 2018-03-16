<?php

function article($article, $theme){
    require('lib/config.php');
    require("view/$theme/article.php");
}

function content($content, $theme){
    require('lib/config.php');
    require("view/$theme/$content.php");
}

?>