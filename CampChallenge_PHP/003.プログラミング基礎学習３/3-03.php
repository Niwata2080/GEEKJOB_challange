<?php
    function kakezan($num, $num2 = 5, $type = false){
        $answer = $num * $num2;
        switch ($type) {
            case false:
                echo $answer, '<br>';
                break;
            case true:
                echo $answer * $answer, '<br>';
                break;
        }
    }
    kakezan(3);
    kakezan(5, 4, true);
