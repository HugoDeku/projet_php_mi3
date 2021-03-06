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

<?php if (isset($user)) : ?>
    <h1 id="userHello">Bonjour <?= $user->getPseudo() ?> !</h1>
<?php endif; ?>
<div id="product_grid">
    <?php foreach ($categories as $category) {
        $category_name = array_search($category, $categories);
        if ($category[0]):?>
            <a class="category_card" href="index.php?controller=<?= $category_name ?>">
                <div>
                    <h1>Notre top <?= $category_name ?> de la semaine</h1>
                    <div class="top_product">
                        <img class="top_img" src="<?= $category[0]->getImage() ?>">
                        <div class="top_info">
                            <h2><?= $category[0]->getTitre() ?></h2>

                            <?php if ($category_name == "film") : ?>
                                <h3><?= $category[0]->getRealisateur() ?></h3>
                            <?php elseif ($category_name == "livre") : ?>
                                <h3><?= $category[0]->getAuteur() ?></h3>
                            <?php elseif ($category_name == "magazine") : ?>
                                <h3>#<?= $category[0]->getNumero() ?></h3>
                            <?php else : ?>
                                <h3><?= $category[0]->getArtiste() ?></h3>
                            <?php endif ?>


                            <?php if ($category_name == "magazine") : ?>
                                <h3><?= $category[0]->getTitre() ?></h3>
                            <?php else : ?>
                                <h3><?= $category[0]->getYear() ?></h3>
                            <?php endif ?>
                        </div>
                    </div>

                    <?php if ($category[1] && $category[2] && $category[3]): ?>
                        <div class="else_product">
                            <img class="product_img" src="<?= $category[1]->getImage() ?>">
                            <p><?= $category[1]->getTitre() ?></p>
                            <img class="product_img" src="<?= $category[2]->getImage() ?>">
                            <p><?= $category[2]->getTitre() ?></p>
                            <img class="product_img" src="<?= $category[3]->getImage() ?>">
                            <p><?= $category[3]->getTitre() ?></p>
                        </div>
                    <?php endif ?>
                </div>
            </a>
        <?php endif;
    } ?>
</div>

<footer id="footer">
    <?php
    include 'footer.php';
    ?>
</footer>
</body>
</html>