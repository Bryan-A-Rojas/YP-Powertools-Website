<?php 

require_once '../config.php';

require_once INCLUDES . 'header.inc.php';

require_once INCLUDES . 'navbar.inc.php';

//Display notification if it exists
if(isset($_SESSION['notify'])){
    require_once CLASSES . 'Notifications.php';
    echo Notification::display_notification();
    Notification::delete_from_session();        
}

?>

<div class="container">
  <h1>404</h1>
  <h2>File not found</h2>
  <p>The site configured at this address does not contain the requested file</p>
</div>

<?php 

require_once INCLUDES . 'endtags.inc.php';

?>