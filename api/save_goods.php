<?php
include_once "db.php";
if(!empty($_FILES['img']['tmp_name'])){
    move_uploaded_file($_FILES['img']['tmp_name'],"./img/{$_FILES['img']['name']}");
    $_POST['img']=$_FILES['img']['name'];
}
$_POST['sh']=1;
$_POST['no']=rand(100000,999999);
echo $Goods->save($_POST);
?>