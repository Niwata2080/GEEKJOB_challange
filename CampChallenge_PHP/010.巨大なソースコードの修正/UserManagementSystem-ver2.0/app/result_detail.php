<?php 
require_once '../common/defineUtil.php';
require_once '../common/scriptUtil.php';
require_once '../common/dbaccesUtil.php';
?>
<!DOCTYPE html>
<html lang="ja">

<head>
<meta charset="UTF-8">
      <title>ユーザー情報詳細画面</title>
</head>
  <body>
    <?php
    $result = profile_detail($_GET['id']);
    //エラーが発生しなければ表示を行う
    if(is_array($result)){
        session_start();
        //↑でGETのidを使って取ったレコードをセッションに格納
        $_SESSION['result'] = $result;
        //birthday文字列を年月日に分解、改めて格納
        $pieces = explode("-", $result[0]['birthday']);
        $_SESSION['result'][0]['year'] = $pieces[0];
        $_SESSION['result'][0]['month'] = $pieces[1];
        $_SESSION['result'][0]['day'] = $pieces[2];
    ?>
      
    <h1>詳細情報</h1>
    名前:<?php echo $result[0]['name'];?><br>
    生年月日:<?php echo $result[0]['birthday'];?><br>
    種別:<?php echo ex_typenum($result[0]['type']);?><br>
    電話番号:<?php echo $result[0]['tell'];?><br>
    自己紹介:<?php echo $result[0]['comment'];?><br>
    登録日時:<?php echo date('Y年n月j日　G時i分s秒', strtotime($result[0]['newDate'])); ?><br>
    
    <form action="<?php echo UPDATE; ?>" method="POST">
        <input type="submit" name="update" value="変更"style="width:100px">
        <input type="hidden" name="mode" value="UPDATE">
    </form>
    <form action="<?php echo DELETE; ?>" method="POST">
        <input type="submit" name="delete" value="削除"style="width:100px">
        <input type="hidden" name="mode" value="DELETE">
    </form>
    <?php
    }else{
        echo 'データの検索に失敗しました。次記のエラーにより処理を中断します:'.$result;
    } ?>
    <!--保存された検索条件を使って戻る-->
    <form action="<?php echo SEARCH_RESULT; ?>" method="GET">
        <input type="submit" name="result" value="検索結果へ戻る"style="width:100px">
        <input type="hidden" name="name" value="<?php echo $_SESSION['sname'];?>">
        <input type="hidden" name="year" value="<?php echo $_SESSION['syear'];?>">
        <input type="hidden" name="type" value="<?php echo $_SESSION['stype'];?>">
        <input type="hidden" name="mode" value="SEARCHING">
    </form>
    <?php
    echo return_top(); 
    ?>
  </body>
</html>
