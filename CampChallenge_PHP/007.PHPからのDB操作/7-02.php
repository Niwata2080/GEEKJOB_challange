<?php
try{
// throwを書かなくてもPDOクラスが自動で例外を投げてくれる
    // 引数(接続オプション, ユーザー名, パスワード)を渡してPDOクラスからインスタンスを作成）　データベースハンドラと呼ぶ
    $pdo_object = new PDO('mysql:host=localhost;dbname=Challenge_db;charset=utf8', 'Yuiko', 'mypassword');
    
    //プリペアドステートメント／:プレースホルダ　自動でエスケープを行ってくれる　SQLインジェクション対策
    $sql = "INSERT INTO profiles VALUES(:profilesID, :name, :tell, :age, :birthday)";
    
    //ステートメントハンドラ＝接続したオブジェクト（PDOインスタンス） -> prepareメソッド($SQL文)で準備
    //prepareメソッドの返り値としてPDOstatementのインスタンスを得る
    $query = $pdo_object->prepare($sql);
    
    //ステートメントハンドラ（PDOstatementインスタンス） -> bindValueメソッド
    $query->bindValue(':profilesID', 3);
    $query->bindValue(':name', '田中　角栄');
    $query->bindValue(':tell', '012-345-6789');
    $query->bindValue(':age', 25);
    $query->bindValue(':birthday', '1994-02-01');
    
    //ステートメントハンドラ -> 実行
    $query->execute();
}catch(PDOexception $Exception){
    die('接続に失敗しました：'. $Exception->getMessage());
    //アローでPDOexceptionクラスから作られた$Exception（インスタンス）の中のメソッドにアクセスしている
}

$pdo_object = null; //切断

