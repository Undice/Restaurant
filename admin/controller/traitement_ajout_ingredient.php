<?php

require "../../modele/connexionbdd.php";
require "../modele/fonctions.php";

$nomIngredient = $_POST['nomIngredient'];

//verifIngredientExiste($pdo) ?;

insertIngredient($pdo, $nomIngredient);

header('Location:../public/index.php?page=5');