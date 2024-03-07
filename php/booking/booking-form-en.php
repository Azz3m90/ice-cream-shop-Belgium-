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
$mail->Subject = 'Thanks for choosing Our Restaurant!';
$mail->isHTML(true);

$mail->Body = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Reservation Confirmation</title>
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
                <h1>Reservation Confirmation</h1>
            </th>
        </tr>
    </table>
    <table class="content">
        <tr>
            <td colspan="2">
                <p>Matthias and Sea has successfully recorded your reservation.</p>
                <p>Your reservation is confirmed.</p>
                <p>No worries, in case of overbooking, the restaurant will contact you within 4 hours.</p>
                <p>If you need more information, you can contact 0497476548.</p>
                <p>We thank you and look forward to your arrival.</p>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <p>Best regards,<br>
                MATTHIAS AND SEA<br>
                Address: Route de Philippeville 34, 5651 Tarcienne<br>
                Phone: <a href="tel:+071218620" target="_blank">071 21 86 20</a><br>
                Email: <a href="mailto:info@matthiasandsea.be" target="_blank">info@matthiasandsea.be</a></p>
            </td>
        </tr>
    </table>
    <table class="footer">
        <tr>
            <th colspan="2">
                <p>Thank you for choosing our restaurant!</p>
            </th>
        </tr>
    </table>
</body>
</html>';



$mail->AltBody = '
Matthias and Sea has successfully recorded your reservation.
Your reservation is confirmed.
No worries, in the event of overbooking, the establishment will contact you within 4 hours.

If you would like more information, you can contact 0497476548.
Best regards,
MATTHIAS AND SEA
Address: Route de Philippeville 34, 5651 Tarcienne
Phone: <a href="tel:+071218620" target="_blank">071 21 86 20</a></p>
Email: <a href="mailto:info@matthiasandsea.be" target="_blank">info@matthiasandsea.be</a>

We thank you and look forward to welcoming you.

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
$mail->Subject = 'New Reservation Order - ' . $name . '';
if (!empty($notes)) {
$mail->Body = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html charset=UTF-8" />
    <title>New Reservation Order</title>
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
                <h1>New Reservation Details</h1>
            </th>
        </tr>
        <tr>
            <td><strong>Name:</strong></td>
            <td>' . $name . '</td>
        </tr>
        <tr>
            <td><strong>Email:</strong></td>
            <td>' . $email . '</td>
        </tr>
        <tr>
            <td><strong>Phone:</strong></td>
            <td>' . $phone . '</td>
        </tr>
        <tr>
            <td><strong>Date:</strong></td>
            <td>' . $date . '</td>
        </tr>
        <tr>
            <td><strong>Attendents:</strong></td>
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
$mail->AltBody = 'New Reservation Details

Name: ' . $name . '
Email: ' . $email . '
Phone: ' . $phone . '
Date: ' . $date . '
Attendents: ' . $attendents . '
Notes: ' . $notes . '
';
    }else{
      $mail->Body = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html charset=UTF-8" />
    <title>New Reservation Order</title>
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
                <h1>New Reservation Details</h1>
            </th>
        </tr>
        <tr>
            <td><strong>Name:</strong></td>
            <td>' . $name . '</td>
        </tr>
        <tr>
            <td><strong>Email:</strong></td>
            <td>' . $email . '</td>
        </tr>
        <tr>
            <td><strong>Phone:</strong></td>
            <td>' . $phone . '</td>
        </tr>
        <tr>
            <td><strong>Date:</strong></td>
            <td>' . $date . '</td>
        </tr>
        <tr>
            <td><strong>Attendents:</strong></td>
            <td>' . $attendents . '</td>
        </tr>
    </table>
</body>
</html>
';  
// Send the restaurant email
$mail->AltBody = 'New Reservation Details

Name: ' . $name . '
Email: ' . $email . '
Phone: ' . $phone . '
Date: ' . $date . '
Attendents: ' . $attendents . '
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