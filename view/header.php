<link rel="stylesheet" href="./view/scss/style.css">
<h1>OMI</h1>
<div id="nav_container">
    <nav>
        <div><a href="index.php">Découvrir</a></div>
        <div><a href="index.php?controller=musique">Musique</a></div>
        <div><a href="index.php?controller=film">Films</a></div>
        <div><a href="index.php?controller=magazine">Magazines</a></div>
        <div><a href="index.php?controller=livre">Livres</a></div>
        <?php if (isset($_SESSION['user']) && $_SESSION['user']->isAdmin()) : ?>
        <div><a href="index.php?controller=utilisateur&action=connexion">Mon Compte</a>
            <?php elseif (!isset($_SESSION['user'])): ?>
            <div><a href="index.php?controller=utilisateur&action=inscription">Mon Compte</a>
                <?php endif; ?>
                <?php if (isset($_SESSION['user'])) : ?>
                    <div><a href="index.php?controller=utilisateur&action=deconnexion">Déconnnexion</a></div>
                <?php endif; ?>
    </nav>
</div>

<?php if (isset($_GET['controller']) && $_GET['controller'] != "cart") : ?>
<div class="basket">
    <a href="index.php?controller=cart">
        <i class="fas fa-shopping-basket"></i>
        <div class="basket_nb">
            <?php
            if (isset($_SESSION['cart'])) {
                echo sizeof($_SESSION['cart'], 1) - sizeof($_SESSION['cart']);
            } else {
                echo 0;
            }
            ?>
        </div>
    </a>
</div>
<?php endif ?>
