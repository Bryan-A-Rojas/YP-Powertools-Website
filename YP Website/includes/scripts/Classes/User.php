<?php

require_once CLASSES . 'Person.php';

class User extends Person{

	//private $cart;

	public function __construct($email){
		$this->email = $email;
		$this->getInfo();

		//include cart class
		//require_once CLASSES . 'Cart.inc.php';

		//$this->cart = new Cart($this->id);
	}

	private function getInfo(){
		//Require Database connection
		require SCRIPTS . 'dbh.inc.php';
		
		//SQL statement
		$sql = "SELECT * 
				FROM accounts 
				WHERE email = '$this->email';";

		$result = $Database->query($sql);

		//Get results
		$row = $result->fetch_assoc();

		$this->id = $row['account_id'];
		$this->profile_image = $row['profile_image'];
		$this->name = $row['name'];
		$this->email = $row['email'];
	}

	public static function login($email = "", $password = ""){
		//Require Database connection
		require SCRIPTS . 'dbh.inc.php';
		
		//SQL statement
		$sql = "SELECT password 
				FROM accounts 
				WHERE email = '$email';";

		//Run query
		$result = $Database->query($sql);
		
		//If email does NOT exist return error message
		if($result->num_rows < 1){
			return "Invalid email or password";
		}

		//Get results
		$row = $result->fetch_assoc();

		//If password is NOT the same return error message
		if(!password_verify($password, $row['password'])){
			return "Invalid email or password";
		}

		return true;
	}

	// public function logout(){
	// 	if(!isset($_SESSION)){
	// 		session_start();
	// 	}

	// 	session_unset();
	// 	session_destroy();
	// }

	// public function useCart(){
	// 	return $this->cart;
	// }
	
}



//Handler
// if(($message = User::login("test@gmail.com", "test")) === true){
// 	$user = new User("test@gmail.com");
// 	$_SESSION['user'] = $user;
// 	echo $_SESSION['user']->getName();

// 	//$_SESSION['user']->useCart()->add_to_cart(2, 2);

// 	$_SESSION['user']->logout();
// } else {
// 	echo $message;
// }