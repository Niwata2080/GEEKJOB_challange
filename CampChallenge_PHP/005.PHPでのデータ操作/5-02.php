<?php
$accesstime = date('Y年m月d日　H：i：s'); //ユーザーがアクセスした時点で現在時刻を生成
setcookie('LastLoginDate', $accesstime);  //Cookieに名前をつけてユーザーのブラウザに格納

if (isset($_COOKIE['LastLoginDate']) == true) {
// _COOKIE配列から読み出していることに注意　↑でユーザーに送った値ではなく、ユーザーがもともと持っていて送ってくれたデータ（つまり前回の日時）を使っている
    $lastDate = $_COOKIE['LastLoginDate'];
    echo '前回のログインは' . $lastDate . 'です。';
}else {
    echo 'はじめまして！';
}
