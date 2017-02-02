<?php
session_start();

require_once '8-4define.php';
require_once '8-4util.php';

//セッションフラグOFFなら
switch ($_SESSION['flag']) {
    case false:
    case null:

        //loginからPOST情報受け取り
        $id = $_POST['id'];
        $pass = $_POST['pass'];
        
        //データベースへの接続を確立　ユーザー認証用
        //IDとパスワードを社員テーブルと比較　AND句で
        try {
            $pdo = create_pdo();  //データベースハンドラ
            
            $sql_admin_user = 'SELECT * FROM ' . DB_TBL_USER . ' WHERE id= ' . $id . " AND password='" . $pass. "'" ;  //！リテラルとスペースの扱い方が解ってなさすぎる！
            //var_dump($sql_admin_user);
            $loginuser = pdo_select($pdo, $sql_admin_user);  //ステートメントハンドラ～fetchまで
            
            $pdo = null;
            
        } catch (Exception $err) {
            $pdo = null;
            echo $err->getMessage();
            exit;
        }
        //var_dump($loginuser);
        switch (empty($loginuser)) {
            case true:
                echo 'ログインできませんでした<br><a href="8-4login.php">トップへもどる</a>';
                break 2; //二重のループを抜けて処理を停止
            default:
                $_SESSION['flag'] = true; //セッションフラグをオンに
                  //一重のループを抜けて直下の処理へ移行
        }

    case true: ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>
<div>
    <h1>在庫管理システム</h1>
    <ul>
        <li><a href="8-4add.php">商品登録</a></li>
        <li><a href="8-4show.php">商品一覧</a></li>
        <li><a href="8-4login.php">ログアウト</a></li>
    </ul>
</div>
</body>
</html>
<?php } ?>
