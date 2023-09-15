<?php
require_once "./root/pdo.php";
$titre="Type de produit";
include './includes/header.php';
include './includes/banner.php';


$titreArticle = "Afficher type de produits";


include './includes/section.php';


$sql = "SELECT * FROM type_de_produit";
$query = $db->query($sql);
$types= $query->fetchAll(); ?>

<?php foreach ($types as $type) : ?>
    <div class="result_item">
        <p>Nom: <?= $type["DTYPRO"] ?></p>
        <br>
        
    

    <button>
        <a href="updateProductType.php?id=<?=$type["ITYPRO"]?>"> Modifier</a>
    </button>
    <button>
        <a href="deleteProductType.php?id=<?=$type["ITYPRO"]?>"> Supprimer</a>
    </button>
    </div>

<?php endforeach ?>
   

 

<?php 

include './includes/footer.php';
