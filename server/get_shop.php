<?php
include('connection.php');
$stm = $conn->prepare("SELECT * FROM products WHERE product_category='shop' LIMIT 16");
$stm->execute();
$products = $stm->get_result();
?>
