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



<div id="connexion_card">
    <h1>Inscription</h1>
    <form id="connexion_content" action="index.php?controller=utilisateur&action=inscription" method="post">
        <label>Email</label>
        <input type="text" id="inputEmail" name="email"/>
        <label>Login</label>
        <input type="text" id="inputLogin" name="login"/>
        <label>Password</label>
        <input type="password" id="inputPassword" name="motdepasse"/>
        <?php if(isset($error)) : ?>
            <p><?=$error?></p>
        <?php endif;?>
        <button id="btnSubmitConnexion">S'inscrire</button>
    </form>
</div>
<div id="already_registered">
    <a href="index.php?controller=utilisateur&action=connexion">Déjà inscrit?</a>
</div>

<footer id="footer">
    <?php
    include 'footer.php';
    ?>
</footer>

</body>
</html>