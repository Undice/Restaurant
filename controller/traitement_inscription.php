<?php

require "../modele/connexionbdd.php";
require "../modele/fonctions.php";

$prenom = $_POST['prenom'];
$nom = $_POST['nom'];
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$tel = filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_NUMBER_INT);
$sexe = $_POST['sexe'];
$anniversaire = $_POST['anniversaire'];
$mdp = $_POST['mdp'];
$confirmationMdp = $_POST['mdpConfirm'];

$ville = $_POST['villeDept'];
$tabVilles = explode('-', $ville);
$idVille = $tabVilles[0];
$cpVille = $tabVilles[1];
$adresse = $_POST['adresse'];

if ($mdp == $confirmationMdp) {

    $userExiste = verifUserExiste($pdo, $email);

    if ($userExiste) {

        header('Location:../public/index.php?page=5&erreur=emailExiste');
    } 
    else {

        $hashMdp = password_hash($mdp, PASSWORD_DEFAULT);
        $idAdresse = verifAdresseExiste($pdo, $adresse, $idVille, $cpVille);
        
        if (!$idAdresse) {

            $idAdresse = insertAdresse($pdo, $adresse, $idVille, $cpVille);

        }

        echo "pas oublier de creer des roles si non fait";
    
        $idUser = insertUser($pdo, $prenom, $nom, $email, $hashMdp, $tel, $sexe, $anniversaire);

        echo $idUser;

        insertAdresseUser($pdo, $idAdresse, $idUser);
        header('Location:../public/index.php?page=4&success=compteCree');
    }
} else {

    header('Location:../public/index.php?page=5&erreur=confirmMdp');
}
