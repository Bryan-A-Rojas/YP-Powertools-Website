<?php 

//Require database header
require_once 'dbh.inc.php';

class User{

	$user_id;

	function __construct($id){
		$this->$user_id = $id;
	}

}