<?php

require "../../modele/connexionbdd.php";
require "../modele/fonctions.php";

$nomCateg = $_POST['nomCateg'];

//verifCategExiste($pdo) ?;

//NOM EN UNIQUE ?
insertCateg($pdo, $nomCateg);

header('Location:../public/index.php?page=4');