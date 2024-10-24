<?php
  session_start();
  include('../utils/connections.php');
  if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);
    $hashed_password = md5($password);
    $fetch_query = "SELECT 
      UC.id,
      UC.email,
      UC.password,
      UI.user_id,
      UI.first_name,
      UI.last_name
      FROM user_credentials AS UC 
      INNER JOIN user_info AS UI 
      ON UC.id = UI.user_id 
      WHERE UC.email = '".$username."' AND UC.password = '".$hashed_password."' AND type = 'cashier'";
    echo $fetch_query;
    $result = $conn->query($fetch_query);
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $first_name = $row['first_name'];
      $last_name = $row['last_name'];
      $email = $row['email'];
      $user_id = $row['user_id'];
      $_SESSION['session.user_type'] = 'CASHIER';
      $_SESSION['user.credentials.username'] = $username;
      $_SESSION['first_name'] = $first_name;
      $_SESSION['last_name'] = $last_name;
      $_SESSION['email'] = $email;
      $_SESSION['user_id'] = $user_id;
      unset($_SESSION['user.error.message']);
      header('Location: ../admin/dashboard/');
    } else {
      $_SESSION['user.error.message'] = 'Invalid username or password';
      header('Location: ../admin/');
    }
  } else {
    $_SESSION['user.error.message'] = 'Invalid username or password';
    header('Location: ../admin/');
  }
?>
