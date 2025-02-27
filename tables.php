<?php
session_start();
if (!isset($_SESSION['id']) || $_SESSION['id'] == 0) {
    header("Location: login.php");
    exit();
}

$message = "";
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    unset($_SESSION['message']); // Remove message after displaying it
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Form CSS -->
  <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #F8F9FA;
            padding: 20px;
        }

        .property-container {
            max-width: 600px;
            margin: 50px auto; /* Centering the form */
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            text-align: left; /* Ensuring left alignment */
        }

        h2 {
            text-align: center;
            color: #222222;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 15px;
        }

        .form-group label {
            font-weight: 600;
            margin-bottom: 5px;
        }

        .property-input, 
        .property-select, 
        .property-textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #D1D5DB;
            border-radius: 6px;
            background-color: #FAFAFA;
            transition: all 0.3s ease-in-out;
        }

        .property-input:focus, 
        .property-select:focus, 
        .property-textarea:focus {
            border-color: #2563EB;
            outline: none;
            box-shadow: 0 0 5px rgba(37, 99, 235, 0.3);
        }

        .property-button {
            background-color: #2563EB;
            color: white;
            padding: 12px;
            width: 100%;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: background 0.3s ease-in-out, transform 0.2s ease-in-out;
        }

        .property-button:hover {
            background-color: #1E4BBB;
            transform: translateY(-2px);
        }

        /* Image Preview Styling */
        #image-preview {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            justify-content: center;
            margin-top: 10px;
        }

        #image-preview img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
        }
    </style>
    <!-- Form CSS end -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <style>
        .rounded-favicon {
            width: 32px;  /* Standard favicon size */
            height: 32px;
            border-radius: 50%; /* Makes it circular */
            overflow: hidden;
        }

        .username-link {
        font-family: 'Roboto', sans-serif;
        font-size: 18px;
        font-weight: bold;
        color: #1a1a1a;
        text-decoration: none; /* Removes underline */
        }
    </style>
  <title>
    New Listing
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,900" />
  <!-- Nucleo Icons -->
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
  <!-- CSS Files -->
  <link id="pagestyle" href="assets/css/material-dashboard.css?v=3.2.0" rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-100">
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
          <a class="nav-link active bg-gradient-dark text-white" href="tables.php">
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
      </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
    <div class="mx-3">
        <a class="btn btn-outline-dark mt-4 w-100" href="profile.php" type="button"><i class="material-symbols-rounded opacity-5">person</i><span class="nav-link-text ms-1">Profile</span></a>
        <a class="btn w-100" href="logout.php" type="button" style="background-color: red; color: white;">
          <i class="material-symbols-rounded opacity-5">logout</i> LogOut
        </a>
      </div>
    </div>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-3 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Tables</li>
          </ol>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            </div>
          </div>
          <ul class="navbar-nav d-flex align-items-center  justify-content-end">
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
            <li>
              <a href="profile.php" class="breadcrumb-item text-sm"><?php echo $_SESSION['username'];?></a>
            </li>
            <li class="nav-item d-flex align-items-center">
              <a href="profile.php" class="nav-link text-body font-weight-bold px-0">
                <i class="material-symbols-rounded">account_circle</i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
     <!-- Form Begins -->
<div class="property-container">
    <?php if (!empty($message)) : ?>
        <div style="background-color: #28a745; color: white; padding: 10px; margin-bottom: 15px; text-align: center; border-radius: 5px;">
            <?php echo $message; ?>
        </div>
    <?php endif; ?>

    <h2>Property Listing Form</h2>

    <form id="property-form" action="upload_property.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="property-image">Upload Images (Min: 3, Max: 10):</label>
            <input type="file" id="property-image" name="property_images[]" multiple class="property-input" onchange="previewImages()" required>
            <small>Upload at least 3 images and a maximum of 10 images.</small>
            <div id="image-preview"></div>
        </div>

        <div class="form-group">
            <label for="property-type">Apartment Type:</label>
            <select id="property-type" name="property_type" class="property-select">
                <option value="1 BHK">1 BHK</option>
                <option value="2 BHK">2 BHK</option>
                <option value="3 BHK">3 BHK</option>
                <option value="Villa">Villa</option>
            </select>
        </div>

        <!-- Emirates Checkboxes -->
        <div class="form-group">
            <label>Select Emirate:</label>
            <div>
                <input type="checkbox" name="emirate[]" value="Dubai"> Dubai
                <input type="checkbox" name="emirate[]" value="Abu Dhabi"> Abu Dhabi
                <input type="checkbox" name="emirate[]" value="Sharjah"> Sharjah
                <input type="checkbox" name="emirate[]" value="Ajman"> Ajman
                <input type="checkbox" name="emirate[]" value="Umm Al Quwain"> Umm Al Quwain
                <input type="checkbox" name="emirate[]" value="Fujairah"> Fujairah
                <input type="checkbox" name="emirate[]" value="Ras Al Khaimah"> Ras Al Khaimah
            </div>
        </div>

        <div class="form-group">
            <label for="property-area">Total Area (sq ft):</label>
            <input type="number" id="property-area" name="sq_ft" class="property-input">
        </div>

        <!-- Features Checkboxes -->
        <div class="form-group">
            <label>Select Features:</label>
            <div>
                <input type="checkbox" name="features[]" value="Electricity"> Electricity
                <input type="checkbox" name="features[]" value="Water Supply"> Water Supply
                <input type="checkbox" name="features[]" value="Furnished"> Furnished
                <input type="checkbox" name="features[]" value="Wifi"> Wifi
                <input type="checkbox" name="features[]" value="Parking"> Parking
                <input type="checkbox" name="features[]" value="Gym"> Gym
                <input type="checkbox" name="features[]" value="Swimming Pool"> Swimming Pool
            </div>
        </div>

        <div class="form-group">
            <label for="property-price">Price ($):</label>
            <input type="number" id="property-price" name="property_price" class="property-input">
        </div>

        <!-- Payment Plan Checkboxes -->
        <div class="form-group">
            <label>Payment Plan:</label>
            <div>
                <input type="checkbox" name="payment_plan[]" value="Weekly"> Weekly
                <input type="checkbox" name="payment_plan[]" value="Monthly"> Monthly
                <input type="checkbox" name="payment_plan[]" value="Yearly"> Yearly
            </div>
        </div>

        <button type="submit" class="property-button">Submit Property</button>
    </form>
</div>

<script>
    document.getElementById("property-form").addEventListener("submit", function(event) {
        event.preventDefault(); // Prevent form from reloading the page

        let files = document.getElementById("property-image").files;
        if (files.length < 3 || files.length > 10) {
            alert("Please upload between 3 to 10 images.");
            return;
        }

        alert("Property listing submitted successfully!");
        this.submit(); // Proceed with form submission
    });

    function previewImages() {
        const preview = document.getElementById("image-preview");
        preview.innerHTML = "";
        const files = document.getElementById("property-image").files;

        if (files.length < 3 || files.length > 10) {
            alert("Please upload between 3 to 10 images.");
            document.getElementById("property-image").value = "";
            return;
        }

        for (const file of files) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const img = document.createElement("img");
                img.src = e.target.result;
                img.style.width = "100px"; // Adjust preview size
                img.style.margin = "5px";
                preview.appendChild(img);
            };
            reader.readAsDataURL(file);
        }
    }
</script>
<!-- Form Ends -->
  </main>
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