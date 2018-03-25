<?php 

require_once '../config.php';

		require_once INCLUDES . 'header.inc.php';

		require_once INCLUDES . 'navbar.inc.php';

?>

<div style="margin-top: 20px">
<a href="products.php" style="margin-left: 50px;">&lt;Back to products page</a>
</div>
<div class="jumbotron" id="jumbotron-color">
	<div class="container" style="margin-top: 10px; margin-left: 60px">
		<h1>Checkout</h1>
	</div>
</div>

<div class="container" id="form-transbox">

	<table class="table table-hover table-light">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Price/Piece</th>
      <th scope="col">Quantity</th>
    </tr>
  </thead>
  <tbody>
  	<td>Tekken 7</td>
  	<td>P2500.00</td>
  	<td>2</td>
	<br />
</tbody>
</table>
<div class="row">
		<div class="col-lg-6">
		<label for="" class="col-sm-2 col-form-label">Enter Amount</label>
       	<input type="fulladdress" placeholder="Amount" name="txtfulladdress" class="form-control " required>
       	</div>
       	<div class="col-lg-6">
   			<button type="submit" name="submit" class="btn btn-success float-right">Checkout</button>
       	</div>	
</div>
	
</div>

<?php 

		require_once INCLUDES . 'endtags.inc.php';

?>