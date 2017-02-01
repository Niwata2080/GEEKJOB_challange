<?php

class クラス名 {
    アクセス修飾子 $プロパティ名;

    アクセス修飾子 function メソッド名（引数）
    {
        //処理を記述
    }
}

class Test {
    // No.1　静的プロパティ
    public static $a = 8;
    // No.2　静的メソッド
    public static function sum($b,$c) {
        echo $b + $c;
    }
    // No.3　インスタンスプロパティ
    public $d = 9;
    // No.4　インスタンスメソッド
    public function count() {
        static $e = 0;
        echo $e;
        $e++;
    }
    // No.5　インスタンスメソッド
    public function division($f,$g) {
        echo $f / $g;
    }
}
//No.1とNo.2は、静的プロパティとメソッドになるため、インスタンス化しなくてもアクセスできます。
//No.3とNo.4はインスタンスのプロパティとメソッドになるため、インスタンス化しないとアクセスできないということになります

// No.1 静的プロパティへアクセス
echo Test::$a;

// No.2 静的メソッドへアクセス
Test::sum(2,3);
