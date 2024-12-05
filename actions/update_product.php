<?php
  session_start();
  include('../utils/connections.php');
  if (
    isset($_POST['product_id']) &&
    isset($_POST['product_name']) &&
    isset($_POST['product_stock']) &&
    isset($_POST['menu_id']) &&
    isset($_POST['price_medio']) &&
    isset($_POST['price_grande'])
  ) {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_stock = $_POST['product_stock'];
    $menu_id = $_POST['menu_id'];
    $price_medio = $_POST['price_medio'];
    $price_grande = $_POST['price_grande'];

    $update_query = "UPDATE `products` SET menu_id = ?, product_name = ?, product_stock = ? WHERE id = ?";
    $stmt = $conn->prepare($update_query);
    $stmt->bind_param('ssss', $menu_id, $product_name, $product_stock, $product_id);
    $result = $stmt->execute();
    if ($result == 1) {
      $update_query = "UPDATE `products_price` SET price_medio = ?, price_grande = ? WHERE product_id = ?";
      $stmt = $conn->prepare($update_query);
      $stmt->bind_param('sss', $price_medio, $price_grande, $product_id);
      $result = $stmt->execute();
      if ($result == 1) {
        header('Location: ../admin/products/');
      } else {
        header('Location: ../admin/products/');
      }
    } else {
      header('Location: ../admin/products/');
    }
  } else {
    header('Location: ../admin/products/');
  }
?>
