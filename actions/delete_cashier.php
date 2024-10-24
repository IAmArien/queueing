<?php
  session_start();
  include('../utils/connections.php');
  if ($_GET['user_id']) {
    $user_id = intval($_GET['user_id']);
    $delete_uc_query = "DELETE FROM user_credentials WHERE id = ".$user_id."";
    $delete_ui_query = "DELETE FROM user_info WHERE user_id = ".$user_id."";
    $conn->query($delete_uc_query);
    $conn->query($delete_ui_query);
    header('Location: ../admin/cashier/');
  }
?>
