<?php
    $input = $_GET['param1'];
    $num = $input;
    echo $input . '　＝　';
    //約数は２、３、５、７　それぞれで割り切れなくなるまで割る　その都度出力
    $prime = array(2, 3, 5, 7);
    foreach ($prime as $value){
        while ($num % $value == 0) {
            $num = $num / $value;
            echo $value . '×';
        }
    }
    if ($num > 7){
        echo 'その他';
    }
    //最後の×が残ってしまう　要改良：str_replace関数？
