<?php

//Link function
function a($text, $link, $class, $target){

    if($target === ''){
        echo "<a href='$link' class='$class'>$text</a>";
    } elseif($target === 'new_tab'){
        echo "<a href='$link' class='$class' target='_BLANK'>$text</a>";
    } else {
        echo "<a href='$link' class='$class' target='$actualtarget'>$text</a>";
    }
}

function _error($msg){
    echo '<span class="error"><strong>Error</strong>: '.$msg.'</span>';
}

function _success($msg){
    echo '<span class="success"><strong>Success</strong>: '.$msg.'</span>';
}

function route($opt, $path){
    /* 
    Router Options
    | c | Content request |
    | a | Action request |
    | x | Custom request |
    */
    if($opt === 'c'){
        header("Location: index.php?content=$path");
    }elseif($opt === 'a'){
        header("Location: index.php?action=$path");
    }elseif($opt === 'x'){
        header("Location: $path");
    }
}

function _perror($msg){
    echo $msg;
    die;
}

function email($subject, $message){
    $username = $_SESSION['username'];
    if($mailQuery = $mysqli->query("SELECT `email` FROM users WHERE username = '$username';")){
        while($rows = $mailQuery->fetch_assoc()){
            $emailaddress = $rows['email'];
        }
        $headers = 'From: noreply@'.$config['url'] . "\r\n" .
        'Reply-To: contact@'.$config['url'] . "\r\n" .
        'X-Mailer: PHP/' . phpversion();        
        mail($emailaddress, $subject, $message, $headers);
        unset($emailaddress, $rows, $username, $headers);
    } else {
        _perror('Could not query database for email.');
    }
}

?>