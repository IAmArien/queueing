<?php
  session_start();
  include('../utils/connections.php');
  if (isset($_POST['menu_id'])) {
    $menu_id = intval($_POST['menu_id']);
    $delete_menu_query = "DELETE FROM menu WHERE id = ".$menu_id."";
    $delete_product_query = "DELETE FROM products WHERE menu_id = ".$menu_id."";
    $conn->query($delete_menu_query);
    $conn->query($delete_product_query);
    header('Location: ../admin/menu/');
  }
?>
