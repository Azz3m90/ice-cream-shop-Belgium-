<?php
// Include config file
require_once "../../../admin/php/login/config/config.php";

// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the offer ID and offer language to delete
    $offerId = $_POST['offerId'];
    $offerLang = $_POST['offerLang'];

    // Fetch image path from the database based on offer ID
    $imagePathQuery = $mysql_db->query("SELECT image FROM special_offers_table WHERE offerId = $offerId");

    if ($imagePathQuery) {
        $imagePathResult = $imagePathQuery->fetch_assoc();
        $imagePath = $imagePathResult["image"];

        // Delete the offer from the database
        $deleteOfferQuery = $mysql_db->query("DELETE FROM special_offers_table WHERE offerId = $offerId");

        if ($deleteOfferQuery) {
            // Remove the image file
            $targetDirectory = '../../../../matthias-and-sea/admin/assets/img/offers/';
            $imageFilePath = $targetDirectory . basename($imagePath);

            if (file_exists($imageFilePath)) {
                unlink($imageFilePath);
            }

                          // Offer deleted successfully
              http_response_code(200); // OK
              echo 'Offer deleted successfully';
        } else {
            // Respond with an error status if deleting the offer fails
            http_response_code(500);
            echo 'Error deleting offer';
        }
    } else {
        // Respond with an error status if the image path couldn't be fetched
        http_response_code(500);
        echo 'Error fetching image path';
    }
} else {
    // Respond with an error status if not a POST request
    http_response_code(400);
    echo 'Invalid request method';
}
?>