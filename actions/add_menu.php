<?php
  session_start();
  include('../utils/connections.php');
  if (isset($_POST['menu_name'])) {
    $menu_name = $_POST['menu_name'];
    $insert_query = "INSERT INTO `menu` (`menu_name`) VALUES (?)";
    $stmt = $conn->prepare($insert_query);
    $stmt->bind_param('s', $menu_name);
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
