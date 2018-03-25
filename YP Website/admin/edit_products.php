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
                <div class="row" style="margin-left:0px;">
				<h2>Add Products</h2>

				<form action="../includes/scripts/add_product.php" method="POST" enctype="multipart/form-data">
				  <div class="form-group">
				    <label for="uploading">Upload Product Picture:</label>
				    <input type="file" name="product_image" accept="image/*" class="form-control-file btn btn-primary" id="exampleFormControlFile1">
				  </div>

				  <div class="form-row">
				    <div class="col">
				      <label for="product">Product Name:</label>
				      <input type="text" class="form-control" placeholder="Enter Produce Name" name="txtname" required>
				    </div>
				    <div class="col">
				      <label for="price">Price:</label>
				      <input type="text" class="form-control" placeholder="Enter Price" name="txtprice" required>
				    </div>
				  </div>

				  <div class="form-group">
				    <label for="description">Description</label>
				    <textarea class="form-control" id="exampleFormControlTextarea1" name="txtdescription" cols="30" rows="5"></textarea>
				  </div>

				  <button type="submit" name="submit" class="btn btn-success">Add Product</button>
				</form>
		      </div>
		</div>
	</div>
	</div>

      <div class="row">
  	<h2>Remove Products</h2>
  </div>
  <table class="table table-hover table-dark">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Status</th>
      <th scope="col">Date</th>
      <th scope="col">Price</th>
    </tr>
  </thead>
  <tbody>
      <tr>
        <td>Item#1 Name</td>
        <td class="alert alert-danger">Unavailable</td>
        <td>Nov 18</td>
        <td>Price </td>
        <td><input type="Submit" value="Remove" class="btn btn-danger btn-lg float-right"></td>
      </tr>
  </tbody>

    <tbody>
      <tr>
        <td>Item#2 Name</td>
        <td class="alert alert-success">Available</td>
        <td>Nov 18</td>
        <td>Price </td>
        <td><input type="Submit" value="Remove" class="btn btn-danger btn-lg float-right"></td>
      </tr>
  </tbody>

    <tbody>
      <tr>
        <td>Item#3 Name</td>
        <td class="alert alert-warning">New</td>
        <td>Nov 18</td>
        <td>Price </td>
        <td><input type="Submit" value="Remove" class="btn btn-danger btn-lg float-right"></td>
      </tr>
  </tbody>

</table>
</div>

<?php 

require_once INCLUDES . 'endtags.inc.php';

?>