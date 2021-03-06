<?php require_once '../common/defineUtil.php';
require_once '../common/scriptUtil.php';
foreach ($_POST as $key => $value) {
    setcookie("$key", $value);  //前ページで入力された情報をクッキーに格納
} ?>
<!DOCTYPE html>
<html lang="ja">

<head>
<meta charset="UTF-8">
      <title>登録確認画面</title>
</head>
  <body>
    <?php
    if(!empty($_POST['name']) && !empty($_POST['year']) && $_POST['year']!=="----" && $_POST['month']!=="--" && $_POST['day']!=="--" && !empty($_POST['type']) //生年月日が「----」の時に弾く条件を付加
            && !empty($_POST['tell']) && !empty($_POST['comment'])){
        
        $post_name = $_POST['name'];
        //date型にするために1桁の月日を2桁にフォーマットしてから格納
        $post_birthday = $_POST['year'].'-'.sprintf('%02d',$_POST['month']).'-'.sprintf('%02d',$_POST['day']);
        //int型にする？
        $post_type = $_POST['type'];
        $post_tell = $_POST['tell'];
        $post_comment = $_POST['comment'];

        //セッション情報に格納
        session_start();
        $_SESSION['name'] = $post_name;
        $_SESSION['birthday'] = $post_birthday;
        $_SESSION['type'] = $post_type;
        $_SESSION['tell'] = $post_tell;
        $_SESSION['comment'] = $post_comment;
    ?>

        <h1>登録確認画面</h1><br>
        名前:<?php echo $post_name;?><br>
        生年月日:<?php echo $post_birthday;?><br>
        種別:<?php echo $post_type?><br>
        電話番号:<?php echo $post_tell;?><br>
        自己紹介:<?php echo $post_comment;?><br>

        上記の内容で登録します。よろしいですか？

        <form action="<?php echo INSERT_RESULT ?>" method="POST">
          <input type="hidden" name="confirmed" value="true">
          <input type="submit" name="yes" value="はい">
        </form>
        <form action="<?php echo INSERT ?>" method="POST">
            <input type="submit" name="no" value="登録画面に戻る">
        </form>
        
    <?php }else{ ?>
        <h1>入力項目が不完全です</h1><br>
        <?php  //未入力のフィールドそれぞれに対して警告を出す
        if (empty($_POST['name'])){echo "名前<br>";}
        if (empty($_POST['year']) || $_POST['year']=="----"){echo "生年<br>";}
        if (empty($_POST['month']) || $_POST['month']=="--"){echo "誕生月<br>";}
        if (empty($_POST['day']) || $_POST['day']=="--"){echo "誕生日<br>";}
        if (empty($_POST['type'])){echo "種別<br>";}
        if (empty($_POST['tell'])){echo "電話番号<br>";}
        if (empty($_POST['comment'])){echo "自己紹介<br>";}
        ?>
        が未入力です<br>再度入力を行ってください
        <form action="<?php echo INSERT ?>" method="POST">
            <input type="submit" name="no" value="登録画面に戻る">
        </form>
    <?php }
    echo '<br>' . return_top(); //「トップへ戻る」を実装
    ?>
</body>
</html>