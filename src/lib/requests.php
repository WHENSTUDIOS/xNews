<?php
//BEGIN REQUEST
if (isset($_SESSION['username'])) {
    $u = $_SESSION['username'];
    /*
    User elevation request:
    Gets the defined user elevation level (i.e editor, user, administrator, etc).
     */
    if ($u !== null) {
        $query = $mysqli->query("SELECT * FROM users WHERE username = '$u';");
        if ($query) {
            while ($elev_rows = $query->fetch_assoc()) {
                $_SESSION['level'] = $elev_rows['level'];
            }
        } else {
            _error('Failed to get user elevation');
            die;
        }
    }
}


?>
