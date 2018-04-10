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

<!-- Parallax -->
<div class="parallax" id="front-page-background">
    <div class="container">
        <div class="row">
        	<!-- Dividers to center logo -->
            <div class="col-lg-3 col-md-0 col-sm-0 col-xs-0"></div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
            	<!-- Logo image and text -->
                <img src="../images/icons/yplogoblk.png" id="logo-padding">
                <h1 id="logo-text">Powertools</h1>
            </div>
            <div class="col-lg-3 col-md-0 col-sm-0 col-xs-0"></div>
        </div>
    </div>
</div>


        	<!-- Carousel -->
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators" id="indicator-adj">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>

                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="../images/Available in Stock/Angle Grinder/20180217_145912.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="../images/Available in Stock/Asaki - Table Vice/20180217_154915.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="../images/Available in Stock/Finish Sander HT-FS 18702/20180217_150810.jpg" alt="Third slide">
                    </div>
                </div>

                <a class="carousel-control-prev" id="control-adj" href="#carouselExampleIndicators" role="button" data-slide="prev">
	    				<span class="arrow-black arrow-size fas fa-angle-left" aria-hidden="true" style=""></span>
	    				<span class="sr-only">Previous</span>
	  				</a>

                <a class="carousel-control-next" id="control-adj" href="#carouselExampleIndicators" role="button" data-slide="next">
					    <span class="arrow-black arrow-size fas fa-angle-right" aria-hidden="true"></span>
					    <span class="sr-only">Next</span>
	  				</a>
            </div>


<?php 

require_once INCLUDES . 'footer.inc.php';
require_once INCLUDES . 'endtags.inc.php';

?>