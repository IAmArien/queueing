<?php
  session_start();
  include('../utils/connections.php');
  if (isset($_GET['queue_id'])) {
    $queue_id = intval($_GET['queue_id']);
    $update_query = "UPDATE `queue` SET queue_serving = ?, queue_status = ? WHERE id = ?";
    $stmt = $conn->prepare($update_query);
    $queue_serving = 'SERVED';
    $queue_status = 'INACTIVE';
    $stmt->bind_param('sss', $queue_serving, $queue_status, $queue_id);
    $result = $stmt->execute();
    header('Location: ../admin/orders/');
  }
?>
