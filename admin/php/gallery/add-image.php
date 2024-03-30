<?php
// Check if file is uploaded
if (!isset($_FILES['image'])) {
    echo json_encode(['error' => 'No file uploaded']);
    exit; // Terminate script execution
}

// Directory where original and resized images will be stored
$originalDirectory = '../../../../icecream/./assets/img/gallery';
$resizedDirectory = '../../../../icecream/./assets/img/gallery/thumbnails';

// Check if the directories exist, if not, create them
if (!is_dir($originalDirectory)) {
    if (!mkdir($originalDirectory, 0777, true)) {
        echo json_encode(['error' => 'Failed to create original image directory']);
        exit; // Terminate script execution
    }
}

if (!is_dir($resizedDirectory)) {
    if (!mkdir($resizedDirectory, 0777, true)) {
        echo json_encode(['error' => 'Failed to create resized image directory']);
        exit; // Terminate script execution
    }
}

// Get the uploaded file details
$fileTmpName = $_FILES['image']['tmp_name'];
$fileExtension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

// Generate a unique filename
$uniqueFilename = uniqid() . '.' . $fileExtension;

// Move the uploaded file to the original images directory with the unique filename
$destinationOriginal = $originalDirectory . '/' . $uniqueFilename;
if (!move_uploaded_file($fileTmpName, $destinationOriginal)) {
    echo json_encode(['error' => 'Error uploading original image']);
    exit; // Terminate script execution
}

// Resize the original image to 2048x1536
list($width, $height) = getimagesize($destinationOriginal);
$originalImage = imagecreatefromstring(file_get_contents($destinationOriginal));
$resizedImage = imagecreatetruecolor(2048, 1536);
imagecopyresampled($resizedImage, $originalImage, 0, 0, 0, 0, 2048, 1536, $width, $height);
$resizedFilename = 'resized_' . $uniqueFilename;
$destinationResized = $resizedDirectory . '/' . $resizedFilename;
imagejpeg($resizedImage, $destinationResized);
imagedestroy($originalImage);
imagedestroy($resizedImage);

// Create a thumbnail of size 123x92
$thumbnailImage = imagecreatetruecolor(123, 92);
imagecopyresampled($thumbnailImage, $originalImage, 0, 0, 0, 0, 123, 92, $width, $height);
$thumbnailFilename = 'thumbnail_' . $uniqueFilename;
$destinationThumbnail = $resizedDirectory . '/' . $thumbnailFilename;
imagejpeg($thumbnailImage, $destinationThumbnail);
imagedestroy($thumbnailImage);

echo json_encode([
    'success' => 'Image uploaded and resized successfully',
    'originalFilename' => $uniqueFilename,
    'resizedFilename' => $resizedFilename,
    'thumbnailFilename' => $thumbnailFilename
]);
