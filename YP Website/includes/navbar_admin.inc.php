<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top" id="bg-dark">
   		<a class="navbar-brand" href="../pages/index.php">
   			<img src="../images/icons/yplogowh.png" width="30" height="30" alt="">	Powertools
   		</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
   			<span class="navbar-toggler-icon"><i class="fas fa-list"></i></span>
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
            <ul class="form-inline my-2 my-lg-0">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="accountlist_admin.php">Account List <i class="fas fa-users"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Edit Pages <i class="fas fa-edit"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../pages/admin_page.php">Profile <i class="fa fa-user"></i></a>
                    </li>
                    <li class="nav-item">
                        <form action="../includes/scripts/logout.php" method="POST">
                            <button type="submit" name="submit" class="btn btn-danger">Logout <i class="fas fa-sign-out-alt"></i></button>
                        </form>
                    </li>
                </ul>
            </ul>
        </div>
    </nav>