<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>入力フォーム</title>
</head>
<body>
    <form action="5-05saved.php" method="post">
        名前　<input type="text" name="splName" value="
<?php
if (isset($_SESSION['name']) == true) {
    echo $_SESSION['name'];
}
?>"><br>
        性別　<input type="radio" name="splGender" value = 0 
<?php
if (isset($_SESSION['gender']) == false || $_SESSION['gender'] == 0) {
    echo 'checked';
}
        ?>
        >男　<input type="radio" name="splGender" value = 1 
<?php
if (isset($_SESSION['gender']) == true && $_SESSION['gender'] == 1) {
    echo 'checked';
}
?>
        >女<br>
        趣味　<textarea name= "splHobby">
<?php
if (isset($_SESSION['hobby']) == true) {
    echo $_SESSION['hobby'];
}
?></textarea><br>
        <input type="submit">
    </form>
</body>
</html>
