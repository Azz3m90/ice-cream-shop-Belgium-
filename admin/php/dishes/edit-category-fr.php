<?php
// Include config file
require_once "../../../admin/php/login/config/config.php";

// Function to insert a new category into the database
function insertCategoryIntoDatabase($newCategoryName, $id)
{
    global $mysql_db;

    // Use a default image path
    $categoryImage = '.././assets/img/matthiasandsea.jpg';

    // Insert a new category into the database
    $insertCategoryQuery = "UPDATE categories SET categoryName = '$newCategoryName', CategoryImage = '$categoryImage', language_id = 1  WHERE id = '$id'";

    if ($mysql_db->query($insertCategoryQuery)) {
        return true;
    } else {
        return false;
    }
}

// Handle the POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the POST data
    $newCategoryName = $_POST['newCategoryName'];
    $id = $_POST['categoryId'];

    // Insert new category data into the database
    if (insertCategoryIntoDatabase($newCategoryName, $id)) {
        echo json_encode(['status' => 'success', 'message' => 'Category inserted successfully.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to insert category.']);
    }
} else {
    // Handle invalid requests
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Invalid request.']);
}
?>