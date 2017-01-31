<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>
<?php
$self = htmlentities($_SERVER['SCRIPT_NAME']);
if (empty($_POST['search'])) {  //空かどうかの判定はemptyが簡単
    echo ('
    <form method="post" action="' . $self . '">
    検索：
        <input type="text" name="search">
        <input type="submit" value="検索">
    </form>
    ');
}else{
    $search = $_POST['search'];
    try{
        $pdo_object = new PDO('mysql:host=localhost;dbname=Challenge_db;charset=utf8', 'Yuiko', 'mypassword');
        $sql = "SELECT * FROM profiles WHERE name LIKE :partofname";
        $query = $pdo_object->prepare($sql);
        $query->bindValue(":partofname", "%$search%"); //変数の展開（ダブルクオートで囲う）でハマった
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

