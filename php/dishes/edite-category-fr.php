<?php
// Assuming this is editCategory.php

// Function to handle image upload
function handleImageUpload($categoryId, $uploadedImage) {
    $targetDir = "../../../matthias-and-sea-2023/assets/img/dishes/categories/";
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

// Function to update JSON data
function updateJsonData($categoryId, $newCategoryName, $newImageName) {
    // Load existing JSON data
    $jsonData = json_decode(file_get_contents('../../data/menu.json'), true);

    // Find the category in the JSON data
    foreach ($jsonData['menu'] as &$category) {
        if ($category['categoryId'] == $categoryId) {
            $targetDir = "http://127.0.0.1/matthias-and-sea-2023/assets/img/dishes/categories/";
            // Update category name and image
            $category['categoryName'] = $newCategoryName;
            $category['CategoryImage'] = $targetDir.$newImageName;
            break;
        }
    }

    // Save the updated JSON data
    file_put_contents('../../data/menu.json', json_encode($jsonData, JSON_PRETTY_PRINT));

    // Return success or an appropriate response
    return true;
}

// Handle the POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the POST data
    $categoryId = $_POST['categoryId'];
    $newCategoryName = $_POST['newCategoryName'];

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

    // Update JSON data
    if (updateJsonData($categoryId, $newCategoryName, $newImageName)) {
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