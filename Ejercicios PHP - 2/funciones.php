<?php

function elMayor($a, $b, &$c){
    if ($a > $b) {
        $c = $a;
    } else if ($a < $b){
        $c = $b;
    } else {
        $c = 0;
    }
}

?>