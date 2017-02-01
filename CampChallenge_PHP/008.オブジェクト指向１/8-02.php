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

$sheep = new animal();
$sheep->setProf(0, '日本');
$sheep->showProf();
