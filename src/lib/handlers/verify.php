<?php
//Verification email
$token = $_GET['token'];
$check_token = $_GET['token'].'-verified';

$verify_query = $conn->prepare("SELECT * FROM `users` WHERE token = :token;");
$verify_query->execute(array(':token' => $token));
$verify_query_result = $verify_query->rowCount();
$verify_count = $conn->prepare("SELECT * FROM `users` WHERE token = :check_token AND `enabled` = '1';");
$verify_count->execute(array(':check_token' => $check_token));
$verify_count_result = $verify_count->rowCount();


if ($verify_count_result <= '0') {
    //Check if token actually exists
    if ($verify_query_result >= '1') {
        unset($verify_query);
        $new_token = $token . '-verified';

        $update_verify_query = $conn->prepare("UPDATE users SET token = :newtoken, `enabled` = '1' WHERE token = :token;");
        if ($update_verify_query->execute(array(':newtoken' => $new_token, ':token' => $token))) {
            $_SESSION['success'] = 'Account verified! You may now log in.';
            route('c', 'login');
        } else {
            $_SESSION['error'] = 'Could not verify specified user. Try again later!';
            route('c', 'login');
        }
    } else {
        //Token does not exist
        $_SESSION['error'] = 'Invalid verification code.';
        route('c', 'login');
    }

} else {
    $_SESSION['error'] = 'Token has already been used, try log in!';
    route('c', 'login');
}

//Check if token has been used
