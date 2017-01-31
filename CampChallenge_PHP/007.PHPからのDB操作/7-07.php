<?php
try{
    $pdo_object = new PDO('mysql:host=localhost;dbname=Challenge_db;charset=utf8', 'Yuiko', 'mypassword');
    
    $sql = "UPDATE profiles SET name=:name, age=:age, birthday=:birthday WHERE profilesID=1";
    $query = $pdo_object->prepare($sql);
    $query->bindValue(':name', '松岡 修造');
    $query->bindValue(':age', 48);
    $query->bindValue(':birthday', '1967-11-06');
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

//UPDATE profiles SET name='松岡 修造', age=48, birthday='1967-11-06' WHERE profilesID=1;
//profileID=1のnameを「松岡 修造」に、ageを48に、birthdayを1967-11-06に更新してください
