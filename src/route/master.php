<?php

function article($article){
    require("views/$theme/article.php");
}

function content($content){
    require("views/$theme/$content.php");
}

?>