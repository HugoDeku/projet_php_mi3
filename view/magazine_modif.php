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
    $arrayMonthYear = Date::getMonthYearFromString($magazine->getDateParution());
    $year = $arrayMonthYear['year'];
    $month = $arrayMonthYear['month'];
    ?>
</header>
<body>

<div id="product_closeup">
    <div class="top_info">
        <img class="product_image_cd" src="<?=$magazine->getImage()?>"/>
        <div class="top_description">
            <form method="post" action="index.php?controller=magazine&action=modifier">
                <input id="input_id" hidden name="id" value="<?=$magazine->getId()?>">
                <label>Nom du magazine</label>
                <input id="input_titre" onfocus="this.value=''" name="titre" value="<?=$magazine->getTitre()?>"/>
                <label>Numéro</label>
                <input id="input_pages" type="number" name="numero" min="1" onfocus="this.value=''" value="<?=$magazine->getNumero()?>"/>
                <label>Mois de sortie</label>
                <select id="input_month" name="month">
                    <option value="01" <?php if($month == '01') echo "selected"?>>Janvier</option>
                    <option value="02" <?php if($month == '02') echo "selected"?>>Février</option>
                    <option value="03" <?php if($month == '03') echo "selected"?>>Mars</option>
                    <option value="04" <?php if($month == '04') echo "selected"?>>Avril</option>
                    <option value="05" <?php if($month == '05') echo "selected"?>>Mai</option>
                    <option value="06" <?php if($month == '06') echo "selected"?>>Juin</option>
                    <option value="07" <?php if($month == '07') echo "selected"?>>Juillet</option>
                    <option value="08" <?php if($month == '08') echo "selected"?>>Août</option>
                    <option value="09" <?php if($month == '09') echo "selected"?>>Septembre</option>
                    <option value="10" <?php if($month == '10') echo "selected"?>>Octobre</option>
                    <option value="11" <?php if($month == '11') echo "selected"?>>Novembre</option>
                    <option value="12" <?php if($month == '12') echo "selected"?>>Décembre</option>
                </select>
                <label>Année de sortie</label>
                <input id="input_date" type="number" min="1900" max="2021" onfocus="this.value=''" value="<?=$year?>" name="year"/>
                <label>Périodicité</label>
                <select id="input_period" name="periodicite">
                    <option value="0" <?php if($magazine->getPeriodicite() == 0) echo "selected";?>>Annuel</option>
                    <option value="1" <?php if($magazine->getPeriodicite() == 1) echo "selected";?>>Semestriel</option>
                    <option value="2" <?php if($magazine->getPeriodicite() == 2) echo "selected";?>>Trimestriel</option>
                    <option value="3" <?php if($magazine->getPeriodicite() == 3) echo "selected";?>>Quadrimestriel</option>
                    <option value="4" <?php if($magazine->getPeriodicite() == 4) echo "selected";?>>Mensuel</option>
                    <option value="5" <?php if($magazine->getPeriodicite() == 5) echo "selected";?>>Hebdomadaire</option>
                </select>
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