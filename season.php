<?php
require_once "./root/pdo.php";
$titre="Saison";
$titreArticle = "Sélectionne ta saison";


?>


<?php
include './includes/header.php';
include './includes/banner.php';
include './includes/section.php';

$sql = "SELECT * FROM saison";
$query = $db->query($sql);
$saisons = $query->fetchAll(); ?>

<?php foreach ($saisons as $saison) : ?>
    <div class="result_item">
        <p>Nom: <?= $saison["NSAISO"] ?></p>
        <p>Date de début: <?= $saison["DDESAI"] ?></p>
        <p>Date de fin: <?= $saison["DFISAI"] ?></p>
       
        <br>
        
    

    <button>
        <a href="update.php?id=<?=$saison["ISAISO"]?>"> Modifier</a>
    </button>
    <button>
        <a href="delete.php?id=<?=$saison["ISAISO"]?>"> Supprimer</a>
    </button>
    </div>

<?php endforeach ?>
   
<?php
include './includes/footer.php';

?>