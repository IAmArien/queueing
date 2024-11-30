<?php
  session_start();
  include('../utils/connections.php');
  if ($_GET['product_id']) {
    $product_id = intval($_GET['product_id']);
    $delete_product_query = "DELETE FROM products WHERE id = ".$product_id."";
    $delete_price_query = "DELETE FROM products_price WHERE product_id = ".$product_id."";
    $conn->query($delete_product_query);
    $conn->query($delete_price_query);
    header('Location: ../admin/products/');
  }
?>
