<?php
include 'connection.php'; // Ensure correct DB connection file

// Run your existing query
$sql = "SELECT p.*, u.username 
        FROM properties p
        INNER JOIN users u ON p.user_id = u.id
        ORDER BY p.created_at DESC";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MAKAAN</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f2f5;
            padding: 20px;
        }

        .property-container {
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            padding-bottom: 10px;
        }

        .property-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }

        .carousel img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            border-radius: 10px;
        }

        .carousel-control-prev, .carousel-control-next {
            border-radius: 50%;
        }

        .carousel-inner {
            border-radius: 10px;
            overflow: hidden;
        }

        .property-details {
            padding: 15px 20px;
        }

        .property-details h4 {
            font-size: 1.6rem;
            color: #333;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .property-details p {
            font-size: 1rem;
            color: #555;
        }

        .price {
            font-size: 1.3rem;
            font-weight: bold;
            color: #28a745;
        }

        .property-card {
            margin-bottom: 40px;
        }

        .feature-badge, .payment-badge {
            display: inline-block;
            background: #007bff;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            margin: 3px;
            font-size: 0.9rem;
        }

        .container {
            max-width: 1200px;
        }
        
    </style>

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/makaanbootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/makaanstyle.css" rel="stylesheet">

    
</head>
<body>


    <!-- Navbar Start -->
    <div class="container-fluid nav-bar bg-transparent">
        <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
            <a href="dummy2.html" class="navbar-brand d-flex align-items-center text-center">
                <div class="icon p-2 me-2">
                    <img class="img-fluid" src="images/icon-deal.png" alt="Icon" style="width: 30px; height: 30px;">
                </div>
                <h1 class="m-0 text-primary">Makaan</h1>
            </a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto">
                    <a href="dummy2.php" class="nav-item nav-link active">Home</a>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->

    <!-- Filter Form
    <form id="filter-form">
            <label><strong>Filter by Emirate:</strong></label><br>
            // 
            // $emirates = ["Abu Dhabi", "Dubai", "Sharjah", "Ajman", "Umm Al-Quwain", "Fujairah", "Ras Al Khaimah"];
            // foreach ($emirates as $emirate) {
            //     $checked = in_array($emirate, $selectedEmirates) ? "checked" : "";
            //     echo '<label class="me-3">
            //         <input type="checkbox" class="filter-checkbox" value="' . $emirate . '" ' . $checked . ' onchange="updateFilters()"> ' . $emirate . '
            //     </label>';
            // }
            //
        </form> -->

    <div class="container">
        <h2 class="text-center mt-4 mb-5">Property Listings</h2>

        <div class="row">
            <?php while ($row = $result->fetch_assoc()) : ?>
                <div class="col-lg-4 col-md-6 col-sm-12 property-card">
                    <!-- Property Card -->
                    <div class="property-container">
                        <!-- Image Carousel -->
                        <div id="carousel-<?php echo $row['id']; ?>" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <?php
                                $images = explode(',', $row['images']);
                                foreach ($images as $index => $image) {
                                    $active = ($index == 0) ? 'active' : '';
                                    echo '<div class="carousel-item ' . $active . '">';
                                    echo '<img src="uploads/' . trim($image) . '" class="d-block w-100" alt="Property Image">';
                                    echo '</div>';
                                }
                                ?>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carousel-<?php echo $row['id']; ?>" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carousel-<?php echo $row['id']; ?>" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            </button>
                        </div>

                        <!-- Property Details -->
                        <div class="property-details">
                            <h4><?php echo htmlspecialchars($row['type']); ?></h4>
                            <p><strong>Listed By:</strong> <?php echo htmlspecialchars($row['username']); ?></p>
                            <p><strong>Area:</strong> <?php echo htmlspecialchars($row['sq_ft']); ?> sq ft</p>
                            <p><strong>Location:</strong> <?php echo htmlspecialchars($row['emirate']); ?></p>

                            <!-- Features Section -->
                            <p><strong>Features:</strong></p>
                            <div>
                                <?php
                                $features = explode(',', $row['features']);
                                foreach ($features as $feature) {
                                    echo '<span class="feature-badge">' . htmlspecialchars(trim($feature)) . '</span>';
                                }
                                ?>
                            </div>

                            <!-- Payment Plan Section -->
                            <p class="mt-2"><strong>Payment Plan:</strong></p>
                            <div>
                                <?php
                                $payment_plan = explode(',', $row['payment_plan']);
                                foreach ($payment_plan as $plan) {
                                    echo '<span class="payment-badge bg-success">' . htmlspecialchars(trim($plan)) . '</span>';
                                }
                                ?>
                            </div>

                            <p><strong>Price:</strong> <span class="price">$<?php echo number_format($row['price'], 2); ?></span></p>
                            <p><strong>Listed On:</strong> <?php echo htmlspecialchars($row['created_at']); ?></p>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>

</body>
</html>

<?php $conn->close(); ?>