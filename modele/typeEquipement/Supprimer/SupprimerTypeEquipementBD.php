<?php
session_start();
include '../../variables/variables.php';

if (!isset($_SESSION['login'])) {
    header("location: ../../index.php");
    exit();
}

$message = "";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("DELETE FROM equipement_Type WHERE typ_id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        header("location: /Gestion_equipements/view/vues_type_equipement/affichertypeEquipement.php");
    } catch (PDOException $e) {
        $message = "Echec de la suppression : " . $e->getMessage();
    }
}

echo "<p>" . $message . "</p>\n";
?>