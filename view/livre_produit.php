<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>OMI • Joshua</title>
    <link rel="stylesheet" href="scss/style.css">
    <link rel="stylesheet" href="fontawesome/css/all.css">
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
        <img class="product_image_livre" src="data/livre/lepetitprince.jpg"/>
        <div class="top_description">
            <h2 class="product_name">Le Petit Prince</h2>
            <p class="product_artist">Antoinde de Saint-Exupéry</p>
            <p class="product_date">1943</p>
            <div class="stock">
                <i class="fas fa-check-circle"></i>
                <div>En stock</div>
            </div>
        </div>
    </div>
    <div class="product_description">
        <h2>Plus d'informations</h2>
        <p>Roman</p>
        <p>93 pages</p>
    </div>
</div>

<footer id="footer">
    <?php
    include 'footer.php';
    ?>
</footer>
</body>
</html>