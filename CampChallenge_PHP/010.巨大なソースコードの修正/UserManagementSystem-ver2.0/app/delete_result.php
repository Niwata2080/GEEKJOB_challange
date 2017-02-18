<?php 
require_once '../common/defineUtil.php';
require_once '../common/scriptUtil.php';
require_once '../common/dbaccesUtil.php';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
      <title>削除結果画面</title>
</head>
<body>
    <?php
    session_start();
    if(!$_POST['mode']=="RESULT"){
        echo 'アクセスルートが不正です。もう一度トップページからやり直してください<br>';
    }else{
        var_dump($_POST);
        $result = delete_profile($_POST['id']);
        //エラーが発生しなければ表示を行う
        if(!isset($result)){
        ?>
        <h1>削除確認</h1>
        削除しました。<br>
        <?php
        }else{
            echo 'データの削除に失敗しました。次記のエラーにより処理を中断します:'.$result;
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
    }
    echo return_top(); 
    ?>
   </body> 
</body>
</html>
