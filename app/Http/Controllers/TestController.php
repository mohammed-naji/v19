<?php

namespace App\Http\Controllers;

class TestController {

    function calc($n1, $n2, $op){
        switch($op) {
            case '+' :
                return $n1 + $n2;
            break;
            case '-' :
                return $n1 + $n2;
            break;
        }
    }

}
