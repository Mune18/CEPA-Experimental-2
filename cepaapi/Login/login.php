<?php

require_once "./config/database.php"; // Include database connection script

function login($id, $password, $pdo) {
    try {
        // Prepare and execute SQL query
        $stmt = $pdo->prepare("SELECT * FROM admin_login WHERE id = ?");
        $stmt->execute([$id]);
        $user = $stmt->fetch();

        // Check if user exists and password is correct
        if ($user && password_verify($password, $user['password'])) {
            // Return success response
            return ['success' => true, 'message' => 'Login successful'];
        } else {
            // Return error response for invalid credentials
            return ['success' => false, 'message' => 'Invalid credentials'];
        }
    } catch (\PDOException $e) {
        // Return error response for database error
        return ['success' => false, 'message' => 'Database error: ' . $e->getMessage()];
    }
}

// Ensure POST data is received
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header("Content-Type: application/json");

    // Retrieve POST data and perform basic validation
    $id = $_POST['id'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($id) || empty($password)) {
        // Return error response for missing credentials
        echo json_encode(['success' => false, 'message' => 'ID and password are required']);
        exit();
    }

    // Create DatabaseConnection object
    $con = new DatabaseConnection();
    $pdo = $con->connect();

    // Call login function and return response
    $response = login($id, $password, $pdo);
    echo json_encode($response);
} else {
    // Handle unsupported HTTP methods
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method Not Allowed']);
}
?>