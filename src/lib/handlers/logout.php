<?php
require 'lib/functions.php';
session_start();
session_destroy();
route('c', 'index');

?>