<?php
require_once '.././login/config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $imageId = isset($_POST['id']) ? $_POST['id'] : null;

    if ($imageId !== null) {
        // Delete entry from the minified_images table first
        $deleteMinifiedSql = "DELETE FROM minified_images WHERE image_id = $imageId";
        if ($mysql_db->query($deleteMinifiedSql) === TRUE) {
            // Then delete image information from the gallery_images table
            $deleteSql = "DELETE FROM gallery_images WHERE id = $imageId";
            if ($mysql_db->query($deleteSql) === TRUE) {
                // Remove the main image file
                $mainImagePath = fetchImagePath($imageId, '../../assets/img/gallery/');
                if ($mainImagePath && file_exists($mainImagePath) && unlink($mainImagePath)) {
                    // Remove the minified image file
                    $minifiedImagePath = fetchImagePath($imageId, '../../assets/img/gallery/min/');
                    if ($minifiedImagePath && file_exists($minifiedImagePath) && unlink($minifiedImagePath)) {
                        echo json_encode(['status' => 'success', 'message' => 'Image and minified image deleted successfully', 'deletedImageId' => $imageId]);
                    } else {
                        echo json_encode(['status' => 'error', 'message' => 'Error deleting minified image file']);
                    }
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'Error deleting main image file']);
                }
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Error deleting image from database']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error deleting entry from minified_images table']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Image ID not provided']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}

// Function to fetch image path based on image ID and directory
function fetchImagePath($imageId, $directory)
{
    global $mysql_db;
    $sql = "SELECT path FROM gallery_images WHERE id = $imageId";
    $result = $mysql_db->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $directory . basename($row['path']);
    }
    return null;
}
