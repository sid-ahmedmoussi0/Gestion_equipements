<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" href="../../../css/select.css">
  <link rel="stylesheet" href="../../../css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Modifier un Equipement</title>
</head>

<body>
<?php include '../../../view/header.php'; ?>
  <?php $id = $_GET['id']; ?>
  <?php
  if (!isset($_SESSION['login'])) {
    header("location:../../index.php");
    exit();
  }
  ?>

  <div class="container space-top text-white">
    <form class="form-horizontal" method="post" action="modifierEquipementBD.php">
      <input type="hidden" name="id" value="<?= $id ?>">

      <?php
      echo "<select name='new_numSalle' id='new_numSalle' class='form-select' >\n";
      echo "<option selected disabled>Choisir une salle</option>\n";

      try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT sal_id, sal_numero FROM  salle");
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

          echo "<option value='" . $row['sal_id'] . "'>" . $row['sal_numero'] . "</option>\n";
        }
      } catch (PDOException $e) {
        echo "<p>Echec de l'affichage :" . $e->getMessage() . "</p>\n";
      }
      $conn = null;
      echo "</select>\n";
      ?>
      <br />
      <?php
      echo "<select name='new_identifPrise' id='new_identifPrise' class='form-select' >\n";
      echo "<option selected disabled>Choisir une prise</option>\n";

      try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT  pri_id, pri_reference FROM  prise");
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

          echo "<option value='" . $row['pri_id'] . "'>" . $row['pri_reference'] . "</option>\n";
        }
      } catch (PDOException $e) {
      }
      $conn = null;
      echo "</select>\n";
      ?>
      <br />
      <?php

      echo "<select name='new_typEquipement' id='new_typEquipement' class='form-select' >\n";
      echo "<option selected disabled>Choisir un type d'équipement</option>\n";

      try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT  typ_id, typ_nom FROM  equipement_Type");
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

          echo "<option value='" . $row['typ_id'] . "'>" . $row['typ_nom'] . "</option>\n";
        }
      } catch (PDOException $e) {
      }
      $conn = null;
      echo "</select>\n";
      ?>
      <hr />
      <div class="row">
        
        <div class="col-12 col-md-6 mb-3">
          <label for="new_nameEquip">Nom de l'équipement</label>
          <input type="text" class="form-control" id="new_nameEquip" name="new_nameEquip">
        </div>

        <div class="col-12 col-md-6 mb-3">
          <label for="new_adresseIP">Adresse IP</label>
          <input class="form-control" id="new_adresseIP" name="new_adresseIP" type="text" placeholder="0.0.0.0" pattern="^(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$">
        </div>

        <div class="col-12 col-md-6 mb-3">
          <label for="new_masque">Masque</label>

          <input class="form-control" id="new_masque" name="new_masque" type="text" placeholder="0.0.0.0" pattern="^(25[0–5]|2[0–4][0–9]|[01]?[0–9][0–9]?).(25[0–5]|2[0–4][0–9]|[01]?[0–9][0–9]?).(25[0–5]|2[0–4][0–9]|[01]?[0–9][0–9]?).(25[0–5]|2[0–4][0–9]|[01]?[0–9][0–9]?)$">
        </div>

        <div class="d-grid gap-2">
          <button class="btn btn-primary ml-3" type="submit">Modifier un équipement</button>
        </div>

      </div>
    </form>

  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>