<?php

require_once("../classes/config.php");
require_once("../classes/auth.php");


$columnName = 'user_phone';
$password = $_REQUEST['password'];
$password = $_REQUEST['password'];
$value = $_REQUEST['phone'];
$tableName = "hc_users";
$checkUsers->login($conn, $value, $columnName, $tableName, $password);




?>