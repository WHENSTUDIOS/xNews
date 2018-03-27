<?php

class UserData {

    public function getUsername(){
        return $_SESSION['username'];
    }

    public function getEmail(){
        return $_SESSION['email'];
    }
}

?>