<?php

require "../../modele/connexionbdd.php";
require "../modele/fonctions.php";

$idMenu = $_GET['idMenu'];

deleteMenu($pdo, $idMenu);

deleteDetailsMenu($pdo, $idMenu);

header('Location:../public/index.php?page=2');