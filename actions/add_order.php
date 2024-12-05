<?php
  session_start();
  include('../utils/connections.php');
  if (
    isset($_POST['product_id']) &&
    isset($_POST['size_value']) &&
    isset($_POST['size_quantity'])
  ) {
    $product_id = $_POST['product_id'];
    $size_value = $_POST['size_value'];
    $size_quantity = intval($_POST['size_quantity']);

    $fetch_query = "SELECT * FROM products WHERE id = ".$product_id." AND product_status = 'AVAILABLE' AND product_stock > 0 LIMIT 1";
    $result = $conn->query($fetch_query);
    if ($result->num_rows > 0) {
      $product_row = $result->fetch_assoc();
      $product_name = $product_row['product_name'];
      $product_stock = intval($product_row['product_stock']);

      if ($product_stock >= $size_quantity) {
        $fetch_query = "SELECT * FROM products_price WHERE product_id = ".$product_id." LIMIT 1";
        $result = $conn->query($fetch_query);
        if ($result->num_rows > 0) {
          $price_row = $result->fetch_assoc();
          $price_medio = $price_row['price_medio'];
          $price_grande = $price_row['price_grande'];
  
          $product_price = 0.00;
          if ($size_value == 'Medio') {
            $product_price = floatval($price_medio);
          } else {
            $product_price = floatval($price_grande);
          }
  
          $newItem = array(
            'product_id' => $product_id,
            'item' => $product_name,
            'size' => $size_value,
            'price' => $product_price,
            'quantity' => intval($size_quantity)
          );
  
          if (isset($_SESSION['cart_products'])) {
            if (count($_SESSION['cart_products']) == 0) {
              $_SESSION['cart_products'] = array($newItem);  
            } else {
              $isAlreadyExisting = false;
              $currentRow = 0;
              $updatedItem = array();
              foreach ($_SESSION['cart_products'] as $cart_items) {
                if (
                  $cart_items['product_id'] == $product_id &&
                  $cart_items['size'] == $size_value
                ) {
                  $isAlreadyExisting = true;
                  $newQuantity = intval($cart_items['quantity']) + intval($size_quantity);
                  $updatedItem = array(
                    'product_id' => $cart_items['product_id'],
                    'item' => $cart_items['item'],
                    'size' => $cart_items['size'],
                    'price' => $cart_items['price'],
                    'quantity' => $newQuantity
                  );
                  break;
                }
                $currentRow += 1;
              }
              if ($isAlreadyExisting == true) {
                $_SESSION['cart_products'][$currentRow] = $updatedItem;
              } else {
                $_SESSION['cart_products'][] = $newItem;
              }
            }
          } else {
            $_SESSION['cart_products'] = array($newItem);
          }
          // echo json_encode($_SESSION['cart_products']);
          header('Location: ../');
        } else {
          header('Location: ../');
        }
      } else {
        header('Location: ../');
      }
    } else {
      header('Location: ../');
    }
  } else {
    unset($_SESSION['cart_products']);
    header('Location: ../');
  }
?>
