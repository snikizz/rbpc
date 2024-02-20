<?php

// Import des classes PHPMailer dans l'espace de noms global
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';  
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Création d'une nouvelle instance de PHPMailer
$mail = new PHPMailer(true);

try {
    // Paramètres du serveur SMTP
    $mail->isSMTP();                                            // Envoi via SMTP
    $mail->Host       = 'smtp.gmail.com';                       // Serveur SMTP
    $mail->SMTPAuth   = true;                                   // Authentification SMTP activée
    $mail->Username   = 'rlamameri@gmail.com';                  // Nom d'utilisateur SMTP
    $mail->Password   = 'pjfe rnok wsws orql';                   // Mot de passe SMTP
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            // Cryptage TLS implicite activé
    $mail->Port       = 465;                                    // Port SMTP à utiliser

    // Destinataires
    $mail->setFrom('from@example.com', 'Mailer');
    $mail->addAddress('contact@rbpc.ovh', 'Joe User');          // Adresse e-mail du destinataire

    // Contenu HTML
    $mail->isHTML(true);                                        // Format de l'e-mail en HTML

    // Construire le message
    $message = '<div style="font-family: Arial, sans-serif; font-size: 14px;">';
    $message .= "<p>Merci $nom pour votre commande de montage PC. Nous avons reçu les informations suivantes :</p>";
    $message .= "<p><strong>Nom :</strong> $nom</p>";
    $message .= "<p><strong>Email :</strong> $email</p>";
    $message .= "<p><strong>Numéro de téléphone :</strong> $numero</p>";
    $message .= "<p><strong>Adresse Postale :</strong> $adresse</p>";
    // Ajouter d'autres champs du formulaire au message ici
    $message .= '</div>';

    // Tableau pour les coordonnées
    $coordonneesTableau = '<table style="border-collapse: collapse; width: 100%; max-width: 600px; margin-bottom: 20px; border: 1px solid #ddd;">';
    $coordonneesTableau .= '<tr><th colspan="2" style="background-color: #f2f2f2; padding: 10px;">Coordonnées</th></tr>';
    $coordonneesTableau .= "<tr><td style='padding: 10px; border-bottom: 1px solid #ddd;'><strong style='color: blue;'>Nom</strong></td><td style='padding: 10px; border-bottom: 1px solid #ddd;'>{$_POST['nom']}</td></tr>";
    $coordonneesTableau .= "<tr><td style='padding: 10px; border-bottom: 1px solid #ddd;'><strong style='color: blue;'>Email</strong></td><td style='padding: 10px; border-bottom: 1px solid #ddd;'>{$_POST['email']}</td></tr>";
    $coordonneesTableau .= "<tr><td style='padding: 10px; border-bottom: 1px solid #ddd;'><strong style='color: blue;'>Numéro</strong></td><td style='padding: 10px; border-bottom: 1px solid #ddd;'>{$_POST['numero']}</td></tr>";
    $coordonneesTableau .= "<tr><td style='padding: 10px;'><strong style='color: blue;'>Adresse Postale</strong></td><td style='padding: 10px;'>{$_POST['adresse']}</td></tr>";
    $coordonneesTableau .= '</table>';

    // Tableau pour les composants
    $composantsTableau = '<table style="border-collapse: collapse; width: 100%; max-width: 600px; border: 1px solid #ddd;">';
    $composantsTableau .= '<tr><th colspan="2" style="background-color: #f2f2f2; padding: 10px;">Composants</th></tr>';
    $composantsTableau .= "<tr><td style='padding: 10px; border-bottom: 1px solid #ddd;'><strong style='color: green;'>Processeur</strong></td><td style='padding: 10px; border-bottom: 1px solid #ddd;'>{$_POST['cpu']}</td></tr>";
    $composantsTableau .= "<tr><td style='padding: 10px; border-bottom: 1px solid #ddd;'><strong style='color: green;'>Carte graphique</strong></td><td style='padding: 10px; border-bottom: 1px solid #ddd;'>{$_POST['gpu']}</td></tr>";
    $composantsTableau .= "<tr><td style='padding: 10px; border-bottom: 1px solid #ddd;'><strong style='color: green;'>Ventirad / Watercooling</strong></td><td style='padding: 10px; border-bottom: 1px solid #ddd;'>{$_POST['ventirad-wc']}</td></tr>";
    $composantsTableau .= "<tr><td style='padding: 10px; border-bottom: 1px solid #ddd;'><strong style='color: green;'>Carte mère</strong></td><td style='padding: 10px; border-bottom: 1px solid #ddd;'>{$_POST['cm']}</td></tr>";
    $composantsTableau .= "<tr><td style='padding: 10px; border-bottom: 1px solid #ddd;'><strong style='color: green;'>Mémoire RAM</strong></td><td style='padding: 10px; border-bottom: 1px solid #ddd;'>{$_POST['ram']}</td></tr>";
    $composantsTableau .= "<tr><td style='padding: 10px; border-bottom: 1px solid #ddd;'><strong style='color: green;'>Stockage 1</strong></td><td style='padding: 10px; border-bottom: 1px solid #ddd;'>{$_POST['ssd-m_2_1']}</td></tr>";
    $composantsTableau .= "<tr><td style='padding: 10px; border-bottom: 1px solid #ddd;'><strong style='color: green;'>Stockage 2</strong></td><td style='padding: 10px; border-bottom: 1px solid #ddd;'>{$_POST['ssd-m_2_2']}</td></tr>";
    $composantsTableau .= "<tr><td style='padding: 10px;'><strong style='color: green;'>Stockage 3</strong></td><td style='padding: 10px;'>{$_POST['hdd_1']}</td></tr>";
    $composantsTableau .= "<tr><td style='padding: 10px;'><strong style='color: green;'>Boitier</strong></td><td style='padding: 10px;'>{$_POST['boitier']}</td></tr>";
    $composantsTableau .= "<tr><td style='padding: 10px;'><strong style='color: green;'>Alimentation</strong></td><td style='padding: 10px;'>{$_POST['alimentation']}</td></tr>";
    $composantsTableau .= '</table>';

    // Tableau pour les options
    $optionsTableau = '<table style="border-collapse: collapse; width: 100%; max-width: 600px; border: 1px solid #ddd; margin-top: 20px;">';
    $optionsTableau .= '<tr><th colspan="2" style="background-color: #f2f2f2; padding: 10px;">Options</th></tr>';
    $optionsTableau .= "<tr><td style='padding: 10px;'><strong style='color: red;'>Installation de Windows 10/11 et activation de Windows 10/11 Pro</strong></td><td style='padding: 10px;'>{$_POST['os']}</td></tr>";
    $optionsTableau .= "<tr><td style='padding: 10px;'><strong style='color: red;'>Installation des pilotes/drivers, activation de l’XMP dans le BIOS pour la RAM, mises à jours Windows Update et logiciels de gestion de RGB/Watercooling/Périphériques</strong></td><td style='padding: 10px;'>{$_POST['drivers']}</td></tr>";
    $optionsTableau .= "<tr><td style='padding: 10px;'><strong style='color: red;'>Tests des performances du PC : vérification des températures, performances en jeu, pourcentage d’utilisation des composants. Via, CPU-Z,...</strong></td><td style='padding: 10px;'>{$_POST['test']}</td></tr>";
    $optionsTableau .= '</table>';

    // Corps du message
    $message = '<div style="font-family: Arial, sans-serif; font-size: 14px;">';
    $message .= $coordonneesTableau . $composantsTableau . $optionsTableau;
    $message .= '</div>';

    // Sujet de l'e-mail
    $mail->Subject = 'Formulaire Montage PC';

    // Corps de l'e-mail
    $mail->Body = $message;

    // Envoi de l'e-mail
    $mail->send();
    
     // Redirection vers la page de remerciement
     header("Location: thank-you.php");
     exit;

    echo 'Message a été envoyé';

} catch (Exception $e) {

    echo "Le message n'a pas pu être envoyé. Erreur du mailer : {$mail->ErrorInfo}";

}
