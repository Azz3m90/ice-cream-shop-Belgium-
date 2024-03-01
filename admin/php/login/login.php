<?php


// Check if the user is already logged in
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    // Send a JSON response indicating that the user is already logged in
    echo json_encode(['status' => 'error', 'message' => 'User is already logged in']);
    exit;
}

// Include config file

require_once "./config/config.php";

// Initialize sessions
session_start();
// Define variables and initialize with empty values
$username = $password = '';
$username_err = $password_err = '';

// Process submitted form data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and sanitize the submitted form data
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Validate credentials
    if (empty($username) || empty($password)) {
        // Send a JSON response indicating empty username or password
        echo json_encode(['status' => 'error', 'message' => 'Username and password are required']);
        exit;
    }

    // Prepare a select statement
    $sql = 'SELECT id, username, password FROM users WHERE username = ?';

    if ($stmt = $mysql_db->prepare($sql)) {
        // Set parameter
        $stmt->bind_param('s', $username);

        // Attempt to execute
        if ($stmt->execute()) {
            // Store result
            $stmt->store_result();

            // Check if username exists and verify the password
            if ($stmt->num_rows == 1) {
                $stmt->bind_result($id, $username, $hashed_password);
                if ($stmt->fetch() && password_verify($password, $hashed_password)) {
                    // Start a new session
                   // session_start();

                    // Store data in sessions
                    $_SESSION['loggedin'] = true;
                    $_SESSION['id'] = $id;
                    $_SESSION['username'] = $username;

                    // Send a JSON response indicating success
                    echo json_encode(['status' => 'success', 'message' => 'Login successful', 'redirect' => './admin_panel.php']);
                } else {
                    // Send a JSON response indicating incorrect password
                    echo json_encode(['status' => 'error', 'message' => 'Invalid password']);
                }
            } else {
                // Send a JSON response indicating username does not exist
                echo json_encode(['status' => 'error', 'message' => 'Username does not exist']);
            }

            // Close statement
            $stmt->close();
        } else {
            // Send a JSON response indicating execution error
            echo json_encode(['status' => 'error', 'message' => 'Oops! Something went wrong. Please try again.']);
        }
    } else {
        // Send a JSON response indicating preparation error
        echo json_encode(['status' => 'error', 'message' => 'Oops! Something went wrong. Please try again.']);
    }

    // Close connection
    $mysql_db->close();
}
?>