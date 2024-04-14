<?php
/**
 * API Endpoint Router
 *
 * This PHP script serves as a simple API endpoint router, handling GET and POST requests for specific resources,
 * including login functionality.
 *
 * Usage:
 * 1. Include this script in your project.
 * 2. Define resource-specific logic in separate PHP files.
 * 3. Send requests to the appropriate endpoints defined in the 'switch' cases below.
 *
 * Example Usage:
 * - API_URL: http://localhost/api
 * - POST request for login: API_URL/login (with JSON data in the request body)
 */

require_once "./database.php"; // Include the database connection logic
require_once "./login.php";    // Include the login functionality

// Initialize DatabaseConnection object
$con = new DatabaseConnection();
$pdo = $con->connect();

// Initialize Login object
$login = new $Login($pdo);

// Check if 'request' parameter is set in the request
if(isset($_REQUEST['request'])){
    // Split the request into an array based on '/'
    $request = explode('/', $_REQUEST['request']);
}
else{
    // If 'request' parameter is not set, return a 404 response
    echo "Not Found";
    http_response_code(404);
    exit(); // Terminate script execution
}

// Handle requests based on HTTP method
switch($_SERVER['REQUEST_METHOD']){
    // Handle POST requests    
    case 'POST':
        // Retrieves JSON-decoded data from php://input using file_get_contents
        $data = json_decode(file_get_contents("php://input"));
        switch($request[0]){
            case 'login':
                // Return JSON-encoded data for login
                echo json_encode($login->login($data)); // Call login method from Login object
                break;
            
            default:
                // Return a 403 response for unsupported requests
                echo "This is forbidden";
                http_response_code(403);
                break;
        }
        break;
    default:
        // Return a 404 response for unsupported HTTP methods
        echo "Method not available";
        http_response_code(404);
        break;
}
?>
