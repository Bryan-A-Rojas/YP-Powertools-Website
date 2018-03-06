<?php

function move_image($FilesArray, $folder_name){
	//Store each thing in the array $_FILES in seperate variables
	$fileName = $FilesArray['name'];
	$fileType = $FilesArray['type'];
	$fileTmp = $FilesArray['tmp_name'];
	$fileSize = $FilesArray['size'];
	$fileError = $FilesArray['error'];

	//Get file extension using explode and end
	$fileExt = (explode('.', $fileName));
	$fileActualExt =  strtolower(end($fileExt));

	//Make array of allowed file extensions
	$allowedExtensions = array("jpg", "jpeg" , "png");

	//Check if they uploaded the one of the allowed file extension using in_array($string, $array)
	if(in_array($fileActualExt, $allowedExtensions)){
		//Check if error code is === 0
		if($fileError === 0){
			//Check if file size is less than 40mb (40,000kb)
			if($fileSize < 4000000000){
				//Change file name using uniqid('',true) then add a dot and lastly the file ext
				$fileDestination = "../../images/$folder_name/". $fileName;
				
				move_uploaded_file($fileTmp, $fileDestination);
				
				return true;	
			} else {
				//Else return error "File size must be less than 40 mb"
				return "image=file_too_big";
			}
		} else {
			//Else Return error message "Error uploading file"
			return "image=error";
		}
	} else {
		//Return error message "You cannot upload this type of file"
		return "image=not_allowed_extension";
	}
}

function get_all_products(){
	//Require database header
	require_once 'dbh.inc.php';
	//Make variable called sql with query string "SELECT * from products WHERE id=$id_number"
	$sql = "SELECT * FROM products";
	//Query sql string
	$result = $Database->query($sql);

	//Array to store results
	$resultsArray = array();

	//loop through information
    while($row = $result->fetch_assoc()) {
        $resultsArray[] = $row;
    }

	//return array
	return $resultsArray;
}

function get_specific_product($product_id){
	//Require database header
	require_once 'dbh.inc.php';
	//Make variable called sql with query string "SELECT * from products WHERE id=$id_number"
	$sql = "SELECT * FROM products WHERE product_id = $product_id";
	//Query sql string
	$result = $Database->query($sql);

	//Array to store results
	$resultsArray = array();

	//loop through information
    while($row = $result->fetch_assoc()) {
        $resultsArray[] = $row;
    }

	//return array
	return $resultsArray;
}

function displayNavbar($role){

	if((isset($_SESSION['role']) && isset($_SESSION['id'])) && $_SESSION['role'] == "User"){
    	return '../includes/navbar_user.inc.php';
	} else if ((isset($_SESSION['role']) && isset($_SESSION['id'])) && $_SESSION['role'] == "Admin"){
    	return '../includes/navbar_admin.inc.php';
	} else if ((isset($_SESSION['role']) && isset($_SESSION['id'])) && $_SESSION['role'] == "SuperAdmin"){
    	return '../includes/navbar_superadmin.inc.php';
    }
}

//Experimental code
// function open_database_connection(){
//     $connection = new PDO("mysql:host=localhost;dbname=yp_powertools_database", 'root', '');
//     return $connection;
// }

// function close_database_connection(&$connection){
//     $connection = null;
// }

// function get_products($search = null, $sort = null){
//     $Database = open_database_connection();
    
//     $sql = "SELECT * FROM products";

//     if($search != null){
// 		$sql .= " WHERE LIKE %" . $search. "%";
// 	}

//     if($sort != null){
//     	$sql .= " SORT BY " . $sort . " ASC";
// 	}

// 	$result = $Database->query($sql);

//     $products = array();
//     while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
//         $products[] = $row;
//     }

//     close_database_connection($connection);

//     return $products;
// }

// function display_product($id_number){
// 	$Database = open_database_connection();
   
// 	$result = $Database->query("SELECT * FROM products WHERE id=$id_number");

//     $products = array();
//     while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
//         $products[] = $row;
//     }

//     close_database_connection($connection);

//     return $products;	
// }