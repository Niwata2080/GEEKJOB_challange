<?php
    function my_profile(){
        echo '名前：庭田侑惟子<br>';
        echo '生年月日：90年1月12日<br>';
        echo 'よろしくお願いします。<br>';
        return true;
    }
    for ($i = 0; $i < 10; $i++) {
        my_profile();
    }
    $results = my_profile();
    if ($results = true) {
        echo 'この処理は正しく実行できました';
    }else{
        echo '正しく実行できませんでした';
    }
