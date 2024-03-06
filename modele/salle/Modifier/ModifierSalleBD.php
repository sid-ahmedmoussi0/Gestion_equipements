<?php session_start();
include '../../variables/variables.php';

if (!isset($_SESSION['login'])) {
  header("location: ../../index.php");
  exit();
}

if (isset($_POST['id']) && isset($_POST['new_numSalle']) && !empty($_POST['new_numSalle'])) {

  $id_salle = $_POST['id'];
  $newnum = $_POST['new_numSalle'];

  try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("UPDATE salle SET sal_numero = :new_numSalle WHERE sal_id = :id");
    $stmt->bindParam(':id',   $id_salle, PDO::PARAM_INT);
    $stmt->bindParam(':new_numSalle', $newnum);
    $stmt->execute();

    header("location: /Gestion_equipements/view/vues_salle/afficherSalle.php");
  } catch (PDOException $e) {
    $message = "Echec de la modification :" . $e->getMessage();
  }
  $conn = null;
} else {

  $message = "Toutes les données doivent être renseignées";
}

echo "<p>" . $message . "</p>\n";
?>