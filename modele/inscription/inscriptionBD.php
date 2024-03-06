<?php
session_start();
include '../variables/variables.php';

if (isset($_POST['email']) && (isset($_POST['password']))) {
    $login = $_POST['email'];
    $pwd = password_hash($_POST['password'], PASSWORD_DEFAULT);

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("INSERT INTO utilisateur (uti_login, uti_pwd)
        VALUES (:uti_login, :uti_pwd)");
        $stmt->bindParam(':uti_login', $login);
        $stmt->bindParam(':uti_pwd', $pwd);
        $stmt->execute();

        $message = "Insertion(s) effectée(s) : " . $stmt->rowCount();
        $_SESSION['login'] = $login;
        header("location:Gestion-équipements/index.php");
    } catch (PDOException $e) {
        $message = "Echec de l'insertion :" . $e->getMessage();
    }
} else {
    $message = "Toutes les données doivent être renseignées";
}
?>