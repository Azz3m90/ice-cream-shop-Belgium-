<?php
use PHPMailer\PHPMailer\PHPMailer;
require_once '../../../../matthias-and-sea/admin/php/vendor/autoload.php';
require_once "../../.././admin/php/login/config/config.php";

// Check if the action is set and it's the expected action
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    // Check the selected option
    $emailOption = $_POST['emailOption'];

    // Get the adsId from the form
    $adsId = $_POST['adsId'];

    // Your SQL query to select all emails and ad content
    if ($emailOption === 'all') {
        $sql = "SELECT e.email, e.firstname,a.subject, a.body, a.image_path, a.bg_image_path
                FROM emails e
                JOIN ads a ON e.active = 1
                WHERE a.id = $adsId"; // Include adsId in the condition
    } elseif ($emailOption === 'betweenDates') {
        // Get the start and end dates from the form
        $startDate = $_POST['startDate'];
        $endDate = $_POST['endDate'];

        // Your SQL query to select emails and ad content between two dates
        $sql = "SELECT e.email, e.firstname, a.subject, a.body, a.image_path, a.bg_image_path
                FROM emails e
                JOIN ads a ON e.active = 1
                WHERE e.creation_date BETWEEN '$startDate' AND '$endDate'
                AND a.id = $adsId";
    } else {
        echo 'Invalid email option.';
        exit;
    }
    // Print the SQL query for debugging
    //echo $sql;
    // Execute the query
    $result = mysqli_query($mysql_db, $sql);
    $emailCount = mysqli_num_rows($result);

    // Provide a response with email count and details
    $response = [
        'success' => true,
        'message' => $emailCount,
        'emails' => []
    ];
    // Check if there are any rows in the result set
    if ($result && mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
            $email = $row['email'];
            $subject = $row['subject'];
            $body = $row['body'];
            $imagePath = $row['image_path'];
            $bgImagePath = $row['bg_image_path'];
            $firstname = $row['firstname'];
                        // Print or log the email details for debugging
            //echo "Email: $email, Subject: $subject, Body: $body, Image Path: $imagePath, BG Image Path: $bgImagePath\n";

            // Use $email, $subject, $body, $imagePath, $bgImagePath to send emails to each user
            // Here you can implement the logic to send emails
            sendEmailFunction($email, $subject, $body, $imagePath, $bgImagePath,$firstname);


            // Add email details to the response
            $response['emails'][] = [
                'email' => $email,
                'firstname' => $firstname
            ];
        }

        // Provide a response (you can customize the response based on your needs)
         echo json_encode($response);
    } else {
        echo 'No matching records.';
    }
} else {
    echo 'Invalid request.';
}

function sendEmailFunction($email, $subject, $body, $imagePath, $bgImagePath,$firstname) {
    // Create a new PHPMailer object
    $mail = new PHPMailer();

    // Configure SMTP (adjust the SMTP configuration as needed)
    $mail->isSMTP();
    $mail->Host = 'mail.infomaniak.com';
    $mail->SMTPAuth = true;
    $mail->Username = '<a href="mailto:info@matthiasandsea.be" target="_blank">info@matthiasandsea.be</a>';
    $mail->Password = 'Matteo1998';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->CharSet = 'UTF-8';

    //$mail->SMTPDebug = 2;
    //$mail->Debugoutput = 'html';

    // Set email content
    $mail->setFrom('<a href="mailto:info@matthiasandsea.be" target="_blank">info@matthiasandsea.be</a>', '<a href="mailto:info@matthiasandsea.be" target="_blank">info@matthiasandsea.be</a>');
    $mail->addAddress($email);
    $mail->Subject = $subject;
    $mail->isHTML(true);
    $mail->Body = $body;

    // You can customize the email content further, for example, by adding images
    // Add image attachment
if (!empty($imagePath)) {
    // Decode the JSON array of image paths
    $imagePaths = json_decode($imagePath);

    if (is_array($imagePaths)) {
        foreach ($imagePaths as $imagePath) {
            $localImagePath = $_SERVER['DOCUMENT_ROOT'] . '/matthias-and-sea/admin/Ads_manager/project/' . $imagePath;

            if (file_exists($localImagePath)) {
                $imageContent = file_get_contents($localImagePath);
                $mail->AddStringAttachment($imageContent, 'image.jpg', 'base64', 'image/jpeg');
            } else {
                echo 'Error: Image not found at ' . $localImagePath;
            }
        }
    } else {
        // If there is only one image path
        $localImagePath = $_SERVER['DOCUMENT_ROOT'] . '/matthias-and-sea/admin/Ads_manager/project/' . $imagePath;

        if (file_exists($localImagePath)) {
            $imageContent = file_get_contents($localImagePath);
            $mail->AddStringAttachment($imageContent, 'image.jpg', 'base64', 'image/jpeg');
        } else {
            echo 'Error: Image not found at ' . $localImagePath;
        }
    }
}

$bgImageData ='';
// Add background image
if (!empty($bgImagePath)) {
    $localBgImagePath = $_SERVER['DOCUMENT_ROOT'] . '/matthias-and-sea/admin/Ads_manager/project/' . $bgImagePath;

    if (file_exists($localBgImagePath)) {
        $bgImageData = base64_encode(file_get_contents($localBgImagePath));
    } else {
        echo 'Error: Background image not found at ' . $localBgImagePath;
    }
}
$mail->Body = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {

            margin: 0;
            padding: 0;
        }
        .content {
            padding: 20px;

        }
        .footer {
            padding: 10px;
        }
    </style>
</head>
<body>
    <table class="footer">
        <tr>
            <td colspan="2">
                <div class="content">
                    <p>Dear ' . $firstname . ',</p>
                    <p>' . $body . '</p>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <p>Best regards,<br>
                MATTHIAS AND SEA<br>
                Address: Route de Philippeville 34, 5651 Tarcienne<br>
                Phone: <a href="tel:+071218620" target="_blank">071 21 86 20</a><br>
                Email: <a href="mailto:info@matthiasandsea.be" target="_blank">info@matthiasandsea.be</a></p>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <p>To unsubscribe, <a href="https://www.matthiasandsea.be/matthias-and-sea/admin/Ads_manager/project/unsubscribe.php?email=' . urlencode($email) . '">click here</a>.</p>
                <p>Personnalisé par FAST CAISSE 2023©.</p>
            </td>
        </tr>
    </table>
</body>
</html>';

// Alternative text version (alt-body)
// Alternative text version (alt-body)
$mail->AltBody = "Dear $firstname,\n\n$body\n\nBest regards,\nMATTHIAS AND SEA\nAddress: Route de Philippeville 34, 5651 Tarcienne\nPhone: <a href="tel:+071218620" target="_blank">071 21 86 20</a>\nEmail: <a href="mailto:info@matthiasandsea.be" target="_blank">info@matthiasandsea.be</a>\n\nTo unsubscribe, visit https://www.matthiasandsea.be/matthias-and-sea/admin/Ads_manager/project/unsubscribe.php?email=" . urlencode($email) . ".\nPersonnalisé par FAST CAISSE 2023©.";

    // Send the email
    if (!$mail->send()) {
        echo 'Error sending email to ' . $email . ': ' . $mail->ErrorInfo . '<br>';
    } else {
        //echo 'Email sent successfully to ' . $email . '<br>';
    }
}
?>