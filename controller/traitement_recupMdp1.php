<?php

require('../modele/connexionBdd.php');
require('../modele/fonctions.php');

$email = $_POST['email'];

$userExiste = verifUserExiste($pdo, $email);
$idUser = $userExiste['id_user'];
$recupTokenBDD = recupToken($pdo, $idUser);

if ($userExiste) {

    if ($recupTokenBDD) {

        $idTokenBDD = $recupTokenBDD['id_token'];
        supressionToken($pdo, $idTokenBDD);
        
        
    } else {

        $token = bin2hex(random_bytes(15));

        date_default_timezone_set('Europe/Paris');
        $dateDebutToken = date('Y-m-d h:i:s');

        $message = 'Cliquez sur ce lien pour changer le mot de passe : localhost/clea/restaurant/controller/traitement_recupMdp2.php?idUser= ' . $idUser . '&token=' . $token;
        mail($email, 'Mot de passe temporaire', $message);

        insertToken($pdo, $token, $dateDebutToken, $idUser);

        header('Location:../public/index.php?page=4&success=envoye');

    }
} else {
    header('Location:../public/index.php?page=4&success=envoye');
}
