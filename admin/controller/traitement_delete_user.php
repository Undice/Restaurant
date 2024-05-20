<?php

require "../../modele/connexionbdd.php";
require "../modele/fonctions.php";

$idUser = $_GET['idUser'];

// deleteAdresseUser($pdo, $idUser);
// deleteUser($pdo, $idUser);

//anonymiser user

header('Location:../public/index.php?page=1');