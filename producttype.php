<?php
require_once "./root/pdo.php";
$titre="Type de produit";
include './includes/header.php';
include './includes/banner.php';


$titreArticle = "Afficher type de produitst";





$sql = "SELECT * FROM type_de_produit";
$query = $db->query($sql);
$types= $query->fetchAll(); ?>

<?php foreach ($types as $type) : ?>
    <div class="result_item">
        <p>Nom: <?= $type["DTYPRO"] ?></p>
        <br>
        
    

    <button>
        <a href="update.php?id=<?=$type["ITYPRO"]?>"> Modifier</a>
    </button>
    <button>
        <a href="delete.php?id=<?=$type["ITYPRO"]?>"> Supprimer</a>
    </button>
    </div>

<?php endforeach ?>
   

 


include './includes/section.php';
include './includes/footer.php';
