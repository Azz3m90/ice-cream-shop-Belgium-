<?php
require_once '.././vendor/autoload.php';
require_once '.././config/config.php';

use PHPMailer\PHPMailer\PHPMailer;

// Fonction pour générer le contenu HTML élégant de l'e-mail pour les clients
$image_dir = '../../assets/img/gelatonaturale.svg';
function getClientEmailContent($name,)
{
    // Contenu HTML de l'e-mail pour le client
    $content = '<html>

<head>
</head>

<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0;">
    <table cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
        <!-- Header -->
        <tr>
            <td bgcolor="#009246" style="padding: 20px; text-align: center; border-radius: 10px 10px 0 0; color: #fff;">
                <img src="https://gelatonaturale.be/gelatonaturale/assets/img/gelatonaturale80px.svg" alt="Gelato Naturale" style="max-width: 80px; max-height: 80px;">
                <h1 style="margin: 0;">Confirmation de réservation</h1>
            </td>
        </tr>
        <!-- Content -->
        <tr>
            <td bgcolor="#ffffff" style="padding: 20px; border-radius: 0 0 10px 10px;">
                <p>Cher/Chère '.$name.',</p>
                <p>Votre réservation a été enregistrée avec succès. Nous vous remercions pour votre confiance.</p>
                <p>Nous vous contacterons dès que possible pour confirmer les détails de votre réservation.</p>
                <p>Cordialement,</p>
                <p>Équipe Gelato Naturale Tarcienne</p>
            </td>
        </tr>
        <!-- Footer -->
        <tr>
            <td bgcolor="#ce2b37" style="padding: 10px; text-align: center; border-radius: 0 0 10px 10px; color: #fff;">
                <p>Merci d\'avoir choisi Gelato Naturale Tarcienne !</p>
            </td>
        </tr>
    </table>
</body>

</html>';

    return $content;
}

// Fonction pour générer le contenu texte brut de l'e-mail pour les clients
function getClientPlainTextContent($name)
{
    // Contenu texte brut de l'e-mail pour le client
    $content = "Cher/Chère $name,\n\nVotre réservation a été enregistrée avec succès. Nous vous remercions pour votre confiance.\nNous vous contacterons dès que possible pour confirmer les détails de votre réservation.\n\nCordialement,\nÉquipe Gelato Naturale Tarcienne";

    return $content;
}

// Fonction pour générer le contenu HTML élégant de l'e-mail pour le magasin
function getStoreEmailContent($name, $email, $phone, $delivery_date, $delivery_address, $comment)
{
    // Contenu HTML de l'e-mail pour le magasin
    $content = '
<html>

<head>
</head>

<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0;">
    <table cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
        <!-- Header -->
        <tr>
            <td bgcolor="#009246" style="padding: 20px; text-align: center; border-radius: 10px 10px 0 0; color: #fff;">
                <h1 style="margin: 0;">Nouvelle réservation</h1>
            </td>
        </tr>
        <!-- Content -->
        <tr>
            <td bgcolor="#ffffff" style="padding: 20px; border-radius: 0 0 10px 10px;">
                <p style="margin-top: 0;">Une nouvelle réservation a été enregistrée :</p>
                <table cellpadding="8" cellspacing="0" width="100%" style="border-collapse: collapse;">
                    <tr>
                        <td style="border-bottom: 1px solid #ddd;">Nom</td>
                        <td style="border-bottom: 1px solid #ddd;">'.$name.'</td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 1px solid #ddd;">E-mail</td>
                        <td style="border-bottom: 1px solid #ddd;">'.$email.'</td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 1px solid #ddd;">Téléphone</td>
                        <td style="border-bottom: 1px solid #ddd;">'.$phone.'</td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 1px solid #ddd;">Date de livraison</td>
                        <td style="border-bottom: 1px solid #ddd;">'.$delivery_date.'</td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 1px solid #ddd;">Adresse de livraison</td>
                        <td style="border-bottom: 1px solid #ddd;">'.$delivery_address.'</td>
                    </tr>
                    <tr>
                        <td style="border-bottom: 1px solid #ddd;">Commentaire</td>
                        <td style="border-bottom: 1px solid #ddd;">'.$comment.'</td>
                    </tr>
                </table>
            </td>
        </tr>
        <!-- Footer -->
        <tr>
            <td bgcolor="#ce2b37" style="padding: 10px; text-align: center; border-radius: 0 0 10px 10px; color: #fff;">
                <p style="margin: 0;">Grazie per aver elaborato questa prenotazione rapidamente.</p>
            </td>
        </tr>
    </table>
</body>

</html>';

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

// Créer un nouvel objet PHPMailer
$mail = new PHPMailer();

// Configurer SMTP
$mail->isSMTP();
$mail->Host = 'mail.infomaniak.com';
$mail->SMTPAuth = true;
$mail->Username = 'info@matthiasandsea.be';
$mail->Password = 'Matteo1998';
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;
$mail->CharSet = 'UTF-8';

// Récupérer les données du formulaire
$name = trim($_POST['name']);
$surname = trim($_POST['surname']);
$company = trim($_POST['company']);
$phone = trim($_POST['phone']);
$email = trim($_POST['email']);
$sector = trim($_POST['sector']);
$delivery_date = trim($_POST['delivery_date']);
$delivery_address = trim($_POST['delivery_address']);
$comment = trim($_POST['comment']);

// Vérifier si l'adresse e-mail existe déjà dans la base de données
$emailExistsQuery = "SELECT * FROM emails WHERE email = '$email'";
$result = $mysql_db->query($emailExistsQuery);

if ($result->num_rows === 0) { // Si l'adresse e-mail n'existe pas, continuer
    // E-mail au client
    // E-mail au magasin
    $insertSql = "INSERT INTO emails (name, surname, company, phone, email, sector, delivery_date, delivery_address, comment, creation_date, active)
    VALUES ('$name', '$surname', '$company', '$phone', '$email', '$sector', '$delivery_date', '$delivery_address', '$comment', current_timestamp(), 1)";

    $mysql_db->query($insertSql);
    $mail->setFrom('info@matthiasandsea.be', 'Gelato Naturale Tarcienne');
    $mail->addAddress($email, $name);
    $mail->Subject = 'Confirmation de réservation';
    $mail->isHTML(true);
    $mail->Body = getClientEmailContent($name);
    $mail->AltBody = getClientPlainTextContent($name); // Alternative texte brut

    // E-mail au magasin
    $storeEmailContent = getStoreEmailContent($name, $email, $phone, $delivery_date, $delivery_address, $comment);
    $storePlainTextContent = getStorePlainTextContent($name, $email, $phone, $delivery_date, $delivery_address, $comment);
    // Envoyer l'e-mail au magasin
    if (!$mail->send()) {
        echo 'error';
    } else {
        echo 'success';
    }
    $mail->clearAllRecipients(); // Effacer les destinataires précédents
    $mail->addAddress('info@matthiasandsea.be', 'Gelato Naturale Tarcienne');
    $mail->Subject = 'Nouvelle réservation - ' . $name;
    $mail->Body = $storeEmailContent;
    $mail->AltBody = $storePlainTextContent; // Alternative texte brut

    // Envoyer l'e-mail au magasin
    if (!$mail->send()) {
        echo 'error';
    } else {
        echo 'success';
    }
    // Fermer la connexion à la base de données
    $mysql_db->close();
    
} else {
    // L'adresse e-mail existe déjà dans la base de données, ne pas ajouter à la base de données
    $mail->setFrom('info@matthiasandsea.be', 'Gelato Naturale Tarcienne');
    $mail->addAddress($email, $name);
    $mail->Subject = 'Confirmation de réservation';
    $mail->isHTML(true);
    $mail->Body = getClientEmailContent($name);
    $mail->AltBody = getClientPlainTextContent($name); // Alternative texte brut

    // E-mail au magasin
    $storeEmailContent = getStoreEmailContent($name, $email, $phone, $delivery_date, $delivery_address, $comment);
    $storePlainTextContent = getStorePlainTextContent($name, $email, $phone, $delivery_date, $delivery_address, $comment);
    // Envoyer l'e-mail au magasin
    if (!$mail->send()) {
        echo 'error';
    } 
    $mail->clearAllRecipients(); // Effacer les destinataires précédents
    $mail->addAddress('info@matthiasandsea.be', 'Gelato Naturale Tarcienne');
    $mail->Subject = 'Nouvelle réservation - ' . $name;
    $mail->Body = $storeEmailContent;
    $mail->AltBody = $storePlainTextContent; // Alternative texte brut

    // Envoyer l'e-mail au magasin
    if (!$mail->send()) {
        echo 'error';
    } else {
        echo 'success';
    }
   
}
?>