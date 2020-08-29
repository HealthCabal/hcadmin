<?php
$localhost = array("127.0.0.1", "::1");
if (in_array($_SERVER['REMOTE_ADDR'], $localhost)) {
    $homeurl = "http://appcabal.devs/";
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "healthcabal";
    $conn = new mysqli($host, $username, $password, $database);
} else {
    $homeurl = "";
    $host = "localhost";
    $username = "hubvtuco_boss";
    $password = "!@mtheb0$$";
    $database = "hubvtuco_hubdb";
    $conn = new mysqli($host, $username, $password, $database);
}



