<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>OMI • Films</title>
    <link rel="stylesheet" href="scss/style.css">
    <script src="https://kit.fontawesome.com/5b938fc7f9.js" crossorigin="anonymous"></script>
</head>
<body>

<header id="nav">
    <?php
    include 'header.php';
    ?>
</header>

<div id="product_grid">

    <?php foreach ($films as $dvd) { ?>
        <a href="index.php?controller=film&action=afficher&id=<?= $dvd->getId() ?>">
            <div class="product_card">
                <img class="product_image_dvd" src="<?= $dvd->getImage() ?>"/>
                <h2 class="product_name"><?= $dvd->getTitre() ?></h2>
                <p class="product_artist"><?= $dvd->getRealisateur() ?></p>
                <p class="product_date"><?= $dvd->getYear() ?></p>
            </div>
        </a>
    <?php } ?>

</div>

<footer id="footer">
    <?php
    include 'footer.php';
    ?>
</footer>

</body>
</html>