<?php session_start();
include '../../variables/variables.php';


if (!isset($_SESSION['login'])) {
   header("location: ../../index.php");
}

if (isset($_POST['typEquipement']) && !empty($_POST['typEquipement'])) {
   $typequip = $_POST['typEquipement'];

   try {
      $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $stmt = $conn->prepare("INSERT INTO equipement_Type (typ_nom)
   VALUES (:typEquipement)");
      $stmt->bindParam(':typEquipement', $typequip);
      $stmt->execute();

      header("location: /Gestion_equipements/view/vues_type_equipement/affichertypeEquipement.php");
   } catch (PDOException $e) {
      $message = "Echec de l'insertion :" . $e->getMessage();
   }
   $conn = null;
} else {
   $message = "Toutes les données doivent être renseignées";
}

echo "<p>" . $message . "</p>\n";
?>