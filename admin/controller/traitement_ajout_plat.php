<?php

require "../../modele/connexionbdd.php";
require "../modele/fonctions.php";

$idIngredients = $_POST['nomIngredient'];
$idCateg = $_POST['nomCateg'];

$nomPlat = $_POST['nomPlat'];
$prix = $_POST['prixPlat'];

$platExiste = verifPlatExiste($pdo, $nomPlat);

if ($platExiste) {
    header('Location:../public/index.php?page=2&erreur=platExiste');
} else {

    $idPlat = insertPlat($pdo, $nomPlat, $prix, $idCateg);

    foreach ($idIngredients as $idIngredient) {
        insertDetailsPlat($pdo, $idIngredient, $idPlat);
    }

    if (isset($_FILES['imgPlat']) && $_FILES['imgPlat']['name'] != '') {
        $extensions_valides = array('jpeg', 'JPEG', 'jpg', 'JPG', 'png', 'PNG');
        // récupérer la liste des extensions qui sont acceptées

        $extension_upload = pathinfo($_FILES['imgPlat']['name'], PATHINFO_EXTENSION);
        // récupérer l'extension du fichier

        if (in_array($extension_upload, $extensions_valides)) {
            // permet de vérifier si l'extension correspond à celles autorisées

            $dossier = '../../public/assets/images';
            //dirige le dossier vers le fichier image
            $nom = time();
            //permet de donner un nom unique au fichier
            $nom = $nom . '.' . $extension_upload;
            //on récupère le nom et on lui ajoute l'extension
            $chemin = $dossier . "/" . $nom;

            if (move_uploaded_file($_FILES['imgPlat']['tmp_name'], $chemin)) {
                //permet de transférer le fichier

                $chemindansbdd = 'public/assets/images/' . $nom;
                updateImgPlat($pdo, $chemindansbdd, $idPlat);
            } else {

                header('Location:../public/index.php?page=2&erreur=probleme');
            }
        } else {

            header('Location:../public/index.php?page=2&erreur=fichierInvalide');
            //l'extension du fichier ne correspond pas aux extensions autorisées
        }
    }

    header('Location:../public/index.php?page=3');
}
