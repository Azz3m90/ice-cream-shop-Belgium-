<?php
// Assuming this is edit-dish.php
// Include config file
require_once "../../../admin/php/login/config/config.php";

// Function to update MySQL data
function updateMySQLData($dishId, $newTitle, $newDescription, $newPrice) {
    global $mysql_db;

    // Use a default image path
    $defaultImagePath = '.././assets/img/matthiasandsea.jpg';

    // Update dish data in the database
    $updateQuery = "UPDATE plates_table SET
                    itemName = '$newTitle',
                    description = '$newDescription',
                    price = '$newPrice',
                    image = '$defaultImagePath'
                    WHERE plateId = $dishId AND language_id=1";

    return $mysql_db->query($updateQuery);
}

// Handle the POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the POST data
    $dishId = $_POST['dishId'];
    $newTitle = $_POST['DishTitle'];
    $newDescription = $_POST['DishDescription'];
    $newPrice = $_POST['DishPrice'];

    // Update MySQL data
    if (updateMySQLData($dishId, $newTitle, $newDescription, $newPrice)) {
        echo json_encode(['status' => 'success', 'message' => 'Dish updated successfully.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to update dish.']);
    }
} else {
    // Handle invalid requests
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Invalid request.']);
}
?>