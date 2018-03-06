<?php 

session_start();
include '../includes/header.inc.php';

include '../includes/scripts/functions.inc.php';
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
    	<div class="row">
        <h1>Contact</h1>
        <h2></h2>
        <p>this company Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem itaque placeat in. Assumenda cupiditate eum, dicta necessitatibus ex inventore similique maiores impedit id sequi, a ut quibusdam, excepturi nostrum ratione.</p>
        </div>
        <div class="row">
        <h2>Locations</h2>
        <ul>
            <li>
                <h3>Marcoz Alvarez, Las Pinas</h3>

            </li>
        </ul>
        </div>
        <h2>Contact Numbers</h2>
        <ul>
            <li>0909034043545</li>
            <li>8090492340924</li>
            <li>65453445345453</li>
        </ul>
        <h2>Email</h2>
        <p>Loremt@GMAIL.COM</p>
    </div>
</div>

	<!-- - google maps of two branches
		- telephone number
		- email
		- phone number -->

<?php 

include '../includes/footer.inc.php';
include '../includes/endtags.inc.php';

?>