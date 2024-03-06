<?php session_start();
include '../../variables/variables.php';

if (
  isset($_POST['nameEquip'], $_POST['adresseMAC'], $_POST['adresseIP'], $_POST['masque'], $_POST['typEquipement'], $_POST['identifPrise'], $_POST['numSalle']) &&
  !empty($_POST['nameEquip']) && !empty($_POST['adresseMAC']) && !empty($_POST['adresseIP']) && !empty($_POST['masque']) && !empty($_POST['typEquipement']) && !empty($_POST['identifPrise']) && !empty($_POST['numSalle'])
) {

  $nomEquip = $_POST['nameEquip'];
  $adresseMAC = $_POST['adresseMAC'];
  $adresseIP = $_POST['adresseIP'];
  $masque = $_POST['masque'];
  $typEquipement = $_POST['typEquipement'];
  $priId = $_POST['identifPrise'];
  $salId = $_POST['numSalle'];

  try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("INSERT INTO equipement (equ_nom,equ_adresseMAC,equ_adresseIP,equ_masque, equ_typId,equ_priId,equ_salId)
     VALUES (:nameEquip,:adresseMAC,:adresseIP,:masque,:typEquipement,:identifPrise,:numSalle)");
    $stmt->bindParam(':nameEquip', $nomEquip);
    $stmt->bindParam(':adresseMAC', $adresseMAC);
    $stmt->bindParam(':adresseIP', $adresseIP);
    $stmt->bindParam(':masque', $masque);
    $stmt->bindParam(':typEquipement', $typEquipement);
    $stmt->bindParam(':identifPrise', $priId);
    $stmt->bindParam(':numSalle', $salId);
    $stmt->execute();

    header("location: /Gestion_equipements/view/vues_equipement/afficherEquipement.php");
  } catch (PDOException $e) {
    $message = "Echec de l'insertion :" . $e->getMessage();
  }
  $conn = null;
} else {
  $message = "Toutes les données doivent être renseignées";
}
echo "<p>" . $message . "</p>\n";
?>