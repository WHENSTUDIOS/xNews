<?php

class GetCookie {

    public function name($cookie){
        return $cookie;
    }
    public function content($cookie){
        return $_COOKIE["$cookie"];
    }

}

?>