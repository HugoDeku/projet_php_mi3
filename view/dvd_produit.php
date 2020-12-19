<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>OMI • Joshua</title>
    <script src="https://kit.fontawesome.com/5b938fc7f9.js" crossorigin="anonymous"></script>
</head>
<body>

<header id="nav">
    <?php
    include 'header.php';
    ?>
</header>
<body>

<div id="product_closeup">
    <div class="top_info">
        <img class="product_image_dvd" src="<?=$dvd->getImage()?>"/>
        <div class="top_description">
            <h2 class="product_name"><?=$dvd->getTitre()?></h2>
            <p class="product_artist"><?=$dvd->getRealisateur()?></p>
            <p class="product_date"><?=$dvd->getYear()?></p>
            <?php if($dvd->getStock() > 0):?>
                <div class="stock">
                    <i class="fas fa-check-circle"></i>
                    <div>En stock</div>
                </div>
                <button class="product_add">Ajouter au panier</button>
            <?php else:?>
                <div class="stock out_of_stock">
                    <i class="fas fa-times-circle"></i>
                    <div>.</div>
                </div>
                <button class="product_add_out">Bientôt disponible</button>
            <?php endif ?>
        </div>
    </div>
    <div class="product_description">
        <h2>Plus d'informations</h2>
        <p><?=$dvd->getActeur()?></p>
    </div>
</div>

<footer id="footer">
    <?php
    include 'footer.php';
    ?>
</footer>
</body>
</html>