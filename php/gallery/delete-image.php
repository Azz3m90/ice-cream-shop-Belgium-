<?php
// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the image ID from the POST data
    $imageId = isset($_POST['id']) ? $_POST['id'] : null;

    if ($imageId !== null) {
        // Load the JSON file
        $jsonFilePath = '../../data/gallery.json';
        $jsonData = json_decode(file_get_contents($jsonFilePath), true);

        // Find the index of the image in the array
        $imageIndex = array_search($imageId, array_column($jsonData['galleryImages'], 'id'));

        if ($imageIndex !== false) {
            // Get the file path and remove the image file
            $imagePath = $jsonData['galleryImages'][$imageIndex]['path'];
            $imageDir = '../../../matthias-and-sea-2023/assets/img/gallery/';
            $imageFilePath = $imageDir . $imagePath;

            if (file_exists($imageFilePath)) {
                unlink($imageFilePath); // Remove the image file
            }

            // Remove the image entry from the JSON data
            array_splice($jsonData['galleryImages'], $imageIndex, 1);

            // Save the updated JSON data
            file_put_contents($jsonFilePath, json_encode($jsonData, JSON_PRETTY_PRINT));

            // Respond with a success message
            echo json_encode(['status' => 'success', 'message' => 'Image deleted successfully','deletedImageId' => $imageId]);
        } else {
            // Respond with an error message if the image is not found
            echo json_encode(['status' => 'error', 'message' => 'Image not found']);
        }
    } else {
        // Respond with an error message if the image ID is not provided
        echo json_encode(['status' => 'error', 'message' => 'Image ID not provided']);
    }
} else {
    // Respond with an error message if the request method is not POST
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}
?>