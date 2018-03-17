<?php

$host = $config['dbHost'];
$db = $config['dbName'];
$user = $config['[dbUser'];
$pass = $config['dbPass'];

$conn = new PDO("mysql:host=$host;dbname=$db", "$user", "$pass") or die;

?>