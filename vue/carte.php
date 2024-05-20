<?php
$menus = recupMenus($pdo);
?>

<main class="carte">
    <section class="presentation">
        <div class="img-blur d-flex flex-column justify-content-center align-items-center color-snowy text-center">
            <h1 class="pb-5 w-75 text-shadow">
                Bienvenue sur la page des plats <!-- (mettre plus tard une variable qui récupèrera le lien pour savoir sur quoi l'utilisateur à cliqué (menu, entrées, plats, etc...)) -->
            </h1>
            <p class="w-75 text-shadow">Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam voluptas distinctio aliquid ullam, dolores voluptates repellat nostrum atque aut dolor minus magni quod enim earum quidem eligendi ipsa nihil porro odio animi recusandae facilis saepe? Sed dolor fugit rerum laborum id tenetur repellendus? Sequi fugit aperiam, repellendus numquam hic laudantium.</p>
        </div>
    </section>

    <section class="menu pb-5">
        <h2 class="color-sand py-5 text-center">Les menus</h2>
        <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container">
                        <div class="bg-sand grid-retest">

                            <?php foreach ($menus as $menu) { ?>

                                <div class="menu2 img-card"></div>

                                <div class="p-5 text-center">
                                    <h3 class="fw-bolder fs-bulle position-relative"><?php echo htmlspecialchars($menu['nom_menu'], ENT_QUOTES, 'UTF-8'); ?></h3>
                                    <span class="bulle prix color-inky bg-snowy rounded-circle position-relative d-flex justify-content-center align-items-center prevent-select">
                                        <p><?php echo htmlspecialchars($menu['prix_menu'], ENT_QUOTES, 'UTF-8'); ?> €</p>
                                    </span>
                                    <h4 class="text-start text-decoration-underline">Entrées :</h4>
                                    <p>Nom entrée</p>
                                    <p>Ingrédients</p>
                                    <p class="color-snowy">ou</p>
                                    <p>Entree n°2 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                    <h4 class="text-start text-decoration-underline">Plats :</h4>
                                    <p>Plat n°1 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                    <p class="color-snowy">ou</p>
                                    <p>Plat n°2 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                    <h4 class="text-start text-decoration-underline">Désserts :</h4>
                                    <p>Déssert n°1 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                    <p class="color-snowy">ou</p>
                                    <p>Déssert n°2 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                </div>

                        </div>

                    <?php } ?>

                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container">
                        <div class="bg-sand grid-retest">
                            <div class="menu1 img-menu1 img-card"></div>

                            <div class="p-5 text-center">
                                <h3 class="fw-bolder fs-bulle position-relative">Menu sushi</h3>
                                <span class="bulle prix color-inky bg-snowy rounded-circle position-relative d-flex justify-content-center align-items-center prevent-select">
                                    <p>49,99€</p>
                                </span>
                                <h4 class="text-start text-decoration-underline">Entrées :</h4>
                                <p>Entree n°1 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                <p class="color-snowy">ou</p>
                                <p>Entree n°2 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                <h4 class="text-start text-decoration-underline">Plats :</h4>
                                <p>Plat n°1 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                <p class="color-snowy">ou</p>
                                <p>Plat n°2 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                <h4 class="text-start text-decoration-underline">Désserts :</h4>
                                <p>Déssert n°1 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                <p class="color-snowy">ou</p>
                                <p>Déssert n°2 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container">
                        <div class="bg-sand grid-retest">
                            <div class="menu3 img-menu3                                                                                                                                                                              img-card"></div>

                            <div class="p-5 text-center">
                                <h3 class="fw-bolder fs-bulle position-relative">Menu carnivor</h3>
                                <span class="bulle prix color-inky bg-snowy rounded-circle position-relative d-flex justify-content-center align-items-center prevent-select">
                                    <p>49,99€</p>
                                </span>
                                <h4 class="text-start text-decoration-underline">Entrées :</h4>
                                <p>Entree n°1 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                <p class="color-snowy">ou</p>
                                <p>Entree n°2 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                <h4 class="text-start text-decoration-underline">Plats :</h4>
                                <p>Plat n°1 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                <p class="color-snowy">ou</p>
                                <p>Plat n°2 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                <h4 class="text-start text-decoration-underline">Désserts :</h4>
                                <p>Déssert n°1 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                <p class="color-snowy">ou</p>
                                <p>Déssert n°2 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container">
                        <div class="bg-sand grid-retest">
                            <div class="menu6 img-menu3                                                                                                                                                                              img-card"></div>

                            <div class="p-5 text-center">
                                <h3 class="fw-bolder fs-bulle position-relative">Menu végétarien</h3>
                                <span class="bulle prix color-inky bg-snowy rounded-circle position-relative d-flex justify-content-center align-items-center prevent-select">
                                    <p>49,99€</p>
                                </span>
                                <h4 class="text-start text-decoration-underline">Entrées :</h4>
                                <p>Entree n°1 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                <p class="color-snowy">ou</p>
                                <p>Entree n°2 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                <h4 class="text-start text-decoration-underline">Plats :</h4>
                                <p>Plat n°1 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                <p class="color-snowy">ou</p>
                                <p>Plat n°2 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                <h4 class="text-start text-decoration-underline">Désserts :</h4>
                                <p>Déssert n°1 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                <p class="color-snowy">ou</p>
                                <p>Déssert n°2 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container">
                        <div class="bg-sand grid-retest">
                            <div class="menu4 img-card"></div>

                            <div class="p-5 text-center">
                                <h3 class="fw-bolder fs-bulle position-relative">Menu épicé</h3>
                                <span class="bulle prix color-inky bg-snowy rounded-circle position-relative d-flex justify-content-center align-items-center prevent-select">
                                    <p>49,99€</p>
                                </span>
                                <h4 class="text-start text-decoration-underline">Entrées :</h4>
                                <p>Entree n°1 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                <p class="color-snowy">ou</p>
                                <p>Entree n°2 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                <h4 class="text-start text-decoration-underline">Plats :</h4>
                                <p>Plat n°1 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                <p class="color-snowy">ou</p>
                                <p>Plat n°2 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                <h4 class="text-start text-decoration-underline">Désserts :</h4>
                                <p>Déssert n°1 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                <p class="color-snowy">ou</p>
                                <p>Déssert n°2 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container">
                        <div class="bg-sand grid-retest">
                            <div class="menu5 img-card"></div>

                            <div class="p-5 text-center">
                                <h3 class="fw-bolder fs-bulle position-relative">Menu enfant</h3>
                                <span class="bulle prix color-inky bg-snowy rounded-circle position-relative d-flex justify-content-center align-items-center prevent-select">
                                    <p>49,99€</p>
                                </span>
                                <h4 class="text-start text-decoration-underline">Entrées :</h4>
                                <p>Entree n°1 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                <p class="color-snowy">ou</p>
                                <p>Entree n°2 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                <h4 class="text-start text-decoration-underline">Plats :</h4>
                                <p>Plat n°1 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                <p class="color-snowy">ou</p>
                                <p>Plat n°2 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                <h4 class="text-start text-decoration-underline">Désserts :</h4>
                                <p>Déssert n°1 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                <p class="color-snowy">ou</p>
                                <p>Déssert n°2 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <section class="menu pb-5">
        <h2 class="color-sand py-5 text-center">Les entrées</h2>
        <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container">
                        <div class="bg-sand grid-retest">
                            <div class="retest img-card"></div>
                            <div class="p-5 text-center">
                                <div class="d-flex">
                                    <div class="flex-start">
                                        <p>Entree n°1 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                        <p>Entree n°1 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                    </div>
                                    <p class="flex-end"></p>
                                </div>
                                <p>Entree n°2 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                <p></p>
                                <p>Entree n°3 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                <p></p>
                                <p>Entree n°4 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                <p></p>
                                <p>Entree n°5 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                <p></p>
                                <p>Entree n°6 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                <p></p>
                                <p>Entree n°7 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                <p></p>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container">
                        <div class="bg-sand grid-retest">
                            <div class="retest img-card"></div>

                            <div class="p-5 text-center">
                                <p>Entree n°1 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                <p>Entree n°2 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                <p>Entree n°3 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                <p>Entree n°4 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                <p>Entree n°5 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                <p>Entree n°6 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                <p>Entree n°7 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container">

                        <div class="bg-sand grid-retest">
                            <div class="retest img-card"></div>

                            <div class="p-5 text-center">
                                <p>Entree n°1 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                <p>Entree n°2 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                <p>Entree n°3 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                <p>Entree n°4 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                <p>Entree n°5 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                <p>Entree n°6 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                <p>Entree n°7 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <section class="menu pb-5">
        <h2 class="color-sand py-5 text-center">Les plats</h2>
        <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container">
                        <div class="bg-sand grid-retest">
                            <div class="retest img-card"></div>

                            <div class=" p-5 text-center ">
                                <p>Entree n°1 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                <p>Entree n°2 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                <p>Entree n°3 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                <p>Entree n°4 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                <p>Entree n°5 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                <p>Entree n°6 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                <p>Entree n°7 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container">
                        <div class="bg-sand grid-retest">
                            <div class="retest img-card"></div>

                            <div class=" p-5 text-center ">
                                <p>Entree n°1 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                <p>Entree n°2 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                <p>Entree n°3 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                <p>Entree n°4 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                <p>Entree n°5 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                <p>Entree n°6 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                <p>Entree n°7 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container">

                        <div class="bg-sand grid-retest">
                            <div class="retest img-card"></div>

                            <div class=" p-5 text-center ">
                                <p>Entree n°1 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                <p>Entree n°2 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                <p>Entree n°3 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                <p>Entree n°4 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                <p>Entree n°5 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                <p>Entree n°6 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                <p>Entree n°7 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <section class="menus pb-5">
        <h2 class="color-sand py-5 text-center">Les désserts</h2>
        <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container">
                        <div class="bg-sand grid-retest">
                            <div class="retest img-card"></div>

                            <div class=" p-5 text-center ">
                                <p>Entree n°1 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                <p>Entree n°2 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                <p>Entree n°3 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                <p>Entree n°4 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                <p>Entree n°5 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                <p>Entree n°6 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                <p>Entree n°7 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container">
                        <div class="bg-sand grid-retest">
                            <div class="retest img-card"></div>

                            <div class=" p-5 text-center ">
                                <p>Entree n°1 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                <p>Entree n°2 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                <p>Entree n°3 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                <p>Entree n°4 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                <p>Entree n°5 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                <p>Entree n°6 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                <p>Entree n°7 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container">

                        <div class="bg-sand grid-retest">
                            <div class="retest img-card"></div>

                            <div class=" p-5 text-center ">
                                <p>Entree n°1 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                <p>Entree n°2 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                <p>Entree n°3 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                <p>Entree n°4 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                <p>Entree n°5 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                <p>Entree n°6 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                                <p>Entree n°7 hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>



</main>