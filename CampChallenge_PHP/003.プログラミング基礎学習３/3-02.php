<?php
    function odd_even($num){
        if ($num % 2 == 0) {
            echo $num . 'は偶数です';
        }else{
            echo $num . 'は奇数です';
        }
    }
    odd_even(34);
