<?php
session_start();
include 'connection.php';

if (!isset($_SESSION['id'])) {
  echo "Please log in to view your properties.";
  exit;
}

$user_id = $_SESSION['id']; // Get logged-in user's ID

// Fetch properties uploaded by the logged-in user
$sql = "SELECT * FROM properties WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <style>
        .rounded-favicon {
            width: 32px;  /* Standard favicon size */
            height: 32px;
            border-radius: 50%; /* Makes it circular */
            overflow: hidden;
        }
        .listings-container {
          display: flex;
          flex-wrap: wrap;
          gap: 20px;
          padding: 20px;
        }

        .listing-card {
            display: flex;
            align-items: center;
            width: 100%;
            padding: 15px;
            border: 2px solid black;
            border-radius: 10px;
            overflow: hidden;
            background: #f9f9f9;
        }

        .property-image {
            width: 150px;
            height: 150px;
            border-radius: 15px;
            object-fit: cover;
            margin-right: 20px;
        }

        .property-details {
            flex: 1;
        }

        .property-details h3 {
            margin: 0;
            font-size: 18px;
        }

        .property-details p {
            margin: 5px 0;
            font-size: 14px;
            color: #555;
        }
    </style>
  <title>
    Profile | PropSpace
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,900" />
  <!-- Nucleo Icons -->
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
  <!-- CSS Files -->
  <link id="pagestyle" href="assets/css/material-dashboard.css?v=3.2.0" rel="stylesheet" />
</head>

<body class="g-sidenav-show bg-gray-100">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-radius-lg fixed-start ms-2  bg-white my-2" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-dark opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand px-4 py-3 m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
        <img src="assets/img/favicon.png" class="rounded-favicon" width="26" height="26" alt="main_logo">
        <span class="ms-1 text-sm text-dark">PropSpace</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-dark" href="welcome.php">
            <i class="material-symbols-rounded opacity-5">dashboard</i>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="tables.php">
            <i class="material-symbols-rounded opacity-5">edit</i>
            <span class="nav-link-text ms-1">New Listing</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="notifications.php">
            <i class="material-symbols-rounded opacity-5">notifications</i>
            <span class="nav-link-text ms-1">Notifications</span>
          </a>
        </li>
        <div class="sidenav-footer position-absolute w-100 bottom-0 ">
          <div class="mx-3">
            <a class="btn bg-gradient-dark w-100" href="profile.php" type="button"><i class="material-symbols-rounded opacity-5">person</i><span class="nav-link-text ms-1">Profile</span></a>
            <a class="btn w-100" href="login.php" type="button" style="background-color: red; color: white;">
              <i class="material-symbols-rounded opacity-5">logout</i> LogOut
            </a>
          </div>
        </div>
  </aside>
  <div class="main-content position-relative max-height-vh-100 h-100">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-3 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Profile</li>
          </ol>
        </nav>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid px-2 px-md-4">
      <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
        <span class="mask  bg-gradient-dark  opacity-6"></span>
      </div>
      <div class="card card-body mx-2 mx-md-2 mt-n6">
        <div class="row gx-4 mb-2">
          <div class="col-auto">
            <div class="avatar avatar-xl position-relative">
              <img src="assets/img/dp.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
            </div>
          </div>
          <div class="col-auto my-auto">
            <div class="h-100">
                <p>Welcome, <?php echo isset($_SESSION['username']) ? $_SESSION['username'] : "Guest"; ?>!</p>
            </div>
          </div>
          <div class="listings-container">
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="listing-card">
                        <!-- Bootstrap Carousel -->
                        <div id="carousel-<?php echo $row['id']; ?>" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <?php
                                $images = explode(',', $row['images']); // Split multiple images
                                foreach ($images as $index => $image) {
                                    $active = ($index == 0) ? 'active' : ''; // First image is active
                                    echo '<div class="carousel-item ' . $active . '">';
                                    echo '<img src="uploads/' . trim(htmlspecialchars($image)) . '" class="d-block w-100 property-image" alt="Property Image">';
                                    echo '</div>';
                                }
                                ?>
                            </div>
                        </div>
                        <!-- Property Details -->
                        <div class="property-details">
                            <h3><?php echo htmlspecialchars($row['type']); ?></h3>
                            <p><?php echo htmlspecialchars($row['features']); ?></p>
                            <p><strong>Price:</strong> <?php echo htmlspecialchars($row['price']); ?></p>
                            <p><strong>Payment Plan:</strong> <?php echo htmlspecialchars($row['payment_plan']); ?></p>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>No listings found.</p>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.min.js?v=3.2.0"></script>
</body>

</html>