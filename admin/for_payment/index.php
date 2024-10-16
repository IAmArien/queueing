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
        <i class="fa-solid fa-circle-user color-dark" style="font-size: 30pt; margin-top: -8px"></i>
        <div>
          <h4 class="color-dark fira-sans-medium h6-title-name">
            <?php
              echo $_SESSION['first_name']." ".$_SESSION['last_name'];
            ?>
          </h4>
          <p class="color-dark fira-sans-regular p-title-email">
            <?php
              echo $_SESSION['email'];
            ?>
          </p>
        </div>
      </div>
      <div class="div-siderbar-menu-links">
        <button
          id="btn-dashboard"
          class="btn btn-outline-success btn-sm
            fira-sans-medium 
            size-13 
            color-dark 
            btn-menu 
            btn-menu-selected"
          type="button">
          <i class="fa-solid fa-gauge-high"></i><span style="padding-left: 16px">&nbsp;Dashboard</span>
        </button>
        <button
          id="btn-for-payment"
          class="btn btn-success btn-sm
            fira-sans-medium 
            size-13 
            color-dark 
            btn-menu 
            btn-menu-selected
            active"
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
            &nbsp;For Payment
          </a>
        </div>
      </nav>
      <div class="container" style="padding-inline: 30px; margin-top: 20px;">
        <table id="data" class="table table-striped" style="width:100%">
          <thead>
            <tr>
              <th class="fira-sans-medium">Order Number</th>
              <th class="fira-sans-medium">Orders</th>
              <th class="fira-sans-medium">Order Type</th>
              <th class="fira-sans-medium">Date / Time</th>
              <th class="fira-sans-medium">Price</th>
              <th class="fira-sans-medium">Order Type</th>
              <th class="fira-sans-medium"></th>
            </tr>
          </thead>
          <tbody>
            <?php
              $fetch_query = "SELECT * FROM `for_payment`";
              $result = $conn->query($fetch_query);
              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  $id = $row['id'];
                  $order_number = $row['order_number'];
                  $order_date = $row['order_date'];
                  $order_time = $row['order_time'];
                  $order_status = $row['order_status'];
                  $order_products = $row['order_products'];
                  $order_type = $row['order_type'];
                  $span_class = 'badge-disabled';
                  $order_prices = 0;
                  $orders = '';
                  $approve_transaction_state = '';
                  $cancel_transaction_state = '';
                  $print_receipt_state = '';
                  if ($order_status == 'FOR PAYMENT') {
                    $span_class = 'badge-warning';
                    $print_receipt_state = 'disabled';
                  } else if ($order_status == 'PAID') {
                    $span_class = 'badge-enabled';
                    $approve_transaction_state = 'disabled';
                    $cancel_transaction_state = 'disabled';
                  } else if ($order_status == 'CANCELLED') {
                    $span_class = 'badge-disabled';
                    $approve_transaction_state = 'disabled';
                    $print_receipt_state = 'disabled';
                  }
                  $d_order = json_decode($order_products, true);
                  foreach ($d_order as $order) {
                    $item = $order['item'];
                    $price = intval($order['price']);
                    $quantity = intval($order['quantity']);
                    $size = $order['size'];
                    $order_prices += ($price * $quantity);
                    $orders .= '(<b>'.strval($quantity).'</b>) '.$item.' - '.$size.'<br/>';
                  }
                  echo '
                    <tr>
                      <td class="color-brown fira-sans-medium">No. '.$order_number.'</td>
                      <td class="color-dark fira-sans-regular">
                        '.$orders.'
                      </td>
                      <td class="fira-sans-regular">
                        <span class="'.$span_class.'">'.$order_status.'</span>
                      </td>
                       <td class="color-dark fira-sans-regular size-13">
                        '.$order_date.'<br/>'.$order_time.'
                      </td>
                      <td class="color-dark fira-sans-medium size-13">
                        ₱'.$order_prices.'
                      </td>
                      <td class="color-dark fira-sans-medium size-13">
                        '.$order_type.'
                      </td>
                      <td>
                        <div class="dropdown">
                          <button class="btn btn-outline-success dropdown-toggle size-10" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            ACTIONS
                          </button>
                          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item '.$approve_transaction_state.'" href="../../actions/prepare.php?order_id='.$id.'">Approve Transaction</a></li>
                            <li><a class="dropdown-item '.$cancel_transaction_state.'" href="#">Cancel Transaction</a></li>
                            <li><a class="dropdown-item" href="#">View Details</a></li>
                            <li><a class="dropdown-item '.$print_receipt_state.'" href="#">Print Receipt</a></li>
                          </ul>
                        </div>
                      </td>
                    </tr>
                  ';
                }
              }
            ?>
          </tbody>
        </table>
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
        'bLengthChange': true,
        'searching': true,
        'order': [[3, 'desc']]
      });
      $('#btn-dashboard').click(() => {
        window.location.href = "../dashboard";
      });
      $('#btn-logout').click(() => {
        window.location.href = "../../actions/logout.php";
      })
    });
  </script>
</html>
