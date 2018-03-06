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
		<h1>About Us</h1>
		</div>
			<h2>Meaning of YP?</h2>
			<p>YP Stands for Yuan and Paul, they are the owners of this business</p>
			<h2>History</h2>
			<p>YP Powertools registered as a business on Jan 2017, to cater the online market. a subsidiary of Tools4hobby Enterprises located along Alabang Zapote Road Barangay Almanza I Las Pinas</p>
			<h2>Mission</h2>
			<ul>
				<li>To develop solutions, which would maximise wealth for our shareholders.</li>
				<li>To develop and follow business practices, which would induce develop and retain confidence of our business partners and employees.</li>
				<li>To serve the community by understanding our responsibility towards the society and living up to them.</li>
				<li>To give the customer - value for money.</li>
			</ul>
			
			<h2>Vision</h2>
				<ul>
					<li>To be rated best amongst quality and service for the solutions that we provide to our customers.</li>
					<li>To introduce innovative value added services in the industry.</li>
					<li>To lead in the Industrial Power Tools, Pneumatic Tools, Welding Machines and Special Purpose Motors</li>
					<li>To cater to 100% needs of the customers by introducing total range of products in each segment.</li>
				</ul>
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