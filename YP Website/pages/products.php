<?php 

session_start();
include '../includes/header.inc.php';
include '../includes/navbar.inc.php';

?>

<!-- Carousel -->
<h1 style="padding-left:30px;">Best Sellers</h1>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="padding-top:10px">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>

    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="../images/Available in Stock/Angle Grinder/20180217_145912.jpg" alt="First slide">
            <div class="carousel-caption d-none d-md-block">
	    		<h5>Chainsaw</h5>
	    		<p>best productworld</p>
    		</div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="../images/Available in Stock/Asaki - Table Vice/20180217_154915.jpg" alt="Second slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="../images/Available in Stock/Finish Sander HT-FS 18702/20180217_150810.jpg" alt="Third slide">
        </div>
    </div>

    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
		<span class="arrow-black arrow-size fas fa-angle-left" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>

    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
		<span class="arrow-black arrow-size fas fa-angle-right" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
</div>


<br>

<!-- Search and Sort by -->
<div class="container">
    <div class="row" style="padding-left:20px">
    	<form action="#" method="GET">
    		<input type="text" placeholder="Search Product" name="txtsearcproduct" required>
    		<select name="sortby">
    			<option value="">Sort A to Z</option>
    			<option value="">Sort Z to A</option>
    			<option value="">Sort by Price Ascending</option>
    			<option value="">Sort by Price Descending</option>
    		</select>
    		<input type="submit" name="submit" class="btn btn-dark">
    	</form>
    </div>
    <br>
    <!-- Columns -->
    <div class="row">
        <div class="col-lg-4 col-sm-6">
            <!-- Button trigger modal -->
            <a href="../pages/specific_product_page.php?productid=1" type="button" class="btn btn-link product-button">
					  <img class="rounded-square-size img-rounded img-fluid" src="../images/Available in Stock/Angle Grinder/20180217_145912.jpg">
					</a>
            <h2>Product Name</h2>
            <p>Product Description Product Description Product Description Product Description Product Description Product Description</p>
        </div>

        <div class="col-lg-4 col-sm-6">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-link product-button" data-toggle="modal" data-target="#exampleModal">
					  <img class="rounded-square-size img-rounded img-fluid" src="../images/Available in Stock/Angle Grinder/20180217_150146.jpg">
					</button>

            <h2>Product Name</h2>
            <p>Product Description Product Description Product Description Product Description Product Description Product Description</p>
        </div>

        <div class="col-lg-4 col-sm-6">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-link product-button" data-toggle="modal" data-target="#exampleModal">
					  <img class="rounded-square-size img-rounded img-fluid" src="../images/Available in Stock/Asaki - Table Vice/20180217_155142.jpg">
					</button>

            <h2>Product Name</h2>
            <p>Product Description Product Description Product Description Product Description Product Description Product Description</p>
        </div>

        <div class="col-lg-4 col-sm-6">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-link product-button" data-toggle="modal" data-target="#exampleModal">
					  <img class="rounded-square-size img-rounded img-fluid" src="../images/Available in Stock/Finish Sander HT-FS 18702/20180217_150810.jpg">
					</button>

            <h2>Product Name</h2>
            <p>Product Description Product Description Product Description Product Description Product Description Product Description</p>
        </div>

        <div class="col-lg-4 col-sm-6">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-link product-button" data-toggle="modal" data-target="#exampleModal">
					  <img class="rounded-square-size img-rounded img-fluid" src="../images/Available in Stock/Angle Grinder/20180217_145912.jpg">
					</button>
            <h2>Product Name</h2>
            <p>Product Description Product Description Product Description Product Description Product Description Product Description</p>
        </div>

        <div class="col-lg-4 col-sm-6">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-link product-button" data-toggle="modal" data-target="#exampleModal">
					  <img class="rounded-square-size img-rounded img-fluid" src="../images/Available in Stock/Angle Grinder/20180217_145912.jpg">
					</button>
            <h2>Product Name</h2>
            <p>Product Description Product Description Product Description Product Description Product Description Product Description</p>
        </div>

        <div class="col-lg-4 col-sm-6">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-link product-button" data-toggle="modal" data-target="#exampleModal">
					  <img class="rounded-square-size img-rounded img-fluid" src="../images/Available in Stock/Angle Grinder/20180217_145912.jpg">
					</button>
            <h2>Product Name</h2>
            <p>Product Description Product Description Product Description Product Description Product Description Product Description</p>
        </div>

        <div class="col-lg-4 col-sm-6">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-link product-button" data-toggle="modal" data-target="#exampleModal">
					  <img class="rounded-square-size img-rounded img-fluid" src="../images/Available in Stock/Angle Grinder/20180217_145912.jpg">
					</button>
            <h2>Product Name</h2>
            <p>Product Description Product Description Product Description Product Description Product Description Product Description</p>
        </div>

        <div class="col-lg-4 col-sm-6">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-link product-button" data-toggle="modal" data-target="#exampleModal">
					  <img class="rounded-square-size img-rounded img-fluid" src="../images/Available in Stock/Angle Grinder/20180217_145912.jpg">
					</button>
            <h2>Product Name</h2>
            <p>Product Description Product Description Product Description Product Description Product Description Product Description</p>
        </div>

    </div>

	 <!-- Pagination -->
    <!-- <div class="row"> 
        <nav aria-label="Page navigation example" class="pagination-placement">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav>
    </div> -->

</div>

<?php 

include '../includes/footer.inc.php';
include '../includes/endtags.inc.php';

?>