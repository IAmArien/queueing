<?php
  session_start();
  include('../utils/connections.php');

  unset($_SESSION['cart_products']);

  header('Location: ../');
?>
