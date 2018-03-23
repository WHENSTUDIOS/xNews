<?php

if (isset($_SESSION['username'])) {
    if ($config['admin'] === $_SESSION['username']) {
        $tempusername = $_SESSION['username'];
        $query = $mysqli->query("UPDATE users SET `level` = '4' WHERE username = '$tempusername';");
        if ($query) {
        }
        unset($tempusername);
        unset($query);
    }
}
