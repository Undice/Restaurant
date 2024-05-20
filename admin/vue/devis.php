<?php
$devis = recupDevis($pdo);
?>

<main class="devis">
    <section>
        <h1 class="py-5 text-center">Devis</h1>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom utilisateur</th>
                    <th scope="col">Nombre de personnes</th>
                    <th scope="col">Date de l'évènement</th>
                    <th scope="col">Statut</th>
                    <th scope="col" colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($devis as $devi) {
                ?>
                    <tr>
                        <th scope="row"><?php echo htmlspecialchars($devi['id_devis'], ENT_QUOTES, 'UTF-8'); ?></th>
                        <td><?php echo htmlspecialchars($devi['nom_user'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($devi['nb_personnes'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($devi['date_evenement'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($devi['nom_statut'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td>
                            <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-eye"></i></button> -->
                            <a href="index.php?page=8&devi=voir&idDevi=<?php echo htmlspecialchars($devi['id_devis'], ENT_QUOTES, 'UTF-8'); ?>" class="text-black text-decoration-none"><i class="fa-solid fa-eye"></i></a>
                        </td>
                        <td><a href="../controller/traitement_delete_devi.php?idDevi=<?php echo htmlspecialchars($devi['id_devis'], ENT_QUOTES, 'UTF-8'); ?>"><i class="fa-solid fa-trash-can text-black"></i></a></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

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