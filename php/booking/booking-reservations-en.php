<?php
require_once '.././vendor/autoload.php';
require_once '.././config/config.php';

use PHPMailer\PHPMailer\PHPMailer;
echo 'Hello World';
// Function to generate HTML email content for clients
function getClientEmailContent()
{
    // HTML content of the email for the client
    $content = '<html>

<head>
</head>

<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0;">
    <table cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
        <!-- Header -->
        <tr>
            <td bgcolor="#009246" style="padding: 20px; text-align: center; border-radius: 10px 10px 0 0; color: #fff;">
                <h1 style="margin: 0;">Reservation Confirmation</h1>
            </td>
        </tr>
        <!-- Content -->
        <tr>
            <td bgcolor="#ffffff" style="padding: 20px; border-radius: 0 0 10px 10px;">
                <p>Dear Customer,</p>
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
function getStoreEmailContent($last_name, $first_name, $phone_number, $delivery_date, $number_of_persons, $for_person, $age, $first_flavor_choice, $second_flavor_choice, $alternative_flavor_choice, $topping, $comments, $file_name)
{
    // HTML content of the email for the store
    $content = '
<html>

<head>
</head>

<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0;">
    <table cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
        <!-- Header -->
        <tr>
            <td bgcolor="#009246" style="padding: 20px; text-align: center; border-radius: 10px 10px 0 0; color: #fff;">
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
                        <td style="border-bottom: 1px solid #ddd;">'.$last_name.'</td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 1px solid #ddd;">First Name</td>
                        <td style="border-bottom: 1px solid #ddd;">'.$first_name.'</td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 1px solid #ddd;">Phone Number</td>
                        <td style="border-bottom: 1px solid #ddd;">'.$phone_number.'</td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 1px solid #ddd;">Delivery Date</td>
                        <td style="border-bottom: 1px solid #ddd;">'.$delivery_date.'</td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 1px solid #ddd;">Number of Persons</td>
                        <td style="border-bottom: 1px solid #ddd;">'.$number_of_persons.'</td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 1px solid #ddd;">For</td>
                        <td style="border-bottom: 1px solid #ddd;">'.$for_person.'</td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 1px solid #ddd;">Age</td>
                        <td style="border-bottom: 1px solid #ddd;">'.$age.'</td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 1px solid #ddd;">First Flavor Choice</td>
                        <td style="border-bottom: 1px solid #ddd;">'.$first_flavor_choice.'</td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 1px solid #ddd;">Second Flavor Choice</td>
                        <td style="border-bottom: 1px solid #ddd;">'.$second_flavor_choice.'</td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 1px solid #ddd;">Alternative Flavor Choice</td>
                        <td style="border-bottom: 1px solid #ddd;">'.$alternative_flavor_choice.'</td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 1px solid #ddd;">Topping</td>
                        <td style="border-bottom: 1px solid #ddd;">'.$topping.'</td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 1px solid #ddd;">Comments</td>
                        <td style="border-bottom: 1px solid #ddd;">'.$comments.'</td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 1px solid #ddd;">File/Photo</td>
                        <td style="border-bottom: 1px solid #ddd;">'.$file_name.'</td>
                    </tr>
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
$phone_number = trim($_POST['phone_number']);
$delivery_date = trim($_POST['delivery_date']);
$number_of_persons = trim($_POST['number_of_persons']);
$for_person = trim($_POST['for_person']);
$age = trim($_POST['age']);
$first_flavor_choice = trim($_POST['first_flavor_choice']);
$second_flavor_choice = trim($_POST['second_flavor_choice']);
$alternative_flavor_choice = trim($_POST['alternative_flavor_choice']);
$topping = trim($_POST['topping']);
$comments = trim($_POST['comments']);
$file_name = $_FILES['file']['name'];

// Check if the email exists in the emails_reservations table
$emailExistsQuery = "SELECT * FROM emails_reservations WHERE email = '$email'";
$result = $mysql_db->query($emailExistsQuery);

if ($result->num_rows === 0) { // If the email address does not exist, proceed with sending email to the client without inserting into the table
    // Email to the client
    $mail->setFrom('info@matthiasandsea.be', 'Gelato Naturale');
    $mail->addAddress($_POST['email'], $first_name . ' ' . $last_name);
    $mail->Subject = 'Reservation Confirmation';
    $mail->isHTML(true);
    $mail->Body = getClientEmailContent();
    $mail->AltBody = getClientPlainTextContent(); // Alternative plain text

    // Send the email to the client
    if (!$mail->send()) {
        echo 'error';
    } else {
        echo 'success';
    }
} else {
    // If the email address exists, proceed with inserting into the table and sending email to the client
    $insertSql = "INSERT INTO emails_reservations (last_name, first_name, phone, delivery_date, persons, gender, age, first_choice, second_choice, alternate_choice, topping, comments, file_path, captcha_code, creation_date, active)
    VALUES ('$last_name', '$first_name', '$phone_number', '$delivery_date', '$number_of_persons', '$for_person', '$age', '$first_flavor_choice', '$second_flavor_choice', '$alternative_flavor_choice', '$topping', '$comments', '$file_name', '', current_timestamp(), 1)";

    $mysql_db->query($insertSql);

    // Email to the client
    $mail->setFrom('info@matthiasandsea.be', 'Gelato Naturale');
    $mail->addAddress($_POST['email'], $first_name . ' ' . $last_name);
    $mail->Subject = 'Reservation Confirmation';
    $mail->isHTML(true);
    $mail->Body = getClientEmailContent();
    $mail->AltBody = getClientPlainTextContent(); // Alternative plain text

    // Send the email to the client
    if (!$mail->send()) {
        echo 'error';
    } else {
        echo 'success';
    }
}

// Email to the store
$mail->clearAddresses();
$mail->addAddress('store@example.com'); // Replace with actual store email address
$mail->Subject = 'New Reservation - ' . $first_name . ' ' . $last_name;
$mail->Body = getStoreEmailContent($last_name, $first_name, $phone_number, $delivery_date, $number_of_persons, $for_person, $age, $first_flavor_choice, $second_flavor_choice, $alternative_flavor_choice, $topping, $comments, $file_name);

// Send the email to the store
if (!$mail->send()) {
    echo 'error';
} else {
    echo 'success';
}

// Close the database connection
$mysql_db->close();
?>