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
    <title>JMoa's Cafe&trade; (<?php if (isset($_SESSION['session.user_type'])) echo $_SESSION['session.user_type']; else echo 'Admin'; ?>)</title>
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
          class="btn btn-success btn-sm
            fira-sans-medium 
            size-13 
            color-dark 
            btn-menu 
            btn-menu-selected
            active"
          type="button">
          <i class="fa-solid fa-tags"></i><span style="padding-left: 16px">&nbsp;Orders</span>
        </button>
        <?php
          if (isset($_SESSION['session.user_type'])) {
            if ($_SESSION['session.user_type'] == 'ADMIN') {
              echo '
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
              ';
            }
          }
        ?>
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
            &nbsp;&nbsp;&nbsp;&nbsp;<b><?php if (isset($_SESSION['session.user_type'])) echo $_SESSION['session.user_type']; else 'Admin'; ?></b>&nbsp;
            <i class="fa-solid fa-chevron-right"></i>
            &nbsp;Orders Management
          </a>
        </div>
      </nav>
      <div class="container" style="padding-inline: 30px; margin-top: 20px;">
        <table id="data" class="table table-striped" style="width:100%">
          <thead>
            <tr>
              <th class="fira-sans-medium">Payment No</th>
              <th class="fira-sans-medium">Queue</th>
              <th class="fira-sans-medium">Orders</th>
              <th class="fira-sans-medium">Order Type</th>
              <th class="fira-sans-medium">Activity</th>
              <th class="fira-sans-medium">Date / Time</th>
              <th class="fira-sans-medium">Status</th>
              <th class="fira-sans-medium"></th>
            </tr>
          </thead>
          <tbody>
            <?php
              $fetch_query = "SELECT * FROM `queue` ORDER BY id DESC";
              $result = $conn->query($fetch_query);
              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  $queue_id = $row['id'];
                  $queue_payment_no = $row['queue_payment_no'];
                  $queue_number = $row['queue_number'];
                  $queue_serving = $row['queue_serving'];
                  $queue_date = $row['queue_date'];
                  $queue_time = $row['queue_time'];
                  $queue_status = $row['queue_status'];

                  $fetch_query = "SELECT * FROM `queue_orders` WHERE queue_number_id = ".$queue_id." LIMIT 1";
                  $orders_result = $conn->query($fetch_query);
                  if ($orders_result->num_rows > 0) {
                    $orders_row = $orders_result->fetch_assoc();
                    $order_id = $orders_row['id'];
                    $queue_order = $orders_row['queue_order'];
                    $queue_order_type = $orders_row['queue_order_type'];

                    $serving_span_class = 'badge-warning';
                    if ($queue_serving == 'PREPARING') {
                      $serving_span_class = 'badge-warning';
                    } else if ($queue_serving == 'SERVING') {
                      $serving_span_class = 'badge-primary';
                    } else if ($queue_serving == 'SERVED') {
                      $serving_span_class = 'badge-enabled';
                    }

                    $status_span_class = 'badge-disabled';
                    if ($queue_status == 'ACTIVE') {
                      $status_span_class = 'badge-enabled';
                    }

                    $serving_state = '';
                    if ($queue_serving == 'PREPARING') {
                      $serving_state = '';
                    } else if ($queue_serving == 'SERVING') {
                      $serving_state = 'disabled';
                    } else if ($queue_serving == 'SERVED') {
                      $serving_state = 'disabled';
                    }

                    $served_state = '';
                    if ($queue_serving == 'PREPARING') {
                      $served_state = 'disabled';
                    } else if ($queue_serving == 'SERVING') {
                      $served_state = '';
                    } else if ($queue_serving == 'SERVED') {
                      $served_state = 'disabled';
                    }

                    $orders = '';
                    $d_order = json_decode($queue_order, true);
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
                        <td class="color-brown fira-sans-medium">No. '.$queue_payment_no.'</td>
                        <td class="color-dark fira-sans-medium">
                          '.$queue_number.'
                        </td>
                        <td class="color-dark fira-sans-regular">
                          '.$orders.'
                        </td>
                        <td class="color-dark fira-sans-medium">
                          '.$queue_order_type.'
                        </td>
                        <td class="fira-sans-regular">
                          <span class="'.$serving_span_class.'">'.$queue_serving.'</span>
                        </td>
                        <td class="color-dark fira-sans-regular size-13">
                          '.$queue_date.'<br/>'.$queue_time.'
                        </td>
                        <td class="fira-sans-regular">
                          <span class="'.$status_span_class.'">'.$queue_status.'</span>
                        </td>
                        <td>
                          <div class="dropdown">
                            <button class="btn btn-outline-success dropdown-toggle size-10" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                              ACTIONS
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                              <li><a class="dropdown-item disabled" href="#">Change to Preparing</a></li>
                              <li><a class="dropdown-item '.$serving_state.'" href="../../actions/serving.php?queue_id='.$queue_id.'">Change To Serving</a></li>
                              <li><a class="dropdown-item '.$served_state.'" href="../../actions/serve.php?queue_id='.$queue_id.'">Change To Served</a></li>
                            </ul>
                          </div>
                        </td>
                      </tr>
                    ';
                  }
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
        'order': [[6, 'asc']]
      });
      $('#btn-dashboard').click(() => {
        window.location.href = "../dashboard";
      });
      $('#btn-for-payment').click(() => {
        window.location.href = "../for_payment";
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
