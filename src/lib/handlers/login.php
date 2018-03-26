<?php
session_start();
require '../functions.php';
require '../config.php';
require '../db/pdo.php';

$username = $_POST['username'];
$pwd = $_POST['password'];
$apwd = md5($pwd);
if (!isset($pwd)) {
    route('c', 'login');
} elseif (!isset($username)) {
    route('c', 'login');
}

//Log In
$sql = "SELECT * FROM users WHERE username = :username;";
$query = $conn->prepare($sql);

$query->execute(array(
    ':username' => $username,
));
$rowCount = $query->rowCount();
$rows = $query->fetch(PDO::FETCH_ASSOC);

//Check if account exists
if ($rowCount >= 1) {
    $enabled_query = $conn->prepare("SELECT `enabled` FROM users WHERE username = :username;");
    $enabled_result = $enabled_query->execute(array(
        ':username' => $username,
    ));

    $enabled_result->fetchAll(PDO::FETCH_ASSOC);
    foreach ($enabled_result as $enabled_rows) {
        $enabled = $enabled_rows['enabled'];
    }
    if ($enabled === '1') {

        $password = $rows['password'];
        $email = $rows['email'];
        //Check if password matches
        if ($apwd == $password) {
            //Log In & set session variables
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;

            $sql2 = "UPDATE users SET `lastlogin` = :lastlogin, `lastip` = :lastip WHERE `username` = :username;";
            $query2 = $conn->prepare($sql2);
            $lastlogin = time();
            $lastip = $_SERVER['REMOTE_ADDR'];
            $query2->execute(array(
                ':lastlogin' => $lastlogin,
                ':lastip' => $lastip,
                ':username' => $username,
            ));
            //Set tables

            route('x', '../../index.php?content=index');
        } else {
            $_SESSION['error'] = 'Incorrect password for ' . $username;
            route('x', '../../index.php?content=login');
        }
    } else {
        $_SESSION['error'] = 'Your account is not verified!';
        route('x', '../../index.php?content=login');
    }
} else {
    $_SESSION['error'] = $username . ' does not exist!';
    route('x', '../../index.php?content=login');
}
