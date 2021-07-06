<?php
require_once('../classes/config.php');
$post_id = $_REQUEST['post_id'];
$tableName = "hc_posts";

$oldSlug = $conn->real_escape_string($_REQUEST['posttitle']);

//strip post title of non-alphanumeric characters
$cleanSlug = preg_replace("/[^A-Za-z0-9 ]/", '', $oldSlug);
$newSlugOne = str_replace(" ", "-", $cleanSlug);
$newSlug = str_replace("--", "-", $cleanSlug);

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
$data[16] = $newSlug;
//$data[16] = date("D-M-Y");

//$slug = str_replace(" ", "-", strtolower($data['1']));


$query = "UPDATE `hc_posts` SET 
`post_author` = '$data[0]',
`post_title` = '$data[1]',
`post_content` = '$data[2]',
`post_excerpt` = '$data[3]',
`post_keywords` = '$data[4]',
`post_seo_desc` = '$data[5]',
`post_series` = '$data[7]',
`post_series_heading` = '$data[8]',
`post_category` = '$data[9]',
`post_child_cat` = '$data[10]',
`post_tag` = '$data[11]',
`post_sponsored` = '$data[13]',
`post_featured_img` = '$data[14]',
`fact_checked_by` = '$data[15]',
`post_slug` = '$data[16]'
WHERE ID = '$post_id'
";

//die($query);
if($conn->query($query)){
    ?>
<script>alert('Post updated');</script>
window.

    <?php
}else{
    ?>
<script>alert('Post update failed. Report to Chinoms. 😏'); window.history.back()</script>
    <?php
}