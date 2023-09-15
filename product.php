<!-- <script src="../app.js"></script> -->
<?php
require_once "./root/pdo.php";
$titre="Produits";
include './includes/header.php';
include './includes/banner.php';

$titreArticle = "Afficher les produits";
include './includes/section.php';






$sql = "SELECT * FROM produits";
$query = $db->query($sql);
$produits = $query->fetchAll(); ?>

<?php foreach ($produits as $produit) : ?>
    <div class="result_item">
        <p>Nom: <?= $produit["DPRODU"] ?></p>
        <p>Prix: <?= $produit["PUVEN"] ?></p>
        <br>
        
    

    <button>
        <a href="update.php?id=<?=$produit["IPRODDU"]?>"> Modifier</a>
    </button>
    <button>
        <a href="delete.php?id=<?=$produit["IPRODDU"]?>"> Supprimer</a>
    </button>
    </div>

<?php endforeach ?>
   

 

<?php
include './includes/footer.php';

