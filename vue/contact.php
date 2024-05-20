<main class="contact">
    <section class="color-sand">
        <h1 class="text-center pb-5">Nous contacter</h1>
        <div class="px-5 d-flex flex-row align-items-center justify-content-center">
            <iframe class="pe-5 prevent-select" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d21071.291694069456!2d6.173438899999999!3d48.6880574!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4794986e17a692cd%3A0x4ed671b10d82498d!2sNancy!5e0!3m2!1sfr!2sfr!4v1697538045527!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <div class="border-start color-sand p-5">
                <p>+33 1 77 38 59 13</p>
                <p>nathalie.valentin@aubert.com</p>
                <p>8 Pl. Stanislas, 54000 Nancy</p>
                <p>France</p>
            </div>
        </div>
    </section>
    <section class="text-center color-sand py-5">
        <h2 class="fw-bold">Horaires d'ouverture</h2>
        <p class="pt-3">Lundi - Vendredi</p>
        <p>9h - 12h30</p>
        <p>18h30 - 21h</p>
        <p class="pt-3">Samedi - Dimanche</p>
        <p class="m-0">18h - 21h</p>
    </section>
</main>


<main class="contact">
    <section class="w-75 mx-auto color-sand">
        <h1 class="text-center color-snowy">Formulaire de contact</h1>
        <form class="w-75 mx-auto" method="get" action="../controller/traitement_contact.php">

            <p class="text-success text-center">
                <?php
                if (isset($_GET['message'])) {
                    if ($_GET['message'] == 'valide') {
                        echo "Le message a bien été envoyé";
                    }
                }
                ?>
            </p>

            <div class="form-outline mb-4">
                <label class="form-label" for="nom">Nom & prénom</label>
                <input type="text" id="nom" name="nom" class="form-control form-control-lg" />
            </div>

            <div class="form-outline mb-4">
                <label class="form-label" for="sujet">Sujet</label>
                <input type="text" id="sujet" name="sujet" class="form-control form-control-lg" />
            </div>

            <div class="form-outline mb-4">
                <label class="form-label" for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control form-control-lg" />
            </div>

            <div class="form-outline mb-4">
                <label class="form-label" for="message">Message</label>
                <textarea id="message" name="message" class="form-control form-control-lg" placeholder="Votre message"></textarea>
            </div>

            <input class="my-4 p-3 bg-sand color-snowy border-0" type="submit" value="Envoyer" name="envoyer">
        </form>
    </section>
</main>