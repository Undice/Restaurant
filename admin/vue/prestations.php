<?php
$prestas = recupPrestations($pdo);
?>

<main class="prestas">
    <section>
        <h1 class="py-5 text-center">Prestations</h1>
        <?php
        if (isset($_GET['clic'])) {
            if ($_GET['clic'] == 'ajouter') {
        ?>
                <form class="text-center color-snowy" method="post" action="../controller/traitement_ajout_presta.php">

                    <label for="nomPresta" class="form-label">Nom</label>
                    <input type="text" class="form-control form-control-lg" id="nomPresta" name="nomPresta" value="">

                    <input class="my-4 p-3 bg-sand color-snowy border-0 mx-auto" type="submit" value="Ajouter" name="add">

                    <a href="../public/index.php?page=9" class="d-block">Annuler</a>

                </form>
            <?php }
        } else {
            ?>
            <a href="../public/index.php?page=9&clic=ajouter">Ajouter une prestation</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Evenement</th>
                        <th scope="col" colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($prestas as $presta) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo htmlspecialchars($presta['id_prestation'], ENT_QUOTES, 'UTF-8'); ?></th>
                            <td><?php echo htmlspecialchars($presta['nom_prestation'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php $eventsFromPresta = recupEventsFromPresta($pdo, $presta['id_prestation']);
                                foreach ($eventsFromPresta as $eventFromPresta) {
                                    echo htmlspecialchars($eventFromPresta['nom_event'], ENT_QUOTES, 'UTF-8') . ', ';
                                } ?></td>
                            <td><a href="index.php?page=8&prestation=modif&idPresta=<?php echo htmlspecialchars($presta['id_prestation'], ENT_QUOTES, 'UTF-8'); ?>" class="text-black text-decoration-none">Edit</a></td>
                            <td><a href="../controller/traitement_delete_presta.php?idPresta=<?php echo htmlspecialchars($presta['id_prestation'], ENT_QUOTES, 'UTF-8'); ?>"><i class="fa-solid fa-trash-can text-black"></i></a></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        <?php } ?>
    </section>
</main>