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
        <img class="product_image_livre" src="<?=$livre->getImage()?>"/>
        <div class="top_description">
            <h2 class="product_name"><?=$livre->getTitre()?></h2>
            <p class="product_artist"><?=$livre->getAuteur()?></p>
            <p class="product_date"><?=$livre->getYear()?></p>
            <?php if($livre->getStock() > 0):?>
                <div class="stock">
                    <i class="fas fa-check-circle"></i>
                    <div>En stock</div>
                </div>
                <button class="product_add"><a href="index.php?controller=livre&action=cart&id=<?=$livre->getId()?>">Ajouter au panier</a></button>
            <?php else:?>
                <div class="stock out_of_stock">
                    <i class="fas fa-times-circle"></i>
                </div>
                <button class="product_add_out" disabled>Bientôt disponible</button>
            <?php endif ?>
        </div>
    </div>
    <div class="product_description">
        <h2>Plus d'informations</h2>
        <p><?=$livre->getType()?></p>
        <p><?=$livre->getPages()?></p>
    </div>
</div>

<footer id="footer">
    <?php
    include 'footer.php';
    ?>
</footer>
</body>
</html>