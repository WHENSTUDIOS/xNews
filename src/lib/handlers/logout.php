<?php
require '../functions.php';
session_start();
session_destroy();
header("Location: ../../index.php?content=index");

?>