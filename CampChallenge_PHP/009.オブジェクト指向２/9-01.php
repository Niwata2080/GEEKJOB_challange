<?php

abstract class Base {
    abstract protected function load();
    function show(){ 
        $loaded = $this->load();
        echo '<table border="1">' ;
        foreach($loaded as $key => $record){ 
            if ($key == 0){ 
            echo "<tr>";
                foreach($record as $header => $value){ 
                echo "<th>$header</th>";
                }
            echo "</tr>";
            }else{
            echo "<tr>";
                foreach($record as $value){
                echo "<td>$value</td>";
                }
            echo "</tr>";
            }
        }
        echo "</table>";
    }
}


class Human extends Base {
    private $table = "";
    function __construct($tablename){
        $this->table = $tablename; //！プロパティには＄がつかない！！！
    }
    function load(){
        try{
            //データベースハンドラ
            $pdo_object = new PDO('mysql:host=localhost;dbname=ekimei;charset=utf8', 'root', '');
            
            $sql = "SELECT * FROM " . $this->table;
            //ステートメントハンドラ
            $query = $pdo_object->prepare($sql);
            $query->execute();
            $result = $query->fetchall(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOexception $Exception){
            die('接続に失敗しました：'. $Exception->getMessage());
        }
        $pdo_object = null; //切断
    }
}

class Station extends Base {
    private $table = '';
    function __construct($tablename){
        $this->table = $tablename;
    }
    function load(){
        try{
            //データベースハンドラ
            $pdo_object = new PDO('mysql:host=localhost;dbname=ekimei;charset=utf8', 'root', '');
            
            $sql = "SELECT * FROM " . $this->table;
            //ステートメントハンドラ
            $query = $pdo_object->prepare($sql);
            $query->execute();
            $result = $query->fetchall(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOexception $Exception){
            die('接続に失敗しました：'. $Exception->getMessage());
        }
        $pdo_object = null; //切断
    }
}

$table1 = new Human('members');
$table2 = new Station('stations');

$table1->show();
$table2->show();

