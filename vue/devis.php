<?php

$evenements = recupEvents($pdo);
$prestations = recupPrestations($pdo);

?>

<main class="devis d-flex flex-column justify-content-center align-items-center">
    <section class="w-75">

        <h1 class="text-center color-snowy pb-5">Votre Devis Traiteur</h1>

        <p class="text-danger">
            <?php
            if (isset($_GET['erreur'])) {

                if ($_GET['erreur'] == 'psConnecte') {
                    echo "Vous devez d'abord vous connecter pour faire un devis";
                }
            }
            ?>
        </p>

        <form class="px-5 py-4 text-black" method="post" action="../controller/traitement_devis.php">

                <div class="form-outline mb-4">
                    <label class="form-label color-sand" for="nbPersonnes">Nombre de personnes</label>
                    <input type="number" class="form-control form-control-lg" id="nbPersonnes" name="nbPersonnes" value="1" min="1" />
                </div>

                <div class="moitie-grid mb-4">

                    <div class="form-outline me-3">
                        <label for="event" class="form-label color-sand">Quel est le type de votre événement ?</label>
                        <select class="form-select form-select-lg" name="event" id="event">
                            <option value="">Choisissez un evenement</option>
                            <?php foreach ($evenements as $evenement) { ?>
                                <option value="<?php echo htmlspecialchars($evenement['id_event'], ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($evenement['nom_event'], ENT_QUOTES, 'UTF-8'); ?></option>
                            <?php }; ?>
                        </select>
                    </div>

                    <div class="form-outline ms-3">
                        <label for="prestation" class="form-label color-sand">De quelle prestation avez-vous besoin ?</label>
                        <select class="form-select form-select-lg" name="prestation" id="prestation">
                            <option value="">Choisissez une prestation</option>
                            <?php foreach ($prestations as $prestation) { ?>
                                <option value="<?php echo htmlspecialchars($prestation['id_prestation'], ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($prestation['nom_prestation'], ENT_QUOTES, 'UTF-8'); ?></option>
                            <?php }; ?>
                        </select>
                    </div>

                </div>

                <div class="form-outline mb-4">
                    <label for="commentaire" class="form-label color-sand">Commentaire supplémentaire</label>
                    <textarea id="commentaire" name="commentaire" class="form-control form-control-lg" placeholder="Votre message"></textarea>
                </div>


                <div class="form-outline mb-4">
                    <label class="form-label color-sand" for="dateEvent">Date de l'événement</label>
                    <input type="datetime-local" class="form-control form-control-lg" id="dateEvent" name="dateEvent" value="1" min="1" />
                </div>

                <?php if (isset($_SESSION['idUser'])) { ?>

                    <input class="my-4 p-3 bg-sand color-snowy border-0" type="submit" value="Envoyer" name="send">

                <?php } else { ?>

                    <a class="my-4 p-3 bg-sand color-snowy border-0 text-decoration-none" href="../public/index.php?page=2&erreur=psConnecte">Envoyer</a>

                <?php } ?>

        </form>
    </section>
</main>