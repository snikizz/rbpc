<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Merci pour votre commande !</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="medias/favicon.ico" />
    <script src="https://kit.fontawesome.com/0cc17e4337.js" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h1 {
            color: #333;
            margin-bottom: 20px;
        }
        p {
            color: #666;
            margin-bottom: 30px;
            line-height: 1.6;
        }
        .btn {
            display: inline-block;
            background-color: #4CAF50;
            color: #fff;
            text-decoration: none;
            padding: 12px 24px;
            border-radius: 5px;
            transition: background-color 0.3s;
            font-size: 16px;
            border: none;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #45a049;
        }
        .footer {
            background-color: #333;
            color: #fff;
            padding: 20px 0;
            text-align: center;
            font-size: 14px;
        }
        .footer a {
            color: #fff;
            text-decoration: none;
            margin: 0 10px;
        }
        .footer a:hover {
            text-decoration: underline;
        }
        .credit {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <!--HEADER DEBUT-->
    <header>
        <div class="logo">
            <a href="index.html"><img src="medias/logo_rbpc.png" alt=""></a>
        </div>
        <nav>
            <input type="checkbox" id="click">
            <label for="click" class="menu-btn">
            <i class="fas fa-bars"></i>
            </label>
            <ul>
                <li><a class="ici" href="index.html">Accueil</a></li>
                <li><a  href="montage-pc.html">Montage PC</a></li>
                <li><a href="sur-mesure.html">Sur mesure</a></li>
                <li><a href="categories.html">Catégories PC</a></li>
                <li><a href="ordinateurs.html">Ordinateurs PC</a></li>
            </ul> 
        </nav>

        <div class="icons">
            <a href="montage-pc.html"><i class="fa-solid fa-screwdriver-wrench" id="i-montage"></i></a>
            <a href="tel:+33761535842"><i class="fa-sharp fa-solid fa-phone" id="tel" ></i></a>
            <a target="_blank" href="https://goo.gl/maps/CY2kd35wB6ZYNVE87"><i class="fa-solid fa-location-dot" id="localisation" ></i></a>
        </div>
    </header>
    <!--HEADER FIN-->

    <div class="espace"></div>

    <!-- CONTENU DE LA PAGE -->
    <div class="container">
        <img src="medias/logo_rbpc.png" alt="Merci" style="width: 150px; margin-bottom: 20px;">
        <h1>Merci pour votre commande !</h1>
        <p>Votre demande de montage PC a bien été reçue. Nous vous contacterons dans les plus brefs délais.</p>
        
        <!-- Bouton pour revenir à la page d'accueil -->
        <a href="index.html" class="btn" style="background-color: #d4b776;">Retour à l'accueil</a>
    </div>
    <!-- FIN DU CONTENU -->

    <!--FOOTER DEBUT-->
    <section class="footer">
        <div class="box-container">
            <div class="box">
                <h3> RBPC </h3>
                <p>L'informatique sur mesure !</p>
                <div class="share">
                    <a target="_blank"   href="https://tiktok.com/@rbpcfr" class="fab fa-tiktok"></a>
                    <a target="_blank" href="https://twitter.com/rbpcfr" class="fab fa-twitter"></a>
                    <a target="_blank" href="https://instagram.com/rbpcfr" class="fab fa-instagram"></a>
                    <a target="_blank" href="https://youtube.com/@rbpcfr" class="fab fa-youtube"></a>
                    <a target="_blank" href="https://linkedin.com/rbpcfr" class="fab fa-linkedin"></a>
                </div>
            </div>
            <div class="box">
                <h3>Nous contacter</h3>
                <a href="tel:+33761535842" class="links"> <i class="fas fa-phone"></i> 06 09 22 81 90 </a>
                <a href="mailto:contact.rbpc.fr" class="links"> <i class="fas fa-envelope"></i> contact@rbpc.fr </a>
                <a target="_blank" href="https://goo.gl/maps/CY2kd35wB6ZYNVE87" class="links"> <i class="fas fa-map-marker-alt"></i> Île-de-France </a>
            </div>
            <div class="box">
                <h3>Liens rapides</h3>
                <a href="index.html" class="links"> <i class="fas fa-arrow-right"></i> Accueil </a>
                <a href="montage-pc.html" class="links"> <i class="fas fa-arrow-right"></i> Montage PC</a>
                <a href="sur-mesure.html" class="links"> <i class="fas fa-arrow-right"></i> Sur Mesure </a>
                <a href="categories.html" class="links"> <i class="fas fa-arrow-right"></i> Catégories PC </a>
                <a href="ordinateurs.html" class="links"> <i class="fas fa-arrow-right"></i> Ordinateurs </a>
            </div>
            <div class="box">
                <h3>Moyens de paiement</h3>
                <img src="medias/payment.png" alt="">
            </div>
        </div>
        <div class="credit">© 2023 Tous droits réservés RBPC</div>
    </section>
    <!--FOOTER FIN-->
</body>
</html>
