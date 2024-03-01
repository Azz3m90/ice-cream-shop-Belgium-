<?php
// Include config file
require_once "../../../admin/php/login/config/config.php";

// Check if the request is a POST request
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get form data
    $categoryId = $_POST['categoryId'];
    $dishName = $_POST['addDishCategoryName'];
    $dishPrice = $_POST['addDishPrice'];
    $dishDescription = $_POST['addDishDescription'];
    $categoryName = $_POST['categoryName'];

    // Use a default image path
    $imagePath = '.././assets/img/matthiasandsea.jpg';

    // Check if the dish with the same name already exists in the category
    if (!isDishNameUniqueInCategory($categoryId, $dishName)) {
        echo json_encode(['status' => 'error', 'message' => 'Dish with the same name already exists']);
        exit;
    }

    $language_id = 1;
    // Insert dish information into the database
    $insertDishQuery = "INSERT INTO plates_table (itemName, description, price, image, category_id,language_id)
                      VALUES ('$dishName', '$dishDescription', '$dishPrice', '$imagePath', '$categoryId','$language_id')";

    if ($mysql_db->query($insertDishQuery)) {
        // Respond with success message
        echo json_encode(['status' => 'success', 'message' => 'Dish added successfully']);
    } else {
        // Respond with an error if the query fails
        echo json_encode(['status' => 'error', 'message' => 'Failed to add dish to the database.']);
    }
} else {
    // Respond with an error if the request method is not POST
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}

// Function to check if a dish name is unique within a category
function isDishNameUniqueInCategory($categoryId, $dishName)
{
    global $mysql_db;

    $checkDuplicateQuery = "SELECT * FROM plates_table WHERE itemName = '$dishName' AND category_id = '$categoryId'";
    $result = $mysql_db->query($checkDuplicateQuery);

    return $result->num_rows === 0; // Dish name is unique if no rows are returned
}
?>