<?php
  session_start();
  include('../utils/connections.php');
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
    <link rel="stylesheet" href="./css/queue.css" />
  </head>
  <body>
    <div class="container">
      <div class="div-queue-wrapper">
        <form action="../actions/requeue.php" method="POST">
          <div class="div-queue-container">
            <?php
              $queue_number = 0;
              $queue_serving = '';
              $fetch_query = "SELECT * FROM `queue` WHERE queue_serving = 'serving' OR queue_serving = 'served' ORDER BY id DESC LIMIT 1";
              $result = $conn->query($fetch_query);
              if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $queue_number = $row['queue_number'];
                $queue_serving = $row['queue_serving'];
              }
            ?>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              xmlns:xlink="http://www.w3.org/1999/xlink"
              width="150"
              zoomAndPan="magnify" 
              viewBox="0 0 375 374.999991" 
              height="150" 
              preserveAspectRatio="xMidYMid meet" 
              version="1.0">
              <defs>
                <clipPath id="af257ecba8">
                  <path d="M 37.5 37.5 L 337.5 37.5 L 337.5 337.5 L 37.5 337.5 Z M 37.5 37.5 " clip-rule="nonzero"/>
                </clipPath>
              </defs>
              <rect x="-37.5" width="450" fill="#ffffff" y="-37.499999" height="449.999989" fill-opacity="1"/>
              <rect x="-37.5" width="450" fill="#ffffff" y="-37.499999" height="449.999989" fill-opacity="1"/>
              <g clip-path="url(#af257ecba8)">
                <path fill="#594837" d="M 54.808594 37.5 C 45.273438 37.5 37.5 45.273438 37.5 54.808594 L 37.5 320.191406 C 37.5 329.726562 45.273438 337.5 54.808594 337.5 L 320.191406 337.5 C 329.726562 337.5 337.5 329.726562 337.5 320.191406 L 337.5 54.808594 C 337.5 45.273438 329.726562 37.5 320.191406 37.5 Z M 54.808594 49.039062 L 320.191406 49.039062 C 323.371094 49.039062 325.960938 51.628906 325.960938 54.808594 L 325.960938 320.191406 C 325.960938 323.371094 323.371094 325.960938 320.191406 325.960938 L 54.808594 325.960938 C 51.628906 325.960938 49.039062 323.371094 49.039062 320.191406 L 49.039062 54.808594 C 49.039062 51.628906 51.628906 49.039062 54.808594 49.039062 Z M 83.652344 72.117188 C 77.296875 72.117188 72.117188 77.296875 72.117188 83.652344 L 72.117188 129.808594 C 72.117188 136.164062 77.296875 141.347656 83.652344 141.347656 L 129.808594 141.347656 C 136.164062 141.347656 141.347656 136.164062 141.347656 129.808594 L 141.347656 83.652344 C 141.347656 77.296875 136.164062 72.117188 129.808594 72.117188 Z M 158.652344 72.117188 C 155.453125 72.117188 152.882812 74.707031 152.882812 77.882812 L 152.882812 100.960938 C 152.882812 104.140625 155.453125 106.730469 158.652344 106.730469 L 175.960938 106.730469 L 175.960938 124.039062 C 175.960938 127.214844 178.53125 129.808594 181.730469 129.808594 C 184.929688 129.808594 187.5 127.214844 187.5 124.039062 L 187.5 106.730469 L 210.578125 106.730469 L 210.578125 129.808594 L 193.269531 129.808594 C 190.070312 129.808594 187.5 132.398438 187.5 135.578125 L 187.5 152.882812 L 158.652344 152.882812 C 155.453125 152.882812 152.882812 155.476562 152.882812 158.652344 L 152.882812 187.5 L 141.347656 187.5 L 141.347656 170.191406 C 141.347656 167.015625 138.777344 164.421875 135.578125 164.421875 L 112.5 164.421875 C 109.300781 164.421875 106.730469 167.015625 106.730469 170.191406 L 106.730469 193.269531 C 106.730469 196.445312 109.300781 199.039062 112.5 199.039062 L 152.882812 199.039062 L 152.882812 216.347656 C 152.882812 219.523438 155.453125 222.117188 158.652344 222.117188 L 187.5 222.117188 L 187.5 233.652344 L 170.191406 233.652344 C 166.992188 233.652344 164.421875 236.246094 164.421875 239.421875 L 164.421875 262.5 C 164.421875 265.675781 166.992188 268.269531 170.191406 268.269531 L 193.269531 268.269531 C 196.46875 268.269531 199.039062 265.675781 199.039062 262.5 L 199.039062 216.347656 C 199.039062 213.167969 196.46875 210.578125 193.269531 210.578125 L 164.421875 210.578125 L 164.421875 199.039062 L 210.578125 199.039062 L 210.578125 262.5 C 210.578125 265.675781 213.144531 268.269531 216.347656 268.269531 L 239.421875 268.269531 C 242.625 268.269531 245.191406 265.675781 245.191406 262.5 L 245.191406 245.191406 L 268.269531 245.191406 L 268.269531 297.117188 C 268.269531 300.292969 270.839844 302.882812 274.039062 302.882812 L 297.117188 302.882812 C 300.316406 302.882812 302.882812 300.292969 302.882812 297.117188 L 302.882812 274.039062 C 302.882812 270.859375 300.316406 268.269531 297.117188 268.269531 L 279.808594 268.269531 L 279.808594 239.421875 C 279.808594 236.246094 277.238281 233.652344 274.039062 233.652344 L 245.191406 233.652344 L 245.191406 222.117188 L 297.117188 222.117188 C 300.316406 222.117188 302.882812 219.523438 302.882812 216.347656 L 302.882812 158.652344 C 302.882812 155.476562 300.316406 152.882812 297.117188 152.882812 L 262.5 152.882812 C 259.300781 152.882812 256.730469 155.476562 256.730469 158.652344 C 256.730469 161.832031 259.300781 164.421875 262.5 164.421875 L 291.347656 164.421875 L 291.347656 187.5 L 274.039062 187.5 C 270.839844 187.5 268.269531 190.089844 268.269531 193.269531 L 268.269531 210.578125 L 239.421875 210.578125 C 236.222656 210.578125 233.652344 213.167969 233.652344 216.347656 L 233.652344 233.652344 L 222.117188 233.652344 L 222.117188 199.039062 L 239.421875 199.039062 C 242.625 199.039062 245.191406 196.445312 245.191406 193.269531 L 245.191406 170.191406 C 245.191406 167.015625 242.625 164.421875 239.421875 164.421875 L 216.347656 164.421875 C 213.144531 164.421875 210.578125 167.015625 210.578125 170.191406 L 210.578125 187.5 L 164.421875 187.5 L 164.421875 164.421875 L 193.269531 164.421875 C 196.46875 164.421875 199.039062 161.832031 199.039062 158.652344 L 199.039062 141.347656 L 216.347656 141.347656 C 219.546875 141.347656 222.117188 138.753906 222.117188 135.578125 L 222.117188 100.960938 C 222.117188 97.785156 219.546875 95.191406 216.347656 95.191406 L 187.5 95.191406 L 187.5 77.882812 C 187.5 74.707031 184.929688 72.117188 181.730469 72.117188 Z M 204.808594 72.117188 C 201.609375 72.117188 199.039062 74.707031 199.039062 77.882812 C 199.039062 81.0625 201.609375 83.652344 204.808594 83.652344 L 216.347656 83.652344 C 219.546875 83.652344 222.117188 81.0625 222.117188 77.882812 C 222.117188 74.707031 219.546875 72.117188 216.347656 72.117188 Z M 245.191406 72.117188 C 238.835938 72.117188 233.652344 77.296875 233.652344 83.652344 L 233.652344 129.808594 C 233.652344 136.164062 238.835938 141.347656 245.191406 141.347656 L 291.347656 141.347656 C 297.703125 141.347656 302.882812 136.164062 302.882812 129.808594 L 302.882812 83.652344 C 302.882812 77.296875 297.703125 72.117188 291.347656 72.117188 Z M 83.652344 83.652344 L 129.808594 83.652344 L 129.808594 129.808594 L 83.652344 129.808594 Z M 164.421875 83.652344 L 175.960938 83.652344 L 175.960938 95.191406 L 164.421875 95.191406 Z M 245.191406 83.652344 L 291.347656 83.652344 L 291.347656 129.808594 L 245.191406 129.808594 Z M 100.960938 95.191406 C 97.761719 95.191406 95.191406 97.785156 95.191406 100.960938 L 95.191406 112.5 C 95.191406 115.675781 97.761719 118.269531 100.960938 118.269531 L 112.5 118.269531 C 115.699219 118.269531 118.269531 115.675781 118.269531 112.5 L 118.269531 100.960938 C 118.269531 97.785156 115.699219 95.191406 112.5 95.191406 Z M 262.5 95.191406 C 259.300781 95.191406 256.730469 97.785156 256.730469 100.960938 L 256.730469 112.5 C 256.730469 115.675781 259.300781 118.269531 262.5 118.269531 L 274.039062 118.269531 C 277.238281 118.269531 279.808594 115.675781 279.808594 112.5 L 279.808594 100.960938 C 279.808594 97.785156 277.238281 95.191406 274.039062 95.191406 Z M 158.652344 118.269531 C 155.453125 118.269531 152.882812 120.859375 152.882812 124.039062 L 152.882812 135.578125 C 152.882812 138.753906 155.453125 141.347656 158.652344 141.347656 C 161.855469 141.347656 164.421875 138.753906 164.421875 135.578125 L 164.421875 124.039062 C 164.421875 120.859375 161.855469 118.269531 158.652344 118.269531 Z M 77.882812 152.882812 C 74.683594 152.882812 72.117188 155.476562 72.117188 158.652344 C 72.117188 161.832031 74.683594 164.421875 77.882812 164.421875 L 89.421875 164.421875 C 92.625 164.421875 95.191406 161.832031 95.191406 158.652344 C 95.191406 155.476562 92.625 152.882812 89.421875 152.882812 Z M 118.269531 175.960938 L 129.808594 175.960938 L 129.808594 187.5 L 118.269531 187.5 Z M 222.117188 175.960938 L 233.652344 175.960938 L 233.652344 187.5 L 222.117188 187.5 Z M 77.882812 181.730469 C 74.683594 181.730469 72.117188 184.324219 72.117188 187.5 C 72.117188 190.675781 74.683594 193.269531 77.882812 193.269531 L 89.421875 193.269531 C 92.625 193.269531 95.191406 190.675781 95.191406 187.5 C 95.191406 184.324219 92.625 181.730469 89.421875 181.730469 Z M 279.808594 199.039062 L 291.347656 199.039062 L 291.347656 210.578125 L 279.808594 210.578125 Z M 77.882812 210.578125 C 74.683594 210.578125 72.117188 213.167969 72.117188 216.347656 C 72.117188 219.523438 74.683594 222.117188 77.882812 222.117188 L 89.421875 222.117188 C 92.625 222.117188 95.191406 219.523438 95.191406 216.347656 C 95.191406 213.167969 92.625 210.578125 89.421875 210.578125 Z M 112.5 210.578125 C 109.300781 210.578125 106.730469 213.167969 106.730469 216.347656 C 106.730469 219.523438 109.300781 222.117188 112.5 222.117188 L 135.578125 222.117188 C 138.777344 222.117188 141.347656 219.523438 141.347656 216.347656 C 141.347656 213.167969 138.777344 210.578125 135.578125 210.578125 Z M 83.652344 233.652344 C 77.296875 233.652344 72.117188 238.835938 72.117188 245.191406 L 72.117188 291.347656 C 72.117188 297.703125 77.296875 302.882812 83.652344 302.882812 L 129.808594 302.882812 C 136.164062 302.882812 141.347656 297.703125 141.347656 291.347656 L 141.347656 245.191406 C 141.347656 238.835938 136.164062 233.652344 129.808594 233.652344 Z M 297.117188 233.652344 C 293.914062 233.652344 291.347656 236.246094 291.347656 239.421875 L 291.347656 250.960938 C 291.347656 254.140625 293.914062 256.730469 297.117188 256.730469 C 300.316406 256.730469 302.882812 254.140625 302.882812 250.960938 L 302.882812 239.421875 C 302.882812 236.246094 300.316406 233.652344 297.117188 233.652344 Z M 83.652344 245.191406 L 129.808594 245.191406 L 129.808594 291.347656 L 83.652344 291.347656 Z M 175.960938 245.191406 L 187.5 245.191406 L 187.5 256.730469 L 175.960938 256.730469 Z M 222.117188 245.191406 L 233.652344 245.191406 L 233.652344 256.730469 L 222.117188 256.730469 Z M 100.960938 256.730469 C 97.761719 256.730469 95.191406 259.324219 95.191406 262.5 L 95.191406 274.039062 C 95.191406 277.214844 97.761719 279.808594 100.960938 279.808594 L 112.5 279.808594 C 115.699219 279.808594 118.269531 277.214844 118.269531 274.039062 L 118.269531 262.5 C 118.269531 259.324219 115.699219 256.730469 112.5 256.730469 Z M 158.652344 279.808594 C 155.453125 279.808594 152.882812 282.398438 152.882812 285.578125 L 152.882812 297.117188 C 152.882812 300.292969 155.453125 302.882812 158.652344 302.882812 C 161.855469 302.882812 164.421875 300.292969 164.421875 297.117188 L 164.421875 285.578125 C 164.421875 282.398438 161.855469 279.808594 158.652344 279.808594 Z M 187.5 279.808594 C 184.300781 279.808594 181.730469 282.398438 181.730469 285.578125 L 181.730469 297.117188 C 181.730469 300.292969 184.300781 302.882812 187.5 302.882812 C 190.699219 302.882812 193.269531 300.292969 193.269531 297.117188 L 193.269531 285.578125 C 193.269531 282.398438 190.699219 279.808594 187.5 279.808594 Z M 216.347656 279.808594 C 213.144531 279.808594 210.578125 282.398438 210.578125 285.578125 L 210.578125 297.117188 C 210.578125 300.292969 213.144531 302.882812 216.347656 302.882812 C 219.546875 302.882812 222.117188 300.292969 222.117188 297.117188 L 222.117188 285.578125 C 222.117188 282.398438 219.546875 279.808594 216.347656 279.808594 Z M 245.191406 279.808594 C 241.992188 279.808594 239.421875 282.398438 239.421875 285.578125 L 239.421875 297.117188 C 239.421875 300.292969 241.992188 302.882812 245.191406 302.882812 C 248.390625 302.882812 250.960938 300.292969 250.960938 297.117188 L 250.960938 285.578125 C 250.960938 282.398438 248.390625 279.808594 245.191406 279.808594 Z M 279.808594 279.808594 L 291.347656 279.808594 L 291.347656 291.347656 L 279.808594 291.347656 Z M 279.808594 279.808594 " fill-opacity="1" fill-rule="nonzero"/></g></svg>
            <h4 class="fira-sans-medium color-brown" style="margin-top: 15px;">You are now in line</h4>
            <p class="fira-sans-regular color-dark" style="text-align: center;">
              Present your queueing number when it's your turn.
            </p>
            <h1 class="fira-sans-bold color-brown">
              <?php
                if (isset($_SESSION['queue.number'])) {
                  if ($queue_number == $_SESSION['queue.number']) {
                    echo "IT'S YOUR TURN !!";
                  } else {
                    echo 'Queue: '.$_SESSION['queue.number'];
                  }
                }
              ?>
            </h1>
            <?php
              if ($queue_number != 0) {
                if ($queue_number != $_SESSION['queue.number']) {
                  echo '
                    <h6 class="fira-sans-regular color-light-white">
                      Serving at the counter: <b>'.$queue_number.'</b>
                    </h6>
                  ';
                }
              }
            ?>
            <hr style="width: 100%" />
            <p class="fira-sans-regular color-dark p-queue-orders">
              <?php
                if (isset($_SESSION['queue.number'])) {
                  $queue_orders = $_SESSION['queue.orders'];
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
            <button
              
              type="submit"
              class="btn btn-md btn-outline-secondary btn-reset-queue">
              <i class="fa-solid fa-rotate-right"></i>&nbsp;&nbsp;Reset Queue
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
</html>
