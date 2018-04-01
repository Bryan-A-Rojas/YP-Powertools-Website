<?php 

require_once 'config_admin.php';

require_once INCLUDES . 'header.inc.php';
require_once INCLUDES . 'navbar.inc.php';

require_once ADMIN_CLASSES . 'Admin.inc.php';
require_once ADMIN_CLASSES . 'SuperAdmin.inc.php';

$Admin = new SuperAdmin($_SESSION['account_id']);

$users_array = $Admin->get_users_and_admins();

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
      <th scope="col">City</th>
      <th scope="col">Address</th>
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

      <td><?php echo $user['name'] ?></td>
      <td><?php echo $user['email'] ?></td>
      <td><?php echo $user['role'] ?></td>
      <td><?php echo $user['city'] ?></td>
      <td><?php echo $user['full_address'] ?></td>
    </tr>
    <?php endforeach ?>

  </tbody>
</table>
</div>

<?php 

require_once INCLUDES . 'footer.inc.php';
require_once INCLUDES . 'endtags.inc.php';

?>