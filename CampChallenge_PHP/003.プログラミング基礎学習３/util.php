<?php
function my_profile(){
    echo '名前：庭田侑惟子<br>';
    echo '生年月日：1990年1月12日<br>';
    echo 'よろしくお願いします。<br>';
}
function odd_even($num){
    if ($num % 2 == 0) {
        echo $num . 'は偶数です';
    }else{
        echo $num . 'は奇数です';
    }
}