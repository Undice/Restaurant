<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../public/assets/css/style.css">
    <title>Restaurant</title>
    <link rel="icon" type="image/png" href="assets/images/logo.png" sizes="32x32">
</head>

<body>
    <?php
    session_start();
    include "../vue/header.php";

    if (isset($_GET['page'])) {
        if ($_GET['page'] == 1) {
            include "../vue/carte.php";
        }
        if ($_GET['page'] == 2) {
            include "../vue/devis.php";
        }
        if ($_GET['page'] == 3) {
            include "../vue/contact.php";
        }
        if ($_GET['page'] == 4) {
            if (isset($_SESSION['idUser'])) {
                include "../vue/profil.php";
            } else {
                include "../vue/connexion.php";
            }
        }
        if ($_GET['page'] == 5) {
            include "../vue/inscription.php";
        }
        if ($_GET['page'] == 6) {
            include "../vue/mdpOublie1.php";
        }
        if ($_GET['page'] == 7) {
            include "../vue/mdpOublie2.php";
        }
    } else {
        include "../vue/accueil.php";
    }

    include "../vue/footer.php";
    ?>


    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/f718564d15.js" crossorigin="anonymous"></script>
    <script src="assets/js/script.js"> </script>
</body>

</html>