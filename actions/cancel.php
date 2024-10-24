<?php
  session_start();
  include('../utils/connections.php');
  if (isset($_GET['order_id'])) {
    $order_id = intval($_GET['order_id']);
    $update_query = "UPDATE `for_payment` SET order_status = ? WHERE id = ?";
    $stmt = $conn->prepare($update_query);
    $order_status = 'CANCELLED';
    $stmt->bind_param('ss', $order_status, $order_id);
    $result = $stmt->execute();
    header('Location: ../admin/for_payment/');
  }
?>
