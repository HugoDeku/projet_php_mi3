<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>OMI • Panier</title>
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

<h1 class="cart_title">Votre Panier</h1>

<div id="product_grid" class="cart">
    <!--todo: boucler là dessus-->
    <div class="product_card cart_item">
        <img class="product_image_cd" src="data/musique/joshua.jpg"/>
        <h2 class="product_name">Joshua</h2>
        <p class="product_artist">French 79</p>
        <p class="product_date">2019</p>
    </div>

</div>

<footer id="footer">
    <?php
    include 'footer.php';
    ?>
</footer>
</body>
</html>