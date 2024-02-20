<?php

// Import des classes PHPMailer dans l'espace de noms global
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';  
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Cr�ation d'une nouvelle instance de PHPMailer
$mail = new PHPMailer(true);

try {
    // Param�tres du serveur SMTP
    $mail->isSMTP();                                            // Envoi via SMTP
    $mail->Host       = 'smtp.gmail.com';                       // Serveur SMTP
    $mail->SMTPAuth   = true;                                   // Authentification SMTP activ�e
    $mail->Username   = 'rlamameri@gmail.com';                  // Nom d'utilisateur SMTP
    $mail->Password   = 'pjfe rnok wsws orql';                   // Mot de passe SMTP
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            // Cryptage TLS implicite activ�
    $mail->Port       = 465;                                    // Port SMTP � utiliser

    // Destinataires
    $mail->setFrom('from@example.com', 'Mailer');
    $mail->addAddress('contact@rbpc.ovh', 'Joe User');
    $mail->addAddress('badembapc@gmail.com', 'User');

    // Contenu HTML
    $mail->isHTML(true);                                        // Format de l'e-mail en HTML

    // Construire le message
    $message = '<div style="font-family: Arial, sans-serif; font-size: 14px;">';
    $message .= "<p>Merci $nom pour votre commande de montage PC. Nous avons re�u les informations suivantes :</p>";
    $message .= "<p><strong>Nom :</strong> $nom</p>";
    $message .= "<p><strong>Email :</strong> $email</p>";
    $message .= "<p><strong>Num�ro de t�l�phone :</strong> $numero</p>";
    $message .= "<p><strong>Adresse Postale :</strong> $adresse</p>";
    // Ajouter d'autres champs du formulaire au message ici
    $message .= '</div>';

    // Tableau pour les coordonn�es
    $coordonneesTableau = '<table style="border-collapse: collapse; width: 100%; max-width: 600px; margin-bottom: 20px; border: 1px solid #ddd;">';
    $coordonneesTableau .= '<tr><th colspan="2" style="background-color: #f2f2f2; padding: 10px;">Coordonnees</th></tr>';
    $coordonneesTableau .= "<tr><td style='padding: 10px; border-bottom: 1px solid #ddd;'><strong style='color: blue;'>Nom</strong></td><td style='padding: 10px; border-bottom: 1px solid #ddd;'>{$_POST['nom']}</td></tr>";
    $coordonneesTableau .= "<tr><td style='padding: 10px; border-bottom: 1px solid #ddd;'><strong style='color: blue;'>Email</strong></td><td style='padding: 10px; border-bottom: 1px solid #ddd;'>{$_POST['email']}</td></tr>";
    $coordonneesTableau .= "<tr><td style='padding: 10px; border-bottom: 1px solid #ddd;'><strong style='color: blue;'>Numero</strong></td><td style='padding: 10px; border-bottom: 1px solid #ddd;'>{$_POST['phone']}</td></tr>";
    $coordonneesTableau .= "<tr><td style='padding: 10px;'><strong style='color: blue;'>Adresse Postale</strong></td><td style='padding: 10px;'>{$_POST['adresse']}</td></tr>";
    $coordonneesTableau .= '</table>';

    // Tableau pour les composants
    $composantsTableau = '<table style="border-collapse: collapse; width: 100%; max-width: 600px; border: 1px solid #ddd;">';
    $composantsTableau .= '<tr><th colspan="2" style="background-color: #f2f2f2; padding: 10px;">Questions</th></tr>';
    $composantsTableau .= "<tr><td style='padding: 10px; border-bottom: 1px solid #ddd;'><strong style='color: green;'>Quel est votre budget ?</strong></td><td style='padding: 10px; border-bottom: 1px solid #ddd;'>{$_POST['budget']}</td></tr>";
    $composantsTableau .= "<tr><td style='padding: 10px; border-bottom: 1px solid #ddd;'><strong style='color: green;'>Quelle est l'utilisation du PC ?</strong></td><td style='padding: 10px; border-bottom: 1px solid #ddd;'>{$_POST['utilisation']}</td></tr>";
    $composantsTableau .= "<tr><td style='padding: 10px; border-bottom: 1px solid #ddd;'><strong style='color: green;'>Critaires esthetique (RGB, preferences couleurs / boitier, grand petit etc...)</strong></td><td style='padding: 10px; border-bottom: 1px solid #ddd;'>{$_POST['preferences']}</td></tr>";
    $composantsTableau .= "<tr><td style='padding: 10px; border-bottom: 1px solid #ddd;'><strong style='color: green;'>Moyen de connexion A Internet</strong></td><td style='padding: 10px; border-bottom: 1px solid #ddd;'>{$_POST['internet']}</td></tr>";
    $composantsTableau .= "<tr><td style='padding: 10px; border-bottom: 1px solid #ddd;'><strong style='color: green;'>Peripheriques supplementaires que vous voulez COMMANDER</strong></td><td style='padding: 10px; border-bottom: 1px solid #ddd;'>{$_POST['peripheriques']}</td></tr>";
    $composantsTableau .= "<tr><td style='padding: 10px; border-bottom: 1px solid #ddd;'><strong style='color: green;'>Composants deja en votre possession</strong></td><td style='padding: 10px; border-bottom: 1px solid #ddd;'>{$_POST['composants']}</td></tr>";
    $composantsTableau .= "<tr><td style='padding: 10px; border-bottom: 1px solid #ddd;'><strong style='color: green;'>Jeux joues</strong></td><td style='padding: 10px; border-bottom: 1px solid #ddd;'>{$_POST['jeux']}</td></tr>";
    $composantsTableau .= "<tr><td style='padding: 10px;'><strong style='color: green;'>Logiciels utilises</strong></td><td style='padding: 10px;'>{$_POST['logiciels']}</td></tr>";
    $composantsTableau .= "<tr><td style='padding: 10px;'><strong style='color: green;'>Pays de residence</strong></td><td style='padding: 10px;'>{$_POST['pays']}</td></tr>";
    $composantsTableau .= "<tr><td style='padding: 10px;'><strong style='color: green;'>Pour vous ou pour quelqu'un d'autre</strong></td><td style='padding: 10px;'>{$_POST['pour-qui']}</td></tr>";
    $composantsTableau .= "<tr><td style='padding: 10px;'><strong style='color: green;'>Si paiement en plusieurs fois, precisez le</strong></td><td style='padding: 10px;'>{$_POST['paiement']}</td></tr>";
    $composantsTableau .= '</table>';;
    
    // Corps du message
    $message = '<div style="font-family: Arial, sans-serif; font-size: 14px;">';
    $message .= $coordonneesTableau . $composantsTableau ;
    $message .= '</div>';

    // Sujet de l'e-mail
    $mail->Subject = 'Formulaire Pc Sur Mesure';

    // Corps de l'e-mail
    $mail->Body = $message;

    // Envoi de l'e-mail
    $mail->send();
    
     // Redirection vers la page de remerciement
     header("Location: thank-you.php");
     exit;

    echo 'Message a �t� envoy�';

} catch (Exception $e) {

    echo "Le message n'a pas pu �tre envoy�. Erreur du mailer : {$mail->ErrorInfo}";

}
