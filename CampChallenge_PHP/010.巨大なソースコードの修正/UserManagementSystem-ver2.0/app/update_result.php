<?php 
require_once '../common/defineUtil.php';
require_once '../common/scriptUtil.php';
require_once '../common/dbaccesUtil.php';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
      <title>更新結果画面</title>
</head>
  <body>
    <?php
    if(!$_POST['mode']=="RESULT"){
        echo 'アクセスルートが不正です。もう一度トップページからやり直してください<br>';
    }else{
        session_start();
        //ポストの存在チェックとセッションに値を格納しつつ、連想配列にポストされた値を格納
        $updated_values = array(
                                'name' => bind_p2s('name'),
                                'year' => bind_p2s('year'),
                                'month' =>bind_p2s('month'),
                                'day' =>bind_p2s('day'),
                                'type' =>bind_p2s('type'),
                                'tell' =>bind_p2s('tell'),
                                'comment' =>bind_p2s('comment'));
        $name = $_SESSION['name'];
        //date型にするために1桁の月日を2桁にフォーマットしてから格納
        $birthday = $_SESSION['year'].'-'.sprintf('%02d',$_SESSION['month']).'-'.sprintf('%02d',$_SESSION['day']);
        $type = $_SESSION['type'];
        $tell = $_SESSION['tell'];
        $comment = $_SESSION['comment'];
        
        $result = update_profile($_POST['id'], $name, $birthday, $type, $tell, $comment);
        //エラーが発生しなければ表示を行う
        if(!isset($result)){
        ?>
        <h1>更新確認</h1>
        名前:<?php echo $name;?><br>
        生年月日:<?php echo $birthday;?><br>
        種別:<?php echo ex_typenum($type);?><br>
        電話番号:<?php echo $tell;?><br>
        自己紹介:<?php echo $comment;?><br><br>
        以上の内容で更新しました。<br>
        <?php
        }else{
            echo 'データの更新に失敗しました。次記のエラーにより処理を中断します:'.$result;
        } ?>
    <form action="<?php echo RESULT_DETAIL; ?>" method="GET">
      <input type="hidden" name="id" value="<?php echo $_POST['id']; ?>">
      <input type="submit" name="NO" value="詳細画面に戻る"style="width:100px">
    </form>
    <?php
    }
    echo return_top(); 
    ?>
  </body>
</html>
