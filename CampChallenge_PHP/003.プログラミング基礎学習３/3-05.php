<?php
    function my_profile(){
        echo '名前：庭田侑惟子<br>';
        echo '生年月日：1990年1月12日<br>';
        echo 'よろしくお願いします。<br>';
        return array(
            'id' => '01',
            'name' => '庭田侑惟子',
            'birth' => '1990年1月12日',
            'address' => '千葉県'
        );
    }
    for ($i = 0; $i < 10; $i++) {
        my_profile();
    }
    $results = my_profile();
    var_dump($results);
