<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
    <label class="search" for="nom">Nom du produit</label>
    <input class="search" type="text" name="nom" required>
    <label class="search" for="prix">Prix unitaire</label>
    <input class="search" step="0.01" type="number" name="prix" required>
    <input class="search_input" type="submit" name="submit" value="Envoyer">
</form>

<?php
require_once "./root/pdo.php";

// je récupére les données envoyer depuis ma page de formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom"];
    $prix = $_POST["prix"];
    

    // je vérifie si les champs sont vides
    if (empty($nom . $prix)) {
        die("Tous les champs du formulaire doivent être remplis.");
    }

    //si il ne sont pas vide je lance ma requete SQL d'injection vers la table "contact" de ma BDD tabledetest
    try {

        $query = "INSERT INTO produits (DPRODU, PUVEN) VALUES (:nom , :prix)";


        $stmt = $db->prepare($query);

        // je lie les paramètres aux valeurs
        $stmt->bindParam(":nom", $nom);
        $stmt->bindParam(":prix", $prix);

        // J'exécute la requête SQL
        $stmt->execute();

        // j'affiche un message visuel de confirmation
        echo '<p class="validation_bdd"> Données insérées avec succès dans la base de données.</p>';
    }
    // j'affiche si il y eu une erreur 
    catch (PDOException $e) {
        die("Erreur lors de l'insertion des données : " . $e->getMessage());
    }
}

?>