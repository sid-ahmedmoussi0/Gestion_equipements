<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" href="../../../css/style.css">
  <link rel="stylesheet" href="../../..css/select.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Modifier une prise</title>
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

  <div class="container space-top">
    <form class="form-horizontal" method="post" action="ModifierPriseBD.php">
      <div class="mb-3">
        <label for="new_identifPrise"><b>PRISE</b></label>
        <input type="hidden" name="id" value="<?= $id ?>">
        <input class="form-control" id="new_identifPrise" name="new_identifPrise" type="text" placeholder="A_X_YY" pattern="[0-9]{1}_[0-9]{1}_[0-9]{1,2}" required>
        <div class="form-text custom-form-text">Veuillez entrer le numéro d'identification de la prise dans le format A_X_YY, où A représente le premier chiffre, X  le deuxième chiffre et YY représentent deux nombre allant un à deux chiffres, séparés par des tirets soulignés</div>
      </div>
      <button class="btn btn-primary ml-3" type="submit">Valider</button>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>