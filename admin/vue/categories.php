<?php
$categs = recupCategs($pdo);
?>

<main class="categories">
    <section>
        <h1 class="py-5 text-center">Catégories</h1>
        <?php
        if (isset($_GET['clic'])) {
            if ($_GET['clic'] == 'ajouter') {
        ?>
                <form class="text-center color-snowy" method="post" action="../controller/traitement_ajout_categorie.php">
                    
                    <label for="nomCateg" class="form-label">Nom</label>
                    <input type="text" class="form-control form-control-lg" id="nomCateg" name="nomCateg" value="">

                    <input class="my-4 p-3 bg-sand color-snowy border-0 mx-auto" type="submit" value="Ajouter" name="add">
                    
                    <a href="../public/index.php?page=4" class="d-block">Annuler</a>
                </form>
            <?php }
        } else {
            ?>
            <a href="../public/index.php?page=4&clic=ajouter">Ajouter une catégorie</a>
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
                    foreach ($categs as $categ) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo htmlspecialchars($categ['id_categ'], ENT_QUOTES, 'UTF-8'); ?></th>
                            <td><?php echo htmlspecialchars($categ['nom_categorie'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><a href="index.php?page=8&categ=voir&idCateg=<?php echo htmlspecialchars($categ['id_categ'], ENT_QUOTES, 'UTF-8'); ?>" class="text-black text-decoration-none"><i class="fa-solid fa-eye"></i></a></td>
                            <td><a href="index.php?page=8&categ=modif&idCateg=<?php echo htmlspecialchars($categ['id_categ'], ENT_QUOTES, 'UTF-8'); ?>" class="text-black text-decoration-none">Edit</a></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        <?php } ?>

    </section>
</main>