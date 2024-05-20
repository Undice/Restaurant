<?php
$ingredients = recupIngredients($pdo);
?>

<main class="ingredients">
    <section>
        <h1 class="py-5 text-center">Ingrédients</h1>
        <?php
        if (isset($_GET['clic'])) {
            if ($_GET['clic'] == 'ajouter') {
        ?>
                <form class="text-center color-snowy" method="post" action="../controller/traitement_ajout_ingredient.php">

                    <label for="nomIngredient" class="form-label">Nom</label>
                    <input type="text" class="form-control form-control-lg" id="nomIngredient" name="nomIngredient" value="">

                    <input class="my-4 p-3 bg-sand color-snowy border-0 mx-auto" type="submit" value="Ajouter" name="add">

                    <a href="../public/index.php?page=5" class="d-block">Annuler</a>

                </form>
            <?php }
        } else {
            ?>
            <a href="../public/index.php?page=5&clic=ajouter">Ajouter un ingrédient</a>
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
                    foreach ($ingredients as $ingredient) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo htmlspecialchars($ingredient['id_ingredient'], ENT_QUOTES, 'UTF-8'); ?></th>
                            <td><?php echo htmlspecialchars($ingredient['nom_ingredient'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><a href="index.php?page=8&ingredient=voir&idIngredient=<?php echo htmlspecialchars($ingredient['id_ingredient'], ENT_QUOTES, 'UTF-8'); ?>" class="text-black text-decoration-none"><i class="fa-solid fa-eye"></i></a></td>
                            <td><a href="index.php?page=8&ingredient=modif&idIngredient=<?php echo htmlspecialchars($ingredient['id_ingredient'], ENT_QUOTES, 'UTF-8'); ?>" class="text-black text-decoration-none">Edit</a></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        <?php } ?>
    </section>
</main>