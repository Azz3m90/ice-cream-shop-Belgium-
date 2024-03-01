<?php
// Assuming this is delete-dish.php
// Include config file
require_once "../../../admin/php/login/config/config.php";

// Function to delete a dish from the database and its associated image
function deleteDish($dishId, $categoryId)
{
    global $mysql_db;

    // Get the dish image path for deletion
    $getDishImagePathQuery = "SELECT image FROM plates_table WHERE plateId = '$dishId' AND category_id = '$categoryId'";
    $dishImageResult = $mysql_db->query($getDishImagePathQuery);

    if ($dishImageResult) {
        $dishImageRow = $dishImageResult->fetch_assoc();
        $dishImage = $dishImageRow['image'];

        // Delete the dish image
        deleteImage($dishImage);

        // Delete the dish from the database
        $deleteDishQuery = "DELETE FROM plates_table WHERE plateId = '$dishId' AND category_id = '$categoryId'";
        if ($mysql_db->query($deleteDishQuery)) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

// Function to delete an image from the server
function deleteImage($imagePath)
{
    if ($imagePath && file_exists($imagePath)) {
        unlink($imagePath);
    }
}

// Handle the POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the POST data
    $dishId = $_POST['plateId'];
    $categoryId = $_POST['categoryIdD'];

    // Delete the dish and its image
    if (deleteDish($dishId, $categoryId)) {
        echo json_encode(['status' => 'success', 'message' => 'Dish deleted successfully.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to delete dish. Dish not found.']);
    }
} else {
    // Handle invalid requests
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Invalid request.']);
}
?>
