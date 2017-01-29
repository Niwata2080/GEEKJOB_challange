<?php
    $input = $_GET['param1'];
    $num = $input;
    $output = $input . '　＝　';
    //追加：例外の処理
    switch ($num) {
        case 0:
        case 1:
        case 2:
        case 3:
        case 5:
        case 7:
            $output .= $num;
            break;
        default:
    //約数は２、３、５、７　それぞれで割り切れなくなるまで割る
            $prime = array(2, 3, 5, 7);
            foreach ($prime as $value){
                while ($num % $value == 0) {
                    $num = $num / $value;
                    $output .= $value . '×';
                }
            }
        }
    if ($num > 7){
        $output .= 'その他';
    }
    //最後が×で終わってしまった時対策 効かない？
    rtrim($output, '×');
    echo $output;
