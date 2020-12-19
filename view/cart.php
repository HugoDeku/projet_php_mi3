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
    <h1 class="cart_title">Voici votre Panier, <?= $user->getPseudo() ?> !</h1>
<?php else: ?>
    <h1 class="cart_title">Votre Panier</h1>
<?php endif; ?>

<div id="product_grid" class="cart">
    <?php foreach ($categories as $category) {
        $category_name = array_search($category, $categories);
        foreach ($category as $item) { ?>
            <div class="product_card cart_item">
                <?php if ($category_name == "musique"): ?>
                    <img class="product_image_cd" src="<?= $item->getImage() ?>"/>
                    <h2 class="product_name"><?= $item->getTitre() ?></h2>
                    <p class="product_artist"><?= $item->getArtiste() ?></p>
                    <p class="product_date"><?= $item->getYear() ?></p>
                <?php elseif ($category_name == "films") : ?>
                    <img class="product_image_dvd" src="<?= $item->getImage() ?>"/>
                    <h2 class="product_name"><?= $item->getTitre() ?></h2>
                    <p class="product_artist"><?= $item->getRealisateur() ?></p>
                    <p class="product_date"><?= $item->getYear() ?></p>
                <?php elseif ($category_name == "livres") : ?>
                    <img class="product_image_livre" src="<?= $item->getImage() ?>"/>
                    <h2 class="product_name"><?= $item->getTitre() ?></h2>
                    <p class="product_artist"><?= $item->getAuteur() ?></p>
                    <p class="product_date"><?= $item->getYear() ?></p>
                <?php endif ?>
            </div>
        <?php }
    } ?>

</div>

<button id="add_to_emprunts"><a href="index.php?controller=cart&action=empty"> Emprunter</button>

<footer id="footer">
    <?php
    include 'footer.php';
    ?>
</footer>
</body>
</html>