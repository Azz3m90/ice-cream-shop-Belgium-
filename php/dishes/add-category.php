<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the POST data
    $categoryId = $_POST['categoryId'];
    $categoryName = $_POST['categoryName'];
    $categoryImage = $_FILES['categoryImage'];

    // Validate and sanitize data as needed

    // Set the path to the JSON file
    $jsonFilePath = '../../data/menu_en.json';

    // Check if the JSON file exists, if not, create the directory and file
    if (!file_exists($jsonFilePath)) {
        // Create the data directory if not exists
        if (!is_dir('../../data')) {
            mkdir('../../data');
        }

        // Create the JSON file with initial structure
        $initialData = [
            "restaurantName" => "MATTHIAS AND SEA",
            "menu" => []
        ];

        file_put_contents($jsonFilePath, json_encode($initialData, JSON_PRETTY_PRINT));
    }

    // Load existing JSON data
    $jsonData = json_decode(file_get_contents($jsonFilePath), true);

    // Check if the category ID already exists
    if (categoryExists($jsonData, $categoryId)) {
        http_response_code(400);
        echo json_encode(['status' => 'error', 'message' => 'Category ID already exists.']);
        exit;
    }

    // Check if the category name already exists
    if (categoryNameExists($jsonData, $categoryName)) {
        http_response_code(400);
        echo json_encode(['status' => 'error', 'message' => 'Category name already exists.']);
        exit;
    }

    // Save the image to the specified directory
    $targetDirectory = '../../../matthias-and-sea-2023/assets/img/dishes/categories/';
    $targetFile = $targetDirectory . basename($categoryImage['name']);

    // Check if the file already exists, rename it if necessary
    $counter = 1;
    $originalFileName = pathinfo($targetFile, PATHINFO_FILENAME);
    $extension = pathinfo($targetFile, PATHINFO_EXTENSION);

    while (file_exists($targetFile)) {
        $targetFile = $targetDirectory . $originalFileName . '_' . $counter . '.' . $extension;
        $counter++;
    }

    // Move the uploaded file to the target directory
    if (move_uploaded_file($categoryImage['tmp_name'], $targetFile)) {
        // Add the new category to the JSON data
        $newCategory = [
            'categoryId' => $categoryId,
            'categoryName' => $categoryName,
            'CategoryImage' => $targetFile,
            'items' => []  // You may need to modify this based on your data structure
        ];

        $jsonData['menu'][] = $newCategory;

        // Save the updated JSON data
        file_put_contents($jsonFilePath, json_encode($jsonData, JSON_PRETTY_PRINT));

        // Send a success response
        echo json_encode(['status' => 'success', 'message' => 'Category added successfully.']);
    } else {
        // Error in uploading image
        http_response_code(500);
        echo json_encode(['status' => 'error', 'message' => 'Failed to upload image.']);
    }

} else {
    // Handle invalid requests
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Invalid request.']);
}

// Function to check if a category with a given ID already exists
function categoryExists($jsonData, $categoryId) {
    foreach ($jsonData['menu'] as $category) {
        if ($category['categoryId'] == $categoryId) {
            return true;
        }
    }
    return false;
}

// Function to check if a category with a given name already exists
function categoryNameExists($jsonData, $categoryName) {
    foreach ($jsonData['menu'] as $category) {
        if ($category['categoryName'] == $categoryName) {
            return true;
        }
    }
    return false;
}
?>