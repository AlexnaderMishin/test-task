<?php


function f($n)
{
    if($n < 3){
        $res = $n -1;
        return $res;
    } else {
        $res = f($n -1) + f($n -2);
        return $res;
    }
    
}

for ($f = 1; $f <= 64; $f++) {
    echo f($f). ', ';
}

