<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
    
    // Insert into database
    $insert_query = "INSERT INTO users (fullname, address, phone, password) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($insert_query);
    $stmt->bind_param("ssss", $fullname, $address, $phone, $hashed_password);
    
    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "Registration successful! You can now login."]);
    } else {
        echo json_encode(["success" => false, "message" => "Error: " . $stmt->error]);
    }
    
    $stmt->close();
    $conn->close();
} else {
    echo json_encode(["success" => false, "message" => "Invalid request method."]);
}
?>