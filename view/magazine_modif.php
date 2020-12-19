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
        <img class="product_image_magazine" src="data/magazine/vogue.png"/>
        <div class="top_description">
            <input id="input_titre" onfocus="this.value=''" value="Titre"/>
            <input id="input_pages" type="number" min="1" onfocus="this.value=''" value="0"/>
            <input id="input_date" onfocus="this.value=''" value="mois 1900"/>
            <div class="stock">
                <input id="input_stock" type="number" onfocus="this.value=''" value="0"/>
            </div>
            <h2>Plus d'informations</h2>
            <select id="input_period">
                <option value="0">Annuel</option>
                <option value="1">Semestriel</option>
                <option value="2">Trimestriel</option>
                <option value="3">Quadrimestriel</option>
                <option value="4">Mensuel</option>
                <option value="5">Hebdomadaire</option>
            </select>
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