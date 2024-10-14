<?php
  session_start();
  include('../utils/connections.php');
  if (isset($_POST['queue_orders']) && isset($_POST['queue_orders_type'])) {
    $queue_orders_type = $_POST['queue_orders_type'];
    $queue_orders = $_POST['queue_orders'];
    $fetch_query = "SELECT queue_number FROM `queue` ORDER BY id DESC LIMIT 1";
    $result = $conn->query($fetch_query);
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $current_queue = intval($row['queue_number']) + 1;
      $insert_query = "INSERT INTO `queue` (
        queue_number,
        queue_date_time,
        queue_serving,
        queue_status
      ) VALUES (?, ?, ?, ?)";
      $stmt = $conn->prepare($insert_query);
      $queue_number = strval($current_queue);
      $date_time = date("Y/m/d").' '.date("h:i:sa");
      $queue_serving = 'in-queue';
      $queue_status = 'active';
      $stmt->bind_param('ssss', $queue_number, $date_time, $queue_serving, $queue_status);
      $result = $stmt->execute();
      if ($result == 1) {
        $fetch_query = "SELECT id FROM `queue` ORDER BY id DESC LIMIT 1";
        $result = $conn->query($fetch_query);
        if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $queue_id = $row['id'];
          $insert_query = "INSERT INTO `queue_orders` (
              queue_number_id,
              queue_order,
              queue_order_type
            ) VALUES (?, ?, ?)";
          $stmt = $conn->prepare($insert_query);
          $stmt->bind_param('sss', $queue_id, $queue_orders, $queue_orders_type);
          $result = $stmt->execute();
          $_SESSION['queue.id'] = $queue_id;
          $_SESSION['queue.number'] = $queue_number;
          $_SESSION['queue.orders'] = $queue_orders;
          header('Location: ../queue');
        }
      }
    } else {
      $insert_query = "INSERT INTO `queue` (
          queue_number,
          queue_date_time,
          queue_serving,
          queue_status
        ) VALUES (?, ?, ?, ?)";
      $stmt = $conn->prepare($insert_query);
      $queue_number = '1';
      $date_time = date("Y/m/d").' '.date("h:i:sa");
      $queue_serving = 'in-queue';
      $queue_status = 'active';
      $stmt->bind_param('ssss', $queue_number, $date_time, $queue_serving, $queue_status);
      $result = $stmt->execute();
      if ($result == 1) {
        $fetch_query = "SELECT id FROM `queue` ORDER BY id DESC LIMIT 1";
        $result = $conn->query($fetch_query);
        if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $queue_id = $row['id'];
          $insert_query = "INSERT INTO `queue_orders` (
              queue_number_id,
              queue_order,
              queue_order_type
            ) VALUES (?, ?, ?)";
          $stmt = $conn->prepare($insert_query);
          $stmt->bind_param('sss', $queue_id, $queue_orders, $queue_orders_type);
          $result = $stmt->execute();
          $_SESSION['queue.id'] = $queue_id;
          $_SESSION['queue.number'] = $queue_number;
          $_SESSION['queue.orders'] = $queue_orders;
          header('Location: ../queue');
        }
      }
    }
  }
?>