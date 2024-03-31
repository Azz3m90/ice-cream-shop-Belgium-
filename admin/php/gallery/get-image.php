<?php
require_once '.././login/config/config.php';

// Fetch all gallery images from the database
$result = $mysql_db->query("SELECT g.id, g.path, m.path AS minified_path FROM gallery_images g
                            LEFT JOIN minified_images m ON g.id = m.image_id");

$galleryImages = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $galleryImages[] = [
            'id' => $row['id'],
            'original_path' => $row['path'],
            'minified_path' => $row['minified_path']
        ];
    }
}

// Respond with the gallery images and their minified paths in JSON format
echo json_encode(['galleryImages' => $galleryImages]);
