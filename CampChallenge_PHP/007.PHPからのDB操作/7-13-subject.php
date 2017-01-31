<?php

require_once '7-13-define.php';
require_once '7-13-util.php';

$errflg = false;
$isSubmit = false;

if (isset($_POST[SUBJECT_PAGE_SUBMIT])) {
    $isSubmit = true;
    
    if (!empty($_POST['name'])) {
        
        $name = $_POST['name'];

        $sql = 'INSERT INTO ' . DB_MST_SUBJECT . '(name) ';
        $sql .= 'Values (:name)';

        $reg_param = array();
        $reg_param[':name'] = $name;
        
        try {
            $pdo = create_pdo();
            $users = pdo_insert($pdo, $sql, $reg_param);
            $pdo = null;
        } catch (Exception $ex) {
            $pdo = null;
            echo $ex->getMessage();
            exit;
        }
    } else {
        $errflg = true;
    }
}

?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>PDO課題0 - SUBJECT</title>
        <meta charset="UTF-8">
        <style>
            body {
                font-family:"ヒラギノ角ゴ Pro W3", "Hiragino Kaku Gothic Pro", "メイリオ", Meiryo, Osaka, sans-serif;
                fontsize:14px;
            }
            ul li {
                display: inline;
            }
        </style>
    </head>
    <body>
        <h2>○×塾　科目登録</h2>
        <?php
            if ($isSubmit == true && $errflg == false ) {
        ?>
        <p><?=MSG_REGIST_OK?></p>
        <a href="7-13-main.php">トップへ戻る</a>
        <?php
            } else {
                if ($errflg == true) {
                    echo '<p>'.MSG_INPUT_ERR.'</p>';
                }
        ?>
        <form action="7-13-subject.php" method="post">
            <table>
                <tr>
                    <td>
                        科目名：
                    </td>
                    <td>
                        <input type="text" name="name" value="<?php if ($isSubmit == true && !empty($_POST['name'])) { echo $_POST['name']; } ?>">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="<?=SUBJECT_PAGE_SUBMIT?>" value="登録">
                    </td>
                </tr>
            </table>
        </form>
        <?php
            }
        ?>
    </body>
</html>