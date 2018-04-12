<?php

require_once '../config_admin.php';
require_once CLASSES . 'Notifications.php';

	if(isset($_POST['Approve'])){

		require ADMIN_CLASSES . 'Admin.inc.php';		
		$account_id = $_SESSION['account_id'];
		$Admin = New Admin($account_id);
		if(!$Admin->check_password($_POST['txtadminpassword'])){
			Notification::save_to_session('danger', 'Access Denied!');
			header("Location: ../pending_orders.php");
			exit();
		}

		$Admin->update_pending_transaction($_POST['transaction_id'], 'approved');
		
		Notification::save_to_session('success', 'Transaction Approved!');
		header("Location: ../pending_orders.php");
		exit();

	} elseif(isset($_POST['Deny'])){

		require ADMIN_CLASSES . 'Admin.inc.php';
		$account_id = $_SESSION['account_id'];
		$Admin = New Admin($account_id);
		if(!$Admin->check_password($_POST['txtadminpassword'])){
			Notification::save_to_session('danger', 'Access Denied!');
			header("Location: ../pending_orders.php");
			exit();
		}

		$Admin->update_pending_transaction($_POST['transaction_id'], 'denied');
		Notification::save_to_session('danger', 'Transaction Denied!');
		header("Location: ../pending_orders.php");
		exit();

	} else {
		Notification::save_to_session('danger', 'Oops! You cannot access that page');
		header("Location: ../pending_orders.php");
		exit();
	}