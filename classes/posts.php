<?php

require_once("crud.php");

class Posts extends Crud
{

    function createPost($conn, $tableName, $data, $columns)
    {
        $tableName = "hc_posts";
        if ($this->storeData($conn, $tableName, $data, $columns) == "success") {
            echo "postcreated";
        } else {
            echo "postcreationfailed";
        }
    }

    function unpublishPost($conn, $id)
    {
        $query = "UPDATE hc_posts SET post_status = 0 WHERE ID = $id";
        if($conn->query($query) == TRUE){
            return true;
        } else {
            return false;
        }
    }



function publishPost($conn, $id)
    {
        $query = "UPDATE hc_posts SET post_status = 1 WHERE ID = $id";
        if($conn->query($query) == TRUE){
            return true;
        } else {
            return false;
        }
    }
}



$doPosts = new Posts();
