<?php

if (isset($_SESSION['username'])) {
    if ($config['admin'] === $_SESSION['username']) {
        $tempusername = $_SESSION['username'];
        $query = $conn->prepare("UPDATE users SET `level` = '4' WHERE username = :username;");
        if ($query->execute(array(':username' => $tempusername))) {
        }
        unset($tempusername);
        unset($query);
    }
}
