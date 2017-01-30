<?php
    function my_profile($name) {
        $prof1 = array(
            'id' => 1,
            'name' => '鈴木太郎',
            'birth' => '1970年1月12日',
            'address' => '東京都'
        );
        $prof2 = array(
            'id' => 2,
            'name' => '佐藤次郎',
            'birth' => '1980年1月12日',
            'address' => '神奈川県'
        );
        $prof3 = array(
            'id' => 3,
            'name' => '木村花子',
            'birth' => '2000年1月12日',
            'address' => '埼玉県'
        );
        $profs = array($prof1, $prof2, $prof3);

        foreach ($profs as $key => $value) {
            $haystack = $profs[$key]['name'];
            if (strpos($haystack, $name) !== false) {
                $hit = $profs[$key];
                return $hit;
                break;
            }
        }
    }

    $results = my_profile('木');
    var_dump($results);
    foreach ($results as $key => $value){
        echo $value . '<br>';
    } //できればechoしたい
