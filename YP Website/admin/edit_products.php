<?php 

require_once 'config_admin.php';
require_once INCLUDES . 'header.inc.php';

require_once INCLUDES . 'navbar.inc.php';

require_once ADMIN_CLASSES . 'products.inc.php';

$products = Products::get_products();

$modal_counter = 0;

require_once SCRIPTS . 'functions.inc.php';

//Display notification if it exists
if(isset($_SESSION['notify'])){
    require_once CLASSES . 'Notifications.php';
    echo Notification::display_notification();
    Notification::delete_from_session();        
}

?>

<div class="jumbotron" id="jumbotron-color">
		<h1>Edit Products Page</h1>
</div>

<div class="container">

      <button type="button" class="btn btn-success btn-lg float-right" data-toggle="modal" data-target="#addModal" data-whatever="@mdo" style="margin-bottom: 20px;width: 173px;height: 67px;font-size: 24px;">Add Product</button>

      <form action="scripts/add_product.php" method="POST" enctype="multipart/form-data">
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            <div class="modal-body">

          <div class="form-row">
            <div class="custom-file">
              <input name="product_image" type="file" accept="image/*" class="custom-file-input" id="customFile">
              <label class="custom-file-label" for="uploading">Upload Product Picture Here</label>
            </div>
          </div>

          <br />

                <div class="form-row">
              <div class="col">
                <label for="product">Product Name:</label>
                <input type="text" class="form-control" placeholder="Enter Product Name" name="txtname" required>
              </div>
              <div class="col">
                <label for="price">Price:</label>
                <input type="text" class="form-control" placeholder="Enter Price" name="txtprice" required>
              </div>
            </div>

            <div class="form-group">
              <label for="description">Description</label>
              <textarea class="form-control" name="txtdescription" cols="30" rows="5"></textarea>
            </div>

            <div class="form-group">
                <label>Availability:</label>
                <br />
                <label class="switch">
                  <input type="checkbox" name="availability" checked>
                  <span class="slider round"></span>
                </label>
            </div>

            <div class="form-group">
                <label for="quantity">Stock:</label>
                <input type="number" class="form-control" name="stock" min="0" value="1" style="font-size:30px">
            </div>

              <div class="modal-footer">
                <label for="password">Password:</label>
                <input type="password" placeholder="Enter Password" name="txtadminpassword" class="form-control" required>
                <button type="submit" name="submit" class="btn btn-success" style="margin-top:10px;">Add Product</button>
              </div>
          </div>
        </div>
      </div>
    </div>
  </form>

<div class="table-responsive-xl">
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
            <td><?php echo commafy($item['price']); ?></td>
            
            <?php 

            $stock = $item['stock'];
            $color = "";

            if($stock >= 10) {
              $color = 'green';
            }

            if($stock < 10){
               $color = 'orange';
            } 

            if($stock < 5) {
              $color = 'red';
            } 

            echo "<td>
                      <p style='background-color:$color;border-radius: 5px; padding:8px;text-align: center;'>
                        $stock
                      <p>
                    </td>";
            ?>


            <td><?php echo $item['description'] ?></td>

            <?php 
              $availability = strtoupper($item['availability']);
              $color = $availability == "AVAILABLE" ? "green" : "red";

              echo "<td>
                      <p style='background-color:$color;border-radius: 5px; padding:8px;text-align: center;'>
                        $availability
                      <p>
                    </td>";
            ?>

            <td>
              
              <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#editModal<?php echo $modal_counter ?>" data-whatever="@mdo" style="width:106px;margin-bottom: 10px;">Edit</button>

              <?php if($item['availability'] == "available"): ?>
                <button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#removeModal<?php echo $modal_counter ?>" data-whatever="@mdo" style="width:106px;">Remove</button>
              <?php else: ?>
                <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#restoreModal<?php echo $modal_counter ?>" data-whatever="@mdo" style="width:106px;">Restore</button>
              <?php endif ?>
              
            </td>
          </tr>
      
      <?php $modal_counter++ ?>
      <?php endforeach ?>

    </tbody>
  </table>
</div>
  
  <?php $modal_counter = 0; ?>

  <?php foreach($products as $key => $item): ?>

  <form action="scripts/modify_cart_item.php" method="POST" enctype="multipart/form-data">
    <div class="modal fade" id="editModal<?php echo $modal_counter ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit page</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            <div class="modal-body">
              <input type="hidden" name="product_id" value="<?php echo $item['product_id']?>">
              <div class="form-group">
                <img src="../images/products/<?php echo $item['image'] ?>" alt="sample image" class="modal-image-size">
              </div>

            <div class="form-row">
              <div class="custom-file">
                <input name="product_image" type="file" accept="image/*" class="custom-file-input" id="customFile">
                <label class="custom-file-label" for="uploading">Upload New Product Picture Here</label>
              </div>
            </div>

            <br />

                <div class="form-row">
                  <div class="col">
                    <label for="product">Change Product Name:</label>
                    <input type="text" class="form-control" placeholder="Enter Produce Name" name="txtname" value="<?php echo $item['name'] ?>" required>
                  </div>
                  <div class="col">
                    <label for="price">Change Price:</label>
                    <input type="text" class="form-control" placeholder="Enter Price" name="txtprice" value="<?php echo $item['price'] ?>" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="description">Change Description:</label>
                  <textarea class="form-control" id="exampleFormControlTextarea1" name="txtdescription" cols="30" rows="5"><?php echo $item['description'] ?></textarea>
                </div>
                <div class="form-group">
                    <label>Availability:</label>
                    <br />
                    <label class="switch">
                      <?php if($item['availability'] == 'available'): ?>
                        <input type="checkbox" name="availability" checked>
                      <?php else: ?>
                        <input type="checkbox" name="availability">
                      <?php endif ?>
                      <span class="slider round"></span>
                    </label>
                </div>

                <div class="form-group">
                    <label for="quantity">Stock:</label>
                    <input type="number" class="form-control" name="stock" min="0" value="<?php echo $item['stock'] ?>" style="font-size:30px">
                </div>

              <div class="modal-footer">
                <button type="submit" name="Edit" class="btn btn-warning">Update</button>
              </div>
          </div>
        </div>
      </div>
    </div>
  </form>
  
  <form action="scripts/modify_cart_item.php" method="POST">
    <div class="modal fade" id="removeModal<?php echo $modal_counter ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to remove?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="password">Password:</label>
                <div class="col-sm-6">
                  <input type="password" placeholder="Enter Password" name="txtadminpassword" class="form-control" required>
                  <input type="hidden" name="product_id" value="<?php echo $item['product_id']?>">
                </div>
            </div>
            <div class="modal-footer">
              <button type="submit" name="Remove" class="btn btn-danger">Remove</button>
            </div>    
          </div>
        </div>
      </div>
    </div>
  </form>

  <form action="scripts/modify_cart_item.php" method="POST">
    <div class="modal fade" id="restoreModal<?php echo $modal_counter ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to restore?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="password">Password:</label>
                <div class="col-sm-6">
                  <input type="password" placeholder="Enter Password" name="txtadminpassword" class="form-control" required>
                  <input type="hidden" name="product_id" value="<?php echo $item['product_id']?>">
                </div>
            </div>
            <div class="modal-footer">
              <button type="submit" name="Restore" class="btn btn-success">Restore</button>
            </div>    
          </div>
        </div>
      </div>
    </div>
  </form>
  
  <?php $modal_counter++ ?>
  <?php endforeach ?>

</div>

<?php 

require_once INCLUDES . 'footer.inc.php';
require_once INCLUDES . 'endtags.inc.php';

?>