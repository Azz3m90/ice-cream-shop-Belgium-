<?php
$data = array();

if (isset($_GET['files'])) {
    $error = false;
    $files = array();

    $uploaddir = './images/BG/';
    
    foreach ($_FILES as $file) {
        $temp = explode(".", $file["name"]);
        $extension = end($temp);
        $random = rand();
        $path = "images/BG/" . $random . "." . $extension;
        $random_name = $random . "." . $extension;

        move_uploaded_file($file['tmp_name'], $uploaddir . basename($random_name));
        echo $path;
    }
}

// Handle background image removal
if (isset($_GET['remove_bg']) && $_GET['remove_bg'] === 'true') {
    $bg_image_path = $_POST['bg_image_path'];

    // Remove the background image from the server
    if (file_exists($bg_image_path)) {
        unlink($bg_image_path);
        echo 'Background image removed successfully';
    } else {
        echo 'Background image not found';
    }
}
?>