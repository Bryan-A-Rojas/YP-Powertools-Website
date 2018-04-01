<nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="bg-dark">
   		<a class="navbar-brand" href="../pages/index.php">
   			<img src="../images/icons/yplogowh.png" width="30" height="30" alt="">	Powertools
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
                            <a class="nav-link" href="../pages/cart.php">Cart <i class="fas fa-shopping-cart"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../pages/user_page.php">Profile <i class="fa fa-user"></i></a>
                        </li>

                    <?php elseif($_SESSION['role'] == "admin"): ?>

                        <li class="nav-item">
                            <div class="dropdown">
                                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: #dc3545; color: white;">
                                    Actions <i class="fas fa-cogs"></i>
                                    </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <a class="dropdown-item" href="../admin/report_page.php"><i class="fas fa-chart-pie"></i> Reports</a>
                                    <a class="dropdown-item" href="../admin/accountlist_admin.php"><i class="fas fa-users"></i> Account List</a>
                                    <a class="dropdown-item" href="../admin/receipt_page.php"><i class="fas fa-list-alt"></i> Order History</a>
                                    <a class="dropdown-item" href="../admin/pending_orders.php"><i class="fas fa-hourglass-half"></i> Pending Transactions</a>
                                </div>
                            </div>
                        </li>

                        <li class="nav-item">
                            <div class="dropdown">
                                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: #dc3545; color: white;">
                                    Edit Pages <i class="fas fa-edit"></i>
                                    </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                    <a class="dropdown-item" href="../admin/edit_products.php">Products</a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../admin/admin_page.php">Profile <i class="fa fa-user"></i></a>
                        </li>

                    <?php elseif($_SESSION['role'] == "superadmin"): ?>
                        
                        <li class="nav-item">
                            <div class="dropdown">
                                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: #dc3545; color: white;">
                                    Actions <i class="fas fa-cogs"></i>
                                    </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <a class="dropdown-item" href="../admin/report_page.php">Reports <i class="fas fa-chart-pie"></i></a>
                                    <a class="dropdown-item" href="../admin/accountlist_admin.php">Account List <i class="fas fa-users"></i></a>
                                    <a class="dropdown-item" href="../admin/receipt_page.php">Order History <i class="fas fa-list-alt"></i></a>
                                    <a class="dropdown-item" href="../admin/pending_orders.php">Pending Transactions <i class="fas fa-hourglass-half"></i></a>
                                </div>
                            </div>
                        </li>

                        <li class="nav-item">
                            <div class="dropdown">
                                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: #dc3545; color: white;">
                                    Edit Pages <i class="fas fa-edit"></i>
                                    </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                    <a class="dropdown-item" href="../admin/edit_products.php">Products</a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../admin/admin_page.php">Profile <i class="fa fa-user"></i></a>
                        </li>

                    <?php endif ?>
                    
					    <li class="nav-item">
                            <form action="../includes/scripts/logout.php" method="POST">
                                <button type="submit" name="submit" class="btn btn-danger">Logout <i class="fas fa-sign-out-alt"></i></button>
                            </form>
                        </li>

                <?php else: ?>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="../pages/signupform.php">Sign Up <i class="fa fa-user-plus"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="modal" data-target="#loginModal" data-whatever="@mdo">Login <i class="fa fa-user"></i></a>
                    </li>
                    
                <?php endif; ?>
                </ul>
            </div>
        </div>
</nav>

<form action="../includes/scripts/login.php" method="POST">
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Login</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
            <div class="modal-body">
              <div class="form-group">
					    <label for="email">Email:</label>
					    <div class="col-sm-6">
					    <input type="email" placeholder="Enter Email" name="txtemail" class="form-control" required>
						</div>
					  </div>

					    <div class="form-group">
					    <label for="password">Password:</label>
					    <div class="col-sm-6">
					    <input type="password" placeholder="Enter Password" name="txtpassword" class="form-control" required>
						</div>
					  </div>

              <div class="modal-footer">
                 <button type="submit" name="submit" class="btn btn-success">Log In</button>
                 	<br>
				<p style="display:inline;">No account? </p><a href="signupform.php" style="display:inline;">Sign Up here</a>
              </div>
          </div>
        </div>
      </div>
    </div>
  </form>