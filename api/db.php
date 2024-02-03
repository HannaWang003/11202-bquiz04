<?php
date_default_timezone_set("Asia/Taipei");
session_start();
function dd($ary){
    echo "<pre>";
    print_r($ary);
    echo "</pre>";
}
function to($url){
    header("location:$url");
}
class DB{
    protected $table;
    protected $dsn = "mysql:host=localhost;charset=utf8;dbname=db3304";
    protected $pdo;
    function __construct($table){
        $this->table = $table;
        $this->pdo = new PDO($this->dsn,'root','');
    }
}


?>