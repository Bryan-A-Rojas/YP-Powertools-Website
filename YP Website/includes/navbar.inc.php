<nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="bg-dark">
  <a class="navbar-brand" href="../pages/index.php">
        <img src="../images/icons/yplogowh.png" width="30" height="30" alt="">  Powertools
      </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="../pages/index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../pages/products.php">Products</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../pages/aboutus.php">About Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../pages/contact.php">Contact</a>
      </li>
    </ul>
    <div class="form-inline my-2 my-lg-0">
      <ul class="navbar-nav mr-auto">

        <?php if(isset($_SESSION['role'])): ?>

        <?php if($_SESSION['role'] == "user"): ?>

        <li class="nav-item">
          <div class="dropdown">
            <button class="btn dropdown-toggle btn-lg" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: #dc3545; color: white; margin-right: 2px;">

            <?php if($_SESSION['profile_image'] != NULL): ?>

            <img src="../images/profile_images/<?php echo $_SESSION['profile_image']?>" width="35" height="35" alt="UserImg" style="border-radius: 50%;margin-right:2px;"> <?php echo $_SESSION['name'] ?>

            <?php else: ?>
            
            <img src="../images/profile_images/sample-user.png" width="35" height="35" alt="UserImg" style="border-radius: 50%;margin-right:2px;"> <?php echo $_SESSION['name'] ?>

            <?php endif ?>
                                    </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="left: -60px;">
              <a class="dropdown-item" href="../pages/user_page.php"><i class="fa fa-user"></i> Profile</a> 
              <a class="dropdown-item" href="../pages/cart.php"><i class="fas fa-shopping-cart"></i> Cart</a>
              <a class="dropdown-item" href="../pages/orderhistory.php"><i class="fas fa-list-alt"></i> Order History</a>
              <a class="dropdown-item" href="../pages/pending_orders.php"><i class="fas fa-hourglass-half"></i> Pending Transactions</a>

        <?php elseif($_SESSION['role'] == "admin"): ?>

        <li class="nav-item">
          <div class="dropdown">.
            <button class="btn dropdown-toggle btn-lg" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: #dc3545; color: white;margin-right: 2px;">
                                    Actions <i class="fas fa-cogs"></i>
                                    </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <a class="dropdown-item" href="../admin/report_page.php"><i class="fas fa-chart-pie"></i> Reports</a>
              <a class="dropdown-item" href="../admin/accountlist.php"><i class="fas fa-users"></i> Account List</a>
              <a class="dropdown-item" href="../admin/receipt_page.php"><i class="fas fa-list-alt"></i> Order History</a>
              <a class="dropdown-item" href="../admin/pending_orders.php"><i class="fas fa-hourglass-half"></i> Pending Transactions</a>
            </div>
        </div>
        </li>
       
       <li class="nav-item">
          <div class="dropdown">
            <button class="btn dropdown-toggle btn-lg" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: #dc3545; color: white;">
                                    Edit Pages <i class="fas fa-edit"></i>
                                    </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
              <a class="dropdown-item" href="../admin/edit_products.php">Products</a>
            </div>
            </div>
        </li>

        <li class="nav-item">
          <div class="dropdown">
            <button class="btn dropdown-toggle btn-lg" type="button" id="dropdownMenuButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: #dc3545; color: white; margin-right: 2px;">
            
            <?php if($_SESSION['profile_image'] != NULL): ?>

            <img src="../images/profile_images/<?php echo $_SESSION['profile_image']?>" width="35" height="35" alt="UserImg" style="border-radius: 50%;margin-right:2px;">  <?php echo $_SESSION['name'] ?>
            
            <?php else: ?>
            
            <img src="../images/profile_images/sample-admin.png" width="35" height="35" alt="UserImg" style="border-radius: 50%;margin-right:2px;">  <?php echo $_SESSION['name'] ?>

            <?php endif ?>


                                    </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton3" style="left: -16px;">
              <a class="dropdown-item" href="../admin/admin_page.php"><i class="fa fa-user"></i> Profile</a>

        <?php elseif($_SESSION['role'] == "superadmin"): ?>

        <li class="nav-item">
          <div class="dropdown">
            <button class="btn dropdown-toggle btn-lg" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: #dc3545; color: white;margin-right: 2px;">
                                    Actions <i class="fas fa-cogs"></i>
                                    </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <a class="dropdown-item" href="../admin/report_page.php"><i class="fas fa-chart-pie"></i> Reports</a>
              <a class="dropdown-item" href="../admin/accountlist.php"><i class="fas fa-users"></i> Account List</a>
              <a class="dropdown-item" href="../admin/receipt_page.php"><i class="fas fa-list-alt"></i> Order History</a>
              <a class="dropdown-item" href="../admin/pending_orders.php"><i class="fas fa-hourglass-half"></i> Pending Transactions</a>
            </div>
        </div>
        </li>
       
       <li class="nav-item">
          <div class="dropdown">
            <button class="btn dropdown-toggle btn-lg" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: #dc3545; color: white;">
                                    Edit Pages <i class="fas fa-edit"></i>
                                    </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
              <a class="dropdown-item" href="../admin/edit_products.php">Products</a>
            </div>
            </div>
        </li>

        <li class="nav-item">
          <div class="dropdown">
            <button class="btn dropdown-toggle btn-lg" type="button" id="dropdownMenuButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: #dc3545; color: white; margin-right: 2px;">

            <?php if($_SESSION['profile_image'] != NULL): ?>

            <img src="../images/profile_images/<?php echo $_SESSION['profile_image']?>" width="35" height="35" alt="UserImg" style="border-radius: 50%;margin-right:2px;">  <?php echo $_SESSION['name'] ?>
            
            <?php else: ?>
            
            <img src="../images/profile_images/sample-superadmin.png" width="35" height="35" alt="UserImg" style="border-radius: 50%;margin-right:2px;">  <?php echo $_SESSION['name'] ?>

            <?php endif ?>

                                    </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton3" style="left: -16px;">
            <a class="dropdown-item" href="../admin/admin_page.php"><i class="fa fa-user"></i> Profile</a>

        <?php endif ?>

              <form action="../includes/scripts/logout.php" method="POST">
                <button type="submit" name="submit" class="btn btn-danger btn-dropdown-white"><i class="fas fa-sign-out-alt"></i> Logout</button>
              </form>
            </div>
          </li>
        </div>

        <?php else: ?>

        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#signupModal" data-whatever="@mdo" style="cursor: pointer;">Sign Up <i class="fa fa-user-plus"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#loginModal" data-whatever="@mdo" style="cursor: pointer;">Login <i class="fa fa-user"></i></a>
        </li>

        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>

<!-- Modals -->

<form action="../includes/scripts/signup.php" method="POST" enctype="multipart/form-data">
  <div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Sign Up</h5>
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
              <input type="text" name="txtfullname" class="form-control" required pattern="[a-zA-Z\s]+" title="Only letters are allowed">
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
              <label for="password">Password:</label>
              <input type="password" name="txtpassword" class="form-control" required>
            </div>
          </div>

          <div class="form-row">
            <div class="col">
              <label for="confirmpassword">Confirm Password:</label>
              <input type="password" name="txtconfirmpassword" class="form-control" required>
            </div>
          </div>
          
          <div class="form-row">
            <div class="col">
              <label for="phonenumber">Enter Phone Number:</label>
              <input type="phonenumber" name="txtno" class="form-control" required>
            </div>
          </div>

          <div class="form-row">
            <div class="col">
              <label for="fulladdress">Enter Full Address:</label>
              <input type="fulladdress" name="txtfulladdress" class="form-control" required>
            </div>
              <div class="col">
              <label for="city">Enter City:</label>
              <input type="city" name="txtcity" class="form-control" required>
            </div>
            </div>

          <hr>

          <div class="modal-footer col-lg-12">
            <button type="submit" name="submit" class="btn btn-success float-right">Sign Up</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>

<form action="../includes/scripts/login.php" method="POST">
  <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content" style="width: 400px; margin: auto;">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Login</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="email">Email:</label>
            <div class="col-sm-12">
              <input type="email" name="txtemail" class="form-control" required>
            </div>
          </div>

          <div class="form-group">
            <label for="password">Password:</label>
            <div class="col-sm-12">
              <input type="password" name="txtpassword" class="form-control" required>
            </div>
          </div>
          
          <hr style="width:360px;">

          <div class="modal-footer col-lg-12">
            <button type="submit" name="submit" class="btn btn-success">Log In</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>