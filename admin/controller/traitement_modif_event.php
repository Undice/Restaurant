<?php

require "../../modele/connexionbdd.php";
require "../modele/fonctions.php";

$nomEvent = $_POST['nomEvent'];
$idEvent = $_GET['idEvent'];

updateEvent($pdo, $nomEvent, $idEvent);

header('Location:../public/index.php?page=6');