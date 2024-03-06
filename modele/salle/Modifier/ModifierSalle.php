<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width">
   <link rel="stylesheet" href="../../../css/style.css">
   <link rel="stylesheet" href="../../../css/style2.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <title>Modifier une Salle</title>
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
      <form class="form-horizontal" method="post" action="ModifierSalleBD.php">

         <div class="mb-3">
            <input type="hidden" name="id" value="<?= $id ?>">
            <label for="new_numSalle" class="form-label custom-label">Nouveau numéro de la salle</label>
            <input type="text" class="form-control" id="new_numSalle" name="new_numSalle" pattern="[A-Ca-c]-\d{3}" placeholder="A-103" required>
            <div class="form-text custom-form-text">Veuillez entrer le numéro d'une salle en commençant par A, B ou C, suivi d'un tiret et de trois chiffres.</div>
         </div>
         <button type="submit" class="btn btn-primary">Modifier la salle</button>
      </form>
   </div>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>