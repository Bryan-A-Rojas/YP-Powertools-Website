<?php 

require_once '../config.php';

		require_once INCLUDES . 'header.inc.php';

		require_once INCLUDES . 'navbar.inc.php';

?>

<div class="jumbotron" id="jumbotron-color">
	<div class="container" style="margin-top: 10px; margin-left: 60px">
		<h2>Checkout</h2>
		<a href="products.php">&lt;Back to products page</a>
	</div>
</div>

<div class="container" id="form-transbox">
		<form action="">
	<div class="form-group row">
      <label for="" class="col-sm-2 col-form-label">Enter Amount</label>
       <div class="col-sm-4">
      <input type="fulladdress" placeholder="Amount" name="txtfulladdress" class="form-control " required>
  		</div>
    </div>
	</form>
	<div class="row">
		<div class="col-md-5">Product Name</div>
		<div class="col-md-5">price</div>
		<div class="col-md-2">Qty</div>
	</div>
	<br />
	<div class="row">
		<div class="col-md-12"><button type="submit" name="submit" class="btn btn-success float-right">Checkout</button></div>
	</div>
	
</div>

<?php 

		require_once INCLUDES . 'endtags.inc.php';

?>