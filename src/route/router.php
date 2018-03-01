<?php

//Main router
require('route/master.php');

if(isset($_GET['article'])){
    article($_GET['article']);
} elseif(isset($_GET['content'])){
    content($_GET['content']);
} else {
    content('index');
}


?>