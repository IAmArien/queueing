<?php
  session_start();
  include('../../utils/connections.php');
  if (!isset($_SESSION['user.credentials.username'])) {
    header('Location: ../');
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>JMoa's Cafe&trade; (Admin)</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    >
    <link href="https://cdn.datatables.net/2.0.5/css/dataTables.bootstrap5.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/global.css" />
    <link rel="stylesheet" href="./css/index.css" />
  </head>
  <body>
    <div class="div-classic-side-bar">
      <div class="div-sidebar-logo">
        <i class="fa-solid fa-circle-user color-white" style="font-size: 30pt; margin-top: -8px"></i>
        <div>
          <h4 class="color-white fira-sans-medium h6-title-name">
            <?php
              echo $_SESSION['first_name']." ".$_SESSION['last_name'];
            ?>
          </h4>
          <p class="color-white fira-sans-regular p-title-email">
            <?php
              echo $_SESSION['email'];
            ?>
          </p>
        </div>
      </div>
      <div class="div-siderbar-menu-links">
        <button
          id="btn-dashboard"
          class="btn btn-success btn-sm
            fira-sans-medium 
            size-13 
            color-dark 
            btn-menu 
            btn-menu-selected 
            active"
          type="button">
          <i class="fa-solid fa-gauge-high"></i><span style="padding-left: 16px">&nbsp;Dashboard</span>
        </button>
        <button
          id="btn-for-payment"
          class="btn btn-outline-success btn-sm
            fira-sans-medium 
            size-13 
            color-dark 
            btn-menu 
            btn-menu-selected"
          type="button">
          <i class="fa-solid fa-credit-card"></i><span style="padding-left: 16px">For Payment</span>
        </button>
        <button
          id="btn-orders"
          class="btn btn-outline-success btn-sm
            fira-sans-medium 
            size-13 
            color-dark 
            btn-menu 
            btn-menu-selected"
          type="button">
          <i class="fa-solid fa-tags"></i><span style="padding-left: 16px">&nbsp;Orders</span>
        </button>
        <button
          id="btn-cashier"
          class="btn btn-outline-success btn-sm
            fira-sans-medium 
            size-13 
            color-dark 
            btn-menu 
            btn-menu-selected"
          type="button">
          <i class="fa-solid fa-users"></i><span style="padding-left: 16px">Cashier Management</span>
        </button>
        <button
          id="btn-logout"
          class="btn btn-outline-success btn-sm
            fira-sans-medium 
            size-13 
            color-dark 
            btn-menu 
            btn-menu-selected"
          type="button">
          <i class="fa-solid fa-arrow-right-from-bracket"></i><span style="padding-left: 16px">Logout</span>
        </button>
      </div>
    </div>
    <div class="div-classic-container">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand fira-sans-regular color-dark a-navbar-path" href="#" style="cursor: default;">
            &nbsp;&nbsp;&nbsp;<i id="navbar-control" class="fa-solid fa-bars" style="cursor: pointer"></i>
            &nbsp;&nbsp;&nbsp;&nbsp;<b>Admin</b>&nbsp;
            <i class="fa-solid fa-chevron-right"></i>
            &nbsp;Dashboard
          </a>
        </div>
      </nav>
      <div class="container" style="padding-inline: 30px; margin-top: 10px;">
        <div class="row">
          <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="div-card">
              <div class="div-card-icon" style="background-color: #146c43;">
                <i class="fa-solid fa-credit-card"></i>
              </div>
              <div class="div-card-content">
                <h3 class="fira-sans-medium size-16" style="margin-bottom: 0px !important;">
                  <?php
                    $fetch_query = "SELECT count(*) FROM `for_payment` WHERE order_status = 'FOR PAYMENT'";
                    $result = $conn->query($fetch_query);
                    if ($result->num_rows > 0) {
                      $row = $result->fetch_assoc();
                      echo $row['count(*)'];
                    } else {
                      echo '0';
                    }
                  ?>
                </h3>
                <p class="fira-sans-regular size-10" style="margin-bottom: 0px !important;">
                  Total No. of <b>For Payment</b> transactions
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="div-card">
              <div class="div-card-icon" style="background-color: #007bff;">
                <i class="fa-solid fa-credit-card"></i>
              </div>
              <div class="div-card-content">
                <h3 class="fira-sans-medium size-16" style="margin-bottom: 0px !important;">
                  <?php
                    $fetch_query = "SELECT count(*) FROM `for_payment` WHERE order_status = 'PAID'";
                    $result = $conn->query($fetch_query);
                    if ($result->num_rows > 0) {
                      $row = $result->fetch_assoc();
                      echo $row['count(*)'];
                    } else {
                      echo '0';
                    }
                  ?>
                </h3>
                <p class="fira-sans-regular size-10" style="margin-bottom: 0px !important;">
                  Total No. of <b>PAID</b> transactions
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="div-card">
              <div class="div-card-icon" style="background-color: #dc3545;">
                <i class="fa-solid fa-credit-card"></i>
              </div>
              <div class="div-card-content">
                <h3 class="fira-sans-medium size-16" style="margin-bottom: 0px !important;">
                  <?php
                    $fetch_query = "SELECT count(*) FROM `for_payment` WHERE order_status = 'CANCELLED'";
                    $result = $conn->query($fetch_query);
                    if ($result->num_rows > 0) {
                      $row = $result->fetch_assoc();
                      echo $row['count(*)'];
                    } else {
                      echo '0';
                    }
                  ?>
                </h3>
                <p class="fira-sans-regular size-10" style="margin-bottom: 0px !important;">
                  Total No. of <b>CANCELLED</b> transactions
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="div-card">
              <div class="div-card-icon" style="background-color: #6c757d;">
                <i class="fa-solid fa-tags"></i>
              </div>
              <div class="div-card-content">
                <h3 class="fira-sans-medium size-16" style="margin-bottom: 0px !important;">
                  <?php
                    $fetch_query = "SELECT count(*) FROM `queue` WHERE queue_serving = 'PREPARING'";
                    $result = $conn->query($fetch_query);
                    if ($result->num_rows > 0) {
                      $row = $result->fetch_assoc();
                      echo $row['count(*)'];
                    } else {
                      echo '0';
                    }
                  ?>
                </h3>
                <p class="fira-sans-regular size-10" style="margin-bottom: 0px !important;">
                  Total No. of <b>PREPARING</b> orders
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="div-card">
              <div class="div-card-icon" style="background-color: #ffc107;">
                <i class="fa-solid fa-tags"></i>
              </div>
              <div class="div-card-content">
                <h3 class="fira-sans-medium size-16" style="margin-bottom: 0px !important;">
                  <?php
                    $fetch_query = "SELECT count(*) FROM `queue` WHERE queue_serving = 'SERVING'";
                    $result = $conn->query($fetch_query);
                    if ($result->num_rows > 0) {
                      $row = $result->fetch_assoc();
                      echo $row['count(*)'];
                    } else {
                      echo '0';
                    }
                  ?>
                </h3>
                <p class="fira-sans-regular size-10" style="margin-bottom: 0px !important;">
                  Total No. of <b>SERVING</b> orders
                </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="div-card">
              <div class="div-card-icon" style="background-color: #17a2b8;">
                <i class="fa-solid fa-tags"></i>
              </div>
              <div class="div-card-content">
                <h3 class="fira-sans-medium size-16" style="margin-bottom: 0px !important;">
                  <?php
                    $fetch_query = "SELECT count(*) FROM `queue` WHERE queue_serving = 'SERVED'";
                    $result = $conn->query($fetch_query);
                    if ($result->num_rows > 0) {
                      $row = $result->fetch_assoc();
                      echo $row['count(*)'];
                    } else {
                      echo '0';
                    }
                  ?>
                </h3>
                <p class="fira-sans-regular size-10" style="margin-bottom: 0px !important;">
                  Total No. of <b>SERVED</b> orders
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://kit.fontawesome.com/b2e03e5a6f.js" crossorigin="anonymous"></script>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous">
  </script>
  <script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
  <script src="https://cdn.datatables.net/2.0.5/js/dataTables.bootstrap5.js"></script>
  <script type="text/javascript">
    $(document).ready(() => {
      $('#data').dataTable({
        'bLengthChange': false,
        'searching': false
      });
      $('#btn-for-payment').click(() => {
        window.location.href = "../for_payment";
      });
      $('#btn-orders').click(() => {
        window.location.href = "../orders";
      });
      $('#btn-cashier').click(() => {
        window.location.href = "../cashier";
      });
      $('#btn-logout').click(() => {
        window.location.href = "../../actions/logout.php";
      })
    });
  </script>
</html>
