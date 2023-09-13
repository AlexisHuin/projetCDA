<?php
require_once "../root/pdo.php";

include '../includes/header.php';
include '../includes/banner.php';


$titreArticle = "Afficher les producteurs";

// Création du formulaire pour afficher les types de produits

$contenuArticle =
    ' <form action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '" method="GET" >
<input class="search_button" type="submit" name="afficher" value="Afficher" >
</form> ';


// Vérification si le formulaire a été soumis
if (isset($_GET['afficher'])) {

    // Requête SQL pour sélectionner tous les types de produits
    $query = "SELECT * FROM producteur";
    // Exécution de la requête
    $stmt = $db->query($query);

    if ($stmt) {
        // Si la requête s'exécute avec succès, afficher la liste des types de produits
        echo '<ul class="result">';
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<div class="result_item"> <li> Producteur : </li> <br>';
            echo '<li> Raison sociale : ' . $row['RSOPRO'] . "</li>";
            echo "<li> Nom du producteur : " . $row['NPRRES'] . "</li>";
            echo "<li> Téléphone : " . $row['TPRODU'] . "</li>";
            echo "<li> Email: " . $row['MPRODU'] . "</li>";
            echo "<li> Adresse postale : " . $row['APOPRO'] . "</li>";
            echo "<li> Coordonées GPS : " . $row['CGPPRO'] . "</li> </div> <br>";
        }
        echo "</ul>";
    } else {
        echo "Erreur de la requête : " . $db->errorInfo()[2];
    }
}

include '../includes/section.php';
include '../includes/footer.php';
