<?php 

session_start();
include '../includes/header.inc.php';
include '../includes/navbar_admin.inc.php';

include '../includes/scripts/Classes/Admin.inc.php';

$Admin = new Admin($_SESSION['id']);

$users_array = $Admin->get_users();

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
    </tr>
  </thead>
  </tfoot>
  <tbody>

    <?php foreach ($users_array as $user): ?>
    <tr>

      <?php if($user['profile_image'] != NULL): ?>
        <th scope="row"><img src="../images/profile_images/<?php echo $user['profile_image'] ?>" alt="product-img" class="product-image-size"></th>
      <?php else: ?>
        <th scope="row"><img src="../images/profile_images/sample-user.png"  alt="product-img" class="product-image-size"></th>
      <?php endif ?>

      <td><?php echo $user['full_name'] ?></td>
      <td><?php echo $user['email'] ?></td>
    </tr>
    <?php endforeach ?>

  </tbody>
</table>
</div>

<?php 

include '../includes/footer.inc.php';
include '../includes/endtags.inc.php';

?>