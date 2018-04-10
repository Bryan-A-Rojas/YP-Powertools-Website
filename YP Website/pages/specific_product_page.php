<?php 

require_once '../config.php';

//If the user does not enter this link with a product id then redirect to products page
if(isset($_GET['productid'])){

require_once INCLUDES . 'header.inc.php';

require_once SCRIPTS . 'functions.inc.php';

require_once INCLUDES . 'navbar.inc.php';

require_once CLASSES . 'Products.inc.php';

$product_information = Products::get_specific_product($_GET['productid']);
$product_information = $product_information[0];

//Display notification if it exists
if(isset($_SESSION['notify'])){
    require_once CLASSES . 'Notifications.php';
    echo Notification::display_notification();
    Notification::delete_from_session();        
}

?>

<div class="jumbotron" style="padding:1rem 2rem">
	<div class="container" style="padding-bottom: 20px;">
		<a href="products.php">&lt;Back to products page</a>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<img src="../images/products/<?php echo $product_information['image'] ?>" style="width: 769px; height: 400px; margin-left: 180px; margin-bottom: 35px;">
			</div>	

		</div>
		<h2><?php echo $product_information['name'] ?></h2>
		<h4 class="product_page-product_price">Price: <?php echo commafy($product_information['price']); ?></h4>
		<h3>Description: <?php echo $product_information['description'] ?></h3>

		<?php if(isset($_SESSION['role']) AND $_SESSION['role'] == 'user'): ?>
			
			<?php if($product_information['availability'] != 'available' || $product_information['stock'] < 1): ?>

		        <p class="unavailable-message">UNAVAILABLE<p>

		    <?php else: ?>

		   	<form action="../includes/scripts/add_to_cart.inc.php" method="POST">
				<input type="hidden" name="product_id" value="<?php echo $product_information['product_id'] ?>">
				<h2 style="display:inline;">Quantity: </h2>
				<input type="number" name="quantity" min="1" max="<?php echo $product_information['stock']?>" value="1" style="font-size:30px">
				<input type="submit" name="add_to_cart" value="Add to Cart" class="btn btn-success btn-lg">
			</form>
		    
		    <?php endif ?>
		
		<?php elseif(!isset($_SESSION['role'])): ?>
			
			<p class="unavailable-message">PLEASE LOGIN / SIGNUP TO BUY</p>

		<?php endif ?>
	</div>
</div>

<?php 

require_once INCLUDES . 'footer.inc.php';
require_once INCLUDES . 'endtags.inc.php';

} else {
	header("Location: products.php");
	exit();
}

?>