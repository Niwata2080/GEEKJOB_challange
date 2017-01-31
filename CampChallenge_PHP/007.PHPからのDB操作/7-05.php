<?php
try{
    $pdo_object = new PDO('mysql:host=localhost;dbname=Challenge_db;charset=utf8', 'Yuiko', 'mypassword');
    
    $sql = "SELECT * FROM profiles WHERE name LIKE :partofname";
    
    $query = $pdo_object->prepare($sql);
    $query->bindValue(':partofname', '%茂%');
    $query->execute();
    
    $result = $query->fetchall(PDO::FETCH_ASSOC);
    
    //var_dump($result);
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

//SELECT * FROM profiles WHERE name LIKE '%茂%';
