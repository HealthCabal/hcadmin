<?php
require_once('../classes/config.php');
require_once('../classes/posts.php');

$tableName = "hc_posts";

$id = $_REQUEST['id'];


if (isset($_REQUEST['publish'])) {
    if ($doPosts->publishPost($conn, $id) == true) {
        header('location:../article-list.php');
    }
} else {
    if ($doPosts->unpublishPost($conn, $id) == true) {
        header('location:../article-list.php');
    }
}
