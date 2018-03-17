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

?>