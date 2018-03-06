<?php 

session_start();
include '../includes/header.inc.php';
include '../includes/navbar_user.inc.php';

?>

<div class="container">
<div class="jumbotron">
  <h1>Cart</h1>
<form action="">
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
    <tr>
      <th scope="row"><img src="../images/Available in Stock/Angle Grinder/20180217_145912.jpg" alt="product-img" class="product-image-size"></th>
      <td>Angle Grinder</td>
      <td>3000</td>
      <td>1</td>
      <td>Wow Such Grinder Much Angle lorem</td>
    </tr>
    <tr>
      <th scope="row"><img src="../images/Available in Stock/Angle Grinder/20180217_145912.jpg" alt="product-img" class="product-image-size"></th>
      <td>Angle Grinder</td>
      <td>3000</td>
      <td>1</td>
      <td>Wow Such Grinder Much Angle</td>
    </tr>
  </tbody>
  <tfoot>
    <tr align="justify" style="color: green; font-size: 25px;">
      <td>Sum</td>
      <td>PHP 10,000</td>
    </tr>
</table>
</div>

<?php 

include '../includes/footer.inc.php';
include '../includes/endtags.inc.php';

?>