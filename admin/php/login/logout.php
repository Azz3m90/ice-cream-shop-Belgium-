<?php
// Start sessions
session_start();

$_SESSION  = array();

// Destroy all session related to user
session_destroy();

// Redirect to login page
$baseUrl = 'https://www.matthiasandsea.be/';
$redirectUrl = $baseUrl . './matthias-and-sea/admin/user-login.php';

header('Location: ' . $redirectUrl);

exit;