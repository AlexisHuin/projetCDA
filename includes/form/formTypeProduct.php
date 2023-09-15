<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST" >
    <label class="search" for="nom">Ajouter un type de produits</label>
    <input class="search" type="text" id="nom" name="nom" required>

    <input class="search_input" type="submit" name="submit" value="Envoyer">
</form>

<?php
require_once "./root/pdo.php";

// je récupére les données envoyer depuis ma page de formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom"];
   

    // je vérifie si les champs sont vides
    if (empty($nom)) {
        die("Tous les champs du formulaire doivent être remplis.");
    }

    //si il ne sont pas vide je lance ma requete SQL d'injection vers la table "contact" de ma BDD tabledetest
    try {
       
        $query = "INSERT INTO type_de_produit (DTYPRO) VALUES (:nom)";

       
        $stmt = $db->prepare($query);

        // je lie les paramètres aux valeurs
        $stmt->bindParam(":nom", $nom);
       

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