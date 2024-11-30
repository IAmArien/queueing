<?php
  session_start();
  include('../utils/connections.php');
  if (
    isset($_POST['product_name']) &&
    isset($_POST['menu_id']) &&
    isset($_POST['price_medio']) &&
    isset($_POST['price_grande'])
  ) {
    $product_name = $_POST['product_name'];
    $menu_id = $_POST['menu_id'];
    $price_medio = $_POST['price_medio'];
    $price_grande = $_POST['price_grande'];

    $insert_query = "INSERT INTO `products` (
      `product_name`,
      `menu_id`
    ) VALUES (?, ?)";
    $stmt = $conn->prepare($insert_query);
    $stmt->bind_param('ss', $product_name, $menu_id);
    $result = $stmt->execute();
    if ($result == 1) {
      $fetch_query = "SELECT * FROM products ORDER BY id DESC LIMIT 1";
      $result = $conn->query($fetch_query);
      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $product_id = $row['id'];

        $insert_query = "INSERT INTO `products_price` (
          `product_id`,
          `price_medio`,
          `price_grande`
        ) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($insert_query);
        $stmt->bind_param('sss', $product_id, $price_medio, $price_grande);
        $result = $stmt->execute();

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