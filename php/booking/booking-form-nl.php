<?php

use PHPMailer\PHPMailer\PHPMailer;
require_once '.././vendor/autoload.php';
require_once '.././config/config.php';
// Create a new PHPMailer object
$mail = new PHPMailer();

// Configure SMTP
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

// Extract form data
$name = trim($_POST['name']);
$email = trim($_POST['email']);
$phone = trim($_POST['phone']);
$date = trim($_POST['datetime']);
$attendents = trim($_POST['attendents']);
$notes = trim($_POST['notes']);

// Client email
$mail->setFrom('<a href="mailto:info@matthiasandsea.be" target="_blank">info@matthiasandsea.be</a>', '<a href="mailto:info@matthiasandsea.be" target="_blank">info@matthiasandsea.be</a>');
$mail->addAddress($email, $name);
$mail->Subject = 'Bedankt voor het kiezen van ons restaurant!';
$mail->isHTML(true);

$mail->Body = '<!DOCTYPE html>
<html lang="nl">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Bevestiging van uw reservering</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 15px;
            text-align: left;
        }
        th {
            background-color: #0073e6;
            color: #ffffff;
            text-align: center;
        }
        .header {
            background-color: #0073e6;
            color: #ffffff;
            text-align: center;
            padding: 20px;
        }
        .footer {
            background-color: #0073e6;
            color: #ffffff;
            text-align: center;
            padding: 10px;
        }
        .content {
            padding: 20px;
        }
    </style>
</head>
<body>
    <table class="header">
        <tr>
            <th colspan="2">
                <h1>Bevestiging van uw reservering</h1>
            </th>
        </tr>
    </table>
    <table class="content">
        <tr>
            <td colspan="2">
                <p>Matthias and Sea heeft uw reservering succesvol geregistreerd.</p>
                <p>Uw reservering is bevestigd.</p>
                <p>Geen zorgen, als er sprake is van overboeking, neemt het restaurant binnen 4 uur contact met u op.</p>
                <p>Als u meer informatie wilt, kunt u contact opnemen met 0497476548.</p>
                <p>Wij danken u en kijken uit naar uw komst.</p>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <p>Met vriendelijke groet,<br>
                MATTHIAS AND SEA<br>
                Adres: Route de Philippeville 34, 5651 Tarcienne<br>
                Telefoon: <a href="tel:+071218620" target="_blank">071 21 86 20</a><br>
                Email: <a href="mailto:info@matthiasandsea.be" target="_blank">info@matthiasandsea.be</a></p>
            </td>
        </tr>
    </table>
    <table class="footer">

        <tr>
            <th colspan="2">
                <p>Bedankt voor het kiezen van ons restaurant!</p>
            </th>
        </tr>
    </table>
</body>
</html>';



$mail->AltBody = '
Matthias and Sea heeft uw reservering succesvol geregistreerd.
Uw reservering is bevestigd.
Geen zorgen, in geval van overboeking zal het etablissement binnen 4 uur contact met u opnemen.

Als u meer informatie wilt, kunt u contact opnemen met 0497476548.

Met vriendelijke groet,
MATTHIAS AND SEA
Adres: Route de Philippeville 34, 5651 Tarcienne
Telefoon: <a href="tel:+071218620" target="_blank">071 21 86 20</a>
Email: <a href="mailto:info@matthiasandsea.be" target="_blank">info@matthiasandsea.be</a>
Wij danken u en kijken ernaar uit u te verwelkomen.
';

// Send the client email
if(!$mail->send()) {
    echo 'error';
} else {
        // Check if the email already exists in the database (case-insensitive)
    $checkSql = "SELECT COUNT(*) as count FROM emails WHERE LOWER(email) = LOWER('$email')";

    $checkResult = $mysql_db->query($checkSql);

    if ($checkResult) {
        $rowCount = $checkResult->fetch_assoc()['count'];

        // If the email is not duplicated, insert into the database
        if ($rowCount == 0) {
            // Insert form data into the database
            $insertSql = "INSERT INTO emails (email, firstname, phone_number, creation_date, active)
                          VALUES ('$email', '$name', '$phone', '$date', 1)";

            if ($mysql_db->query($insertSql) === TRUE) {
                echo 'success';
            } else {
                echo 'error';
            }
        } else {
            echo 'success';
        }
    } else {
        echo 'error';
    }
}

// Restaurant email
$mail->clearAllRecipients(); // Clear previous recipients
$mail->addAddress('<a href="mailto:info@matthiasandsea.be" target="_blank">info@matthiasandsea.be</a>', '<a href="mailto:info@matthiasandsea.be" target="_blank">info@matthiasandsea.be</a>');
$mail->Subject = 'Nieuwe Reserveringsorder - ' . $name . '';
if (!empty($notes)){
$mail->Body = '
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta http-equiv="Content-Type" content="text/html charset=UTF-8" />
    <title>Nieuwe Reserveringsdetails</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <th colspan="2" style="background-color: #0073e6; color: #ffffff; text-align: center; padding: 20px;">
                <h1>Nieuwe Reserveringsdetails</h1>
            </th>
        </tr>
        <tr>
            <td><strong>Naam:</strong></td>
            <td>' . $name . '</td>
        </tr>
        <tr>
            <td><strong>Email:</strong></td>
            <td>' . $email . '</td>
        </tr>
        <tr>
            <td><strong>Telefoon:</strong></td>
            <td>' . $phone . '</td>
        </tr>
        <tr>
            <td><strong>Datum:</strong></td>
            <td>' . $date . '</td>
        </tr>
        <tr>
            <td><strong>Aanwezigen:</strong></td>
            <td>' . $attendents . '</td>
        </tr>
        <tr>
            <td><strong>Notities:</strong></td>
            <td>' . $notes . '</td>
        </tr>
    </table>
</body>
</html>
';
// Send the restaurant email
$mail->AltBody = 'Nieuwe Reserveringsdetails

Naam: ' . $name . '
Email: ' . $email . '
Telefoon: ' . $phone . '
Datum: ' . $date . '
Aanwezigen: ' . $attendents . '
Notities: ' . $notes . '
';
    }else{
    $mail->Body = '
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta http-equiv="Content-Type" content="text/html charset=UTF-8" />
    <title>Nieuwe Reserveringsdetails</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <th colspan="2" style="background-color: #0073e6; color: #ffffff; text-align: center; padding: 20px;">
                <h1>Nieuwe Reserveringsdetails</h1>
            </th>
        </tr>
        <tr>
            <td><strong>Naam:</strong></td>
            <td>' . $name . '</td>
        </tr>
        <tr>
            <td><strong>Email:</strong></td>
            <td>' . $email . '</td>
        </tr>
        <tr>
            <td><strong>Telefoon:</strong></td>
            <td>' . $phone . '</td>
        </tr>
        <tr>
            <td><strong>Datum:</strong></td>
            <td>' . $date . '</td>
        </tr>
        <tr>
            <td><strong>Aanwezigen:</strong></td>
            <td>' . $attendents . '</td>
        </tr>
        <tr>
            <td><strong>Notes:</strong></td>
            <td>' . $notes . '</td>
        </tr>
    </table>
</body>
</html>
';
// Send the restaurant email
$mail->AltBody = 'Nieuwe Reserveringsdetails

Naam: ' . $name . '
Email: ' . $email . '
Telefoon: ' . $phone . '
Datum: ' . $date . '
Aanwezigen: ' . $attendents . '
';
}


// Send the client email
if ($mail->send()) {
    // Check if the email already exists in the database (case-insensitive)
    $checkSql = "SELECT COUNT(*) as count FROM emails WHERE LOWER(email) = LOWER('$email')";

    $checkResult = $mysql_db->query($checkSql);

    if ($checkResult) {
        $rowCount = $checkResult->fetch_assoc()['count'];

        // If the email is not duplicated, insert into the database
        if ($rowCount == 0) {
            // Insert form data into the database
            $insertSql = "INSERT INTO emails (email, firstname, phone_number, creation_date, active)
                          VALUES ('$email', '$name', '$phone', '$date', 1)";

            if ($mysql_db->query($insertSql) === TRUE) {
                echo 'success';
            } else {
                echo 'error';
            }
        } else {
            echo 'success';
        }
    } else {
        echo 'error';
    }
} else {
    echo 'error';
}

// Close the database connection
$mysql_db->close();
?>