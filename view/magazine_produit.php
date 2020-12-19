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
        <img class="product_image_magazine" src="<?=$magazine->getImage()?>"/>
        <div class="top_description">
            <h2 class="product_name"><?=$magazine->getTitre()?></h2>
            <p class="product_number">#<?=$magazine->getNumero()?></p>
            <p class="product_date"><?=$magazine->getDateParution()?></p>
        </div>

    </div>
    <div class="product_description">
        <h2>Plus d'informations</h2>
        <?php
        switch ($magazine->getPeriodicite()) {
            case 0:
                echo "<p>Annuel<p>";
                break;
            case 1:
                echo "<p>Semestriel<p>";
                break;
            case 2:
                echo "<p>Trimestriel<p>";
                break;
            case 3:
                echo "<p>Quadrimestriel<p>";
                break;
            case 4:
                echo "<p>Mensuel<p>";
                break;
            case 5:
                echo "<p>Hebdomadaire<p>";
                break;
            default:
                break;
        }
        ?>
    </div>
</div>

<footer id="footer">
    <?php
    include 'footer.php';
    ?>
</footer>
</body>
</html>