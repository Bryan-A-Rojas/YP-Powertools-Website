<?php

require_once '../config_admin.php';

	if(isset($_POST['Edit'])){

	} elseif(isset($_POST['Remove'])) {

		require_once ADMIN_CLASSES . 'Products.inc.php';

		$Products = new Products($_SESSION['account_id']);
		
		if($Products->delete_product($_POST['product_id'])){
			header("Location: ../edit_products.php?products=removed");
			exit();
		} else {
			header("Location: ../edit_products.php?products=fail_to_remove");
			exit();
		}

	} else {
		header("Location: ../edit_products.php?products=used_get");
		exit();
	}