<?php
$plats = recupPlats($pdo);
$ingredients = recupIngredients($pdo);
$categs = recupCategs($pdo);
?>

<main class="figurines">
    <section>
        <h1 class="py-5 text-center">Plats</h1>
        <?php
        if (isset($_GET['clic'])) {
            if ($_GET['clic'] == 'ajouter') {
        ?>
                <form class="text-center color-snowy" method="post" action="../controller/traitement_ajout_plat.php" enctype="multipart/form-data">

                    <label for="nomIngredient" class="form-label">Ingrédients</label>
                    <div class="d-md-flex justify-content-center align-items-center mb-4 py-2">

                        <?php
                        foreach ($ingredients as $ingredient) { ?>
                            <div class="form-check form-check-inline mx-4 my-2">
                                <input class="form-check-input" type="checkbox" name="nomIngredient[]" id="nomIngredient" value="<?php echo htmlspecialchars($ingredient['id_ingredient'], ENT_QUOTES, 'UTF-8'); ?>" />

                                <label class="form-check-label" for="nomIngredient"><?php echo htmlspecialchars($ingredient['nom_ingredient'], ENT_QUOTES, 'UTF-8'); ?></label>
                            </div>
                        <?php } ?>

                    </div>

                    <label for="nomCateg" class="form-label">Catégorie</label>
                    <select class="form-control form-control-lg" name="nomCateg" id="nomCateg">
                        <option value="">Sélectionnez une catégorie</option>
                        <?php foreach ($categs as $categ) { ?>
                            <option value="<?php echo htmlspecialchars($categ['id_categ'], ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($categ['nom_categorie'], ENT_QUOTES, 'UTF-8'); ?></option>
                        <?php } ?>
                    </select>

                    <label for="nomPlat" class="form-label">Nom</label>
                    <input type="text" class="form-control form-control-lg" id="nomPlat" name="nomPlat" value="">

                    <label for="prixPlat" class="form-label">Prix</label>
                    <input type="text" class="form-control form-control-lg" id="prixPlat" name="prixPlat" value="">

                    <label for="imgPlat" class="form-label">Images</label>
                    <input type="file" class="form-control form-control-lg" id="imgPlat" name="imgPlat" value="">

                    <input class="my-4 p-3 bg-sand color-snowy border-0 mx-auto" type="submit" value="Ajouter" name="add">

                    <a href="../public/index.php?page=3" class="d-block">Annuler</a>

                </form>
            <?php }
        } else {
            ?>
            <a href="../public/index.php?page=3&clic=ajouter">Ajouter un plat</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col"></th>
                        <th scope="col">Nom</th>
                        <th scope="col">Prix</th>
                        <th scope="col">Catégorie</th>
                        <th scope="col">Ingrédients</th>
                        <th scope="col" colspan="3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($plats as $plat) {

                    ?>
                        <tr>
                            <th scope="row"><?php echo htmlspecialchars($plat['id_plat'], ENT_QUOTES, 'UTF-8'); ?></th>
                            <td><img class="img-bo" src="<?php echo "../../".htmlspecialchars($plat['image_plat'], ENT_QUOTES, 'UTF-8'); ?>" alt=""></td>
                            <td><?php echo htmlspecialchars($plat['nom_plat'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($plat['prix_plat'], ENT_QUOTES, 'UTF-8'); ?> €</td>
                            <td><?php echo htmlspecialchars($plat['nom_categorie'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td> <?php $ingredientsFromPlat = recupIngredientsFromPlat($pdo, $plat['id_plat']);
                                    foreach ($ingredientsFromPlat as $ingredientFromPlat) {
                                        echo htmlspecialchars($ingredientFromPlat['nom_ingredient'], ENT_QUOTES, 'UTF-8').', ';
                                    } ?>
                            </td>
                            <td>
                                <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-eye"></i></button> -->
                                <a href="index.php?page=8&plat=voir&idPlat=<?php echo htmlspecialchars($plat['id_plat'], ENT_QUOTES, 'UTF-8'); ?>" class="text-black text-decoration-none"><i class="fa-solid fa-eye"></i></a>
                            </td>
                            <td><a href="index.php?page=8&plat=modif&idPlat=<?php echo htmlspecialchars($plat['id_plat'], ENT_QUOTES, 'UTF-8'); ?>" class="text-black text-decoration-none">Edit</a></td>
                            <td><a href="../controller/traitement_delete_plat.php?idPlat=<?php echo htmlspecialchars($plat['id_plat'], ENT_QUOTES, 'UTF-8'); ?>"><i class="fa-solid fa-trash-can text-black"></i></a></td>
                        </tr>
                    <?php
                    }
                    die();
                    ?>
                </tbody>
            </table>
        <?php } ?>

        <!-- Modale  -->

        <!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div> -->

    </section>
</main>