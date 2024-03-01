<?php
// Specify the path to your JSON file
$jsonFilePath = 'your_json_file.json';

// Load the JSON data from the file into an array
$jsonData = json_decode(file_get_contents($jsonFilePath), true);

// Assuming you have a card ID you want to delete
$cardIdToDelete = 2; // Change this to the actual card ID you want to delete

// Function to delete a card by ID
function deleteCardById(&$array, $id) {
    foreach ($array as $key => $item) {
        if ($item['id'] === $id) {
            unset($array[$key]);
            return;
        }
    }
}

// Call the deleteCardById function to remove the card
deleteCardById($jsonData, $cardIdToDelete);

// Reindex the array to remove any gaps in the keys
$jsonData = array_values($jsonData);

// Encode the updated array back to JSON
$jsonString = json_encode($jsonData, JSON_PRETTY_PRINT);

// Write the JSON data back to the file
file_put_contents($jsonFilePath, $jsonString);

echo "Card with ID $cardIdToDelete has been deleted.";
?>