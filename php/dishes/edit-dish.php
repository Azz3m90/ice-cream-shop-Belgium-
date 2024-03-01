<?php
// Assuming this is edit-dish.php
// Include config file
require_once "../../../admin/php/login/config/config.php";

// Function to handle image upload
function handleImageUpload($dishId, $categoryId, $categoryName, $uploadedImage) {
    // Define the base directory for dish images
    $baseDir = "../../../matthias-and-sea/admin/assets/img/dishes/";

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
    var_dump($targetFilePath);
    // Move the uploaded file to the target directory
    if (move_uploaded_file($uploadedImage["tmp_name"], $targetFilePath)) {
        // Return the new image name
        return $imageName;
    } else {
        // Return an error message
        return "Upload failed: " . $_FILES["imageDish"]["error"];
    }
}

// Function to convert a string to camel case
function camelCase($str) {
    $str = ucwords(strtolower($str));
    $str = str_replace(' ', '', $str);
    $str = lcfirst($str);
    return $str;
}

// Function to update dish information in the database
function updateDishInDatabase($dishId, $categoryId, $newTitle, $newDescription, $newPrice, $newImageName) {
    global $mysql_db;

    $updateDishQuery = "UPDATE plates_table 
                        SET itemName = '$newTitle', 
                            description = '$newDescription', 
                            price = '$newPrice', 
                            image = '$newImageName'
                        WHERE plateId = '$dishId' AND category_id = '$categoryId'";

    return $mysql_db->query($updateDishQuery);
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
        $uploadResult = handleImageUpload($dishId, $categoryId, $categoryName, $_FILES['imageDish']);
        if (is_string($uploadResult)) {
            // Handle the error
            echo json_encode(['status' => 'error', 'message' => $uploadResult]);
            exit();
        } else {
            $newImageName = $uploadResult;
        }
    } else {
        $newImageName = null;
    }

    // Update dish information in the database
    if (updateDishInDatabase($dishId, $categoryId, $newTitle, $newDescription, $newPrice, $newImageName)) {
        echo json_encode(['status' => 'success', 'message' => 'Dish updated successfully.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to update dish in the database.']);
    }
} else {
    // Handle invalid requests
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Invalid request.']);
}
?>
