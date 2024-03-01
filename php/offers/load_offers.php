<?php
// Load offers from a JSON file
$offersJson = file_get_contents('../../data/offers.json');
//die($offersJson);
// Parse the JSON data and return as an array
$offers = json_decode($offersJson, true);

// Respond with the offers as a JSON response
header('Content-Type: application/json');
echo json_encode($offers);
?>