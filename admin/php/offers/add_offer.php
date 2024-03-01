<?php
// Include config file
require_once "../../../admin/php/login/config/config.php";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the offer details from the form
    $languageCode = $_POST["language"];
    $title = $_POST["title"];
    $description = $_POST["description"];

    // Map language codes to actual language names
    $languageCodeMapping = [
        "fr" => 1,
        "en" => 2,
        "nl" => 3,
        // Add more mappings as needed
    ];

    // Get the language ID based on the received language code
    $languageId = isset($languageCodeMapping[$languageCode]) ? $languageCodeMapping[$languageCode] : 0;

    // Check if a valid language ID is obtained
    if ($languageId > 0) {
        // Set the section based on the language
        $sectionMapping = [
            "en" => "Special offers",
            "fr" => "Offres spéciales",
            "nl" => "Speciale aanbiedingen",
            // Add more languages as needed
        ];

        $section = isset($sectionMapping[$languageCode]) ? $sectionMapping[$languageCode] : "Default Section";

        // Assuming you have an input field for the image file
        $image = $_FILES["image"]["name"];
        $tempImage = $_FILES["image"]["tmp_name"];
        $imagePath = '../../../../matthias-and-sea/admin/assets/img/offers/'.$image;


        // Move the uploaded image to the desired folder
        move_uploaded_file($tempImage, $imagePath);

        // Handle the details field
        $details = json_decode($_POST["details"], true);

        // Prepare and bind the SQL statement
        $stmt = $mysql_db->prepare("INSERT INTO special_offers_table (section, title, image, description, details, languageId) VALUES (?, ?, ?, ?, ?, ?)");

        // Check for errors in preparing the statement
        if (!$stmt) {
            die("Error in preparing the statement: " . $mysql_db->error);
        }

        // Bind parameters using variables
        $stmt->bind_param("sssssi", $section, $title, $imagePath, $description, $detailsJSON, $languageId);

        // Convert details array to JSON
        $detailsJSON = json_encode($details);

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            // Redirect to the offers page
            header("location: ../../offers.php");
            exit();
        } else {
            // Display an error message if execution fails
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        // Invalid language code received
        echo "Error: Invalid language code received.";
    }
}

// Close the database connection
$mysql_db->close();
?>