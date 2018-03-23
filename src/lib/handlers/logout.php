<?php
require '../functions.php';
session_start();
session_destroy();
route('c', 'index');

?>