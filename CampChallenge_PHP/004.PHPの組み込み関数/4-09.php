<?php
$fp = fopen('myself.txt', 'r');
$ftext = fgets($fp);//↑はファイルそのもの、あるいはただのファイルポインタだからちゃんと中身を取る
echo $ftext;
fclose($fp);
//ファイルから自己紹介を読み出し、表示してください。
