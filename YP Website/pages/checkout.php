<?php 

require_once '../config.php';

require_once INCLUDES . 'header.inc.php';

require_once INCLUDES . 'navbar.inc.php';

require_once CLASSES . 'cart.inc.php';

$checkout = new Cart($_SESSION['account_id']);

$checkout_items = $checkout->display_checkout();

?>

<div style="margin-top: 20px">
  <a href="cart.php" style="margin-left: 50px;">&lt;Back to cart</a>
</div>
<div class="jumbotron" id="jumbotron-color" style="height:185px">
	<div class="container" style="margin-top: 10px; margin-left: 60px">
		<h1>Checkout</h1>
	</div>
</div>

<div class="container">
	<table class="table table-hover table-bordered table-striped table-dark">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Name</th>
        <th scope="col">Price/Piece</th>
        <th scope="col">Quantity</th>
      </tr>
    </thead>
    <tbody>

      <?php foreach ($checkout_items as $key => $item): ?>
        <?php if($item != end($checkout_items)): ?>

          <tr>
            <td><?php echo $item['name'] ?></td>
          	<td>&#x20B1;<?php echo number_format((float)$item['price'], 2, '.', '');?></td>
          	<td><?php echo $item['quantity'] ?></td>
          </tr>
        
        <?php endif ?>
      <?php endforeach ?>

    </tbody>
     <tfoot>
      <tr align="justify" style="color: #00ff35; font-size: 25px;">
        <td>Total: &#x20B1;<?php echo number_format((float)$checkout_items['Total Price']['Total'], 2, '.', ''); ?></td>
        <td></td>
        <td></td>
      </tr>
    </tfoot>
  </table>

  <div class="row">
    <div class="col-lg-6">  
    </div>
    <div class="col-lg-6">
      <form action="../includes/scripts/checkout.php" method="POST">
        <button type="submit" name="checkout" class="btn btn-success float-right">Checkout</button>
        <input type="text" placeholder="0.00" name="txtpayment" class="form-control float-right" style="width:200px;margin-right: 6px;" required autofocus>
      </form>
      <label class="float-right col-form-label" style="margin-right:5px; font-size:19px;">Enter Amount: PHP</label>
    </div>  
  </div>

</div>

<?php 

		require_once INCLUDES . 'endtags.inc.php';

?>