<?php
require('db/pdo.php');
//BEGIN REQUEST
if (isset($_SESSION['username'])) {
    $u = $_SESSION['username'];
    /*
    User elevation request:
    Gets the defined user elevation level (i.e editor, user, administrator, etc).
     */
    if ($u !== null) {
        $query = $conn->prepare("SELECT * FROM users WHERE username = :username;");
        if ($query->execute(array(':username' => $u))) {
            $get_username_array = $query->fetchAll();
            foreach($get_username_array as $user_array){
                $_SESSION['level'] = $user_array['level'];
            }
        } else {
            _error('Failed to get user elevation');
            die;
        }
    }
}


?>
