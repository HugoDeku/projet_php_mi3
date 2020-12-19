<!DOCTYPE html>
<html lang="fr" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>OMI • Livres</title>
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

    <?php foreach ($livres as $livre) { ?>
    <div class="product_card">
        <img class="product_image_livre" src="<?=$livre->getImage()?>"/>
        <h2 class="product_name"><?=$livre->getTitre()?></h2>
        <p class="product_artist"><?=$livre->getAuteur()?></p>
        <p class="product_date"><?=$livre->getDate()?></p>
    </div>
    <?php } ?>

</div>
    <footer id="footer">
        <?php
        include 'footer.php';
        ?>
    </footer>
</body>
</html>