<?php
try{
    $pdo_object = new PDO('mysql:host=localhost;dbname=Challenge_db;charset=utf8', 'Yuiko', 'mypassword');
    
    $sql = "SELECT * FROM profiles";
    
    $query = $pdo_object->prepare($sql);
    
    $query->execute();
    //ここでPDOstatementインスタンス（今回は$query）に結果セットが関連付けられる　一種の仮想的なテーブルで、変数そのものの中に格納されるわけではないのに注意
    
    //$連想配列の入れ物 = $ステートメントハンドラ（PDOstatementインスタンス）->fetchallメソッド(PDO::FETCH_* 定数)
    $result = $query->fetchall(PDO::FETCH_ASSOC);
    
    var_dump($result);
    echo '<br>';
    //ちなみに今回は全部stringになってる
    foreach ($result as $value){
        $prof = $value;
        foreach ($prof as $key => $value){
            echo $key .'：'. $value .'<br>';
        }
    }
}catch(PDOexception $Exception){
    die('接続に失敗しました：'. $Exception -> getMessage());
}

$pdo_object = null;

// SELECT * FROM profiles
