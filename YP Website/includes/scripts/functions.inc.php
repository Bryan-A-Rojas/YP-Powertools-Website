<?php

function move_image($FilesArray){
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
				$fileDestination = "../../images/profile_images". $fileName;
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

?>