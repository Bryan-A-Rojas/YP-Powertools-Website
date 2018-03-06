<?php 

session_start();
include '../includes/header.inc.php';

$navbar = "";

if(isset($_SESSION['role'])){
    $navbar = displayNavbar($_SESSION['role']);
}else{
    $navbar = '../includes/navbar.inc.php';
}

include $navbar;


?>

<div class="jumbotron">
	<div class="container">
		<h1>About Us</h1>
		<p>lorem lorem Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem itaque placeat in. Assumenda cupiditate eum, dicta necessitatibus ex inventore similique maiores impedit id sequi, a ut quibusdam, excepturi nostrum ratione.</p>
	</div>
</div>

<!-- - meaning of yp
		- mission and vision
		- year they started
		- history
 -->
<?php 

include '../includes/footer.inc.php';
include '../includes/endtags.inc.php';

?>