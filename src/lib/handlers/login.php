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
    $enabled_query->execute(array(
        ':username' => $username,
    ));

    $enabled_result = $enabled_query->fetchAll();
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
        $tokenquery = $conn->prepare("SELECT * FROM registration_tokens WHERE username = ':username';");
        if($tokenresult = $tokenquery->execute(array(':username' => $username))){
            $sitename = $config['siteName'];
            $url = $config['url'];
            email($email, 'Verify your account', "We noticed you tried to log in with an unverified account at $sitename.\nHere's your verification link: http://$url/index.php?action=verify&token=$token\nThanks!", $config);
        } else { 
            $_SESSION['error'] = 'Unable to create registration token (this is a <i>server side</i> issue).';
            route('x', '../../index.php?content=login');        
        }

        $_SESSION['error'] = 'Your account is not verified! We\'ve re-sent our verification email. Check your spam folder!';
        route('x', '../../index.php?content=login');
    }
} else {
    $_SESSION['error'] = $username . ' does not exist!';
    route('x', '../../index.php?content=login');
}
