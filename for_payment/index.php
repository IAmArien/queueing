<?php
  session_start();
  include('../utils/connections.php');
  if (isset($_SESSION['checkout.for_queueing'])) {
    header('Location: ../queue/');
  } else if (!isset($_SESSION['checkout.order_number'])) {
    header('Location: ../');
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>JMoa's Cafe (Queue)&trade;</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    >
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/global.css" />
    <link rel="stylesheet" href="./css/for_payment.css" />
  </head>
  <body>
    <div class="container">
      <div class="div-queue-wrapper">
        <form action="../actions/requeue.php" method="POST">
          <div class="div-queue-container">
            <h4 class="fira-sans-medium color-brown" style="margin-top: 15px;">
              [FOR PAYMENT]
            </h4>
            <hr style="width: 100%;" />
            <p
              class="fira-sans-regular color-dark"
              style="text-align: center; margin-top: -10px; margin-bottom: -10px !important;">
              <?php
                if (isset($_SESSION['checkout.order_date'])) {
                  echo $_SESSION['checkout.order_date'];
                }
                echo ' ';
                if (isset($_SESSION['checkout.order_time'])) {
                  echo $_SESSION['checkout.order_time'];
                }
                echo ' - ';
                if (isset($_SESSION['checkout.order_number'])) {
                  echo '<b class="color-brown">'.$_SESSION['checkout.order_number'].'</b>';
                }
              ?>
            </p>
            <hr style="width: 100%" />
            <p class="fira-sans-regular color-dark" style="text-align: left;">
              Kindly present this stub at the counter when it's your turn for payment.
            </p>
            <h1 class="fira-sans-bold color-brown" style="text-align: center;">
              Serving No. #<?php if (isset($_SESSION['checkout.order_id'])) echo $_SESSION['checkout.order_id']; ?>
            </h1>
            <hr style="width: 100%" />
            <h6 class="fira-sans-medium color-brown" style="margin-top: 15px; align-self: flex-start;">
              [SUMMARY] - <?php if (isset($_SESSION['checkout.order_type'])) echo $_SESSION['checkout.order_type']; ?>
            </h6>
            <p class="fira-sans-regular color-dark p-queue-orders" style="margin-top: 1px !important;">
              <?php
                if (isset($_SESSION['checkout.order_products'])) {
                  $queue_orders = $_SESSION['checkout.order_products'];
                  $converted_orders = json_decode($queue_orders, true);
                  foreach ($converted_orders as $order) {
                    $item = $order['item'];
                    $quantity = strval($order['quantity']);
                    $size = $order['size'];
                    echo '<b class="color-brown">('.$quantity.')</b>&nbsp;'.$item.' - '.$size.'<br/>';
                  }
                }
              ?>
            </p>
            <br/>
            <p class="fira-sans-regular color-dark size-10" style="text-align: left;">
              "THIS DOCUMENT IS NOT VALID FOR CLAIM OF INPUT TAX"
            </p>
            <button
              type="submit"
              class="btn btn-md btn-outline-danger btn-reset-queue">
              <i class="fa-solid fa-circle-xmark"></i>&nbsp;&nbsp;CANCEL PAYMENT
            </button>
          </div>
        </form>
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
  <script type="text/javascript">
    $(document).ready(() => {
      setTimeout(() => {
        window.location.href = "./";
      }, 10000);
    });
  </script>
  <script type="text/javascript">
    <?php
      if (isset($_SESSION['checkout.order_number'])) {
        $order_number = $_SESSION['checkout.order_number'];
        $fetch_query = "SELECT * FROM `queue` WHERE queue_payment_no = '".$order_number."'";
        $result = $conn->query($fetch_query);
        if ($result->num_rows > 0) {
          $_SESSION['checkout.for_queueing'] = 'FR';
          echo '
            $(document).ready(() => {
              setTimeout(() => {
                window.location.href = "../queue/";
              }, 1000);
            });
          ';
        }
      }
    ?>
  </script>
</html>
