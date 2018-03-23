<?php
require '../functions.php';
session_start();
session_destroy();
route('x', '../../index.php?content=index');

?>