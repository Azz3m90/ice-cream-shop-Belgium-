<?php

// Start with PHPMailer class
use PHPMailer\PHPMailer\PHPMailer;
require_once './vendor/autoload.php';
// create a new object
$mail = new PHPMailer();
// configure an SMTP
$mail->isSMTP();
$mail->Host = 'SSL0.OVH.NET';
$mail->SMTPAuth = true;
$mail->Username = 'cs@caresine.com';
$mail->Password = '$CS963963*';
$mail->SMTPSecure = false;
$mail->Port = 587;
$mail->CharSet = 'UTF-8';

$name = trim($_POST['name']);
$email = trim($_POST['email']);
$phone = trim($_POST['phone']);
$date = trim($_POST['date']);
$attendents = trim($_POST['attendents']);
//$lang = trim($_POST['lang']);
$subject = 'Reservation from your website.';
$mail->setFrom('cs@caresine.com', 'cs@caresine.com');
$mail->addAddress($email, $name);
$mail->addAddress('cs@caresine.com', 'cs@caresine.com');
$mail->Subject = 'Thanks for choosing Our Restaurant!';
// Set HTML
$mail->isHTML(TRUE);

$mail->Body = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type"  content="text/html charset=UTF-8" />
    <title>Confirmation of Your Reservation</title>
</head>
<body>
<table cellspacing="0" cellpadding="0" width="100%">
    <tr>
        <td align="center">
            <table width="600" cellspacing="0" cellpadding="0" style="border: 1px solid #ccc; border-collapse: collapse; margin: 0 auto; font-family: Arial, sans-serif;">
                <tr>
                    <td style="background-color: #0073e6; color: #ffffff; text-align: center; padding: 20px;">
                        <h1>Confirmation of Your Reservation</h1>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 20px;">
                        <p>Hello '. $name .',</p>
                        <p>We have received your reservation for '. $attendents .' people on '. $date .' that you made on our website.</p>
                        <p>We look forward to seeing you in our restaurant.</p>
                        <p><strong>Best regards,</strong></p>
                        <p><strong>MATTHIAS AND SEA</strong></p>
                        <p><strong>Address :</strong> Route de Philippeville 34<br>5651 Tarcienne</p>
                        <p><strong>Telephone :</strong> <a href="tel:+071218620" target="_blank">071 21 86 20</a></p>
                        <p><strong>Email :</strong> <a href="mailto:cs@caresine.com">cs@caresine.com</a></p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>
';
$mail->AltBody = 'Hello '.$name.',
We have received your reservation for '.$attendents.' people on '.$date.' that you made on our website.
We look forward to seeing you in our restaurant.
Best regards,
MATTHIAS AND SEA
Address: Route de Philippeville 34, 5651 Tarcienne
Telephone: <a href="tel:+071218620" target="_blank">071 21 86 20</a>
Email: cs@caresine.com
';



// add attachment
// just add the '/path/to/file.pdf'
//$attachmentPath = './confirmations/yourbooking.pdf';
//if (file_exists($attachmentPath)) {
//    $mail->addAttachment($attachmentPath, 'yourbooking.pdf');
//}

// send the message
if(!$mail->send()){
    echo 'error';
   // echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'success';
}


?>
