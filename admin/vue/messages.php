<?php
$messages = recupMessages($pdo);
?>

<main class="messages">
    <section>
        <h1 class="py-5 text-center">Messages</h1>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Date</th>
                    <th scope="col">Utilisateur</th>
                    <th scope="col">Sujet</th>
                    <th scope="col">Email</th>
                    <th scope="col" colspan="3">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($messages as $message) {
                ?>
                    <tr>
                        <th scope="row"><?php echo htmlspecialchars($message['id_message'], ENT_QUOTES, 'UTF-8'); ?></th>
                        <td><?php echo htmlspecialchars($message['date_message'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($message['nom'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($message['sujet'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($message['email'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td>
                            <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa-solid fa-eye"></i></button> -->
                            <a href="index.php?page=8&message=voir&idMessage=<?php echo htmlspecialchars($message['id_message'], ENT_QUOTES, 'UTF-8'); ?>" class="text-black text-decoration-none"><i class="fa-solid fa-eye"></i></a>
                        </td>
                        <td><a href="../controller/traitement_delete_message.php?idMessage=<?php echo htmlspecialchars($message['id_message'], ENT_QUOTES, 'UTF-8'); ?>"><i class="fa-solid fa-trash-can text-black"></i></a></td>
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