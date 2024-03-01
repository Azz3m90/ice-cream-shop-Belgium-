<?php
require_once '.././login/config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $imageId = isset($_POST['id']) ? $_POST['id'] : null;
    $restaurant_id = isset($_POST['restaurant_id']) ? $_POST['restaurant_id'] : null;

    if ($imageId !== null) {
        // Select the image path from the database
        $sql = "SELECT path FROM gallery_images WHERE id = $imageId";
        $result = $mysql_db->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $imagePath = $row['path'];

            // Delete image information from the database

            $sql = "DELETE FROM gallery_images WHERE id = $imageId AND restaurant_id = $restaurant_id";
            $mysql_db->query($sql);

            // Remove the image file
            $targetDirectory = '../../assets/img/gallery/'; // Corrected path
            $imageFilePath = $targetDirectory . basename($imagePath);
            //var_dump($imageFilePath);

            if (file_exists($imageFilePath)) {
                unlink($imageFilePath);
                echo json_encode(['status' => 'success', 'message' => 'Image deleted successfully', 'deletedImageId' => $imageId]);
            } else {
                // Respond with an error if the image file does not exist
                echo json_encode(['status' => 'error', 'message' => 'Image file not found']);
            }
        } else {
            // Respond with an error if the image is not found in the database
            echo json_encode(['status' => 'error', 'message' => 'Image not found in the database']);
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
