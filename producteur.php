<?php
require_once "./root/pdo.php";
$titre="Producteur";
include './includes/header.php';
include './includes/banner.php';


$titreArticle = "Afficher les producteurs";



include './includes/section.php';



$sql = "SELECT * FROM producteur";
$query = $db->query($sql);
$producteurs = $query->fetchAll(); ?>

<?php foreach ($producteurs as $producteur) : ?>
    <div class="result_item">
        <p>Raison Sociale: <?= $producteur["RSOPRO"] ?></p>
        <p>Nom prénom producteur: <?= $producteur["NPRRES"] ?></p>
        <p>Téléphone: <?= $producteur["TPRODU"] ?></p>
        <p>Email: <?= $producteur["MPRODU"] ?></p>
        <p>Adresse postale: <?= $producteur["APOPRO"] ?></p>
        <p>GPS: <?= $producteur["CGPPRO"] ?></p>
        <br>
        
    

    <button>
        <a href="updateProductor.php?id=<?=$producteur["IPRODU"]?>"> Modifier</a>
    </button>
    <button>
        <a href="deleteProductor.php?id=<?=$producteur["IPRODU"]?>"> Supprimer</a>
    </button>
    </div>

<?php endforeach ?>
   
<?php
include './includes/footer.php';