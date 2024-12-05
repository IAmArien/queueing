<?php
  session_start();
  include('../utils/connections.php');
  if (isset($_POST['queue_orders']) && isset($_POST['queue_orders_type'])) {
    $queue_orders_type = $_POST['queue_orders_type'];
    $queue_orders = $_POST['queue_orders'];

    if (isset($_SESSION['cart_products'])) {
      if (count($_SESSION['cart_products']) >= 1) {
        $queue_orders = json_encode($_SESSION['cart_products']);
        foreach ($_SESSION['cart_products'] as $cart_items) {
          $product_id = intval($cart_items['product_id']);
          $size_quantity = intval($cart_items['quantity']);
          $fetch_query = "SELECT * FROM products WHERE id = ".$product_id." LIMIT 1";
          $product_result = $conn->query($fetch_query);
          if ($product_result->num_rows > 0) {
            $product_row = $product_result->fetch_assoc();
            $product_stock = intval($product_row['product_stock']);
            $new_stock = $product_stock - $size_quantity;
            $update_query = "UPDATE `products` SET product_stock = ? WHERE id = ?";
            $stmt = $conn->prepare($update_query);
            $stmt->bind_param('ss', $new_stock, $product_id);
            $result = $stmt->execute();
          }
        }
      }
    }

    $insert_query = "INSERT INTO `for_payment` (
      order_number,
      order_products,
      order_type,
      order_date,
      order_time,
      order_status
    ) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($insert_query);
    $order_number = strval(rand());
    $order_products = $queue_orders;
    $order_type = $queue_orders_type;
    $order_date = date("Y/m/d");
    $order_time = date("h:i:sa");
    $order_status = 'FOR PAYMENT';
    $stmt->bind_param(
      'ssssss',
      $order_number,
      $order_products,
      $order_type,
      $order_date,
      $order_time,
      $order_status
    );
    $result = $stmt->execute();
    if ($result == 1) {
      $fetch_query = "SELECT id FROM for_payment ORDER BY id DESC LIMIT 1";
      $result = $conn->query($fetch_query);
      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $order_id = $row['id'];
        $_SESSION['checkout.order_id'] = $order_id;
        $_SESSION['checkout.order_number'] = $order_number;
        $_SESSION['checkout.order_products'] = $order_products;
        $_SESSION['checkout.order_type'] = $order_type;
        $_SESSION['checkout.order_date'] = $order_date;
        $_SESSION['checkout.order_time'] = $order_time;
        $_SESSION['checkout.order_status'] = $order_status;
        unset($_SESSION['cart_products']);
        header('Location: ../for_payment');
      } else {
        unset($_SESSION['checkout.order_id']);
        unset($_SESSION['checkout.order_number']);
        unset($_SESSION['checkout.order_products']);
        unset($_SESSION['checkout.order_type']);
        unset($_SESSION['checkout.order_date']);
        unset($_SESSION['checkout.order_time']);
        unset($_SESSION['checkout.order_status']);
        unset($_SESSION['cart_products']);
        header('Location: ../');
      }
    } else {
      unset($_SESSION['checkout.order_id']);
      unset($_SESSION['checkout.order_number']);
      unset($_SESSION['checkout.order_products']);
      unset($_SESSION['checkout.order_type']);
      unset($_SESSION['checkout.order_date']);
      unset($_SESSION['checkout.order_time']);
      unset($_SESSION['checkout.order_status']);
      unset($_SESSION['cart_products']);
      header('Location: ../');
    }
  }
?>
