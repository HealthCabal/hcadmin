<?php
require_once('../classes/config.php');
require_once('../classes/posts.php');

$tableName = "hc_posts";

$oldSlug = $conn->real_escape_string($_REQUEST['posttitle']);

//strip post title of non-alphanumeric characters
$newSlug = preg_replace("/[^A-Za-z0-9 ]/", '', $oldSlug);

$data[0] = $conn->real_escape_string($_REQUEST['author']);
$data[1] = $conn->real_escape_string(ucwords($_REQUEST['posttitle']));
$data[2] = $conn->real_escape_string($_REQUEST['body']);
$data[3] = $conn->real_escape_string($_REQUEST['excerpt']);
$data[4] = $conn->real_escape_string($_REQUEST['keywords']);
$data[5] = $conn->real_escape_string($_REQUEST['seodescription']);
//$data[6] = "forgetaboutit";
$data[7] = $conn->real_escape_string(lcfirst($_REQUEST['series']));
$data[8] = $conn->real_escape_string(lcfirst($_REQUEST['seriesheading']));
$data[9] = $conn->real_escape_string($_REQUEST['parentcat']);
$data[10] = $conn->real_escape_string($_REQUEST['childcat']);
$data[11] = $conn->real_escape_string($_REQUEST['tags']);
$data[12] = str_replace(" ", "-", strtolower($newSlug))."-".mt_rand(11111, 99999);
$data[13] = $conn->real_escape_string($_REQUEST['sponsored']);
$data[14] = $conn->real_escape_string($_REQUEST['featuredimg']);
$data[15] = $conn->real_escape_string($_REQUEST['reviewer']);
//$data[16] = date("D-M-Y");

//$slug = str_replace(" ", "-", strtolower($data['1']));
$columns = "post_author, post_title, post_content, post_excerpt, post_keywords,".
"post_seo_desc, post_series, post_series_heading, post_category,".
"post_child_cat, post_tag, post_slug, post_sponsored, post_featured_img, fact_checked_by";

$doPosts->createPost($conn, $tableName, $data, $columns);