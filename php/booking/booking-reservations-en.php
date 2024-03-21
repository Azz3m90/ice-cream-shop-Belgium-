<?php
require_once '.././vendor/autoload.php';
require_once '.././config/config.php';

use PHPMailer\PHPMailer\PHPMailer;

// Function to generate HTML email content for clients
function getClientEmailContent($name)
{
    // HTML content of the email for the client
    $content = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Confirmation</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0;">
    <table cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
        <!-- Header -->
        <tr>
            <td bgcolor="#009246" style="padding: 20px; text-align: center; border-radius: 10px 10px 0 0; color: #fff;">
            <img src="https://gelatonaturale.be/gelatonaturale/assets/img/gelatonaturale80px.svg" alt="Gelato Naturale" style="max-width: 80px; max-height: 80px;">
                <h1 style="margin: 0;">Reservation Confirmation</h1>
            </td>
        </tr>
        <!-- Content -->
        <tr>
            <td bgcolor="#ffffff" style="padding: 20px; border-radius: 0 0 10px 10px;">
                <p>Dear ' . $name . ',</p>
                <p>Your order has been sent. Gelato Naturale will respond to you, either by email or SMS, within 24 business hours to confirm.</p>
                <p>If there is no response, do not hesitate to contact us at 0497476548.</p>
                <p>A deposit or prepayment may be requested.</p>
                <p>Thank you for your confidence,</p>
                <p>The Gelato Naturale Team</p>
            </td>
        </tr>
        <!-- Footer -->
        <tr>
            <td bgcolor="#ce2b37" style="padding: 10px; text-align: center; border-radius: 0 0 10px 10px; color: #fff;">
                <p style="margin: 0;">Thank you for choosing Gelato Naturale!</p>
            </td>
        </tr>
    </table>
</body>
</html>';

    return $content;
}

// Function to generate plain text content of email for clients
function getClientPlainTextContent()
{
    // Plain text content of the email for the client
    $content = "Dear Customer,\n\nYour order has been sent. Gelato Naturale will respond to you, either by email or SMS, within 24 business hours to confirm.\nIf there is no response, do not hesitate to contact us at 0497476548.\nA deposit or prepayment may be requested.\n\nThank you for your confidence,\nThe Gelato Naturale Team";

    return $content;
}

// Function to generate HTML email content for the store
function getStoreEmailContent($last_name, $first_name, $email, $phone_number, $delivery_date, $number_of_persons, $for_person, $age, $first_flavor_choice, $second_flavor_choice, $alternative_flavor_choice, $topping, $comments, $file_name)
{
    if (!empty($file_name)) {
        $fileRow = '
        <tr>
            <td style="border-bottom: 1px solid #ddd;">File/Photo</td>
            <td style="border-bottom: 1px solid #ddd;">' . $file_name . '</td>
        </tr>';
    }
    if (!empty($comments)) {
        $commentsRow = '
        <tr>
            <td style="border-bottom: 1px solid #ddd;">Comment</td>
            <td style="border-bottom: 1px solid #ddd;">' . $comments . '</td>
        </tr>';
    }
    // HTML content of the email for the store
    $content = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Confirmation</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0;">
    <table cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
        <!-- Header -->
        <tr>
            <td bgcolor="#009246" style="padding: 20px; text-align: center; border-radius: 10px 10px 0 0; color: #fff;">
            <img src="https://gelatonaturale.be/gelatonaturale/assets/img/gelatonaturale.svg" alt="Gelato Naturale" style="max-width: 80px;  max-height: 80px;">
                <h1 style="margin: 0;">New Reservation</h1>
            </td>
        </tr>
        <!-- Content -->
        <tr>
            <td bgcolor="#ffffff" style="padding: 20px; border-radius: 0 0 10px 10px;">
                <p style="margin-top: 0;">A new reservation has been recorded:</p>
                <table cellpadding="8" cellspacing="0" width="100%" style="border-collapse: collapse;">
                    <tr>
                        <td style="border-bottom: 1px solid #ddd;">Last Name</td>
                        <td style="border-bottom: 1px solid #ddd;">' . $last_name . '</td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 1px solid #ddd;">First Name</td>
                        <td style="border-bottom: 1px solid #ddd;">' . $first_name . '</td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 1px solid #ddd;">Email</td>
                        <td style="border-bottom: 1px solid #ddd;">' . $email . '</td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 1px solid #ddd;">Phone Number</td>
                        <td style="border-bottom: 1px solid #ddd;">' . $phone_number . '</td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 1px solid #ddd;">Delivery Date</td>
                        <td style="border-bottom: 1px solid #ddd;">' . $delivery_date . '</td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 1px solid #ddd;">Number of Persons</td>
                        <td style="border-bottom: 1px solid #ddd;">' . $number_of_persons . '</td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 1px solid #ddd;">For</td>
                        <td style="border-bottom: 1px solid #ddd;">' . $for_person . '</td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 1px solid #ddd;">Age</td>
                        <td style="border-bottom: 1px solid #ddd;">' . $age . '</td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 1px solid #ddd;">First Flavor Choice</td>
                        <td style="border-bottom: 1px solid #ddd;">' . $first_flavor_choice . '</td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 1px solid #ddd;">Second Flavor Choice</td>
                        <td style="border-bottom: 1px solid #ddd;">' . $second_flavor_choice . '</td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 1px solid #ddd;">Alternative Flavor Choice</td>
                        <td style="border-bottom: 1px solid #ddd;">' . $alternative_flavor_choice . '</td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 1px solid #ddd;">Topping</td>
                        <td style="border-bottom: 1px solid #ddd;">' . $topping . '</td>
                    </tr>
                    ' . $commentsRow . '
                    ' . $fileRow . '
                </table>
            </td>
        </tr>
        <!-- Footer -->
        <tr>
            <td bgcolor="#ce2b37" style="padding: 10px; text-align: center; border-radius: 0 0 10px 10px; color: #fff;">
                <p style="margin: 0;">Thank you for processing this reservation promptly.</p>
            </td>
        </tr>
    </table>
</body>
</html>';

    return $content;
}

// Create a new PHPMailer object
$mail = new PHPMailer();

// Configure SMTP
$mail->isSMTP();
$mail->Host = 'mail.infomaniak.com';
$mail->SMTPAuth = true;
$mail->Username = 'info@matthiasandsea.be';
$mail->Password = 'Matteo1998';
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;
$mail->CharSet = 'UTF-8';

// Retrieve data from the form
$last_name = trim($_POST['last_name']);
$first_name = trim($_POST['first_name']);
$email = trim($_POST['email']); // New field for email
$phone_number = trim($_POST['phone']);
$delivery_date = trim($_POST['delivery_date']);
$number_of_persons = trim($_POST['persons']);
$for_person = trim($_POST['gender']);
$age = trim($_POST['age']);
$first_flavor_choice = trim($_POST['first_choice']);
$second_flavor_choice = trim($_POST['second_choice']);
$alternative_flavor_choice = trim($_POST['alternate_choice']);
$topping = trim($_POST['topping']);
$comments = trim($_POST['comments']);
$file_name = isset($_FILES['file']['name']) ? $_FILES['file']['name'] : ''; // File name
$file_tmp = isset($_FILES['file']['tmp_name']) ? $_FILES['file']['tmp_name'] : ''; // Temporary file path



// Email to the client
$mail->setFrom('info@matthiasandsea.be', 'Gelato Naturale');
$mail->addAddress($email, $first_name . ' ' . $last_name);
$mail->Subject = 'Reservation Confirmation';
$mail->isHTML(true);
$mail->Body = getClientEmailContent($first_name . ' ' . $last_name);
$mail->AltBody = getClientPlainTextContent(); // Alternative plain text

// Send the email to the client
if (!$mail->send()) {
    echo 'error';
} else {
    echo 'success ';
}

// Email to the store
$mail->clearAddresses();
$mail->addAddress('info@matthiasandsea.be'); // Replace with actual store email address
$mail->Subject = 'New Reservation - ' . $first_name . ' ' . $last_name;
$mail->Body = getStoreEmailContent($last_name, $first_name, $email, $phone_number, $delivery_date, $number_of_persons, $for_person, $age, $first_flavor_choice, $second_flavor_choice, $alternative_flavor_choice, $topping, $comments, $file_name);
// Check if a file is uploaded
if (!empty($file_name) && is_uploaded_file($file_tmp)) {
    // Add the file as an attachment
    $mail->addAttachment($file_tmp, $file_name);
}
// Send the email to the store
if (!$mail->send()) {
    echo 'error';
} else {
    // Check if the email exists in the database
    $query = "SELECT * FROM emails_reservations WHERE email = '$email'";
    $result = $mysql_db->query($query);

    if ($result === false) {
        // Error handling: Print error message or log it for debugging
        echo 'Error executing query: ' . $mysql_db->error;
    } else {
        // Check if the email exists and handle accordingly
        if ($result->num_rows == 0) {
            // Email does not exist, insert reservation details into the database
            $insertQuery = "INSERT INTO emails_reservations (last_name, first_name, phone, delivery_date, persons, gender, age, first_choice, second_choice, alternate_choice, topping, comments, email) VALUES ('$last_name', '$first_name', '$phone_number', '$delivery_date', '$number_of_persons', '$for_person', '$age', '$first_flavor_choice', '$second_flavor_choice', '$alternative_flavor_choice', '$topping', '$comments', '$email')";

            $insertResult = $mysql_db->query($insertQuery);
            if ($insertResult === false) {
                // Error handling: Print error message or log it for debugging
                echo 'Error inserting data: ' . $mysql_db->error;
            }
        }
        echo 'success';
    }
}

// Close the database connection
$mysql_db->close();