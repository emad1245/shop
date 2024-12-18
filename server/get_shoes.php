<?php
include('connection.php');
$stm = $conn->prepare("SELECT * FROM products WHERE product_category='shoes' LIMIT 4");
$stm->execute();
$shoes_products = $stm->get_result();
?>
