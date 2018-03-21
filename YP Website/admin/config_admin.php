<?php
session_start();

define('ROOT', $_SERVER['DOCUMENT_ROOT'] . '/php/YP-Powertools-Website/YP Website/');
define('INCLUDES', ROOT . 'includes/');
define('SCRIPTS', ROOT . 'includes/scripts/');
define('CLASSES', ROOT . 'includes/scripts/classes/');
define('IMAGES', ROOT . 'images/');
define('PAGES', ROOT . 'pages/');

// Admin/superadmin paths
define('ADMIN', ROOT . 'admin/');
define('ADMIN_CLASSES', ADMIN . 'classes/');
define('ADMIN_SCRIPTS', ADMIN . 'scripts/');