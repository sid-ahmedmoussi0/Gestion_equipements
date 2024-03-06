<?php session_start();
include '../../variables/variables.php';

if (!isset($_SESSION['login'])) {
    header("location: ../../index.php");
    exit();
}

if (isset($_POST['id']) && isset($_POST['new_typEquipement']) && !empty($_POST['new_typEquipement'])) {

    $id_typ_equip = $_POST['id'];
    $newtypequip = $_POST['new_typEquipement'];

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("UPDATE equipement_Type SET typ_nom = :new_typEquipement WHERE typ_id = :id");
        $stmt->bindParam(':id', $id_typ_equip, PDO::PARAM_INT);
        $stmt->bindParam(':new_typEquipement', $newtypequip);
        $stmt->execute();

        header("location: /Gestion_equipements/view/vues_type_equipement/affichertypeEquipement.php");
    } catch (PDOException $e) {
        $message = "Echec de la modification :" . $e->getMessage();
    }
    $conn = null;
} else {

    $message = "Toutes les données doivent être renseignées";
}

echo "<p>" . $message . "</p>\n";
?>