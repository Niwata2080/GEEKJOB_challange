<?php require_once '../common/scriptUtil.php'; ?>
<?php require_once '../common/dbaccesUtil.php'; ?>

<!DOCTYPE html>
<html lang="ja">

<head>
<meta charset="UTF-8">
      <title>登録結果画面</title>
</head>
<body>

    <?php
    if (!empty($_POST['confirmed']) && $_POST['confirmed'] == true){ //insert_confirmから正しく飛んだ場合にのみ動作
        session_start();
        $name = $_SESSION['name'];
        $birthday = $_SESSION['birthday'];
        $type = $_SESSION['type'];
        $tell = $_SESSION['tell'];
        $comment = $_SESSION['comment'];
        
        try{  //ステートメントの準備、バインド、実行まで正しく行われた場合のみ結果を表示
            go_insert($name, $birthday, $tell, $type, $comment); ?>
        <h1>登録結果画面</h1><br>
        名前:<?php echo $name;?><br>
        生年月日:<?php echo $birthday;?><br>
        種別:<?php echo $type?><br>
        電話番号:<?php echo $tell;?><br>
        自己紹介:<?php echo $comment;?><br>
        以上の内容で登録しました。<br>

        <?php }catch (PDOexception $ex) {  //PDO::ERRMODE_EXCEPTIONが自動で例外を投げてくれる　PDO拡張モジュール全体（抽象化レイヤー）の中に、PDOStatementインスタンスも含まれるかららしい
            echo'データの挿入に失敗しました:'.$ex->getMessage();
            $insert_db = null;  //接続オブジェクトを破棄
        }
    }else{  //直リンクなら弾く
        echo 'ユーザー情報登録を行って下さい！<br>';
    }
    echo return_top(); ?>
    
</body>

</html>
