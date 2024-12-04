<?php
  session_start();
  include('../utils/connections.php');
  if (
    isset($_POST['menu_id']) &&
    isset($_POST['menu_name']) &&
    isset($_POST['menu_description'])
  ) {
    $menu_id = $_POST['menu_id'];
    $menu_name = $_POST['menu_name'];
    $menu_description = $_POST['menu_description'];
    $update_query = "UPDATE `menu` SET menu_name = ?, menu_description = ? WHERE id = ?";
    $stmt = $conn->prepare($update_query);
    $stmt->bind_param('sss', $menu_name, $menu_description, $menu_id);
    $result = $stmt->execute();
    if ($result == 1) {
      header('Location: ../admin/menu/');
    } else {
      header('Location: ../admin/menu/');
    }
  } else {
    header('Location: ../admin/menu/');
  }
?>
