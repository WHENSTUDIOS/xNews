<?php
//Configuration file
require('lib/config.php');
//Functions
require('lib/functions.php');
//MySQLi connection
require('lib/db/mysqli.php');
//PDO connection
require('lib/db/pdo.php');
//Get cookies
require('lib/cookies.php');
//Get requests
require('lib/requests.php');
//Get admin
require('lib/admin.php');
//Get user class
require('lib/classes/user.php');
//Master router
require('route/master.php');
?>