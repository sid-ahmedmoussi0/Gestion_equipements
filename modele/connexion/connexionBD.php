<?php
session_start();

include '../variables/variables.php';

if (isset($_POST['email']) && isset($_POST['password'])) {
    $login = $_POST['email'];
    $pass_hache = password_hash($_POST['password'], PASSWORD_DEFAULT);
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT uti_pwd FROM utilisateur WHERE uti_login = :email");
        $stmt->bindParam(':email', $login);
        $stmt->execute();

        $resultat = $stmt->fetch();
        if (!$resultat) {
            $message = "Mauvais identifiant !";
        } else {
            $isPasswordCorrect = password_verify($_POST['password'], $resultat['uti_pwd']);
            if (!$isPasswordCorrect) {
                $message = "Mauvais mot de passe !";
            } else {
                $_SESSION['login'] = $login;
                header("location:../../index.php");
            }
        }
        $conn = null;
    } catch (PDOException $e) {
        $message = "Echec de l'affichage :" . $e->getMessage();
    }
    echo "<p>" . $message . "</p>\n";
}
?>