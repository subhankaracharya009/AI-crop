<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $phone = trim($_POST['phone']);
    $password = $_POST['password'];
    
    // Validate inputs
    if (empty($phone) || empty($password)) {
        echo json_encode(["success" => false, "message" => "Phone number and password are required."]);
        exit;
    }
    
    // Check if user exists
    $query = "SELECT id, fullname, password FROM users WHERE phone = ? AND is_active = 1";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $phone);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows == 1) {
        $stmt->bind_result($id, $fullname, $hashed_password);
        $stmt->fetch();
        
        // Verify password
        if (password_verify($password, $hashed_password)) {
            // Update last login
            $update_query = "UPDATE users SET last_login = NOW() WHERE id = ?";
            $update_stmt = $conn->prepare($update_query);
            $update_stmt->bind_param("i", $id);
            $update_stmt->execute();
            $update_stmt->close();
            
            // Start session and set session variables
            session_start();
            $_SESSION['user_id'] = $id;
            $_SESSION['fullname'] = $fullname;
            $_SESSION['phone'] = $phone;
            $_SESSION['loggedin'] = true;
            
            echo json_encode(["success" => true, "message" => "Login successful! Redirecting..."]);
        } else {
            echo json_encode(["success" => false, "message" => "Invalid password."]);
        }
    } else {
        echo json_encode(["success" => false, "message" => "No account found with that phone number."]);
    }
    
    $stmt->close();
    $conn->close();
} else {
    echo json_encode(["success" => false, "message" => "Invalid request method."]);
}
?>