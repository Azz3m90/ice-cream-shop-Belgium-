<?php
// Include necessary files
require_once '../../../../matthias-and-sea/admin/php/vendor/autoload.php';
require_once "../../.././admin/php/login/config/config.php";

// Check if the email parameter is set
if (isset($_GET['email'])) {
    $unsubscribedEmail = urldecode($_GET['email']);

    // Your SQL query to update the 'active' field to 0 for the specified email
    $unsubscribeSql = "UPDATE emails SET active = 0 WHERE email = '$unsubscribedEmail'";

    // Execute the query
    $unsubscribeResult = mysqli_query($mysql_db, $unsubscribeSql);

    if ($unsubscribeResult) {
        echo 'Unsubscribed successfully';
         echo '<script>
                  setTimeout(function() {
                      window.location.href = "https://www.matthiasandsea.be/matthias-and-sea/"; // Replace with your actual home page URL
                  }, 2000);
               </script>';
    } else {
        echo 'Error unsubscribing: ' . mysqli_error($mysql_db);
    }
} else {
    echo 'Email parameter is missing';
}
?>