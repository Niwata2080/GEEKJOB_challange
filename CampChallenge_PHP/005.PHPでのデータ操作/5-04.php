<?php
var_dump($_FILES);
$file_name = "usericon.png";
move_uploaded_file($_FILES['userfile']['tmp_name'], $file_name);
?>
<p>あなたのアイコンはこちらになります。</p>
<?php
echo "<img src=\"usericon.png\" alt=\"サンプル\">";
?>
