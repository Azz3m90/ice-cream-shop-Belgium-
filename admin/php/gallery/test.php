<?php
require_once '.././login/config/config.php';


$imageId = 1;

//if ($imageId !== null) {
// Fetch the image paths from the database
$mainImagePath = '';
$minifiedImagePath = '';

// Fetch main image path from gallery_images table
$sql = "SELECT path FROM gallery_images WHERE id = $imageId";
$result = $mysql_db->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $mainImagePath = $row['path'];
    // Convert relative paths to absolute URLs
    $mainImagePath = '../../.././assets/img/gallery/' . basename($mainImagePath);
}
echo $mainImagePath;
echo "<br>";
echo file_exists($mainImagePath);
echo "<br>";
// Fetch minified image path from minified_images table
$sql = "SELECT path FROM minified_images WHERE image_id = $imageId";
$result = $mysql_db->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $minifiedImagePath = $row['path'];
    $minifiedImagePath = '../../.././assets/img/gallery/min/' . basename($minifiedImagePath);
}
echo $minifiedImagePath;
echo "<br>";
echo file_exists($minifiedImagePath);
echo "<br>";
/*
    if (!empty($mainImagePath) && !empty($minifiedImagePath)) {
        // Delete entry from the minified_images table
        $deleteMinifiedSql = "DELETE FROM minified_images WHERE image_id = $imageId";
        if ($mysql_db->query($deleteMinifiedSql) === TRUE) {
            // Then delete image information from the gallery_images table
            $deleteSql = "DELETE FROM gallery_images WHERE id = $imageId";
            if ($mysql_db->query($deleteSql) === TRUE) {
                // Remove the main image file
                if (file_exists($mainImagePath) && unlink($mainImagePath)) {
                    // Remove the minified image file
                    if (file_exists($minifiedImagePath) && unlink($minifiedImagePath)) {
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
        echo json_encode(['status' => 'error', 'message' => 'Image paths not found']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Image ID not provided']);
}

*/