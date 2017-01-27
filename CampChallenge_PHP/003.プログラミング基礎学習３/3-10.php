<?php
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
function my_profile() {
    global $prof1, $prof2, $prof3;
    $profs = array($prof1, $prof2, $prof3);
    foreach ($profs as $key => $value) {
        $now = $value;
        if ($now == $prof3) {
            break;
        }
        foreach ($now as $key => $value) {
            if ($key == 'id' || $key == 'address') {
                continue;
            }else{
                echo $key . '：' . $value . '<br>';
            }
        }
    }
}

my_profile();
