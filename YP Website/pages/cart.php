<?php 

require_once '../config.php';

require_once INCLUDES . 'header.inc.php';

require_once INCLUDES . 'navbar.inc.php';

require_once CLASSES . 'Cart.inc.php';

$cart = new Cart($_SESSION['account_id']);

$cart_items = $cart->display_cart();

?>

<div class="container">
<div class="jumbotron">
  <h1>Cart</h1>

  <form action="../includes/scripts/clear_cart.inc.php" method="POST">
    <input type="Submit" name="clear_cart" value="Clear Cart" class="btn btn-danger btn-lg float-right">
  </form>
</div>

<table class="table table-hover table-dark">
  <thead>
    <tr>
      <th scope="col">Product Image</th>
      <th scope="col">Name</th>
      <th scope="col">Price/Piece</th>
      <th scope="col">Quantity</th>
      <th scope="col">Description</th>
    </tr>
  </thead>
  </tfoot>
  <tbody>

    <?php foreach ($cart_items as $key => $item): ?>
      
    <?php if($item != end($cart_items)): ?>
      <tr>
        <th scope="row"><img src="../images/products/<?php echo $item['image'] ?>" class="product-image-size"></th>
        <td><?php echo $item['name'] ?></td>
        <td><?php echo $item['price'] ?></td>
        <td><?php echo $item['quantity'] ?></td>
        <td><?php echo $item['description'] ?></td>
        <td><input type="Submit" value="Remove" class="btn btn-danger btn-lg float-right"></td>
      </tr>
    <?php endif ?>

    <?php endforeach ?>

  </tbody>
  <tfoot>
    <tr align="justify" style="color: #00ff35; font-size: 25px;">
      <td>Total</td>
      <td><?php echo $cart_items['Total Price']['Total'] ?></td>
      <td></td>
      <td></td>
      <td></td>
      <td><form action="#">
  <input type="Submit" value="Checkout" class="btn btn-success btn-lg" style="float: right;">
  </form></td>
    </tr>
  </tfoot>
</table>
</div>

<?php 

require_once INCLUDES . 'footer.inc.php';
require_once INCLUDES . 'endtags.inc.php';

?>