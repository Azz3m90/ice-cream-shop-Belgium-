<?php
// Directory where images are stored
$imageDirectory = '../../../../icecream/./assets/img/gallery';

// Check if the directory exists
if (!is_dir($imageDirectory)) {
    echo json_encode(['error' => 'Image directory not found']);
    exit; // Terminate script execution
}

// Scan the directory for image files
$imageFiles = scandir($imageDirectory);

// Check if scandir() returned false, indicating an error
if ($imageFiles === false) {
    echo json_encode(['error' => 'Error reading directory']);
    exit; // Terminate script execution
}

// Filter out '.' and '..' from the list of files
$imageFiles = array_diff($imageFiles, ['.', '..']);

// Construct an array of image paths
$galleryImages = [];
foreach ($imageFiles as $file) {
    // Construct the full path to the image
    $imagePath = $imageDirectory . '/' . $file;

    // Add the image path to the array
    $galleryImages[] = ['path' => $imagePath];
}

// Respond with the gallery images in JSON format
echo json_encode(['galleryImages' => $galleryImages]);