<?php
// Include config file
require_once "../../../admin/php/login/config/config.php";

// Function to delete a category and its items from the database
function deleteCategory($categoryId)
{
    global $mysql_db;

    // Begin a transaction to ensure data consistency
    $mysql_db->begin_transaction();

    try {
        // Get category image path for deletion
        $getCategoryImagePathQuery = "SELECT CategoryImage FROM categories WHERE id = '$categoryId'";
        $categoryImageResult = $mysql_db->query($getCategoryImagePathQuery);

        if ($categoryImageResult) {
            $categoryImageRow = $categoryImageResult->fetch_assoc();
            $categoryImage = $categoryImageRow['CategoryImage'];

            // Delete the category image
            deleteImage($categoryImage);

            // Delete dishes associated with the category and their images
            $deleteDishesQuery = "SELECT image FROM plates_table WHERE category_id = '$categoryId'";
            $dishesResult = $mysql_db->query($deleteDishesQuery);

            while ($dish = $dishesResult->fetch_assoc()) {
                $dishImage = $dish['image'];
                // Delete the dish image
                deleteImage($dishImage);
            }

            // Delete dishes associated with the category
            $deleteDishesQuery = "DELETE FROM plates_table WHERE category_id = '$categoryId'";
            if (!$mysql_db->query($deleteDishesQuery)) {
                throw new Exception("Error deleting dishes: " . $mysql_db->error);
            }

            // Delete the category itself
            $deleteCategoryQuery = "DELETE FROM categories WHERE id = '$categoryId'";
            if (!$mysql_db->query($deleteCategoryQuery)) {
                throw new Exception("Error deleting category: " . $mysql_db->error);
            }

            // Commit the transaction if all queries succeed
            $mysql_db->commit();

            return true;
        } else {
            throw new Exception("Error fetching category image path: " . $mysql_db->error);
        }
    } catch (Exception $e) {
        // Rollback the transaction if any query fails
        $mysql_db->rollback();
        return false;
    }
}

// Function to delete an image from the server
function deleteImage($imagePath)
{
    if (file_exists($imagePath)) {
        unlink($imagePath);
    }
}

// Handle the POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the POST data
    $categoryId = $_POST['categoryId'];

    // Delete the category and associated items
    $success = deleteCategory($categoryId);

    if ($success) {
        echo json_encode(['status' => 'success', 'message' => 'Category deleted successfully.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to delete category.']);
    }
} else {
    // Handle invalid requests
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Invalid request.']);
}
?>
