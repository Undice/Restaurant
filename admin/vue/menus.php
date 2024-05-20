<?php
$menus = recupMenus($pdo);
$categs = recupCategs($pdo);
?>

<main class="menus">
    <section>
        <h1 class="py-5 text-center">Menus</h1>
        <?php
        if (isset($_GET['clic'])) {
            if ($_GET['clic'] == 'ajouter') {
        ?>
                <form class="text-center color-snowy" method="post" action="../controller/traitement_ajout_menu.php?" enctype="multipart/form-data">

                <?php foreach ($categs as $categ) { ?>
                        <p class="text-uppercase"><?php echo $categ['nom_categorie']; ?></p>

                        <?php $plats = recupPlatsCategs($pdo, $categ['id_categ']);

                        foreach ($plats as $plat) { ?>
                            <div class="form-check form-check-inline mx-4 my-2">
                                <input class="form-check-input" type="checkbox" name="nomPlat[]" id="nomPlat" value="<?php echo htmlspecialchars($plat['id_plat'], ENT_QUOTES, 'UTF-8'); ?>" />
                                <label class="form-check-label" for="nomPlat"><?php echo htmlspecialchars($plat['nom_plat'], ENT_QUOTES, 'UTF-8'); ?></label>
                            </div>
                    <?php }
                    } ?>

                    <label for="nomMenu" class="form-label">Nom</label>
                    <input type="text" class="form-control form-control-lg" id="nomMenu" name="nomMenu" value="">

                    <label for="prixMenu" class="form-label">Prix</label>
                    <input type="text" class="form-control form-control-lg" id="prixMenu" name="prixMenu" value="">

                    <label for="imgMenu" class="form-label d-block">Images</label>
                    <input type="file" class="form-control form-control-lg" id="imgMenu" name="imgMenu">

                    <input class="my-4 p-3 bg-sand color-snowy border-0 mx-auto" type="submit" value="Ajouter" name="add">

                    <a href="../public/index.php?page=2" class="d-block">Annuler</a>

                </form>
            <?php }
        } else {
            ?>
            <a href="../public/index.php?page=2&clic=ajouter">Ajouter un menu</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col"></th>
                        <th scope="col">Nom</th>
                        <th scope="col">Prix</th>
                        <th scope="col" colspan="3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($menus as $menu) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo htmlspecialchars($menu['id_menu'], ENT_QUOTES, 'UTF-8'); ?></th>
                            <td><img class="img-bo" src="<?php echo "../../".htmlspecialchars($menu['image_menu'], ENT_QUOTES, 'UTF-8'); ?>" alt=""></td>
                            <td><?php echo htmlspecialchars($menu['nom_menu'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo htmlspecialchars($menu['prix_menu'], ENT_QUOTES, 'UTF-8'); ?> €</td>
                            <td><a href="index.php?page=8&menu=voir&idMenu=<?php echo htmlspecialchars($menu['id_menu'], ENT_QUOTES, 'UTF-8'); ?>" class="text-black text-decoration-none"><i class="fa-solid fa-eye"></i></a></td>
                            <td><a href="index.php?page=8&menu=modif&idMenu=<?php echo htmlspecialchars($menu['id_menu'], ENT_QUOTES, 'UTF-8'); ?>" class="text-black text-decoration-none">Edit</a></td>
                            <td><a href="../controller/traitement_delete_menu.php?idMenu=<?php echo htmlspecialchars($menu['id_menu'], ENT_QUOTES, 'UTF-8'); ?>"><i class="fa-solid fa-trash-can text-black"></i></a></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        <?php } ?>
    </section>
</main>