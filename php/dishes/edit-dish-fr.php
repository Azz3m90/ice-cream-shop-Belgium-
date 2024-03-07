<?php
// Assuming this is edit-dish.php

// Function to handle image upload
function handleImageUpload($dishId, $categoryId, $categoryName,$uploadedImage) {
    // Define the base directory for dish images
    $baseDir = "../../../matthias-and-sea-2023/assets/img/dishes/";

    // Create a folder for the category if it doesn't exist
    $categoryDir = $baseDir . $categoryId . "_" . camelCase($categoryName) . "/";
    if (!file_exists($categoryDir)) {
        mkdir($categoryDir, 0777, true);
    }


    $imageName = basename($uploadedImage["name"]);
    $targetFilePath = $categoryDir . $imageName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    // Check if the image already exists in the target directory
    $counter = 1;
    while (file_exists($targetFilePath)) {
        $imageName = "newName_" . $counter . "." . $fileType;
        $targetFilePath = $categoryDir . $imageName;
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

// Function to convert a string to camel case
function camelCase($str) {
    $str = ucwords(strtolower($str));
    $str = str_replace(' ', '', $str);
    $str = lcfirst($str);
    return $str;
}
// Function to update JSON data
function updateJsonData($dishId, $categoryId,$categoryName, $newTitle, $newDescription, $newPrice, $newImageName) {
    // Load existing JSON data
    $jsonData = json_decode(file_get_contents('../../../matthias-and-sea-2023/data/menu.json'), true);

    // Find the dish in the JSON data
    foreach ($jsonData['menu'] as &$category) {
        if ($category['categoryId'] == $categoryId) {
            foreach ($category['items'] as &$dish) {
                if ($dish['plateId'] == $dishId) {
                    // Update dish data
                    $dish['itemName'] = $newTitle;
                    $dish['description'] = $newDescription;
                    $dish['price'] = $newPrice;
                      // Define the base directory for dish images
                    $baseDir = "../../../matthias-and-sea-2023/assets/img/dishes/";

                    // Create a folder for the category if it doesn't exist
                    $categoryDir = $baseDir . $categoryId . "_" . camelCase($categoryName) . "/";
                    // Assign the directory path to the "image" field
                    $dish['image'] = $categoryDir .$newImageName;

                    break;
                }
            }
            break;
        }
    }

    // Save the updated JSON data
    file_put_contents('../../../matthias-and-sea-2023/data/menu.json', json_encode($jsonData, JSON_PRETTY_PRINT));

    // Return success or an appropriate response
    return true;
}


// Handle the POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the POST data
    $dishId = $_POST['dishId'];
    $categoryId = $_POST['categoryIdD'];
    $newTitle = $_POST['DishTitle'];
    $newDescription = $_POST['DishDescription'];
    $newPrice = $_POST['DishPrice'];
    $categoryName = $_POST['categoryName'];

    // Handle image upload (if an image is provided)
    if (!empty($_FILES['imageDish'])) {
        $newImageName = handleImageUpload($dishId, $categoryId,$categoryName, $_FILES['imageDish']);
        if (!$newImageName) {
            // Handle the error
            echo json_encode(['status' => 'error', 'message' => 'Failed to upload image.']);
            exit();
        }
    } else {
        $newImageName = null;
    }

    // Update JSON data
    if (updateJsonData($dishId, $categoryId,$categoryName ,$newTitle, $newDescription, $newPrice, $newImageName)) {
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
