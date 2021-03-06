<?php 

require_once '../config.php';

require_once INCLUDES . 'header.inc.php';

require_once SCRIPTS . 'functions.inc.php';

require_once INCLUDES . 'navbar.inc.php';

//Display notification if it exists
if(isset($_SESSION['notify'])){
    require_once CLASSES . 'Notifications.php';
    echo Notification::display_notification();
    Notification::delete_from_session();        
}

?>

<div style="background-image: url(../images/contact-page-background.jpg); margin-bottom: -25px; color: white;">

<div class="jumbotron" style="opacity: 0.5; color: black;">
    <div class="container">
    	<div class="row">
        <h1>Contact</h1>
        </div>
    </div>
</div>

    <div class="container">
        <div class="row">

<div class="col-lg-6 col-sm-6" style="opacity: 0.9">
        <h2>Contact Numbers:</h2>
        <ul>
            <li>0906254206</li>
            <li>09772007355</li>
            <li>0928452301</li>
        </ul>

        <h2>Email:</h2>
        <p>yp_powertools@gmail.com</p>

        <h2>Opening Hours:</h2>
        <ul>
            <li>MW 10:00 am - 6:00 pm</li>
            <li>TTH 9:00 am - 5:00 pm</li>
            <li>F 12:00 am - 3:00 pm</li>
        </ul>
</div>

<div class="col-lg-6 col-sm-12">
        <h2 style="background-color: black; opacity: 0.8;">Location:</h2>

        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15455.762071098161!2d121.0036502!3d14.4305915!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x4275f2715e0b8821!2sYP+POWERTOOLS!5e0!3m2!1sen!2sph!4v1520347094055" width=100% height="450" frameborder="0" style="opacity: 0.9;" allowfullscreen></iframe>
</div>

        </div>
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