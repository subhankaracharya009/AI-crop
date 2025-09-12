<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if it's a POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database connection
    include 'db_connect.php';
    
    // Get form data
    $fullname = trim($_POST['fullname']);
    $address = trim($_POST['address']);
    $phone = trim($_POST['phone']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm-password'];
    
    // Validate inputs
    $errors = [];
    
    if (empty($fullname) || empty($address) || empty($phone) || empty($password)) {
        $errors[] = "All fields are required.";
    }
    
    if ($password !== $confirm_password) {
        $errors[] = "Passwords do not match.";
    }
    
    if (strlen($password) < 8) {
        $errors[] = "Password must be at least 8 characters long.";
    }
    
    if (!empty($errors)) {
        echo json_encode(["success" => false, "message" => implode("<br>", $errors)]);
        exit;
    }
    
    try {
        // Check if phone already exists
        $check_query = "SELECT id FROM users WHERE phone = ?";
        $stmt = $conn->prepare($check_query);
        $stmt->bind_param("s", $phone);
        $stmt->execute();
        $stmt->store_result();
        
        if ($stmt->num_rows > 0) {
            echo json_encode(["success" => false, "message" => "Phone number already registered."]);
            exit;
        }
        $stmt->close();
        
        // Hash password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        // Insert into database - using the correct table name 'users'
        $insert_query = "INSERT INTO users (fullname, address, phone, password) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($insert_query);
        $stmt->bind_param("ssss", $fullname, $address, $phone, $hashed_password);
        
        if ($stmt->execute()) {
            echo json_encode(["success" => true, "message" => "Registration successful! You can now login."]);
        } else {
            echo json_encode(["success" => false, "message" => "Database error: " . $stmt->error]);
        }
        
        $stmt->close();
    } catch (Exception $e) {
        echo json_encode(["success" => false, "message" => "Error: " . $e->getMessage()]);
    }
    
    $conn->close();
} else {
    echo json_encode(["success" => false, "message" => "Invalid request method."]);
}
?>