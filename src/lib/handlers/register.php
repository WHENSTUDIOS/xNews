<?php
session_start();
require '../functions.php';
require '../config.php';
require '../db/pdo.php';

$username = $_POST['username'];
$email = $_POST['email'];
$pwd = $_POST['password'];
$apwd = md5($pwd);
if (!isset($pwd)) {
    route('c', 'register');
} elseif (!isset($username)) {
    route('c', 'register');
} elseif (!isset($email)) {
    route('c', 'register');
}
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//Log In
$sql = "SELECT * FROM users WHERE username = :username;";
$query = $conn->prepare($sql);

$query->execute(array(
    ':username' => $username,
));
$rowCount = $query->rowCount();

$sql = "SELECT email FROM users WHERE email = :email;";
$query = $conn->prepare($sql);

$query->execute(array(
    ':email' => $email,
));
$emailCount = $query->rowCount();

//Check if username is correct length
if (strlen($username) < 21) {
        //Check if account exists
        if (!$rowCount >= 1) {

            //Check if password matches
            if (!$emailCount >= 1) {
                //Log In & set session variables

                $sql2 = "INSERT INTO users (username, email, `password`, regdate, lastip, `level`) VALUES (:username, :email, :pwd, :regdate, :lastip, :level);";
                $query2 = $conn->prepare($sql2);
                $regdate = time();
                $lastip = $_SERVER['REMOTE_ADDR'];
                $query2->execute(array(
                    ':username' => $username,
                    ':email' => $email,
                    ':pwd' => $apwd,
                    ':regdate' => $regdate,
                    ':lastip' => $lastip,
                    ':level' => 1,
                ));
                //Set tables
                $_SESSION['success'] = 'Registered! You can now log in.';
                route('c', 'login');
            } else {
                $_SESSION['error'] = 'That email is already taken!';
                route('c', 'register');
            }
        } else {
            $_SESSION['error'] = $username . ' is already in use!';
            route('c', 'register');
        }
} else {
    $_SESSION['error'] = 'Your username is too long!';
    route('c', 'register');
}

?>