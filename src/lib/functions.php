<?php

function a($text, $link, $class, $target){

    if($target === 'new_tab'){
        $actualtarget = '_BLANK';
    }
    echo "<a href='$link' class='$class' target='$target'>$text</a>";
}

?>