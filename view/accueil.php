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

<div id="product_grid">
    <?php if(isset($user)) : ?>
        <h1>Bonjour <?=$user->getPseudo()?> !</h1>
    <?php endif;?>

    <?php foreach ($categories as $category) {?>
    <div class="category_card">
        <h1>Notre top <?= array_search($category, $categories)?> de la semaine</h1>
        <div class="top_product">
            <img class="top_img" src="<?= $category[0]->getImage()?>">
            <div class="top_info">
                <h2><?= $category[0]->getTitre()?></h2>
                <h3><?=$category[0]->getArtiste()?></h3>
                <h3><?=$category[0]->getArtiste()?></h3>
            </div>
        </div>
        <div class="else_product">
            <img class="product_img" src="data/musique/s16.jpg">
            <p>S16</p>
            <img class="product_img" src="data/musique/caravelle.jpg">
            <p>Caravelle</p>
            <img class="product_img" src="data/musique/sosadsosexy.jpg">
            <p>so sad so sexy</p>
        </div>
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