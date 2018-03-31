<?php 

require_once 'config_admin.php';

require_once INCLUDES . 'header.inc.php';

require_once ADMIN_CLASSES . 'products.inc.php';

$products = Products::get_products();

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

				<form action="scripts/add_product.php" method="POST" enctype="multipart/form-data">
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

<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Remove</button>

<button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal2" data-whatever="@mdo">Edit</button>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to remove?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="">
      <div class="modal-body">
        <div class="form-group">
		    <label for="password">Password:</label>
		    <div class="col-sm-6">
		    <input type="password" placeholder="Enter Password" name="txtpassword" class="form-control" required>
			</div>
		  </div>
      <div class="modal-footer">
		<button type="submit" name="submit" class="btn btn-danger">Remove</button>
      </div>
      </form>
    </div>
  </div>
</div>
</div>


<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit page here</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="">
      <div class="modal-body">
      	<div class="form-group">
      		<img src="../images/Available in Stock/Angle Grinder/20180217_145912.jpg" alt="sample image" class="modal-image-size">
      	</div>
        <div class="form-group">
				    <label for="uploading">Upload New Product Picture:</label>
				    <input type="file" name="product_image" accept="image/*" class="form-control-file btn btn-primary" id="exampleFormControlFile1">
				  </div>

				  <div class="form-row">
				    <div class="col">
				      <label for="product">Change Product Name:</label>
				      <input type="text" class="form-control" placeholder="Enter Produce Name" name="txtname" required>
				    </div>
				    <div class="col">
				      <label for="price">Change Price:</label>
				      <input type="text" class="form-control" placeholder="Enter Price" name="txtprice" required>
				    </div>
				  </div>

				  <div class="form-group">
				    <label for="description">Change Description:</label>
				    <textarea class="form-control" id="exampleFormControlTextarea1" name="txtdescription" cols="30" rows="5"></textarea>
				  </div>
      <div class="modal-footer">
		<button type="submit" name="submit" class="btn btn-info">Edit</button>
      </div>
      </form>
    </div>
  </div>
</div>
</div>

  <div class="row">
  	<h2>Modify Products</h2>
  </div>

  <table class="table table-hover table-dark">
    <thead>
      <tr>
        <th scope="col">Product Image</th>
        <th scope="col">Name</th>
        <th scope="col">Price/Piece</th>
        <th scope="col">Stock</th>
        <th scope="col">Description</th>
        <th scope="col">Availability</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      
      <?php foreach ($products as $key => $item): ?>
          <tr>
            <th scope="row"><img src="../images/products/<?php echo $item['image'] ?>" class="product-image-size"></th>
            <td><?php echo $item['name'] ?></td>
            <td><?php echo number_format((float)$item['price'], 2, '.', ''); ?></td>
            <td><?php echo $item['stock'] ?></td>
            <td><?php echo $item['description'] ?></td>

            <?php 
              $availability = strtoupper($item['availability']);
              $color = $availability == "AVAILABLE" ? "green" : "red";

              echo "<td><p style='background-color:$color;border-radius: 5px; padding:8px;'>$availability<p></td>";
            ?>

            <td>
              <form action="scripts/modify_cart_item.php" method="POST">
                <input type="Submit" name="Edit" value="Edit" class="btn btn-info btn-lg float-right" style="width:106px">
                <input type="Submit" name="Remove" value="Remove" class="btn btn-danger btn-lg float-right">
                <input type="hidden" name="product_id" value="<?php echo $item['product_id']?>">
              </form>
            </td>
          </tr>
      <?php endforeach ?>

    </tbody>
  </table>

</div>

<?php 

require_once INCLUDES . 'endtags.inc.php';

?>