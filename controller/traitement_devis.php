<?php
session_start();

require "../modele/connexionbdd.php";
require "../modele/fonctions.php";

date_default_timezone_set('Europe/Paris');

$dateMessage = date('Y-m-d h:i:s');

$idUser = $_SESSION['idUser'];

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$telephone = $_POST['telephone'];
$idEvent = $_POST['event'];
$nbPersonnes = $_POST['nbPersonnes'];
$idPrestation = $_POST['prestation'];
$commentaire = $_POST['commentaire'];
$dateEvent = $_POST['dateEvent'];

insertDevis($pdo, $nom, $prenom, $email, $telephone, $idEvent, $nbPersonnes, $idPrestation, $commentaire, $dateEvent, $dateMessage, $idUser);

header('Location:../public/index.php?page=2&success=envoye');