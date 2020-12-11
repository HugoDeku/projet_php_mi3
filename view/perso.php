<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>ESPACE ABONNÉ</title>
    <link rel="stylesheet" href="scss/style.css">
    <script src="js/jquery-3.5.1.min.js"></script>
    <script>
        $(function(){
            $("#nav").load("header.html");
            $("#footer").load("footer.html");
        });
    </script>
</head>
<body>

<header id="nav"></header>
<body>
<ul>
    <li>Connexion</li>
    <li>Mes informations
        <ol>
            <li> Nom Prénom</li>
            <li> Numéro de téléphone</li>
            <li> Email</li>
        </ol>
    </li>

    <li>Messagerie</li>
    <li>Historique</li>
</ul>
<footer id="footer"></footer>
</body>
</html>