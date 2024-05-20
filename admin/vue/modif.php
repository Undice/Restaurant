<main class="users">
    <section>
        <?php if (isset($_GET['user'])) {

            $idUser = $_GET['idUser'];
            $userInfo = recupUserInfo($pdo, $idUser);
            $departements = recupDepartements($pdo);
            $roles = recupRoles($pdo); ?>

            <form class="text-center color-snowy" method="post" action="../controller/traitement_modif_user.php">
                <h1>Utilisateur</h1>

                <?php if ($_GET['user'] == 'modif') { ?>

                    <div class="d-md-flex justify-content-center align-items-center mb-4 py-2">

                        <div class="form-check form-check-inline mx-4 my-2">
                            <input class="form-check-input" type="radio" name="sexe" id="sexe" value="femme" />
                            <label class="form-check-label" for="sexe">Femme</label>
                        </div>

                        <div class="form-check form-check-inline mx-4 my-2">
                            <input class="form-check-input" type="radio" name="sexe" id="sexe" value="homme" />
                            <label class="form-check-label" for="sexe">Homme</label>
                        </div>

                        <div class="form-check form-check-inline mx-4 my-2">
                            <input class="form-check-input" type="radio" name="sexe" id="sexe" value="autre" />

                            <label class="form-check-label" for="sexe">Autre</label>
                        </div>

                    </div>

                    <label for="prenom" class="form-label">Prenom</label>
                    <input type="text" class="form-control form-control-lg" id="prenom" value="">

                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" class="form-control form-control-lg" id="nom" value="">

                    <label for="tel" class="form-label">Numéro de téléphone</label>
                    <input type="tel" id="tel" name="tel" class="form-control form-control-lg" value="">

                    <label for="anniversaire" class="form-label">Date de naissance</label>
                    <input type="date" id="anniversaire" name="anniversaire" class="form-control form-control-lg" value="" max="<?php echo date('Y-m-d'); ?>">

                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control form-control-lg" id="email" value="">

                    <label for="address" class="form-label">Adresse</label>
                    <input type="text" class="form-control form-control-lg" id="address" value="">

                    <label for="dept" class="form-label">Département</label>
                    <select class="form-select form-select-lg" name="dept" id="dept">

                        <?php foreach ($departements as $departement) { ?>
                            <option value="<?php echo htmlspecialchars($departement['id_departement'], ENT_QUOTES, 'UTF-8'); ?>" <?php if ($userInfo['id_departement'] == $departement['id_departement']) {
                                                                                                                                        echo 'selected';
                                                                                                                                    } ?>><?php echo htmlspecialchars($departement['numero'], ENT_QUOTES, 'UTF-8'); ?> <?php echo htmlspecialchars($departement['nom_departement'], ENT_QUOTES, 'UTF-8'); ?></option>
                        <?php }; ?>

                    </select>

                    <label for="ville" class="form-label">Ville</label>
                    <select class="form-select form-select-lg" name="villeDept" id="villeDept">

                        <option value="">Selectionnez d'abord un département</option>

                    </select>

                    <label for="role" class="form-label">Role</label>
                    <select class="form-select form-select-lg" name="role" id="role">

                        <?php foreach ($roles as $role) { ?>
                            <option value="<?php echo htmlspecialchars($role['id_role'], ENT_QUOTES, 'UTF-8'); ?>" <?php if ($userInfo['id_role'] == $role['id_role']) {
                                                                                                                        echo 'selected';
                                                                                                                    } ?>><?php echo htmlspecialchars($role['nom_role'], ENT_QUOTES, 'UTF-8'); ?></option>
                        <?php }; ?>

                    </select>

                    <input class="my-4 p-3 bg-sand color-snowy border-0 mx-auto" type="submit" value="Ajouter" name="add">

                    <a href="../public/index.php?page=1" class="d-block">Annuler</a>



                <?php } elseif ($_GET['user'] == 'voir') { ?>

                    <div class="moitie-grid mb-4">
                        <div class="me-4">
                            <label for="prenom" class="form-label color-snowy">Prenom</label>
                            <input type="text" class="form-control form-control-lg" id="prenom" value="<?php echo $userInfo['prenom']; ?>">
                        </div>

                        <div class="ms-4">
                            <label for="nom" class="form-label color-snowy">Nom</label>
                            <input type="text" class="form-control form-control-lg" id="nom" value="<?php echo $userInfo['nom_user']; ?>">
                        </div>
                    </div>

                    <div class="moitie-grid mb-4">
                        <div class="me-4">
                            <label for="tel" class="form-label color-snowy">Numéro de téléphone</label>
                            <input type="tel" id="tel" name="tel" class="form-control form-control-lg" value="<?php echo $userInfo['telephone']; ?>">
                        </div>

                        <div class="ms-4">
                            <label for="anniversaire" class="form-label color-snowy">Date de naissance</label>
                            <input type="date" id="anniversaire" name="anniversaire" class="form-control form-control-lg" value="<?php echo $userInfo['anniversaire']; ?>" max="<?php echo date('Y-m-d'); ?>">
                        </div>
                    </div>

                    <label for="email" class="form-label color-snowy">Email</label>
                    <input type="email" class="form-control form-control-lg mb-4" id="email" value="<?php echo $userInfo['email']; ?>">

                    <label for="address" class="form-label color-snowy">Adresse</label>
                    <input type="text" class="form-control form-control-lg mb-4" id="address" value="<?php echo $userInfo['adresse']; ?>">

                    <div class="moitie-grid mb-4">
                        <div class="me-4">
                            <label for="departement" class="form-label color-snowy">Département</label>

                            <select class="form-select form-select-lg" id="departement">
                                <option value="<?php echo $userInfo['id_departement']; ?>"><?php echo $userInfo['numero']; ?> <?php echo $userInfo['nom_departement']; ?></option>
                                <option></option>
                            </select>

                        </div>

                        <div class="ms-4">
                            <label for="ville" class="form-label color-snowy">Ville</label>

                            <select class="form-select form-select-lg" id="ville">
                                <option value="<?php echo $userInfo['id_ville']; ?>"><?php echo $userInfo['nom_ville']; ?> (<?php echo $userInfo['code_postal']; ?>)</option>
                                <option></option>
                            </select>

                        </div>
                    </div>

                    <a href="../public/index.php?page=1" class="d-block">Annuler</a>

                <?php } ?>

            </form>

        <?php } elseif (isset($_GET['menu'])) {

            $idMenu = $_GET['idMenu'];
            $menuInfo = recupMenuInfo($pdo, $idMenu);
            $platsFromDetailsMenu = recupDetailsMenuWithIdMenu($pdo, $idMenu);
            $categs = recupCategs($pdo);
        ?>

            <form class="text-center color-snowy" method="post" action="../controller/traitement_modif_menu.php?idMenu=<?php echo htmlspecialchars($idMenu, ENT_QUOTES, 'UTF-8'); ?>" enctype="multipart/form-data">

                <h1>Menu</h1>

                <?php if ($_GET['menu'] == 'modif') { ?>

                    <label class="form-label">Plats</label>

                    <?php foreach ($categs as $categ) { ?>

                        <p class="text-uppercase"><?php echo $categ['nom_categorie']; ?></p>

                        <?php $platsCategs = recupPlatsCategs($pdo, $categ['id_categ']);
                        foreach ($platsCategs as $platsCateg) { ?>

                            <div class="form-check form-check-inline mx-4">
                                <input class="form-check-input" type="checkbox" name="idPlat[]" id="idPlat" value="<?php echo htmlspecialchars($platsCateg['id_plat'], ENT_QUOTES, 'UTF-8'); ?>" <?php foreach ($platsFromDetailsMenu as $platFromDetailsMenu) {
                                                                                                                                                                                                        if ($platFromDetailsMenu['id_plat'] == $platsCateg['id_plat']) {
                                                                                                                                                                                                            echo 'checked';
                                                                                                                                                                                                        }
                                                                                                                                                                                                    } ?> />
                                <label class="form-check-label" for="idPlat"><?php echo htmlspecialchars($platsCateg['nom_plat'], ENT_QUOTES, 'UTF-8'); ?></label>
                            </div>

                    <?php }
                    } ?>

                    <label for="nomMenu" class="form-label">Nom</label>
                    <input type="text" class="form-control form-control-lg" id="nomMenu" name="nomMenu" value="<?php echo htmlspecialchars($menuInfo[0]['nom_menu'], ENT_QUOTES, 'UTF-8'); ?>">

                    <label for="prixMenu" class="form-label">Prix</label>
                    <input type="text" class="form-control form-control-lg" id="prixMenu" name="prixMenu" value="<?php echo htmlspecialchars($menuInfo[0]['prix_menu'], ENT_QUOTES, 'UTF-8'); ?>">

                    <label for="imgMenu" class="form-label d-block">Images</label>
                    <input type="file" class="form-control form-control-lg" id="imgMenu" name="imgMenu" value="">

                    <input class="my-4 p-3 bg-sand color-snowy border-0 mx-auto" type="submit" value="Modifier" name="add">

                    <a href="../public/index.php?page=2" class="d-block">Annuler</a>

                <?php } elseif ($_GET['menu'] == 'voir') {

                    $idMenu = $_GET['idMenu'];
                    $menuInfo = recupMenuInfo($pdo, $idMenu); ?>

                    <label for="nomMenu" class="form-label">Nom</label>
                    <input type="text" class="form-control form-control-lg" id="nomMenu" name="nomMenu" value="<?php echo htmlspecialchars($menuInfo['nom_menu'], ENT_QUOTES, 'UTF-8'); ?>">

                    <label for="prixMenu" class="form-label">Prix</label>
                    <input type="text" class="form-control form-control-lg" id="prixMenu" name="prixMenu" value="<?php echo htmlspecialchars($menuInfo['prix_menu'], ENT_QUOTES, 'UTF-8'); ?>">

                    <label for="prixMenu" class="form-label">Plats</label>
                    <input type="text" class="form-control form-control-lg" id="prixMenu" name="prixMenu" value="<?php echo htmlspecialchars($menuInfo['nom_plat'], ENT_QUOTES, 'UTF-8'); ?>">

                    <label for="imgMenu" class="form-label d-block">Images</label>
                    <input type="file" class="form-control form-control-lg" id="imgMenu" name="imgMenu" value="">

                    <a href="../public/index.php?page=2" class="d-block">Annuler</a>

                <?php } ?>

            </form>

        <?php } elseif (isset($_GET['plat'])) {

            $idPlat = $_GET['idPlat'];
            $platInfos = recupPlatInfo($pdo, $idPlat);
            $categs = recupCategs($pdo);
            $ingredients = recupIngredients($pdo);
            $ingredientsFromDetailsPlat = recupDetailsPlatWithIdPlat($pdo, $idPlat); ?>

            <form class="text-center color-snowy" method="post" action="../controller/traitement_modif_plat.php?idPlat=<?php echo htmlspecialchars($platInfos['id_plat'], ENT_QUOTES, 'UTF-8'); ?>" enctype="multipart/form-data">
                <h1>Plat</h1>

                <?php if ($_GET['plat'] == 'modif') { ?>

                    <div class="py-3">

                        <label for="categorie" class="form-label d-block pb-2 fw-bold">Catégorie</label>

                        <div class="d-flex justify-content-evenly">

                            <?php foreach ($categs as $categ) { ?>
                                <div>
                                    <input class="form-check-input" type="radio" id="categorie" name="categorie" value="<?php echo htmlspecialchars($categ['id_categ'], ENT_QUOTES, 'UTF-8'); ?>" <?php if ($platInfos['id_categ'] == $categ['id_categ']) {
                                                                                                                                                                                                        echo 'checked';
                                                                                                                                                                                                    } ?>>
                                    <label for="categorie" class="form-check-label"><?php echo htmlspecialchars($categ['nom_categorie'], ENT_QUOTES, 'UTF-8'); ?></label>
                                </div>
                            <?php } ?>

                        </div>

                    </div>

                    <div class="py-3">

                        <label for="categorie" class="form-label d-block pb-2 fw-bold">Ingrédients</label>

                        <div class="d-flex justify-content-evenly">

                            <?php foreach ($ingredients as $ingredient) {
                                //mieux de faire une variable qui récupère juste les ingredients du plat au lieu de tout le plat
                            ?>
                                <div>
                                    <input class="form-check-input" type="checkbox" id="ingredient" name="ingredient[]" value="<?php echo htmlspecialchars($ingredient['id_ingredient'], ENT_QUOTES, 'UTF-8'); ?>" <?php foreach ($ingredientsFromDetailsPlat as $ingredientFromDetailsPlat) {
                                                                                                                                                                                                                        if ($ingredientFromDetailsPlat['id_ingredient'] == $ingredient['id_ingredient']) {
                                                                                                                                                                                                                            echo 'checked';
                                                                                                                                                                                                                        }
                                                                                                                                                                                                                    } ?>>
                                    <label for="ingredient" class="form-check-label"><?php echo htmlspecialchars($ingredient['nom_ingredient'], ENT_QUOTES, 'UTF-8'); ?></label>
                                </div>
                            <?php } ?>

                        </div>

                    </div>

                    <label for="nomPlat" class="form-label">Nom</label>
                    <input type="text" class="form-control form-control-lg" id="nomPlat" name="nomPlat" value="<?php echo htmlspecialchars($platInfos['nom_plat'], ENT_QUOTES, 'UTF-8'); ?>">

                    <label for="prixPlat" class="form-label">Prix</label>
                    <input type="text" class="form-control form-control-lg" id="prixPlat" name="prixPlat" value="<?php echo htmlspecialchars($platInfos['prix_plat'], ENT_QUOTES, 'UTF-8'); ?>">

                    <label for="imgPlat" class="form-label">Images</label>
                    <input type="file" class="form-control form-control-lg" id="imgPlat" name="imgPlat" value="">

                    <input class="my-4 p-3 bg-sand color-snowy border-0 mx-auto" type="submit" value="Ajouter" name="add">

                    <a href="../public/index.php?page=3" class="d-block">Annuler</a>

                <?php  } elseif ($_GET['plat'] == 'voir') {

                    $idPlat = $_GET['idPlat'];
                    $platInfos = recupPlatInfo($pdo, $idPlat); ?>

                    <label for="nomPlat" class="form-label">Nom</label>
                    <input type="text" class="form-control form-control-lg" id="nomPlat" name="nomPlat" value="<?php echo $platInfos['nom_plat']; ?>">

                    <label for="prixPlat" class="form-label">Prix</label>
                    <input type="text" class="form-control form-control-lg" id="prixPlat" name="prixPlat" value="<?php echo $platInfos['prix_plat']; ?>">

                    <label for="nomCateg" class="form-label">Catégorie</label>
                    <input type="text" class="form-control form-control-lg" id="prixPlat" name="prixPlat" value="<?php echo $platInfos['nom_categorie']; ?>">

                    <label for="nomIngredient" class="form-label">Ingrédients</label>
                    <input type="text" class="form-control form-control-lg" id="prixPlat" name="prixPlat" value="<?php echo $platInfos['nom_ingredient']; ?>">

                    <label for="imgPlat" class="form-label">Images</label>
                    <input type="file" class="form-control form-control-lg" id="imgPlat" name="imgPlat" value="">

                    <a href="../public/index.php?page=3" class="d-block">Annuler</a>

                <?php } ?>

            </form>

        <?php } elseif (isset($_GET['categ'])) {

            $idCateg = $_GET['idCateg'];
            $categInfo = recupCategInfo($pdo, $idCateg); ?>

            <form class="text-center color-snowy" method="post" action="../controller/traitement_modif_categorie.php?idCateg=<?php echo htmlspecialchars($categInfo['id_categ'], ENT_QUOTES, 'UTF-8'); ?>">

                <h1>Categorie</h1>

                <?php if ($_GET['categ'] == 'modif') { ?>

                    <label for="nomCateg" class="form-label">Nom</label>
                    <input type="text" class="form-control form-control-lg" id="nomCateg" name="nomCateg" value="<?php echo htmlspecialchars($categInfo['nom_categorie'], ENT_QUOTES, 'UTF-8'); ?>">

                    <input class="my-4 p-3 bg-sand color-snowy border-0 mx-auto" type="submit" value="Ajouter" name="add">

                    <a href="../public/index.php?page=4" class="d-block">Annuler</a>

                <?php } elseif ($_GET['categ'] == 'voir') { ?>

                    <label for="nomCategSee" class="form-label">Nom</label>
                    <input type="text" class="form-control form-control-lg" id="nomCategSee" value="<?php echo htmlspecialchars($categInfo['nom_categorie'], ENT_QUOTES, 'UTF-8'); ?>">

                    <a href="../public/index.php?page=4" class="d-block">Annuler</a>

                <?php } ?>

            </form>

        <?php } elseif (isset($_GET['ingredient'])) {

            $idIngredient = $_GET['idIngredient'];
            $ingredientInfo = recupIngredientInfo($pdo, $idIngredient); ?>

            <form class="text-center color-snowy" method="post" action="../controller/traitement_modif_ingredient.php?idIngredient=<?php echo htmlspecialchars($ingredientInfo['id_ingredient'], ENT_QUOTES, 'UTF-8'); ?>">
                <h1>Ingredient</h1>

                <?php if ($_GET['ingredient'] == 'modif') { ?>

                    <label for="nomIngredient" class="form-label">Nom</label>
                    <input type="text" class="form-control form-control-lg" id="nomIngredient" name="nomIngredient" value="<?php echo htmlspecialchars($ingredientInfo['nom_ingredient'], ENT_QUOTES, 'UTF-8'); ?>">

                    <input class="my-4 p-3 bg-sand color-snowy border-0 mx-auto" type="submit" value="Modifier" name="add">

                    <a href="../public/index.php?page=5" class="d-block">Annuler</a>

                <?php } elseif ($_GET['ingredient'] == 'voir') { ?>

                    <label for="nomIngredientSee" class="form-label">Nom</label>
                    <input type="text" class="form-control form-control-lg" id="nomIngredientSee" value="<?php echo htmlspecialchars($ingredientInfo['nom_ingredient'], ENT_QUOTES, 'UTF-8'); ?>">

                    <a href="../public/index.php?page=5" class="d-block">Annuler</a>

                <?php } ?>

            </form>

        <?php } elseif (isset($_GET['event'])) {

            $idEvent = $_GET['idEvent'];
            $eventInfo = recupEventInfo($pdo, $idEvent); ?>

            <form class="text-center color-snowy" method="post" action="../controller/traitement_modif_event.php?idEvent=<?php echo htmlspecialchars($eventInfo['id_event'], ENT_QUOTES, 'UTF-8'); ?>">
                <h1>Evenement</h1>

                <?php if ($_GET['event'] == 'modif') { ?>

                    <label for="nomEvent" class="form-label">Nom</label>
                    <input type="text" class="form-control form-control-lg" id="nomEvent" name="nomEvent" value="<?php echo htmlspecialchars($eventInfo['nom_event'], ENT_QUOTES, 'UTF-8'); ?>">

                    <input class="my-4 p-3 bg-sand color-snowy border-0 mx-auto" type="submit" value="Modifier" name="add">

                    <a href="../public/index.php?page=6" class="d-block">Annuler</a>

                <?php } elseif ($_GET['event'] == 'voir') { ?>

                    <label for="nomEventSee" class="form-label">Nom</label>
                    <input type="text" class="form-control form-control-lg" id="nomEventSee" value="<?php echo htmlspecialchars($eventInfo['nom_event'], ENT_QUOTES, 'UTF-8'); ?>">

                    <a href="../public/index.php?page=6" class="d-block">Annuler</a>

                <?php } ?>

            </form>

            <?php } elseif (isset($_GET['message'])) {
            if ($_GET['message'] == 'voir') {

                $idMessage = $_GET['idMessage'];
                $messageInfo = recupMessageInfo($pdo, $idMessage); ?>

                <form class="text-center color-snowy">
                    <h1>Message</h1>

                    <label for="nomEvent" class="form-label">Date</label>
                    <input type="text" class="form-control form-control-lg" id="nomEvent" name="nomEvent" value="<?php echo htmlspecialchars($messageInfo['date_message'], ENT_QUOTES, 'UTF-8'); ?>">

                    <label for="nomEvent" class="form-label">Nom</label>
                    <input type="text" class="form-control form-control-lg" id="nomEvent" name="nomEvent" value="<?php echo htmlspecialchars($messageInfo['nom'], ENT_QUOTES, 'UTF-8'); ?>">

                    <label for="nomEvent" class="form-label">Sujet</label>
                    <input type="text" class="form-control form-control-lg" id="nomEvent" name="nomEvent" value="<?php echo htmlspecialchars($messageInfo['sujet'], ENT_QUOTES, 'UTF-8'); ?>">

                    <label for="nomEvent" class="form-label">Email</label>
                    <input type="text" class="form-control form-control-lg" id="nomEvent" name="nomEvent" value="<?php echo htmlspecialchars($messageInfo['email'], ENT_QUOTES, 'UTF-8'); ?>">

                    <label for="nomEvent" class="form-label">Message</label>
                    <textarea class="form-control form-control-lg" id="nomEvent" name="nomEvent"><?php echo htmlspecialchars($messageInfo['message'], ENT_QUOTES, 'UTF-8'); ?></textarea>

                    <a href="../public/index.php?page=7" class="d-block">Annuler</a>

                </form>

            <?php }
        } elseif (isset($_GET['prestation'])) {
            if ($_GET['prestation'] == 'modif') {

                $idPresta = $_GET['idPresta'];
                $prestaInfo = recupPrestaInfo($pdo, $idPresta);
                $events = recupEvents($pdo); ?>

                <form class="text-center color-snowy" method="post" action="../controller/traitement_modif_presta.php?idPresta=<?php echo htmlspecialchars($prestaInfo['id_prestation'], ENT_QUOTES, 'UTF-8'); ?>">
                    <h1>Prestation</h1>

                    <label for="nomPresta" class="form-label">Nom</label>
                    <input type="text" class="form-control form-control-lg" id="nomPresta" name="nomPresta" value="<?php echo htmlspecialchars($prestaInfo['nom_prestation'], ENT_QUOTES, 'UTF-8'); ?>">

                    <label for="event" class="form-label d-block pb-2 fw-bold">Evenement</label>

                    <div class="d-flex justify-content-evenly">

                        <?php foreach ($events as $event) {
                            $prestationsFromDetailsEvent = recupDetailsEventWithIdEvent($pdo, $event['id_event']); ?>
                            <div>
                                <input class="form-check-input" type="checkbox" id="event" name="event[]" value="<?php echo htmlspecialchars($event['id_event'], ENT_QUOTES, 'UTF-8'); ?>" <?php foreach ($prestationsFromDetailsEvent as $prestationFromDetailsEvent) {
                                                                                                                                                                                                if ($prestationFromDetailsEvent['id_prestation'] == $prestaInfo['id_prestation']) {
                                                                                                                                                                                                    echo 'checked';
                                                                                                                                                                                                }
                                                                                                                                                                                            } ?>>
                                <label for="event" class="form-check-label"><?php echo htmlspecialchars($event['nom_event'], ENT_QUOTES, 'UTF-8'); ?></label>
                            </div>
                        <?php } ?>

                    </div>

                    <input class="my-4 p-3 bg-sand color-snowy border-0 mx-auto" type="submit" value="Modifier" name="add">

                    <a href="../public/index.php?page=9" class="d-block">Annuler</a>

                </form>

            <?php }
        } elseif (isset($_GET['devis'])) {

            $idEvent = $_GET['idEvent'];
            $eventInfo = recupEventInfo($pdo, $idEvent); ?>

            <form class="text-center color-snowy" method="post" action="../controller/traitement_modif_event.php?idEvent=<?php echo htmlspecialchars($eventInfo['id_event'], ENT_QUOTES, 'UTF-8'); ?>">
                <h1>Evenement</h1>

                <?php if ($_GET['devis'] == 'modif') { ?>

                    <label for="nomEvent" class="form-label">Nom</label>
                    <input type="text" class="form-control form-control-lg" id="nomEvent" name="nomEvent" value="<?php echo htmlspecialchars($eventInfo['nom_event'], ENT_QUOTES, 'UTF-8'); ?>">

                    <input class="my-4 p-3 bg-sand color-snowy border-0 mx-auto" type="submit" value="Ajouter" name="add">

                    <a href="../public/index.php?page=6" class="d-block">Annuler</a>

                <?php } elseif ($_GET['devis'] == 'voir') { ?>

                    <label for="nomEventSee" class="form-label">Nom</label>
                    <input type="text" class="form-control form-control-lg" id="nomEventSee" value="<?php echo htmlspecialchars($eventInfo['nom_event'], ENT_QUOTES, 'UTF-8'); ?>">

                    <a href="../public/index.php?page=6" class="d-block">Annuler</a>

                <?php } ?>

            </form>

        <?php } ?>

    </section>
</main>