<?php
include('app/init.php');

echo "<pre>";
print_r($Categories->get_categories());
echo "</pre>";

/* $Template->set_data('header', 'hello');
$Template->set_alert('alert');

$Template->load('app/views/v_public_home.php', 'Welcome');*/
//$Template->redirect('http://www.monatemedia.com');

?>