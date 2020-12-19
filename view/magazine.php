<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>OMI • Magazines</title>
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

    <!--todo: boucler là dessus-->
    <?php foreach ($magazines as $magazine) { ?>
    <div class="product_card">
        <img class="product_image_magazine" src="<?=$magazine->getImage()?>"/>
        <h2 class="product_name"><?=$magazine->getTitre()?></h2>
        <p class="product_artist"><?=$magazine->getNumero()?></p>
        <p class="product_date"><?=$magazine->getDateParution()?></p>
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