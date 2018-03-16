<?php

//Main router
$theme = $config['theme'];

$yeah = 'yeah';


if(isset($_GET['article'])){
    article($_GET['article'], $theme);
} elseif(isset($_GET['content'])){
    content($_GET['content'], $theme);
} else {
    content('index', $theme);
}


?>