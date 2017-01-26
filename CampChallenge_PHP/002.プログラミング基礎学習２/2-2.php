<?php
    $lang = 'A';
    $message = '';
    switch ($lang) {
        case 'A':
            $message = '英語';
            break;
        case 'あ':
            $message = '日本語';
            break;
    }
    echo $message;