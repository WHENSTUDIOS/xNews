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

function route($path){
    header("Location: $path");
}

?>