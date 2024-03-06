<?php session_start();
include '../../variables/variables.php';

if (!isset($_SESSION['login'])) {
  header("location: ../../index.php");
  exit();
}

if (isset($_POST['identifPrise']) && (isset($_POST['numSalle']))) {
  $identifPrise = $_POST['identifPrise'];
  $salId = $_POST['numSalle'];

  try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("INSERT INTO prise (pri_reference,pri_salID) VALUES (:identifPrise,:numSalle)");
    $stmt->bindParam(':identifPrise',  $identifPrise);
    $stmt->bindParam(':numSalle', $salId);
    $stmt->execute();

    header("location: /Gestion_equipements/view/vues_prise/afficherPrise.php");
  } catch (PDOException $e) {
    $message = "Echec de l'insertion :" . $e->getMessage();
  }

  $conn = null;
} else {
  $message = "Toutes les données doivent être renseignées";
}
echo "<p>" . $message . "</p>\n";
?>