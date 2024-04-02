<?php
require_once '.././login/config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if file is uploaded
    if (!isset($_FILES['image'])) {
        echo json_encode(['error' => 'No file uploaded']);
        exit; // Terminate script execution
    }

    // Directory where resized and minified images will be stored
    $resizedDirectory = '../../../assets/img/gallery/';
    $minifiedDirectory = '../../../assets/img/gallery/min/';

    // Check if directories exist, if not, create them
    if (!is_dir($resizedDirectory)) {
        mkdir($resizedDirectory, 0777, true);
    }
    if (!is_dir($minifiedDirectory)) {
        mkdir($minifiedDirectory, 0777, true);
    }

    // Get the uploaded file details
    $fileTmpName = $_FILES['image']['tmp_name'];
    $fileExtension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

    // Generate unique filenames
    $resizedFilename = time() . rand(1000, 9999) . '.' . $fileExtension;
    $minifiedFilename = time() . rand(1000, 9999) . '-min.' . $fileExtension;


    // Resize the original image to desired dimensions
    list($width, $height) = getimagesize($fileTmpName);
    $originalImage = imagecreatefromstring(file_get_contents($fileTmpName));

    // Create resized image
    $resizedImage = imagecreatetruecolor(2048, 1536);
    imagecopyresampled($resizedImage, $originalImage, 0, 0, 0, 0, 2048, 1536, $width, $height);
    $destinationResized = $resizedDirectory . $resizedFilename;
    imagejpeg($resizedImage, $destinationResized);
    imagedestroy($resizedImage);

    // Create minified image (you may adjust the desired dimensions)
    $minifiedImage = imagecreatetruecolor(123, 92);
    imagecopyresampled($minifiedImage, $originalImage, 0, 0, 0, 0, 123, 92, $width, $height);
    $destinationMinified = $minifiedDirectory . $minifiedFilename;
    imagejpeg($minifiedImage, $destinationMinified);
    imagedestroy($minifiedImage);

    // Free up memory
    imagedestroy($originalImage);
    // Modify paths to replace ../../../ with .././
    $destinationResized = str_replace('../../../', '.././', $destinationResized);
    $destinationMinified = str_replace('../../../', '.././', $destinationMinified);

    // Insert resized image path into the gallery_images table
    $insertResizedSql = "INSERT INTO gallery_images (path) VALUES ('$destinationResized')";
    if ($mysql_db->query($insertResizedSql) === TRUE) {
        // Get the auto-generated ID of the inserted row
        $resizedId = $mysql_db->insert_id;

        // Insert minified image path into the minified_images table with the resized image ID as foreign key
        $insertMinifiedSql = "INSERT INTO minified_images (image_id, path) VALUES ($resizedId, '$destinationMinified')";
        if ($mysql_db->query($insertMinifiedSql) === TRUE) {
            echo json_encode([
                'success' => 'Images uploaded and saved successfully',
                'resizedFilename' => $resizedFilename,
                'minifiedFilename' => $minifiedFilename
            ]);
        } else {
            // If insertion into minified_images table fails, delete the inserted row from gallery_images table
            $mysql_db->query("DELETE FROM gallery_images WHERE id = $resizedId");
            echo json_encode(['error' => 'Error inserting minified image path into database']);
        }
    } else {
        echo json_encode(['error' => 'Error inserting resized image path into database']);
    }
} else {
    echo json_encode(['error' => 'Method not allowed']);
}
