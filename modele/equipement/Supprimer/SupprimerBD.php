<?php
session_start();
include '../../variables/variables.php';

if (!isset($_SESSION['login'])) {
    header("location: ../../index.php");
    exit();
}
$message = "";

if (isset($_POST['id'])) {
    $equ_id = $_POST['id'];

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("DELETE FROM equipement WHERE equ_id = :id");
        $stmt->bindParam(':id', $equ_id, PDO::PARAM_INT);
        $stmt->execute();
        header("location: /Gestion_equipements/view/vues_equipement/afficherEquipement.php");
    } catch (PDOException $e) {
        echo "<p>Echec de la suppression : " . $e->getMessage() . "</p>\n";
    }
    echo "<p>" . $message . "</p>\n";
}
?>