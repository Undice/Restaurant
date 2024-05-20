<?php
        //FONCTIONS UTILISATEUR

function recupUserInfo($pdo, $idUser)
{
    $reqInfoUser = $pdo->prepare('SELECT * FROM utilisateurs,adresse_user,adresses,villes,departements WHERE utilisateurs.id_user = adresse_user.id_user AND adresse_user.id_adresse = adresses.id_adresse AND adresses.id_ville = villes.id_ville AND villes.id_departement = departements.id_departement AND utilisateurs.id_user = ?');
    $reqInfoUser->execute([$idUser]);
    $infoUser = $reqInfoUser->fetch();
    return $infoUser;
}

function verifUserExiste($pdo, $email)
{
    $reqUserExiste = $pdo->prepare('SELECT * FROM utilisateurs WHERE email = ?');
    $reqUserExiste->execute([$email]);
    $userExiste = $reqUserExiste->fetch();
    return $userExiste;
}

function insertUser($pdo, $prenom, $nomUser, $email, $hashMdp, $tel, $sexe, $anniversaire)
{
    $reqInsertUser = $pdo->prepare('INSERT INTO utilisateurs(prenom, nom_user, email, mdp, telephone, sexe, anniversaire, id_role) VALUES(?, ?, ?, ?, ?, ?, ?, ?)');
    $reqInsertUser->execute([$prenom, $nomUser, $email, $hashMdp, $tel, $sexe, $anniversaire, 1]);
    return $pdo->lastInsertId();
}

function insertAdresseUser($pdo, $idAdresse, $idUser) {
    $reqInsertAdresseUser = $pdo->prepare('INSERT INTO adresse_user(id_adresse, id_user) VALUES(?, ?)');
    $reqInsertAdresseUser->execute([$idAdresse, $idUser]);
}

function insertAdresse($pdo, $adresse, $idVille, $cpVille)
{
    $reqinsertAdresse = $pdo->prepare('INSERT INTO adresses(adresse, id_ville, code_postal) VALUES(?, ?, ?)');
    $reqinsertAdresse->execute([$adresse, $idVille, $cpVille]);
    return $pdo->lastInsertId();
}

function verifAdresseExiste($pdo, $adresse, $idVille, $cpVille) {
    $reqAdresseExiste = $pdo->prepare('SELECT id_adresse FROM adresses WHERE adresse = ? AND id_ville = ? AND code_postal = ?');
    $reqAdresseExiste->execute([$adresse, $idVille, $cpVille]);
    $adresseExiste = $reqAdresseExiste->fetch();
    return $adresseExiste;
}

function recupDepartements($pdo)
{
    $reqDepartement = $pdo->prepare('SELECT * FROM departements ORDER BY id_departement ASC');
    $reqDepartement->execute();
    $departements = $reqDepartement->fetchAll();
    return $departements;
}

function recupVille($pdo, $idDept)
{
    $reqVillesDept = $pdo->prepare('SELECT * FROM villes WHERE id_departement = ? ORDER BY nom_ville ASC');
    $reqVillesDept->execute([$idDept]);
    $villesDept = $reqVillesDept->fetchAll();
    return $villesDept;
}

        //FONCTIONS TOKEN

function insertToken($pdo, $token, $dateDebutToken, $idUser)
{
    $reqinsertToken = $pdo->prepare('INSERT INTO tokens(token,date_creation,id_user) VALUES(?, ?, ?)');
    $reqinsertToken->execute([$token, $dateDebutToken, $idUser]);
}

function recupToken($pdo, $idUser)
{
    $reqToken = $pdo->prepare('SELECT * FROM tokens WHERE id_user = ?');
    $reqToken->execute([$idUser]);
    $tokenBDD = $reqToken->fetch();
    return $tokenBDD;
}

function supressionToken($pdo, $idToken)
{
    $reqsupprPanier = $pdo->prepare('DELETE FROM tokens WHERE id_token = ?');
    $reqsupprPanier->execute([$idToken]);
}

function updateUserMdp($pdo, $idUser, $hashMdp)
{
    $reqProduit = $pdo->prepare('UPDATE utilisateurs SET mdp = ? WHERE id_user = ?');
    $reqProduit->execute([$hashMdp, $idUser]);
}

    //FONCTIONS MESSAGES

function insertMessage($pdo, $date, $nom, $sujet, $email, $message) {
    $reqinsertToken = $pdo->prepare('INSERT INTO messages(date_message, nom, sujet, email, message) VALUES(?, ?, ?, ?, ?)');
    $reqinsertToken->execute([$date, $nom, $sujet, $email, $message]);
}

//FONCTIONS EVENEMENTS

function recupEvents($pdo)
{
    $reqEvent = $pdo->prepare('SELECT * FROM evenements');
    $reqEvent->execute();
    $evenements = $reqEvent->fetchAll();
    return $evenements;
}

//FONCTIONS PRESTATIONS

function recupPrestations($pdo)
{
    $reqPrestation = $pdo->prepare('SELECT * FROM prestations');
    $reqPrestation->execute();
    $prestations = $reqPrestation->fetchAll();
    return $prestations;
}

//FONCTIONS MENUS

function recupMenus($pdo)
{
    $reqMenus = $pdo->prepare('SELECT * FROM menus');
    $reqMenus->execute();
    $menus = $reqMenus->fetchAll();
    return $menus;
}

// FONCTIONS DEVIS

function insertDevis($pdo, $idEvent, $nbPersonnes, $idPrestation, $commentaire, $dateEvent, $dateMessage, $idUser)
{
    $reqInsertDevi = $pdo->prepare('INSERT INTO devis(id_event, nb_personnes, id_prestation, commentaire, date_evenement, date_message, id_user, id_statut) VALUE(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 1)');
    $reqInsertDevi->execute([$idEvent, $nbPersonnes, $idPrestation, $commentaire, $dateEvent, $dateMessage, $idUser]);
}

?>