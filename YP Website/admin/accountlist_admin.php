<?php 

require_once 'config_admin.php';
require_once INCLUDES . 'header.inc.php';

require_once INCLUDES . 'navbar.inc.php';

require_once ADMIN_CLASSES . 'Admin.inc.php';

$Admin = new Admin($_SESSION['account_id']);

$users_array = $Admin->get_users();

?>

<div class="container">
<div class="jumbotron" id="jumbotron-color">
  <h1>Account List</h1>
</div>

<button type="button" class="btn btn-success btn-lg float-right" data-toggle="modal" data-target="#editModal" data-whatever="@mdo" style="margin-bottom: 20px;width: 173px;height: 67px;font-size: 24px;">Edit</button>

<form action="scripts/add_product.php" method="POST" enctype="multipart/form-data">
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            <div class="modal-body">
              <div class="form-group">
    <label for="uploading">Upload Profile Picture:</label>
    <input type="file" name="profile_image" accept="image/*" class="form-control-file btn btn-primary" id="exampleFormControlFile1">
  </div>

  <div class="form-row">
  <div class="col">
      <label for="Name">Full Name:</label>
      <input type="text" placeholder="Enter Full Name" name="txtfullname" class="form-control" required>
    </div>
  <div class="col">
      <label for="email">Email:</label>
      <input type="email" placeholder="Enter Email" name="txtemail" class="form-control" required>
    </div>
  
    <div class="col">
      <label for="city">Enter City</label>
      <input type="city" placeholder="Enter City" name="txtcity" class="form-control" required>
    </div>
  </div>

  <div class="form-group">
    <div class="col">
      <label for="fulladdress">Enter Full Address</label>
      <input type="fulladdress" placeholder="Enter Full Address" name="txtfulladdress" class="form-control" required>
    </div>
  </div>

  <div class="form-row">
    <div class="col">
      <label for="password">Password:</label>
      <input type="password" placeholder="Enter Password" name="txtpassword" class="form-control" required>
    </div>
    <div class="col">
      <label for="confirmpassword">Confirm Password:</label>
      <input type="password" placeholder="Confirm Password" name="txtconfirmpassword" class="form-control" required>
    </div>
  </div>
    <div class="modal-footer">
       <button type="submit" name="submit" class="btn btn-success" style="margin-top:10px;">Edit User</button>
    </div>
        </div>
      </div>
    </div>
  </div>
</form>

<button type="button" class="btn btn-danger btn-lg float-right" style="margin-bottom: 20px;width: 173px;height: 67px;font-size: 24px;">Deactivate</button>

<button type="button" class="btn btn-info btn-lg float-right" href="receipt_page.php" style="margin-bottom: 20px;width: 173px;height: 67px;font-size: 24px;">Order History</button>

<button type="button" class="btn btn-primary btn-lg float-right" data-toggle="modal" data-target="#pendingModal" data-whatever="@mdo" style="margin-bottom: 20px; width: 173px;height: 67px;font-size: 24px;">Pending</button>

<form action="scripts/add_product.php" method="POST" enctype="multipart/form-data">
    <div class="modal fade" id="pendingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Pending Transactions</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            <div class="modal-body">
              
<table class="table table-hover table-bordered table-light">
  <thead>
    <tr>
      <th scope="col">Transaction No.</th>
      <th scope="col">Date</th>
      <th scope="col">Payment</th>
      <th scope="col">Address</th>
    </tr>
  </thead>
  <tbody>

    <tr>
      <td>1</td>
      <td>01/04/2018</td>
      <td>Cash</td>
      <td>Bla St. New York City</td>
    </tr>

  </tbody>

</table>

    <div class="modal-footer">
       <button type="submit" name="submit" class="btn btn-success" style="margin-top:10px;">Accept</button>
       <button type="submit" name="submit" class="btn btn-danger" style="margin-top:10px;">Deny</button>
    </div>
        </div>
      </div>
    </div>
  </div>
</form>



<table class="table table-hover table-dark">
  <thead>
    <tr>
      <th scope="col">Account Image</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">City</th>
      <th scope="col">Address</th>
    </tr>
  </thead>
  </tfoot>
  <tbody>

    <?php foreach ($users_array as $user): ?>
    <tr>

      <?php if($user['profile_image'] != NULL): ?>
        <th scope="row"><img src="../images/profile_images/<?php echo $user['profile_image'] ?>" alt="product-img" class="product-image-size"></th>
      <?php else: ?>
        <th scope="row"><img src="../images/profile_images/sample-user.png"  alt="product-img" class="product-image-size"></th>
      <?php endif ?>

      <td><?php echo $user['name'] ?></td>
      <td><?php echo $user['email'] ?></td>
      <td><?php echo $user['city'] ?></td>
      <td><?php echo $user['full_address'] ?></td>

    </tr>
    <?php endforeach ?>

  </tbody>
</table>
</div>

<?php 

require_once INCLUDES . 'footer.inc.php';
require_once INCLUDES . 'endtags.inc.php';

?>