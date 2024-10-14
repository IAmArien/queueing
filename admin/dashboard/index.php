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
          class="btn btn-success btn-sm
            fira-sans-medium 
            size-13 
            color-dark 
            btn-menu 
            btn-menu-selected 
            active"
          type="button">
          <i class="fa-solid fa-gauge-high"></i><span style="padding-left: 16px">Dashboard</span>
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
      <div class="container" style="padding-inline: 30px; margin-top: 20px;">
        <table id="data" class="table table-striped" style="width:100%">
          <thead>
            <tr>
              <th class="fira-sans-medium">Queue</th>
              <th class="fira-sans-medium">Orders</th>
              <th class="fira-sans-medium">Status</th>
              <th class="fira-sans-medium">Price</th>
              <th class="fira-sans-medium">Service</th>
              <th class="fira-sans-medium">Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $fetch_query = "SELECT 
                QU.id,
                QU.queue_number,
                QU.queue_serving,
                QU.queue_date_time,
                QU.queue_status,
                QO.queue_order,
                QO.queue_order_type  
                FROM `queue` AS QU 
                INNER JOIN `queue_orders` AS QO 
                ON QU.id = QO.queue_number_id";
              $result = $conn->query($fetch_query);
              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  $id = $row['id'];
                  $queue_number = $row['queue_number'];
                  $queue_date_time = $row['queue_date_time'];
                  $queue_status = $row['queue_status'];
                  $queue_order = $row['queue_order'];
                  $queue_serving = $row['queue_serving'];
                  $queue_order_type = $row['queue_order_type'];
                  $span_class = 'badge-disabled';
                  $order_prices = 0;
                  $orders = '';
                  $button_status = '';
                  if ($queue_status == 'active') {
                    $span_class = 'badge-enabled';
                  } else {
                    $button_status = 'disabled="disabled"';
                  }
                  if ($queue_serving == 'served') {
                    $button_status = 'disabled="disabled"';
                  }
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
                      <td class="color-brown fira-sans-medium">No. '.$queue_number.'</td>
                      <td class="color-dark fira-sans-regular">
                        '.$orders.'
                      </td>
                      <td class="fira-sans-regular">
                        <span class="'.$span_class.'">'.$queue_status.'</span>
                      </td>
                      <td class="color-dark fira-sans-medium size-13">
                        ₱'.$order_prices.'
                      </td>
                      <td class="color-dark fira-sans-medium size-13">
                        '.$queue_order_type.'
                      </td>
                      <td>
                        <form action="../../actions/serve.php" method="POST">
                          <input type="hidden" name="queue_id" value="'.$id.'" />
                          <input type="hidden" name="queue_serving" value="'.$queue_serving.'" />
                          <button
                            '.$button_status.'
                            type="submit"
                            class="btn btn-sm btn-outline-success btn-action-menu fira-sans-regular">
                            <i class="fa-solid fa-check-to-slot"></i>&nbsp;&nbsp;'.$queue_serving.'
                          </button>
                        </form>
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
        'bLengthChange': false,
        'searching': false
      });
      $('#btn-logout').click(() => {
        window.location.href = "../../actions/logout.php";
      })
    });
  </script>
</html>
