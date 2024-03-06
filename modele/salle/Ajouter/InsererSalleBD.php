<?php session_start();
include '../../variables/variables.php';

if (!isset($_SESSION['login'])) {
   header("location: ../../index.php");
   exit();
}

if (isset($_POST['numSalle']) && !empty($_POST['numSalle'])) {
   $num = $_POST['numSalle'];

   try {
      $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $stmt = $conn->prepare("INSERT INTO salle (sal_numero)
      VALUES (:sal_numero)");
      $stmt->bindParam(':sal_numero', $num);
      $stmt->execute();

      header("location: /Gestion_equipements/view/vues_salle/afficherSalle.php");
   } catch (PDOException $e) {
      $message = "Echec de l'insertion :" . $e->getMessage();
   }
   $conn = null;
} else {
   $message = "Toutes les données doivent être renseignées";
}

echo "<p>" . $message . "</p>\n";
?>