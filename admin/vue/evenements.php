<?php
$events = recupEvents($pdo);
?>

<main class="events">
    <section>
        <h1 class="py-5 text-center">Evenements</h1>
        <?php
        if (isset($_GET['clic'])) {
            if ($_GET['clic'] == 'ajouter') {
        ?>
                <form class="text-center color-snowy" method="post" action="../controller/traitement_ajout_event.php">

                    <label for="nomEvent" class="form-label">Nom</label>
                    <input type="text" class="form-control form-control-lg" id="nomEvent" name="nomEvent" value="">

                    <input class="my-4 p-3 bg-sand color-snowy border-0 mx-auto" type="submit" value="Ajouter" name="add">

                    <a href="../public/index.php?page=6" class="d-block">Annuler</a>

                </form>
            <?php }
        } else {
            ?>
            <a href="../public/index.php?page=6&clic=ajouter">Ajouter un évènement</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom</th>
                        <th scope="col" colspan="3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($events as $event) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo htmlspecialchars($event['id_event'], ENT_QUOTES, 'UTF-8'); ?></th>
                            <td><?php echo htmlspecialchars($event['nom_event'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><a href="index.php?page=8&event=voir&idEvent=<?php echo htmlspecialchars($event['id_event'], ENT_QUOTES, 'UTF-8'); ?>" class="text-black text-decoration-none"><i class="fa-solid fa-eye"></i></a></td>
                            <td><a href="index.php?page=8&event=modif&idEvent=<?php echo htmlspecialchars($event['id_event'], ENT_QUOTES, 'UTF-8'); ?>" class="text-black text-decoration-none">Edit</a></td>
                            <td><a href="../controller/traitement_delete_event.php?idEvent=<?php echo htmlspecialchars($event['id_event'], ENT_QUOTES, 'UTF-8'); ?>"><i class="fa-solid fa-trash-can text-black"></i></a></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        <?php } ?>
    </section>
</main>