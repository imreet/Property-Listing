<?php
include 'connection.php'; // Ensure correct DB connection file

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
    <title>FirstHomes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color:rgb(171, 202, 248);
            padding: 20px;
        }

        /* Navbar Styling */
        .navbar {
            background: rgb(255, 255, 255);
            border-radius: 50px;
            padding: 15px 30px;
            margin: 20px auto;
            width: 95%;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            color: black;
        }
        .navbar-nav .nav-link {
            color: black;
            font-weight: bold;
        }
        .navbar-nav .nav-link:hover {
            color: grey;
        }

        .property-container {
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            padding-bottom: 15px;
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

        .property-details {
            padding: 15px 20px;
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
</head>
<body>

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="#">FirstHomes</a>
        <div class="navbar-nav ms-auto">
            <a href="dummy1.php" class="nav-link">Home</a>
        </div>
    </nav>
    <!-- Navbar End -->

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
