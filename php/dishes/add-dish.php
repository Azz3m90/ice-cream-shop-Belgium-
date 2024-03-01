<?php
// Check if the request is a POST request
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get form data
    $categoryId = $_POST['categoryId'];
    $categoryName = $_POST['categoryName'];
    $dishName =  $_POST['addDishCategoryName'];
    $dishPrice = $_POST['addDishPrice'];
    $dishDescription = $_POST['addDishDescription'];

    // File upload handling
    $uploadDir = '../../../matthias-and-sea-2023/assets/img/dishes/';
    $categoryDir = $uploadDir . $categoryId . '_' . camelCase($categoryName) . '/';
    $imageFileName = '';

    // Create category directory if it doesn't exist
    if (!file_exists($categoryDir)) {
        mkdir($categoryDir, 0777, true);
    }

    if (isset($_FILES['dishImage'])) {
        $imageFile = $_FILES['dishImage'];
        $imageFileName = basename($imageFile['name']);

        // Rename the image file if a file with the same name already exists
        $counter = 1;
        while (file_exists($categoryDir . $imageFileName)) {
            $info = pathinfo($imageFileName);
            $imageFileName = $info['filename'] . '_' . $counter . '.' . $info['extension'];
            $counter++;
        }

        $imagePath = $categoryDir . $imageFileName;

        // Move the uploaded file to the specified directory
        move_uploaded_file($imageFile['tmp_name'], $imagePath);
    }

    // Load existing JSON data or create an empty array
    $jsonFilePath =  '../../data/menu_en.json';
    $jsonData = [];

    if (file_exists($jsonFilePath)) {
        $jsonContent = file_get_contents($jsonFilePath);
        $jsonData = json_decode($jsonContent, true);
    }

    // Find the category by categoryId
    $categoryIndex = findCategoryIndex($jsonData, $categoryId);

    // Check if the dish with the same name already exists in the category
    if (!isDishNameUnique($jsonData, $categoryId, $dishName)) {
        echo json_encode(['status' => 'error', 'message' => 'Dish with the same name already exists']);
        exit;
    }

    // Generate a unique plateId (assuming each dish has a unique ID)
    $uniquePlateId = generateUniquePlateId($jsonData);

    // Create a new dish entry
    $newDish = [
        'plateId' => $uniquePlateId,
        'itemName' => $dishName,
        'price' =>  number_format($dishPrice, 2, '.', ',') . ' €',
        'description' => $dishDescription,
        'image' => $imageFileName ? '../../../matthias-and-sea-2023/assets/img/dishes/' . $categoryId . '_' . camelCase($categoryName) . '/' . $imageFileName : '',
    ];

    // Add the new dish to the menu
    $jsonData['menu'][$categoryIndex]['items'][] = $newDish;

    // Save the updated JSON data back to the file
    file_put_contents($jsonFilePath, json_encode($jsonData, JSON_PRETTY_PRINT));

    // Respond with success message
    echo json_encode(['status' => 'success', 'message' => 'Dish added successfully']);
} else {
    // Respond with an error if the request method is not POST
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}

// Function to generate a unique plateId
function generateUniquePlateId($jsonData)
{
    $maxPlateId = 0;

    foreach ($jsonData['menu'] as $category) {
        foreach ($category['items'] as $dish) {
            $maxPlateId = max($maxPlateId, $dish['plateId']);
        }
    }

    return $maxPlateId + 1;
}

// Function to find the index of a category in the JSON data by categoryId
function findCategoryIndex($jsonData, $categoryId)
{
    foreach ($jsonData['menu'] as $index => $category) {
        if ($category['categoryId'] == $categoryId) {
            return $index;
        }
    }

    return -1; // Category not found
}

// Function to check if a dish name is unique within a category
function isDishNameUnique($jsonData, $categoryId, $dishName)
{
    foreach ($jsonData['menu'] as $category) {
        if ($category['categoryId'] == $categoryId) {
            foreach ($category['items'] as $dish) {
                if ($dish['itemName'] == $dishName) {
                    return false; // Dish with the same name already exists
                }
            }
        }
    }

    return true; // Dish name is unique
}

// Function to convert string to camelCase
function camelCase($input)
{
    return lcfirst(str_replace(' ', '', ucwords(str_replace(['_', '-'], ' ', $input))));
}
?>