<?php
  session_start();
  include('../utils/connections.php');
  unset($_SESSION['user.credentials.username']);
  unset($_SESSION['first_name']);
  unset($_SESSION['last_name']);
  unset($_SESSION['email']);
  unset($_SESSION['user_id']);
  if (isset($_SESSION['session.user_type'])) {
    if ($_SESSION['session.user_type'] == 'ADMIN') {
      unset($_SESSION['session.user_type']);
      header('Location: ../admin/');
    } else {
      unset($_SESSION['session.user_type']);
      header('Location: ../cashier/');
    }
  } else {
    unset($_SESSION['session.user_type']);
    header('Location: ../admin/');
  }
?>
