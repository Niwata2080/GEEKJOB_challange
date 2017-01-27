<?php
$g_number = 3;
function baibai(){
    static $l_number = 1;
    global $g_number;
    echo $l_number . '回目　' . $g_number . '<br>';
    $g_number *= 2;
    $l_number++;
}
for ($i = 1; $i <= 20; $i++) {
    baibai();
}
