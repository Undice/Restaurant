<?php
$idUser = $_SESSION['idUser'];
$userInfo = recupUserInfo($pdo, $idUser);
date_default_timezone_set('Europe/Paris');
?>

<main class="profil">
  <section class="w-50 mx-auto color-snowy p-5">
    <div class="py-5 text-center">
      <h2 class="color-snowy">Mes informations personnelles</h2>
    </div>
    <form class="text-center" method="get" action="">

      <div class="moitie-grid mb-4">
        <div class="me-4">
          <label for="prenom" class="form-label color-sand">Prenom</label>
          <input type="text" class="form-control form-control-lg" id="prenom" value="<?php echo $userInfo['prenom']; ?>">
        </div>

        <div class="ms-4">
          <label for="nom" class="form-label color-sand">Nom</label>
          <input type="text" class="form-control form-control-lg" id="nom" value="<?php echo $userInfo['nom_user']; ?>">
        </div>
      </div>

      <div class="moitie-grid mb-4">
        <div class="me-4">
          <label for="tel" class="form-label color-sand">Numéro de téléphone</label>
          <input type="tel" id="tel" name="tel" class="form-control form-control-lg" value="<?php echo $userInfo['telephone']; ?>">
        </div>

        <div class="ms-4">
          <label for="anniversaire" class="form-label color-sand">Date de naissance</label>
          <input type="date" id="anniversaire" name="anniversaire" class="form-control form-control-lg" value="<?php echo $userInfo['anniversaire']; ?>" max="<?php echo date('Y-m-d'); ?>">
        </div>
      </div>

      <label for="email" class="form-label color-sand">Email</label>
      <input type="email" class="form-control form-control-lg mb-4" id="email" value="<?php echo $userInfo['email']; ?>">

      <label for="address" class="form-label color-sand">Adresse</label>
      <input type="text" class="form-control form-control-lg mb-4" id="address" value="<?php echo $userInfo['adresse']; ?>">

      <div class="moitie-grid mb-4">
        <div class="me-4">
          <label for="departement" class="form-label color-sand">Département</label>
          <select class="form-select form-select-lg" id="departement">
            <option value="<?php echo $userInfo['id_departement']; ?>"><?php echo $userInfo['numero']; ?> <?php echo $userInfo['nom_departement']; ?></option>
            <option></option>
          </select>
        </div>

        <div class="ms-4">
          <label for="ville" class="form-label color-sand">Ville</label>
          <select class="form-select form-select-lg" id="ville">
            <option value="<?php echo $userInfo['id_ville']; ?>"><?php echo $userInfo['nom_ville']; ?> (<?php echo $userInfo['code_postal']; ?>)</option>
            <option></option>
          </select>
        </div>
      </div>
      <a id="mdpChange" class="color-sand">Changer mon mot de passe</a><br>
      <a class="color-sand" href="../controller/traitement_deconnexion.php">Déconnexion</a>
    </form>
  </section>

  <section id="mdpHide" class="w-50 p-5 mx-auto d-none color-snowy">
    <form class="text-center">

      <label for="email" class="form-label color-sand">Ancien mot de passe</label>
      <input type="password" class="form-control form-control-lg mb-4" id="email">

      <label for="email" class="form-label color-sand">Nouveau mot de passe</label>
      <input type="password" class="form-control form-control-lg mb-4" id="email">

      <label for="email" class="form-label color-sand">Confirmer mot de passe</label>
      <input type="password" class="form-control form-control-lg" id="email">

    </form>
  </section>
</main>