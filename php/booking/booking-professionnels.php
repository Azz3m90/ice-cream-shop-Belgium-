<?php
require_once '.././vendor/autoload.php';
require_once '.././config/config.php';

use PHPMailer\PHPMailer\PHPMailer;

// Function to generate a stylish HTML email for clients
function getClientEmailContent($name)
{
    // HTML content for client email
    $content = "
    <html>
    <head>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                margin: 0;
                padding: 0;
            }
            .container {
                width: 80%;
                margin: 20px auto;
                background-color: #fff;
                border-radius: 10px;
                padding: 20px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }
            .header {
                background-color: #0073e6;
                color: #ffffff;
                text-align: center;
                padding: 20px;
                border-radius: 10px 10px 0 0;
            }
            .content {
                padding: 20px;
            }
            .footer {
                background-color: #0073e6;
                color: #ffffff;
                text-align: center;
                padding: 10px;
                border-radius: 0 0 10px 10px;
            }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>
                <h1>Confirmation de réservation</h1>
            </div>
            <div class='content'>
                <p>Bonjour $name,</p>
                <p>Votre réservation a bien été enregistrée. Nous vous remercions pour votre confiance.</p>
                <p>Nous vous contacterons dans les plus brefs délais pour confirmer les détails de votre réservation.</p>
                <p>Cordialement,</p>
                <p>L'équipe de Gelato Naturale Tarcienne</p>
            </div>
            <div class='footer'>
                <p>Merci d'avoir choisi Gelato Naturale Tarcienne !</p>
            </div>
        </div>
    </body>
    </html>";

    return $content;
}

// Function to generate a plain text email for clients
function getClientPlainTextContent($name)
{
    // Plain text content for client email
    $content = "Bonjour $name,\n\nVotre réservation a bien été enregistrée. Nous vous remercions pour votre confiance.\nNous vous contacterons dans les plus brefs délais pour confirmer les détails de votre réservation.\n\nCordialement,\nL'équipe de Gelato Naturale Tarcienne";

    return $content;
}

// Function to generate a stylish HTML email for the store
function getStoreEmailContent($name, $email, $phone, $delivery_date, $delivery_address, $comment)
{
    // HTML content for store email
    $content = "
    <html>
    <head>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                margin: 0;
                padding: 0;
            }
            .container {
                width: 80%;
                margin: 20px auto;
                background-color: #fff;
                border-radius: 10px;
                padding: 20px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }
            .header {
                background-color: #0073e6;
                color: #ffffff;
                text-align: center;
                padding: 20px;
                border-radius: 10px 10px 0 0;
            }
            .content {
                padding: 20px;
            }
            .footer {
                background-color: #0073e6;
                color: #ffffff;
                text-align: center;
                padding: 10px;
                border-radius: 0 0 10px 10px;
            }
            table {
                width: 100%;
                border-collapse: collapse;
            }
            th, td {
                padding: 8px;
                text-align: left;
                border-bottom: 1px solid #ddd;
            }
            th {
                background-color: #0073e6;
                color: #ffffff;
            }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>
                <h1>Nouvelle réservation</h1>
            </div>
            <div class='content'>
                <p>Une nouvelle réservation a été enregistrée :</p>
                <table>
                    <tr>
                        <th>Champ</th>
                        <th>Valeur</th>
                    </tr>
                    <tr>
                        <td>Nom</td>
                        <td>$name</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>$email</td>
                    </tr>
                    <tr>
                        <td>Téléphone</td>
                        <td>$phone</td>
                    </tr>
                    <tr>
                        <td>Date de livraison</td>
                        <td>$delivery_date</td>
                    </tr>
                    <tr>
                        <td>Adresse de livraison</td>
                        <td>$delivery_address</td>
                    </tr>
                    <tr>
                        <td>Commentaire</td>
                        <td>$comment</td>
                    </tr>
                </table>
            </div>
            <div class='footer'>
                <p>Merci de gérer cette réservation rapidement.</p>
            </div>
        </div>
    </body>
    </html>";

    return $content;
}

// Function to generate a plain text email for the store
function getStorePlainTextContent($name, $email, $phone, $delivery_date, $delivery_address, $comment)
{
    // Plain text content for store email
    $content = "Une nouvelle réservation a été enregistrée :\n\n"
              . "Nom: $name\n"
              . "Email: $email\n"
              . "Téléphone: $phone\n"
              . "Date de livraison: $delivery_date\n"
              . "Adresse de livraison: $delivery_address\n"
              . "Commentaire: $comment\n\n"
              . "Merci de gérer cette réservation rapidement.";

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

// Extract form data
$name = trim($_POST['name']);
$surname = trim($_POST['surname']);
$company = trim($_POST['company']);
$phone = trim($_POST['phone']);
$email = trim($_POST['email']);
$sector = trim($_POST['sector']);
$delivery_date = trim($_POST['delivery_date']);
$delivery_address = trim($_POST['delivery_address']);
$comment = trim($_POST['comment']);

// Check if email already exists in the database
$emailExistsQuery = "SELECT * FROM emails WHERE email = '$email'";
$result = $mysql_db->query($emailExistsQuery);

if ($result->num_rows === 0) { // If email does not exist, proceed
    // Client email
    // Store email
    $insertSql = "INSERT INTO emails (name, surname, company, phone, email, sector, delivery_date, delivery_address, comment, creation_date, active)
    VALUES ('$name', '$surname', '$company', '$phone', '$email', '$sector', '$delivery_date', '$delivery_address', '$comment', current_timestamp(), 1)";

    $mysql_db->query($insertSql);
    $mail->setFrom('info@matthiasandsea.be', 'Gelato Naturale Tarcienne');
    $mail->addAddress($email, $name);
    $mail->Subject = 'Confirmation de réservation';
    $mail->isHTML(true);
    $mail->Body = getClientEmailContent($name);
    $mail->AltBody = getClientPlainTextContent($name); // Plain text alternative

    // Restaurant email
    $storeEmailContent = getStoreEmailContent($name, $email, $phone, $delivery_date, $delivery_address, $comment);
    $storePlainTextContent = getStorePlainTextContent($name, $email, $phone, $delivery_date, $delivery_address, $comment);
    // Send the restaurant email
    if (!$mail->send()) {
        echo 'error';
    } else {
        echo 'success';
    }
    $mail->clearAllRecipients(); // Clear previous recipients
    $mail->addAddress('info@matthiasandsea.be', 'Gelato Naturale Tarcienne');
    $mail->Subject = 'Nouvelle réservation - ' . $name;
    $mail->Body = $storeEmailContent;
    $mail->AltBody = $storePlainTextContent; // Plain text alternative

    // Send the restaurant email
    if (!$mail->send()) {
        echo 'error';
    } else {
        echo 'success';
    }
    // Close the database connection
    $mysql_db->close();
    
} else {
    // Email already exists in the database, do not add to the database
    $mail->setFrom('info@matthiasandsea.be', 'Gelato Naturale Tarcienne');
    $mail->addAddress($email, $name);
    $mail->Subject = 'Confirmation de réservation';
    $mail->isHTML(true);
    $mail->Body = getClientEmailContent($name);
    $mail->AltBody = getClientPlainTextContent($name); // Plain text alternative

    // Restaurant email
    $storeEmailContent = getStoreEmailContent($name, $email, $phone, $delivery_date, $delivery_address, $comment);
    $storePlainTextContent = getStorePlainTextContent($name, $email, $phone, $delivery_date, $delivery_address, $comment);
    // Send the restaurant email
    if (!$mail->send()) {
        echo 'error';
    } 
    $mail->clearAllRecipients(); // Clear previous recipients
    $mail->addAddress('info@matthiasandsea.be', 'Gelato Naturale Tarcienne');
    $mail->Subject = 'Nouvelle réservation - ' . $name;
    $mail->Body = $storeEmailContent;
    $mail->AltBody = $storePlainTextContent; // Plain text alternative

    // Send the restaurant email
    if (!$mail->send()) {
        echo 'error';
    } else {
        echo 'success';
    }
   
}
?>
