<?php
  session_start();
  include('../utils/connections.php');
  unset($_SESSION['user.credentials.username']);
  unset($_SESSION['first_name']);
  unset($_SESSION['last_name']);
  unset($_SESSION['email']);
  unset($_SESSION['user_id']);
  header('Location: ../admin/');
?>
