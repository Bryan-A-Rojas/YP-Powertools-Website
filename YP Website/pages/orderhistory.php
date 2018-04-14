<?php 

require_once '../config.php';

?>

<!DOCTYPE html>
<html>
    <head>
        <title>YP Powertools</title>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Patua+One" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Plaster" rel="stylesheet">
        <!-- Personalized CSS -->
        <link rel="stylesheet" type="text/css" href="../css/styles.css">
        <!-- Font Awesome -->
      <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        <style>
          @@media print {

            @@page {
                size: 15mm 30mm;
                margin: 0;
                color:black !important;
        
            
            }
            
            @@page table {
                border-collapse: collapse !important;
            }

            @@page table, th, td {
                border: 1px solid black !important;
            }
        }

        .hidden{
          display:none;
        }
        </style>

         <script>
          function myPrint(div_name, hidden_div) {
              var myPrintContent = document.getElementById(div_name);
              var myPrintWindow = window.open('http://localhost/php/YP-Powertools-Website/YP%20Website/pages/orderhistory.php');
              myPrintWindow.document.write(myPrintContent.innerHTML);
              myPrintWindow.document.getElementById(hidden_div).style.display='block'
              myPrintWindow.document.close();
              myPrintWindow.focus();
              myPrintWindow.print();
              myPrintWindow.close();    
              return false;
          }
</script>
    </head>
<body>

<?php 
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
              <button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#historyModal<?php echo $modal_counter ?>" data-whatever="@mdo" style="width: 72px;margin-bottom: 6px; margin-left:5px;">Info</button>
              <button class="btn btn-danger float-right" onclick="myPrint('print_div<?php echo $modal_counter ?>','hidden_div<?php echo $modal_counter ?>')"><i class="fas fa-file-pdf"></i> PDF</button>
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

<div id="print_div<?php echo $modal_counter ?>">
      <div id="hidden_div<?php echo $modal_counter ?>" class="hidden">
        <div class="container" style="color:black;">
          <div class="row">
            <div class="col-lg-12" style="text-align: center;">
              <h1 id="logo-text-sm" style="color: black;">YP Powertools</h1>
              <h3 style="text-align: center">Receipt</h3>
            </div>
          </div>
           <div class="row">
              <!-- <div class="col-lg-6 mx-auto">
                 <table class="table table-dark table-bordered">
                    <thead>
                       <h2 style="text-align: center">Customer</h2>
                       <tr>
                          <th scope="col">Name</th>
                          <th scope="col">Email</th>
                          <th scope="col">Phone Number</th>
                          <th scope="col">City</th>
                          <th scope="col">Address</th>
                       </tr>
                    </thead>
                    <tbody>
                       <tr>
                          <th scope="row"><?php //echo $order_history[$modal_counter]['account_name'] ?> </th>
                           <td>popoy@email.com </td>
                          <td>095241670 </td>
                          <td>Davao </td>
                          <td>Duterte St. Obosen Homes </td>
                       </tr>
                    </tbody>
                    <tfoot>
                    </tfoot>
                 </table>
              </div> -->
           </div>
           <div class="row">
              <div class="col-lg-6 mx-auto">
                 <h2 style="text-align: center">Receipt Information</h2>
              </div>
           </div>
           <div class="row">
             <div class="col-lg-6 mx-auto">
                 <table class="table table-dark table-bordered">
                    <thead>
                       <tr>
                          <th scope="col">Customer Name</th>
                          <th scope="col">Total Price</th>
                          <th scope="col">Payment Given</th>
                          <th scope="col">Change Given</th>
                          <th scope="col">Date of Purchase</th>
                       </tr>
                    </thead>
                    <tbody>
                       <tr>
                          <th><?php echo $order_history[$modal_counter]['account_name'] ?> </th>
                          <th><?php echo commafy($order_history[$modal_counter]['total_price']) ?> </th>
                          <td><?php echo commafy($order_history[$modal_counter]['payment_given']) ?></td>
                          <td><?php echo commafy($order_history[$modal_counter]['change_given']) ?></td>
                          <td><?php echo date("M d, Y", strtotime($order_history[$modal_counter]['date_of_purchase'])) ?></td>
                       </tr>
                    </tbody>
                 </table>
              </div>
           </div>
           <div class="row">
              <div class="col-lg-6 mx-auto">
                 <h2 style="text-align: center">Items Sold</h2>
              </div>
           </div>
           <div class="row">
              <div class="col-lg-6 mx-auto">
                 <table class="table table-dark table-bordered">
                    <thead>
                       <tr>
                          <th scope="col">Name</th>
                          <th scope="col">Quantity</th>
                          <th scope="col">Price</th>
                          <th scope="col">Subtotal</th>
                       </tr>
                    </thead>
                    <tbody>
                        <?php foreach($item as $receipt_information): ?>

                          <tr>
                            <td><?php echo $receipt_information['name'] ?></td>
                            <td>X <?php echo $receipt_information['quantity'] ?> </td>
                            <td> <?php echo commafy($receipt_information['price']) ?> </td>
                            <td>= <?php echo commafy($receipt_information['total']) ?> </td>
                          </tr>
                          
                          <?php endforeach ?>
                    </tbody>
                 </table>
              </div>
           </div>
        </div>
      </div>
    </div>




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