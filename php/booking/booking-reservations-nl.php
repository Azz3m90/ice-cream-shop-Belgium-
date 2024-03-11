<?php
require_once '.././vendor/autoload.php';
require_once '.././config/config.php';

use PHPMailer\PHPMailer\PHPMailer;

// Functie om een stijlvolle HTML-e-mail voor klanten te genereren
function getClientEmailContent($name)
{
    // HTML-inhoud voor e-mail naar klant
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
                <h1>Bevestiging van reservering</h1>
            </div>
            <div class='content'>
                <p>Beste $name,</p>
                <p>Uw reservering is succesvol geregistreerd. Wij danken u voor uw vertrouwen.</p>
                <p>Wij zullen zo snel mogelijk contact met u opnemen om de details van uw reservering te bevestigen.</p>
                <p>Met vriendelijke groet,</p>
                <p>Team Gelato Naturale Tarcienne</p>
            </div>
            <div class='footer'>
                <p>Bedankt voor het kiezen van Gelato Naturale Tarcienne!</p>
            </div>
        </div>
    </body>
    </html>";

    return $content;
}

// Functie om een platte tekst e-mail voor klanten te genereren
function getClientPlainTextContent($name)
{
    // Platte tekst inhoud voor e-mail naar klant
    $content = "Beste $name,\n\nUw reservering is succesvol geregistreerd. Wij danken u voor uw vertrouwen.\nWij zullen zo snel mogelijk contact met u opnemen om de details van uw reservering te bevestigen.\n\nMet vriendelijke groet,\nTeam Gelato Naturale Tarcienne";

    return $content;
}

// Functie om een stijlvolle HTML-e-mail voor de winkel te genereren
function getStoreEmailContent($name, $email, $phone, $delivery_date, $delivery_address, $comment)
{
    // HTML-inhoud voor e-mail naar de winkel
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
                <h1>Nieuwe reservering</h1>
            </div>
            <div class='content'>
                <p>Er is een nieuwe reservering geregistreerd :</p>
                <table>
                    <tr>
                        <th>Veld</th>
                        <th>Waarde</th>
                    </tr>
                    <tr>
                        <td>Naam</td>
                        <td>$name</td>
                    </tr>
                    <tr>
                        <td>E-mail</td>
                        <td>$email</td>
                    </tr>
                    <tr>
                        <td>Telefoon</td>
                        <td>$phone</td>
                    </tr>
                    <tr>
                        <td>Leveringsdatum</td>
                        <td>$delivery_date</td>
                    </tr>
                    <tr>
                        <td>Leveringsadres</td>
                        <td>$delivery_address</td>
                    </tr>
                    <tr>
                        <td>Opmerking</td>
                        <td>$comment</td>
                    </tr>
                </table>
            </div>
            <div class='footer'>
                <p>Bedankt voor het snel afhandelen van deze reservering.</p>
            </div>
        </div>
    </body>
    </html>";

    return $content;
}

// Functie om een platte tekst e-mail voor de winkel te genereren
function getStorePlainTextContent($name, $email, $phone, $delivery_date, $delivery_address, $comment)
{
    // Platte tekst inhoud voor e-mail naar de winkel
    $content = "Er is een nieuwe reservering geregistreerd :\n\n"
              . "Naam: $name\n"
              . "E-mail: $email\n"
              . "Telefoon: $phone\n"
              . "Leveringsdatum: $delivery_date\n"
              . "Leveringsadres: $delivery_address\n"
              . "Opmerking: $comment\n\n"
              . "Bedankt voor het snel afhandelen van deze reservering.";

    return $content;
}

// Maak een nieuw PHPMailer-object aan
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

// Haal formuliergegevens op
$name = trim($_POST['name']);
$surname = trim($_POST['surname']);
$company = trim($_POST['company']);
$phone = trim($_POST['phone']);
$email = trim($_POST['email']);
$sector = trim($_POST['sector']);
$delivery_date = trim($_POST['delivery_date']);
$delivery_address = trim($_POST['delivery_address']);
$comment = trim($_POST['comment']);

// Controleer of het e-mailadres al bestaat in de database
$emailExistsQuery = "SELECT * FROM emails WHERE email = '$email'";
$result = $mysql_db->query($emailExistsQuery);

if ($result->num_rows === 0) { // Als het e-mailadres niet bestaat, ga dan verder
    // E-mail naar klant
    // E-mail naar de winkel
    $insertSql = "INSERT INTO emails (name, surname, company, phone, email, sector, delivery_date, delivery_address, comment, creation_date, active)
    VALUES ('$name', '$surname', '$company', '$phone', '$email', '$sector', '$delivery_date', '$delivery_address', '$comment', current_timestamp(), 1)";

    $mysql_db->query($insertSql);
    $mail->setFrom('info@matthiasandsea.be', 'Gelato Naturale Tarcienne');
    $mail->addAddress($email, $name);
    $mail->Subject = 'Bevestiging van reservering';
    $mail->isHTML(true);
    $mail->Body = getClientEmailContent($name);
    $mail->AltBody = getClientPlainTextContent($name); // Platte tekst alternatief

    // E-mail naar het restaurant
    $storeEmailContent = getStoreEmailContent($name, $email, $phone, $delivery_date, $delivery_address, $comment);
    $storePlainTextContent = getStorePlainTextContent($name, $email, $phone, $delivery_date, $delivery_address, $comment);
    // Verstuur de e-mail naar het restaurant
    if (!$mail->send()) {
        echo 'error';
    } else {
        echo 'success';
    }
    $mail->clearAllRecipients(); // Wis eerdere ontvangers
    $mail->addAddress('info@matthiasandsea.be', 'Gelato Naturale Tarcienne');
    $mail->Subject = 'Nieuwe reservering - ' . $name;
    $mail->Body = $storeEmailContent;
    $mail->AltBody = $storePlainTextContent; // Platte tekst alternatief

    // Verstuur de e-mail naar het restaurant
    if (!$mail->send()) {
        echo 'error';
    } else {
        echo 'success';
    }
    // Sluit de databaseverbinding
    $mysql_db->close();
    
} else {
    // E-mailadres bestaat al in de database, voeg niet toe aan de database
    $mail->setFrom('info@matthiasandsea.be', 'Gelato Naturale Tarcienne');
    $mail->addAddress($email, $name);
    $mail->Subject = 'Bevestiging van reservering';
    $mail->isHTML(true);
    $mail->Body = getClientEmailContent($name);
    $mail->AltBody = getClientPlainTextContent($name); // Platte tekst alternatief

    // E-mail naar het restaurant
    $storeEmailContent = getStoreEmailContent($name, $email, $phone, $delivery_date, $delivery_address, $comment);
    $storePlainTextContent = getStorePlainTextContent($name, $email, $phone, $delivery_date, $delivery_address, $comment);
    // Verstuur de e-mail naar het restaurant
    if (!$mail->send()) {
        echo 'error';
    } 
    $mail->clearAllRecipients(); // Wis eerdere ontvangers
    $mail->addAddress('info@matthiasandsea.be', 'Gelato Naturale Tarcienne');
    $mail->Subject = 'Nieuwe reservering - ' . $name;
    $mail->Body = $storeEmailContent;
    $mail->AltBody = $storePlainTextContent; // Platte tekst alternatief

    // Verstuur de e-mail naar het restaurant
    if (!$mail->send()) {
        echo 'error';
    } else {
        echo 'success';
    }
   
}
?>
