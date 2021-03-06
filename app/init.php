<?php

/*
    INIT
    Basic configuration settings
*/

// connnect to database
$server = 'localhost';
$user = 'root';
$pass = 'root';
$db = 'ks_shop';
$Database = new mysqli($server, $user, $pass, $db);

// error reporting
mysqli_report(MYSQLI_REPORT_ERROR);
ini_set('display_errors', 1);

// set up constants
define('SITE_NAME', 'My Online Store');
define('SITE_PATH', 'http://localhost/phpcartoopmvc/');
define('IMAGE_PATH', 'http://localhost/phpcartoopmvc/resources/images/');

// include objects
include('app/models/m_template.php');
include('app/models/m_categories.php');
include('app/models/m_products.php');
include('app/models/m_cart.php');

// create objects
$Template = new Template();
$Categories = new Categories();
$Products = new Products();
$Cart = new Cart();

session_start();