<?php
require_once("inc/header.php");
require_once("inc/sidebar.php");

$tableName = "hc_posts";

if (isset($_REQUEST['unpublished'])) {
    $query = "SELECT * FROM $tableName WHERE post_status = 0 ORDER BY id DESC";
} else {
    $query = "SELECT * FROM $tableName WHERE post_status = 1 ORDER BY id DESC";
}


$getArticles = $conn->query($query);
//var_dump($getArticles);
//echo mysqli_error($conn);
?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">

                    <div class="card-body">
                        <h4 class="card-title">Articles</h4>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <!--th scope="col">Last</th-->
                                    <th scope="col">Date</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $serialNumber = 0;
                                while ($articles = $getArticles->fetch_assoc()) {
                                    if ($articles['post_status'] == 0) {
                                        $queryString = "publish";
                                        $pubText = "Publish";
                                    } else {
                                        $queryString = "";
                                        $pubText = "Unpublish";
                                    }
                                    $serialNumber++;
                                    echo '<tr>
                                    <td>' . $serialNumber . '</td>
                                     <td>' . $articles["post_title"] . '</td>
                                     <td>' . $articles['post_date'] . '</td>
                              
                                
                                <td>
                                    <div class="btn-group" role="group">
                                        <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Action
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                            <a target="_blank" class="dropdown-item" href="' . $homeurl . $articles["post_slug"] . '">View</a>
                                            <a class="dropdown-item" href="editArticle.php?article_id='.$articles['ID'].'">Edit</a>
                                            <a class="dropdown-item danger" href="modules/unpublish.php?id=' . $articles['ID']."&&".$queryString.'">'.$pubText.'</a>
                                            <a class="dropdown-item danger" href="modules/home-featured.php?id=' . $articles['ID'] . '">Set as Hero Featured</a>
                                            <a class="dropdown-item danger" href="modules/home-featured.php?id=' . $articles['ID'] . '&&home_featured">Set as Home Featured</a>
                                        </div>
                                </td>
                                </tr>';
                                }

                                ?>

                        </table>
                        <div class="row">
                            <div class="col-md-7">
                                <!--just to push this annoying button to the right-->
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php

    require_once("inc/footer.php");
    ?>