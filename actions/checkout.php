<?php
  session_start();
  include('../utils/connections.php');
  if (isset($_POST['queue_orders']) && isset($_POST['queue_orders_type'])) {
    $queue_orders_type = $_POST['queue_orders_type'];
    $queue_orders = $_POST['queue_orders'];
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
        header('Location: ../for_payment');
      } else {
        unset($_SESSION['checkout.order_id']);
        unset($_SESSION['checkout.order_number']);
        unset($_SESSION['checkout.order_products']);
        unset($_SESSION['checkout.order_type']);
        unset($_SESSION['checkout.order_date']);
        unset($_SESSION['checkout.order_time']);
        unset($_SESSION['checkout.order_status']);
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
      header('Location: ../');
    }
  }
?>
