<?php
//try {
//    例外が発生するおそれがあるコード
//    throw new 例外クラス名(引数)
//} catch(例外クラス名 例外を受け取る変数名){
//    例外発生時の処理
//}
try{
// 引数(接続オプション, ユーザー名, パスワード)を渡してPDOクラスからインスタンスを作成）　データベースハンドラと呼ぶ
    $dbh = new PDO('mysql:host=localhost;dbname=Challenge_db;charset=utf8', 'Yuiko', 'mypassword'); //throwを書かなくてもPDOクラスが自動で例外を投げてくれる
}catch(PDOexception $Exception){
    die('接続に失敗しました：'. $Exception->getMessage()); //アローでPDOexceptionクラスから作られた$Exception（インスタンス）の中のメソッドにアクセスしている
}

$dbh = null; //切断


