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
$mail->Subject = 'Merci d\'avoir choisi notre restaurant !';
$mail->isHTML(true);
$mail->Body = '<!DOCTYPE html>
<html lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Confirmation de réservation</title>
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
                <h1>Confirmation de réservation</h1>
            </th>
        </tr>
    </table>
    <table class="content">
        <tr>
            <td colspan="2">
                <p>Matthias and Sea a enregistré avec succès votre réservation.</p>
                <p>Votre réservation est confirmée.</p>
                <p>Pas d\'inquiétude, en cas de surréservation, le restaurant vous contactera dans les 4 heures.</p>
                <p>Si vous avez besoin de plus d\'informations, vous pouvez contacter le 0497476548.</p>
                <p>Nous vous remercions et sommes impatients de vous accueillir.</p>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <p>Cordialement,<br>
                MATTHIAS AND SEA<br>
                Adresse : Route de Philippeville 34, 5651 Tarcienne<br>
                Téléphone : <a href="tel:+071218620" target="_blank">071 21 86 20</a><br>
                <p>Email : <a href="mailto:info@matthiasandsea.be" target="_blank">info@matthiasandsea.be</a></p>
            </td>
        </tr>
    </table>
    <table class="footer">

        <tr>
            <th colspan="2">
                <>Merci d\'avoir choisi notre restaurant !</p>
            </th>
        </tr>
    </table>
</body>
</html>';


$mail->AltBody = ' Matthias and Sea a bien enregistré votre réservation.
Votre réservation est confirmée.
Pas d\'inquiétude, en cas de surréservation, la maison prendra contact avec vous dans les 4 heures.

Si vous souhaitez plus d\'informations, vous pouvez contacter le 0497476548.
Cordialement,
MATTHIAS AND SEA
Adresse : Route de Philippeville 34, 5651 Tarcienne
Téléphone : <a href="tel:+071218620" target="_blank">071 21 86 20</a>
Email : <a href="mailto:info@matthiasandsea.be" target="_blank">info@matthiasandsea.be</a>
Nous vous remercions et nous vous attendons.
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
$mail->Subject = 'Nouvelle commande de réservation - ' . $name . '';
if (!empty($notes)){
$mail->Body = '
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html charset=UTF-8" />
    <title>Nouveaux détails de réservation</title>
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
                <h1>Nouveaux détails de réservation</h1>
            </th>
        </tr>
        <tr>
            <td><strong>Nom :</strong></td>
            <td>' . $name . '</td>
        </tr>
        <tr>
            <td><strong>Email :</strong></td>
            <td>' . $email . '</td>
        </tr>
        <tr>
            <td><strong>Téléphone :</strong></td>
            <td>' . $phone . '</td>
        </tr>
        <tr>
            <td><strong>Date :</strong></td>
            <td>' . $date . '</td>
        </tr>
        <tr>
            <td><strong>Personnes :</strong></td>
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
$mail->AltBody = 'Nouveaux détails de réservation

Nom : ' . $name . '
Email : ' . $email . '
Téléphone : ' . $phone . '
Date : ' . $date . '
Personnes : ' . $attendents . '
Remarques: : ' . $notes . '
';
    }else{
     $mail->Body = '
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html charset=UTF-8" />
    <title>Nouveaux détails de réservation</title>
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
                <h1>Nouveaux détails de réservation</h1>
            </th>
        </tr>
        <tr>
            <td><strong>Nom :</strong></td>
            <td>' . $name . '</td>
        </tr>
        <tr>
            <td><strong>Email :</strong></td>
            <td>' . $email . '</td>
        </tr>
        <tr>
            <td><strong>Téléphone :</strong></td>
            <td>' . $phone . '</td>
        </tr>
        <tr>
            <td><strong>Date :</strong></td>
            <td>' . $date . '</td>
        </tr>
        <tr>
            <td><strong>Personnes :</strong></td>
            <td>' . $attendents . '</td>
        </tr>
    </table>
</body>
</html>
';   
// Send the restaurant email
$mail->AltBody = 'Nouveaux détails de réservation

Nom : ' . $name . '
Email : ' . $email . '
Téléphone : ' . $phone . '
Date : ' . $date . '
Personnes : ' . $attendents . '
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