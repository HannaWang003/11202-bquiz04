<?php
include_once "db.php";
$bigs = $Type->all($_GET);
// header("ContentType:application/json");
echo json_encode($bigs);
?>