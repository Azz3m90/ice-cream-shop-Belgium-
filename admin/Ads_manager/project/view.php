<?php
// Include config file
require_once __DIR__ . '/../../../admin/php/login/config/config.php';

$query = mysqli_query($mysql_db, "SELECT * FROM ads");

// Check if there are any rows in the result set
if (mysqli_num_rows($query) > 0) {
    $counter = 0; // Initialize a counter
    echo '<div class="container">';
    echo '<form id="emailForm" action="send_email.php" method="post">';
    echo '<div class="row mt-3">';

    while ($row = mysqli_fetch_array($query)) {
        echo '<div class="col-md-4 mb-4">';
        echo '<div class="card h-100">';
        echo '<div class="card-body d-flex flex-column">';
        echo '<h1 class="card-title">' . $row['subject'] . '</h1>';
        echo '<p class="card-text flex-grow-1">' . $row['body'] . '</p>';
        echo '<p class="card-text"><small class="text-muted">Posted on: ' . $row['created_at'] . '</small></p>';
            echo '<div class="row">';
            // Font Awesome icon for Attachment
                        // Fixed dimensions for the images
        if ($row['image_path'] !== '') { 
            echo '<div class="col-6"><p class="card-text"><i class="fa fa-paperclip" aria-hidden="true"></i> Attachment:</p></div>';

            echo '<div class="col-6">';
            
            // Decode the JSON array of image paths
            $imagePaths = json_decode($row['image_path']);

            if (is_array($imagePaths)) {
                foreach ($imagePaths as $imagePath) {
                    echo '<img class="card-img-top mt-1" src="https://www.matthiasandsea.be/matthias-and-sea/admin/Ads_manager/project/' . $imagePath . '" style="max-width: 50px; height: 50px; object-fit: cover;" alt="Image">';
                }
            } else {
                // If there is only one image path
                echo '<img class="card-img-top mt-1" src="https://www.matthiasandsea.be/matthias-and-sea/admin/Ads_manager/project/' . $row['image_path'] . '" style="max-width: 50px; height: 50px; object-fit: cover;" alt="Image">';
            }
            
            echo '</div>';
        }
            echo '</div>';





        // Right bottom buttons in the card
        echo '<div class="mt-2 text-right">';
        echo '<button type="button" class="btn btn-danger mr-2" onclick="deleteAd(' . $row['id'] . ')"><span class="description">
        Delete</span></button>';
        echo '<button type="button" class="btn btn-primary" onclick="sendEmail(' . $row['id'] . ')">
        <span class="description">
        Send</span></button>';
        echo '</div>';

        echo '</div>';
        echo '</div>';
        echo '</div>';
        $counter++;
    }

    echo '</div>';
    echo '</form>';
    echo '</div>';

} else {
    echo '<div class="row">';
    echo '<div class="col-md-12">';
    echo '<h1 class="text-center text-muted mt-5">No Ads found</h1>';
    echo '</div>';
    echo '</div>';
}

// Close the database connection
mysqli_close($mysql_db);
?>