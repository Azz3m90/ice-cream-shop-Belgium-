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
                <p>Your reservation has been successfully recorded. Thank you for your trust.</p>
                <p>We will contact you as soon as possible to confirm the details of your reservation.</p>
                <p>Best regards,</p>
                <p>Gelato Naturale Tarcienne Team</p>
            </td>
        </tr>
        <!-- Footer -->
        <tr>
            <td bgcolor="#ce2b37" style="padding: 10px; text-align: center; border-radius: 0 0 10px 10px; color: #fff;">
                <p>Thank you for choosing Gelato Naturale Tarcienne!</p>
            </td>
        </tr>
    </table>
</body>

</html>';

    return $content;
}

// Function to generate plain text content of email for clients
function getClientPlainTextContent($name)
{
    // Plain text content of the email for the client
    $content = "Dear $name,\n\nYour reservation has been successfully recorded. Thank you for your trust.\nWe will contact you as soon as possible to confirm the details of your reservation.\n\nBest regards,\nGelato Naturale Tarcienne Team";

    return $content;
}

// Function to generate HTML email content for the store
function getStoreEmailContent($name, $email, $phone, $delivery_date, $delivery_address, $comment, $surname, $company, $sector)
{
    if (!empty($comment)) {
        $commentsRow = '
        <tr>
            <td style="border-bottom: 1px solid #ddd;">Comment</td>
            <td style="border-bottom: 1px solid #ddd;">' . $comment . '</td>
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
                        <td style="border-bottom: 1px solid #ddd;">Name</td>
                        <td style="border-bottom: 1px solid #ddd;">' . $name . '</td>
                    </tr> 
                    <tr>
                        <td style="border-bottom: 1px solid #ddd;">Surname</td>
                        <td style="border-bottom: 1px solid #ddd;">' . $surname . '</td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 1px solid #ddd;">Email</td>
                        <td style="border-bottom: 1px solid #ddd;">' . $email . '</td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 1px solid #ddd;">Phone</td>
                        <td style="border-bottom: 1px solid #ddd;">' . $phone . '</td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 1px solid #ddd;">Company</td>
                        <td style="border-bottom: 1px solid #ddd;">' . $company . '</td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 1px solid #ddd;">Sector</td>
                        <td style="border-bottom: 1px solid #ddd;">' . $sector . '</td>
                    </tr>
                    
                    <tr>
                        <td style="border-bottom: 1px solid #ddd;">Delivery Date</td>
                        <td style="border-bottom: 1px solid #ddd;">' . $delivery_date . '</td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 1px solid #ddd;">Delivery Address</td>
                        <td style="border-bottom: 1px solid #ddd;">' . $delivery_address . '</td>
                    </tr>
                    ' . $commentsRow . '
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

</html>


';

    return $content;
}

// Function to generate plain text content of email for the store
function getStorePlainTextContent($name, $email, $phone, $delivery_date, $delivery_address, $comment)
{
    // Plain text content of the email for the store
    $content = "A new reservation has been recorded :\n\n"
        . "Name: $name\n"
        . "Email: $email\n"
        . "Phone: $phone\n"
        . "Delivery Date: $delivery_date\n"
        . "Delivery Address: $delivery_address\n"
        . "Comment: $comment\n\n"
        . "Thank you for processing this reservation promptly.";

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
$name = trim($_POST['name']);
$surname = trim($_POST['surname']);
$company = trim($_POST['company']);
$phone = trim($_POST['phone']);
$email = trim($_POST['email']);
$sector = trim($_POST['sector']);
$delivery_date = trim($_POST['delivery_date']);
$delivery_address = trim($_POST['delivery_address']);
$comment = trim($_POST['comment']);

// Check if the email address already exists in the database
$emailExistsQuery = "SELECT * FROM emails WHERE email = '$email'";
$result = $mysql_db->query($emailExistsQuery);

if ($result->num_rows === 0) { // If the email address does not exist, continue
    // Email to the client
    // Email to the store
    $insertSql = "INSERT INTO emails (name, surname, company, phone, email, sector, delivery_date, delivery_address, comment, creation_date, active)
    VALUES ('$name', '$surname', '$company', '$phone', '$email', '$sector', '$delivery_date', '$delivery_address', '$comment', current_timestamp(), 1)";

    $mysql_db->query($insertSql);
    $mail->setFrom('info@matthiasandsea.be', 'Gelato Naturale Tarcienne');
    $mail->addAddress($email, $name);
    $mail->Subject = 'Reservation Confirmation';
    $mail->isHTML(true);
    $mail->Body = getClientEmailContent($name);
    $mail->AltBody = getClientPlainTextContent($name); // Alternative plain text

    // Email to the store
    $storeEmailContent = getStoreEmailContent($name, $email, $phone, $delivery_date, $delivery_address, $comment, $surname, $company, $sector);
    $storePlainTextContent = getStorePlainTextContent($name, $email, $phone, $delivery_date, $delivery_address, $comment);
    // Send the email to the store
    if (!$mail->send()) {
        echo 'error';
    } else {
        echo 'success';
    }
    $mail->clearAllRecipients(); // Clear previous recipients
    $mail->addAddress('info@matthiasandsea.be', 'Gelato Naturale Tarcienne');
    $mail->Subject = 'New Reservation - ' . $name;
    $mail->Body = $storeEmailContent;
    $mail->AltBody = $storePlainTextContent; // Alternative plain text

    // Send the email to the store
    if (!$mail->send()) {
        echo 'error';
    } else {
        echo 'success';
    }
    // Close the database connection
    $mysql_db->close();
} else {
    // The email address already exists in the database, do not add to the database
    $mail->setFrom('info@matthiasandsea.be', 'Gelato Naturale Tarcienne');
    $mail->addAddress($email, $name);
    $mail->Subject = 'Reservation Confirmation';
    $mail->isHTML(true);
    $mail->Body = getClientEmailContent($name);
    $mail->AltBody = getClientPlainTextContent($name); // Alternative plain text

    // Email to the store
    $storeEmailContent = getStoreEmailContent($name, $email, $phone, $delivery_date, $delivery_address, $comment, $surname, $company, $sector);
    $storePlainTextContent = getStorePlainTextContent($name, $email, $phone, $delivery_date, $delivery_address, $comment);
    // Send the email to the store
    if (!$mail->send()) {
        echo 'error';
    }
    $mail->clearAllRecipients(); // Clear previous recipients
    $mail->addAddress('info@matthiasandsea.be', 'Gelato Naturale Tarcienne');
    $mail->Subject = 'New Reservation - ' . $name;
    $mail->Body = $storeEmailContent;
    $mail->AltBody = $storePlainTextContent; // Alternative plain text

    // Send the email to the store
    if (!$mail->send()) {
        echo 'error';
    } else {
        echo 'success';
    }
}