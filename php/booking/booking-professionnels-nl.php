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
            <img src="https://gelatonaturale.be/gelatonaturale/assets/img/gelatonaturale.svg" alt="Gelato Naturale" style="max-width: 80px;  max-height: 80px;">
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
// Maak een nieuw PHPMailer-object
$mail = new PHPMailer();

// Configureer SMTP
$mail->isSMTP();
$mail->Host = 'mail.infomaniak.com';
$mail->SMTPAuth = true;
$mail->Username = 'info@gelatonaturale.be';
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
    $mail->setFrom('info@gelatonaturale.be', 'Gelato Naturale Tarcienne');
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
    $mail->addAddress('info@gelatonaturale.be', 'Gelato Naturale Tarcienne');
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
    $mail->setFrom('info@gelatonaturale.be', 'Gelato Naturale Tarcienne');
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
    $mail->addAddress('info@gelatonaturale.be', 'Gelato Naturale Tarcienne');
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
