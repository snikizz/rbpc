<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Montage PC</title>
</head>
<body>
    <h1>Formulaire de Montage PC</h1>
    <form action="send_email.php" method="post">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required><br><br>
        
        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="numero">Numéro de téléphone :</label>
        <input type="text" id="numero" name="numero" required><br><br>
        
        <label for="adresse">Adresse Postale :</label>
        <textarea id="adresse" name="adresse" required></textarea><br><br>
        
        <!-- Autres champs du formulaire -->

        <input type="submit" value="Envoyer">
    </form>
</body>
</html>
