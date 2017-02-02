<?php
session_start();

require_once '8-4define.php';
require_once '8-4util.php';

$errflg = false;
$isSubmit = false;

//セッションフラグOFFなら警告
if ($_SESSION['flag'] !== true) {
    echo 'ログインしてください！<br><a href="8-4login.php">トップへもどる</a>';
}else{
//フラグONなら
    //submit後の時
    if (isset($_POST[ADD_PAGE_SUBMIT])) {
        $isSubmit = true;
        
        if (!empty($_POST['goodsid'])) {
            
            $goodsid = $_POST['goodsid'];
            $goodsname = $_POST['goodsname'];
            $price = $_POST['price'];
            $qty = $_POST['qty'];

            $sql = 'INSERT INTO ' . DB_TBL_STOCK . '(id, name, price, qty) ';
            $sql .= 'VALUES (:id, :name, :price, :qty)';  //プレースホルダ

            $reg_param = array();
            $reg_param[':id'] = $goodsid;
            $reg_param[':name'] = $goodsname;
            $reg_param[':price'] = $price;
            $reg_param[':qty'] = $qty;
            
            try {
                $pdo = create_pdo();
                $users = pdo_insert($pdo, $sql, $reg_param);  //util参照
                $pdo = null;
            } catch (Exception $ex) {
                $pdo = null;
                echo $ex->getMessage();
                exit;
            }
        } else {
            $errflg = true;
        }
//submit前の時
    } ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>
<div>
    <h1>在庫管理システム―商品登録</h1>
<?php
    if ($isSubmit == true && $errflg == false ) {
?>

<p><?=MSG_REGIST_OK ?></p>
<a href="8-4main.php">トップへ戻る</a>

<?php
    } else {
        if ($errflg == true) {
            echo '<p>'.MSG_INPUT_ERR.'</p>';
        } else {
            echo '<p>商品IDは必須項目です。</p>';
        }?>
    <form action="8-4add.php" method="post">
    <ul>
        <li>商品ID：
        <input type="text" name="goodsid" value="<?php if ($isSubmit == true && !empty($_POST['goodsid'])) { echo $_POST['goodsid']; } ?>"></li>
        <li>品名：
        <input type="text" name="goodsname" value="<?php if ($isSubmit == true && !empty($_POST['goodsname'])) { echo $_POST['goodsname']; } ?>"></li>
        <li>単価：
            <input type="text" name="price" value="<?php if ($isSubmit == true && !empty($_POST['price'])) { echo $_POST['price']; } ?>"></li>
        <li>数量：
            <input type="text" name="qty" value="<?php if ($isSubmit == true && !empty($_POST['qty'])) { echo $_POST['qty']; } ?>"></li>
        <li><input type="submit" name="<?=ADD_PAGE_SUBMIT ?>" value="登録"></li>
    </ul>
    </form>
</div>
</body>
</html>
    <?php }
}
?>


