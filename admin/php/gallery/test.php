<?php
require_once '.././login/config/config.php';

// Check if the database connection is successful
if ($mysql_db->connect_errno) {
    die("Failed to connect to MySQL: " . $mysql_db->connect_error);
}

// Execute the query to fetch minified images
$query = "SELECT * FROM minified_images";
$result = $mysql_db->query($query);
var_dump($result->fetch_assoc());
// Check if the query was executed successfully
if (!$result) {
    die("Error executing query: " . $mysql_db->error);
}

// Check if any rows were returned
if ($result->num_rows > 0) {
    $minifiedImages = [];

    // Fetch each row from the result set
    while ($row = $result->fetch_assoc()) {
        $minifiedImages[] = [
            'id' => $row['id'],
            'image_id' => $row['image_id'],
            'path' => $row['path']
        ];
    }

    // Display the fetched minified images
    echo "Minified Images:<br>";
    print_r($minifiedImages);
} else {
    echo "No minified images found.";
}

// Free the result set
$result->free();

// Close the database connection
$mysql_db->close();