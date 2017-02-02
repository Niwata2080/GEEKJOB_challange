<?php
session_start();

require_once '8-4define.php';
require_once '8-4util.php';

//セッションフラグOFFなら警告
if ($_SESSION['flag'] !== true) {
    echo 'ログインしてください！<br><a href="8-4login.php">トップへもどる</a>';
}else{
//フラグONなら
//データベースへの接続を確立、SELECT *で全部引っ張る
    $selectall = new Select();
    $stocktable = $selectall->goSelect(DB_TBL_STOCK);
    var_dump($selectall);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>
<div>
    <h1>在庫管理システム</h1>
    <h2>在庫一覧</h2>
    <?php if (!empty($stocktable)) { ?>
    <table border="1">
        <tr>
            <th width="100">商品ID</th>
            <th width="300">品名</th>
            <th width="300">単価</th>
            <th width="100">総数</th>
        </tr>
        <?php
            foreach($stocktable as $value) {
        ?>
        <tr>
            <td><?=$value['id']?></td>
            <td><?=$value['name']?></td>
            <td><?=$value['price']?></td>
            <td><?=$value['qty']?></td>
        </tr>
        <?php
            }
        ?>
    </table>
    <?php } else { ?>
    <p>現在登録されている商品はありません。</p>
    <?php } ?>
</div>
</body>
</html>
<?php
} ?>
