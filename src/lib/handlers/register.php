<?php
session_start();
require '../config.php';
require '../db/pdo.php';

$username = $_POST['username'];
$email = $_POST['email'];
$pwd = md5($_POST['password']);

if (!isset($pwd)) {
    header('Location: ../../index.php?content=register');
} elseif (!isset($username)) {
    header('Location: ../../index.php?content=register');
} elseif (!isset($email)) {
    header('Location: ../../index.php?content=register');
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
if (strlen($username) > 21) {
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
                    ':pwd' => $pwd,
                    ':regdate' => $regdate,
                    ':lastip' => $lastip,
                    ':level' => 1,
                ));
                //Set tables
                $_SESSION['success'] = 'Registered! You can now log in.';
                header('Location: ../../index.php?content=login');
            } else {
                $_SESSION['error'] = 'That email is already taken!';
                header('Location: ../../index.php?content=register');
            }
        } else {
            $_SESSION['error'] = $username . ' is already in use!';
            header('Location: ../../index.php?content=register');
        }
} else {
    $_SESSION['error'] = 'Your username is too long!';
    header('Location: ../../index.php?content=register');
}

?>