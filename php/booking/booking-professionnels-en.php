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
function getStoreEmailContent($name, $email, $phone, $delivery_date, $delivery_address, $comment, $surname, $company, $sector)
{
    $commentsRow = $comment;
    if (!empty($comment)) {
        $commentsRow = '
        <tr>
            <td style="border-bottom: 1px solid #ddd;">Commentaire</td>
            <td style="border-bottom: 1px solid #ddd;">' . $comment . '</td>
        </tr>';
    }
    // Contenu HTML de l'e-mail pour le magasin
    $content = '<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation de Réservation</title>
</head>

<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0;">
    <table cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
        <!-- Header -->
        <tr>
            <td bgcolor="#009246" style="padding: 20px; text-align: center; border-radius: 10px 10px 0 0; color: #fff;">
            <img src="https://gelatonaturale.be/gelatonaturale/assets/img/gelatonaturale80px.svg" alt="Gelato Naturale" style="max-width: 80px;  max-height: 80px;">
                <h1 style="margin: 0;">Nouvelle Réservation</h1>
            </td>
        </tr>
        <!-- Content -->
        <tr>
            <td bgcolor="#ffffff" style="padding: 20px; border-radius: 0 0 10px 10px;">
                <p style="margin-top: 0;">Une nouvelle réservation a été enregistrée :</p>
                <table cellpadding="8" cellspacing="0" width="100%" style="border-collapse: collapse;">
                    <tr>
                        <td style="border-bottom: 1px solid #ddd;">Nom</td>
                        <td style="border-bottom: 1px solid #ddd;">' . $name . '</td>
                    </tr> 
                    <tr>
                        <td style="border-bottom: 1px solid #ddd;">Prénom</td>
                        <td style="border-bottom: 1px solid #ddd;">' . $surname . '</td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 1px solid #ddd;">Email</td>
                        <td style="border-bottom: 1px solid #ddd;">' . $email . '</td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 1px solid #ddd;">Téléphone</td>
                        <td style="border-bottom: 1px solid #ddd;">' . $phone . '</td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 1px solid #ddd;">Société</td>
                        <td style="border-bottom: 1px solid #ddd;">' . $company . '</td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 1px solid #ddd;">Secteur</td>
                        <td style="border-bottom: 1px solid #ddd;">' . $sector . '</td>
                    </tr>
                    
                    <tr>
                        <td style="border-bottom: 1px solid #ddd;">Date de Livraison</td>
                        <td style="border-bottom: 1px solid #ddd;">' . $delivery_date . '</td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 1px solid #ddd;">Adresse de Livraison</td>
                        <td style="border-bottom: 1px solid #ddd;">' . $delivery_address . '</td>
                    </tr>
                    ' . $commentsRow . '
                </table>
            </td>
        </tr>
        <!-- Footer -->
        <tr>
            <td bgcolor="#ce2b37" style="padding: 10px; text-align: center; border-radius: 0 0 10px 10px; color: #fff;">
                <p style="margin: 0;">Nous vous remercions de traiter cette réservation rapidement.</p>
            </td>
        </tr>
    </table>
</body>

</html>
';

    return $content;
}

// Fonction pour générer le contenu texte brut de l'e-mail pour le magasin
function getStorePlainTextContent($name, $email, $phone, $delivery_date, $delivery_address, $comment)
{
    // Contenu texte brut de l'e-mail pour le magasin
    $content = "Une nouvelle réservation a été enregistrée :\n\n"
        . "Nom: $name\n"
        . "E-mail: $email\n"
        . "Téléphone: $phone\n"
        . "Date de livraison: $delivery_date\n"
        . "Adresse de livraison: $delivery_address\n"
        . "Commentaire: $comment\n\n"
        . "Merci d'avoir traité cette réservation rapidement.";

    return $content;
}
// Create a new PHPMailer object
$mail = new PHPMailer();

// Configure SMTP
$mail->isSMTP();
$mail->Host = 'mail.infomaniak.com';
$mail->SMTPAuth = true;
$mail->Username = 'info@gelatonaturale.be';
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
    $mail->setFrom('info@gelatonaturale.be', 'Gelato Naturale Tarcienne');
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
    $mail->addAddress('info@gelatonaturale.be', 'Gelato Naturale Tarcienne');
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
    $mail->setFrom('info@gelatonaturale.be', 'Gelato Naturale Tarcienne');
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
    $mail->addAddress('info@gelatonaturale.be', 'Gelato Naturale Tarcienne');
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
