<?php

require "../../modele/connexionbdd.php";
require "../modele/fonctions.php";

$idPlat = $_GET['idPlat'];

deleteDetailsMenuPlat($pdo, $idPlat);
deleteDetailsPlat($pdo, $idPlat);
deletePlat($pdo, $idPlat);

header('Location:../public/index.php?page=3');