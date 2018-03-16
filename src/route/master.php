<?php

function article($article, $theme){
    require("view/$theme/article.php");
}

function content($content, $theme){
    require("view/$theme/$content.php");
}

?>