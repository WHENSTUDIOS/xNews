<?php

function article($article, $theme){
    require("views/$theme/article.php");
}

function content($content, $theme){
    require("views/$theme/$content.php");
}

?>