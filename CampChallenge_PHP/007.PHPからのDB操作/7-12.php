<!--
以下の課題を、PHPからのPDOを用いて実現してください。検索用のフォームを用意し、名前、年齢、誕生日を使った複合検索ができるようにしてください
SELECT * FROM profiles WHERE name LIKE '%茂%' OR age=48 OR birthday LIKE '%05%';
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
if (empty($_POST)) {
    echo ('
    <form method="post" action="' . $self . '">
    検索：<br>
        名前<input type="text" name="name">
        年齢<input type="text" name="age">
        誕生日<input type="text" name="birthday">
        <input type="submit" value="検索">
    </form>
    ');
}else{
    $search = array(
        'name' => $_POST['name'],
        'age' => $_POST['age'],
        'birthday' => $_POST['birthday']
    );

    try{
        $pdo_object = new PDO('mysql:host=localhost;dbname=Challenge_db;charset=utf8', 'Yuiko', 'mypassword');
        $sql = "SELECT * FROM profiles WHERE name LIKE :namepart AND age LIKE :agepart AND birthday LIKE :birthdaypart";
        $query = $pdo_object->prepare($sql);
        $namequery = '%'. $search['name']. '%';
        $query->bindValue(':namepart', $namequery);
        $agequery = '%'. $search['age']. '%';
        $query->bindValue(':agepart', $agequery);
        $birthdayquery = '%'. $search['birthday']. '%';
        $query->bindValue(':birthdaypart', $birthdayquery);
        $query->execute();
        $result = $query->fetchall(PDO::FETCH_ASSOC);

        if (empty($result)){
            echo '見つかりませんでした';
        }else{
            echo '該当するのは以下です<br>';
            foreach ($result as $value){
                $prof = $value;
                foreach ($prof as $key => $value){
                    echo $key .'：'. $value .'<br>';
                }
            }
        }
        $search = null;
        // どこで空にしておくべきなのかわからん

    }catch(PDOexception $Exception){
        die('データベースへの接続に失敗しました：'. $Exception->getMessage());
    }
}

$pdo_object = null;
?>

</body>
</html>

