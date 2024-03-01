<?php
$data = array();
if (isset($_FILES['files'])) {
    $data = array();

    foreach ($_FILES['files']['tmp_name'] as $key => $tmp_name) {
        $file_name = $_FILES['files']['name'][$key];
        $file_size = $_FILES['files']['size'][$key];
        $file_tmp = $_FILES['files']['tmp_name'][$key];
        $file_type = $_FILES['files']['type'][$key];
        $random = rand();
        $path = "images/" . $random . "_" . $file_name;
        $random_name = $random . "_" . $file_name;

        if (move_uploaded_file($file_tmp, $path)) {
            $data[] = $path;
        } else {
            $data[] = 'error';
        }
    }

    // Return JSON response
    echo json_encode($data);
    exit; // Exit to prevent further output
}
if (isset($_GET['remove_img']) && $_GET['remove_img'] === 'true') {
    $image_paths = $_POST['paths']; // Change 'path' to 'paths' to handle multiple paths

    // Check if $image_paths is a JSON-encoded string
    $paths_array = json_decode($image_paths, true);

    // If it's not a JSON string, consider it as a single path
    if (!is_array($paths_array)) {
        $paths_array = [$image_paths];
    }

    $success_count = 0;

    foreach ($paths_array as $image_path) {
        if (file_exists($image_path)) {
            unlink($image_path);
            $success_count++;
        }
    }

    // Check if all removals were successful
    if ($success_count == count($paths_array)) {
        echo 'success';
    } else {
        echo 'error';
    }

    exit; // Exit to prevent further output
}
?>