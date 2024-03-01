<?php
// Include config file
require_once "../../../admin/php/login/config/config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the POST data
    $categoryId = $_POST['categoryId'];
    $categoryName = $_POST['categoryName'];
    $categoryImage = '.././assets/img/matthiasandsea.jpg';
    $languageId = 2; // Assuming language_id is always 2

    // Validate and sanitize data as needed

    // Insert the new category into the database
    $insertCategoryQuery = "INSERT INTO categories (categoryName, CategoryImage, language_id) VALUES ('$categoryName', '$categoryImage', '$languageId')";
    $insertCategoryResult = $mysql_db->query($insertCategoryQuery);

    if ($insertCategoryResult) {
        // Send a success response
        echo json_encode(['status' => 'success', 'message' => 'Category added successfully.']);
    } else {
        // Error in inserting category into the database
        http_response_code(500);
        echo json_encode(['status' => 'error', 'message' => 'Failed to add category to the database.']);
    }
} else {
    // Handle invalid requests
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Invalid request.']);
}
?>