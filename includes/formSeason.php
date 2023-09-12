<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
    <label class="search" for="nom">Nom de la saison</label>
    <input class="search" type="text" name="nom" required>
    <label class="search" for="date-debut">Date début de la saison</label>
    <input class="search" type="date" name="date-début" required>
    <label class="search" for="date-fin">Date de fin de saison</label>
    <input class="search" type="date"  name="date-fin" required>
    <input class="search_input" type="submit" name="submit" value="Envoyer">
</form>

<?php
require_once "./root/pdo.php";

// je récupére les données envoyer depuis ma page de formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom"];
    $date_debut = $_POST["date-debut"];
    $date_fin = $_POST["date-fin"];

    // je vérifie si les champs sont vides
    if (empty($nom . $date_debut . $date_fin)) {
        die("Tous les champs du formulaire doivent être remplis.");
    }

    //si il ne sont pas vide je lance ma requete SQL d'injection vers la table "contact" de ma BDD tabledetest
    try {

        $query = "INSERT INTO Saison (NSAISO, DDESAI, DFISAI) VALUES (:nom , :date_debut , :date_fin)";


        $stmt = $db->prepare($query);

        // je lie les paramètres aux valeurs
        $stmt->bindParam(":nom", $nom, ":date_debut", $date_debut, ":date_fin", $date_fin);


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