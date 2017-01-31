<!--以下の課題を、PHPからのPDOを用いて実現してください。フォームからデータを挿入できる処理を構築してください。-->
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
        名前<input type="text" name="name" placeholder="名前">
        電話番号<input type="text" name="tell" placeholder="XXX-XXXX-XXXX">
        年齢<input type="text" name="age" placeholder="20">
        誕生日<input type="text" name="birthday" placeholder="YYYY-MM-DD">
        <input type="submit" value="追加">
    </form>
    ');
}else{
    $addprofile = array(
        'id' => $_POST['id'],
        'name' => $_POST['name'],
        'tell' => $_POST['tell'],
        'age' => $_POST['age'],
        'birthday' => $_POST['birthday']
    );
    try{
        $pdo_object = new PDO('mysql:host=localhost;dbname=Challenge_db;charset=utf8', 'Yuiko', 'mypassword');
        $sql = "INSERT INTO profiles VALUES(:profilesID, :name, :tell, :age, :birthday)";
        $query = $pdo_object->prepare($sql);
        $query->bindValue(':profilesID', $addprofile['id']);
        $query->bindValue(':name', "$addprofile[name]");  //キーにつける引用符省いてるけどいいのか？（そうしないと動かなかった）
        $query->bindValue(':tell', "$addprofile[tell]");
        $query->bindValue(':age', $addprofile['age']);
        $query->bindValue(':birthday', "$addprofile[birthday]");
        $query->execute(); //ここで$query自身にはtrueかfalseが返るはず
        $result = $query->fetchall(PDO::FETCH_ASSOC);
        if (!$query){
            echo '追加できませんでした';
        }else{
            echo '以下を追加しました<br>';
            foreach ($addprofile as $key => $value){
                echo $key .'：'. $value .'<br>';
            }
        }
        $addprofile = null;
        // どこで空にしておくべきなのかわからん
    }catch(PDOexception $Exception){
        die('データベースへの接続に失敗しました：'. $Exception->getMessage());
    }
}

$pdo_object = null;
?>

</body>
</html>
