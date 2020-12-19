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
        <div class="top_description">
            <form method="post" action="index.php?controller=musique&action=modifier">
                <input id="input_id" hidden name="id" value="<?=$musique->getId()?>">
                <input id="input_titre" class="product_name" onfocus="this.value=''" value="<?=$musique->getTitre()?>" name="titre"/>
                <input id="input_artiste" onfocus="this.value=''" value="<?=$musique->getArtiste()?>" name="artiste"/>
                <input id="input_date" type="number" min="1900" max="2021" onfocus="this.value=''" value="<?=$musique->getYear()?>" name="year"/>
                <input id="input_stock" type="number" onfocus="this.value=''" value="<?=$musique->getStock()?>" name="stock"/>
                <input id="input_pistes" type="number" onfocus="this.value=''" value="<?=$musique->getNbPiste()?>" name="pistes"/>
                <input id="input_style" onfocus="this.value=''" value="<?=$musique->getStyle()?>"  name="style"/>
                <button class="button_add" name="submit" type="submit">Modifier</button>
            </form>
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