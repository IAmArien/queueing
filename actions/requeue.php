<?php
  session_start();
  include('../utils/connections.php');
  if (isset($_SESSION['queue.id'])) {
    $queue_id = $_SESSION['queue.id'];
    $update_query = "UPDATE `queue` SET queue_status = ? WHERE id = ".$queue_id."";
    $queue_status = 'inactive';
    $stmt = $conn->prepare($update_query);
    $stmt->bind_param('s', $queue_status);
    $result = $stmt->execute();
  }
  unset($_SESSION['queue.id']);
  unset($_SESSION['queue.number']);
  unset($_SESSION['queue.orders']);
  header('Location: ../');
?>
