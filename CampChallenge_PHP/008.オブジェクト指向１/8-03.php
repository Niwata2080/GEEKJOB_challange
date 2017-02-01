<?php
class animal {
    public $age = 0;
    public $wherefrom = "";
    public function setProf($a, $w){
        //自分自身で定義した変数には必ず$thisを用いてアクセスする
        $this->age = $a; //thisインスタンス（自分自身）の中のageプロパティ
        $this->wherefrom = $w;
    }
    public function showProf(){
        echo $this->age . "歳<br>" . "原産地　" . $this->wherefrom ;
    }
}

class alpaca extends animal {
    public function clear(){
        $this->age = null;
        $this->wherefrom = null;
    }
    private function see(){
        echo 'こっち見んな';
    }
}

$Dolly = new alpaca();
$Dolly->clear();
$Dolly->showProf();
$Dolly->see(); //privateなのでエラーになる
