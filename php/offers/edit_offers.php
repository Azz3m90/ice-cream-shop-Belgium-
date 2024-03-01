<?php
// Check if the form was submitted
$response = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Read the JSON file
    $jsonFile = '../../data/offers.json';
    $jsonContents = file_get_contents($jsonFile);
    $data = json_decode($jsonContents, true);
    //var_dump($language);
    // Get the form data
    $offerId = isset($_POST['id']) ? (int)$_POST['id'] : 0;
    $language = $_POST['language'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $details = $_POST['details'];

    // Check if the offer with the same ID and language exists
    if ($offerId > 0 && isset($data[$language]) && is_array($data[$language]['offers'])) {
        foreach ($data[$language]['offers'] as &$offer) {
            if ($offer['id'] == $offerId) {
                $offer['title'] = $title;
                $offer['description'] = $description;
                $offer['details'] = json_decode($details, true); // Update the details

                // Handle image upload if it's set
                if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
                    $imageFileName = $_FILES['image']['name'];
                    $imageTempPath = $_FILES['image']['tmp_name'];
                    $imageDestinationDirectory = '../assets/img/offers/';
                    $imageDestination = $imageDestinationDirectory . $imageFileName;

                    if (move_uploaded_file($imageTempPath, $imageDestination)) {
                        // Image uploaded successfully, update the offer's image path
                        $imagePath = 'assets/img/offers/' . $imageFileName;
                        $offer['image'] = $imagePath;
                    } else {
                        $response['error'] = 'Failed to upload image.';
                    }
                }

                // You can add more fields to update here as needed

                $response['success'] = 'Offer updated successfully.';
                break;
            }
        }
    } else {
        $response['error'] = 'Offer not found.';
    }

    if (!isset($response['error'])) {
        // Convert the data back to JSON format
        $jsonData = json_encode($data);

        // Save the updated data back to the JSON file
        if (file_put_contents($jsonFile, $jsonData)) {
            $response['success'] = 'Data saved successfully.';
        } else {
            $response['error'] = 'Failed to save data.';
        }
    }

    // Send the response as JSON
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>