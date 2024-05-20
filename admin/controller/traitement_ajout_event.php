<?php

require "../../modele/connexionbdd.php";
require "../modele/fonctions.php";

$nomEvent = $_POST['nomEvent'];

//verifEventExiste($pdo) ?;

insertEvent($pdo, $nomEvent);

header('Location:../public/index.php?page=6');