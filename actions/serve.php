<?php
  session_start();
  include('../utils/connections.php');
  if (isset($_POST['queue_id']) && isset($_POST['queue_serving'])) {
    $queue_serving = $_POST['queue_serving'];
    $queue_id = $_POST['queue_id'];
    $update_query = "UPDATE `queue` SET queue_serving = ? WHERE id = ".$queue_id."";
    $queue_status = 'served';
    if ($queue_serving == 'in-queue') {
      $queue_status = 'serving';
    }
    $stmt = $conn->prepare($update_query);
    $stmt->bind_param('s', $queue_status);
    $result = $stmt->execute();
    header('Location: ../admin/dashboard/');
  } else {
    header('Location: ../admin/dashboard/');
  }
?>
