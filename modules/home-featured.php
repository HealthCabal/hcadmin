<?php

require_once('../classes/config.php');
require_once('../classes/posts.php');


$featured = $_REQUEST['id'];

if (isset($_REQUEST["home_featured"])) {
    $query = "UPDATE hc_posts SET home_featured = 1 WHERE ID =  $featured";

    $conn->query($query);
?>
    <script>
        alert('Post set as home featured')
    </script>
<?php
    header("location: ../article-list.php");
} else {
    $query = "UPDATE hc_posts SET post_home_hero = 0 WHERE post_home_hero = 1";

    $conn->query($query);

    $changeFeatured = "UPDATE hc_posts SET post_home_hero = 1 WHERE ID = $featured";
    //die($changeFeatured);
    $conn->query($changeFeatured);
?>
    <script>
        alert('Post set as home featured')
    </script>
<?php
    header("location: ../article-list.php");
}
