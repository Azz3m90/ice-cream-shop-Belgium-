<?php
// Include config file
require_once "../../.././admin/php/login/config/config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $subject = $_POST["subject"];
    $body = $_POST["body"];
    $pathBG = isset($_POST["pathBG"]) ? $_POST["pathBG"] : null;
    $path = isset($_POST["path"]) ? $_POST["path"] : null;
 // Validate subject
    if (empty($subject)) {
        $response['status'] = 'error';
        $response['message'] = 'Subject is required!';
    } elseif (empty($body)) {
        $response['status'] = 'error';
        $response['message'] = 'Body is required!';
    } else {
        $stmt = $mysql_db->prepare("INSERT INTO ads (subject, body, image_path, bg_image_path) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $subject, $body, $path, $pathBG);

        if ($stmt->execute()) {
            $response['status'] = 'success';
            $response['message'] = 'Ads inserted successfully!';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Error: ' . $stmt->error;
        }

        $stmt->close();
    }
}

$mysql_db->close();

// Output the JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>