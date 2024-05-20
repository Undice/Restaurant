<?php

require "../../modele/connexionbdd.php";
require "../modele/fonctions.php";


//ENVOYER UN MAIL AVEC LE MDP POUR L'UTILISATEUR CREE

$prenom = $_POST['prenom'];
$nom = $_POST['nom'];
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$tel = filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_NUMBER_INT);
$sexe = $_POST['sexe'];
$anniversaire = $_POST['anniversaire'];
$idRole = $_POST['role'];

$ville = $_POST['villeDept'];
$tabVilles = explode('-', $ville);
$idVille = $tabVilles[0];
$cpVille = $tabVilles[1];
$adresse = $_POST['adresse'];

$userExiste = verifUserExiste($pdo, $email);

if ($userExiste) {

    header('Location:../public/index.php?page=1&erreur=emailExiste');
} else {

    
    $idAdresse = verifAdresseExiste($pdo, $adresse, $idVille, $cpVille);

    if (!$idAdresse) {

        insertAdresse($pdo, $adresse, $idVille, $cpVille);
    }

    // echo "pas oublier de creer des roles si non fait";
    $id_user = insertUser($pdo, $prenom, $nom, $email, $hashMdp, $tel, $sexe, $anniversaire, $idRole);
    insertAdresseUser($pdo, $idAdresse, $idUser);

}

header('Location:../public/index.php?page=1');