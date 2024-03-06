<?php
session_start();
include '../../variables/variables.php';

if (!isset($_SESSION['login'])) {
    header("location: ../../index.php");
    exit();
} else {

    if (
        isset($_POST['id']) && isset($_POST['new_nameEquip']) && isset($_POST['new_adresseIP']) &&
        isset($_POST['new_masque']) && isset($_POST['new_typEquipement']) &&
        isset($_POST['new_identifPrise']) && isset($_POST['new_numSalle'])
    ) {

        $equ_id = $_POST['id'];
        $new_equ_nom = $_POST['new_nameEquip'];
        $new_adresseIP = $_POST['new_adresseIP'];
        $new_masque = $_POST['new_masque'];
        $new_numSalle = $_POST['new_numSalle'];
        $new_identifPrise = $_POST['new_identifPrise'];
        $new_typEquipement = $_POST['new_typEquipement'];


        try {
            $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->prepare("UPDATE equipement SET equ_nom = :new_nameEquip, equ_priId = :new_identifPrise, equ_salId=:new_numSalle, equ_typId = :new_typEquipement,
     equ_adresseIP = :new_adresseIP, equ_masque = :new_masque WHERE equ_id = :id");
            $stmt->bindParam(':id', $equ_id, PDO::PARAM_INT);
            $stmt->bindParam(':new_nameEquip', $new_equ_nom);
            $stmt->bindParam(':new_identifPrise', $new_identifPrise);
            $stmt->bindParam(':new_numSalle', $new_numSalle);
            $stmt->bindParam(':new_typEquipement', $new_typEquipement);
            $stmt->bindParam(':new_adresseIP', $new_adresseIP);
            $stmt->bindParam(':new_masque', $new_masque);
            $stmt->execute();

            header("location: /Gestion_equipements/view/vues_equipement/afficherEquipement.php");
        } catch (PDOException $e) {
            echo "<p>Echec de l'insertion :" . $e->getMessage() . "</p>\n";
        }
        $conn = null;
    } else {
        echo "<p>Toutes les données doivent être renseignées.</p>\n";
    }
}
?>