<?php
include('connection.php');
$stm = $conn->prepare("SELECT * FROM products WHERE product_category='watches' LIMIT 4");
$stm->execute();
$watches_products = $stm->get_result();
?>
