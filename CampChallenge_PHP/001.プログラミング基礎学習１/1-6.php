<?php
    $total = $_GET['param1'];
    $num = $_GET['param2'];
    $type = $_GET['param3'];

    if($type == 1){
        echo '１：雑貨<br>';
    }elseif($type == 2){
        echo '２：生鮮食品<br>';
    }else{
        echo '３：その他<br>';
    }

    $unit = $total / $num;
    echo '総額：' . $total . '円<br>';
    echo '　　単価：' . $unit . '円<br>';

    $point = 0;
    if($total >= 5000){
        $point = $total * 0.05;
    }elseif($total >= 3000){
        $point = $total * 0.04;
    }else{
    }
    echo '今回獲得したのは' . $point . 'ポイントです';
?>