<?php
/*在庫管理システムを作成します。
まず、DBにユーザー情報管理テーブルと、商品情報登録テーブルを作成してください。
その上で、下記機能を実現してください。
①ユーザーのログイン・ログアウト機能
②商品情報登録機能
③商品一覧機能
※各テーブルの構成は各自の想像で作ってみてください。
*/
session_start();
$_SESSION['flag'] = false;
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
    <form action="8-4main.php" method="post">
        <ul style="list-style-type: none">
        <li>社員ID</li>
        <li><input type="text" name="id"></li>
        <li>パスワード</li>
        <li><input type="password" name="pass"><li>
        <li><input type="submit"></li>
        </ul>
    </form>
</div>
</body>
</html>
