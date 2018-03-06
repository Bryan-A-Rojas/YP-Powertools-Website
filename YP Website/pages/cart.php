<?php 

session_start();
include '../includes/header.inc.php';
include '../includes/navbar_user.inc.php';

require_once '../includes/scripts/classes/Cart.inc.php';

$cart = new Cart($_SESSION['id']);

$cart_items = $cart->display_cart();

?>

<div class="container">
<div class="jumbotron">
  <h1>Cart</h1>
  <form action="../includes/clear_cart.inc.php" method="POST">
    <input type="Submit" name="clear_cart" value="Clear Cart" class="btn btn-danger btn-lg float-right">
  </form>
</div>

<table class="table table-hover table-dark">
  <thead>
    <tr>
      <th scope="col">Product Image</th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Description</th>
    </tr>
  </thead>
  </tfoot>
  <tbody>

    <?php foreach ($cart_items as $key => $item): ?>
      
    <?php if($item != end($cart_items)): ?>
      <tr>
        <th scope="row"><img src="../images/products/<?php echo $item['product_image'] ?>" class="product-image-size"></th>
        <td><?php echo $item['product_name'] ?></td>
        <td><?php echo $item['product_price'] ?></td>
        <td><?php echo $item['quantity'] ?></td>
        <td><?php echo $item['product_description'] ?></td>
      </tr>
    <?php endif ?>

    <?php endforeach ?>

  </tbody>
  <tfoot>
    <tr align="justify" style="color: #00ff35; font-size: 25px;">
      <td>Total</td>
      <td><?php echo $cart_items['Total Price']['SUM(product_price * quantity)'] ?></td>
    </tr>
  </tfoot>
</table>
</div>

<?php 

include '../includes/footer.inc.php';
include '../includes/endtags.inc.php';

?>