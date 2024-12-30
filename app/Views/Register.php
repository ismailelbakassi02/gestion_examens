<!DOCTYPE html>
<html>
<head>
    <title>Atelier</title>
    <link rel="stylesheet" type="text/css" href="css/css.css">
</head>
<body>
    <a class="first" href="index.php">
        <button>
            <svg height="16" width="16" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 1024 1024">
                <path d="M874.690416 495.52477c0 11.2973-9.168824 20.466124-20.466124 20.466124l-604.773963 0 188.083679 188.083679c7.992021 7.992021 7.992021 20.947078 0 28.939099-4.001127 3.990894-9.240455 5.996574-14.46955 5.996574-5.239328 0-10.478655-1.995447-14.479783-5.996574l-223.00912-223.00912c-3.837398-3.837398-5.996574-9.046027-5.996574-14.46955 0-5.433756 2.159176-10.632151 5.996574-14.46955l223.019353-223.029586c7.992021-7.992021 20.957311-7.992021 28.949332 0 7.992021 8.002254 7.992021 20.957311 0 28.949332l-188.073446 188.073446 604.753497 0C865.521592 475.058646 874.690416 484.217237 874.690416 495.52477z"></path>
            </svg>
            <span>Retour </span>
        </button>
    </a>
    <div align="center">
        <form action="http://localhost/gestion_examens/gestion_examens/codeigniter4-framework-2849e7f/public/register/store" method="POST">
            <strong>Entrer votre Nom</strong>
            <input type="text" name="name" class="champ" size="25" required placeholder="Nom">
            <strong>Entrer votre Email</strong>
            <input type="email" name="email" class="champ" size="25" required placeholder="Email">
            <strong>Entrer votre Adresse</strong>
            <input type="text" name="adresse" class="champ" size="25" required placeholder="Adresse">
            <strong>Entrer Date de naissance :</strong>
            <input class="champ" type="date" name="date_birth" required>
            <strong>Mot de passe</strong>
            <input type="password" name="password" class="champ" size="25" required placeholder="Mot de passe">
            <input type="submit" value="Register" class="bouton">
            <p>Vous avez déjà un compte ? <a href="http://localhost/gestion_examens/gestion_examens/codeigniter4-framework-2849e7f/public/login">Se connecter</a></p>
        </form>
    </div>
</body>
</html>