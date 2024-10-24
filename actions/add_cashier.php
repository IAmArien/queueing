<?php
  session_start();
  include('../utils/connections.php');
  if (
    isset($_POST['first_name']) &&
    isset($_POST['last_name']) &&
    isset($_POST['email']) &&
    isset($_POST['contact_number']) &&
    isset($_POST['cashier_password']) &&
    isset($_POST['cashier_confirm_password'])
  ) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $contact_number = $_POST['contact_number'];
    $cashier_password = md5($_POST['cashier_password']);
    $cashier_confirm_password = md5($_POST['cashier_confirm_password']);

    $user_type = 'cashier';

    $insert_query = "INSERT INTO `user_credentials` (
      `email`,
      `password`,
      `type`
    ) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($insert_query);
    $stmt->bind_param(
      'sss',
      $email,
      $cashier_confirm_password,
      $user_type
    );
    $result = $stmt->execute();
    if ($result == 1) {
      $fetch_query = "SELECT id FROM user_credentials WHERE email = '".$email."' LIMIT 1";
      $result = $conn->query($fetch_query);
      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $user_id = intval($row['id']);
        $insert_query = "INSERT INTO `user_info` (
          `user_id`,
          `first_name`,
          `last_name`,
          `email`,
          `contact_number`
        ) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($insert_query);
        $stmt->bind_param(
          'sssss',
          $user_id,
          $first_name,
          $last_name,
          $email,
          $contact_number
        );
        $result = $stmt->execute();
      }
      header('Location: ../admin/cashier/');
    } else {
      header('Location: ../admin/cashier/');
    }
  } else {
    header('Location: ../admin/cashier/');
  }
?>
