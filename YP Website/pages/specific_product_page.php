<?php 

//If the user does not enter this link with a product id then redirect to products page
if(isset($_GET['productid'])){

session_start();
include '../includes/header.inc.php';
include '../includes/navbar.inc.php';

?>

<div class="jumbotron" style="padding:1rem 2rem">
	<div class="container" style="padding-bottom: 20px;">
		<a href="products.php">&lt;Back to products page</a>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<img src="../images/Available in Stock/Hoyoma Japan - Jigsaw HT - JS650/20180217_153733.jpg" style="width:890px; height: 400px; padding-left: 200px">
			</div>	

		</div>
		<h2>Random Product</h2>
		<h4 class="product_page-product_price">Price: 3000PHP</h4>
		<h3>Description: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero explicabo ea laboriosam nostrum quas in vitae repellendus dignissimos, culpa ad pariatur atque vel suscipit, iusto facere nulla natus odio consectetur.</h3>
		<form action="../includes/scripts/addtocart.php" method="POST">
			<input type="submit" name="btnsubmit_addToCart" value="Add to Cart" class="btn btn-success btn-lg">
		</form>
	</div>
</div>

<?php 

include '../includes/footer.inc.php';
include '../includes/endtags.inc.php';

} else {
	header("Location: products.php");
	exit();
}

?>