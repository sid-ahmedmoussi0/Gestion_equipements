<?php
session_start();
include '../../variables/variables.php';

if (!isset($_SESSION['login'])) {
    header("location: ../../index.php");
    exit();
} else {

    if (isset($_POST['id']) && isset($_POST['new_identifPrise']) && !empty($_POST['new_identifPrise'])) {
        $id_prise = $_POST['id'];
        $newidf = $_POST['new_identifPrise'];

        try {
            $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->prepare("UPDATE prise SET pri_reference = :new_identifPrise WHERE pri_id = :id");
            $stmt->bindParam(':id', $id_prise, PDO::PARAM_INT);
            $stmt->bindParam(':new_identifPrise', $newidf);
            $stmt->execute();

            $message = "Modification effectuée avec succès. " . $stmt->rowCount() . " ligne(s) modifiée(s).";
            header("location: /Gestion_equipements/view/vues_prise/afficherPrise.php");
        } catch (PDOException $e) {
            $message = "Echec de la modification : " . $e->getMessage();
        }
        $conn = null;
    } else {
        $message = "Toutes les données doivent être renseignées";
    }
}

echo "<p>" . $message . "</p>\n";
echo "</div>\n";
?>