<?php session_start(); ?>
<?php include "../../modele/variables/variables.php" ?>
<!DOCTYPE html>
<html lang="fr">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <link rel="stylesheet" href="../../css/Equipement/table.css">
   <link rel="stylesheet" href="../../css/Action/bouton.css">
   <link rel="stylesheet" href="../../css/style.css">
   <title>Liste des Equipements</title>
</head>

<body>
   <?php include '../header.php'; ?>
   <?php

   echo "<div class='container mt-5 ms-0'>\n";
   echo "<div class='table-responsive'>\n";
   echo "<table class='table'>\n";
   echo "<thead>";
   echo "<tr>";
   echo "<th>Salle</th>";
   echo "<th>Prise</th>";
   echo "<th>Type equipement</th>";
   echo "<th>Nom Equipement</th>";
   echo "<th>Adresse MAC</th>";
   echo "<th>Adresse IP</th>";
   echo "<th>Masque</th>";
   echo "<th>Action</th>";
   echo "</tr>\n";
   echo "</thead>\n";

   echo "<tbody>\n";

   try {
      $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $stmt = $conn->prepare("SELECT equ_id, equ_nom, equ_adresseMAC, equ_adresseIP,equ_masque, typ_nom, pri_reference,sal_numero FROM equipement 
 INNER JOIN equipement_Type ON (equ_typId = typ_id)  
 INNER JOIN prise ON (equ_priId = pri_id)
 INNER JOIN salle ON (equ_salId = sal_id) ");

      $stmt->execute();
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
         echo "<tr>";
         echo "<td>"  . $row['sal_numero'] . "</td>\n";
         echo "<td>"  . $row['pri_reference'] . "</td>\n";
         echo "<td>"  . $row['typ_nom'] . "</td>\n";
         echo "<td>"  . $row['equ_nom'] . "</td>\n";
         echo "<td>"  . $row['equ_adresseMAC'] . "</td>\n";
         echo "<td>" . $row['equ_adresseIP'] . "</td>\n";
         echo "<td>" . $row['equ_masque'] . "</td>\n";
         echo "<td>";
         echo "<a href='/Gestion_equipements/modele/equipement/Modifier/modifierEquipement.php?id=" . $row['equ_id'] . "' class='btn btn-info btn-sm btn-custom'>Modifier</a>";
         echo "<a href='/Gestion_equipements/modele/equipement/Supprimer/SupprimerEquipementBD.php?id=" . $row['equ_id'] . "'class='btn btn-danger btn-sm btn-custom'>Supprimer</a>";
         echo "</td>";
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

</body>
</html>