<?php 

require_once 'config_admin.php';
require_once INCLUDES . 'header.inc.php';
require_once INCLUDES . 'navbar.inc.php';
require_once ADMIN_CLASSES . 'Admin.inc.php';


if(isset($_GET['page'])){
    $pageno = $_GET['page'];
} else {
    $pageno = 1;
}

$items_per_row = 5;
$number_of_rows = 1;
$items_per_page = $items_per_row * $number_of_rows;

if($_SESSION['role'] == 'admin'){
  $Admin = new Admin($_SESSION['account_id']);

  if(isset($_GET['search'])){
    $users_array = $Admin->get_users_per_page($pageno, $items_per_page, $_GET['txtsearch']);
  } else {
    $users_array = $Admin->get_users_per_page($pageno, $items_per_page);
  }
} else if($_SESSION['role'] == 'superadmin'){
  
   require_once ADMIN_CLASSES . 'SuperAdmin.inc.php';
   $Admin = new SuperAdmin($_SESSION['account_id']);

  if(isset($_GET['search'])){
    $users_array = $Admin->get_users_and_admin_per_page($pageno, $items_per_page, $_GET['txtsearch']);
  } else {
    $users_array = $Admin->get_users_and_admin_per_page($pageno, $items_per_page);
  }
} else {
  header("Location: ../pages/index.php");
  exit();
}

$page_count = $users_array['pages'];
$users_array = $users_array['users'];   

$modal_counter = 0;

//Display notification if it exists
if(isset($_SESSION['notify'])){
    require_once CLASSES . 'Notifications.php';
    echo Notification::display_notification();
    Notification::delete_from_session();        
}

?>

<div class="container">
  <div class="jumbotron" id="jumbotron-color">
    <h1>Account List</h1>
  </div>

  <button type="button" class="btn btn-success btn-lg float-right" data-toggle="modal" data-target="#addaccountModal" data-whatever="@mdo" style="margin-bottom: 20px;width: 173px;height: 67px;font-size: 24px;">Add Account</button>

  <form action="scripts/update_account.php" method="POST" enctype="multipart/form-data">
    <div class="modal fade" id="addaccountModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Account</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <div class="form-row">
              <div class="custom-file">
                <input name="profile_image" type="file" accept="image/*" class="custom-file-input" id="customFile">
                <label class="custom-file-label" for="uploading">Upload Profile Picture Here</label>
              </div>
            </div>

            <br />

            <div class="form-row">
              <div class="col">
                <label for="Name">Full Name:</label>
                <input type="text" name="txtfullname" class="form-control" required>
              </div>
            </div>

            <div class="form-row">
                <div class="col">
                  <label for="email">Email:</label>
                  <input type="email" name="txtemail" class="form-control" required>
                </div>
            </div>
            
            <div class="form-row">
              <div class="col">
                <label for="phonenumber">Enter Phone Number:</label>
                <input type="phonenumber" name="txtno" class="form-control">
              </div>
            </div>

            <div class="form-row">
              <div class="col">
                <label for="fulladdress">Enter Full Address:</label>
                <input type="fulladdress" name="txtfulladdress" class="form-control">
              </div>
              <div class="col">
                <label for="city">Enter City:</label>
                <input type="city" name="txtcity" class="form-control">
              </div>
            </div>

            <div class="form-group">
              <label>Password:</label>
              <input type="password" name="txtpassword" class="form-control" required>
            </div>

            <div class="form-group">
              <label>Confirm Password:</label>
              <input type="password" name="txtconfirmpassword" class="form-control" required>
            </div>
            
            <div class="form-group">
              <label>Status:</label>
              <br />
              <label class="switch">
                <input type="checkbox" name="status" checked>
                <span class="slider round"></span>
              </label>
            </div>

            <?php if($_SESSION['role'] == 'superadmin'): ?>

            <div class="form-group">
               <label>Role:</label>
                <select class="custom-select" name="role">
                  <option value="user" selected>User</option>
                  <option value="admin">Admin</option>
                </select>
            </div>

            <?php endif ?>

            <hr>

            <div class="modal-footer col-lg-12">
              <label for="password">Password:</label>
              <input type="password" name="txtadminpassword" class="form-control" required>
              <button type="submit" name="create" class="btn btn-lg btn-success float-right">Add Account</button>
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
          <th scope="col">Account Image</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Phone Number</th>
          <th scope="col">City</th>
          <th scope="col">Address</th>

          <?php if($_SESSION['role'] == 'superadmin'): ?>

          <th scope="col">Role</th>

          <?php endif ?>

          <th scope="col">Status</th>
          <th scope="col"></th>
        </tr>
      </thead>
      </tfoot>
      <tbody>

        <?php foreach ($users_array as $user): ?>

        <tr>

          <?php if($user['profile_image'] != NULL): ?>
            <td scope="row"><img src="../images/profile_images/<?php echo $user['profile_image'] ?>" alt="product-img" class="product-image-size" style="width: 150px;height:100px;"></td>
          <?php else: ?>
            <td scope="row"><img src="../images/profile_images/sample-user.png"  alt="product-img" class="product-image-size" style="width: 150px;height:100px;"></td>
          <?php endif ?>

          <td><?php echo $user['name'] ?></td>
          <td><?php echo $user['email'] ?></td>

          <td>
            <?php 
              $number = $user['phone_number'] != NULL ? $user['phone_number'] : 'N/A';
              echo $number;
            ?>
          </td>
          
           <?php if($user['role'] == 'user'): ?>

            <td><?php echo $user['city'] ?></td>
            <td><?php echo $user['full_address'] ?></td>

          <?php else: ?>
            
            <td></td>
            <td></td>

          <?php endif ?>
          
          <?php 

            if($_SESSION['role'] == 'superadmin'){

            $user_role = strtoupper($user['role']);
            $color = $user_role == "USER" ? "blue" : "orange";

            echo "<td>
                    <p style='background-color:$color;border-radius: 5px; padding:8px;text-align: center;width: 90px;'>
                      $user_role
                    <p>
                  </td>";
            }

            $user_status = strtoupper($user['status']);
            $color = $user_status == "ACTIVE" ? "green" : "red";

            echo "<td>
                    <p style='background-color:$color;border-radius: 5px; padding:8px;text-align: center;width: 90px;'>
                      $user_status
                    <p>
                  </td>";
          ?>

          <td style="width: 206px;">
            <form action="receipt_page.php" method="GET">
              <input type="submit" class="btn btn-info float-right" value="Order History" style="margin-bottom: 10px;width: 175px;"></input>
              <input type="hidden" name="account_id" value="<?php echo $user['account_id'] ?>">
            </form>
            <form action="pending_orders.php" method="GET">
              <input type="submit" class="btn btn-secondary float-right" value="Pending Transactions" style="margin-bottom: 10px;width: 175px;">
              <input type="hidden" name="account_id" value="<?php echo $user['account_id'] ?>">
            </form>
            <button type="button" class="btn btn-warning float-right" data-toggle="modal" data-target="#editProfileModal<?php echo $modal_counter ?>" data-whatever="@mdo" style="margin-bottom: 10px;width: 175px;">Edit</button>

            <?php if($user['status'] == "active"): ?>
              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deactivateModal<?php echo $modal_counter ?>" data-whatever="@mdo" style="width: 175px;margin-left: 9px;">Deactivate</button>
            <?php else: ?>
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#reactivateModal<?php echo $modal_counter ?>" data-whatever="@mdo" style="width: 175px;margin-left: 9px;">Reactivate</button>
            <?php endif ?>
          </td>
        </tr>

        <?php $modal_counter++ ?>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>

  <!-- Pagination -->
   <!--   <div class="row"> 
        <nav aria-label="Page navigation example" class="pagination-placement">
            <ul class="pagination">

                <?php //echo $page_count ?>
                <?php //for($x = 1; $x <= $page_count; $x++): ?>
                    
                    <?php //if(($x == $_GET['page'])): ?>

                         <li class="page-item active">
                          <span class="page-link">
                            <?php //echo $x ?>
                            <span class="sr-only">(current)</span>
                          </span>
                        </li>
                    
                    <?php //else: ?>

                        <li class="page-item">
                            <a class="page-link" href="accountlist.php?page=<?php //echo $x ?>"><?php //echo $x ?></a>
                        </li>
                        
                    <?php //endif ?>
                <?php //endfor ?>
            </ul>
        </nav>
    </div> -->

<?php $modal_counter = 0; ?>

<!-- Modal for edit profile -->
<?php foreach ($users_array as $user): ?>

<form action="scripts/update_account.php" method="POST" enctype="multipart/form-data">
  <div class="modal fade" id="editProfileModal<?php echo $modal_counter ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
      <input type="hidden" name="account_id" value="<?php echo $user['account_id'] ?>">
      <input type="hidden" name="change" value="user">

      <div class="form-group">
        <?php if($user['profile_image'] != NULL): ?>
          <img style="margin-left: 84px;" src="../images/profile_images/<?php echo $user['profile_image'] ?>" alt="userimage" id="profile-image" class="modal-image-size">
        <?php else: ?>
          <img style="margin-left: 84px;" src="../images/profile_images/sample-user.png" alt="userimage" id="profile-image" class="modal-image-size">
        <?php endif ?>
      </div>

          <div class="form-row">
            <div class="custom-file">
              <input name="profile_image" type="file" accept="image/*" class="custom-file-input" id="customFile">
              <label class="custom-file-label" for="uploading">Upload New Profile Picture Here</label>
            </div>
          </div>

          <br />

          <div class="form-row">
            <div class="col">
              <label for="Name">Full Name:</label>
              <input type="text" name="txtfullname" class="form-control" value="<?php echo $user['name'] ?>" required>
            </div>
          </div>

          <div class="form-row">
              <div class="col">
                <label for="email">Email:</label>
                <input type="email" name="txtemail" class="form-control" value="<?php echo $user['email'] ?>" required>
              </div>
          </div>

          <?php if($user['role'] == 'user'): ?>

          <div class="form-row">
            <div class="col">
              <label for="phonenumber">Enter Phone Number:</label>
              <input type="text" placeholder="Enter Phone Number" name="txtno" class="form-control" value="<?php echo $user['phone_number']?>" required>
            </div>
          </div>
          <div class="form-row">
            <div class="col">
              <label for="fulladdress">Enter Full Address</label>
              <input type="text" placeholder="Enter Full Address" name="txtfulladdress" class="form-control" value="<?php echo $user['full_address']?>" required>
            </div>
            <div class="col">
              <label for="city">Enter City</label>
              <input type="text" placeholder="Enter City" name="txtcity" class="form-control" value="<?php echo $user['city']?>" required>
            </div>
          </div>

          <?php else: ?>

          <div class="form-row">
            <div class="col">
              <input type="hidden" placeholder="Enter Phone Number" name="txtno" class="form-control" value="<?php echo $user['phone_number']?>" required>
            </div>
          </div>
          <div class="form-row">
            <div class="col">
              <input type="hidden" placeholder="Enter Full Address" name="txtfulladdress" class="form-control" value="<?php echo $user['full_address']?>" required>
            </div>
            <div class="col">
              <input type="hidden" placeholder="Enter City" name="txtcity" class="form-control" value="<?php echo $user['city']?>" required>
            </div>
          </div>

          <?php endif ?>
          
          <div class="form-group">
            <label>Status:</label>
            <br />
            <label class="switch">
              <?php if($user['status'] == 'active'): ?>
                <input type="checkbox" name="status" checked>
              <?php else: ?>
                <input type="checkbox" name="status">
              <?php endif ?>
              <span class="slider round"></span>
            </label>
          </div>
          
          <?php if($_SESSION['role'] == 'superadmin'): ?>

          <div class="form-group">
             <label>Role:</label>
              <select class="custom-select" name="role">

                <?php if($user['role'] == 'user'): ?>

                <option value="user" selected>User</option>
                <option value="admin">Admin</option>

                <?php elseif ($user['role'] == 'admin'): ?>
                
                <option value="user">User</option>
                <option value="admin" selected>Admin</option>

                <?php endif ?>
              </select>
          </div>

          <?php endif ?>

          <hr>

          <div class="modal-footer col-lg-12">
            <label for="password">Password:</label>
            <input type="password" name="txtadminpassword" class="form-control" required>
            <button type="submit" name="update" class="btn btn-lg btn-warning float-right">Update</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>

<form action="scripts/update_account.php" method="POST">
  <div class="modal fade" id="deactivateModal<?php echo $modal_counter ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to deactivate?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
                <div class="col-sm-6">
                  <label for="password">Password:</label>
                  <input type="password" name="txtadminpassword" class="form-control" required>
                  <input type="hidden" name="account_id" value="<?php echo $user['account_id']?>">
                </div>
            </div>
            <div class="modal-footer">
              <button type="submit" name="deactivate" class="btn btn-danger">Deactivate</button>
            </div>    
          </div>
        </div>
      </div>
    </div>
</form>

<form action="scripts/update_account.php" method="POST">
  <div class="modal fade" id="reactivateModal<?php echo $modal_counter ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to reactivate?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
                <div class="col-sm-6">
                  <label for="password">Password:</label>
                  <input type="password" name="txtadminpassword" class="form-control" required>
                  <input type="hidden" name="account_id" value="<?php echo $user['account_id']?>">
                </div>
            </div>
            <div class="modal-footer">
              <button type="submit" name="reactivate" class="btn btn-success">Reactivate</button>
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