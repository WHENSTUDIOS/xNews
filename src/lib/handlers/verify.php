<?php
//Verification email
$token = $_GET['token'];

$verify_query = $conn->prepare("SELECT * FROM `users` WHERE token = :token;");

//Check if token actually exists
if($verify_query->execute(array(':token' => $token,))){
    unset($verify_query);
    $new_token = $token . '-verified';
    if($query = $mysqli->query("UPDATE users SET token = $new_token, `enabled` = '1' WHERE token = $token;")){
        route('c', 'login');
    } else {
        _perror('Could not verify user.');
    }
} else {
    //Token does not exist
    _perror('Invalid verification token.');
}

?>