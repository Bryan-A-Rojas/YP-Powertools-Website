<?php 

session_start();
if(isset($_SESSION['role'])){

include '../includes/header.inc.php';
include '../includes/navbar_user.inc.php';

?>

<h1>User</h1>

<?php 

include '../includes/endtags.inc.php';
} else {
	header("Location: index.php");
	exit();
}
?>