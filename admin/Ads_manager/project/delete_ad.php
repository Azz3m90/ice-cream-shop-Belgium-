<?php
// Include config file
require_once "../../.././admin/php/login/config/config.php";


if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["adId"])) {
    // Sanitize the adId (to prevent SQL injection, etc.)
    $adId = mysqli_real_escape_string($mysql_db, $_POST["adId"]);

    // Perform the deletion query
    $deleteQuery = "DELETE FROM ads WHERE id = '$adId'";
    if (mysqli_query($mysql_db, $deleteQuery)) {
        // The deletion was successful
        $response = array("status" => "success", "message" => "Ad deleted successfully");
        echo json_encode($response);
    } else {
        // There was an error with the deletion query
        $response = array("status" => "error", "message" => "Error deleting ad");
        echo json_encode($response);
    }

    // Close the database connection
    mysqli_close($mysql_db);
} else {
    // Invalid request, handle accordingly
    $response = array("status" => "error", "message" => "Invalid request");
    echo json_encode($response);
}


?>