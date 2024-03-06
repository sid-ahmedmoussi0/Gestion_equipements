<?php session_start(); ?>
<?php include "../../modele/variables/variables.php" ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/Action/bouton.css">
    <link rel="stylesheet" href="../../css/TypeEquipement/table.css">
    <link rel="stylesheet" href="../../css/style.css">
    <title>Liste des différents types d'équipements</title>
</head>

<body>
    <?php include '../header.php'; ?>

    <?php

    echo "<div class='container mt-5'>\n";
    echo "<table class='table'>\n";
    echo "<thead>";
    echo "<tr>";
    echo "<th>Type de l'équipement</th>";
    echo "<th>Action</th>";
    echo "</tr>\n";
    echo "</thead>";

    echo "<tbody>";

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT typ_id, typ_nom FROM equipement_Type");
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr><td>" . $row['typ_nom'] . "</td>";
            echo "<td><a href='/Gestion_equipements/modele/typeEquipement/Modifier/ModifierTypeEquipement.php?id=" . $row['typ_id'] . "' class='btn btn-info btn-sm btn-custom'>Modifier</a>
            <a href='/Gestion_equipements/modele/typeEquipement/Supprimer/SupprimerTypeEquipementBD.php?id=" . $row['typ_id'] . "'  class='btn btn-danger btn-sm btn-custom'>Supprimer</a></td>";
            echo "</tr>";
        }
    } catch (PDOException $e) {
        echo "<p>Echec de l'affichage :" . $e->getMessage() . "</p>\n";
    }
    $conn = null;
    echo "</tbody>\n</table>\n</div>\n</div>\n";
    ?>

    <?php include '../footer.php'; ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</body>
</html>