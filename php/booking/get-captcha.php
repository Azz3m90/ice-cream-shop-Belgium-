<?php
session_start();

header('Content-Type: application/json');

// Check if captcha is set in session
if (isset($_SESSION['captcha'])) {
    echo json_encode(['captcha' => $_SESSION['captcha']]);
} else {
    echo json_encode(['captcha' => null]);
}
?>