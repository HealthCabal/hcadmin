<?php
require_once('../classes/config.php');
require_once('../classes/posts.php');

$tableName = "hc_posts";

$id = $_REQUEST['id'];

if($doPosts->unpublishPost($conn, $id) == true){
    header('location:../article-list.php');
} 