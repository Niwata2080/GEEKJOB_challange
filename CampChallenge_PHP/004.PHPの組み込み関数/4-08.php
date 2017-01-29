<?php
$fp = fopen('myself.txt', 'w');
fwrite($fp, '庭田です。よろしくお願いします');
fclose($fp);
//ファイルに自己紹介を書き出し、保存してください。
