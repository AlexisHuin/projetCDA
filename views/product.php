<script src="../app.js"></script>
<?php
require_once "../root/pdo.php";

include '../includes/header.php';
include '../includes/banner.php';


$titreArticle = "Afficher les produits";

// Création du formulaire pour afficher les types de produits

$contenuArticle = 
' <form action="'. htmlspecialchars($_SERVER["PHP_SELF"]) .'" method="GET" >
<input class="search_button" type="submit" name="afficher" value="Afficher" >
</form> ';


// Vérification si le formulaire a été soumis
if (isset($_GET['afficher'])) {

    // Requête SQL pour sélectionner tous les types de produits
    $query = "SELECT * FROM produi";
      // Exécution de la requête
    $stmt = $db->query($query);

    if ($stmt) {
         // Si la requête s'exécute avec succès, afficher la liste des types de produits
        echo '<ul class="result">';
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo '<div class="result_item"> <li> Produit : </li> <br>';
        echo '<li> Nom : ' . $row['DPRODU'] . "</li>";
        echo "<li> Prix :  " . $row['PUVEN'] . "  </li><br>";
        echo '<li><button class="upload_submit" onclick="addFormUpload()">Modifier</button> </li> </div> <br>';
        
        }
        echo "</ul>";
       
    } else {
        echo "Erreur de la requête : " . $db->errorInfo()[2];
    }
}
 


 
include '../includes/section.php';

include '../includes/footer.php';
