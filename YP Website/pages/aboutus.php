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

<div class="jumbotron" id="jumbotron-color">
	<div class="container">
		<div class="row">
		<h1>About Us</h1>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-lg-4 col-sm-3">
			<h2>Meaning of YP?</h2>
			<p>YP Stands for Yuan and Paul, they are the owners of this business</p>
			<h2>History</h2>
			<p>YP Powertools registered as a business on Jan 2017, to cater the online market. a subsidiary of Tools4hobby Enterprises located along Alabang Zapote Road Barangay Almanza I Las Pinas</p>
		</div>
		<div class="col-lg-4 col-sm-3">
			<h2>Mission</h2>
			<ul>
				<li>To develop solutions, which would maximise wealth for our shareholders.</li>
				<li>To develop and follow business practices, which would induce develop and retain confidence of our business partners and employees.</li>
				<li>To serve the community by understanding our responsibility towards the society and living up to them.</li>
				<li>To give the customer - value for money.</li>
			</ul>
		</div>
		<div class="col-lg-4 col-sm-3">
			<h2>Vision</h2>
				<ul>
					<li>To be rated best amongst quality and service for the solutions that we provide to our customers.</li>
					<li>To introduce innovative value added services in the industry.</li>
					<li>To lead in the Industrial Power Tools, Pneumatic Tools, Welding Machines and Special Purpose Motors</li>
					<li>To cater to 100% needs of the customers by introducing total range of products in each segment.</li>
				</ul>
		</div>		
	</div>
</div>

<?php 

require_once INCLUDES . 'footer.inc.php';

require_once INCLUDES . 'endtags.inc.php';

?>