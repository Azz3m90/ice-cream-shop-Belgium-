<?php
require_once '.././vendor/autoload.php';
require_once '.././config/config.php';

use PHPMailer\PHPMailer\PHPMailer;

// Functie voor het genereren van HTML-e-mailinhoud voor klanten
function getClientEmailContent($name)
{
    // HTML-inhoud van de e-mail voor de klant
    $content = '<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bevestiging Reservering</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0;">
    <table cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
        <!-- Header -->
        <tr>
            <td bgcolor="#009246" style="padding: 20px; text-align: center; border-radius: 10px 10px 0 0; color: #fff;">
            <img src="https://gelatonaturale.be/gelatonaturale/assets/img/gelatonaturale80px.svg" alt="Gelato Naturale" style="max-width: 80px; max-height: 80px;">
                <h1 style="margin: 0;">Bevestiging Reservering</h1>
            </td>
        </tr>
        <!-- Content -->
        <tr>
            <td bgcolor="#ffffff" style="padding: 20px; border-radius: 0 0 10px 10px;">
                <p>Beste ' . $name . ',</p>
                <p>Uw reservering is succesvol geregistreerd. Dank u voor uw vertrouwen.</p>
                <p>We zullen zo spoedig mogelijk contact met u opnemen om de details van uw reservering te bevestigen.</p>
                <p>Met vriendelijke groet,</p>
                <p>Team Gelato Naturale Tarcienne</p>
            </td>
        </tr>
        <!-- Footer -->
        <tr>
            <td bgcolor="#ce2b37" style="padding: 10px; text-align: center; border-radius: 0 0 10px 10px; color: #fff;">
                <p>Dank u voor het kiezen van Gelato Naturale Tarcienne!</p>
            </td>
        </tr>
    </table>
</body>
</html>';

    return $content;
}

// Functie voor het genereren van platte tekstinhoud van e-mail voor klanten
function getClientPlainTextContent($name)
{
    // Platte tekstinhoud van de e-mail voor de klant
    $content = "Beste $name,\n\nUw reservering is succesvol geregistreerd. Dank u voor uw vertrouwen.\nWe nemen zo snel mogelijk contact met u op om de details van uw reservering te bevestigen.\n\nMet vriendelijke groet,\nTeam Gelato Naturale Tarcienne";

    return $content;
}

// Functie voor het genereren van HTML-e-mailinhoud voor de winkel
function getStoreEmailContent($name, $email, $phone, $delivery_date, $delivery_address, $comment, $surname, $company, $sector)
{
    if (!empty($comment)) {
        $commentsRow = '
        <tr>
            <td style="border-bottom: 1px solid #ddd;">Opmerking</td>
            <td style="border-bottom: 1px solid #ddd;">' . $comment . '</td>
        </tr>';
    }
    // HTML-inhoud van de e-mail voor de winkel
    $content = '<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserveringsbevestiging</title>
</head>

<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0;">
    <table cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
        <!-- Header -->
        <tr>
            <td bgcolor="#009246" style="padding: 20px; text-align: center; border-radius: 10px 10px 0 0; color: #fff;">
            <img src="https://gelatonaturale.be/gelatonaturale/assets/img/gelatonaturale.svg" alt="Gelato Naturale" style="max-width: 80px;  max-height: 80px;">
                <h1 style="margin: 0;">Nieuwe Reservering</h1>
            </td>
        </tr>
        <!-- Content -->
        <tr>
            <td bgcolor="#ffffff" style="padding: 20px; border-radius: 0 0 10px 10px;">
                <p style="margin-top: 0;">Een nieuwe reservering is gemaakt:</p>
                <table cellpadding="8" cellspacing="0" width="100%" style="border-collapse: collapse;">
                    <tr>
                        <td style="border-bottom: 1px solid #ddd;">Naam</td>
                        <td style="border-bottom: 1px solid #ddd;">' . $name . '</td>
                    </tr> 
                    <tr>
                        <td style="border-bottom: 1px solid #ddd;">Achternaam</td>
                        <td style="border-bottom: 1px solid #ddd;">' . $surname . '</td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 1px solid #ddd;">E-mail</td>
                        <td style="border-bottom: 1px solid #ddd;">' . $email . '</td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 1px solid #ddd;">Telefoon</td>
                        <td style="border-bottom: 1px solid #ddd;">' . $phone . '</td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 1px solid #ddd;">Bedrijf</td>
                        <td style="border-bottom: 1px solid #ddd;">' . $company . '</td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 1px solid #ddd;">Sector</td>
                        <td style="border-bottom: 1px solid #ddd;">' . $sector . '</td>
                    </tr>
                    
                    <tr>
                        <td style="border-bottom: 1px solid #ddd;">Leverdatum</td>
                        <td style="border-bottom: 1px solid #ddd;">' . $delivery_date . '</td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 1px solid #ddd;">Leveradres</td>
                        <td style="border-bottom: 1px solid #ddd;">' . $delivery_address . '</td>
                    </tr>
                    ' . $commentsRow . '
                </table>
            </td>
        </tr>
        <!-- Footer -->
        <tr>
            <td bgcolor="#ce2b37" style="padding: 10px; text-align: center; border-radius: 0 0 10px 10px; color: #fff;">
                <p style="margin: 0;">Bedankt voor het snel verwerken van deze reservering.</p>
            </td>
        </tr>
    </table>
</body>

</html>
';

    return $content;
}

// Functie voor het genereren van platte tekstinhoud van e-mail voor de winkel
function getStorePlainTextContent($name, $email, $phone, $delivery_date, $delivery_address, $comment)
{
    // Platte tekstinhoud van de e-mail voor de winkel
    $content = "Een nieuwe reservering is geregistreerd :\n\n"
        . "Naam: $name\n"
        . "E-mail: $email\n"
        . "Telefoon: $phone\n"
        . "Leveringsdatum: $delivery_date\n"
        . "Leveringsadres: $delivery_address\n"
        . "Opmerking: $comment\n\n"
        . "Bedankt voor het snel verwerken van deze reservering.";

    return $content;
}

// Maak een nieuw PHPMailer-object
$mail = new PHPMailer();

// Configureer SMTP
$mail->isSMTP();
$mail->Host = 'mail.infomaniak.com';
$mail->SMTPAuth = true;
$mail->Username = 'info@matthiasandsea.be';
$mail->Password = 'Matteo1998';
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;
$mail->CharSet = 'UTF-8';

// Haal de gegevens op uit het formulier
$name = trim($_POST['name']);
$surname = trim($_POST['surname']);
$company = trim($_POST['company']);
$phone = trim($_POST['phone']);
$email = trim($_POST['email']);
$sector = trim($_POST['sector']);
$delivery_date = trim($_POST['delivery_date']);
$delivery_address = trim($_POST['delivery_address']);
$comment = trim($_POST['comment']);

// Controleer of het e-mailadres al in de database bestaat
$emailExistsQuery = "SELECT * FROM emails WHERE email = '$email'";
$result = $mysql_db->query($emailExistsQuery);

if ($result->num_rows === 0) { // Als het e-mailadres niet bestaat, doorgaan
    // E-mail naar de klant
    // E-mail naar de winkel
    $insertSql = "INSERT INTO emails (name, surname, company, phone, email, sector, delivery_date, delivery_address, comment, creation_date, active)
    VALUES ('$name', '$surname', '$company', '$phone', '$email', '$sector', '$delivery_date', '$delivery_address', '$comment', current_timestamp(), 1)";

    $mysql_db->query($insertSql);
    $mail->setFrom('info@matthiasandsea.be', 'Gelato Naturale Tarcienne');
    $mail->addAddress($email, $name);
    $mail->Subject = 'Bevestiging van reservering';
    $mail->isHTML(true);
    $mail->Body = getClientEmailContent($name);
    $mail->AltBody = getClientPlainTextContent($name); // Alternatieve platte tekst

    // E-mail naar de winkel
    $storeEmailContent = getStoreEmailContent($name, $email, $phone, $delivery_date, $delivery_address, $comment, $surname, $company, $sector);
    $storePlainTextContent = getStorePlainTextContent($name, $email, $phone, $delivery_date, $delivery_address, $comment);
    // Verzend de e-mail naar de winkel
    if (!$mail->send()) {
        echo 'error';
    } else {
        echo 'success';
    }
    $mail->clearAllRecipients(); // Wis vorige ontvangers
    $mail->addAddress('info@matthiasandsea.be', 'Gelato Naturale Tarcienne');
    $mail->Subject = 'Nieuwe reservering - ' . $name;
    $mail->Body = $storeEmailContent;
    $mail->AltBody = $storePlainTextContent; // Alternatieve platte tekst

    // Verzend de e-mail naar de winkel
    if (!$mail->send()) {
        echo 'error';
    } else {
        echo 'success';
    }
    // Sluit de databaseverbinding
    $mysql_db->close();
} else {
    // Het e-mailadres bestaat al in de database, niet toevoegen aan de database
    $mail->setFrom('info@matthiasandsea.be', 'Gelato Naturale Tarcienne');
    $mail->addAddress($email, $name);
    $mail->Subject = 'Bevestiging van reservering';
    $mail->isHTML(true);
    $mail->Body = getClientEmailContent($name);
    $mail->AltBody = getClientPlainTextContent($name); // Alternatieve platte tekst

    // E-mail naar de winkel
    $storeEmailContent = getStoreEmailContent($name, $email, $phone, $delivery_date, $delivery_address, $comment, $surname, $company, $sector);
    $storePlainTextContent = getStorePlainTextContent($name, $email, $phone, $delivery_date, $delivery_address, $comment);
    // Verzend de e-mail naar de winkel
    if (!$mail->send()) {
        echo 'error';
    }
    $mail->clearAllRecipients(); // Wis vorige ontvangers
    $mail->addAddress('info@matthiasandsea.be', 'Gelato Naturale Tarcienne');
    $mail->Subject = 'Nieuwe reservering - ' . $name;
    $mail->Body = $storeEmailContent;
    $mail->AltBody = $storePlainTextContent; // Alternatieve platte tekst

    // Verzend de e-mail naar de winkel
    if (!$mail->send()) {
        echo 'error';
    } else {
        echo 'success';
    }
}