<?php
$name = $_POST['splName'];
$gender = $_POST['splGender'];
$hobby = $_POST['splHobby'];

session_start();
$_SESSION['name'] = $name;
$_SESSION['gender'] = $gender;
$_SESSION['hobby'] = $hobby;

echo '保存しました！';
