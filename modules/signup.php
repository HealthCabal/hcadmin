<?php
require_once("../classes/config.php");
require_once("../classes/crud.php");


$data[0] = $_REQUEST['phonenum'];
$data[1] = $_REQUEST['password'];
$data[1] = password_hash($data[1], PASSWORD_DEFAULT);   
$data[2] = $_REQUEST['firstname'];
$data[3] = $_REQUEST['lastname'];

$value = $data[0];
$columns = "user_phone, user_pass, user_fname, user_lname";

$checkUsers->newAccount($conn, $value, $data, $columns);

?>