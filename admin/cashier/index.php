<?php
  session_start();
  include('../../utils/connections.php');
  if (!isset($_SESSION['user.credentials.username'])) {
    header('Location: ../');
  }
  if (isset($_SESSION['session.user_type'])) {
    if ($_SESSION['session.user_type'] == 'CASHIER') {
      header('Location: ../dashboard');
    }
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
          id="btn-menu"
          class="btn btn-outline-success btn-sm
            fira-sans-medium 
            size-13 
            color-dark 
            btn-menu 
            btn-menu-selected"
          type="button">
          <i class="fa-solid fa-bars"></i><span style="padding-left: 16px">&nbsp;Menu Management</span>
        </button>
        <button
          id="btn-products"
          class="btn btn-outline-success btn-sm
            fira-sans-medium 
            size-13 
            color-dark 
            btn-menu 
            btn-menu-selected"
          type="button">
          <i class="fa-solid fa-mug-hot"></i><span style="padding-left: 16px">&nbsp;Product Management</span>
        </button>
        <button
          id="btn-cashier"
          class="btn btn-success btn-sm
            fira-sans-medium 
            size-13 
            color-dark 
            btn-menu 
            btn-menu-selected
            active"
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
            &nbsp;&nbsp;&nbsp;&nbsp;<b><?php if (isset($_SESSION['session.user_type'])) echo $_SESSION['session.user_type']; else 'Admin'; ?></b>&nbsp;
            <i class="fa-solid fa-chevron-right"></i>
            &nbsp;Cashier Management
          </a>
        </div>
      </nav>
      <div class="container" style="padding-inline: 30px; margin-top: 20px;">
        <div class="div-action-buttons">
          <button
            class="btn btn-primary btn-sm fira-sans-regular"
            data-bs-toggle="modal"
            data-bs-target="#staticAddNewCashier">
            <i class="fa-solid fa-circle-plus"></i>&nbsp;&nbsp;Add New Cashier
          </button>
        </div>
        <table id="data" class="table table-striped" style="width:100%">
          <thead>
            <tr>
              <th class="fira-sans-medium">User ID</th>
              <th class="fira-sans-medium">First Name (Cashier)</th>
              <th class="fira-sans-medium">Last Name (Cashier)</th>
              <th class="fira-sans-medium">Email</th>
              <th class="fira-sans-medium">Contact Number</th>
              <th class="fira-sans-medium"></th>
            </tr>
          </thead>
          <tbody>
            <?php
              $fetch_query = "SELECT 
                UC.id,
                UI.first_name,
                UI.last_name,
                UI.email,
                UI.contact_number 
                FROM `user_credentials` AS UC 
                INNER JOIN `user_info` AS UI ON UC.id = UI.user_id 
                WHERE UC.type != 'admin'";
              $result = $conn->query($fetch_query);
              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  $user_id = $row['id'];
                  $first_name = $row['first_name'];
                  $last_name = $row['last_name'];
                  $email = $row['email'];
                  $contact_number = $row['contact_number'];

                  echo '
                    <tr>
                      <td class="color-brown fira-sans-medium">'.$user_id.'</td>
                      <td class="color-dark fira-sans-regular">
                        '.$first_name.'
                      </td>
                      <td class="color-dark fira-sans-regular">
                        '.$last_name.'
                      </td>
                      <td class="color-dark fira-sans-medium">
                        '.$email.'
                      </td>
                      <td class="fira-sans-regular">
                        '.$contact_number.'
                      </td>
                      <td>
                        <div class="dropdown">
                          <button class="btn btn-outline-success dropdown-toggle size-10" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            ACTIONS
                          </button>
                          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="#">Edit Cashier Details</a></li>
                            <li><a class="dropdown-item" href="../../actions/delete_cashier.php?user_id='.$user_id.'">Delete Cashier User</a></li>
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
  <div
    class="modal fade" 
    id="staticAddNewCashier" 
    data-bs-backdrop="static" 
    data-bs-keyboard="false" 
    tabindex="-1" 
    aria-labelledby="staticBackdropLabel" 
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <form action="../../actions/add_cashier.php" method="POST">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5 fira-sans-medium" id="staticBackdropLabel">Add New Cashier User</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p
              class="fira-sans-regular color-dark"
              style="margin-bottom: 15px;">
              Please fill up all the fields to create a new user for <b>Cashier</b>.
            </p>
            <div class="div-field-cashier">
              <input
                name="first_name"
                type="text"
                class="form-control fira-sans-regular"
                placeholder="First Name"
                required
              />
              <input
                name="last_name"
                type="text"
                class="form-control fira-sans-regular"
                placeholder="Last Name"
                required
              />
            </div>
            <div class="div-field-cashier" style="margin-top: 12px;">
              <input
                name="email"
                type="email"
                class="form-control fira-sans-regular"
                placeholder="Email Address (eg. juandelacruz@gmail.com)"
                required
              />
              <input
                name="contact_number"
                type="text"
                class="form-control fira-sans-regular"
                placeholder="Contact Number (eg. 091234567890)"
                required
              />
            </div>
            <p
              class="fira-sans-regular color-dark"
              style="margin-bottom: 15px; margin-top: 20px;">
              Please input a valid <b>Password</b> for this user.<br/>Make sure both of the new password 
              and confirm password is match.
            </p>
            <div class="div-field-cashier" style="margin-top: 12px;">
              <input
                name="cashier_password"
                type="password"
                class="form-control fira-sans-regular"
                placeholder="Cashier New Password"
                required
              />
              <input
                name="cashier_confirm_password"
                type="password"
                class="form-control fira-sans-regular"
                placeholder="Cashier Confirm Password"
                required
              />
            </div>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              data-bs-dismiss="modal"
              class="btn btn-secondary fira-sans-medium">
              Cancel
            </button>
            <button
              type="submit"
              class="btn btn-success fira-sans-medium">
              <i class="fa-solid fa-floppy-disk"></i>&nbsp;&nbsp;Save Changes
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
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
        'searching': false,
        'order': [[0, 'desc']]
      });
      $('#btn-dashboard').click(() => {
        window.location.href = "../dashboard";
      });
      $('#btn-for-payment').click(() => {
        window.location.href = "../for_payment";
      });
      $('#btn-menu').click(() => {
        window.location.href = "../menu";
      });
      $('#btn-products').click(() => {
        window.location.href = "../products";
      });
      $('#btn-orders').click(() => {
        window.location.href = "../orders";
      });
      $('#btn-logout').click(() => {
        window.location.href = "../../actions/logout.php";
      })
    });
  </script>
</html>
