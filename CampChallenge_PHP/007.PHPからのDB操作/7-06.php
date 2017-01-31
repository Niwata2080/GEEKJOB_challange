<?php
try{
    $pdo_object = new PDO('mysql:host=localhost;dbname=Challenge_db;charset=utf8', 'Yuiko', 'mypassword');
    
    $sql = "DELETE FROM profiles WHERE profilesID=:profilesID";
    $query = $pdo_object->prepare($sql);
    $query->bindValue('profilesID', 3);
    $query->execute();
    
    $sql = "SELECT * FROM profiles";
    $query = $pdo_object->prepare($sql);
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

//DELETE FROM profiles WHERE profilesID=3;
