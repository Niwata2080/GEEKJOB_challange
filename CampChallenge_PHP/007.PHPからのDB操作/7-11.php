<!--以下の課題を、PHPからのPDOを用いて実現してください。profileIDで指定したレコードの、profileID以外の要素をすべて上書きできるフォームを作成してください
UPDATE profiles SET name='吉田　茂' WHERE profilesID=2;
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
        ID<input type="text" name="id" placeholder="0">を<br>
        以下で上書き<br>
        名前<input type="text" name="name" placeholder="名前">
        電話番号<input type="text" name="tell" placeholder="XXX-XXXX-XXXX">
        年齢<input type="text" name="age" placeholder="20">
        誕生日<input type="text" name="birthday" placeholder="YYYY-MM-DD">
        <input type="submit" value="更新">
    </form>
    ');
}else{
    $update = array( //配列をidとそれ以外で分けたほうがいいんだろうか
        'id' => $_POST['id'],
        'name' => $_POST['name'],
        'tell' => $_POST['tell'],
        'age' => $_POST['age'],
        'birthday' => $_POST['birthday']
    );
    try{
        $pdo_object = new PDO('mysql:host=localhost;dbname=Challenge_db;charset=utf8', 'Yuiko', 'mypassword');
        $sql = "UPDATE profiles SET name=:name, tell=:tell, age=:age, birthday=:birthday WHERE profilesID=:profilesID";
        $query = $pdo_object->prepare($sql);
        $query->bindValue(':profilesID', $update['id']);
        $query->bindValue(':name', "$update[name]");  //キーにつける引用符省いてるけどいいのか？（そうしないと動かなかった）
        $query->bindValue(':tell', "$update[tell]");
        $query->bindValue(':age', $update['age']);
        $query->bindValue(':birthday', "$update[birthday]");
        $query->execute();
        $result = $query->fetchall(PDO::FETCH_ASSOC);
        if (!$query){
            echo '更新できませんでした';
        }else{
            echo '以下を更新しました<br>';
            foreach ($update as $key => $value){
                echo $key .'：'. $value .'<br>';
            }
        }
        $update = null;
        // どこで空にしておくべきなのかわからん
    }catch(PDOexception $Exception){
        die('データベースへの接続に失敗しました：'. $Exception->getMessage());
    }
}

$pdo_object = null;
?>

</body>
</html>
