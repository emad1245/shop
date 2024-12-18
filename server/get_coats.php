<?php
include('connection.php');
$stm = $conn->prepare("SELECT * FROM products WHERE product_category='coats' LIMIT 4");
$stm->execute();
$coats_products = $stm->get_result();
?>
