<?php session_start(); ?>

<!DOCTYPE html>
<html lang="fr">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width">
   <link rel="stylesheet" href="../../../css/style.css">
   <link rel="stylesheet" href="../../../css/style2.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <title>Modifier un type d'équipement</title>
</head>

<body>
   <?php include '../../../view/header.php'; ?>
   <?php
   $id = $_GET['id']; ?>
   <?php
   if (!isset($_SESSION['login'])) {
      header("location:../../index.php");
      exit();
   }
   ?>
   <div class="container space-top">
      <form class="form-horizontal" method="post" action="ModifierTypeEquipementBD.php">

         <div class="mb-3">
            <input type="hidden" name="id" value="<?= $id ?>">
            <label for="new_typEquipement" class="form-label custom-label">Nouveau Type Equipement</label>
            <input type="text" class="form-control" id="new_typEquipement" name="new_typEquipement" placeholder="Modifier un type d'équipement" required>
            <div class="form-text custom-form-text">Veuillez entrer un type d'équipement</div>
         </div>
         <button type="submit" class="btn btn-primary">Modifier le type d'équipement</button>
      </form>
   </div>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>