<?php
  session_start();
  include('../utils/connections.php');
  if (isset($_SESSION['checkout.order_id'])) {
    $order_id = $_SESSION['checkout.order_id'];
    $fetch_query = "SELECT * FROM `for_payment` WHERE id = ".$order_id." AND order_status = 'FOR PAYMENT'";
    $result = $conn->query($fetch_query);
    if ($result->num_rows == 0) {
      $update_query = "UPDATE `for_payment` SET order_status = ? WHERE id = ".$order_id."";
      $order_status = 'CANCELLED';
      $stmt = $conn->prepare($update_query);
      $stmt->bind_param('s', $order_status);
      $result = $stmt->execute();
    }
  }
  unset($_SESSION['checkout.order_id']);
  unset($_SESSION['checkout.order_number']);
  unset($_SESSION['checkout.order_products']);
  unset($_SESSION['checkout.order_type']);
  unset($_SESSION['checkout.order_date']);
  unset($_SESSION['checkout.order_time']);
  unset($_SESSION['checkout.order_status']);
  header('Location: ../');
?>
