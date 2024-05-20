<?php
$departements = recupDepartements($pdo);
date_default_timezone_set('Europe/Paris');
?>

<main class="text-center mx-auto p-5">
    <form class="card card-registration m-5" method="post" action="../controller/traitement_inscription.php">

        <!-- pop up? -->
        <p class="erreur">
            <?php
            if (isset($_GET['erreur'])) {
                if ($_GET['erreur'] == 'emailExiste') {
                    echo "Vous êtes déjà inscris";
                }
            }
            ?>
        </p>
        <p class="erreur">
            <?php
            if (isset($_GET['erreur'])) {
                if ($_GET['erreur'] == 'confirmMdp') {
                    echo "Les mots de passe ne correspondent pas";
                }
            }
            ?>
        </p>
        <!-- pop up? -->

        <div class="px-5 py-4 text-black">

            <p class="text-start">Vous avez déjà un compte ? <a class="color-sand" href="../public/index.php?page=4" id="login-form-link">Se connecter</a></p>
            <div class="px-5">
                <h3 class="mb-5 text-uppercase">Inscription</h3>

                <div class="d-md-flex justify-content-center align-items-center mb-4 py-2">

                    <div class="form-check form-check-inline mx-4 my-2">
                        <input class="form-check-input" type="radio" name="sexe" id="femme" value="femme" />
                        <label class="form-check-label" for="sexe">Femme</label>
                    </div>

                    <div class="form-check form-check-inline mx-4 my-2">
                        <input class="form-check-input" type="radio" name="sexe" id="homme" value="homme" />
                        <label class="form-check-label" for="sexe">Homme</label>
                    </div>

                    <div class="form-check form-check-inline mx-4 my-2">
                        <input class="form-check-input" type="radio" name="sexe" id="autre" value="autre" />
                        <label class="form-check-label" for="sexe">Autre</label>
                    </div>

                </div>

                <div class="moitie-grid mb-4">
                    <div class="me-4">
                        <label class="form-label" for="prenom">Prénom</label>
                        <input type="text" id="prenom" name="prenom" class="form-control form-control-lg" />
                    </div>
                    <div class="ms-4">
                        <label class="form-label" for="nom">Nom de famille</label>
                        <input type="text" id="nom" name="nom" class="form-control form-control-lg" />
                    </div>
                </div>

                <div class="moitie-grid mb-4">
                    <div class="me-4">
                        <label class="form-label" for="tel">Numéro de téléphone</label>
                        <input type="tel" id="tel" name="tel" class="form-control form-control-lg">
                    </div>
                    <div class="ms-4">
                        <label class="form-label" for="anniversaire">Date de naissance</label>
                        <input type="date" id="anniversaire" name="anniversaire" class="form-control form-control-lg" max="<?php echo date('Y-m-d'); ?>">
                    </div>
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label" for="email">Adresse Email</label>
                    <input type="text" id="email" name="email" class="form-control form-control-lg" />
                </div>

                <div class="moitie-grid mb-4">
                    <div class="me-4">
                        <label class="form-label" for="mdp">Mot de passe</label>
                        <input type="password" id="mdp" name="mdp" class="form-control form-control-lg mdp">
                    </div>
                    <div class="ms-4">
                        <label class="form-label" for="mdpConfirm">Confirmer le mot de passe</label>
                        <input type="password" id="mdpConfirm" name="mdpConfirm" class="form-control form-control-lg mdp">
                    </div>
                </div>
                <i class="btn bi bi-eye-fill" id="eye"></i>

                <div class="form-outline mb-4">
                    <label class="form-label" for="adresse">Adresse</label>
                    <input type="text" id="adresse" name="adresse" class="form-control form-control-lg" />
                </div>

                <div class="moitie-grid">
                    <div class="me-4">
                        <label for="dept" class="form-label">Département</label>
                        <select class="form-select form-select-lg" name="dept" id="dept">
                            <?php foreach ($departements as $departement) { ?>
                                <option value="<?php echo htmlspecialchars($departement['id_departement'], ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($departement['numero'], ENT_QUOTES, 'UTF-8'); ?> <?php echo htmlspecialchars($departement['nom_departement'], ENT_QUOTES, 'UTF-8'); ?></option>
                            <?php }; ?>
                        </select>
                    </div>

                    <div class="ms-4">
                        <label for="villeDept" class="form-label">Ville</label>
                        <select class="form-select form-select-lg" name="villeDept" id="villeDept">

                            <option value="">Selectionnez d'abord un département</option>

                        </select>
                    </div>
                </div>

                <input class="my-4 p-3 bg-sand color-snowy border-0" type="submit" value="S'inscrire" name="envoyer">
            </div>
        </div>
    </form>
</main>