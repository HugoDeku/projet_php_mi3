<?php

require_once("./model/business/PDOManager.php");
require_once("./model/Enum.php");
require_once ("./model/entities/Musique.php");

use mvc\model\entities\Musique;

$test = new Musique("Test", 4, "Tst.jpg", "DaFlower", 2020, 28, "Electro");

var_dump($test);


