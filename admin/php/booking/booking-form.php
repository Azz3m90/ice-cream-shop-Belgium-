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
$mail->Subject = "Merci d'avoir choisi notre restaurant !";
// Set HTML
$mail->isHTML(TRUE);

$mail->Body = '<!DOCTYPE html>
<html lang="fr">
<head>
    <meta http-equiv="Content-Type"  content="text/html charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votre Réservation</title>
</head>
<body>
<table cellspacing="0" cellpadding="0" width="100%">
    <tr>
        <td align="center">
            <table width="600" cellspacing="0" cellpadding="0" style="border: 1px solid #ccc; border-collapse: collapse; margin: 0 auto; font-family: Arial, sans-serif;">
                <tr>
                    <td style="background-color: #0073e6; color: #ffffff; text-align: center; padding: 20px;">
                        <h1>Votre Réservation</h1>
                    </td>
                </tr>
                <tr>
                    <td style="padding: 20px;">
                        <p>Bonjour '.$name.',</p>
                        <p>Nous avons bien reçu votre réservation, pour '.$attendents.' personnes le  '.$date.', que vous avez effectuée sur notre site internet.</p>
                        <p>Au plaisir de vous voir dans notre restaurant.</p>
                        <p><strong>Bien cordialement,</strong></p>
                        <p><strong>MATTHIAS AND SEA</strong></p>
                        <p><strong>Adresse :</strong> Route de Philippeville 34</p>
                        <p><strong>5651 Tarcienne</strong></p>
                        <p><strong>Téléphone :</strong> <a href="tel:+071218620" target="_blank">071 21 86 20</a></p>
                        <p><strong>Email :</strong> <a href="mailto:cs@caresine.com">cs@caresine.com</a></p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>

            </td>
        </tr>
    </table>
</body>
</html>
  ';
$mail->AltBody = 'Sujet: Votre Réservation

Bonjour '.$name.',

Nous avons bien reçu votre réservation, pour '.$attendents.' personnes le '.$date.', que vous avez effectuée sur notre site internet.

Au plaisir de vous voir dans notre restaurant.

Bien cordialement,

MATTHIAS AND SEA

Adresse : Route de Philippeville 34
5651 Tarcienne
Téléphone : <a href="tel:+071218620" target="_blank">071 21 86 20</a>
Email : cs@caresine.com
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
