<?php
require_once '.././login/config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uploadedFiles = $_FILES['addImageCategoryimage'];
    $restaurant_id = $_POST['restaurant_id'];

    foreach ($uploadedFiles['name'] as $index => $fileName) {
        $fileTmpName = $uploadedFiles['tmp_name'][$index];

        // Rename the file if it already exists
        $targetDirectory = '../../.././admin/assets/img/gallery/';
        $targetPath = $targetDirectory . $fileName;
        $savedPath = '.././admin/assets/img/gallery/'. $fileName;

        $counter = 1;
        $info = pathinfo($fileName);

        while (file_exists($targetPath)) {
            $fileName = $info['filename'] . '_' . $counter++ . '.' . $info['extension'];
            $targetPath = $targetDirectory . $fileName;
        }

        // Insert image information into the database
        $sql = "INSERT INTO gallery_images (path,restaurant_id) VALUES ('$savedPath','$restaurant_id')";
        $mysql_db->query($sql);

        // Move the uploaded file to the target directory
        move_uploaded_file($fileTmpName, $targetPath);
    }

    // Respond with a success message or any additional information needed
    echo json_encode(['success' => true, 'message' => 'Images uploaded successfully.']);
} else {
    // Respond with an error message for non-POST requests
    echo json_encode(['error' => true, 'message' => 'Invalid request method.']);
}
?>