<?php 
require_once '../common/defineUtil.php';
require_once '../common/scriptUtil.php';
require_once '../common/dbaccesUtil.php';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
      <title>検索結果画面</title>
</head>
    <body>
    <?php
    //入力画面から「検索」ボタンを押した場合のみ処理を行う
    if(!$_GET['mode']=="SEARCHING"){
        echo 'アクセスルートが不正です。もう一度トップページからやり直してください<br>';
    }else{
        //検索条件保存のため、セッションにGETの値を格納
        session_start();
        $_SESSION['sname'] = $_GET['name'];
        $_SESSION['syear'] = $_GET['year'];
        $_SESSION['stype'] = $_GET['type'];
    ?>
        <h1>検索結果</h1>
        <table border=1>
            <tr>
                <th>名前</th>
                <th>生年</th>
                <th>種別</th>
                <th>登録日時</th>
            </tr>
        <?php
        var_dump($_GET);
        var_dump($_SESSION);
        $result = null;
        if(empty($_GET['name']) && empty($_GET['year']) && empty($_GET['type'])){
            $result = search_all_profiles();
        }else{
            $result = search_profiles($_GET['name'],$_GET['year'],$_GET['type']);
        }
        foreach($result as $value){
        ?>
            <tr>
                <td><a href="<?php echo RESULT_DETAIL ?>?id=<?php echo $value['userID']?>"><?php echo $value['name']; ?></a></td>
                <td><?php echo $value['birthday']; ?></td>
                <td><?php echo ex_typenum($value['type']); ?></td>
                <td><?php echo date('Y年n月j日　G時i分s秒', strtotime($value['newDate']));; ?></td>
            </tr>
        <?php
        }
        ?>
        </table>
    <?php
    }
    echo return_top(); ?>
</body>
</html>
