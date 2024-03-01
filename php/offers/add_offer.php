<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the offer data from the form
    $offerData = [
        'id' => $_POST['id'], // Generate a unique ID for the offer
        'title' => $_POST['title'],
        //'image' => $_POST['image'],
        'description' => $_POST['description'],
        'details' => json_decode($_POST['details']),
    ];

    // Get the selected language from the form
    $language = $_POST['language'];

    // Read the existing offers data from the JSON file
    $jsonFile = '../../data/offers.json';
    $jsonContents = file_get_contents($jsonFile);
    $data = json_decode($jsonContents, true);

    // Check if the language exists in the JSON data
    if (!array_key_exists($language, $data)) {
        // Create an empty offers array for the selected language if it doesn't exist
        $data[$language]['offers'] = [];
    }

    if ($data !== null && array_key_exists($language, $data) && !in_array($offerData['id'], array_column($data[$language]['offers'], 'id'))) {
        // Append the new offer to the selected language's offers
        $data[$language]['offers'][] = $offerData;

        // Handle image upload
        if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
            // Process the image upload
            $imageFileName = $_FILES['image']['name'];
            $imageTempPath = $_FILES['image']['tmp_name'];
            $imageDestinationDirectory = '../../assets/img/offers/';
            $imageDestination = $imageDestinationDirectory . $imageFileName;

            // Check if a file with the same name already exists
            $counter = 1;
            while (file_exists($imageDestination)) {
                $imageFileName = pathinfo($_FILES['image']['name'], PATHINFO_FILENAME) . "_$counter." . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                $imageDestination = $imageDestinationDirectory . $imageFileName;
                $counter++;
            }

            // Move the uploaded image to the destination folder
            if (move_uploaded_file($imageTempPath, $imageDestination)) {
                // Image uploaded successfully, update the offer's image path
                $imagePath = 'assets/img/offers/' . $imageFileName;

                // Update the offer's image field in the JSON data
                $offerId = count($data[$language]['offers']);
                $data[$language]['offers'][$offerId - 1]['image'] = $imagePath;
            } else {
                $response['error'] = 'Failed to upload image.';
            }
        } else {
            echo "Image not modified";
        }

        // Convert the data back to JSON format
        $jsonData = json_encode($data, JSON_PRETTY_PRINT);

        // Save the updated data back to the JSON file
        file_put_contents($jsonFile, $jsonData);

        // Respond with a success status
        http_response_code(200);
        echo 'Offer added successfully';
    } else {
        // Language not found or JSON data couldn't be decoded
        http_response_code(400);
        echo 'Error: Invalid language or offer ID already exists';
    }
} else {
    // Respond with an error status if not a POST request
    http_response_code(400);
    echo 'Error: Invalid request';
}