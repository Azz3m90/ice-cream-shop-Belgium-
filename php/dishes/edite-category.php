<?php
// Include config file
require_once "../../../admin/php/login/config/config.php";

// Function to handle image upload
function handleImageUpload($categoryId, $uploadedImage)
{
    $targetDir = "../../../../admin/assets/img/dishes/categories/";
    $imageName = basename($uploadedImage["name"]);
    $targetFilePath = $targetDir . $imageName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    // Check if the image already exists in the target directory
    $counter = 1;
    while (file_exists($targetFilePath)) {
        $imageName = "newName_" . $counter . "." . $fileType;
        $targetFilePath = $targetDir . $imageName;
        $counter++;
    }

    // Move the uploaded file to the target directory
    if (move_uploaded_file($uploadedImage["tmp_name"], $targetFilePath)) {
        // Return the new image name
        return $imageName;
    } else {
        // Return an error or handle the failure accordingly
        return false;
    }
}

// Function to update category information in the database
function updateCategoryInDatabase($categoryId, $newCategoryName, $newImageName,$language_id)
{
    global $mysql_db;

    // Update category name and image in the database
    $updateCategoryQuery = "UPDATE categories_table SET categoryName = '$newCategoryName', CategoryImage = '$newImageName', language_id = '$language_id' WHERE categoryId = $categoryId";

    if ($mysql_db->query($updateCategoryQuery)) {
        return true;
    } else {
        return false;
    }
}

// Handle the POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the POST data
    $categoryId = $_POST['categoryId'];
    $newCategoryName = $_POST['newCategoryName'];
    $language_id = 2;

    // Handle image upload (if an image is provided)
    if (!empty($_FILES['newImage'])) {
        $newImageName = handleImageUpload($categoryId, $_FILES['newImage']);
        if (!$newImageName) {
            // Handle the error
            echo json_encode(['status' => 'error', 'message' => 'Failed to upload image.']);
            exit();
        }
    } else {
        $newImageName = null;
    }

    // Update category data in the database
    if (updateCategoryInDatabase($categoryId, $newCategoryName, $newImageName,$language_id)) {
        echo json_encode(['status' => 'success', 'message' => 'Category updated successfully.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to update category.']);
    }
} else {
    // Handle invalid requests
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Invalid request.']);
}
?>