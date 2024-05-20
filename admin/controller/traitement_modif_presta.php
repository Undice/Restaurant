<?php

require "../../modele/connexionbdd.php";
require "../modele/fonctions.php";

$idPresta = $_GET['idPresta'];

$idEvents = $_POST['event'];

$nomPresta = $_POST['nomPresta'];

updatePresta($pdo, $nomPresta, $idPresta);

deleteDetailsEvent($pdo, $idPresta);

foreach ($idEvents as $idEvent) {
    insertDetailsEvent($pdo, $idEvent, $idPresta);
}

header('Location:../public/index.php?page=9');
