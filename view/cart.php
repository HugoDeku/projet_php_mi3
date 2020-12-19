<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>OMI • Panier</title>
    <link rel="stylesheet" href="scss/style.css">
    <script src="https://kit.fontawesome.com/5b938fc7f9.js" crossorigin="anonymous"></script>
</head>
<body>

<header id="nav">
    <?php
    include 'header.php';
    ?>
</header>
<body>

<?php if (isset($user)) : ?>
    <h1 class="cart_title">Voici votre panier, <?= $user->getPseudo() ?> !</h1>
<?php else: ?>
    <h1 class="cart_title">Voici votre panier !</h1>
<?php endif; ?>

<div id="product_grid" class="cart">
    <?php if (isset($categories)): ?>
    <?php foreach ($categories

    as $category) {
    $category_name = array_search($category, $categories);
    foreach ($category

    as $item) { ?>

    <?php if ($category_name == "musique"): ?>
        <a href="index.php?controller=musique&action=afficher&id=<?= $item->getId() ?>">
            <div class="product_card cart_item">
                <img class="product_image_cd" src="<?= $item->getImage() ?>"/>
                <h2 class="product_name"><?= $item->getTitre() ?></h2>
                <p class="product_artist"><?= $item->getArtiste() ?></p>
                <p class="product_date"><?= $item->getYear() ?></p>
            </div>
        </a>
    <?php elseif ($category_name == "film") : ?>
    <a href="index.php?controller=film&action=afficher&id=<?= $item->getId() ?>">
        <div class="product_card cart_item">
            <img class="product_image_dvd" src="<?= $item->getImage() ?>"/>
            <h2 class="product_name"><?= $item->getTitre() ?></h2>
            <p class="product_artist"><?= $item->getRealisateur() ?></p>
            <p class="product_date"><?= $item->getYear() ?></p>
        </div>
    </a>
    <?php elseif ($category_name == "livre") : ?>
    <a href="index.php?controller=livre&action=afficher&id=<?= $item->getId() ?>">
        <div class="product_card cart_item">
            <img class="product_image_livre" src="<?= $item->getImage() ?>"/>
            <h2 class="product_name"><?= $item->getTitre() ?></h2>
            <p class="product_artist"><?= $item->getAuteur() ?></p>
            <p class="product_date"><?= $item->getYear() ?></p>
        </div>
    </a>
    <?php endif ?>
</div>
<?php }
} ?>
<?php endif; ?>

</div>

<div id="cart_buttons">
    <button id="back"><a href="index.php">Retour</a></button>
    <button id="empty"><a href="index.php?controller=cart&action=empty"> Vider</a></button>
    <button id="add_to_emprunts"><a href="index.php?controller=cart&action=valider"> Emprunter</a></button>
</div>


<footer id="footer">
    <?php
    include 'footer.php';
    ?>
</footer>
</body>
</html>