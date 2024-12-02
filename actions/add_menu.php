<?php
  session_start();
  include('../utils/connections.php');
  if (isset($_POST['menu_name']) && isset($_POST['menu_description'])) {
    $menu_name = $_POST['menu_name'];
    $menu_description = $_POST['menu_description'];
    $insert_query = "INSERT INTO `menu` (`menu_name`, `menu_description`) VALUES (?, ?)";
    $stmt = $conn->prepare($insert_query);
    $stmt->bind_param('ss', $menu_name, $menu_description);
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
