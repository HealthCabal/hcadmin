<?php

require_once("crud.php");

class Posts Extends Crud
{

    function createPost($conn, $tableName, $data, $columns)
    {
        $tableName = "hc_posts";
        if($this->storeData($conn, $tableName, $data, $columns)=="success"){
            echo "postcreated";
        } else {
            echo "postcreationfailed";
        }
    }
}



$doPosts = new Posts();