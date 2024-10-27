<?php
  session_start();
  include('../utils/connections.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>JMoa's Cafe (Monitor)&trade;</title>
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
    <style>
      .claiming_no {
        font-size: 40pt;
        margin-bottom: 0px !important;
      }
    </style>
  </head>
  <body>
    <div class="container" style="padding-block: 20px;">
      <h2 class="fira-sans-medium">ORDER CLAIMING MONITOR</h2>
      <div style="height: 15px;"></div>
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
          <h3 class="fira-sans-medium color-brown">NOW PREPARING</h3>
          <div style="height: 15px;"></div>
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
              <?php
                $fetch_query = "SELECT * FROM `queue` WHERE queue_serving = 'PREPARING' AND queue_status = 'ACTIVE' LIMIT 15 OFFSET 0";
                $result = $conn->query($fetch_query);
                if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                    $queue_number = $row['queue_number'];
                    echo '<h1 class="fira-sans-bold claiming_no">'.$queue_number.'</h1>';
                  }
                }
              ?>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
              <?php
                $fetch_query = "SELECT * FROM `queue` WHERE queue_serving = 'PREPARING' AND queue_status = 'ACTIVE' LIMIT 15 OFFSET 14";
                $result = $conn->query($fetch_query);
                if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                    $queue_number = $row['queue_number'];
                    echo '<h1 class="fira-sans-bold claiming_no">'.$queue_number.'</h1>';
                  }
                }
              ?>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
          <h3 class="fira-sans-medium color-brown">NOW SERVING</h3>
          <div style="height: 15px;"></div>
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12"></div>
              <?php
                $fetch_query = "SELECT * FROM `queue` WHERE queue_serving = 'SERVING' AND queue_status = 'ACTIVE' LIMIT 15 OFFSET 0";
                $result = $conn->query($fetch_query);
                if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                    $queue_number = $row['queue_number'];
                    echo '<h1 class="fira-sans-bold claiming_no">'.$queue_number.'</h1>';
                  }
                }
              ?>
            <div class="col-lg-6 col-md-6 col-sm-12">
              <?php
                $fetch_query = "SELECT * FROM `queue` WHERE queue_serving = 'SERVING' AND queue_status = 'ACTIVE' LIMIT 15 OFFSET 14";
                $result = $conn->query($fetch_query);
                if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                    $queue_number = $row['queue_number'];
                    echo '<h1 class="fira-sans-bold claiming_no">'.$queue_number.'</h1>';
                  }
                }
              ?>
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
  <script type="text/javascript">
    $(document).ready(() => {
      setTimeout(() => {
        window.location.href = "./";
      }, 10000);
    });
  </script>
</html>
