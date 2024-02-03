<?php
include_once "db.php";
if(isset($_POST['ans'])){

    $_SESSION['ans'] = $_POST['ans'];
}
$chkans = $_POST['chkans'];
unset($_POST['chkans']);
if($Admin->count($_POST)==0){
echo "0";
}elseif($chkans!=$_SESSION['ans']){
    echo "1";
}
else{
    echo "2";
}


?>