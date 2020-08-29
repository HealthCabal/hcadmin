<?php
/*login test
require_once("classes/config.php");
require_once("classes/auth.php");
require_once("classes/posts.php");

//$checkUsers->sayGreeting();

$columnName = 'user_phone';
$password = $_REQUEST['password'];
$value = $_REQUEST['userid'];
$tableName = "hc_users";
$checkUsers->login($conn, $value, $columnName, $tableName, $password);


***/


//$CRUD->fetchDataWhere($conn, $value, $columnName, $tablename);


/****Signup

$data[0] = $_REQUEST['phonenum'];
$data[1] = $_REQUEST['password'];
$data[1] = password_hash($data[1], PASSWORD_DEFAULT);   
$data[2] = $_REQUEST['firstname'];
$data[3] = $_REQUEST['lastname'];

//$dataString = implode(',', $data);

//$values = "?,?,?,?"; 
$dataType = "ssss";
$value = $data[0];
$columns = "user_phone, user_pass, user_fname, user_lname";
//var_dump($dataString);die();

$checkUsers->newAccount($conn, $value, $data, $columns);

Signup ends here 
******/

$tableName = "hc_posts";

$data[0] = $conn->real_escape_string($_REQUEST['author']);
$data[1] = $conn->real_escape_string($_REQUEST['posttitle']);
$data[2] = $conn->real_escape_string($_REQUEST['postcontent']);
$data[3] = $conn->real_escape_string($_REQUEST['excerpt']);
$data[4] = $conn->real_escape_string($_REQUEST['keywords']);
$data[5] = $conn->real_escape_string($_REQUEST['seodescription']);
$data[6] = $conn->real_escape_string($_REQUEST['postdescription']);
$data[7] = $conn->real_escape_string($_REQUEST['series']);
$data[8] = $conn->real_escape_string($_REQUEST['seriesheading']);
$data[9] = $conn->real_escape_string($_REQUEST['parentcat']);
$data[10] = $conn->real_escape_string($_REQUEST['childcat']);
$data[11] = $conn->real_escape_string($_REQUEST['tags']);
$data[12] = $conn->real_escape_string($_REQUEST['slug']);
$data[13] = $conn->real_escape_string($_REQUEST['sponsored']);
$data[14] = $conn->real_escape_string($_REQUEST['featuredimg']);
$data[15] = date("D-M-Y");


$columns = "post_author, post_title, post_content, post_excerpt, post_keywords,".
"post_seo_desc, post_description, post_series, post_series_heading, post_category,".
"post_child_cat, post_tag, post_slug, post_sponsored, post_featured_img, post_date";

$doPosts->createPost($conn, $tableName, $data, $columns);
/***New Post Test
**/

?>