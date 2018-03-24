<?php 

require_once '../config.php';

require_once INCLUDES . 'header.inc.php';

?>

<div class="jumbotron" id="jumbotron-color">
		<h2>Edit Products Page</h2>
		<a href="../pages/index.php"><h4>&lt;Back to Home Page</h4></a>
</div>

    <div class="container">
        <div class="row">
        	<!-- Dividers to center logo -->
            <div class="col-lg-3 col-md-0 col-sm-0 col-xs-0"></div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
            	<!-- Logo image and text -->
                <img src="../images/icons/yplogoblk.png" id="logo-padding-sm">
                <h1 id="logo-text-sm">Powertools</h1>
                <div class="container" id="form-transbox">
                <div class="row">
                <form action="../includes/scripts/add_product.php" method="POST" enctype="multipart/form-data">
	                <h2>Add Product</h2>

	                <label for="uploading">Upload Product Picture:</label>
	                <br>
	        		<input type="file" name="product_image" accept="image/*" class="btn btn-primary">
	        		<br />
	        		<br />
	        		<div class="col-md-6">
	        		<label for="product">Product Name:</label>
					<br>
	        		<input type="text" placeholder="" name="txtname" required>
	        		<br>
	        		</div>
	        		<div class="col-md-6">
	        		<label for="price">Price:</label>
					<br>
	        		<input type="text" placeholder="" name="txtprice" required>
 					<br />
 					</div>
 					</div>
 					<div class="col-md-6">
	        		<label for="description">Description</label>
	        		<br>
	        		<textarea name="txtdescription" cols="30" rows="5"></textarea>
	        		</div>
	        		<br>
	        		<br>
	        		<button type="submit" name="submit" class="btn btn-success">Add Product</button>
	        	</form>
	        	</div>
	</div>
</div>
</div>
</div>

<?php 

require_once INCLUDES . 'endtags.inc.php';

?>