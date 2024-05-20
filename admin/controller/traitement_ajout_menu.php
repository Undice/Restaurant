<?php

require "../../modele/connexionbdd.php";
require "../modele/fonctions.php";

$idPlats = $_POST['nomPlat'];

$nomMenu = $_POST['nomMenu'];
$prix = $_POST['prixMenu'];

$menuExiste = verifMenuExiste($pdo, $nomMenu);

if ($menuExiste) {

    header('Location:../public/index.php?page=2&erreur=menuExiste');
} else {

    $idMenu = insertMenu($pdo, $nomMenu, $prix);

    foreach ($idPlats as $idPlat) {

        insertDetailsMenu($pdo, $idMenu, $idPlat);
    }

    if (isset($_FILES['imgMenu']) && $_FILES['imgMenu']['name'] != '') {

        $extensions_valides = array('jpeg', 'JPEG', 'jpg', 'JPG', 'png', 'PNG');
        // récupérer la liste des extensions qui sont acceptées

        $extension_upload = pathinfo($_FILES['imgMenu']['name'], PATHINFO_EXTENSION);
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

            if (move_uploaded_file($_FILES['imgMenu']['tmp_name'], $chemin)) {
                //permet de transférer le fichier

                $chemindansbdd = 'public/assets/images/' . $nom;
                updateImgMenu($pdo,  $chemindansbdd, $idMenu);
            } else {

                header('Location:../public/index.php?page=2&erreur=probleme');
            }
        } else {

            header('Location:../public/index.php?page=2&erreur=fichierInvalide');
            //l'extension du fichier ne correspond pas aux extensions autorisées
        }
    }

    header('Location:../public/index.php?page=2');
}
