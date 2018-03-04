<?php 

session_start();
include '../includes/header.inc.php';
include '../includes/navbar.inc.php';

?>
            <!-- Carousel -->
            <div class="container">
            <div class="row">
            <div class="col-md-12">
	            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
	                <ol class="carousel-indicators">
	                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
	                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
	                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>

	                </ol>
	                <div class="carousel-inner">
	                    <div class="carousel-item active">
	                        <img class="d-block w-100" src="../images/Available in Stock/Angle Grinder/20180217_145912.jpg" alt="First slide">
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
        	</div>
        </div>


<!-- Sort by -->

	<!-- Columns -->
	<div class="row column-products">
	  <div class="col-md-4">
	    <div class="col-md-12 column-item">
	     Set room heater temperature
	   </div>
	 </div>
	 <div class="col-md-4">
	    <div class="col-md-12 column-item">
	     Set room heater temperature
	   </div>
	 </div>
	 <div class="col-md-4">
	   <div class="col-md-12 column-item">
	     Set room heater temperature
	   </div>
	 </div>
	</div>

	<div class="row">
	<!-- Pagination -->
		<nav aria-label="Page navigation example" class="pagination-placement">
		  <ul class="pagination">
		    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
		    <li class="page-item"><a class="page-link" href="#">1</a></li>
		    <li class="page-item"><a class="page-link" href="#">2</a></li>
		    <li class="page-item"><a class="page-link" href="#">3</a></li>
		    <li class="page-item"><a class="page-link" href="#">Next</a></li>
		  </ul>
		</nav>
	</div>

</div>

<?php 

include '../includes/footer.inc.php';
include '../includes/endtags.inc.php';

?>