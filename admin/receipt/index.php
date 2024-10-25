<?php
  session_start();
  include('../../utils/connections.php');
  if (!isset($_SESSION['user.credentials.username'])) {
    header('Location: ../');
  }
  if (!isset($_GET['id']) || !isset($_GET['order_number'])) {
    header('Location: ../dashboard/');
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Order Receipt</title>
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
    <style>
      th {
        border: 1px solid #06050a;
        text-align: center;
        font-family: "Fira Sans", sans-serif;
        font-weight: 500;
        font-style: normal;
      }
      td {
        border: 1px solid #06050a;
        text-align: center;
        font-family: "Fira Sans", sans-serif;
        font-weight: 400;
        font-style: normal;
      }
      .div-print-area {
        display: block;
        margin: auto;
        width: 400px;
        border: 1px solid var(--dark);
        padding: 15px;
      }

    </style>
  </head>
  <body>
    <?php
      $order_number = '';
      $order_date = '';
      $order_time = '';
      $order_prices = 0;
      $order_type = '';
      if (isset($_GET['id'])) {
        $order_id = intval($_GET['id']);
        $fetch_query = "SELECT * FROM `for_payment` WHERE id = ".$order_id." LIMIT 1";
        $result = $conn->query($fetch_query);
        if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $order_number = $row['order_number'];
          $order_date = $row['order_date'];
          $order_time = $row['order_time'];
          $order_type = $row['order_type'];
        }
      }
    ?>
    <div class="container">
      <div id="printable-area" class="div-print-area">
        <h3 class="h2-form-title fira-sans-bold" style="text-align: center;">JMOA's Cafe&trade;</h3>
        <p class="fira-sans-regular" style="text-align: center;">Order Receipt</p>
        <p class="fira-sans-regular" style="margin-bottom: 0px !important;">
          ORDER NUMBER:&nbsp;#<?php echo $order_number; ?>
        </p>
        <p class="fira-sans-regular" style="margin-bottom: 0px !important;">
          DATE & TIME: <?php echo $order_date.' '.$order_time; ?>
        </p>
        <p class="fira-sans-regular" style="margin-bottom: 0px !important;">
          Cashier Counter: <?php echo $_SESSION['first_name']; ?>
        </p>
        <table width="100%" style="margin-top: 15px;">
          <thead>
            <th>Item</th>
            <th>Size</th>
            <th>Qty</th>
            <th>Price</th>
          <thead>
          <tbody>
            <?php
              if (isset($_GET['id'])) {
                $order_id = intval($_GET['id']);
                $fetch_query = "SELECT * FROM `for_payment` WHERE id = ".$order_id." LIMIT 1";
                $result = $conn->query($fetch_query);
                if ($result->num_rows > 0) {
                  $row = $result->fetch_assoc();
                  $order_products = $row['order_products'];

                  $d_order = json_decode($order_products, true);
                  foreach ($d_order as $order) {
                    $item = $order['item'];
                    $price = intval($order['price']);
                    $quantity = intval($order['quantity']);
                    $size = $order['size'];
                    $order_prices += ($price * $quantity);
                    echo '
                      <tr>
                        <td>'.$item.'</td>
                        <td>'.$size.'</td>
                        <td>'.$quantity.'</td>
                        <td>₱'.number_format($price, 2).'</td>
                      </tr>
                    ';
                  }
                }
              }
            ?>
          </tbody>
        </table>
        <div style="margin-top: 15px;"><div>
        <p class="fira-sans-regular" style="margin-bottom: 0px !important; text-align: right;">
          Sub-Total: ₱<?php echo number_format($order_prices, 2); ?>
        </p>
        <p class="fira-sans-regular" style="margin-bottom: 0px !important; text-align: right;">
          VAT: ₱<?php echo number_format(0, 2); ?>
        </p>
        <p class="fira-sans-regular" style="margin-bottom: 0px !important; text-align: right;">
          Total: ₱<?php echo number_format($order_prices, 2); ?>
        </p>
        <div style="margin-top: 25px;"><div>
        <p class="fira-sans-regular size-10" style="margin-bottom: 0px !important; text-align: center;">
          Thank you for your Purchase!!
        </p>
        <p class="fira-sans-regular size-10" style="margin-bottom: 0px !important; text-align: center;">
          We appreciate your support for your business and looking forward to serving you again.
        </p>
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
  <script>
    function printDiv(divId) {
      var printContents = document.getElementById(divId).innerHTML;
      var originalContents = document.body.innerHTML;
      document.body.innerHTML = printContents;
      window.print();
      document.body.innerHTML = originalContents;
    }
    window.onload = function() {
      printDiv('printable-area');
    }
  </script>
</html>
