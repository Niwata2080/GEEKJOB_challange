<?php
$name = $_POST['splName'];
$gender = $_POST['splGender'];
$hobby = $_POST['splHobby'];

echo "名前： $name <br>性別：";
switch ($gender) {
    case 0:
        echo "男 <br>";
        break;
    case 1:
        echo "女 <br>";
        break;
    default:
        echo "未入力 <br>";
}
echo "趣味： $hobby <br>";
// var_dump($_POST);
