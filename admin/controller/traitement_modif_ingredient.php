<?php

require "../../modele/connexionbdd.php";
require "../modele/fonctions.php";

$nomIngredient = $_POST['nomIngredient'];
$idIngredient = $_GET['idIngredient'];

updateIngredient($pdo, $nomIngredient, $idIngredient);

header('Location:../public/index.php?page=5');