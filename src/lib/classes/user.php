<?php

class UserData {
    private $username;
    private $email;

    function __construct($username, $email){
        $this->username = $username;
        $this->email = $email;
    }
    function getUsername(){
        return $this->username;
    }

    function getEmail(){
        return $this->email;
    }
}

?>