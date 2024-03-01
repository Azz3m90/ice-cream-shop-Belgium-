<?php
// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the offer ID and offer language to delete
    $offerId = $_POST['offerId'];
    $offerLang = $_POST['offerLang'];

    // Read the JSON file
    $jsonFile = '../../data/offers.json';
    $jsonContents = file_get_contents($jsonFile);
    $data = json_decode($jsonContents, true);

    if ($data !== null && array_key_exists($offerLang, $data)) {
        // Find and remove the offer with the given ID within the specified language
        $offers = &$data[$offerLang]['offers'];
        $offerIndex = null;

        foreach ($offers as $index => $offer) {
            if ($offer['id'] == $offerId) {
                $offerIndex = $index;
                break;
            }
        }

        if ($offerIndex !== null) {
            // Remove the offer at the found index
            array_splice($offers, $offerIndex, 1);

            // If you want to delete the language as well when there are no offers left
            if (empty($offers)) {
                unset($data[$offerLang]);
            }

            // Convert the data back to JSON format
            $jsonData = json_encode($data);

            // Save the updated data back to the JSON file
            file_put_contents($jsonFile, $jsonData);

            // Respond with a success status
            http_response_code(200);
            echo 'Offer deleted successfully';
        } else {
            // Offer not found in the specified language
            http_response_code(404);
        }
    } else {
        // Language not found or JSON data couldn't be decoded
        http_response_code(400);
    }
} else {
    // Respond with an error status if not a POST request
    http_response_code(400);
}