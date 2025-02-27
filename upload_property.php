<?php
session_start();
include("connection.php"); // Ensure correct database connection

if (!isset($_SESSION['id'])) {
    $_SESSION['message'] = "User not logged in!";
    header("Location: tables.php");
    exit();
}
$user_id = $_SESSION['id']; 


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uploadDir = "uploads/";  // Define the upload directory
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);  // Create the uploads directory if it doesn't exist
    }

    // Check if images are uploaded
    if (isset($_FILES['property_images']) && count($_FILES['property_images']['name']) > 0) {
        $fileNames = [];
        $allowedExtensions = ["jpg", "jpeg", "png", "gif"];
        $totalFiles = count($_FILES['property_images']['name']);

        // Validate file count (Between 3 to 10 images)
        if ($totalFiles < 3 || $totalFiles > 10) {
            $_SESSION['message'] = "Please upload between 3 to 10 images.";
            header("Location: tables.php");
            exit();
        }

        foreach ($_FILES['property_images']['tmp_name'] as $key => $tmp_name) {
            $originalName = basename($_FILES['property_images']['name'][$key]);
            $fileSize = $_FILES['property_images']['size'][$key];
            $fileExt = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));
            $uniqueName = time() . "_" . uniqid() . "." . $fileExt;  // Generate a unique name
            $filePath = $uploadDir . $uniqueName;

            // Check for upload errors
            if ($_FILES['property_images']['error'][$key] != 0) {
                $_SESSION['message'] = "Error with file upload: " . $_FILES['property_images']['error'][$key];
                header("Location: tables.php");
                exit();
            }

            // Validate file extension
            if (!in_array($fileExt, $allowedExtensions)) {
                $_SESSION['message'] = "Invalid file type: $originalName. Only JPG, JPEG, PNG, GIF allowed.";
                header("Location: tables.php");
                exit();
            }

            // Validate file size (Max: 5MB)
            if ($fileSize > 5 * 1024 * 1024) {
                $_SESSION['message'] = "File $originalName is too large. Max size is 5MB.";
                header("Location: tables.php");
                exit();
            }

            // Move file to uploads folder
            if (move_uploaded_file($tmp_name, $filePath)) {
                $fileNames[] = $uniqueName;  // Store only filename, not full path
            } else {
                $_SESSION['message'] = "Error uploading file: $originalName.";
                header("Location: tables.php");
                exit();
            }
        }

        // Prepare data for database insertion
        $images = implode(",", $fileNames);
        $type = trim($_POST['property_type']);
        $sq_ft = trim($_POST['sq_ft']);
        $price = trim($_POST['property_price']);

        // Handle checkboxes
        $emirate = isset($_POST['emirate']) ? implode(",", $_POST['emirate']) : "";
        $features = isset($_POST['features']) ? implode(",", $_POST['features']) : "";
        $payment_plan = isset($_POST['payment_plan']) ? implode(",", $_POST['payment_plan']) : "";

        // Ensure all required fields are filled
        if (empty($type) || empty($sq_ft) || empty($price) || empty($emirate) || empty($features) || empty($payment_plan)) {
            $_SESSION['message'] = "All fields are required!";
            header("Location: tables.php");
            exit();
        }

        $stmt = $conn->prepare("INSERT INTO properties (images, type, sq_ft, price, emirate, features, payment_plan, user_id, created_at) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW())");

        if (!$stmt) {
            die("Prepare failed: " . $conn->error);
        }

        // Bind parameters
        $stmt->bind_param("sssdsssi", $images, $type, $sq_ft, $price, $emirate, $features, $payment_plan, $user_id);

        // Ensure the statement executes successfully
        if ($stmt->execute()) {
            $_SESSION['message'] = "Property uploaded successfully!";
        } else {
            $_SESSION['message'] = "Database insertion failed! Error: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();

        header("Location: tables.php");
        exit();
    } else {
        $_SESSION['message'] = "No images selected!";
        header("Location: tables.php");
        exit();
    }
}
?>
