<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="CGALE short track patin patin à glace vitesse sport grenoble echirolles short-track">
    <title>OMI</title>
    <link rel="stylesheet" href="scss/style.css">
    <script src="https://kit.fontawesome.com/5b938fc7f9.js" crossorigin="anonymous"></script>
</head>
<body>

<header id="nav">
    <?php
    include 'header.php';
    ?>
</header>


// Si l'utilisateur n'est pas connecté
<div id="connexion_card">
    <h1>Inscription</h1>
    <form id="connexion_content" action="action.php" method="post">
        <label>Email</label>
        <input type="text" id="inputEmail"/>
        <label>Login</label>
        <input type="text" id="inputLogin"/>
        <label>Password</label>
        <input type="password" id="inputPassword"/>
        <button id="btnSubmitConnexion">S'inscrire</button>
    </form>
</div>//envoyer vers connexion.php
<div id="already_registered">
    <a href="connexion.php">Déjà inscrit?</a>
</div>

<footer id="footer">
    <?php
    include 'footer.php';
    ?>
</footer>

</body>
</html>