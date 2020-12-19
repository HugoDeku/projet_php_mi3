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
    <?php if(isset($error)) : ?>
        <p id="error_config"><?=$error?></p>
    <?php endif;?>
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
            <form action="index.php?controller=musique&action=ajouter" method="post" enctype="multipart/form-data">
                <tr class="table_add">
                    <td>
                        <input id="inputImage" name="image" type="file" accept=".jpg, .jpeg, .png" multiple="false" onchange="setNewImage(this);"/>
                        <img id="previewImage" class="img_music" src="#" />
                    </td>
                    <td>
                        <input id="input_titre" onfocus="this.value=''" value="<?=$premusique->getTitre()?>" name="titre"/>
                    </td>
                    <td>
                        <input id="input_artiste" onfocus="this.value=''" value="<?=$premusique->getArtiste()?>" name="artiste"/>
                    </td>
                    <td>
                        <input id="input_date" type="number" min="1900" max="2021" onfocus="this.value=''" value="<?=$premusique->getYear()?>" name="year"/>
                    </td>
                    <td>
                        <input id="input_style" onfocus="this.value=''" value="<?=$premusique->getStyle()?>" name="style"/>
                    </td>
                    <td>
                        <input id="input_pistes" type="number" onfocus="this.value=''" value="<?=$premusique->getNbPiste()?>" name="nbpiste"/>
                    </td>
                    <td>
                        <input id="input_stock" type="number" onfocus="this.value=''" value="<?=$premusique->getStock()?>" name="stock"/>
                    </td>
                    <td>
                        <button class="button_add" type="submit" name="submit" >Ajouter</button>
                    </td>
                </tr>
            </form>
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
                    <a href="index.php?controller=musique&action=supprimer&id=<?=$musique->getId()?>"><button class="button_delete" >Supprimer</button></a>
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

            <form action="index.php?controller=magazine&action=ajouter" method="post" enctype="multipart/form-data">
                <tr class="table_add">
                    <td>
                        <input id="inputImage" name="image" type="file" accept=".jpg, .jpeg, .png"  onchange="setNewImage(this);"/>
                        <img id="previewImage" class="img_magazine" src="#" />
                    </td>
                    <td>
                        <input id="input_titre" onfocus="this.value=''" value="<?=$premagazine->getTitre()?>" name="titre"/>
                    </td>
                    <td>
                        <select id="input_period" name="periodicite" >
                            <option value="0" <?php if($premagazine->getPeriodicite() == 0) echo "selected";?>>Annuel</option>
                            <option value="1" <?php if($premagazine->getPeriodicite() == 1) echo "selected";?>>Semestriel</option>
                            <option value="2" <?php if($premagazine->getPeriodicite() == 2) echo "selected";?>>>Trimestriel</option>
                            <option value="3" <?php if($premagazine->getPeriodicite() == 3) echo "selected";?>>>Quadrimestriel</option>
                            <option value="4" <?php if($premagazine->getPeriodicite() == 4) echo "selected";?>>>Mensuel</option>
                            <option value="5" <?php if($premagazine->getPeriodicite() == 5) echo "selected";?>>>Hebdomadaire</option>
                        </select>
                    </td>
                    <td>
                        <select id="input_month" name="month">
                            <option value="01">Janvier</option>
                            <option value="02">Février</option>
                            <option value="03">Mars</option>
                            <option value="04">Avril</option>
                            <option value="05">Mai</option>
                            <option value="06">Juin</option>
                            <option value="07">Juillet</option>
                            <option value="08">Août</option>
                            <option value="09">Septembre</option>
                            <option value="10">Octobre</option>
                            <option value="11">Novembre</option>
                            <option value="12">Décembre</option>
                        </select>
                        <input id="input_date" type="number" min="1900" max="2021" onfocus="this.value=''" value="2000" name="year"/>
                    </td>
                    <td>
                        <input id="input_pages" type="number" min="1" onfocus="this.value=''" value="<?=$premagazine->getNumero()?>>" name="numero"/>
                    </td>
                    <td>
                        <button class="button_add" name="submit" type="submit">Ajouter</button>
                    </td>
                </tr>
            </form>
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
                    <a href="index.php?controller=magazine&action=supprimer&id=<?=$magazine->getId()?>"><button class="button_delete" >Supprimer</button></a>
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