<?php
session_start();
$idUser = $_SESSION['recupMdp'];

require('../modele/connexionBdd.php');
require('../modele/fonctions.php');

$mdp = $_POST['mdp'];
$mdpConfirm = $_POST['mdpConfirm'];

if (isset($idUser)) {
    if ($mdp == $mdpConfirm) {

        $hashMdp = password_hash($mdp, PASSWORD_DEFAULT);
        updateUserMdp($pdo, $idUser, $hashMdp);
        unset($_SESSION['recupMdp']);
        header('Location:../public/index.php?page=4&success=change');
    } else {
        header('Location:../public/index.php?page=7&erreur=confirmMdp');
    }
} else {
    header('Location:../public/index.php?page=7&erreur=mdpDejaModifie');
}
