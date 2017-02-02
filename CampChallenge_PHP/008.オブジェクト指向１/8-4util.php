<?php

require_once '8-4define.php';

//データベースハンドラ／PDOインスタンス
function create_pdo() {
    $dsn = DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_DBNAME . ';charset=utf8';
    $obj_pdo = new PDO($dsn, DB_USER, DB_PWD);
    $obj_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  //エラーが出たら例外投げる
    return $obj_pdo;
}


function pdo_select($obj_pdo, $sql, $params=array()) {  //引数で各プリペアドステートメント引っ張る
  $stmt = $obj_pdo->prepare($sql);  //ステートメントハンドラ、PDOstatementインスタンスに化ける

  foreach($params as $key=>$val) {
    $stmt->bindValue($key, $val);
  }

  $stmt->execute();

  return $stmt->fetchAll(PDO::FETCH_ASSOC); //自分自身に結果返す
}

function pdo_insert($obj_pdo, $sql, $params=array()) {
    $stmt = $obj_pdo->prepare($sql);
    
    foreach($params as $key=>$val) {
        $stmt->bindValue($key, $val);  //VALUEのプレースホルダにバインド
    }
    
    $stmt->execute();
    
    return $stmt->rowCount();
}
