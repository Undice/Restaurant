<main class="connexion">
    <section class="container text-center p-5">
        <form class="card card-registration m-5" method="post" action="../controller/traitement_recupMdp1.php">

            <p class="text-success">
                <?php
                if (isset($_GET['success'])) {
                    if ($_GET['success'] == 'email') {
                        echo "Un email vous a été envoyé";
                    }
                }
                ?>
            </p>

            <p class="text-warning">
                <?php
                if (isset($_GET['erreur'])) {

                    if ($_GET['erreur'] == 'token') {
                        echo "Le token n'est pas bon";
                    } elseif ($_GET['erreur'] == 'tokenValid') {
                        echo "Le token a expiré";
                    }
                }
                ?>
            </p>

            <div class="my-4 py-4 px-5 w-100 text-black">

                <div class="form-outline mb-4">
                    <label class="form-label" for="email">Adresse Email</label>
                    <input type="text" id="email" name="email" class="form-control form-control-lg" />
                </div>

                <input class="mb-4 p-3 bg-sand border-0 color-snowy m-2" type="submit" value="Continuer" name="envoyer">
            </div>

            <a href="../public/index.php?page=5">Revenir à la connexion</a></p>
        </form>
    </section>
</main>