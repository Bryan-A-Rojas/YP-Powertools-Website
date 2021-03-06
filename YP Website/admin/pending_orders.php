<?php 

require_once 'config_admin.php';

require_once INCLUDES . 'header.inc.php';

require_once INCLUDES . 'navbar.inc.php';

require SCRIPTS . 'functions.inc.php';

if(isset($_SESSION['account_id'])){

  if($_SESSION['role'] == 'admin'){
    require ADMIN_CLASSES . 'Admin.inc.php';

    $Admin = new Admin($_SESSION['account_id']);

    if(isset($_GET['account_id'])){
      $pending_transactions = $Admin->get_specific_pending_transactions($_GET['account_id']);
      //Get the name of the user
      $user_name = $Admin->get_specific_user($_GET['account_id']);
      $user_name = $user_name[0]['account_name'];
    } else {
      $pending_transactions = $Admin->get_pending_transactions();
    }

    //Get details for each transaction
    $order_history_details = [];

    foreach($pending_transactions as $item){
        $order_history_details[] = $Admin->get_products_in_order_history($item['transaction_id']);
    }

  } elseif($_SESSION['role'] == 'superadmin'){
    require ADMIN_CLASSES . 'Admin.inc.php';
    require ADMIN_CLASSES . 'SuperAdmin.inc.php';

    $SuperAdmin = new SuperAdmin($_SESSION['account_id']);
    
    if(isset($_GET['account_id'])){
      $pending_transactions = $SuperAdmin->get_specific_pending_transactions($_GET['account_id']);
      //Get the name of the user
      $user_name = $SuperAdmin->get_specific_user($_GET['account_id']);
      $user_name = $user_name[0]['account_name'];
    } else {
      $pending_transactions = $SuperAdmin->get_pending_transactions();
    }

    //Get details for each transaction
    $order_history_details = [];

    foreach($pending_transactions as $item){
        $order_history_details[] = $SuperAdmin->get_products_in_order_history($item['transaction_id']);
    }
    
  }
}

$modal_counter = 0;

//Display notification if it exists
if(isset($_SESSION['notify'])){
    require_once CLASSES . 'Notifications.php';
    echo Notification::display_notification();
    Notification::delete_from_session();        
}

?>

<div class="container" style="padding-bottom: 20px;margin-top: 30px;">

  <?php if(isset($_GET['account_id'])): ?>
  
    <a href="accountlist.php">&lt;Back to Account List page</a>
  
  <?php endif ?>

</div>

<div class="container">
  <div class="jumbotron" id="jumbotron-color">
    <h1>Pending Transaction</h1>

    <?php if(isset($user_name)): ?>
      <h2><?php echo $user_name ?></h2>
    <?php endif ?>
  </div>

  <?php if(count($pending_transactions) < 1): ?>
    
    <div class="col-lg-12">
      <p class="unavailable-message" style="background-color: darkblue; margin-bottom: 39px;">No Pending Orders<p>
    </div>

  <?php else: ?>

  <div class="table-responsive">
    <table class="table table-hover table-bordered table-striped table-dark">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Transaction ID</th>
          
          <?php if(!isset($_GET['account_id'])): ?>
            <th scope="col">Account Name</th>
          <?php endif ?>
          
          <th scope="col">Total Price</th>
          <th scope="col">Payment Given</th>
          <th scope="col">Change Given</th>
          <th scope="col">Date of Purchase</th>
        </tr>
      </thead>
      <tbody>
        
        <?php foreach($pending_transactions as $key => $item): ?>

          <tr>
            <td style="text-align:center;"><?php echo $item['transaction_id'] ?></td>

            <?php if(!isset($_GET['account_id'])): ?>
              <td><?php echo $item['account_name'] ?></td>
            <?php endif ?>
            
            <td style="color:lightgreen;"><?php echo commafy($item['total_price']) ?></td>
            <td style="color:rgb(255, 116, 91);"><?php echo commafy($item['payment_given']) ?></td>
            <td style="color:orange;"><?php echo commafy($item['change_given']) ?></td>
            <td><?php echo $item['date_of_purchase'] ?></td>
            <td style="width:244px;">
              <button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#historyModal<?php echo $modal_counter ?>" data-whatever="@mdo" style="margin-left: 5px;">Info</button>
              <button type="button" class="btn btn-danger float-right" data-toggle="modal" data-target="#denyModal<?php echo $modal_counter ?>" data-whatever="@mdo" style="margin-left: 5px;">Deny</button>
              <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#approveModal<?php echo $modal_counter ?>" data-whatever="@mdo" style="margin-left: 5px;">Approve</button>
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
              <th scope="col">Account Name</th>
              <th scope="col">Total Price</th>
              <th scope="col">Payment Given</th>
              <th scope="col">Change Given</th>
              <th scope="col">Date of Purchase</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td style="text-align:center;"><?php echo $pending_transactions[$modal_counter]['transaction_id'] ?></td>
              <td><?php echo $pending_transactions[$modal_counter]['account_name'] ?></td>
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

  <form action="scripts/pending_orders.php" method="POST">
    <div class="modal fade" id="denyModal<?php echo $modal_counter ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to deny?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
                <div class="col-sm-12">
                  <label for="reason">Reason:</label>
                  <input type="text" name="txtreason" class="form-control" required>
                </div>
                <div class="col-sm-6">
                  <label for="password">Password:</label>
                  <input type="password" name="txtadminpassword" class="form-control" required>
                  <input type="hidden" value="<?php echo $pending_transactions[$modal_counter]['transaction_id'] ?>" name="transaction_id">
                </div>
            </div>
            <div class="modal-footer">
              <button type="submit" name="Deny" class="btn btn-danger">Deny</button>
            </div>    
          </div>
        </div>
      </div>
    </div>
  </form>

  <form action="scripts/pending_orders.php" method="POST">
    <div class="modal fade" id="approveModal<?php echo $modal_counter ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to approve?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="password">Password:</label>
                <div class="col-sm-6">
                  <input type="password" name="txtadminpassword" class="form-control" required>
                  <input type="hidden" value="<?php echo $pending_transactions[$modal_counter]['transaction_id'] ?>" name="transaction_id">
                </div>
            </div>
            <div class="modal-footer">
              <button type="submit" name="Approve" class="btn btn-success">Approve</button>
            </div>    
          </div>
        </div>
      </div>
    </div>
  </form>

<?php $modal_counter++ ?>
<?php endforeach ?>


<?php 

require_once INCLUDES . 'footer.inc.php';
require_once INCLUDES . 'endtags.inc.php';

?>