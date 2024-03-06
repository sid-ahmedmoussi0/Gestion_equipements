<?php session_start(); ?>
<?php include "../../modele/variables/variables.php" ?>
<!DOCTYPE html>
<html lang="fr">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <link rel="stylesheet" href="../../css/Action/bouton.css">
   <link rel="stylesheet" href="../../css/Prise/table.css">
   <link rel="stylesheet" href="../../css/style.css">
   <title>Liste des Prises</title>
</head>

<body>
   <?php include '../header.php'; ?>
   <?php

   echo "<div class='container mt-5'>\n";
   echo "<table class='table'>\n";
   echo "<thead>";
   echo "<tr>";
   echo "<th>Salle</th>";
   echo "<th>Prise</th>";
   echo "<th>Actions</th>";
   echo "</tr>\n";
   echo "</thead>\n";

   echo "<tbody>\n";

   try {
      $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $stmt = $conn->prepare("SELECT pri_id, pri_reference, sal_numero  FROM prise INNER JOIN salle ON  (pri_salID =  sal_id)");
      $stmt->execute();
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
         echo "<tr>";
         echo "<td>" . $row['sal_numero'] . "</td><td>" . $row['pri_reference'] . "</td>";
         echo "<td>
         <a href='/Gestion_equipements/modele/prise/Modifier/ModifierPrise.php?id=" . $row['pri_id'] . "' class='btn btn-info btn-sm btn-custom'>Modifier</a>
         <a href='/Gestion_equipements/modele/prise/Supprimer/SupprimerPriseBD.php?id=" . $row['pri_id'] . "'  class='btn btn-danger btn-sm btn-custom'>Supprimer</a></td>";
         echo "</tr>";
      }
   } catch (PDOException $e) {
      echo "<p>Echec de l'affichage :" . $e->getMessage() . "</p>\n";
   }
   $conn = null;
   echo "</tbody>\n</table>\n</div>\n";
   ?>

   <?php include '../footer.php'; ?>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
   <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</body>
</html>