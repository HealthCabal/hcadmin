<?php

function storeData($conn, $tableName, $data, $values, $columns) {
	/***
	*$data is an array containing what is to be stored
	* the array items can be accessed by their numeric indexes.
	* $columns is an array that holds the names of the columns into which the data ($data) is to be stored
	* $values is a set of parameter markers passed to $conn->prepare() 
	* separated by commas that correspond to the number of items in the $data array
	* $dataType is a string of characters identifying the data type of each ofthe $data array items. (eg:"sssiss")
	***/

    //$insertData = $conn->query("INSERT INTO $tableName ($columns) VALUES ($values)");
	//var_dump($insertData);
	//die();
    //$insertData->bind_param($dataType, $data);
	//var_dump($data[0]);
	//pass the array elements as individual items
	//call_user_func_array(array($insertData, 'bind_param'), $data);
	//var_dump($dataType);
//die();
$data = implode('","', $data);
$data = '"'.$data.'"';
//var_dump($data);
$query = "INSERT INTO $tableName ($columns) VALUES ($data)";
//die($query);
    if ($conn->query($query)) {
		//var_dump($columns);
		//die();
        echo "success";
        } else {
			echo $conn->error;
			echo "failed";
		} 
}





 function newAccount($conn, $value, $values, $data, $columns) {
        $tableName = "hc_users";
        $columnName = "user_phone";
        if($this->checkIfExists($conn, $tableName, $columnName, $value) == "youcanproceed") {
            if($this->storeData($conn, $tableName, $data, $values, $columns) == "success") {
                echo "savesuccessful";
            } else {
                echo "storefailed";
            }

        } else {
            echo "userexists";
        }
    }



    
$data[0] = $_REQUEST['phonenum'];
$data[1] = $_REQUEST['password'];
$data[2] = $_REQUEST['firstname'];
$data[3] = $_REQUEST['lastname'];

//$dataString = implode(',', $data);

$values = "?,?,?,?"; 
$dataType = "ssss";
$value = $data[0];
$columns = "user_phone, user_pass, user_fname, user_lname";
//var_dump($dataString);die();

$checkUsers->newAccount($conn, $value, $values, $data, $columns);
?>

