<?php 

session_start();
include '../includes/header.inc.php';
include '../includes/navbar_superadmin.inc.php';

?>

<div class="container">
<div class="jumbotron">
  <h1>Account List</h1>
</div>

<table class="table table-hover table-dark">
  <thead>
    <tr>
      <th scope="col">Account Image</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Role</th>
    </tr>
  </thead>
  </tfoot>
  <tbody>
    <tr>
      <th scope="row"><img src="../images/profile_images/mangkanor.jpg" alt="product-img" class="product-image-size"></th>
      <td>Mang Kanor</td>
      <td>mk69@gmail.com</td>
      <td>User</td>
    </tr>
    <tr>
      <th scope="row"><img src="../images/profile_images/jhdz.jpg" alt="product-img" class="product-image-size"></th>
      <td>Jhepoy Dizon</td>
      <td>jhdz@gmail.com</td>
      <td>User</td>
    </tr>
  </tbody>
</table>
</div>

<?php 

include '../includes/footer.inc.php';
include '../includes/endtags.inc.php';

?>