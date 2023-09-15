<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
    

    <label class="search" for="raison_sociale">Raison Sociale</label>
    <input class="search" type="text" name="raison_sociale" required>

    <label class="search" for="nom">Nom du producteur</label>
    <input class="search" type="text" name="nom" required>

    <label class="search" for="tel">Téléphone</label>
    <input class="search" type="text" name="tel" required>

    <label class="search" for="email">Email</label>
    <input class="search" type="email" name="email" required>

    <label class="search" for="adresse_postale">Adresse postale</label>
    <input class="search" type="text" name="adresse_postale" required>

    <label class="search" for="gps">Coordonées GPS</label>
    <input class="search" type="text" name="gps" required>

    <input class="search_input" type="submit" name="submit" value="Envoyer">
</form>

<?php
require_once "./root/pdo.php";

// je récupére les données envoyer depuis ma page de formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $raison_sociale = $_POST["raison_sociale"];
    $nom = $_POST["nom"];
    $tel = $_POST["tel"];
    $email = $_POST["email"];
    $adresse_postale = $_POST["adresse_postale"];
    $gps = $_POST["gps"];
    

    // je vérifie si les champs sont vides
    if (empty($raison_sociale . $nom .  $tel . $email . $adresse_postale . $gps)) {
        die("Tous les champs du formulaire doivent être remplis.");
    }

    //si il ne sont pas vide je lance ma requete SQL d'injection vers la table "contact" de ma BDD tabledetest
    try {

        $query = "INSERT INTO producteur ( RSOPRO, NPRRES, TPRODU, MPRODU, APOPRO, CGPPRO) VALUES ( :raison_sociale, :nom , :tel, :email, :adresse_postale, :gps)";


        $stmt = $db->prepare($query);

        // je lie les paramètres aux valeurs
        $stmt->bindParam(":raison_sociale", $raison_sociale);
        $stmt->bindParam(":nom", $nom);
        $stmt->bindParam(":tel", $tel);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":adresse_postale", $adresse_postale);
        $stmt->bindParam(":gps", $gps);
        

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