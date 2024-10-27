<?php
  session_start();
  include('../utils/connections.php');
  if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];
    $fetch_query = "SELECT * FROM `for_payment` WHERE id = ".$order_id." LIMIT 1";
    $result = $conn->query($fetch_query);
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $order_id = intval($row['id']);
      $order_products = $row['order_products'];
      $order_type = $row['order_type'];
      $order_number = $row['order_number'];

      $fetch_query = "SELECT * FROM `queue` ORDER BY id DESC LIMIT 1";
      $result = $conn->query($fetch_query);

      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $str_qn = strval($row['queue_number']);
        $replaced_qn = str_replace("0", "", $str_qn);;
        $current_queue = intval($replaced_qn) + 1;
        $insert_query = "INSERT INTO `queue` (
          queue_payment_no,
          queue_number,
          queue_serving,
          queue_date,
          queue_time,
          queue_status
        ) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($insert_query);
        $queue_number = '';
        if ($current_queue <= 9) {
          $queue_number = '0000'.strval($current_queue);
        } else if ($current_queue >= 10 && $current_queue <= 99) {
          $queue_number = '000'.strval($current_queue);
        } else if ($current_queue >= 100 && $current_queue <= 999) {
          $queue_number = '00'.strval($current_queue);
        } else if ($current_queue >= 1000 && $current_queue <= 9999) {
          $queue_number = '0'.strval($current_queue);
        } else if ($current_queue >= 10000 && $current_queue <= 99999) {
          $queue_number = strval($current_queue);
        } else {
          $queue_number = strval($current_queue);
        }
        $queue_date = date("Y/m/d");
        $queue_time = date("h:i:sa");
        $queue_serving = 'PREPARING';
        $queue_status = 'ACTIVE';
        $stmt->bind_param(
          'ssssss',
          $order_number,
          $queue_number,
          $queue_serving,
          $queue_date,
          $queue_time,
          $queue_status
        );
        $result = $stmt->execute();
        if ($result == 1) {
          $fetch_query = "SELECT id FROM `queue` ORDER BY id DESC LIMIT 1";
          $result = $conn->query($fetch_query);
          if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $queue_id = $row['id'];
            $queue_orders = $order_products;
            $queue_orders_type = $order_type;
            $queue_date = date("Y/m/d");
            $queue_time = date("h:i:sa");
            $insert_query = "INSERT INTO `queue_orders` (
                queue_number_id,
                queue_order,
                queue_order_type,
                queue_date,
                queue_time
              ) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($insert_query);
            $stmt->bind_param(
              'sssss',
              $queue_id,
              $queue_orders,
              $queue_orders_type,
              $queue_date,
              $queue_time
            );
            $result = $stmt->execute();

            $update_query = "UPDATE `for_payment` SET order_status = ? WHERE id = ?";
            $order_status = 'PAID';
            $stmt = $conn->prepare($update_query);
            $stmt->bind_param(
              'ss',
              $order_status,
              $order_id
            );
            $result = $stmt->execute();

            header('Location: ../admin/for_payment/');
          }
        }
      } else {
        $insert_query = "INSERT INTO `queue` (
          queue_payment_no,
          queue_number,
          queue_serving,
          queue_date,
          queue_time,
          queue_status
        ) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($insert_query);
        $queue_number = '00001';
        $date_time = date("Y/m/d").' '.date("h:i:sa");
        $queue_serving = 'PREPARING';
        $queue_status = 'ACTIVE';
        $queue_date = date("Y/m/d");
        $queue_time = date("h:i:sa");
        $stmt->bind_param(
          'ssssss',
          $order_number,
          $queue_number,
          $queue_serving,
          $queue_date,
          $queue_time,
          $queue_status
        );
        $result = $stmt->execute();
        if ($result == 1) {
          $fetch_query = "SELECT id FROM `queue` ORDER BY id DESC LIMIT 1";
          $result = $conn->query($fetch_query);
          if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $queue_id = $row['id'];
            $queue_orders = $order_products;
            $queue_orders_type = $order_type;
            $queue_date = date("Y/m/d");
            $queue_time = date("h:i:sa");
            $insert_query = "INSERT INTO `queue_orders` (
                queue_number_id,
                queue_order,
                queue_order_type,
                queue_date,
                queue_time
              ) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($insert_query);
            $stmt->bind_param(
              'sssss',
              $queue_id,
              $queue_orders,
              $queue_orders_type,
              $queue_date,
              $queue_time
            );
            $result = $stmt->execute();

            $update_query = "UPDATE `for_payment` SET order_status = ? WHERE id = ?";
            $order_status = 'PAID';
            $stmt = $conn->prepare($update_query);
            $stmt->bind_param(
              'ss',
              $order_status,
              $order_id
            );
            $result = $stmt->execute();

            header('Location: ../admin/for_payment/');
          }
        }
      }
    } else {
      header('Location: ../admin/for_payment/');
    }
  }
?>
