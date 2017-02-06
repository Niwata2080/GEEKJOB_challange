<?php require_once '../common/defineUtil.php';
require_once '../common/scriptUtil.php'; ?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
      <title>登録画面</title>
</head>
<body>
    <form action="<?php echo INSERT_CONFIRM ?>" method="POST">
    <!--insert_confirm.phpでクッキーに格納した以前の値があればそれぞれのフィールドにあらかじめ描画-->
    名前:
    <input type="text" name="name" value="<?php if(!empty($_COOKIE['name'])){echo $_COOKIE['name'];}?>">
    <br><br>
    
    生年月日:　
    <select name="year">
        <option value="----">----</option>
        <?php //クッキーに以前選択された年があればあらかじめその年を選択　月、日も同様
        for($i=1950; $i<=2010; $i++){ 
            if(!empty($_COOKIE['year']) && $i==$_COOKIE['year']){ ?>
        <option value="<?php echo $i;?>" selected><?php echo $i ;?></option>
            <?php }else{ ?>
        <option value="<?php echo $i;?>"><?php echo $i ;?></option>
            <?php }
        } ?>
    </select>年
    <select name="month">
        <option value="--">--</option>
        <?php
        for($i = 1; $i<=12; $i++){
            if(!empty($_COOKIE['month']) && $i==$_COOKIE['month']){ ?>
        <option value="<?php echo $i;?>" selected><?php echo $i;?></option>
            <?php }else{ ?>
        <option value="<?php echo $i;?>"><?php echo $i ;?></option>
            <?php } 
        } ?>
    </select>月
    <select name="day">
        <option value="--">--</option>
        <?php
        for($i = 1; $i<=31; $i++){
            if(!empty($_COOKIE['day']) && $i==$_COOKIE['day']){ ?>
        <option value="<?php echo $i;?>" selected><?php echo $i;?></option>
            <?php }else{ ?>
        <option value="<?php echo $i;?>"><?php echo $i ;?></option>
            <?php } 
        } ?>
    </select>日
    <br><br>

    種別:
    <br>
    <input type="radio" name="type" value="エンジニア" <?php if(empty($_COOKIE['type']) || $_COOKIE['type'] == 'エンジニア'){echo 'checked';} ?>>エンジニア<br>
    <input type="radio" name="type" value="営業" <?php if(!empty($_COOKIE['type']) && $_COOKIE['type'] == '営業'){echo 'checked';} ?>>営業<br>
    <input type="radio" name="type" value="その他" <?php if(!empty($_COOKIE['type']) && $_COOKIE['type'] == 'その他'){echo 'checked';} ?>>その他<br>
    <br>
    
    電話番号:
    <input type="text" name="tell" value="<?php if(!empty($_COOKIE['tell'])){echo $_COOKIE['tell'];}?>">
    <br><br>

    自己紹介文
    <br>
    <textarea name="comment" rows=10 cols=50 style="resize:none" wrap="hard"><?php if(!empty($_COOKIE['comment'])){echo $_COOKIE['comment'];} ?></textarea><br><br>
    
    <input type="submit" name="btnSubmit" value="確認画面へ">
    </form>
    <?php echo '<br>' . return_top();  //「トップへ戻る」を実装 
    var_dump($_POST);
    var_dump($_COOKIE);?>
</body>
</html>
