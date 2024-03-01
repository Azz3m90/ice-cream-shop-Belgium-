<?php

// Check if it's a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Specify the target directory for uploaded images
    $targetDirectory = '../../../matthias-and-sea-2023/assets/img/gallery/';

    // Specify the path to the JSON file
    $jsonFilePath = '../../../matthias-and-sea-2023/data/gallery.json';

    // Retrieve the uploaded files
    $uploadedFiles = $_FILES['addImageCategoryimage'];

    // Load existing JSON data
    $jsonData = json_decode(file_get_contents($jsonFilePath), true);

    // Get the last image ID from the existing data
    $lastImageId = !empty($jsonData['galleryImages']) ? end($jsonData['galleryImages'])['id'] : 0;

    // Set the initial ID for the new images
    $newImageId = $lastImageId + 1;

    // Array to store information about the uploaded images
    $uploadedImageInfo = [];

    // Process each uploaded file
    foreach ($uploadedFiles['name'] as $index => $fileName) {
        $fileTmpName = $uploadedFiles['tmp_name'][$index];

        // Generate a unique ID for each image
        $imageId = $newImageId++;

        // Construct the target path for the uploaded file
        $targetPath = $targetDirectory . $fileName;

        // Handle cases where an image with the same name already exists
        $counter = 1;
        $info = pathinfo($fileName);
        while (file_exists($targetPath)) {
            $fileName = $info['filename'] . '_' . $counter++ . '.' . $info['extension'];
            $targetPath = $targetDirectory . $fileName;
        }

        // Move the uploaded file to the target directory
        move_uploaded_file($fileTmpName, $targetPath);

        // Record information about the uploaded image
        $uploadedImageInfo[] = [
            'id'   => $imageId,
            'path' => $fileName
        ];
    }

    // Add the uploaded image information to the JSON data
    $jsonData['galleryImages'] = array_merge($jsonData['galleryImages'], $uploadedImageInfo);

    // Save the updated JSON data to the file
    file_put_contents($jsonFilePath, json_encode($jsonData, JSON_PRETTY_PRINT));

    // Respond with a success message or any additional information needed
    echo json_encode(['success' => true, 'message' => 'Images uploaded successfully.']);
} else {
    // Respond with an error message for non-POST requests
    echo json_encode(['error' => true, 'message' => 'Invalid request method.']);
}

?>