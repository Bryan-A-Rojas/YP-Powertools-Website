<?php 

require_once '../config.php';

require_once INCLUDES . 'header.inc.php';
require_once INCLUDES . 'navbar.inc.php';
require_once SCRIPTS . 'functions.inc.php';

require_once CLASSES . 'Cart.inc.php';
$cart = new Cart($_SESSION['account_id']);
$cart_items = $cart->display_cart();

//Display notification if it exists
if(isset($_SESSION['notify'])){
    require_once CLASSES . 'Notifications.php';
    echo Notification::display_notification();
    Notification::delete_from_session();        
}

?>

<div class="container">
<div class="jumbotron">
  <h1>Cart</h1>

  <?php if($cart_items['Total Price']['Total'] != 0): ?>

  <form action="../includes/scripts/clear_cart.inc.php" method="POST">
    <input type="Submit" name="clear_cart" value="Clear Cart" class="btn btn-danger btn-lg float-right">
  </form>

  <?php endif ?>

</div>

<?php if($cart_items['Total Price']['Total'] <= 0): ?>
    
    <div class="col-lg-12">
      <p class="unavailable-message" style="background-color: darkblue; margin-bottom: 39px;">Cart is empty<p>
    </div>

<?php else: ?>

  <div class="table-responsive">
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
      <tbody>

        <?php foreach ($cart_items as $key => $item): ?>
          
        <?php if($item != end($cart_items)): ?>
          <tr>
            <th scope="row"><img src="../images/products/<?php echo $item['image'] ?>" class="product-image-size"></th>
            <td><?php echo $item['name'] ?></td>
            <td><?php echo commafy($item['price']); ?></td>
            <td><?php echo $item['quantity'] ?></td>
            <td><?php echo $item['description'] ?></td>
            <td>
              <form action="../includes/scripts/remove_cart_item.php" method="POST">
                <input type="Submit" name="Remove" value="Remove" class="btn btn-danger btn-lg float-right">
                <input type="hidden" name="product_id" value="<?php echo $item['product_id']?>">
              </form>
            </td>
          </tr>
        <?php endif ?>

        <?php endforeach ?>

      </tbody>
      <tfoot>
        <tr align="justify" style="color: #00ff35; font-size: 25px;">
          <td>Total <?php echo commafy($cart_items['Total Price']['Total']); ?></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td>

            <?php if($cart_items['Total Price']['Total'] != 0): ?>

            <form action="checkout.php" method="POST">
              <input type="Submit" value="Checkout" class="btn btn-success btn-lg" style="float: right;">
            </form>

            <?php endif ?>

          </td>
        </tr>
      </tfoot>
    </table>
  </div>

<?php endif ?>

</div>

<?php 

require_once INCLUDES . 'footer.inc.php';

require_once INCLUDES . 'endtags.inc.php';

?>