<?php
// Start sessions
session_start();

$_SESSION  = array();

// Destroy all session related to user
session_destroy();

// Redirect to login page
$baseUrl = 'https://gelatonaturale.be/';
$redirectUrl = $baseUrl . './gelatonaturale/admin/user-login.php';

header('Location: ' . $redirectUrl);

exit;