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
        <input id="inputImage" type="file" accept=".jpg, .jpeg, .png" multiple="false" onchange="setNewImage(this);"/>
        <img class="product_image_cd" src="data/musique/joshua.jpg"/>
        <div class="top_description">
            <input id="input_titre" class="product_name" onfocus="this.value=''" value="Titre de l'album"/>
            <input id="input_artiste" onfocus="this.value=''" value="Artiste"/>
            <input id="input_date" type="number" min="1900" max="2021" onfocus="this.value=''" value="1900"/>
            <div class="stock">
                <input id="input_stock" type="number" onfocus="this.value=''" value="0"/>
            </div>
            <h2>Plus d'informations</h2>
            <input id="input_pistes" type="number" onfocus="this.value=''" value="0"/>
            <input id="input_style" onfocus="this.value=''" value="Style"/>
        </div>
    </div>
</div>

<footer id="footer">
    <?php
    include 'footer.php';
    ?>
</footer>
</body>
</html>