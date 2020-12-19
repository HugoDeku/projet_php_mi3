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

<?php if(!isset($user)) : ?>
<div id="connexion_card">
    <h1>Connexion</h1>
    <form id="connexion_content" action="index.php?controller=utilisateur&action=connexion" method="post">
        <label>Login</label>
        <input type="text" id="inputLogin" name="login"/>
        <label>Password</label>
        <input type="password" id="inputPassword" name="motdepasse"/>
        <?php if(isset($error)) : ?>
            <p><?=$error?></p>
        <?php endif;?>
        <button id="btnSubmitConnexion">GO</button>
    </form>
</div>

<?php else:?>
<div id="config_container">

    <div class="table_container">
        <table id="music_table" class="config_table">
            <tr>
                <th colspan="8" class="table_title">
                    Musique
                </th>
            </tr>
            <tr id="table_header">
                <th>
                    Image
                </th>
                <th>
                    Titre
                </th>
                <th>
                    Artiste
                </th>
                <th>
                    Date de sortie
                </th>
                <th>
                    Style
                </th>
                <th>
                    Nombre de pistes
                </th>
                <th>
                    Stock
                </th>
                <th>
                    Actions
                </th>
            </tr>

            <tr class="table_add">
                <td>
                    <input id="inputImage" type="file" accept=".jpg, .jpeg, .png" multiple="false" onchange="setNewImage(this);"/>
                    <img id="previewImage" class="img_music" src="#" />
                </td>
                <td>
                    <input id="input_titre" onfocus="this.value=''" value="Titre de l'album"/>
                </td>
                <td>
                    <input id="input_artiste" onfocus="this.value=''" value="Artiste"/>
                </td>
                <td>
                    <input id="input_date" type="number" min="1900" max="2021" onfocus="this.value=''" value="1900"/>
                </td>
                <td>
                    <input id="input_style" onfocus="this.value=''" value="Style"/>
                </td>
                <td>
                    <input id="input_pistes" type="number" onfocus="this.value=''" value="0"/>
                </td>
                <td>
                    <input id="input_stock" type="number" onfocus="this.value=''" value="0"/>
                </td>
                <td>
                    <button class="button_add">Ajouter</button>
                </td>
            </tr>
            <?php foreach ($musiques as $musique) {?>
            <tr class="table_product">
                <td>
                    <img class="img_music" src="<?=$musique->getImage()?>" />
                </td>
                <td>
                    <?=$musique->getTitre()?>
                </td>
                <td>
                    <?=$musique->getArtiste()?>
                </td>
                <td>
                    <?=$musique->getYear()?>
                </td>
                <td>
                    <?=$musique->getStyle()?>
                </td>
                <td>
                    <?=$musique->getNbPiste()?>
                </td>
                <td>
                    <?=$musique->getStock()?>
                </td>
                <td>
                    <button class="button_update">Modifier</button>
                    <button class="button_delete">Supprimer</button>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>

    <div class="table_container">
        <table id="mag_table" class="config_table">
            <tr>
                <th colspan="7" class="table_title">
                    Magazines
                </th>
            </tr>
            <tr id="table_header">
                <th>
                    Image
                </th>
                <th>
                    Titre
                </th>
                <th>
                    Périodicité
                </th>
                <th>
                    Date de parution
                </th>
                <th>
                    Numéro
                </th>
                <th>
                    Actions
                </th>
            </tr>

            <tr class="table_add">
                <td>
                    <input id="inputImage" type="file" accept=".jpg, .jpeg, .png" multiple="false" onchange="setNewImage(this);"/>
                    <img id="previewImage" class="img_magazine" src="#" />
                </td>
                <td>
                    <input id="input_titre" onfocus="this.value=''" value="Titre"/>
                </td>
                <td>

                </td>
                <td>
                    <input id="input_date" onfocus="this.value=''" value="mois 1900"/>
                </td>
                <td>
                    <input id="input_pages" type="number" min="1" onfocus="this.value=''" value="0"/>
                </td>
                <td>
                    <button class="button_add">Ajouter</button>
                </td>
            </tr>

            <?php foreach ($magazines as $magazine) {?>
            <tr class="table_product">
                <td>
                    <img class="img_book" src="<?=$magazine->getImage()?>" />
                </td>
                <td>
                    <?=$magazine->getTitre()?>
                </td>
                <td>
                    <?=array_keys(Enum::$PeriodiciteEnum, $magazine->getPeriodicite())[0]?>
                </td>
                <td>
                    <?php
                        $array = Date::getMonthYearFromString($magazine->getDateParution());
                        echo $array['month']. "/" . $array['year'];
                    ?>
                </td>
                <td>
                    <?=$magazine->getNumero()?>
                </td>
                <td>
                    <button class="button_update">Modifier</button>
                    <button class="button_delete">Supprimer</button>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>

</div>
<?php endif;?>

<footer id="footer">
    <?php
    include 'footer.php';
    ?>
</footer>

</body>
</html>