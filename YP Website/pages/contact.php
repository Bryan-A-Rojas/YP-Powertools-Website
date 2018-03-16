<?php 

require_once '../config.php';

require_once INCLUDES . 'header.inc.php';

require_once SCRIPTS . 'functions.inc.php';
$navbar = "";

if(isset($_SESSION['role'])){
    $navbar = displayNavbar($_SESSION['role']);
}else{
    $navbar = INCLUDES . 'navbar.inc.php';
}

include $navbar;

?>


<div class="jumbotron">
    <div class="container">
    	<div class="row">
        <h1>Contact</h1>
        </div>
        
        <h2>Contact Numbers:</h2>
        <ul>
            <li>0909034043545</li>
            <li>8090492340924</li>
            <li>65453445345453</li>
        </ul>
        <h2>Email:</h2>
        <p>yp_powertools@gmail.com</p>
        <div class="row">
        <h2>Location:</h2>
        </div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15455.762071098161!2d121.0036502!3d14.4305915!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x4275f2715e0b8821!2sYP+POWERTOOLS!5e0!3m2!1sen!2sph!4v1520347094055" width="600" height="450" frameborder="0" style="border:1px solid black;" allowfullscreen></iframe>
    </div>
</div>

	<!-- - google maps of two branches
		- telephone number
		- email
		- phone number -->

<?php 

require_once INCLUDES . 'footer.inc.php';
require_once INCLUDES . 'endtags.inc.php';

?>