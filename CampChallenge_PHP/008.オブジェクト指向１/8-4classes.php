//データベースへの接続を確立　在庫表にアクセス　クラス化するならここ
try {
    $pdo = create_pdo();

    $sql_select_users = 'SELECT * FROM ' . DB_TBL_USER;
    $users = pdo_select($pdo, $sql_select_users);
    
    $sql_select_subjects = 'SELECT * FROM ' . DB_TBL_STOCKS;
    $subjects = pdo_select($pdo, $sql_select_subjects);
    
    $pdo = null;
    
} catch (Exception $err) {
    $pdo = null;
    echo $err->getMessage();
    exit;
}
