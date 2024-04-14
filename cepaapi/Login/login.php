<?php
require_once "../config/database.php"; // Include database connection script

// Ensure POST data is received
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header("Content-Type: application/json");

    // Retrieve POST data and perform basic validation
    $id = $_POST['id'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($id) || empty($password)) {
        echo json_encode(['success' => false, 'message' => 'ID and password are required']);
        exit();
    }

    // Perform login logic
    $stmt = $pdo->prepare("SELECT * FROM admin_login WHERE id = ?");
    $stmt->execute([$id]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        // User authentication successful
        echo json_encode(['success' => true, 'message' => 'Login successful']);
    } else {
        // User authentication failed
        echo json_encode(['success' => false, 'message' => 'Invalid credentials']);
    }
} else {
    // Handle unsupported HTTP methods
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method Not Allowed']);
}
?>
