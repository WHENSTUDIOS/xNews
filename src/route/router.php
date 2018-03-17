<?php

//Main router
$theme = $config['theme'];

$u = $_SESSION['username'];

if(isset($_GET['article'])){
    article($_GET['article'], $theme);
} elseif(isset($_GET['content'])){
    content($_GET['content'], $theme);
} elseif(isset($_GET['action'])){
    action($_GET['action']);
} else {
    content('index', $theme);
}


?>