<?php

require_once '7-13-define.php';

//接続を確立、PDOインスタンスを生成
function create_pdo() {
    $dsn = DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_DBNAME . ';charset=utf8';
    $obj_pdo = new PDO($dsn, DB_USER, DB_PWD);
    $obj_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $obj_pdo;
}

//検索、ステートメントハンドラ～fetchまで
function pdo_select($obj_pdo, $sql, $params=array()) {
  $stmt = $obj_pdo->prepare($sql);

  foreach($params as $key=>$val) {
    $stmt->bindValue($key, $val);
  }

  $stmt->execute();

  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

//追加　同上
function pdo_insert($obj_pdo, $sql, $params=array()) {
    $stmt = $obj_pdo->prepare($sql);
    
    foreach($params as $key=>$val) {
        $stmt->bindValue($key, $val);
    }
    
    $stmt->execute();
    
    return $stmt->rowCount();
}

