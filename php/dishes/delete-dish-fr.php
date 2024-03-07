<?php
// Assuming this is delete-dish.php

// Function to delete a dish from JSON data and its associated image
function deleteDish($dishId, $categoryId) {
    // Load existing JSON data
    $jsonData = json_decode(file_get_contents('../../../matthias-and-sea-2023/data/menu.json'), true);

    // Find the dish in the JSON data
    foreach ($jsonData['menu'] as $categoryKey => &$category) {
        if ($category['categoryId'] == $categoryId) {
            foreach ($category['items'] as $dishKey => $dish) {
                if ($dish['plateId'] == $dishId) {
                    // Get the image URL associated with the dish
                    $dishImage = $dish['image'];

                    // Convert image URL to local path
                    $imagePath = convertImageUrlToLocalPath($dishImage);


                    array_splice($jsonData['menu'][$categoryKey]['items'], $dishKey, 1);

                    // Delete the associated image file
                    if ($imagePath && file_exists($imagePath)) {
                      echo "file found";
                        unlink($imagePath); // Delete the image file
                       // Remove the dish from the array

                    }

                    // Save the updated JSON data
                   file_put_contents('../../../matthias-and-sea-2023/data/menu.json',   json_encode($jsonData, JSON_PRETTY_PRINT));

                    // Return success or an appropriate response
                    return true;
                }
            }
        }
    }

    // Dish not found
    return false;
}

// Function to convert image URL to local path
function convertImageUrlToLocalPath($imageUrl) {
    // Assuming your images are stored in the 'assets' directory
    $basePath = '../../..';

    // Extract the relative path from the URL
    $relativePath = parse_url($imageUrl, PHP_URL_PATH);

    // Combine the base path and relative path
    $localPath = $basePath . $relativePath;

    return $localPath;
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
