<?php

//FONCTIONS USERS

function recupUsers($pdo)
{
    $reqUsers = $pdo->prepare('SELECT * FROM utilisateurs,roles WHERE utilisateurs.id_role = roles.id_role');
    $reqUsers->execute();
    $users = $reqUsers->fetchAll();
    return $users;
}

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

function insertUser($pdo, $prenom, $nomUser, $sexe, $email, $mdp, $telephone, $anniversaire)
{
    $reqInsertUser = $pdo->prepare('INSERT INTO utilisateurs(prenom, nom_user, sexe, email, mdp, telephone, anniversaire, id_role) VALUE(?, ?, ?, ?, ?, ?, ?, ?, ?)');
    $reqInsertUser->execute([$prenom, $nomUser, $sexe, $email, $mdp, $telephone, $anniversaire, 1]);
}

function updateUser($pdo, $prenom, $nomUser, $email, $hashMdp, $tel, $sexe, $anniversaire, $id_role)
{
    $reqUpdateUser = $pdo->prepare('UPDATE utilisateurs SET prenom = ?, nom_user = ?, sexe = ?, email = ?, mdp = ?, telephone = ?, anniversaire = ?, id_role = ?');
    $reqUpdateUser->execute([$pdo, $prenom, $nomUser, $email, $hashMdp, $tel, $sexe, $anniversaire, $id_role]);
}

function deleteUser($pdo, $idUser)
{
    $reqdeleteUser = $pdo->prepare('DELETE FROM utilisateurs WHERE id_user = ?');
    $reqdeleteUser->execute([$idUser]);
}

//FONCTIONS DEPARTEMENTS

function recupDepartements($pdo)
{
    $reqDepartement = $pdo->prepare('SELECT * FROM departements ORDER BY id_departement ASC');
    $reqDepartement->execute();
    $departements = $reqDepartement->fetchAll();
    return $departements;
}

//FONCTIONS VILLES

function recupVille($pdo, $idDept)
{
    $reqVillesDept = $pdo->prepare('SELECT * FROM villes WHERE id_departement = ? ORDER BY nom_ville ASC');
    $reqVillesDept->execute([$idDept]);
    $villesDept = $reqVillesDept->fetchAll();
    return $villesDept;
}

//FONCTIONS ADRESSES

function verifAdresseExiste($pdo, $adresse, $idVille, $cpVille)
{
    $reqAdresseExiste = $pdo->prepare('SELECT * FROM adresses WHERE adresse = ? AND id_ville = ? AND code_postal = ?');
    $reqAdresseExiste->execute([$adresse, $idVille, $cpVille]);
    $adresseExiste = $reqAdresseExiste->fetch();
    return $adresseExiste;
}

function insertAdresse($pdo, $adresse, $idVille, $cpVille)
{
    $reqinsertAdresse = $pdo->prepare('INSERT INTO adresses(adresse, id_ville, code_postal) VALUES(?, ?, ?)');
    $reqinsertAdresse->execute([$adresse, $idVille, $cpVille]);
    return $pdo->lastInsertId();
}

//FONCTIONS MENUS

function recupMenus($pdo)
{
    $reqMenus = $pdo->prepare('SELECT * FROM menus');
    $reqMenus->execute();
    $menus = $reqMenus->fetchAll();
    return $menus;
}

function recupMenuInfo($pdo, $idMenu)
{
    $reqInfoMenu = $pdo->prepare('SELECT * FROM menus,details_menu,plats WHERE menus.id_menu = details_menu.id_menu AND details_menu.id_plat = plats.id_plat AND menus.id_menu = ?');
    $reqInfoMenu->execute([$idMenu]);
    $infoMenu = $reqInfoMenu->fetchAll();
    return $infoMenu;
}

function verifMenuExiste($pdo, $nomMenu)
{
    $reqMenuExiste = $pdo->prepare('SELECT * FROM menus WHERE nom_menu = ?');
    $reqMenuExiste->execute([$nomMenu]);
    $menuExiste = $reqMenuExiste->fetch();
    return $menuExiste;
}

function insertMenu($pdo, $nomMenu, $prixMenu)
{
    $reqInsertMenu = $pdo->prepare('INSERT INTO menus(nom_menu, prix_menu) VALUE(?, ?)');
    $reqInsertMenu->execute([$nomMenu, $prixMenu]);
    $idMenu = $pdo->lastInsertId();
    return $idMenu;
}

function updateMenu($pdo, $nomMenu, $prixMenu, $idMenu)
{
    $reqUpdateMenu = $pdo->prepare('UPDATE menus SET nom_menu = ?, prix_menu = ? WHERE id_menu = ?');
    $reqUpdateMenu->execute([$nomMenu, $prixMenu, $idMenu]);
}

function updateImgMenu($pdo, $imgMenu, $idMenu) {
    $reqUpdateMenu = $pdo->prepare('UPDATE menus SET image_menu = ? WHERE id_menu = ?');
    $reqUpdateMenu->execute([$imgMenu, $idMenu]);
}

function deleteMenu($pdo, $idMenu)
{
    $reqdeleteMenu = $pdo->prepare('DELETE FROM menus WHERE id_menu = ?');
    $reqdeleteMenu->execute([$idMenu]);
}

//FONCTIONS PLATS

function recupPlats($pdo)
{
    $reqPlats = $pdo->prepare('SELECT * FROM plats,categories WHERE plats.id_categ = categories.id_categ');
    $reqPlats->execute();
    $plats = $reqPlats->fetchAll();
    return $plats;
}

function recupPlatsCategs($pdo, $idCateg)
{
    $reqPlatsCateg = $pdo->prepare('SELECT * FROM plats,categories WHERE plats.id_categ = categories.id_categ AND categories.id_categ = ?');
    $reqPlatsCateg->execute([$idCateg]);
    $platsCateg = $reqPlatsCateg->fetchAll();
    return $platsCateg;
}

function recupPlatsCategMenu($pdo, $idCateg, $idMenu)
{
    $reqPlatsCateg = $pdo->prepare('SELECT * FROM plats,categories,details_menu,menus WHERE plats.id_categ = categories.id_categ AND plats.id_plat = details_menu.id_plat AND details_menu.id_menu = menus.id_menu AND categories.id_categ = ?');
    $reqPlatsCateg->execute([$idCateg, $idMenu]);
    $platsCateg = $reqPlatsCateg->fetchAll();
    return $platsCateg;
}

function recupPlatInfo($pdo, $idPlat)
{
    $reqInfoPlat = $pdo->prepare('SELECT * FROM plats,categories,details_plat,ingredients WHERE plats.id_categ = categories.id_categ AND plats.id_plat = details_plat.id_plat AND details_plat.id_ingredient = ingredients.id_ingredient AND plats.id_plat = ?');
    $reqInfoPlat->execute([$idPlat]);
    $infoPlat = $reqInfoPlat->fetch();
    return $infoPlat;
}


function verifPlatExiste($pdo, $nomPlat)
{
    $reqPlatExiste = $pdo->prepare('SELECT * FROM plats WHERE nom_plat = ?');
    $reqPlatExiste->execute([$nomPlat]);
    $platExiste = $reqPlatExiste->fetch();
    return $platExiste;
}

function insertPlat($pdo, $nomPlat, $prixPlat, $idCateg)
{
    $reqInsertPlat = $pdo->prepare('INSERT INTO plats(nom_plat, prix_plat, id_categ) VALUE(?, ?, ?)');
    $reqInsertPlat->execute([$nomPlat, $prixPlat, $idCateg]);
    $idMenu = $pdo->lastInsertId();
    return $idMenu;
}

function updatePlat($pdo, $nomPlat, $prixPlat, $idCateg, $idPlat)
{
    $reqUpdatePlat = $pdo->prepare('UPDATE plats SET nom_plat = ?, prix_plat = ?, id_categ = ? WHERE id_plat = ?');
    $reqUpdatePlat->execute([$nomPlat, $prixPlat, $idCateg, $idPlat]);
}

function updateImgPlat($pdo, $imgPlat, $idPlat)
{
    $reqUpdatePlat = $pdo->prepare('UPDATE plats SET image_plat = ? WHERE id_plat = ?');
    $reqUpdatePlat->execute([$imgPlat, $idPlat]);
}

function deletePlat($pdo, $idPlat)
{
    $reqdeletePlat = $pdo->prepare('DELETE FROM plats WHERE id_plat = ?');
    $reqdeletePlat->execute([$idPlat]);
}

//FONCTIONS CATEGORIES

function recupCategs($pdo)
{
    $reqCateg = $pdo->prepare('SELECT * FROM categories');
    $reqCateg->execute();
    $categories = $reqCateg->fetchAll();
    return $categories;
}

function recupCategInfo($pdo, $idCateg)
{
    $reqInfoCateg = $pdo->prepare('SELECT * FROM categories WHERE categories.id_categ = ?');
    $reqInfoCateg->execute([$idCateg]);
    $infoCateg = $reqInfoCateg->fetch();
    return $infoCateg;
}

function insertCateg($pdo, $nomCateg)
{
    $reqInsertCateg = $pdo->prepare('INSERT INTO categories(nom_categorie) VALUE(?)');
    $reqInsertCateg->execute([$nomCateg]);
}

function updateCateg($pdo, $nomCateg, $idCateg)
{
    $reqUpdateCateg = $pdo->prepare('UPDATE categories SET nom_categorie = ? WHERE id_categ = ?');
    $reqUpdateCateg->execute([$nomCateg, $idCateg]);
}

//FONCTIONS INGREDIENTS

function recupIngredients($pdo)
{
    $reqIngredient = $pdo->prepare('SELECT * FROM ingredients');
    $reqIngredient->execute();
    $ingredients = $reqIngredient->fetchAll();
    return $ingredients;
}

function recupIngredientInfo($pdo, $idIngredient)
{
    $reqInfoIngredient = $pdo->prepare('SELECT * FROM ingredients WHERE ingredients.id_ingredient = ?');
    $reqInfoIngredient->execute([$idIngredient]);
    $infoIngredient = $reqInfoIngredient->fetch();
    return $infoIngredient;
}

function recupIngredientsFromPlat($pdo, $idPlat)
{
    $reqIngredient = $pdo->prepare('SELECT * FROM ingredients,details_plat WHERE ingredients.id_ingredient = details_plat.id_ingredient AND id_plat = ?');
    $reqIngredient->execute([$idPlat]);
    $ingredients = $reqIngredient->fetchAll();
    return $ingredients;
}

function insertIngredient($pdo, $nomIngredient)
{
    $reqInsertIngredient = $pdo->prepare('INSERT INTO ingredients(nom_ingredient) VALUE(?)');
    $reqInsertIngredient->execute([$nomIngredient]);
}

function updateIngredient($pdo, $nomIngredient, $idIngredient)
{
    $reqUpdateIngredient = $pdo->prepare('UPDATE ingredients SET nom_ingredient = ? WHERE id_ingredient = ?');
    $reqUpdateIngredient->execute([$nomIngredient, $idIngredient]);
}

//FONCTIONS EVENEMENTS

function recupEvents($pdo)
{
    $reqEvent = $pdo->prepare('SELECT * FROM evenements');
    $reqEvent->execute();
    $evenements = $reqEvent->fetchAll();
    return $evenements;
}

function recupEventInfo($pdo, $idEvent)
{
    $reqInfoEvent = $pdo->prepare('SELECT * FROM evenements WHERE evenements.id_event = ?');
    $reqInfoEvent->execute([$idEvent]);
    $infoEvent = $reqInfoEvent->fetch();
    return $infoEvent;
}

function insertEvent($pdo, $nomEvent)
{
    $reqInsertEvent = $pdo->prepare('INSERT INTO evenements(nom_event) VALUE(?)');
    $reqInsertEvent->execute([$nomEvent]);
}

function updateEvent($pdo, $nomEvent, $idEvent)
{
    $reqUpdateEvent = $pdo->prepare('UPDATE evenements SET nom_event = ? WHERE id_event = ?');
    $reqUpdateEvent->execute([$nomEvent, $idEvent]);
}

function deleteEvent($pdo, $idEvent)
{
    $reqdeleteEvent = $pdo->prepare('DELETE FROM evenements WHERE id_event = ?');
    $reqdeleteEvent->execute([$idEvent]);
}

//FONCTIONS MESSAGES

function recupMessages($pdo)
{
    $reqMessage = $pdo->prepare('SELECT * FROM messages ORDER BY date_message DESC');
    $reqMessage->execute();
    $messages = $reqMessage->fetchAll();
    return $messages;
}

function recupMessageInfo($pdo, $idMessage)
{
    $reqInfoMessage = $pdo->prepare('SELECT * FROM messages WHERE messages.id_message = ?');
    $reqInfoMessage->execute([$idMessage]);
    $infoMessage = $reqInfoMessage->fetch();
    return $infoMessage;
}

//FONCTIONS DETAILS_MENU

function recupDetailsMenuWithIdMenu($pdo, $idMenu){
    $reqDetailsMenuWithIdMenu = $pdo->prepare('SELECT id_plat FROM details_menu WHERE id_menu = ?');
    $reqDetailsMenuWithIdMenu->execute([$idMenu]);
    $detailsMenuWithIdMenu = $reqDetailsMenuWithIdMenu->fetchAll();
    return $detailsMenuWithIdMenu;
}

function insertDetailsMenu($pdo, $idMenu, $idPlat)
{
    $reqInsertDetailsMenu = $pdo->prepare('INSERT INTO details_menu(id_menu, id_plat) VALUE(?, ?)');
    $reqInsertDetailsMenu->execute([$idMenu, $idPlat]);
}

function updateDetailsMenu($pdo, $idMenu, $idPlat)
{
    $reqUpdateDetailsMenu = $pdo->prepare('UPDATE menus SET nom_menu = ? WHERE id_menu = ?');
    $reqUpdateDetailsMenu->execute([$idMenu, $idPlat]);
}

function deleteDetailsMenu($pdo, $idMenu)
{
    $reqdeleteDetailsMenu = $pdo->prepare('DELETE FROM details_menu WHERE id_menu = ?');
    $reqdeleteDetailsMenu->execute([$idMenu]);
}

function deleteDetailsMenuPlat($pdo, $idPlat)
{
    $reqdeleteDetailsMenuPlat = $pdo->prepare('DELETE FROM details_menu WHERE id_plat = ?');
    $reqdeleteDetailsMenuPlat->execute([$idPlat]);
}

//FONCTIONS DETAILS_PLAT

function recupDetailsPlatWithIdPlat($pdo, $idPlat) {
    $reqDetailsPlatWithIdPlat = $pdo->prepare('SELECT id_ingredient FROM details_plat WHERE id_plat = ?');
    $reqDetailsPlatWithIdPlat->execute([$idPlat]);
    $detailsPlatWithIdPlat = $reqDetailsPlatWithIdPlat->fetchAll();
    return $detailsPlatWithIdPlat;
}

function insertDetailsPlat($pdo, $idIngredient, $idPlat)
{
    $reqInsertDetailsPlat = $pdo->prepare('INSERT INTO details_plat(id_ingredient, id_plat) VALUE(?, ?)');
    $reqInsertDetailsPlat->execute([$idIngredient, $idPlat]);
}

function deleteDetailsPlat($pdo, $idPlat)
{
    $deleteDetailsPlat = $pdo->prepare('DELETE FROM details_plat WHERE id_plat = ?');
    $deleteDetailsPlat->execute([$idPlat]);
}

//FONCTIONS ADRESSE_USER

function insertAdresseUser($pdo, $idAdresse, $idUser)
{
    $reqInsertAdresseUser = $pdo->prepare('INSERT INTO adresse_user(id_adresse, id_user) VALUES(?, ?)');
    $reqInsertAdresseUser->execute([$idAdresse, $idUser]);
}

function deleteAdresseUser($pdo, $idUser)
{
    $reqdeleteAdresseUser = $pdo->prepare('DELETE FROM adresse_user WHERE id_user = ?');
    $reqdeleteAdresseUser->execute([$idUser]);
}

//FONCTIONS ROLES

function recupRoles($pdo)
{
    $reqRoleUser = $pdo->prepare('SELECT * FROM roles');
    $reqRoleUser->execute([]);
    $roleUser = $reqRoleUser->fetchAll();
    return $roleUser;
}

//FONCTIONS DEVIS

function recupDevis($pdo)
{
    $reqDevi = $pdo->prepare('SELECT * FROM devis,utilisateurs,statuts WHERE devis.id_user = utilisateurs.id_user AND devis.id_statut = statuts.id_statut');
    $reqDevi->execute();
    $devis = $reqDevi->fetchAll();
    return $devis;
}

function recupDevisInfo($pdo, $idDevis)
{
    $reqInfoDevi = $pdo->prepare('SELECT * FROM devis WHERE devis.id_devis = ?');
    $reqInfoDevi->execute([$idDevis]);
    $infoDevi = $reqInfoDevi->fetch();
    return $infoDevi;
}

function updateDevis($pdo, $idDevis)
{
    $reqUpdateDevi = $pdo->prepare('UPDATE devis SET ...... = ? WHERE id_devis = ?');
    $reqUpdateDevi->execute([$idDevis]);
}

//FONCTIONS PRESTATIONS

function recupPrestations($pdo)
{
    $reqPresta = $pdo->prepare('SELECT * FROM prestations');
    $reqPresta->execute();
    $prestations = $reqPresta->fetchAll();
    return $prestations;
}

function recupPrestaInfo($pdo, $idPresta)
{
    $reqInfoPresta = $pdo->prepare('SELECT * FROM prestations,details_event,evenements WHERE prestations.id_prestation = details_event.id_prestation AND details_event.id_event = evenements.id_event AND prestations.id_prestation = ?');
    $reqInfoPresta->execute([$idPresta]);
    $infoPresta = $reqInfoPresta->fetch();
    return $infoPresta;
}

function insertPresta($pdo, $nomPresta)
{
    $reqInsertPresta = $pdo->prepare('INSERT INTO prestations(nom_prestation) VALUE(?)');
    $reqInsertPresta->execute([$nomPresta]);
}

function updatePresta($pdo, $nomPresta, $idPresta)
{
    $reqUpdatePresta = $pdo->prepare('UPDATE prestations SET nom_prestation = ? WHERE id_prestation = ?');
    $reqUpdatePresta->execute([$nomPresta, $idPresta]);
}

// FONCTIONS DETAILS_EVENT

function recupDetailsEventWithIdEvent($pdo, $idEvent) {
    $reqDetailsEventWithIdEvent = $pdo->prepare('SELECT id_prestation FROM details_event
     WHERE id_event = ?');
    $reqDetailsEventWithIdEvent->execute([$idEvent]);
    $detailsEventWithIdEvent = $reqDetailsEventWithIdEvent->fetchAll();
    return $detailsEventWithIdEvent;
}

function recupEventsFromPresta($pdo, $idPrestation){
    $reqEvent = $pdo->prepare('SELECT * FROM evenements,details_event WHERE evenements.id_event = details_event.id_event AND id_prestation = ?');
    $reqEvent->execute([$idPrestation]);
    $evenements = $reqEvent->fetchAll();
    return $evenements;
}

function insertDetailsEvent($pdo, $idEvent, $idPresta)
{
    $reqInsertDetailsEvent = $pdo->prepare('INSERT INTO details_event(id_event, id_prestation) VALUE(?, ?)');
    $reqInsertDetailsEvent->execute([$idEvent, $idPresta]);
}

function deleteDetailsEvent($pdo, $idPresta){
    $deleteDetailsEvent = $pdo->prepare('DELETE FROM details_event WHERE id_prestation = ?');
    $deleteDetailsEvent->execute([$idPresta]);
}