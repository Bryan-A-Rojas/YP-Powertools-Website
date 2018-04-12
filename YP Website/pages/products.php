<?php 

require_once '../config.php';

require_once INCLUDES . 'header.inc.php';
require_once SCRIPTS . 'functions.inc.php';
require_once INCLUDES . 'navbar.inc.php';
require_once CLASSES . 'Products.inc.php';

//Display notification if it exists
if(isset($_SESSION['notify'])){
    require_once CLASSES . 'Notifications.php';
    echo Notification::display_notification();
    Notification::delete_from_session();        
}


if(isset($_GET['page'])){
    $pageno = $_GET['page'];
} else {
    $pageno = 1;
}

$items_per_row = 4;
$number_of_rows = 3;
$items_per_page = $items_per_row * $number_of_rows;

if(isset($_GET['search'])){
    $products_array = Products::get_products_per_page_with_search($pageno, $items_per_page, $_GET['txtsearchproduct']);
} else {
    $products_array = Products::get_products_per_page($pageno, $items_per_page);
}

$page_count = $products_array['pages'];
$products_array = $products_array['products'];     

?>

<!-- Carousel -->
<div class="container-fluid">
<div class="jumbotron" id="jumbotron-color">
<h1 style="padding-left:30px;">Best Sellers</h1>
</div>
</div>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="padding-top:auto;">
    <ol class="carousel-indicators" id="indicator-adj">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>

    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="../images/Joe's Pictures/Old/Angle Grinder/20180217_145912.jpg" alt="First slide">
            <div class="carousel-caption d-none d-md-block" id="indicator-adj">
	    		<h5>Chainsaw</h5>
	    		<p>The best product in our store</p>
    		</div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="../images/Joe's Pictures/Old/Asaki - Table Vice/20180217_154915.jpg" alt="Second slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="../images/Joe's Pictures/Old/Finish Sander HT-FS 18702/20180217_150810.jpg" alt="Third slide">
        </div>
    </div>

    <a class="carousel-control-prev" id="control-adj" href="#carouselExampleIndicators" role="button" data-slide="prev" style="margin-bottom: ">
		<span class="arrow-black arrow-size fas fa-angle-left" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>

    <a class="carousel-control-next" id="control-adj" href="#carouselExampleIndicators" role="button" data-slide="next">
		<span class="arrow-black arrow-size fas fa-angle-right" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
</div>


<br>

<!-- Search and Sort by -->
<div class="container">
    <div class="row" style="padding-left:20px; margin-top:100px;">
        <div class="col-lg-6 float-right">
        	<form action="" method="GET">
        		<input type="text" placeholder="Search Product" name="txtsearchproduct" class="form-control">
        		<!-- <select name="sortby">
        			<option value="">Sort A to Z</option>
        			<option value="">Sort Z to A</option>
        			<option value="">Sort by Price Ascending</option>
        			<option value="">Sort by Price Descending</option>
        		</select> -->
        		<input type="submit" name="search" value="Search" class="btn btn-primary">
        	</form>
        </div>
    </div>
    <br>
    
    <?php if(count($products_array) < 1): ?>
        
        <div class="col-lg-12">
            <p class="unavailable-message">No Result<p>
        </div>

    <?php else: ?>
    
    <div class="col-lg-12">
    <div class="row">
        <?php foreach ($products_array as $product): ?>
            <div class='col-lg-3 col-sm-6'>
                <a href='../pages/specific_product_page.php?productid=<?php echo $product['product_id']?>' type='button' class='btn btn-link product-button'>
                <img class='rounded-square-size img-rounded img-fluid' src='../images/products/<?php echo $product['image']?>'>
                </a>
                
                <h4><?php echo $product['name'] ?></h4>
                <p style="color:green;"><?php echo commafy($product['price']); ?></p>
            </div>
        <?php endforeach ?>
    </div>

	 <!-- Pagination -->
     <div class="row"> 
        <nav aria-label="Page navigation example" class="pagination-placement">
            <ul class="pagination">

                <?php for($x = 1; $x <= $page_count; $x++): ?>
                    
                    <?php if((isset($_GET['page']) AND $x == $_GET['page']) OR $x == 1): ?>

                         <li class="page-item active">
                          <span class="page-link">
                            <?php echo $x ?>
                            <span class="sr-only">(current)</span>
                          </span>
                        </li>
                    
                    <?php else: ?>

                        <li class="page-item">
                            <a class="page-link" href="products.php?page=<?php echo $x ?>"><?php echo $x ?></a>
                        </li>
                        
                    <?php endif ?>
                <?php endfor ?>
            </ul>
        </nav>
    </div>
    
    <?php endif ?>

</div>

</div>

<?php 

require_once INCLUDES . 'footer.inc.php';
require_once INCLUDES . 'endtags.inc.php';

?>