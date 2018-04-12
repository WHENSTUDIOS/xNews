<?php

class View {
    public function get($view){
        return header("Location: view/Hydrogen/$view.php");
    }
}

?>