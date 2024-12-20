<?php
  session_start();
  include('../utils/connections.php');
  if (isset($_SESSION['user.credentials.username'])) {
    header('Location: ./dashboard/');
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/global.css" />
    <link rel="stylesheet" href="./css/index.css" />
  </head>
  <body>
    <div class="container">
      <div class="div-login-content-wrapper">
        <form action="../actions/login.php" method="POST">
          <div class="div-login-container">
            <h2 class="h2-form-title fira-sans-bold">JMOA's Cafe&trade;</h2>
            <p class="p-form-title-description fira-sans-regular">
              Please input valid credentials to login
            </p>
            <input type="hidden" name="type" value="admin" />
            <input
              type="email"
              name="username"
              placeholder="Username"
              required
              class="fira-sans-regular form-control"
            />
            <input
              type="password"
              name="password"
              placeholder="Password"
              required
              class="fira-sans-regular form-control"
              style="margin-top: 10px;"
            />
            <?php
              if (isset($_SESSION['user.error.message'])) {
                echo '
                  <p
                    class="fira-sans-regular"
                    style="margin-bottom: 0px; text-align: left; width: 100%; color: red; margin-top: 6px;">
                    '.$_SESSION['user.error.message'].'
                  </p>
                ';
                unset($_SESSION['user.error.message']);
              }
            ?>
            <input type="submit" value="Login" class="fira-sans-regular btn btn-primary btn-md btn-login">
            <div class="div-form-footer" style="margin-top: 15px;">
              <p class="p-form-footer-title fira-sans-regular">
                Forgot password? Click <a class="a-form-forgot-password" href="">here</a>.
              </p>
            </div>
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
</html>
