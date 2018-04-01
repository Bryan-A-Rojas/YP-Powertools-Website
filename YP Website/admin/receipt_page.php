<?php 

require_once 'config_admin.php';
require_once INCLUDES . 'header.inc.php';

require_once INCLUDES . 'navbar.inc.php';

require_once ADMIN_CLASSES . 'Admin.inc.php';

$Admin = new Admin($_SESSION['account_id']);

$users_array = $Admin->get_users();

?>

<div class="container" style="padding-bottom: 20px;margin-top: 30px;">
		<a href="accountlist_admin.php">&lt;Back to Account List page</a>
	</div>

<div class="container">
<div class="jumbotron" id="jumbotron-color">
  <h1>Order History</h1>
</div>

<table class="table table-hover table-bordered table-striped table-dark">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Transaction ID</th>
        <th scope="col">Account Name</th>
        <th scope="col">Total Price</th>
        <th scope="col">Payment Given</th>
        <th scope="col">Date of Purchase</th>
      </tr>
    </thead>
    <tbody>

          <tr>
			<td>1</td>
			<td>test@gmail.com</td>
			<td>3,000.00</td>
			<td>3,000</td>
			<td>01/04/2018</td>
			<td>
				<button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#historyModal" data-whatever="@mdo">More Info</button>
</td>
</tr>
    </tbody>
  </table>
 </div>


    <div class="modal fade" id="historyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="width: 900px; margin-left: -50px;">
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
        <th scope="col">Date of Purchase</th>
      </tr>
    </thead>
    <tbody>

          <tr>
			<td>1</td>
			<td>test@gmail.com</td>
			<td>3,000.00</td>
			<td>3,000</td>
			<td>01/04/2018</td>
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
    
    <th scope="col"><img src="../images/products/Angle Grinder.jpg" class="product-image-size"></th>
    <td>Angle Grinder</td>
    <td>₱3,000.00</td>
    <td>2</td>
    <td>This is one of our best angle grinders and can last for years under the right care</td>
    <td>₱6,000.00</td>

    </tbody>

  </table>
        </div>
        </div>
      </div>
    </div>

<?php 

require_once INCLUDES . 'footer.inc.php';
require_once INCLUDES . 'endtags.inc.php';

?>