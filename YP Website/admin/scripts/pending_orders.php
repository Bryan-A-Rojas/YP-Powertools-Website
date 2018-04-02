<?php

require_once '../config_admin.php';

	if(isset($_POST['Approve'])){

		require ADMIN_CLASSES . 'Admin.inc.php';

		$Admin = new Admin($_SESSION['account_id']);

		$Admin->update_pending_transaction($_POST['transaction_id'], 'approved');
		
		header("Location: ../pending_orders.php?transaction=approved");
		exit();

	} elseif(isset($_POST['Deny'])){

		require ADMIN_CLASSES . 'Admin.inc.php';

		$Admin = new Admin($_SESSION['account_id']);

		$Admin->update_pending_transaction($_POST['transaction_id'], 'denied');
		
		header("Location: ../pending_orders.php?transaction=approved");
		exit();

	} else {
		header("Location: ../pending_orders.php?transaction=used_get");
		exit();
	}