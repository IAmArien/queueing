<?php
  session_start();
  include('../utils/connections.php');
  if (isset($_GET['product_id']) && isset($_GET['product_status'])) {
    $product_id = intval($_GET['product_id']);
    $product_status = $_GET['product_status'];

    $update_query = "UPDATE `products` SET product_status = ? WHERE id = ?";
    $stmt = $conn->prepare($update_query);
    $stmt->bind_param('ss', $product_status, $product_id);
    $result = $stmt->execute();

    header('Location: ../admin/products/');
  }
?>
