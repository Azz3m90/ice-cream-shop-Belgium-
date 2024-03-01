<?php
require_once '.././login/config/config.php';

// Fetch all gallery images from the database
$result = $mysql_db->query("SELECT * FROM gallery_images");

$galleryImages = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $galleryImages[] = ['id' => $row['id'], 'path' => $row['path']];
    }
}

// Respond with the gallery images in JSON format
echo json_encode(['galleryImages' => $galleryImages]);
?>