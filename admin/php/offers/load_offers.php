<?php
// Include config file
require_once  "../../../admin/php/login/config/config.php";

// Fetch offers from the database
$query = "SELECT * FROM special_offers_table";
$result = $mysql_db->query($query);

// Check if the query was successful
if (!$result) {
    die("Error fetching offers: " . $mysql_db->error);
}

// Initialize an associative array to organize offers by language
$organizedOffers = array();

// Loop through the result set
while ($row = $result->fetch_assoc()) {
    $languageId = $row['languageId'];

    // Create language array if it doesn't exist
    if (!isset($organizedOffers[$languageId])) {
        $organizedOffers[$languageId] = array(
            'section' => $row['section'],
            'offers' => array()
        );
    }

    // Add offer details to the language array
    $organizedOffers[$languageId]['offers'][] = array(
        'id' => $row['offerId'],
        'title' => $row['title'],
        'image' => $row['image'],
        'description' => $row['description'],
        'details' => json_decode($row['details'], true)
    );
}

// Add restaurant_id to the final structure
$finalStructure = array();

// Check if each language array is not null and add it to $finalStructure
if (!is_null($organizedOffers[1])) {
    $finalStructure['en'] = $organizedOffers[1];
}

if (!is_null($organizedOffers[2])) {
    $finalStructure['fr'] = $organizedOffers[2];
}

if (!is_null($organizedOffers[3])) {
    $finalStructure['nl'] = $organizedOffers[3];
}

// Encode the final structure into JSON format
$jsonData = json_encode($finalStructure, JSON_UNESCAPED_UNICODE);

// Output the JSON data
echo $jsonData;

// Close the database connection
$mysql_db->close();

?>
