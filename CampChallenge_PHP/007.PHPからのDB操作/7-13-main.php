<?php
require_once '7-13-define.php';
require_once '7-13-util.php';

function get_select_subjects($select='', $subjects=array()) {
    $arrSelect = explode(',', $select);
    $selectName = array();
    
    foreach($arrSelect as $id) {
        foreach($subjects as $val) {
            if ($val['id'] == $id) {
                $selectName[] = $val['name'];
                break;
            }
        }
    }
    
    return implode(', ', $selectName);
}
// データベースとの接続
try {
    $pdo = create_pdo();// utilからnew命令を呼んでる

    $sql_select_users = 'SELECT * FROM ' . DB_TBL_USER; // プリペアドステートメント
    $users = pdo_select($pdo, $sql_select_users); //ステートメントハンドラ～fetchまで　utilのユーザー定義関数
    $sql_select_users = 'SELECT * FROM ' . DB_TIMETBL . ' WHERE week = "月" ';
    $mon = pdo_select($pdo, $sql_select_users);
    $sql_select_users = 'SELECT * FROM ' . DB_TIMETBL . ' WHERE week = "火" ';
    $tue = pdo_select($pdo, $sql_select_users);
    $sql_select_users = 'SELECT * FROM ' . DB_TIMETBL . ' WHERE week = "水" ';
    $wed = pdo_select($pdo, $sql_select_users);
    $sql_select_users = 'SELECT * FROM ' . DB_TIMETBL . ' WHERE week = "木" ';
    $thu = pdo_select($pdo, $sql_select_users);
    $sql_select_users = 'SELECT * FROM ' . DB_TIMETBL . ' WHERE week = "金" ';
    $fri = pdo_select($pdo, $sql_select_users);

    $sql_select_subjects = 'SELECT * FROM ' . DB_MST_SUBJECT;
    $subjects = pdo_select($pdo, $sql_select_subjects);
    
    $pdo = null;
    
} catch (Exception $err) {
    $pdo = null;
    echo $err->getMessage();
    exit;
}

?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>PDO課題0</title>
        <meta charset="UTF-8">
        <style>
            body {
                font-family:"ヒラギノ角ゴ Pro W3", "Hiragino Kaku Gothic Pro", "メイリオ", Meiryo, Osaka, sans-serif;
                fontsize:14px;
            }
            ul li {
                display: inline;
            }
            table tr th {
                text-align: center;
            }
        </style>
    </head>
    <body>
        <h1>○×塾　時間割</h1>
        <ul>
            <li>・<a href="7-13-user.php" target="_self">時間割登録</a></li>
            <li>・<a href="7-13-subject.php" target="_self">科目登録</a></li>
        </ul>
        <p></p>
        <hr>
        <table border="1">
            <tr>
                <th width="100"></th>
                <th width="100">月</th>
                <th width="100">火</th>
                <th width="100">水</th>
                <th width="100">木</th>
                <th width="100">金</th>
            </tr>
                <td>1</td>
                <?php
                foreach($mon as $value){
                    echo "<td>" .$value['name']. $value['subjects']. "</td>";
                }
                ?>
            <tr>
                <td>2</td>
                <?php
                foreach($tue as $value){
                    echo "<td>" .$value['name']. $value['subjects']. "</td>";
                }
                ?>
            </tr>
            <tr>
                <td>3</td>
                <?php
                foreach($wed as $value){
                    echo "<td>" .$value['name']. $value['subjects']. "</td>";
                }
                ?>
            </tr>
                <td>4</td>
                <?php
                foreach($thu as $value){
                    echo "<td>" .$value['name']. $value['subjects']. "</td>";
                }
                ?>
            <tr>
                <td>5</td>
                <?php
                foreach($fri as $value){
                    echo "<td>" .$value['name']. $value['subjects']. "</td>";
                }
                ?>
            </tr>
        </table>
    </body>
</html>