<?php
// Include config file
require_once "../../../admin/php/login/config/config.php";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the offer details from the form
    $offerId = $_POST["offerId"];
    $section = $_POST["section"];
    $title = $_POST["title"];
    $newImage = $_FILES["image"]["name"];
    $tempNewImage = $_FILES["image"]["tmp_name"];
    $description = $_POST["description"];
    $details = $_POST["details"];
    $languageId = $_POST["languageId"];

    // Fetch the old image path from the database
    $oldImagePathQuery = $mysql_db->query("SELECT image FROM special_offers_table WHERE offerId = $offerId");

    if ($oldImagePathQuery) {
        $oldImagePathResult = $oldImagePathQuery->fetch_assoc();
        $oldImagePath = $oldImagePathResult["image"];

        // If a new image is uploaded, delete the old image and upload the new one
        if (!empty($newImage)) {
            // Delete the old image file
            $targetDirectory = '../../assets/img/offers/';
            $oldImageFilePath = $targetDirectory . basename($oldImagePath);

            if (file_exists($oldImageFilePath)) {
                unlink($oldImageFilePath);
            }

            // Upload the new image file
            $newImageFilePath = $targetDirectory . basename($newImage);
            move_uploaded_file($tempNewImage, $newImageFilePath);
            $newImageFilePath  = '../../../../matthias-and-sea/admin/assets/img/offers/'.$image . basename($newImage);
        } else {
            // If no new image is uploaded, use the old image path
            $newImageFilePath = $oldImagePath;
        }

        // Prepare and bind the SQL statement for updating the offer
        $stmt = $mysql_db->prepare("UPDATE special_offers_table SET section=?, title=?, image=?, description=?, details=?, languageId=? WHERE offerId=?");
        $stmt->bind_param("sssssii", $section, $title, $newImageFilePath, $description, $details, $languageId, $offerId);

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            // Offer updated successfully, redirect to the offers page
            header("location: ../../offers.php");
            exit();
        } else {
            // Display an error message if execution fails
            echo "Error updating offer: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        // Display an error message if fetching the old image path fails
        echo "Error fetching old image path";
    }
}

// Close the database connection
$mysql_db->close();
?>