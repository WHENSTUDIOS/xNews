<?php
session_start();
require '../functions.php';
require '../config.php';
require '../db/pdo.php';

$username = $_POST['username'];
$email = $_POST['email'];
$pwd = $_POST['password'];
$regdate = time();
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

//Token
$prepared_token = $regdate . $username . $email . md5($email . $username . $pwd);
$token = sha1($prepared_token);

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

                //Verification email
                if(isset($config['requireVerification']) && $config['requireVerification'] === true){
                    //Verification token
                    $tokenquery = $conn->prepare("INSERT INTO registration_tokens (`token`, `time`) VALUES (:token, :regdate);");
                    if($tokenresult = $tokenquery->execute(array(':token' => $token, ':regdate' => $regdate))){
                        $sitename = $config['siteName'];
                        $url = $config['url'];
                        email($email, 'Verify your account', "Thanks for registering at $sitename!\n Confirm your email address by clicking or copying this link: http://$url/index.php?action=verify&token=$token\n Thanks!");
                    } else { 
                        $_SESSION['error'] = 'Unable to create registration token (this is a <i>server side</i> issue).';
                        route('x', '../../index.php?content=login');        
                    }
                }

                //Register user
                $sql2 = "INSERT INTO users (username, email, `password`, regdate, lastip, `level`, token) VALUES (:username, :email, :pwd, :regdate, :lastip, :level :token);";
                $query2 = $conn->prepare($sql2);
                $lastip = $_SERVER['REMOTE_ADDR'];
                $query2->execute(array(
                    ':username' => $username,
                    ':email' => $email,
                    ':pwd' => $apwd,
                    ':regdate' => $regdate,
                    ':lastip' => $lastip,
                    ':level' => 1,
                    ':token' => $token,
                ));

                

                //Set tables
                $_SESSION['success'] = 'Registered! You can now log in.';
                route('x', '../../index.php?content=login');
            } else {
                $_SESSION['error'] = 'That email is already taken!';
                route('x', '../../index.php?content=register');
            }
        } else {
            $_SESSION['error'] = $username . ' is already in use!';
            route('x', '../../index.php?content=register');
        }
} else {
    $_SESSION['error'] = 'Your username is too long!';
    route('x', '../../index.php?content=register');
}

?>