<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>OMI • Musique</title>
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

<div id="product_grid">

    <?php foreach ($musiques as $cd) { ?>
        <a href="index.php?controller=musique&action=afficher&id=<?=$cd->getId()?>">
            <div class="product_card">
                <img class="product_image_cd" src="<?=$cd->getImage()?>"/>
                <h2 class="product_name"><?=$cd->getTitre()?></h2>
                <p class="product_artist"><?=$cd->getArtiste()?></p>
                <p class="product_date"><?=$cd->getYear()?></p>
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