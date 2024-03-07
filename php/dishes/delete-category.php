<?php
// Assuming this is delete-category.php

// Function to delete a category and its items from JSON data
function deleteCategory($categoryId) {
    // Load existing JSON data
    $jsonData = json_decode(file_get_contents('../../../matthias-and-sea-2023/data/menu_en.json'), true);

    // Find the category in the JSON data
    foreach ($jsonData['menu'] as $categoryKey => $category) {
        if ($category['categoryId'] == $categoryId) {
            // Get the category image for later deletion
            $categoryImage = $category['CategoryImage'];
            $imagePath = '../../../matthias-and-sea-2023/assets/img/dishes/categories/' . basename($categoryImage);

            // Delete the image from the server
            deleteImage($imagePath);

            // Get all item images for later deletion
            $itemImages = array_column($category['items'], 'image');

            // Remove the category from the array
            array_splice($jsonData['menu'], $categoryKey, 1);

            // Save the updated JSON data
            file_put_contents('../../../matthias-and-sea-2023/data/menu_en.json', json_encode($jsonData, JSON_PRETTY_PRINT));

            // Return the list of images for deletion
            return array_merge([$categoryImage], $itemImages);
        }
    }

    // Category not found
    return false;
}

// Function to delete an image from the server
function deleteImage($imagePath) {
    if (file_exists($imagePath)) {
        unlink($imagePath);
    }
}

// Handle the POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the POST data
    $categoryId = $_POST['categoryId'];

    // Delete the category and get images
    $imagesToDelete = deleteCategory($categoryId);

    if ($imagesToDelete !== false) {
        // Perform additional actions if needed, e.g., delete images from the server
        foreach ($imagesToDelete as $image) {
            // Construct the server path for the image
            $imagePath = '../../../matthias-and-sea-2023/assets/img/dishes/' . basename($image);

            // Delete the image from the server
            deleteImage($imagePath);
        }

        echo json_encode(['status' => 'success', 'message' => 'Category deleted successfully.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to delete category. Category not found.']);
    }
} else {
    // Handle invalid requests
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Invalid request.']);
}
?>