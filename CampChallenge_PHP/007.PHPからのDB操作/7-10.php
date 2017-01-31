<!--以下の課題を、PHPからのPDOを用いて実現してください。profileIDで指定したレコードを削除できるフォームを作成してください
DELETE FROM profiles WHERE profilesid=n;
-->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>
<?php
$self = htmlentities($_SERVER['SCRIPT_NAME']);
if (empty($_POST)) { //条件がこれでいいのか不明
    echo ('
    <form method="post" action="' . $self . '">
        ID<input type="text" name="id" placeholder="0">
        <input type="submit" value="削除">
    </form>
    ');
}else{
    $deleteid = $_POST['id'];
    try{
        $pdo_object = new PDO('mysql:host=localhost;dbname=Challenge_db;charset=utf8', 'Yuiko', 'mypassword');
        // 消すプロフィールの文字列だけ先に撮っておく-出来ない？
        $sql = "SELECT * FROM profiles WHERE profilesid=:profilesID";
        $query = $pdo_object->prepare($sql);
        $query->bindValue(':profilesID', $deleteid);
        $query->execute();
        $record = $query->fetchall(PDO::FETCH_ASSOC);
        var_dump($record);
        
        $sql = "DELETE FROM profiles WHERE profilesid=:profilesID";
        $query = $pdo_object->prepare($sql);
        $query->bindValue(':profilesID', $deleteid);
        $query->execute(); //ここで$query自身にはtrueかfalseが返るはず
        if (!$query){
            echo '削除できませんでした';
        }else{
            echo '以下を削除しました<br>';
            foreach ($record as $key => $value){
                echo $key .'：'. $value .'<br>'; //何故かNotice: Array to string conversionが出る var_dumpはできるのに
            }
        }
        $deleteid = null;
        // どこで空にしておくべきなのかわからん
    }catch(PDOexception $Exception){
        die('データベースへの接続に失敗しました：'. $Exception->getMessage());
    }
}

$pdo_object = null;
?>

</body>
</html>
