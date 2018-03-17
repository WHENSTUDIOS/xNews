<?php

//Main router
$theme = $config['theme'];

if(isset($_GET['article'])){
    article($_GET['article'], $theme);
} elseif(isset($_GET['content'])){
    content($_GET['content'], $theme);
} elseif(isset($_GET['action'])){
    action('lib/handlers/logout');
} else {
    content('index', $theme);
}


?>