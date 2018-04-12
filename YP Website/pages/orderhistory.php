<?php 

require_once '../config.php';
require_once INCLUDES . 'header.inc.php';
require_once INCLUDES . 'navbar.inc.php';
require SCRIPTS . 'functions.inc.php';

require CLASSES . 'User.php';
$order_history = User::get_specific_order_history($_SESSION['account_id']);
$order_history_details = array();
foreach($order_history as $item){
  $order_history_details[] = User::get_products_in_order_history($item['transaction_id']);
}
$modal_counter = 0;

//Display notification if it exists
if(isset($_SESSION['notify'])){
    require_once CLASSES . 'Notifications.php';
    echo Notification::display_notification();
    Notification::delete_from_session();        
}

?>

<?php foreach($order_history_details as $item): ?>

<div class="modal fade" id="pendingModal<?php echo $modal_counter ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" style="width: 996px;margin-left: -87px;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">History</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
      </div>
      <div class="modal-body">
        <table class="table table-hover table-bordered table-striped table-dark">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Transaction ID</th>
              <th scope="col">Total Price</th>
              <th scope="col">Payment Given</th>
              <th scope="col">Change Given</th>
              <th scope="col">Date of Purchase</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td style="text-align:center;"><?php echo $pending_transactions[$modal_counter]['transaction_id'] ?></td>
              <td style="color:lightgreen;"><?php echo commafy($pending_transactions[$modal_counter]['total_price']) ?></td>
              <td style="color:rgb(255, 116, 91);"><?php echo commafy($pending_transactions[$modal_counter]['payment_given']) ?></td>
              <td style="color:orange;"><?php echo commafy($pending_transactions[$modal_counter]['change_given']) ?></td>
              <td><?php echo $pending_transactions[$modal_counter]['date_of_purchase'] ?></td>
            </tr>
          </tbody>
        </table>

        <table class="table table-hover table-bordered table-light">
          <thead>
            <tr>
              <th scope="col">Product Image</th>
              <th scope="col">Name</th>
              <th scope="col">Price/Piece</th>
              <th scope="col">Quantity</th>
              <th scope="col">Description</th>
              <th scope="col">Total</th>
            </tr>
          </thead>
          <tbody>
          
          <?php foreach($item as $receipt_information): ?>

          <tr>
            <th scope="col"><img src="../images/products/<?php echo $receipt_information['image'] ?>" class="product-image-size"></th>
            <td><?php echo $receipt_information['name'] ?></td>
            <td><?php echo commafy($receipt_information['price']) ?></td>
            <td><?php echo $receipt_information['quantity'] ?></td>
            <td><?php echo $receipt_information['description'] ?></td>
            <td><?php echo commafy($receipt_information['total']) ?></td>
          </tr>
          
          <?php endforeach ?>

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<?php $modal_counter++ ?>
<?php endforeach ?>

<?php $modal_counter = 0; ?>

<div class="container" style="padding-bottom: 20px;margin-top: 30px;"></div>
<div class="container">
  <div class="jumbotron" id="jumbotron-color">
    <h1>Order History</h1>
  </div>

  <?php if(count($order_history_details) < 1): ?>
    
    <div class="col-lg-12">
      <p class="unavailable-message" style="background-color: darkblue; margin-bottom: 39px;">No Records<p>
    </div>

  <?php else: ?>

  <div class="table-responsive-xl">
    <table class="table table-hover table-bordered table-striped table-dark">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Transaction ID</th>
          <th scope="col">Total Price</th>
          <th scope="col">Payment Given</th>
          <th scope="col">Change Given</th>
          <th scope="col">Date of Purchase</th>
          <th scope="col">Status</th>
        </tr>
      </thead>
      <tbody>
        
        <?php foreach($order_history as $key => $item): ?>

          <tr>
            <td style="text-align:center;"><?php echo $item['transaction_id'] ?></td>   
            <td style="color:lightgreen;"><?php echo commafy($item['total_price']) ?></td>
            <td style="color:rgb(255, 116, 91);"><?php echo commafy($item['payment_given']) ?></td>
            <td style="color:orange;"><?php echo commafy($item['change_given']) ?></td>
            <td><?php echo $item['date_of_purchase'] ?></td>
            <?php 
                $status = strtoupper($item['status']);
                $color = $status == "APPROVED" ? "green" : "red";

                echo "<td><p style='background-color:$color;border-radius: 5px; padding:8px;text-align: center;'>$status<p></td>";
            ?>
            <td>
              <button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#historyModal<?php echo $modal_counter ?>" data-whatever="@mdo">Info</button>
            </td>
          </tr>

        <?php $modal_counter++ ?>
        <?php endforeach ?>
        
      </tbody>
    </table>
  </div>

  <?php endif ?>

</div>

<?php $modal_counter = 0; ?>

<?php foreach($order_history_details as $item): ?>

<div class="modal fade" id="historyModal<?php echo $modal_counter ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content" style="width: 996px;margin-left: -87px;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">History</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
      </div>
      <div class="modal-body">
        <table class="table table-hover table-bordered table-striped table-dark">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Transaction ID</th>
              <th scope="col">Total Price</th>
              <th scope="col">Payment Given</th>
              <th scope="col">Change Given</th>
              <th scope="col">Date of Purchase</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td style="text-align:center;"><?php echo $order_history[$modal_counter]['transaction_id'] ?></td>
              <td style="color:lightgreen;"><?php echo commafy($order_history[$modal_counter]['total_price']) ?></td>
              <td style="color:rgb(255, 116, 91);"><?php echo commafy($order_history[$modal_counter]['payment_given']) ?></td>
              <td style="color:orange;"><?php echo commafy($order_history[$modal_counter]['change_given']) ?></td>
              <td><?php echo $order_history[$modal_counter]['date_of_purchase'] ?></td>
            </tr>
          </tbody>
        </table>

        <table class="table table-hover table-bordered table-light">
          <thead>
            <tr>
              <th scope="col">Product Image</th>
              <th scope="col">Name</th>
              <th scope="col">Price/Piece</th>
              <th scope="col">Quantity</th>
              <th scope="col">Description</th>
              <th scope="col">Total</th>
            </tr>
          </thead>
          <tbody>
          
          <?php foreach($item as $receipt_information): ?>

          <tr>
            <th scope="col"><img src="../images/products/<?php echo $receipt_information['image'] ?>" class="product-image-size"></th>
            <td><?php echo $receipt_information['name'] ?></td>
            <td><?php echo commafy($receipt_information['price']) ?></td>
            <td><?php echo $receipt_information['quantity'] ?></td>
            <td><?php echo $receipt_information['description'] ?></td>
            <td><?php echo commafy($receipt_information['total']) ?></td>
          </tr>
          
          <?php endforeach ?>

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<?php $modal_counter++ ?>
<?php endforeach ?>


<?php 

require_once INCLUDES . 'footer.inc.php';
require_once INCLUDES . 'endtags.inc.php';

?>