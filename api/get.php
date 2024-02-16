<?php
include_once "db.php";
$DB = ${ucfirst($_POST['table'])};
$all = $DB->all(['big_id' => $_POST['big_id']]);
echo json_encode($all);
