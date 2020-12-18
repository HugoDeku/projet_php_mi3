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
        <img class="product_image_dvd" src="data/video/harrypotter.jpg"/>
        <div class="top_description">
            <h2 class="product_name">Harry Potter et la Coupe de Feu</h2>
            <p class="product_artist">Mike Newell</p>
            <p class="product_date">2005</p>
            <div class="stock">
                <i class="fas fa-check-circle"></i>
                <div>En stock</div>
            </div>
            <button class="product_add">Ajouter au panier</button>
        </div>
    </div>
    <div class="product_description">
        <h2>Plus d'informations</h2>
        <p>Daniel Radcliffe</p>
    </div>
</div>

<footer id="footer">
    <?php
    include 'footer.php';
    ?>
</footer>
</body>
</html>