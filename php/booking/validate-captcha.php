<?php
session_start();

// Assume the CAPTCHA code is sent in the POST request
if (isset($_POST['captcha'])) {
    // Retrieve the entered CAPTCHA code
    $enteredCaptcha = strtolower($_POST['captcha']);

    // Retrieve the stored CAPTCHA code from the session
    $actualCaptcha = strtolower($_SESSION['captcha']);

    // Validate the CAPTCHA
    $isValid = ($enteredCaptcha === $actualCaptcha);

    // Return a JSON response indicating whether the CAPTCHA is valid
    header('Content-Type: application/json');

    // Ensure the JSON response has a consistent structure
    echo json_encode(['valid' => $isValid]);
} else {
    // If no CAPTCHA code is provided in the request
    header('Content-Type: application/json');
    echo json_encode(['valid' => false, 'error' => 'No CAPTCHA code provided']);
}
?>