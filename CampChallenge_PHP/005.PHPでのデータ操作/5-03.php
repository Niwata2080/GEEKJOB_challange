<?php
session_start(); //セッション開始、IDが発行される
if (isset($_SESSION['LastLoginDate']) == true){
    $lastDate = $_SESSION['LastLoginDate'];  //時系列に注意　前回記録したものを読み出している
    echo '前回のログインは' . $lastDate . 'です。';
}else {
    echo 'はじめまして！';
}

$accesstime = date('Y年m月d日　H：i：s'); // ここで初めて現在時刻を記録
$_SESSION['LastLoginDate'] = $accesstime; //セッションへの格納に関数ではなく直に変数を書いているため

