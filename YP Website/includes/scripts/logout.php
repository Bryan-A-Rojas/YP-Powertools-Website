<?php

if(isset($_POST['submit'])){
	session_start();
	session_unset();
	session_destroy();
	header("Location: ../../pages/index.php");
	exit();
} else {
	header("Location: ../../pages/index.php?logout=error");
	exit();
}

?>