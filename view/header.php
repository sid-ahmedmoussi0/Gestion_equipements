<?php
$message = "";
$ajout_salle = "";
$ajout_prise = "";
$ajout_equipement = "";
$ajout_type_equipement = "";
$sep = "";
$inscrip = "";
if (isset($_SESSION['login'])) {
  // variables menu //

  $ajout_salle = "<a class='dropdown-item text-white' href='/Gestion_equipements/modele/salle/Ajouter/InsererSalle.php'>Ajouter une salle</a>";
  $ajout_prise = "<a class='dropdown-item text-white' href='/Gestion_equipements/modele/prise/Ajouter/insererPrise.php'>Ajouter une prise</a>";
  $ajout_equipement = "<a class='dropdown-item text-white' href='/Gestion_equipements/modele/equipement/Ajouter/insererEquipement.php'>Ajouter un équipement</a>";
  $ajout_type_equipement = "<a class='dropdown-item text-white' href='/Gestion_equipements/modele/typeEquipement/Ajouter/insererTypeEquipement.php'>Ajouter un type d'équipement</a>";
  $sep = "<hr class='dropdown-divider'>";
  $message = "<a class='nav-link active btn ms-3' aria-current='page' href='/Gestion_equipements/modele/deconnexion/deconnexion.php'>Déconnexion</a>";
} else {
  $message = "<a class='nav-link active btn  ms-3' aria-current='page' href='/Gestion_equipements/view/connexion/connexion.php'>Connexion</a>";
  $inscrip = "<a class='nav-link active btn  ms-3' aria-current='page' href='/Gestion_equipements/view/inscription/inscription.php'>Inscription</a>";
}
?>

<nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src='/Gestion_equipements/assets/img/logo.png' alt="Logo" height="40" class="d-inline-block align-text-top">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/Gestion_equipements/index.php">Accueil</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link active dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Salle
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><?php echo $ajout_salle; ?></li>
            <li><?php echo $sep; ?></li>
            <li><a class="dropdown-item text-white" href="/Gestion_equipements/view/vues_salle/afficherSalle.php">Afficher une salle</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Prise
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><?php echo $ajout_prise; ?></li>
            <li><?php echo $sep; ?></li>
            <li><a class="dropdown-item text-white" href="/Gestion_equipements/view/vues_prise/afficherPrise.php">Afficher une prise</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Équipement
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><?php echo $ajout_equipement; ?></li>
            <li><?php echo $sep; ?></li>
            <li><a class="dropdown-item text-white" href="/Gestion_equipements/view/vues_equipement/afficherEquipement.php">Afficher un équipement</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Type d'équipement
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><?php echo $ajout_type_equipement; ?></li>
            <li><?php echo $sep; ?></li>
            <li><a class="dropdown-item text-white" href="/Gestion_equipements/view/vues_type_equipement/affichertypeEquipement.php">Afficher un type d'équipement</a></li>
          </ul>
        </li>
        <li class="nav-item"><?php echo $message; ?></li>
        <li class="nav-item"><?php echo $inscrip; ?></li>
      </ul>
    </div>
  </div>
</nav>
